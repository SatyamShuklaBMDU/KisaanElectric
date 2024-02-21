<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SMSService;
use App\Models\User;
use App\Models\password_reset;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ForgotPasswordController extends BaseController
{
    private $smsService;

    public function __construct(SMSService $smsService)
    {
        $this->smsService = $smsService;
    }


    public function sendResetOtp(Request $request)
    {
        $request->validate(['mobile' => 'required|numeric|digits:10']);

        $user = User::where('mobile_no', $request->mobile)->first();

        if ($user) {

            $token = Password::createToken($user);


            $this->smsService->sendSMS($user->mobile_no, 'Your OTP for password reset is: ' . $token);


            return response()->json(['message' => 'Password reset token sent successfully']);




        }

        return response()->json(['error' => 'User not found'], 404);
    }
}

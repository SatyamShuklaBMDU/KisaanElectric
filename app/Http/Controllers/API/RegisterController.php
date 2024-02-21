<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RegisterController extends BaseController
{
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'password' => 'required',
            'from_referral_number' => 'nullable',
            'mobile_no' => 'required|numeric|digits:10',
            'profession' => 'required|in:electrician,dealer,partner',
        ]);

         if($request->profession=="dealer"){
            $validator=Validator::make($request->all(), [
                // 'identification_id' => 'required',
                'business_name' => 'required',
                ]);
        }else if($request->profession=="partner"){
            $validator=Validator::make($request->all(), [
                // 'identification_id' => 'required',
                'business_name' => 'required',

            ]);
        }


        if($validator->fails()){
            
            $error=$validator->errors()->first();
            return response()->json(['message'=> $error,'success'=>false],200);
        }

        $input = $request->all();

        // Check if the mobile number is unique
        if (!$this->isMobileNumberUnique($input['mobile_no'])) {
            return response()->json(['message' => 'This mobile number is already registered.','success'=>false],200);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $input['uniq_id'] = $this->generateUniqId($input['profession']);
        $input['status']="Pending";
        // Generating a Referral Numer for Every User.
        $input['refferal_code'] = 'KISAAN' . rand(10000, 99999);
        // dd($input);
        $user = User::create($input);
        if ($request->has('from_referral_number') && !empty($request->from_referral_number)) {
            if ($this->isValidReferralNumber($request->from_referral_number)) {
                // Proceed to the ReferralController with both users' IDs
                $referralController = new ReferralController();
                $referralUser = User::where('refferal_code', $request->from_referral_number)->first();
                $referralController->processReferral($referralUser->id, $user->id);
            } else {
                return response()->json(['message' => 'Invalid referral number.', 'success' => false], 200);
            }
        }
        $success['token'] =  $user->createToken('MyApp')->plainTextToken;
        $success['name'] =  $user->name;
        $success['uniq_id'] =  $user->uniq_id;
        $success['profession'] =  $user->profession;
        $success['identification_id'] =  $user->identification_id;
        $success['business_name'] =  $user->business_name;
        $success['referral_number'] =  $user->refferal_code;

        return $this->sendResponse($success, 'User register successfully.');
    }

    private function generateUniqId($profession)
     {
    // Determine the code based on the profession
    switch ($profession) {
        case 'electrician':
            $code = 'CIE';
            break;
        case 'dealer':
            $code = 'CID';
            break;
        case 'partner':
            $code = 'CIP';
            break;
        default:
            $code = 'UNK'; // Handle unknown professions as needed
         }

          // Generate a unique ID (e.g., incrementing number)
          $nextId = User::where('profession', $profession)->count() + 1;

          // Pad the ID with leading zeros
          $code .= str_pad($nextId, 3, '0', STR_PAD_LEFT);

         return $code;
     }
     private function isMobileNumberUnique($mobileNumber)
      {
         return !User::where('mobile_no', $mobileNumber)->exists();
      }

      private function isValidReferralNumber($referralNumber)
    {
        // Check if the referral number exists in the User model's column
        $referralUser = User::where('refferal_code', $referralNumber)->first();

        if ($referralUser) {
            // If the referral user is found, return true
            return true;
        } else {
            // If the referral user is not found, return false
            return false;
        }
    }

    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
}

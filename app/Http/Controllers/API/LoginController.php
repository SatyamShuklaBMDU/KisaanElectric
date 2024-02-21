<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends BaseController
{
    // **********This code for email login************

    // public function login(Request $request)
    // {
    //     if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
    //         $user = Auth::user();
    //         $success['token'] =  $user->createToken('MyApp')->plainTextToken;
    //         $success['name'] =  $user->name;
    //         $success['mobile_no'] =  $user->mobile_no;

    //         return $this->sendResponse($success, 'User login successfully.');
    //     }
    //     else{
    //         return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
    //     }
    // }

     // **********This code for mobile login************

    public function login(Request $request)
{
    $credentials = $request->only('mobile_no', 'password');


$user=User::where('mobile_no',$request->mobile_no)->get();



    if (Auth::attempt($credentials)) {
        $user = Auth::user();

        $success['token'] = $user->createToken('MyApp')->plainTextToken;
        $success['name'] = $user->name;
        $success['mobile_no'] = $user->mobile_no;
        $success['id'] = $user->id;

if($user->status=="Suspended"){
        return response()->json( ['message'=>'Your Account is Suspended.','success'=>false],200);
}else if($user->status=="Block"){
        return response()->json( ['message'=>'Your Account is Blocked.','success'=>false],200);
}




        return $this->sendResponse($success, 'User logged in successfully.');
    } else if($user->count()>0){
        return response()->json( ['message' => 'Wrong Password','success'=>false],200);
        
    }else{
        return response()->json( ['message' => 'Invalid credentials','success'=>false],404);
    }
}


    public function logout(Request $request)
    {
    $user = $request->user();

    if ($user) {
        $user->tokens->each(function ($token, $key) {
            $token->delete();
        });
        return response()->json(['message' => 'Successfully logged out']);
    }

    return response()->json(['message' => 'Not authenticated'], 200);
    }
}

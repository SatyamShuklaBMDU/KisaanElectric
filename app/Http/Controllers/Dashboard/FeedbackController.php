<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Models\Term_and_conditions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class FeedbackController extends Controller
{


public function feedback(Request $req){

// =$req->only('subject', 'message');


$validator=Validator::make($req->all(),[
    "subject"=> "required",
    "message"=>"required",
    "image"=>"required|image|mimes:jpeg,png,jpg,gif",
    "category"=> "required",



]);

if($validator->fails()){
    return response()->json(['Validation Error.'=>$validator->errors(),"status"=>false],200);
}else{


    $user = $req->user();
    $userId=$user->id;

    $image = $req->file('image');
    $imageName = time() . '.' . $image->extension();
    $image->storeAs('public/images', $imageName);

    // $feedbackModel = new Feedback;

    // $feedbackModel->filename = $imageName;
    // $feedbackModel-> = 'storage/images/' . $imageName;
    // $feedbackModel->save();


 $result=DB::table('feedback')->insert(
    ['Subject' => $req->subject, 'Message' => $req->message,"category"=>$req->category,"status"=>0,"User_Id"=>$userId,"image"=>$imageName,"created_at"=>date('Y-m-d h-m-s')]
);
    return response()->json(['status' => true,"data"=>$result,"message"=>"Submit successfully"],200);
}







}

public function deleteFeedback(Request $req){

    DB::table("feedback")
    ->where("id","=",$req->id)
    ->delete();


return redirect()->back()->with('message', 'Feedback Delete Successfully!');

}



public function term_conditions(){

    $term=Term_and_conditions::all();


    foreach($term as $term){
        $subject=$term->Subject;
    }
return  response()->json(['data'=>$subject,'status'=>true], 200);;

}





    //
}

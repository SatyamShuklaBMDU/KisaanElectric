<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\About_us;
use App\Models\Banner;
use App\Models\Cart;
use App\Models\Catalog;
use App\Models\Offer;
use App\Models\Order;
use App\Models\Point_history;
use App\Models\Product;
use App\Models\Product_category;
use App\Models\Product_order;
use App\Models\Scheme;
use App\Models\Scheme_history;
use App\Models\Series_product;
use App\Models\Transaction_history;
use App\Models\User;
use App\Notifications\MyNotification;
use Illuminate\Support\Facades\Auth;

use App\Models\Daily_limit;
use App\Models\Point_amount;
use App\Models\Privacy_policy;
use App\Models\Social_media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\If_;

class PrivacyController extends Controller
{


    public function privacy_policy(){

        $term=Privacy_policy::all();


        foreach($term as $term){
            $subject=$term->Subject;
        }
    return  response()->json(['data'=>$subject,'status'=>true], 200);;

    }

    public function socialMedia(){

        $term=Social_media::all();
        // foreach($term as $term){
        //     $subject=$term->Subject;
        // }
                // return view('super-admin/Dashboard/social-media',compact('term'));
                return  response()->json(['data'=>$term,'status'=>true], 200);;
    }

    //
    public function aboutUs(){

        $term=About_us::all();
        foreach($term as $term){
            $subject=$term->Subject;
        }
                // return view('super-admin/Dashboard/social-media',compact('term'));
                return  response()->json(['data'=>$subject,'status'=>true], 200);;
    }


    public function catalog(){

        $term=Catalog::all();
        foreach($term as $term){
            $subject=$term->catalog;
        }
                // return view('super-admin/Dashboard/social-media',compact('term'));
                return  response()->json(['data'=>$subject,'status'=>true], 200);;
    }



    public function perPointAmount(){

        $term=Point_amount::all();
        foreach($term as $term){
            $subject=$term->amount;
        }
                // return view('super-admin/Dashboard/social-media',compact('term'));
                return  response()->json(['amount'=>$subject,'status'=>true], 200);;
    }




    public function  dailyLimit(){

        $term=Daily_limit::all();
        foreach($term as $term){
            $electrician=$term->electrician;
            $dealer=$term->dealer;
            $partner=$term->partner;
        }
                // return view('super-admin/Dashboard/social-media',compact('term'));
                return  response()->json(['electrician'=>$electrician,'dealer'=>$dealer,'partner'=>$partner,'status'=>true], 200);;
    }


    public function changePassword(Request $req){

        $user = $req->user();

if($user->mobile_no==$req->mobile_no){

        $credentials = $req->only('mobile_no', 'password');

        // if (Auth::attempt($credentials)) {
            if(Hash::check($req->password, Auth::user()->password, [])){
            // $user = Auth::user();

            if ($req->new_password==$req->confirm_password) {
                User::where("id","=",$user->id)->update([
                    "password"=>Hash::make($req->new_password),
                    ]);

                return  response()->json(['message'=>'Password Change Successfull','status'=>true], 200);;
                }else{
                    return  response()->json(['message'=>'New Password  and Confirm Password Doesnot match!','status'=>false], 200);;

                }
            }else{

                return  response()->json(['message'=>'Wrong Password','status'=>false], 200);;

            }
        }else{

                return  response()->json(['message'=>'Mobile Number does not match','status'=>false], 200);;

        }
                // return view('super-admin/Dashboard/social-media',compact('term'));
                // return  response()->json(['amount'=>$subject,'status'=>true], 200);;
    }



    public function  pointhistory(Request $req){

        $user = $req->user();

        $term=Point_history::where('User_id',$user->id)->orderBy('created_at', 'desc')->get();

        $emptyArray = array();

        $i=0;
        foreach($term as $term){

            $emptyArray[$i]=$term;
            $i++;
        }
                // return view('super-admin/Dashboard/social-media',compact('term'));
                return  response()->json(['data'=>$emptyArray,'status'=>true], 200);;
    }


public function partnerInfo(){

    
}



    public function  profileInfo(Request $req){

        $user = $req->user();
        $term=User::where('id',$user->id)->get();
        // if ($req->isEmpty()) {
        if(count($req->all()) > 0){
  $user_find=User::where('id','!=',$user->id)->where('mobile_no','=',$req->mobile_no)->get();

// $user_find=DB::select('SELECT * FROM users WHERE `mobile_no`=? and  `id` != ?', [$req->mobile_no,$user->id]);


if(count($user_find)>0){
    return  response()->json(['message'=>'Mobile Number already exist' ,'data'=>$user_find,'status'=>false],200);
}

if(count($user_find)==0 ){

                 User::where('id',$user->id)->update([
                'email' => $req->email,
                'gender' => $req->gender,
                'whatsapp_number'=>$req->whatsapp_number,
                'address'=>$req->address,
                'pincode'=>$req->pincode,
                'country'=>$req->country,
                'state'=>$req->state,
                'city'=>$req->city,
                'dob'=>$req->dob,
                'name'=>$req->name,
                'mobile_no'=>$req->mobile_no,
                // 'profile_pic'=>$req->profile_pic,
            ]);

            return  response()->json(['message'=>'Update Successfully','status'=>true], 200);

        }

    }else{

        return  response()->json(['data'=>$term,'status'=>true], 200);

    }
        // $i=0;
        // foreach($term as $term){

        //     $emptyArray[$i]=$term;
        //     $i++;
        // }
                // return view('super-admin/Dashboard/social-media',compact('term'));
    }






    public function  transferInfo(Request $req){

        $user = $req->user();
        $term=User::where('id',$user->id)->get();
        // if ($req->isEmpty()) {
        if(count($req->all()) > 0){



            if(!empty($req->cancelled_cheque)){
                $image = $req->file('cancelled_cheque');
                $imageName1 = time() . '.' . $image->extension();
                $image->storeAs('public/images', $imageName1);

            }else{
                $imageName1='';
            }
            if(!empty($req->passbook)){
                $image = $req->file('passbook');
                $imageName2 = time() . '.' . $image->extension();
                $image->storeAs('public/images', $imageName2);
            }else{
                $imageName2='';
            }
            if(!empty($req->paytm_kyc)){
                $image = $req->file('paytm_kyc');
                $imageName3 = time() . '.' . $image->extension();
                $image->storeAs('public/images', $imageName3);
            }else{
                $imageName3='';
            }




                 User::where('id',$user->id)->update([
                'bank_name' => $req->bank_name,
                'gender' => $req->gender,
                'Ac_number'=>$req->Ac_number,
                'ifsc_code'=>$req->ifsc_code,
                'holder_name'=>$req->holder_name,
                'paytm_no'=>$req->paytm_no,
                'googlepay_no'=>$req->googlepay_no,
                'phonepay_no'=>$req->phonepay_no,
                'cancelled_cheque'=>$imageName1,
                'passbook'=>$imageName2,
                'paytm_kyc'=>$imageName3
                // 'profile_pic'=>$req->profile_pic,
            ]);

            return  response()->json(['message'=>'Update Successfully','status'=>true], 200);


    }else{

        return  response()->json(['data'=>$term,'status'=>true], 200);

    }
        // $i=0;
        // foreach($term as $term){

        //     $emptyArray[$i]=$term;
        //     $i++;
        // }
                // return view('super-admin/Dashboard/social-media',compact('term'));
    }


    public function  documentInfo(Request $req){

        $user = $req->user();
        $term=User::where('id',$user->id)->get();
        // if ($req->isEmpty()) {
        if(count($req->all()) > 0){



            if(!empty($req->aadhar_front)){
                $image = $req->file('aadhar_front');
                $imageName1 = time() . '.' . $image->extension();
                $image->storeAs('public/images', $imageName1);

            }else{
                $imageName1='';
            }
            if(!empty($req->aadhar_back)){
                $image = $req->file('aadhar_back');
                $imageName2 = time() . '.' . $image->extension();
                $image->storeAs('public/images', $imageName2);
            }else{
                $imageName2='';
            }
            if(!empty($req->gst_certificate)){
                $image = $req->file('gst_certificate');
                $imageName3 = time() . '.' . $image->extension();
                $image->storeAs('public/images', $imageName3);
            }else{
                $imageName3='';
            }
            if(!empty($req->shop_image)){
                $image = $req->file('shop_image');
                $imageName4 = time() . '.' . $image->extension();
                $image->storeAs('public/images', $imageName4);
            }else{
                $imageName4='';
            }
            
            if(!empty($req->pan_card)){
                $image = $req->file('pan_card');
                $imageName5 = time() . '.' . $image->extension();
                $image->storeAs('public/images', $imageName5);
            }else{
                $imageName5='';
            }





                 User::where('id',$user->id)->update([
                'aadhar_no' => $req->aadhar_no,
                'pan_no' => $req->pan_no,
                'gst_no'=>$req->gst_no,
'pan_card'=>$imageName5,
                'aadhar_front'=>$imageName1,
                'aadhar_back'=>$imageName2,
                'gst_certificate'=>$imageName3,
                'shop_image'=>$imageName4,
                // 'profile_pic'=>$req->profile_pic,
            ]);

            return  response()->json(['message'=>'Update Successfully','status'=>true], 200);


    }else{

        return  response()->json(['data'=>$term,'status'=>true], 200);

    }
        // $i=0;
        // foreach($term as $term){

        //     $emptyArray[$i]=$term;
        //     $i++;
        // }
                // return view('super-admin/Dashboard/social-media',compact('term'));
    }




    public function  aditionalInfo(Request $req){

        $user = $req->user();
        $term=User::where('id',$user->id)->get();
        // if ($req->isEmpty()) {
        if(count($req->all()) > 0){

                 User::where('id',$user->id)->update([
                'nationality' => $req->nationality,
                'marital_status' => $req->marital_status,
                'children_info'=>$req->children_info,

                'oneChildName'=>$req->oneChildName,
                'oneChildDate'=>$req->oneChildDate,
                'oneChildStudy'=>$req->oneChildStudy,
                'secondChildName'=>$req->secondChildName,
                'secondChildDate'=>$req->secondChildDate,
                'secondChildStudy'=>$req->secondChildStudy,
                'thirdChildName'=>$req->thirdChildName,
                'thirdChildDate'=>$req->thirdChildDate,
                'thirdChildStudy'=>$req->thirdChildStudy,
                'bloodgroup'=>$req->bloodgroup,
                'experiance'=>$req->experiance,
                'reading'=>$req->reading,
                'writing'=>$req->writing,
                'speaking'=>$req->speaking,
                'partner'=>$req->partner,

                // 'profile_pic'=>$req->profile_pic,
            ]);

            return  response()->json(['message'=>'Update Successfully','status'=>true], 200);


    }else{

        return  response()->json(['data'=>$term,'status'=>true], 200);

    }
        // $i=0;
        // foreach($term as $term){

        //     $emptyArray[$i]=$term;
        //     $i++;
        // }
                // return view('super-admin/Dashboard/social-media',compact('term'));
    }










    public function  walletInfo(Request $req){


        $user = $req->user();
        $term=User::where('id',$user->id)->get();
        $limit=Daily_limit::all();
        $ponit_value=Point_amount::all();


        if(empty($req->amount)|| empty($req->point)){
foreach( $term as $term){
    
    $pan_status=false;
    if(empty($term->pan_no) || empty($term->pan_card) ){
        $pan_status=false;

    }else{
        $pan_status=true;

    }


    $bank_status=false;
    if(empty($term->Ac_number) || empty($term->cancelled_cheque) || empty($term->passbook) ){
        $bank_status=false;

    }else{
        $bank_status=true;

    }



    $aadhar_status=false;
    if(empty($term->aadhar_no) || empty($term->aadhar_front) || empty($term->aadhar_back) ){
        $aadhar_status=false;

    }else{
        $aadhar_status=true;
    }



    $gst_status=false;
    if(empty($term->gst_no) || empty($term->gst_certificate) ){
        $gst_status=false;

    }else{
        $gst_status=true;
    }


    $name=$term->name;
    $register_at=$term->created_at;
    $status=$term->status;

if($term->profession=="electrician"){



foreach($ponit_value as $ponit_value){
    $total_ponit_value=$ponit_value->electrician;      # code...

}



    foreach($limit as $limit) {
 $daily_limit= $limit->electrician;
    }
}

if($term->profession=="dealer"){


    foreach($ponit_value as $ponit_value){
        $total_ponit_value=$ponit_value->dealer;      # code...

    }




    foreach($limit as $limit) {
 $daily_limit= $limit->dealer;
        # code...
    }
}


if($term->profession=="partner"){


    foreach($ponit_value as $ponit_value){
        $total_ponit_value=$ponit_value->partner;      # code...

    }




    foreach($limit as $limit) {
 $daily_limit= $limit->partner;
        # code...
    }
}

}





$history=Point_history::where('user_id',$user->id)->get();

$total_point=0;
$widthrow_points=0;
foreach ($history as $history) {
    # code...
$widthrow_points=$widthrow_points+$history->withdraw;
$total_point=$total_point+$history->Point;
}


$redeem=Transaction_history::where('user_id',$user->id)->get();
$redeemPoint=0;
foreach ($redeem as $redeem) {
    // $redeemAmount=$redeemAmount+$redeem->amount;
    $redeemPoint=$redeemPoint+$redeem->point;
}

$total_point1=$redeemPoint;


$available_points=$total_point-$total_point1;


// foreach($term as $term){
        //     $electrician=$term->electrician;
        //     $dealer=$term->dealer;
        //     $partner=$term->partner;
        // }
                // return view('super-admin/Dashboard/social-media',compact('term'));
                return  response()->json(['name'=>$name,'register_at'=> $register_at,'Pan_status'=>$pan_status,'Bank_status'=>$bank_status,'aadhar_status'=>$aadhar_status,'status'=>true,'user_status'=>$status,'gst_status'=>$gst_status,'dail_limit'=>$daily_limit,'Total_point'=>$available_points,'Point_Value'=>$total_ponit_value], 200);

}else{

$adhar_card=$user->aadhar_no;
$adhar_photo1=$user->aadhar_front;
$aadhar_photo2=$user->aadhar_back;

if(empty($adhar_card) || empty($adhar_photo1)|| empty($aadhar_photo2)){
    return  response()->json(['data'=>'Please Fill  your Adhar Details','status'=>false], 200);
}
    if($req->payment_mode=="paytm"){
        $payment_number=$user->paytm_no;
 if(empty($payment_number)){
    return  response()->json(['data'=>'Please Fill your Paytm Detail','status'=>false], 200);
}
    }else if($req->payment_mode=="googlepay"){
        $payment_number=$user->googlepay_no;
 if(empty($payment_number)){
    return  response()->json(['data'=>'Please Fill Your Google Pay Detail','status'=>false], 200);
}
    }else if($req->payment_mode=="phonepay"){
        $payment_number=$user->phonepay_no;
    
        if(empty($payment_number)){
    return  response()->json(['data'=>'Please Fill Your PhonePay Detail','status'=>false], 200);
}
    }else If($req->payment_mode=="bank"){
        $payment_number=$user->Ac_number;
        $ifsc=$user->ifsc_code;
        $cancelled_cheque=$user->cancelled_cheque;
        $passbook=$user->passbook;
if(empty($payment_number)||empty($ifsc) ||empty($cancelled_cheque) || empty($passbook) ){
        return  response()->json(['data'=>'Please Fill  Your Bank Details','status'=>false], 200);}    
        }
        
    $now = date('Y-m-d H:i');
    DB::statement("INSERT INTO transaction_history(`amount`,`status`,`point`,`user_id`,`name`,`created_at`,`payment_mode`,`payment_no`) VALUES($req->amount,'Pending',$req->point,$user->id,'$user->uniq_id','$now','$req->payment_mode',$payment_number)");


    return  response()->json(['data'=>'Your payment request Rs.'.$req->amount.' has been sent to the account Department. We will contact with in 48 hours.','status'=>true], 200);


}



            }



    public function  mainPage(Request $req){

        $user = $req->user();

        $term=Point_history::where('User_id',$user->id)->orderBy('created_at', 'desc')->get();

$total_point=0;
$withdraw=0;
foreach ($term as $term) {

    $total_point=$total_point+$term->Point;
    $withdraw=$withdraw+$term->withdraw;
    # code...
}




// $available_point=$total_point-$withdraw;


$banner=Banner::all();

// $image = Storage::get("storage/images/1700758689.jpg");

// $image=storage_path("images\\1700758689.jpg");


$redeem=Transaction_history::where('user_id',$user->id)->get();

$redeemAmount=0;
$redeemPoint=0;
foreach ($redeem as $redeem) {
    $redeemAmount=$redeemAmount+$redeem->amount;
    $redeemPoint=$redeemPoint+$redeem->point;
}








$total_point1=$redeemPoint;

$available_point=$total_point-$total_point1;

// $redeem=13;

        // $emptyArray = array();
               // return view('super-admin/Dashboard/social-media',compact('term'));
                return  response()->json(['name'=>$user->name,'mobile_no'=>$user->mobile_no,'Cin_no'=>$user->uniq_id,'register_at'=>$user->created_at,'user_status'=>$user->status,'profession'=>$user->profession,'total_point'=>$available_point,'redeem'=>$redeemAmount,'banner'=>$banner,'status'=>true], 200);
    }


    public function  transactionHistory(Request $req){

        $user = $req->user();

        $term=Transaction_history::where('User_id',$user->id)->orderBy('created_at', 'desc')->get();

        $emptyArray = array();

        $i=0;
        foreach($term as $term){

            $emptyArray[$i]=$term;
            $i++;
        }
                // return view('super-admin/Dashboard/social-media',compact('term'));
                return  response()->json(['data'=>$emptyArray,'status'=>true], 200);;
    }








    public function  scheme(Request $req){



        $scheme2= Scheme::all();
    $scheme3=compact('scheme2');
    foreach ($scheme2 as $scheme) {

        if($scheme->upto<=date('d-m-Y')){
            $scheme->status="Active";
            }else{
                $scheme->status="Deactive";
        }
        // if()
        # code...
    }
    $user = $req->user();
        $term=Transaction_history::where('User_id',$user->id)->orderBy('created_at', 'desc')->get();


if(count($req->all())>0){

    $scheme=Scheme::where('id',$req->id)->first();
    $result= Scheme_history::create(['user_id'=>$user->id,'cin_no'=>$user->uniq_id,'scheme_image'=>$scheme->image,'scheme_name'=>$scheme->title,'name'=>$user->name,'point'=>$scheme->point,'status'=>'Redeem']);
    $now = date('Y-m-d H:i');

    DB::statement("INSERT INTO transaction_history(`status`,`point`,`user_id`,`name`,`created_at`) VALUES('Pending',$scheme->point,$user->id,'$user->uniq_id','$now')");
    // $trans=Transaction_history::create(['user_id'=>$user->id,'name'=>$user->uniq_id,'point'=>$scheme->point,'status'=>'Pending']);
    return  response()->json(['message'=>'Your scheme reedem request has been sent to account department. we will contact with in 48 hours','status'=>true], 200);


}else{

if($user->profession=="dealer"){
$scheme= Scheme::where('for','dealer')->where('status','Active')->get();
$scheme1=compact('scheme');
return  response()->json(['data'=>$scheme1,'status'=>true], 200);

}

if($user->profession=="electrician"){
    $scheme= Scheme::where('for','electrician')->where('status','Active')->get();
    $scheme1=compact('scheme');

    // $res=Scheme_history::where('user_id',$user->id)->get();

//     $schemePoint=0;
// foreach($res as $res){

//     $schemePoint=$schemePoint+$res->point;
// }

$trans=Transaction_history::where('user_id',$user->id)->get();



$transPoint=0;
foreach($trans as $trans){

    $transPoint=$transPoint+$trans->point;
}

$totalPoint=0;
$totalPoint=$transPoint;


$history=Point_history::where('user_id',$user->id)->get();

$tPoint=0;
foreach($history as $history){

    $tPoint=$tPoint+$history->Point;
}


$point=$tPoint-$totalPoint;
    return  response()->json(['data'=>$scheme1,'point'=>$point,'status'=>true], 200);
}



if($user->profession=="partner"){
    $scheme= Scheme::where('for','partner')->where('status','Active')->get();
    $scheme1=compact('scheme');
    return  response()->json(['data'=>$scheme1,'status'=>true], 200);
}               // return view('super-admin/Dashboard/social-media',compact('term'));           // return  response()->json(['data'=>$emptyArray,'status'=>true], 200);;
    } }



    public function  allSeries(){
       $series=Series_product::all();
// $category=Product_category::all();


    return  response()->json(['data'=>$series,'status'=>true], 200);
    }


    public function  allCategory(){


        // $series=Series_product::all();
$category=Product_category::all();


    return  response()->json(['data'=>$category,'status'=>true], 200);
    }



    public function  allProduct(Request $req){

        $user=$req->user();
//         $product=Product::
// join('category', 'product.category', '=', 'category.id')
// ->join('series_product', 'product.series', '=', 'series_product.id')
// ->get(['product.*', 'category.category','series_product.Series']);
// dd($product);






$product=Product::select('name', 'price','image')
->groupBy('name')
->get();

        // $series=Series_product::all();
// $category=Product::all();


    return  response()->json(['data'=>$product,'profession'=>$user->profession,'status'=>true], 200);
    }




    public function  allProductBySeries(Request $req){


$pro=$req->user()->profession;


$product=Product::where('series',$req->id)->select('name', 'price','image')
->groupBy('name')
->get();

        if($product->count()<=0){

    return  response()->json(['massage'=>'Series Not Found','status'=>false], 200);

        }
// $category=Product_category::all();
    return  response()->json(['Product'=>$product,'profession'=>$pro ,'status'=>true], 200);
    }



public function  allProductByCategory(Request $req){


$pro=$req->user()->profession;


        $product=Product::where('category',$req->id)->select('name', 'price','image')
        ->groupBy('name')
        ->get();

        if($product->count()<=0){

    return  response()->json(['massage'=>'category Not Found','status'=>false], 200);

        }
// $category=Product_category::all();


    return  response()->json(['Product'=>$product,'profession'=>$pro,'status'=>true], 200);
    }
    public function  productDetail(Request $req){
$pro=$req->user()->profession;



        $product=DB::table('product')
        // ->select(DB::raw('GROUP BY name '), '*')
        ->where('name', '=', $req->name)
        ->first();
        $size=Product::where('name',$req->name)->select('size', 'price')->get();
        if(!$product){
    return  response()->json(['massage'=>'product Not Found','status'=>false], 200);
        }




        return  response()->json(['product'=>$product,'size'=>$size,'profession'=>$pro, 'status'=>true], 200); }







    public function  Offer(Request $req){



        $scheme2= Offer::all();
    $scheme3=compact('scheme2');
    foreach ($scheme2 as $scheme) {

        if($scheme->upto<=date('d-m-Y')){
            $scheme->status="Active";
            }else{
                $scheme->status="Deactive";
        }
        // if()
        # code...
    }
    $user = $req->user();
        $term=Transaction_history::where('User_id',$user->id)->orderBy('created_at', 'desc')->get();


if(count($req->all())>0){

    $scheme=Scheme::where('id',$req->id)->first();

  $result= Scheme_history::create(['user_id'=>$user->id,'cin_no'=>$user->uniq_id,'scheme_image'=>$scheme->image,'scheme_name'=>$scheme->title,'name'=>$user->name,'point'=>$scheme->point,'status'=>'Redeem']);
    // return  response()->json(['message'=>'Redeem Successfully','status'=>true], 200);

    $trans=Point_history::create(['user_id'=>$user->id,'name'=>$user->uniq_id,'point'=>$scheme->point,'status'=>'Pending']);
}else{


if($user->profession=="dealer"){
$scheme= Scheme::where('for','dealer')->where('status','Active')->get();
$scheme1=compact('scheme');
return  response()->json(['data'=>$scheme1,'status'=>true], 200);
}


if($user->profession=="electrician"){
    $scheme= Scheme::where('for','electrician')->where('status','Active')->get();
    $scheme1=compact('scheme');

    // $res=Scheme_history::where('user_id',$user->id)->get();

//     $schemePoint=0;
// foreach($res as $res){

//     $schemePoint=$schemePoint+$res->point;
// }

$trans=Transaction_history::where('user_id',$user->id)->get();

$transPoint=0;
foreach($trans as $trans){

    $transPoint=$transPoint+$trans->point;
}
$totalPoint=0;
$totalPoint=$transPoint;
$history=Point_history::where('user_id',$user->id)->get();

$tPoint=0;
foreach($history as $history){

    $tPoint=$tPoint+$history->Point;
}
$point=$tPoint-$totalPoint;
    return  response()->json(['data'=>$scheme1,'point'=>$point,'status'=>true], 200);
}
if($user->profession=="partner"){
    $scheme= Scheme::where('for','partner')->where('status','Active')->get();
    $scheme1=compact('scheme');
    return  response()->json(['data'=>$scheme1,'status'=>true], 200);
}               // return view('super-admin/Dashboard/social-media',compact('term'));           // return  response()->json(['data'=>$emptyArray,'status'=>true], 200);;
    } }






    public function showCart(Request $request)
    {   // Validate the request
        if(count($request->all())>0){
        if($request->type=='delete'){
        // Add the item to the cart
        $cartItem = Cart::where('id',$request->id)->delete();
        return response()->json(['message' => 'Item removed successfully', 'cart_item' => $cartItem]);
        }
    }

$id=$request->user()->id;
$carts=Cart::where('user_id',$id)->orderBy('created_at','desc')->get();
$count=$carts->count();




return response()->json(['status' => true,'total_product'=>$count, 'data' => $carts]);




    }






    public function addToCart(Request $request)
    {   // Validate the request
        $request->validate([
            'product_name' => 'required',
            'quantity' => 'required|integer|min:1',
        ]);


        $product=DB::select("Select * from `product` where  `size`='$request->product_size' and `name`='$request->product_name' and `series`=$request->series");

        // Add the item to the cart
        $cartItem = Cart::create([
            'user_id' => $request->user()->id, // Assuming you have user authentication
            'product_name' => $request->product_name,
            'product_size' => $request->product_size,
            'quantity' => $request->quantity,
            'series' => $request->series,
            'product_id'=>$product[0]->id,
            'price'=>$product[0]->price,
            // 'total_price'=>$request->quantity*$product[0]->price,
            'image'=>$product[0]->image,
        ]);
        return response()->json(['message' => 'Item added to cart', 'cart_item' => $product[0]->price]);
    }




    public function updateQuantity(Request $request)
    {   // Validate the request
        $request->validate([
            'id' => 'required',
            'quantity' => 'required',
        ]);


        $product=DB::select("Select * from `carts` where  `id`='$request->id' ");

     $cart= Cart::where("id",$request->id)->update(["quantity"=>$request->quantity]);

     if($cart){
        // Add the item to the cart
        return response()->json(['message' => 'Update cart', 'status' => true]);
     }else{
        return response()->json(['message' => 'failed', 'status' => false]);

     }


    }







    public function Product_Order(Request $request)
    {   // Validate the request
        $request->validate([
            'amount' => 'required',
            // 'quantity' => 'required|integer|min:1',
        ]);


        if( empty($request->user()->address) || empty($request->user()->country) || empty($request->user()->pincode)){

        return response()->json(['message' => 'Please Complete your Profile', 'status' => false]);

        }
        // $product=DB::statement("Select * from `product` where  `size`='$request->product_size' and `name`='$request->product_name' and `series`=$request->series");

        $order_id='Order'.rand(11111,99999);

        $address=$request->user()->address.",".$request->user()->city.",".$request->user()->country.",".$request->user()->pincode;


$assign=$request->user()->assign;

// $assign_partner=User::where('name',$assign)->get();

        $total_quantity=0;
        $cart1=Cart::where('user_id',$request->user()->id)->get();
foreach ($cart1 as $val) {
    $total_quantity=$total_quantity+$val->quantity;
    # code...
}


        // Add the item to the cart
        $Order = Order::create([
            'order_id'=>$order_id,
            'user_id' => $request->user()->id,
            'cin_no'=> $request->user()->uniq_id,// Assuming you have user authentication
            'name' => $request->user()->name,
            'total_amount' => $request->amount,
            'address'=>$address,
        'quantity'=>$total_quantity,
        // 'assign_id'=>$assign_partner->id,
        ]);



        if ($Order) {

            $cart=Cart::where('user_id',$request->user()->id)->get();

            foreach ($cart as $item) {
             $orderPlaced=   Product_order::create([
                    'product_name' => $item->product_name,
                    'order_id' => $order_id,
                    'price' => $item->price,
                    'quantity' => $item->quantity,
                    'product_size'=>$item->product_size,
                    'image'=>$item->image,
                    ]);
        }


        if($orderPlaced){

            $partner=$request->user()->assign;

            $title="New order placed";
            // $data['body']="A new order has been placed by ".$request->user()->name." for your partner. Please login and check";
            $message="A new order has been placed by ".$request->user()->name.". Please check your dashboard for more";

            $users = User::where('name',$partner)->get();
            foreach ($users as $user) {
            Notification::send($user, new MyNotification($title,$message));
              }

            return response()->json(['message' => 'Order Placed Successfully', 'status' => true]);

    }











}











}





public function Order_history(Request $req){
    $cin_no=$req->user()->uniq_id;


$order=Order::where('cin_no',$cin_no)->get();

return response()->json(['data' => $order, 'status' => true]);

}






public function notification(Request $req){
    $notifications=$req->user()->notifications;



    // foreach ($user->unreadNotifications as $notification) {
    //     echo $notification->type;
    // }
// $order=Order::where('cin_no',$cin_no)->get();
// dd($notifications->type);

return response()->json(['data' => $notifications, 'status' => true]);

}







}

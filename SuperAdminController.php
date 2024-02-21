<?php

namespace App\Http\Controllers;

use App\Models\About_us;
use App\Models\Banner;
use App\Models\Catalog;
use App\Models\Category;
use App\Models\Daily_limit;
use App\Models\Point_amount;
use App\Models\Point_history;
use App\Models\Privacy_policy;
use App\Models\Product_category;
use App\Models\Role;
use App\Models\Scheme;
use App\Models\Series_product;
use App\Models\Social_media;
use App\Models\Term_and_conditions;
use App\Models\Transaction_history;
use App\Models\User;
use App\Models\Feedback;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SuperAdminController extends Controller
{
    public function dashboard()
    {
        return view('super-admin.dashboard');
    }

    public function users()
    {
        $users = User::with('roles')->where('role', '!=', 1)->get();
        return view('super-admin.users', compact('users'));
    }

    public function manageRole()
    {
        $users = User::where('role', '!=', 1)->get();
        $roles = Role::all();
        return view('super-admin.manage-role', compact(['users', 'roles']));
    }

    public function updateRole(Request $request)
    {
        User::where('id', $request->user_id)->update([
            'role' => $request->role_id
        ]);
        return redirect()->back();
    }


    public function feedback()
    {


        $feedback = Feedback::where('category', '=', 'feedback')->get();
        return view('super-admin/Dashboard/feedback', compact('feedback'));

    }





    public function complaint()
    {

        $feedback = Feedback::where('category', '=', 'complaints')->get();
        // $feedback=Feedback::all();
        return view('super-admin/Dashboard/complaints', compact('feedback'));
    }


    public function complaintStatus(Request $req)
    {


        $feedback = Feedback::where('id', '=', $req->id)->get();

        foreach ($feedback as $feedback) {
            $user = User::where('id', '=', $feedback->User_Id)->get();
        }

        $feedback = compact('feedback');

        // $feedback=Feedback::all();
        return view('super-admin/Dashboard/status', compact('user'))->with('feedback', $feedback);
    }



    public function updateComplaintStatus(Request $req)
    {


        $feedback = Feedback::where('id', $req->id)->update(['status' => 1]);

        return redirect()->back()->with('message', 'Status update Successfully');

    }


    public function termsandconditions()
    {

        $term = Term_and_conditions::all();
        return view('super-admin/Dashboard/terms-and-conditions', compact('term'));

    }


    public function dailyLimit()
    {

        $limit=Daily_limit::all();
        return view('super-admin/Dashboard/daily-limit',compact('limit'));
    }


    public function  updateDailyLimit(Request $req)
    {


        // $req->dealer;
        // $req->partner;

    Daily_limit::where('id', 1)->update(['electrician' =>$req->electrician,'dealer'=>$req->dealers,'partner'=>$req->Partners]);

        return redirect()->back()->with('message', 'Daily Limit update Successfully');

        // $limit=Daily_limit::where;
        // return view('super-admin/Dashboard/daily-limit',compact('limit'));
    }

















    public function termsandconditionsUpdate(Request $req)
    {



        $validator = Validator::make($req->all(), [
            "subject" => "required",
        ]);


        if ($validator->fails()) {
            return redirect()->back()->with('message', 'Enter Details!!');
        } else {


            Term_and_conditions::where("id", '=', 1)->update(['Subject' => $req->subject]);
            return redirect()->back()->with('message', ' Update Successfully');
        }
        // $feedback=Feedback::all();







        // return view('super-admin/Dashboard/terms-and-conditions');
    }





    public function socialMedia()
    {

        $term = Social_media::all();
        return view('super-admin/Dashboard/social-media', compact('term'));

    }


    public function socialMediaUpdate(Request $req)
    {


        Social_media::where("id", '=', 1)->update(['instagram' => $req->instagram, 'facebook' => $req->facebook, 'twitter' => $req->telegram, 'youtube' => $req->youtube, 'linkedin' => $req->linkedin]);

        // $term=Privacy_policy::all();
        return redirect()->back()->with('message', ' Update Successfully');

    }

    public function aboutUs()
    {

        $term = About_us::all();
        return view('super-admin/Dashboard/about_us', compact('term'));

    }



    public function aboutUsUpdate(Request $req)
    {

        About_us::where("id", '=', 1)->update(['Subject' => $req->subject]);

        // $term=Social_media::all();
        // return view('super-admin/Dashboard/about_us');
        return redirect()->back()->with('message', ' Update Successfully');

    }



    public function catalog()
    {

        // $term=About_us::all();
        return view('super-admin/Dashboard/catalog');

    }


    public function catalogUpdate(Request $req)
    {


        $image = $req->file('pdf');
        $imageName = time() . '.' . $image->extension();
        $image->storeAs('public/images', $imageName);


        Catalog::where("id", '=', 1)->update(['catalog' => $imageName]);

        // Catalog::create(['catalog' => $imageName]);

        // $term=About_us::all();
        return redirect()->back()->with('message', ' Update Successfully');


    }







    public function privacyPolicy()
    {

        $term = Privacy_policy::all();
        return view('super-admin/Dashboard/privacy-policy', compact('term'));

    }



    public function privacyPolicyUpdate(Request $req)
    {


        $validator = Validator::make($req->all(), [
            "subject" => "required",
        ]);


        if ($validator->fails()) {
            return redirect()->back()->with('message', 'Enter Details!!');
        } else {

            // Privacy_policy::create(['Subject'=>$req->subject]);

            Privacy_policy::where("id", '=', 1)->update(['Subject' => $req->subject]);
            return redirect()->back()->with('message', ' Update Successfully');
        }
    }



    public function pendingUser()
    {

        $user = User::where('status', '=', 'Pending')->get();
        return view('super-admin/Dashboard/panding-user-status', compact('user'));

    }




    public function  updatepPendingUser(Request $req)
    {

        if($req->type=="Approved"){

        $user = User::where('id', '=', $req->id)->update(['status'=>'Approved']);
        }elseif($req->type=="Suspended"){
        $user = User::where('id', '=', $req->id)->update(['status'=>'Suspended']);
        }elseif($req->type=="Block"){
            $user = User::where('id', '=', $req->id)->update(['status'=>'Block']);

        }elseif($req->type=="Pending"){
            $user = User::where('id', '=', $req->id)->update(['status'=>'Pending']);
        }
        // $user = User::where('status', '=', 'Pending')->get();
        // return view('super-admin/Dashboard/panding-user-status', compact('user'));
        return redirect()->back()->with('message', ' Update Successfully');

    }







    public function approvedUser()
    {

        $user = User::where('status', '=', 'Approved')->get();
        return view('super-admin/Dashboard/approved-user-status', compact('user'));

    }



    public function suspendedUser()
    {

        $user = User::where('status', '=', 'Suspended')->get();
        return view('super-admin/Dashboard/suspended-user-status', compact('user'));

    }



    public function blockUser()
    {

        $user = User::where('status', '=', 'Block')->get();
        return view('super-admin/Dashboard/block-user-status', compact('user'));

    }




    public function pointHistory()
    {


        $term=Point_history::orderBy('created_at', 'desc')->get();
    //    $user=User::All();
    //    $term=compact('term');
    //    $user=compact('user');
// dd($term);
        // $user=User::where('status','=','Block')->get();
        return view('super-admin/Dashboard/point-history',compact('term'));

    }




    public function deletePointHistory($id)
    {


        $term=Point_history::where('id', $id)->delete();
    //    $user=User::All();
    //    $term=compact('term');
    //    $user=compact('user');
// dd($term);
        // $user=User::where('status','=','Block')->get();
        return redirect()->back()->with('message', ' Delete Successfully');

    }



    public function transactionHistory()
    {


        $term=Transaction_history::where('status', 'Approved')->get();
    //    $user=User::All();
    //    $term=compact('term');
    //    $user=compact('user');
// dd($term);
        // $user=User::where('status','=','Block')->get();

        return view('super-admin/Dashboard/transaction-history',compact('term'));

    }



    public function  deletetransactionHistory($id)
    {


        $term=Transaction_history::where('id', $id)->delete();
    //    $user=User::All();
    //    $term=compact('term');
    //    $user=compact('user');
// dd($term);
        // $user=User::where('status','=','Block')->get();

        return redirect()->back()->with('message', ' Delete Successfully');

    }




    public function  seriesProduct()
    {


        $series=Series_product::all();
        // return redirect()->back()->with('message', ' Delete Successfully');
        return view('super-admin/Dashboard/Series-product',compact('series'));

    }






    public function  updateSeriesProduct(Request $req)
    {


if(empty($req->image)){

        $series=Series_product::where('id',$req->id)->update([
                'Series' => $req->series,
            ]
        );
    }else{


        $image = $req->file('image');
        // dd($image);
        $imageName = time() . '.' . $image->extension();
        $image->storeAs('public/images', $imageName);


        $series=Series_product::where('id',$req->id)->update([
            'Series' => $req->series,
            'image'=>$imageName,
        ]
    );

    }

        return redirect()->back()->with('message', 'Update Successfully');
        // return view('super-admin/Dashboard/Series-product',compact('series'));
    }










    public function  AddSeriesProduct(Request $req)
    {

        $validator = Validator::make($req->all(), [
            'series' => 'required',
            'image' => 'required|image',
            // Add more validation rules for other fields
        ]);
        if ($validator->fails()) {
            // Validation failed

            return redirect()->back()->with('message', "Fill All the Fields");

            // You can handle the validation errors here
        } else {
            // Validation passed
            // Proceed with your logic


        $image = $req->file('image');
        // dd($image);
        $imageName = time() . '.' . $image->extension();
        $image->storeAs('public/images', $imageName);


        $series=Series_product::create(['Series'=>$req->series,'image'=>$imageName]);
        // return redirect()->back()->with('message', ' Delete Successfully');
        // return view('super-admin/Dashboard/Series-product',compact('series'));
        return redirect()->back()->with('message', 'Series Add Successfully');
        }
    }








    public function  showallProduct()
    {


// $join=Product_category::join('series_product', 'series_product.id', '=', 'category.series_no')->get(['category.id','category.image','category.category','category.created_at','series_product.Series']);
// dd($join);

// $series=Series_product::all();
        // $series=Series_product::all();
        // return redirect()->back()->with('message', ' Delete Successfully');
        return view('super-admin/Dashboard/all-product');

    }






    public function  addProduct()
    {


// $join=Product_category::join('series_product', 'series_product.id', '=', 'category.series_no')->get(['category.id','category.image','category.category','category.created_at','series_product.Series']);
// dd($join);

// $series=Series_product::all();
        // $series=Series_product::all();
        // return redirect()->back()->with('message', ' Delete Successfully');
        return view('super-admin/Dashboard/add-new-product');

    }







    public function  showCategoriesProduct()
    {


$join=Product_category::join('series_product', 'series_product.id', '=', 'category.series_no')->get(['category.id','category.image','category.category','category.created_at','series_product.Series']);
// dd($join);

$series=Series_product::all();
        // $series=Series_product::all();
        // return redirect()->back()->with('message', ' Delete Successfully');
        return view('super-admin/Dashboard/categories-product',compact('join','series'));

    }









    public function  updateCategoriesProduct(Request $req)
    {


if(empty($req->image)){

        $series=Product_category::where('id',$req->id)->update([
                'category' => $req->category,
            ]
        );
    }else{


        $image = $req->file('image');
        // dd($image);
        $imageName = time() . '.' . $image->extension();
        $image->storeAs('public/images', $imageName);


        $series=Product_category::where('id',$req->id)->update([
            'category' => $req->category,
            'image'=>$imageName,
        ]
    );

    }

        return redirect()->back()->with('message', 'Update Successfully');
        // return view('super-admin/Dashboard/Series-product',compact('series'));
    }


    public function  addCategoriesProduct(Request $req)
    {

        $validator = Validator::make($req->all(), [
            'category' => 'required',
            'image' => 'required|image',
            'Series'=>'required'
            // Add more validation rules for other fields
        ]);
        if ($validator->fails()) {
            // Validation failed

            return redirect()->back()->with('message', "Fill All the Fields");

            // You can handle the validation errors here
        } else {


        $image = $req->file('image');
        $imageName = time() . '.' . $image->extension();
        $image->storeAs('public/images', $imageName);
        Product_category::create(['series_no'=>$req->Series,'category'=>$req->category,'image'=>$imageName]);
        }
// $join=Product_category::join('series_product', 'series_product.id', '=', 'category.series_no')->get(['category.image','category.category','category.created_at','series_product.Series']);
// // dd($join);

// $series=Series_product::all();
        // $series=Series_product::all();
        return redirect()->back()->with('message', 'Category Added Successfully');
        // return view('super-admin/Dashboard/categories-product',compact('join','series'));

    }




    public function  deleteCategoriesProduct($id)
    {
        $series=Product_category::where('id',$id)->delete();
        // return redirect()->back()->with('message', ' Delete Successfully');
        // return view('super-admin/Dashboard/Series-product',compact('series'));
        return redirect()->back()->with('message', 'Delete Successfully');

    }




    public function  deleteSeriesProduct($id)
    {
        $series=Series_product::where('id',$id)->delete();
        // return redirect()->back()->with('message', ' Delete Successfully');
        // return view('super-admin/Dashboard/Series-product',compact('series'));
        return redirect()->back()->with('message', 'Delete Successfully');

    }
    public function electricianProfile()
    {


        // $term=Point_history::orderBy('created_at', 'desc')->get();
       $user=User::where('profession','electrician')->get();

        // $user=User::where('status','=','Block')->get();
        return view('super-admin/Dashboard/electrican-user-profile',compact('user'));

    }



    public function dealerProfile()
    {


        // $term=Point_history::orderBy('created_at', 'desc')->get();
       $user=User::where('profession','dealer')->get();

        // $user=User::where('status','=','Block')->get();
        return view('super-admin/Dashboard/dealer-user-profile',compact('user'));

    }




    public function   partnerProfile()
    {


        // $term=Point_history::orderBy('created_at', 'desc')->get();
       $user=User::where('profession','partner')->get();

        // $user=User::where('status','=','Block')->get();
        return view('super-admin/Dashboard/partner-user-profile',compact('user'));

    }








    public function  userPointHistory($id)
    {

        $term=Point_history::where('User_id',$id)->orderBy('created_at', 'desc')->get();

        // $term=Point_history::orderBy('created_at', 'desc')->get();
       $user=User::where('profession','partner')->get();

        // $user=User::where('status','=','Block')->get();
        return view('super-admin/Dashboard/partner-user-profile',compact('user'));

    }














    public function pointAmount()
    {

        $amount = Point_amount::all();

        // $user=User::where('status','=','Block')->get();
        return view('super-admin/Dashboard/point-amount', compact('amount'));
    }


    public function pointAmountUpdate(Request $req)
    {

        $validator = Validator::make($req->all(), [
            'electrician' => 'required|numeric|between:0.01,9999.99',
            'dealer' => 'required|numeric|between:0.01,9999.99',
            'partner' => 'required|numeric|between:0.01,9999.99',
            // 'profession' => 'required|in:electrician,dealer,partner',
        ]);


        if($validator->fails()){



            return redirect()->back();
        }






        Point_amount::where("id", '=', 1)->update(['electrician' => $req->electrician,'dealer'=> $req->dealer,'partner'=>$req->partner]);

        // Point_amount::create(['amount'=>$req->amount]);
        // return view('super-admin/Dashboard/point-amount');

        return redirect()->back()->with('message', ' Update Successfully');

    }


    public function banner()
    {

        $banner = Banner::all();

        // $user=User::where('status','=','Block')->get();
        return view('super-admin/Dashboard/banner',compact('banner'));
    }



    public function deleteBanner($id)
    {

        $banner = Banner::where('id',$id)->delete();

        // $user=User::where('status','=','Block')->get();
        return redirect()->back()->with('message', ' Delete Successfully');

    }





    public function updateBanner(Request $req)
    {




        $image = $req->file('banner');
        $imageName = time() . '.' . $image->extension();
        $image->storeAs('public/images', $imageName);


        DB::statement('INSERT INTO banner(`banner`) VALUES("'.$imageName.'")');
        // Banner::create($imageName);
        // $amount = Point_amount::all();

        // $user=User::where('status','=','Block')->get();
        return redirect()->back()->with('message', '  Successfully Added');

    }







    public function pendingtransaction()
    {


        $history=Transaction_history::where('status','Pending')->get();
        // $banner = Banner::all();

        // $user=User::where('status','=','Block')->get();
        return view('super-admin/Dashboard/pending-transaction',compact('history'));
    }




    public function successtransaction()
    {


        $history=Transaction_history::where('status','Approved')->get();
        // $banner = Banner::all();

        // $user=User::where('status','=','Block')->get();
        return view('super-admin/Dashboard/success-transaction',compact('history'));
    }




    public function showScheme()
    {


        $scheme=Scheme::all();
        // $history=Transaction_history::where('status','Approved')->get();
        // $banner = Banner::all();

        // $user=User::where('status','=','Block')->get();
        return view('super-admin/Dashboard/scheme',compact('scheme'));
    }




    public function addScheme(Request $req)
    {


        $image = $req->file('image');
        $imageName = time() . '.' . $image->extension();
        $image->storeAs('public/images', $imageName);



        $scheme=Scheme::create(['for'=>$req->for,'title'=>$req->scheme,'image'=>$imageName,'point'=>$req->points,'status'=>'Active','upto'=>$req->upto]);
        // $history=Transaction_history::where('status','Approved')->get();
        // $banner = Banner::all();

        // $user=User::where('status','=','Block')->get();
        return redirect()->back()->with('message', '  Successfully Added');

    }








    public function showElectricianScheme()
    {

        $scheme2= Scheme::all();
    $scheme3=compact('scheme2');
    foreach ($scheme2 as $scheme) {

        if($scheme->upto<=date('d-m-Y')){
            $scheme->status="Active";
            }else{
                $scheme->status="Deactive";
        }
    }



        $scheme=Scheme::where('for','electrician')->get();
        // $history=Transaction_history::where('status','Approved')->get();
        // $banner = Banner::all();

        // $user=User::where('status','=','Block')->get();
        return view('super-admin/Dashboard/scheme',compact('scheme'));
    }





    public function showDealerScheme()
    {
        $scheme2= Scheme::all();
        $scheme3=compact('scheme2');
        foreach ($scheme2 as $scheme) {

            if($scheme->upto<=date('d-m-Y')){
                $scheme->status="Active";
                }else{
                    $scheme->status="Deactive";
            }
        }




        $scheme=Scheme::where('for','dealer')->get();
        // $history=Transaction_history::where('status','Approved')->get();
        // $banner = Banner::all();

        // $user=User::where('status','=','Block')->get();
        return view('super-admin/Dashboard/scheme',compact('scheme'));
    }



    public function showPartnerScheme()
    {
        $scheme2= Scheme::all();
        $scheme3=compact('scheme2');
        foreach ($scheme2 as $scheme) {

            if($scheme->upto<=date('d-m-Y')){
                $scheme->status="Active";
                }else{
                    $scheme->status="Deactive";
            }
        }




        $scheme=Scheme::where('for','partner')->get();
        // $history=Transaction_history::where('status','Approved')->get();
        // $banner = Banner::all();

        // $user=User::where('status','=','Block')->get();
        return view('super-admin/Dashboard/scheme',compact('scheme'));
    }






    public function failedtransaction()
    {


        $history=Transaction_history::where('status','Failed')->get();
        // $banner = Banner::all();

        // $user=User::where('status','=','Block')->get();
        return view('super-admin/Dashboard/failed-transaction',compact('history'));
    }




    public function updatetransaction(Request $req)
    {
$date=date('d-m-Y');
        if($req->type=="Approved"){
            $user = Transaction_history::where('id', '=', $req->id)->update(['status'=>'Approved','success_date'=>$date]);
            }elseif($req->type=="Failed"){
            $user = Transaction_history::where('id', '=', $req->id)->update(['status'=>'Failed','failed_date'=>$date]);


        }elseif($req->type=="Pending"){
                $user = Transaction_history::where('id', '=', $req->id)->update(['status'=>'Pending']);

            }
            // $user = User::where('status', '=', 'Pending')->get();
            // return view('super-admin/Dashboard/panding-user-status', compact('user'));
            return redirect()->back()->with('message', ' Update Successfully');

        // $history=Transaction_history::where('status','Pending')->get();
        // $banner = Banner::all();

        // $user=User::where('status','=','Block')->get();
        // return view('super-admin/Dashboard/pending-transaction',compact('history'));
    }
























}

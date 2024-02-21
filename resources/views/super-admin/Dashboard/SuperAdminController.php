<?php

namespace App\Http\Controllers;

use App\Models\About_us;
use App\Models\Catalog;
use App\Models\Daily_limit;
use App\Models\Point_amount;
use App\Models\Privacy_policy;
use App\Models\Role;
use App\Models\Social_media;
use App\Models\Term_and_conditions;
use App\Models\User;
use App\Models\Feedback;


use Illuminate\Http\Request;
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

        // $user=User::where('status','=','Block')->get();
        return view('super-admin/Dashboard/point-history');

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





















}

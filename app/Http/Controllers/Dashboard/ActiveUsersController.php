<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Series_product;
use App\Models\User;
use Illuminate\Http\Request;

class ActiveUsersController extends Controller
{
    public function electrician()
    {
        // $user = auth()->user();
        $UserProfiles = User::where('profession','electrician')->where('status','Approved')->get();
        return view('super-admin/Dashboard/Active-Users/electrican-all-user', compact('UserProfiles'));
    }

    public function dealer()
    {
        $UserProfiles = User::where('profession','dealer')->where('status','Approved')->get();

        $partner = User::where('profession','partner')->where('status','Approved')->get(['name','id']);


        return view('super-admin/Dashboard/Active-Users/dealer-all-user', compact('partner','UserProfiles'));
    }







    public function dealerfilter(Request $req)
    {
        $startDate = $req->start;
$endDate = $req->end;

        // $user = auth()->user();
        $UserProfiles = User::whereDate('created_at', '>=', $startDate)
        ->whereDate('created_at', '<=', $endDate)->where('profession','dealer')->where('status','Approved')
        ->get();

        $partner = User::where('profession','partner')->where('status','Approved')->get(['name','id']);

        // $UserProfiles=compact('UserProfiles');
        // return redirect()->back()->with('UserProfiles');

        return view('super-admin/Dashboard/Active-Users/dealer-all-user', compact('partner','UserProfiles'));
    }






    public function partnerFilter(Request $req)
    {
        $startDate = $req->start;
$endDate = $req->end;

        // $user = auth()->user();
        $UserProfiles = User::whereDate('created_at', '>=', $startDate)
        ->whereDate('created_at', '<=', $endDate)->where('profession','partner')->where('status','Approved')
        ->get();

        // $partner = User::where('profession','partner')->where('status','Approved')->get(['name','id']);

        // $UserProfiles=compact('UserProfiles');
        // return redirect()->back()->with('UserProfiles');

        return view('super-admin/Dashboard/Active-Users/partner-all-user', compact('UserProfiles'));
    }



    public function assignPartner(Request $req){


    User::where('id',$req->id)->update(['assign'=>$req->partner]);
        // $partner = User::where('profession','partner')->where('status','Approved')->get(['name','id']);


        // return view('super-admin/Dashboard/Active-Users/dealer-all-user', compact('partner','UserProfiles'));

        return redirect()->back()->with('message', 'Assign Partner Successfully');

    }






    public function seriesProductFilter(Request $req)
    {
        $startDate = $req->start;
$endDate = $req->end;

        // $user = auth()->user();
        $series = Series_product::whereDate('created_at', '>=', $startDate)
        ->whereDate('created_at', '<=', $endDate)
        ->get();
        // $UserProfiles=compact('UserProfiles');
        // return redirect()->back()->with('UserProfiles');

        return view('super-admin/Dashboard/Series-product',compact('series'));

        }





    public function showallProductFilter(Request $req)
    {
        $startDate = $req->start;
$endDate = $req->end;

        // $user = auth()->user();
        $product=Product::whereDate('product.created_at', '>=', $startDate)
        ->whereDate('product.created_at', '<=', $endDate)->join('category', 'product.category', '=', 'category.id')
        ->join('series_product', 'product.series', '=', 'series_product.id')
        ->get(['product.*', 'category.category','series_product.Series']);


        // $UserProfiles=compact('UserProfiles');
        // return redirect()->back()->with('UserProfiles');

        // return view('super-admin/Dashboard/Active-Users/electrican-all-user', compact('UserProfiles'));

        return view('super-admin/Dashboard/all-product',compact('product'));
    }







    public function electricianfilter(Request $req)
    {
        $startDate = $req->start;
$endDate = $req->end;

        // $user = auth()->user();
        $UserProfiles = User::whereDate('created_at', '>=', $startDate)
        ->whereDate('created_at', '<=', $endDate)->where('profession','electrician')->where('status','Approved')
        ->get();
        // $UserProfiles=compact('UserProfiles');
        // return redirect()->back()->with('UserProfiles');

        return view('super-admin/Dashboard/Active-Users/electrican-all-user', compact('UserProfiles'));
    }




    public function partner()
    {

        $UserProfiles = User::where('profession','partner')->where('status','Approved')->get();


        return view('super-admin/Dashboard/Active-Users/partner-all-user', compact('UserProfiles'));
    }

    public function userProfile($id)
    {
        // $user = auth()->user();
        $UserProfiles = User::where('id',$id)->get();
        return view('super-admin/Dashboard/user-profile', compact('UserProfiles'));
    }






}

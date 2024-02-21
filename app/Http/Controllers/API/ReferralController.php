<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Point_history;
use App\Models\Refferal;
use App\Models\Reward;
use App\Models\User;
use App\Models\UserReward;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReferralController extends Controller
{
    public function processReferral($referral,$user)
    {
        $refferal_user = User::find($referral);
        $user_id = User::find($user);
        // dd($user_id);
        Point_history::create([
            'Reference' => $referral,
            'User_id' => $user,
            'Point' => '51',
            'name' => $user_id->name,
            'cin_no' => $user_id->uniq_id,
            'city' => $user_id->city,
            'proffession'=> $user_id->profession,
            'mobile_no'=> $user_id->mobile_no,
        ]);
        Refferal::create([
            'from_user_id' => $referral,
            'to_user_id' => $user,
        ]);
        $now = Carbon::now();
        DB::table('rewards')->insert([
            'name' => $user_id->name,
            'points' => '51',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $rewardId = DB::getPdo()->lastInsertId();
        UserReward::create([
            'user_id'=>$user,
            'reward_id'=>$rewardId,
            'points'=>'51',
        ]);
        return back();
    }
}

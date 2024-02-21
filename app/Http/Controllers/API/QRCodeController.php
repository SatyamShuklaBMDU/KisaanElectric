<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Controllers\Controller;
use App\Models\Point_history;
use App\Models\Reward;
use App\Models\UserReward;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;

class QRCodeController extends BaseController
{



    public function saveScannedData(Request $request)
    {

        // $data = $request->input('scanned_data');
        $data = $request->qrcode;


     // Access the authenticated user
        $user = $request->user();
        $userId=$user->id;
        $profession=$user->profession;



if(empty($data)){
            return response()->json([],404);
}





        if ($this->hasUserScanned($userId, $data)) {
            return response()->json(['message' => 'You have already scanned this QR code. No additional rewards.'],200);

        }

        // Check if the reward exists in the database
        $userRewards = $this->getUserRewards($data,$profession);




        if (!$userRewards) {
            return response()->json(['message' => 'Invalid QR code.','status' => false],200);
        }else{

        $this->markRewardAsCollected($userId, $userRewards['Sno'], $userRewards['points']);

        Point_history::create(['User_id'=>$userId,'Point'=>$userRewards['points'],'QR_Code'=>$data,'cin_no'=>$user->uniq_id,'name'=>$user->name,'city'=>$user->city,'proffession'=>$user->profession,'mobile_no'=>$user->mobile_no]);

        return response()->json(['message' => 'Scanned data saved successfully', 'rewards' => $userRewards,'status' => true],200);
    }}

    private function markRewardAsCollected($userId, $rewardId, $points)
    {
        Reward::where('Sno', $rewardId)
        ->where('status', 1)
        ->update(['status' => 2]);


    // // Create a UserReward record
    // $userReward = new UserReward([
    //     'user_id' => $userId,
    //     'reward_id' => $rewardId,
    //     'points' => $points,
    // ]);


    $userReward= new UserReward;
    $userReward->user_id=$userId;
    $userReward->reward_id=$rewardId;
    $userReward->points=$points;
    $userReward->save();

        // Reward::where('id', $userRewards['id'])
        //     ->where('status', 'active') // Only mark active rewards
        //     ->update(['status' => 'inactive']);
    }

    private function hasUserScanned($userId, $scannedData)
    {
        // You may need to check your cache configuration to ensure it's working correctly.
        return Cache::has($this->getCacheKey($userId, $scannedData));
    }

    private function getUserRewards($scannedData,$profession)
    {
        $reward = null;

        Log::debug("Scanned Data: $scannedData");
        $reward = Reward::where('QR_Code', $scannedData)
            ->where('status', 1)
            ->where('profession',$profession)
            ->first();

        if ($reward) {

            // return response()->json(['message' => 'Invalid QR code.']);
      return ['name' => $reward->Product_Name, 'points' => $reward->Points,'Sno' => $reward->Sno];
        }

        return null;
    }

    private function getCacheKey($userId, $scannedData)
    {
        return "user:$userId:scanned:$scannedData";
    }





    // for show rewards
//     public function getUserProfile(Request $request)
// {
//     $userId = $request->user()->id;

//     // Calculate the total points for the user
//     $totalPoints = UserReward::where('user_id', $userId)->sum('points');

//     // Fetch other user data as needed
//     $userData = User::find($userId);

//     return response()->json([
//         'user' => $userData,
//         'total_points' => $totalPoints,
//     ]);
// }


// *****************This line for access and sum the rewards of user*****************************
// $points = $this->getUserRewards($data)['points'];




}

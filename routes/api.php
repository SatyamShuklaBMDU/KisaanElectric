<?php

use App\Http\Controllers\API\PrivacyController;
use App\Http\Controllers\Dashboard\FeedbackController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\ForgotPasswordController;
use App\Http\Controllers\API\QRCodeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::prefix('api')->middleware(['api'])->group(function () {
//     // Authentication Routes
//     Route::post('login', 'Auth\LoginController@login')->name('login');
//     Route::post('logout', 'Auth\LoginController@logout')->name('logout');
//     Route::post('register', 'Auth\RegisterController@register')->name('register');
//     Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//     Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
//     Route::get('/register', [LoginController::class, 'loadRegister'])->name('api.register');

//     // Add other necessary routes as needed

//     // For email verification (optional)
//     Route::post('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
//     Route::post('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
// });

// Route::post('login', 'API\UserController@login');
// Route::post('register', 'API\UserController@register');
// Route::group(['middleware' => 'auth:api'], function(){
// Route::post('details', 'API\UserController@details');
// });

Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [LoginController::class, 'login']);
Route::middleware('auth:sanctum')->post('user/logout', [LoginController::class, 'logout']);
Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetOtp']);


// routes/web.php or routes/api.php

Route::middleware('auth:sanctum')->group(function () {
    // Your authenticated routes go here
    Route::post('scan-qr-code', [QRCodeController::class, 'saveScannedData']);
    // Route::post('feedback', [FeedbackController::class, 'feedback']);
    Route::post('feedback', [FeedbackController::class, 'feedback']);
    Route::post('privacy_policy', [PrivacyController::class, 'privacy_policy']);
    Route::post('social_media', [PrivacyController::class, 'socialMedia']);
    Route::post('about_us',[PrivacyController::class,'aboutUs']);
    Route::post('catalog',[PrivacyController::class,'catalog']);
    Route::post('perpoint/amount',[PrivacyController::class,'perPointAmount']);
    Route::post('daily_limit',[PrivacyController::class,'dailyLimit']);
    Route::post('changepassword',[PrivacyController::class,'changePassword']);
    Route::post('pointhistory',[PrivacyController::class,'pointhistory']);
    Route::post('profileinfo',[PrivacyController::class,'profileInfo']);
    Route::post('transferinfo',[PrivacyController::class,'transferInfo']);
    Route::post('documentinfo',[PrivacyController::class,'documentInfo']);
    Route::post('aditionalinfo',[PrivacyController::class,'aditionalInfo']);
    Route::post('walletinfo',[PrivacyController::class,'walletInfo']);
    Route::post('mainpage',[PrivacyController::class,'mainPage']);
    Route::post('transactionhistory',[PrivacyController::class,'transactionHistory']);
    Route::post('scheme',[PrivacyController::class,'scheme']);
    Route::post('allSeries',[PrivacyController::class,'allSeries']);
    Route::post('allCategory',[PrivacyController::class,'allCategory']);
    Route::post('allProduct',[PrivacyController::class,'allProduct']);
    Route::post('allProductBySeries',[PrivacyController::class,'allProductBySeries']);
    Route::post('allProductByCategory',[PrivacyController::class,'allProductByCategory']);
    Route::post('productDetails',[PrivacyController::class,'productDetail']);
    Route::post('offer',[PrivacyController::class,'Offer']);
    Route::post('addToCart',[PrivacyController::class,'addToCart']);
    Route::post('Cart',[PrivacyController::class,'showCart']);
    Route::post('order',[PrivacyController::class,'Product_Order']);
    Route::post('orderhistory',[PrivacyController::class,'Order_history']);
    Route::post('updateQuantity',[PrivacyController::class,'updateQuantity']);
    Route::post('notification',[PrivacyController::class,'notification']);
});
Route::post('term_conditions', [FeedbackController::class, 'term_conditions']);
// Route::get('/generate-qr', 'QRCodeController@generateQR');

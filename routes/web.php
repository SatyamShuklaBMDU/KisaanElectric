<?php

use App\Http\Controllers\Dashboard\FeedbackController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard\ActiveUsersController;
use App\Http\Controllers\Dashboard\QrCodeController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\SubAdminController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
Use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UploadFileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});


Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/register', [LoginController::class, 'loadRegister']);
Route::post('/register', [LoginController::class, 'register'])->name('register');
Route::get('/login', [LoginController::class, 'loadLogin']);
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout']);



Route::group(['prefix' => 'super-admin','middleware'=>['web','isSuperAdmin']],function(){
    Route::get('/dashboard',[SuperAdminController::class,'dashboard']);
    Route::get('/users',[SuperAdminController::class,'users'])->name('superAdminUsers');
    Route::get('/manage-role',[SuperAdminController::class,'manageRole'])->name('manageRole');
    Route::post('/update-role',[SuperAdminController::class,'updateRole'])->name('updateRole');




});

// ********** Sub Admin Routes *********
Route::group(['prefix' => 'sub-admin','middleware'=>['web','isSubAdmin']],function(){
    Route::get('/dashboard',[SubAdminController::class,'dashboard']);


});

// ********** Admin Routes *********
Route::group(['prefix' => 'admin','middleware'=>['web','isAdmin']],function(){
    Route::get('/dashboard',[AdminController::class,'dashboard']);
});

// ********** User Routes *********
Route::group(['middleware'=>['web','isUser']],function(){
    Route::get('/dashboard',[UserController::class,'dashboard']);
});


Route::get('/electrican-all-user',[ActiveUsersController::class,'electrician']);

Route::post('/electrican-all-user/filter',[ActiveUsersController::class,'electricianfilter']);

Route::get('/user-profile/{id}',[ActiveUsersController::class,'userProfile']);

Route::get('/dealer-all-user',[ActiveUsersController::class,'dealer']);

Route::post('/dealer-all-user/filter',[ActiveUsersController::class,'dealerfilter']);


Route::post('/assignPartner',[ActiveUsersController::class,'assignPartner']);
Route::get('/partner-all-user',[ActiveUsersController::class,'partner']);

Route::post('/partner-all-user/filter',[ActiveUsersController::class,'partnerFilter']);


Route::get('/feedback',[SuperAdminController::class,'feedback']);
Route::get('/feedback',[SuperAdminController::class,'feedback']);
Route::get('/date-filter-',[SuperAdminController::class,'feedback']);

Route::get('scheme-history',[SuperAdminController::class,'showSchemeHistory']);




Route::get('/pending-scheme-deliver',[SuperAdminController::class,'pendingschemedeliver']);


Route::get('scheme_history/delete/{id}',[SuperAdminController::class,'deleteSchemeHistory']);

Route::get('order-history',[SuperAdminController::class,'showOrderHistory']);

Route::get('order-history/delete/{id}',[SuperAdminController::class,'deleteOrderHistory']);

Route::get('dealer-order',[SuperAdminController::class,'dealerOrder']);

Route::post('dealer-order/status',[SuperAdminController::class,'dealerOrderStatus']);

Route::get('invoice/{id}',[SuperAdminController::class,'invoice']);


Route::get('pdfview',array('as'=>'pdfview','uses'=>'SuperAdminController@pdfview'));




Route::post('/feedback/delete/1',[FeedbackController::class,'deleteFeedback']);
Route::get('/status/{id}',[SuperAdminController::class,'complaintStatus']);
Route::get('/status/update/{id}',[SuperAdminController::class,'updateComplaintStatus']);


Route::get('/point-history/{id}',[SuperAdminController::class,'userPointHistorys']);

Route::get('/banner',[SuperAdminController::class,'banner']);

Route::post('/banner/update',[SuperAdminController::class,'updateBanner']);


Route::get('/banner/delete/{id}',[SuperAdminController::class,'deleteBanner']);















Route::get('/complaints',[SuperAdminController::class,'complaint']);
Route::get('/terms-and-conditions',[SuperAdminController::class,'termsandconditions']);

Route::post('/terms-and-conditions/update',[SuperAdminController::class,'termsandconditionsUpdate']);


Route::get('/privacy-policy',[SuperAdminController::class,'privacyPolicy']);
Route::post('/privacy-policy/update',[SuperAdminController::class,'privacyPolicyUpdate']);

Route::get('/social-media',[SuperAdminController::class,'socialMedia']);

Route::post('/social-media/update',[SuperAdminController::class,'socialMediaUpdate']);
Route::get('/about_us',[SuperAdminController::class,'aboutUs']);

Route::post('/about_us/update',[SuperAdminController::class,'aboutUsUpdate']);

Route::get('/catalog',[SuperAdminController::class,'catalog']);

Route::post('/catalog/update',[SuperAdminController::class,'catalogUpdate']);

Route::get('/panding-user-status',[SuperAdminController::class,'pendingUser']);


Route::post('/panding-user-status/filter',[SuperAdminController::class,'pendingUserFilter']);


Route::post('/pending-user/update',[SuperAdminController::class,'updatepPendingUser']);



Route::get('/approved-user-status',[SuperAdminController::class,'approvedUser']);


Route::post('/approved-user-status/filter',[SuperAdminController::class,'approvedUserfilter']);


Route::get('/suspended-user-status',[SuperAdminController::class,'suspendedUser']);

Route::post('/suspended-user-status/filter',[SuperAdminController::class,'suspendedUserFilter']);


Route::get('/block-user-status',[SuperAdminController::class,'blockUser']);

Route::post('/block-user-status/filter',[SuperAdminController::class,'blockUserFilter']);


Route::get('/point-history',[SuperAdminController::class,'pointHistory']);


Route::get('/point-amount',[SuperAdminController::class,'pointAmount']);

Route::post('/point-amount/update',[SuperAdminController::class,'pointAmountUpdate']);


Route::get('/daily-limit',[SuperAdminController::class,'dailyLimit']);

Route::post('/daily-limit/update',[SuperAdminController::class,'updateDailyLimit']);
Route::get('/electrican-user-profile',[SuperAdminController::class,'electricianProfile']);
Route::post('/electrican-user-profile/filter',[SuperAdminController::class,'electricianProfileFilter']);
Route::get('/dealer-user-profile',[SuperAdminController::class,'dealerProfile']);
Route::post('/dealer-user-profile/filter',[SuperAdminController::class,'dealerProfileFilter']);


Route::get('/partner-user-profile',[SuperAdminController::class,'partnerProfile']);

Route::post('/partner-user-profile/filter',[SuperAdminController::class,'partnerProfileFilter']);


Route::get('/success-transaction',[SuperAdminController::class,'successtransaction']);
Route::get('/failed-transaction',[SuperAdminController::class,'failedtransaction']);

Route::get('/scheme',[SuperAdminController::class,'showScheme']);
Route::post('/scheme/add',[SuperAdminController::class,'addScheme']);
Route::get('/scheme/electrician',[SuperAdminController::class,'showElectricianScheme']);
Route::get('/scheme/dealer',[SuperAdminController::class,'showDealerScheme']);
Route::get('/scheme/partner',[SuperAdminController::class,'showPartnerScheme']);
Route::post('/scheme/add',[SuperAdminController::class,'addScheme']);












Route::get('/pending-transaction',[SuperAdminController::class,'pendingtransaction']);
Route::post('/pending-transaction/update',[SuperAdminController::class,'updatetransaction']);



Route::get('/point-history/delete/{id}',[SuperAdminController::class,'deletePointHistory']);


Route::get('/transaction-history',[SuperAdminController::class,'transactionHistory']);
Route::get('/transaction-history/{id}',[SuperAdminController::class,'usertransactionHistory']);

Route::get('/transaction-history/delete/{id}',[SuperAdminController::class,'deletetransactionHistory']);

Route::get('/Series-product',[SuperAdminController::class,'seriesProduct']);

Route::post('/Series-product/filter',[ActiveUsersController::class,'seriesProductFilter']);


// Route::post('/Series-product/filter',[SuperAdminController::class,'seriesProductFilter']);


Route::post('/Series-product/update',[SuperAdminController::class,'updateSeriesProduct']);

Route::post('Series-product/add',[SuperAdminController::class,'AddSeriesProduct']);

Route::get('Series-product/delete/{id}',[SuperAdminController::class,'deleteSeriesProduct']);

Route::get('/categories-product',[SuperAdminController::class,'showCategoriesProduct']);

Route::post('/categories-product/filter',[SuperAdminController::class,'showCategoriesProductFilter']);

Route::post('/categories-product/add',[SuperAdminController::class,'addCategoriesProduct']);
Route::get('/categories-product/delete/{id}',[SuperAdminController::class,'deleteCategoriesProduct']);

Route::get('/all-product',[SuperAdminController::class,'showallProduct']);

Route::post('/all-product/filter',[ActiveUsersController::class,'showallProductFilter']);



Route::get('/add-new-product',[SuperAdminController::class,'addProduct']);
Route::get('/edit-product/{id}',[SuperAdminController::class,'editProduct']);


Route::get('/product/delete/{id}',[SuperAdminController::class,'deleteProduct']);


Route::get('offer',[SuperAdminController::class,'showOffer']);

Route::post('/offer/add',[SuperAdminController::class,'addOffer']);


Route::post('/offer/update',[SuperAdminController::class,'updateOffer']);



Route::post('notification/send',[SuperAdminController::class,'sendNotification']);





Route::post('/add-new-product/add',[SuperAdminController::class,'addOneProduct']);



Route::get('notification',[SuperAdminController::class,'notification']);



Route::post('/categories-product/update',[SuperAdminController::class,'updateCategoriesProduct']);






Route::get('/qrcode',[QrCodeController::class,'qrCode']);
Route::post('/qrcode',[QrCodeController::class,'addCategory']);


Route::get('/qr-code-view/{id}',[QrCodeController::class,'qrCodeView']);
Route::post('/qr-code-view/{id}',[QrCodeController::class,'updatePoints']);
Route::post('/qr-code-view/update',[QrCodeController::class,'updateGroup'])->name('qr-code-view_update');

Route::post('/qr-code-view/updatePoints/1',[QrCodeController::class,'updateAllPoints']);
Route::post('/qr-code-view/delete/1',[QrCodeController::class,'deleteGroup']);





Route::post('/qr-code-view/delete/{id}',[QrCodeController::class,'delete']);


Route::post('/upload-excel', [UploadFileController::class, 'uploadExcel'])->name('upload-excel');
Route::get('/qr-code',[QrCodeController::class,'qr_Code']);




// Route::get('/pending-scheme-deliver',[QrCodeController::class,'pendingschemedeliver']);


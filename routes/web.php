<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\AdController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;



// Route::get('/', function () {
//     return view('welcome');
// });

// Frontend Routes Start Here..........................................
Route::controller(HomeController::class)->group(function(){
    Route::get('/','index');
    Route::get('/about-us','about_us');
    Route::get('/category/{data}','category');
    Route::get('/ads-category/{category}/{subcategory}','ads_category');
    Route::get('/categories','categories');
    Route::get('/support','support');
    Route::get('/terms-condition','terms_conditions');
    Route::get('/faq','faq');
    Route::get('/premium-ads/{data}','ads');
    Route::get('/ad-details/{data}','ad_details');
    Route::get('/ad-report/{data}','ad_report');
    Route::post('/submit_report','submit_report');
    Route::post('/submit_adreport','submit_adreport');
    Route::get('/privacy-policy','privacy_policy');
    Route::get('/payment-success','payment_success');
    Route::get('/payment-error','payment_error');
    Route::get('/search-result','search_result');
    Route::get('/search-city/{data}','search_city');
    
    Route::get('/app-privacy-policy','app_privacy_policy');
    Route::get('/app-terms-condition','app_terms_conditions');
    


});
Route::post('/contact_submit',[ContactController::class,'store']);

Route::controller(UserController::class)->group(function(){
    Route::get('/login','index');
    Route::get('/register','register');
    Route::post('/newRegister','newRegister');
    Route::post('/userLogin','userLogin');
    Route::get('/signout','signout');

    Route::get('/forgot-password','forgot_password');
    Route::get('/clear_all','clear_all');
    Route::get('/resend_otp','resend_otp');
    Route::post('/checkemail_sendotp','checkemail_sendotp');
    Route::post('/updatePassword','updatePassword');
    
});

Route::group(['middleware'=>'user'],function(){
    Route::get('/dashboard',[UserController::class,'dashboard']);
    Route::get('/wishlist',[UserController::class,'wishlist']);
    Route::get('/user-profile',[UserController::class,'userProfile']);
    Route::post('/update_profile',[UserController::class,'update_profile']);
    Route::get('/change-password',[UserController::class,'change_password']);
    Route::post('/update_password',[UserController::class,'update_password']);
    Route::resource('/ads', AdController::class);
    Route::get('/my-ads', [AdController::class,'my_ads']);
    Route::get('/offers', [AdController::class,'offers']);
    Route::post('/ads/get_subcategory',[AdController::class,'get_subcategory']);
    Route::post('/ads/delete_ad',[AdController::class,'delete_ad']);
    Route::post('/ads/delete_ad_image',[AdController::class,'delete_ad_image']);
    Route::post('/ads/delete_wishlist',[WishlistController::class,'delete_wishlist']);

    //payment section
    Route::get('/add_payment',[PaymentController::class,'add_payment']);
    Route::get('/payment',[PaymentController::class,'payment']);
    Route::post('/pay',[PaymentController::class,'pay']);
    
    //wishlist section
    Route::post('/add_wishlist',[WishlistController::class,'add_wishlist']);
    
});

// Frontend Routes End Here..........................................


// Admin Routes Start Here..........................................
Route::controller(AdminController::class)->group(function(){
    Route::get('/admin','index');
    Route::post('/admin_login','admin_login');
    Route::get('/admin/admin_logout','admin_logout');
});


Route::group(['middleware'=>'admin'],function(){
    Route::get('/admin/dashboard',[AdminController::class,'dashboard']);
    Route::resource('/admin/category', CategoryController::class);
    Route::resource('/admin/subcategory', SubcategoryController::class);
    Route::resource('/admin/package', PackageController::class);
    Route::resource('/admin/city', CityController::class);
    Route::resource('/admin/banner', BannerController::class);
    Route::resource('/admin/testimonial', TestimonialController::class);
    Route::resource('/admin/faq', FaqController::class);

    Route::get('/admin/contacts', [ContactController::class,'index']);
    Route::get('/admin/users', [AdminController::class,'users']);
    Route::get('/admin/edit-users/{data}', [AdminController::class,'edit_users']);
    Route::post('/admin/update_user', [AdminController::class,'update_user']);
    Route::post('/admin/delete_user', [AdminController::class,'delete_user']);
    Route::post('/admin/delete_contacts', [ContactController::class,'delete_contacts']);
    Route::get('/admin/profile',[AdminController::class,'profile']);
    Route::post('/admin/update_profile',[AdminController::class,'update_profile']);
    Route::post('/admin/update_password',[AdminController::class,'update_password']);
    Route::get('/admin/change-password',[AdminController::class,'change_password']);

    //ads
    Route::get('/admin/ads', [AdController::class,'ads']);
    Route::get('/admin/report-ads', [AdController::class,'report_ads']);
    Route::get('/admin/edit-ads/{data}', [AdController::class,'edit_ads']);
    Route::post('/admin/update_ads', [AdController::class,'update_ads']);
    Route::post('/admin/deleteAds', [AdController::class,'deleteAds']);
    Route::post('/admin/deleteAds2', [AdController::class,'deleteAds2']);
});

// Admin Routes End Here..........................................

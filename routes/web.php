<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

// Auth::routes(['verify' => true]);

Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('config:clear');
    echo "<p>Fully optimized.*</p>";
});

Route::get('/queue', function () {
    Artisan::call('queue:flush');
    Artisan::call('queue:work --tries=2');
});

Route::get('/flush', function () {
    Artisan::call('queue:flush');
    echo "<p>Queue Flush</p>";
});

Route::get('/stop', function () {
    Artisan::call('queue:pause');
    echo "<p>Queue Stopped</p>";
});

Route::get('/', 'HomeController@index')->name('index');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/faq', 'HomeController@faq')->name('faq');

Route::get('/resources', 'ResourceController@getResources')->name('user.resources');

Route::get('productimages/{filename}', function ($filename) {
    $realpath = base_path() . '/uploads/products'. '/' .$filename;
    return response()->download($realpath);
})->name('product.images');

Route::get('blog/{picture}', function($picture){
    $realpath = base_path() . '/uploads/blog'. '/' .$picture;
        return response()->download($realpath);
});

Route::get('singlecategory/{slug}', 'DashboardController@showcategory')->name('showcategory');
Route::post('submitcontact', 'DashboardController@submitContact')->name('submit.contact');

Route::get('/tac', function () {
   return view('tac');
})->name('tac');

// Route::middleware(['verified', 'auth', 'SwitchUser'])->group(function(){

//Select plan route
Route::middleware(['auth', 'SwitchUser'])->group(function(){ 
    Route::get('/selectplans', 'DashboardController@selectPlans')->name('selectplans');
    Route::get('upgradeplan/{old_plan}', 'DashboardController@upgradePlan')->name('plan.upgrade');
    Route::post('/checkout', 'DashboardController@checkout')->name('checkout');
    Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay');
    Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');
    Route::get('/withdrawal', 'PayoutController@showWithdrawal')->name('withdrawals');
    Route::get('/createwithdrawal', 'PayoutController@createWithdrawal')->name('withdrawals.create');
    Route::post('/submitwithdrawal', 'PayoutController@store')->name('withdrawals.submit');
    Route::delete('/submitwithdrawal', 'PayoutController@store')->name('withdraw.destroy');
    Route::post('/salespage', 'SalespageController@store')->name('salespages.submit');
    Route::get('/salespage', 'SalespageController@showsalespage')->name('salespage');
    Route::get('/submitsalespage/{id}', 'SalespageController@approve')->name('salespages.approve');
    Route::get('/unapprovesalespage/{id}', 'SalespageController@unapprove')->name('salespages.unapprove');
    Route::delete('/submitsalespage/{salespage}', 'SalespageController@destroy')->name('salespage.destroy');
    Route::get('update_profile/{id}', 'DashboardController@updateProfile')->name('update_profile');
    Route::delete('deletepayout/{id}', 'PayoutController@destroy')->name('payout.destroy');
        
});
//Auth Users route
Route::middleware(['auth', 'hasPlan', 'SwitchUser'])->group(function(){ 
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/products/single/{slug}', 'DashboardController@singleProduct')->name('product.single');
    
    Route::get('category/filter/{slug}', 'DashboardController@categoryFilter')->name('category.filter');
    Route::get('postfile/{filename}', 'ProductController@getfile')->name('get.file');
    Route::get('categoryfile/{filename}', 'CategoryController@getfile')->name('get.categoryfile');
    Route::get('upsellfile/{filename}', 'UpsellController@getfile')->name('get.upsellfile');
    Route::get('singleupsell/{slug}', 'DashboardController@singleUpsell')->name('single.upsell');
    Route::get('salespagefile/{filename}', 'ProductController@getsalespagefile')->name('get.salespagefile');
    Route::get('downloadsalespagefile/{filename}', 'DashboardController@downloadsalespagefile')->name('downloadsalespagefile');
    
    Route::get('planinfo', 'DashboardController@PlanInfo')->name('plan.info');
    Route::PATCH('saveprofile', 'DashboardController@saveProfile')->name('save_profile'); 
    Route::POST('suggestion', 'SuggestionController@store')->name('suggestion.store');
   
   
   });

//Admin  route
Route::middleware(['auth', 'isAdmin', 'SwitchUser'])->group(function(){ 
    Route::resource('plans', 'PlanController');
    Route::resource('category', 'CategoryController');
    Route::resource('products', 'ProductController');
    Route::post('productfilereplace', 'ProductController@replaceProductFile')->name('productfile.replace');
    Route::get('/resendproductemail/{id}', 'ProductController@resendEmail')->name('products.resend');
 
    Route::post('productfiledelete', 'ProductController@deleteProductFile')->name('productfile.delete');
    Route::post('upsellfiledelete', 'UpsellController@deleteUpsellFile')->name('upsellfile.delete');
    
    Route::resource('upsells', 'UpsellController');
    Route::resource('bestseller', 'BestSellerController');
    Route::post('postfilereplace', 'UpsellController@replaceUpsellFile')->name('upsellfile.replace');
    Route::resource('users', 'UserController');
    Route::resource('staff', 'StaffController');
    Route::resource('transactions', 'TransactionController');
    Route::resource('payouts', 'PayoutController');
    // Route::get('allsalespage', 'SalespageController@approve')->name('salespage.index');
    
    Route::get('/switch/{id}', 'SwitchUserController@index')->name('switchuser');
    Route::get('/stopswitching', 'SwitchUserController@stopSwitching')->name('stop.switchuser');
    Route::resource('settings', 'SettingsController');
    Route::get('adminprofile/{id}', 'PlanController@updateProfile')->name('admin.profile');
    Route::patch('adminprofile', 'PlanController@submitProfile')->name('submit.profile');
    Route::GET('suggestion', 'SuggestionController@index')->name('suggestion.index');
    Route::GET('suggestion/{id}/edit', 'SuggestionController@edit')->name('suggestion.edit');
    Route::DELETE('suggestion/{id}/delete', 'SuggestionController@destroy')->name('suggestion.destroy');
    Route::get('suggestionfile/{filename}', 'SuggestionController@getfile')->name('suggestion.file');
    Route::resource('ambassadors', 'AmbassadorController');
    Route::resource('testimonials', 'TestimonialController');
    Route::resource('resource', 'ResourceController');
    //Ck editor image upload
    Route::post('ckeditor/image_upload', 'CKEditorController@upload')->name('upload');

});

Auth::routes();


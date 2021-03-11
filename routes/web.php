<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController; 
use App\Http\Controllers\HomeController; 
use App\Http\Controllers\Payment; 
use App\Http\Controllers\ProjectController;



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

Route::get('/', [HomeController::class, 'index']);
Route::get('/website', [HomeController::class, 'website']);
Route::post('/submit-newsletter', [HomeController::class, 'submitNewsletter']);
Route::match(['get', 'post'],'google-ad/{id?}/{name?}/{response_id?}', [UserController::class, 'google_ad']);
Route::match(['get', 'post'],'profile', [UserController::class, 'profile'])->middleware('islogged')->middleware('user');
Route::match(['get', 'post'],'members', [HomeController::class, 'members'])->middleware('islogged')->middleware('user');
Route::get('/delete/member/{id}',[HomeController::class, 'deleteRef']);
Route::post('/update/members/{id}',[HomeController::class, 'updateRef']);
Route::get('/update/link/{id}',[HomeController::class, 'updatelink']);
Route::match(['get', 'post'],'facebook-ad/{id?}/{name?}/{response_id?}', [UserController::class, 'facebook_ad']);
Route::match(['get', 'post'],'product/{id?}/{name?}', [UserController::class, 'product'])->middleware('islogged')->middleware('user');
Route::match(['get', 'post'],'copypaste/{id?}/{name?}/{response_id?}', [UserController::class, 'copypaste']);
Route::match(['get', 'post'],'facebook-headline/{id?}/{name?}/{response_id?}', [UserController::class, 'facebook_headline']);
Route::match(['get', 'post'],'login', [UserController::class, 'login'])->name('login')->middleware('logged')->middleware('cors');
Route::match(['get', 'post'],'register', [UserController::class, 'register'])->name('register')->middleware('logged')->middleware('cors');
Route::get('logout', [UserController::class, 'flushSession']);
Route::match(['get', 'post'],'template', [UserController::class, 'template'])->name('template')->middleware('islogged')->middleware('user');
Route::match(['get', 'post'],'product-description/{id?}/{name?}/{response_id?}', [UserController::class, 'product_description'])->name('product_description');
//Route::match(['get', 'post'],'copypaste', [UserController::class, 'copy_paste'])->name('copy_paste')->middleware('islogged')->middleware('user');
Route::post('/checkmail', [UserController::class,'checkmail']);
//Update routes 
Route::match(['get', 'post'],'update-password', [UserController::class, 'update_password'])->name('update-password')->middleware('islogged');
/// update 
Route::post('update/facebook-ad', [UserController::class, 'update_facebookAd']);
Route::post('update/google-ad', [UserController::class, 'update_googleAd']);
Route::post('update/product-ad', [UserController::class, 'update_productAd']);
Route::post('update/facebook-headline', [UserController::class, 'update_facebook_headline']);
Route::post('update/copypaste-ad', [UserController::class, 'update_copypaste_ad']);



/// end update

Route::get('user/update/{id?}/{name?}', [UserController::class, 'update_userStatus']);
Route::post('update/profile', [UserController::class, 'update_profile']);
Route::post('update/company_info', [UserController::class, 'update_profile']);
Route::match(['get', 'post'],'password-recover', [UserController::class, 'password_recover'])->name('password-recover');
Route::match(['get', 'post'], 'update_password/{id?}/{name?}', [UserController::class,'recoverpassword']);

// Strip payment 
Route::post('subscription', [Payment::class, 'subscription']);
Route::post('pay-with-stripe/{token}', [Payment::class, 'payWithStripe']);
Route::get('user/setup-intent', [Payment::class, 'getSetupIntent']);
Route::post('user/payments', [Payment::class, 'postPaymentMethods']);
Route::post('user/subscription', [Payment::class, 'updateSubscription']);
Route::get('user/payment-methods', [Payment::class, 'getPaymentMethods']);
Route::post('user/remove-payment', [Payment::class, 'removePaymentMethod']);

//end 

Route::post('remove-ad', [UserController::class, 'remove_ad']);

// Added By Nitish
// Update user prject
Route::get('update-user-project/{project_id}', [ProjectController::class, 'updateUserProject']);
Route::get('delete-project/{project_id}', [ProjectController::class, 'deleteProject']);
Route::post('create-project', [ProjectController::class, 'createProject']);
Route::get('content', [ProjectController::class, 'allContents']);
Route::get('get-all-contents', [ProjectController::class, 'allContentsData']);
Route::get('get-all-favorites', [ProjectController::class, 'allFavoritesData']);
Route::get('get-all-trashed', [ProjectController::class, 'allTrashedsData']);
Route::get('get-content-details/{ads_response_id}', [ProjectController::class, 'getContentDetails']);
Route::get('delete-response/{ads_response_id}', [ProjectController::class, 'deleteResponse']);
Route::get('favourite/{ads_response_id}', [ProjectController::class, 'favourite']);
Route::post('update-response/{ads_response_id}', [ProjectController::class, 'updateResponse']);


// ADMIN ROUTES 
Route::match(['get', 'post'],'admin/login', [AdminController::class, 'login'])->middleware('logged')->middleware('cors');
Route::match(['get', 'post'],'admin/register', [AdminController::class, 'register'])->name('register')->middleware('logged');
Route::get('dashboard', [AdminController::class, 'index'])->middleware('islogged')->middleware('admin');
Route::get('users', [AdminController::class, 'index'])->middleware('islogged')->middleware('admin');
Route::get('trail-user', [AdminController::class, 'index'])->middleware('islogged')->middleware('admin');
Route::get('subscribe-user', [AdminController::class, 'index'])->middleware('islogged')->middleware('admin');
Route::get('cancelled-user', [AdminController::class, 'index'])->middleware('islogged')->middleware('admin');
Route::match(['get', 'post'],'manage-page', [AdminController::class, 'manage_page'])->middleware('islogged')->middleware('admin');
Route::match(['get', 'post'],'pricing', [AdminController::class, 'pricing'])->middleware('islogged')->middleware('admin');
Route::match(['get', 'post'],'logo/create', [AdminController::class, 'create_logo'])->middleware('admin');
Route::post('fetch_price', [AdminController::class, 'fetch_price']);
Route::get('remove-gif/{id?}', [AdminController::class, 'remove_gif'])->middleware('islogged')->middleware('admin');
Route::match(['get', 'post'],'g-tag', [AdminController::class, 'g_tag'])->middleware('islogged')->middleware('admin');



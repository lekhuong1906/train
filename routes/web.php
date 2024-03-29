<?php

use App\Mail\MailSuccess;
use App\Models\TicKet;
use App\Models\TypeTicket;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TypeTicketController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\StationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\CheckedController;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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

Route::get('/admin-login',[AdminController::class,'admin_login'])->name('admin-login');
Route::post('/admin-sign-in',[AdminController::class,'sign_in']);

//forgot password
Route::get('/forgot-password',[AdminController::class,'forgot_password']);
Route::post('/submit-forgot-password',[AdminController::class,'submit_forgot_password']);
Route::get('/reset-password/{token}',[AdminController::class,'reset_password'])->name('reset.password.get');
Route::post('/update-password',[AdminController::class,'submit_reset_password'])->name('updated-password-admin');
Route::post('/reset-password',[HomeController::class,'submit_reset_password'])->name('updated-password-customer');

Route::group(['middleware'=>['auth']],function (){

    Route::get('/dashboard',[DashboardController::class,'dashboard']);

    //type_ticket
    Route::get('/add-type-ticket',[TypeTicketController::class,'add_type_ticket']);
    Route::get('/all-type-ticket',[TypeTicketController::class, 'all_type_ticket']);
    Route::get('/edit-type-ticket/{id}',[TypeTicketController::class, 'edit_type_ticket']);
    Route::post('/save-type-ticket',[TypeTicketController::class, 'save_type_ticket']);
    Route::post('/update-type-ticket/{id}',[TypeTicketController::class, 'update_type_ticket']);
    Route::get('/delete-type-ticket/{id}',[TypeTicketController::class,'delete_type_ticket']);

    //receipt
    Route::get('/all-receipt',[ReceiptController::class,'all_receipt']);
    Route::get('/receipt-detail/{id}',[ReceiptController::class,'receipt_detail']);

    //station
    Route::get('/add-station',[StationController::class,'add_station']);
    Route::get('/maps',[StationController::class,'maps']);
    Route::get('/all-station',[StationController::class,'all_station'])->name('all-station');
    Route::get('/edit-station/{id}',[StationController::class,'edit_station']);
    Route::post('/update-station/{id}',[StationController::class,'update_station']);
    Route::get('/delete-station/{id}',[StationController::class,'delete_station']);
    Route::post('/save-station',[StationController::class,'save_station']);

    //account user
    Route::get('/new-user',[AdminController::class,'new_user']);
    Route::get('/all-user',[AdminController::class,'all_user']);
    Route::post('/add-user',[AdminController::class,'add_user']);
    Route::get('/profile/{id}',[AdminController::class,'profile'])->name('profile');
    Route::post('/update-profile/{id}',[AdminController::class,'update_profile']);
    Route::get('/delete-user/{id}',[AdminController::class,'delete_user']);

    //logout
    Route::get('log-out',[AdminController::class,'log_out']);
});



//pages
Route::get('/',[HomeController::class,'home'])->name('home');

//customer-login
Route::get('/login',[HomeController::class,'login'])->name('customer-login');
Route::post('/sign-in',[HomeController::class,'sign_in']);
Route::get('/sign-up',[HomeController::class,'sign_up']);
Route::post('/save-account',[HomeController::class,'save_account']);

Route::group(['middleware'=>['customer-login']],function (){

    //payments
    Route::get('/create-receipt/{id}',[ReceiptController::class,'create_receipt']);
    Route::post('/save-receipt',[ReceiptController::class,'save_receipt']);
    Route::get('/check-out/{id}',[PaymentController::class,'checkout'])->name('check-out');
    Route::post('/payment',[PaymentController::class,'payment'])->name('payment');

    //account
    Route::get('/profile-customer/{id}',[HomeController::class,'profile_customer']);
    Route::post('/update-profile-customer/{id}',[HomeController::class,'update_profile_customer']);
    Route::get('/customer-log-out',[HomeController::class,'log_out']);


    //ticket information
    Route::get('/all-ticket',[TicketController::class,'all_ticket']);
    Route::get('/qrcode/{ticket_code}',[TicketController::class,'qrcode']);

    //maps
    Route::get('/maps-page',[StationController::class,'maps_page']);

});

//Checked ticket
Route::get('/checked-ticket',[CheckedController::class,'checked_ticket'])->name('checked_ticket');
Route::post('/submit-checked',[CheckedController::class,'submit_checked_ticket']);


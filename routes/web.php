<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TypeTicketController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TicketController;

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

Route::group(['middleware'=>['auth']],function (){

    Route::get('/dashboard',[AdminController::class,'dashboard']);

    //type_ticket
    Route::get('/add-type-ticket',[TypeTicketController::class,'add_type_ticket']);
    Route::get('/all-type-ticket',[TypeTicketController::class, 'all_type_ticket']);
    Route::get('/edit-type-ticket/{id}',[TypeTicketController::class, 'edit_type_ticket']);
    Route::post('/save-type-ticket',[TypeTicketController::class, 'save_type_ticket']);
    Route::post('/update-type-ticket/{id}',[TypeTicketController::class, 'update_type_ticket']);

    //receipt
    Route::get('/all-receipt',[ReceiptController::class,'all_receipt']);
    Route::get('/receipt-detail/{id}',[ReceiptController::class,'receipt_detail']);
    Route::get('/maps',[MapController::class,'maps']);

    Route::get('/profile',[UserController::class,'profile']);

    //logout
    Route::get('log-out',[AdminController::class,'log_out']);
});





//pages
Route::get('/',[HomeController::class,'home']);

//login
Route::get('/login',[HomeController::class,'login']);
Route::post('/sign-in',[HomeController::class,'sign_in']);
Route::get('/sign-up',[HomeController::class,'sign_up']);
Route::post('/save-account',[HomeController::class,'save_account']);

Route::group(['middleware'=>['customer-login']],function (){

    //payments
    Route::get('/create-receipt/{id}',[ReceiptController::class,'create_receipt']);
    Route::post('/save-receipt',[ReceiptController::class,'save_receipt']);
    Route::get('/check-out/{id}',[PaymentController::class,'checkout']);
    Route::post('/payment',[PaymentController::class,'payment']);

    //log out
    Route::get('/customer-log-out',[HomeController::class,'log_out']);

});

Route::get('/all-ticket',[TicketController::class,'all_ticket']);
Route::get('/qrcode/{ticket_code}',[TicketController::class,'qrcode']);

Route::get('/profiles',function (){
    return view('pages.account.profile');
})->name('profile');


Route::get('/test',function (){

});



<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\WebNotificationController;

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
    return view('welcome');
});


Route::get('/hello',[HomeController::class,'hello']);
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


// Route::post('/message',[MessageController::class,'broadcast']);


Route::get('/push-notificaiton', [WebNotificationController::class, 'index'])->name('push-notificaiton');
Route::post('/store-token', [WebNotificationController::class, 'storeToken'])->name('store.token');
Route::post('/send-web-notification', [WebNotificationController::class, 'sendWebNotification'])->name('send.web-notification');




Route::get('/insert',function()
{
    $name="helllo";
    $email="ffdfd@gmail.com";
    $address="fdsfds";
    $city="fdsfsafs";

    $user = \DB::select('CALL insert_user(?,?,?,?)',[$name,$email,$address,$city]);
    return "Insert";

});


Route::get('/delete-user/{id}', [HomeController::class, 'userDelete']);

Route::get('/edit-user', function () {
    return view('update');
});

Route::post('/update-user', [HomeController::class, 'updateUser'])->name('user-update');
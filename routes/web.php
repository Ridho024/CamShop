<?php

use App\Http\Controllers\BuyProductController;
use App\Http\Controllers\CameraController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\RoutingController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Controllers\Middleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [CameraController::class, 'home']);

// Product Info 
// Route::get('camera/{IdCamera}', [CameraController::class, 'showCamera'])->middleware('checkLogin');


// Login
Route::get('login', [LoginController::class, 'loginForm']);
Route::post('login-proses', [LoginController::class, 'loginProses']);
Route::get('logout', [LoginController::class, 'logout']);

// Registration
Route::get('registration', [RegistrationController::class, 'registrationView']);
Route::post('registration-proses', [RegistrationController::class, 'registrationProses']);

// Route::get('admin/{IdUser}', [LoginController::class, 'adminDashboard'])->name('adminDashboard');
// Route::get('/member', [LoginController::class, 'memberHomepage']);

// All Routing
Route::get('list-product', [RoutingController::class, 'listCamera'])->name('list-product');
Route::get('homepage', [RoutingController::class, 'homepage'])->name('homepage');
Route::get('login-required', [RoutingController::class, 'shouldLogin']);
Route::get('premiere-product', [RoutingController::class, 'premiereProduct']);


// Camera
Route::get('camera-info', function () {
    return redirect('/');
});
Route::get('camera-info/{camera_id}', [CameraController::class, 'cameraInfo']);



// Testing
// Route::get('testing', function () {
//     return view('testing');
// })->name('testing');

// Route::get('product/{product_id}', [CameraController::class, 'productInfo'])->middleware('auth');

// Route::get('apalah', function () {
//     return view('testing');
// })->name('apalah');

Route::get('adminview', function () {
    return view('routes/homepage/admin-dashboard');
});

// Proses Jual Beli
Route::get('camera-info/buy-product-form/{cameraID}', [BuyProductController::class, 'buyProduct']);
Route::get('buy-product-form/{cameraID}', [BuyProductController::class, 'buyProduct']);
Route::get('buy-product-form/{cameraID}/buy-process', [BuyProductController::class, 'buyProcess']);

// INVOICE
# Admin
Route::get('product-invoice/admin/{action}/{invoiceNumber}', [BuyProductController::class, 'adminAction']);
# Member/Customer
Route::get('product-invoice/member/{action}/{invoiceNumber}', [BuyProductController::class, 'memberAction']);
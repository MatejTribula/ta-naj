<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


use App\Http\Middleware\RedirectIfNotAuthenticated;
use App\Http\Middleware\CheckUserType;

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

// ANYONE
Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact/send', [HomeController::class, 'sendMail'])->name('sendMail');


Route::get('/products', [HomeController::class, 'products'])->name('products');
Route::get('/story', [HomeController::class, 'story'])->name('story');


Route::get('/redirect', [HomeController::class, 'redirect']);


// ONLY ADMIN
Route::middleware([CheckUserType::class])->group(function () {

    route::get('/product', [AdminController::class, 'product']);


    route::post('/upload-product', [AdminController::class, 'uploadProduct']);
    route::get('/show-products', [AdminController::class, 'showProducts']);

    route::get('/delete-product/{id}', [AdminController::class, 'deleteProduct']);
    route::get('/update-view/{id}', [AdminController::class, 'updateView']);
    route::post('/update-product/{id}', [AdminController::class, 'updateProduct']);


    route::get('/show-orders', [AdminController::class, 'showOrders']);
});




// ONLY AUTHENTICATED
Route::middleware([RedirectIfNotAuthenticated::class])->group(function () {
    route::post('/logout', function () {
        Auth::logout();
        return redirect('/');
    })->name('logout');


    route::post('/addcart/{id}', [HomeController::class, 'addCart']);


    route::get('/cart', [HomeController::class, 'showCart']);
    route::get('/delete/{id}', [HomeController::class, 'deleteCart']);

    route::get('/billing-info', [HomeController::class, 'billingInfo']);
    route::get('/summary', [HomeController::class, 'orderSummary'])->name('summary');

    route::post('/store-billing-info', [HomeController::class, 'storeBillingInfo'])->name('storeBillingInfo');
    route::post('/checkout', [HomeController::class, 'checkout']);
    route::get('/place-order', [HomeController::class, 'placeOrder'])->name('placeOrder');
    route::get('/payment-success', [HomeController::class, 'paymentSuccess'])->name('paymentSuccess');
    route::get('/payment-failure', [HomeController::class, 'paymentFailure'])->name('paymentFailure');
});















// Route::post('/contact/submit', 'ContactController@submit')->name('contact.submit');

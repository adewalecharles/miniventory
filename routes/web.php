<?php

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

Route::resource('admin', 'AdminController');



Route::get('/home', 'HomeController@index')->name('home');
Route::resource('brand', 'BrandController');
Route::resource('products', 'ProductController');
Route::resource('category', 'CategoryController');
Route::resource('company', 'CompanyController');
Route::resource('checkout', 'CheckoutController');
Route::get('/checkout/invoice/{reference}', 'CheckoutController@checkout');

Route::get('payment/pay', 'PaymentController@index')->name('payment-process');
Route::post('payment/pay', 'PaymentController@redirectToGateway')->name('pay');
Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');
});

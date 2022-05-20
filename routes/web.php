<?php

use Illuminate\Support\Facades\Route;
use App\User;

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

    // Testing sqlite works, using the users table
    // User::updateOrCreate([
    //     'email' => 'jdoe@gmail.com'
    // ],[
    //     'name' => 'John Doe',
    //     'email' => 'jdoe@gmail.com',
    //     'password' => bcrypt('password')
    // ]);

    // $users = User::all();

    // print_r($users);

});

// Routes
Route::get('/orders', 'ProductController@getOrders')->name('getOrders');
Route::get('/getSingleOrder/{id}', 'ProductController@getSingleOrder')->name('getSingleOrder');
Route::get('/getOrderDetails/{id}', 'ProductController@getOrderWithDetails')->name('getOrderWithDetails');

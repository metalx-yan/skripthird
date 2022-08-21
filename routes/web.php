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


Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:administrator']], function() {

    Route::get('/', function () {

        return view('admin.index');
    });

    Route::resource('categories', 'CategoryController');
    Route::resource('fasilities', 'FasilityController');
    Route::resource('members', 'MemberController');
    Route::resource('users', 'UserController');
    Route::resource('peminjamans', 'PeminjamanController');
    Route::put('/restore/{id}', 'BookingController@restore')->name('admin.restore');
    Route::put('/lists/{id}', 'BookingController@listsApprove')->name('customer.lists.approve');
    Route::get('/lists', 'BookingController@adminlists')->name('admin.lists');
    Route::get('/lists/history', 'BookingController@adminlistshistory')->name('admin.lists.history');


});

Route::group(['prefix' => 'member', 'middleware' => ['auth', 'role:member']], function() {

    Route::get('/', function () {
        return view('customer.index');
    });
    Route::get('/lists', 'BookingController@lists')->name('customer.lists');
});

Route::group(['prefix' => 'produksi', 'middleware' => ['auth', 'role:produksi']], function() {

    Route::get('/', function () {
        return view('produksis.index');
    });
    // Route::get('/spbspk', 'SpbSpkController@all')->name('spbspk');
});


Route::resource('bookings', 'BookingController');
Route::get('/', function () {

    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




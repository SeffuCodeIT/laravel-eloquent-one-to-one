<?php

use App\Models\Address;
use App\Models\User;
use Illuminate\Support\Facades\Route;
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

Route::get('/insertt', function () {
    $user = User::findOrFail(1);

    $address = new Address(['name' => '5678 Dagoretti Av Ny']);

    $user->addresses()->save($address);
});

Route::get('/update', function () {

    $address = Address::whereUserId(1)->first();
    $address->name = '1234 Riruta Av Ny';
    $address->save();

});

Route::get('/read', function () {
    $user = User::findOrFail(1);
    echo $user->addresses->name;
});

Route::get('/delete', function () {
    $user = User::findOrFail(1);
    $user->addresses()->delete();
});

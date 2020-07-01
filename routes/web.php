<?php

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

Route::get('/', 'HomeController@home')->name('home');
Route::get('category/{slug}', 'CategoryController@category')->name('category');
/*Contact_form*/
Route::get('/send/contact_form','ContactController@contact_form');

Route::post('/send/contact_form','ContactController@contact_form_send');
/*Contact_form end*/


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});







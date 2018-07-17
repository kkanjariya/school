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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('register','UserController@register')->name('Register');
Route::post('register','UserController@store')->name('Registers');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['role:admin']], function () {
            Route::get('admin-home','AdminController@home')->name('admin:home');
            Route::get('techar','AdminController@create')->name('add:techar');
            Route::post('techar','AdminController@store')->name('add:techar');

    });

    Route::group(['middleware' => ['role:admin|Techar']], function () {
        Route::get('user/{id}','AdminController@destroy')->name('destroy');
        Route::get('user-edit/{id}','AdminController@useredit')->name('edit');
        Route::post('user-edit/{id}','AdminController@update')->name('update:user');

    });
    Route::group(['middleware' => ['role:Techar']], function () {

            Route::get('techar-home','techar\TecharController@home')->name('techar:home');
            Route::get('add-student','techar\TecharController@create')->name('student');
            Route::post('add-student','techar\TecharController@store')->name('add:student');


    });
    Route::group(['middleware' => ['role:Student']], function () {

            Route::get('student-home','student\StudentController@show')->name('student:home');

    });
});

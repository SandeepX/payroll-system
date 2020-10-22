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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth','admin','status']], function (){
	
	Route::get('/dashboard','HomeController@admin')->name('admin');

	/****************department************/

	Route::prefix('/department')->group(function () {
		Route::get('/', 'departmentController@index')->name('department');
		Route::get('/show', 'departmentController@show')->name('showform');
		Route::post('/department/store','departmentController@store')->name('createDepartment');
		Route::delete('/department/destroy/{id}','departmentController@destroy')->name('departmentdelete');
		Route::get('/edit/{id}','departmentController@edit')->name('departmentedit');
		Route::put('/update/{id}','departmentController@update')->name('departmentUpdate');

	});

	/**********************employee**********/
		Route::resource('/Employee', 'EmployeeController');
		Route::post('/Employee/designation','EmployeeController@getdesignation')->name('getdesignation');

		Route::resource('/User', 'UserController');
		

	


});

Route::group(['prefix'=>'employee','middleware'=>['auth','status']],
	function(){
		Route::get('/','HomeController@employee')->name('employee');
		
});

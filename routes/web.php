<?php

use Illuminate\Support\Facades\Route;



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

	/******************User Route****************/

		Route::resource('/User', 'UserController');

	/**************Attendence Route**************/

		Route::resource('/Attendence','AttendenceController');
		Route::post('/Attendence/Employeelist','AttendenceController@getEmployee')->name('getEmployee');
		Route::post('/Attendence/Employeelist/store','AttendenceController@store')->name('storeEmployee');

	/**************holidays Route**************/
		Route::resource('/holiday' ,'HolidayController');
		

	


});

Route::group(['prefix'=>'employee','middleware'=>['auth','status']],
	function(){
		Route::get('/','HomeController@employee')->name('employee');
		
});

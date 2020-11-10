<?php

namespace App\Http\Controllers\Employee;
use Illuminate\Support\Facades\Route;
use Auth;



Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', 'HomeController@index')->name('home');

/************Activity log**************/

//Route::get('add-to-log', 'HomeController@myTestAddToLog');


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
	
	/**************Daily Route**************/
		Route::resource('/notice', 'NoticeController');
		Route::resource('/quote','QuoteController');

	/**************leave Route**************/
		Route::resource('/leave','LeaveController');
		Route::resource('/Employeeleave', 'EmployeeleaveController');

	/*********Activity log**************/

	Route::resource('/logActivity', 'ActivitylogController');


	/**************Settinng***************/
	Route::get('/change-password', 'ChangePasswordController@index');
	Route::post('/change-password', 'ChangePasswordController@store')->name('change.password');

	Route::resource('/configuration','CompanydetailController');
	
	Route::resource('/sitelogo','SitelogoController');


	/************payroll*************************/

	Route::resource('/payroll','PayrollController');
	Route::post('/payroll/Employee','PayrollController@getEmployee')->name('getEmployee');
	

	
	


});

Route::group(['prefix'=>'employee','middleware'=>['auth','status']],
	function(){
		Route::get('/','HomeController@employee')->name('employee');

		/***********Employee Setting**************/

		Route::get('/change-password', [ChangePasswordController::class, 'index']);
		Route::post('/change-password', [ChangePasswordController::class, 'store'])->name('employeechange.password');


		/*************Employee Holiday*************/

		Route::get('/holiday',[HolidayController::class, 'index']);

		/*************** Employee Payroll ******************/ 

		Route::get('/payroll',[PayrollController::class, 'index']);
		Route::get('/payroll/show/{id}',[PayrollController::class, 'show'])->name('downloadPdf');

		/*************** Employee Leave**********************/

		Route::get('/leave/applyform',[ApplyleaveController::class,'create'])->name('applyleave');
		Route::post('/leave/applyform',[ApplyleaveController::class,'store'])->name('leavestore');
		Route::get('/leave',[ApplyleaveController::class,'index'])->name('Leavelist');




});

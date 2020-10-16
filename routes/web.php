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


Route::get('/user' , function(){
    $user = new App\Models\User();
$user->password = Hash::make('123');
$user->email = 'admin@admin.com';
$user->name = 'Admin';
$user->save();
return "Saved";
});

Route::get('/', 'App\Http\Controllers\MainController@index')->name('home');




Route::get('login' , 'App\Http\Controllers\Auth\AuthController@login')->name('login');

Route::get('login-user' , 'App\Http\Controllers\Auth\AuthController@loginuser')->name('loginuser');
Route::get('logout', 'App\Http\Controllers\Auth\AuthController@logout')->name('logout');
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/', 'App\Http\Controllers\MainController@admin' )->name('dashboard');

Route::resource('company' , 'App\Http\Controllers\Admin\Company\CompanyController');
Route::resource('department' , 'App\Http\Controllers\Admin\Department\DepartmentController');
Route::resource('salary' , 'App\Http\Controllers\Admin\Salary\SalaryController');
Route::post('save_employee_salary_data' , 'App\Http\Controllers\Admin\Salary\SalaryController@save_employee_salary_data' )->name('save_employee_salary_data');


Route::resource('designation' , 'App\Http\Controllers\DesignationController');
Route::resource('salaryhead' , 'App\Http\Controllers\SalaryHeadController');
Route::resource('leavetype' , 'App\Http\Controllers\LeaveTypeController');
Route::resource('calendar' , 'App\Http\Controllers\LeaveCalendarController');

Route::resource('employee' , 'App\Http\Controllers\Admin\Employee\EmployeeController');
Route::resource('emi' , 'App\Http\Controllers\Admin\Employee\EmiController');
Route::resource('user' , 'App\Http\Controllers\Auth\UserController');


  
Route::get('attendace' , 'App\Http\Controllers\Admin\Employee\AttendanceController@index')->name('quick_att');
Route::get('daily' , 'App\Http\Controllers\Admin\Employee\AttendanceController@daily')->name('daily_att');


Route::get('show_attendace' , 'App\Http\Controllers\Admin\Employee\AttendanceController@show')->name('show_attendance');

Route::get('att_summary' , 'App\Http\Controllers\Admin\Employee\AttendanceController@att_summary')->name('att_summary');


Route::post('mark/{id}' , 'App\Http\Controllers\Admin\Employee\AttendanceController@mark')->name('mark');

Route::get('mark_detail/{id}' , 'App\Http\Controllers\Admin\Employee\AttendanceController@mark_detail')->name('mark_detail');
Route::post('mark_detail_post/{id}' , 'App\Http\Controllers\Admin\Employee\AttendanceController@mark_detail_post')->name('mark_detail_post');


Route::get('/report/EPF' , 'App\Http\Controllers\Report\EpfReportController@epf')->name('epf_index');
Route::get('/report/ESIC' , 'App\Http\Controllers\Report\EpfReportController@esic')->name('esic_index');
Route::get('/report/Department' , 'App\Http\Controllers\Report\EpfReportController@department')->name('department_index');
Route::get('/report/Balance' , 'App\Http\Controllers\Report\EpfReportController@balanceReport')->name('balance_index');
Route::get('/report/wages' , 'App\Http\Controllers\Report\EpfReportController@wages')->name('wages_index');


Route::match(array('GET', 'POST'),'/report/Balance/{id}/data_of_payment' , 'App\Http\Controllers\Report\EpfReportController@add_date_of_payment')->name('add_date_of_payment');




Route::get('/report/Government' , 'App\Http\Controllers\Report\EpfReportController@government')->name('goverment_index');
Route::get('/report/EPF/pdf' , 'App\Http\Controllers\Report\EpfReportController@export_epf_pdf')->name('export_epf_pdf');
Route::get('/report/ESIC/pdf' , 'App\Http\Controllers\Report\EpfReportController@export_esic_pdf')->name('export_esic_pdf');
Route::get('/report/Balance/pdf' , 'App\Http\Controllers\Report\EpfReportController@export_balance_sheet_pdf')->name('export_balance_sheet_pdf');
Route::get('/report/wages/pdf' , 'App\Http\Controllers\Report\EpfReportController@export_wages_pdf')->name('export_wages_pdf');



Route::get('/report/Government/pdf' , 'App\Http\Controllers\Report\EpfReportController@export_goverment_pdf')->name('export_goverment_pdf');
Route::get('/report/Government/excel' , 'App\Http\Controllers\Report\EpfReportController@export_goverment_excel')->name('export_goverment_excel');






Route::get('change_password/{id}/user' , 'App\Http\Controllers\Auth\AuthController@change_password')->name('change_password');
Route::post('change_password_post/{id}/user' , 'App\Http\Controllers\Auth\AuthController@change_password_post')->name('change_password_post');






});



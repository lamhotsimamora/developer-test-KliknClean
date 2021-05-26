<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\EmployeesController;

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

Route::redirect('/', '/home');

Route::post('/api/get_data_companies',[CompaniesController::class, 'getDataCompaniesPaginate']);
Route::post('/api/delete_companies',[CompaniesController::class, 'deleteCompanies']);
Route::post('/api/add_companies',[CompaniesController::class, 'addCompanies']);
Route::post('/api/get_count_data_companies',[CompaniesController::class, 'getCountCompanies']);
Route::post('/api/get_full_data_companies',[CompaniesController::class, 'getFullDataCompanies']);
Route::post('/api/search_data_companies',[CompaniesController::class, 'searchDataCompanies']);


Route::post('/api/get_data_employees',[EmployeesController::class, 'getDataCompaniesEmployees']);
Route::post('/api/delete_employees',[EmployeesController::class, 'deleteEmployees']);
Route::post('/api/add_employees',[EmployeesController::class, 'addEmployees']);
Route::post('/api/get_count_data_employees',[EmployeesController::class, 'getCountEmployees']);
Route::post('/api/search_data_employees',[EmployeesController::class, 'searchDataEmployees']);

Route::post('/api/get_data_report',[CompaniesController::class, 'getDataReportEmployees']);
Route::post('/api/get_data_employees_by_company',[EmployeesController::class, 'getDataEmployeesByCompany']);



Route::get('/home',function(){
    return view('home');
})->name('home');

Route::get('/companies',function(){
    return view('companies');
})->name('companies');

Route::get('/employees',function(){
    return view('employees');
})->name('employees');
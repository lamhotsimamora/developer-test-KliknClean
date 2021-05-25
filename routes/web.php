<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompaniesController;

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

Route::redirect('/', '/companies');

Route::get('/get_data_companies',[CompaniesController::class, 'viewDataPaginates']);
Route::post('/delete-companies',[CompaniesController::class, 'viewDetail']);
Route::post('/add-companies',[CompaniesController::class, 'viewDetail']);

Route::post('/add-employees',[CompaniesController::class, 'viewDetail']);
Route::post('/delete-employees',[CompaniesController::class, 'viewDetail']);


Route::get('/test',function(){

});


Route::get('/companies',function(){
    return view('companies');
})->name('companies');;

Route::get('/employees',function(){
    return view('employees');
})->name('employees');;
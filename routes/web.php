<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
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

Route::get('/',[CompanyController::class,'getCompany'])->name('home');
Route::get('/add-company',[CompanyController::class,'addCompanyForm'])->name('addCompanyForm');
Route::get('/edit-company-data/{cid}',[CompanyController::class,'editCompanyForm'])->name('editCompanyForm');
Route::get('/delete-company/{cid}',[CompanyController::class,'deleteCompany'])->name('deleteCompany');
Route::post('/add-company',[CompanyController::class,'addCompany'])->name('addCompany');


Route::get('/add-employe',[EmployeeController::class,'addEmployeeForm'])->name('addEmployeeForm');
Route::get('/edit-employee-data/{eid}',[EmployeeController::class,'editEmployeeForm'])->name('editEmployeeForm');
Route::post('/add-employe',[EmployeeController::class,'addEmployee'])->name('addEmployee');
Route::get('/employee/{cid?}',[EmployeeController::class,'getEmployee'])->name('employee');
Route::get('/delete-employee/{eid}',[EmployeeController::class,'deleteEmployee'])->name('delemployee');
// Route::get('/',function(){
//     return view('welcome');
// });

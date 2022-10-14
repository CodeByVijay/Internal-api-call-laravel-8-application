<?php

use App\Http\Controllers\api\CompanyApiController;
use App\Http\Controllers\api\EmployeeApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Without Login Routes
// Company API's
Route::post('create-company',[CompanyApiController::class,'createCompany']);
Route::get('get-company',[CompanyApiController::class,'getCompany']);
Route::get('get-company/{id}',[CompanyApiController::class,'getCompanybyId']);
Route::get('delete-company/{id}',[CompanyApiController::class,'deleteCompany']);

// Employee API's
Route::post('add-employee',[EmployeeApiController::class,'addEmployee']);
Route::get('get-employee',[EmployeeApiController::class,'getEmployee']);
Route::get('get-employee/{id}',[EmployeeApiController::class,'getEmployeebyId']);
Route::get('get-employee-company-wise/{cid}',[EmployeeApiController::class,'getEmployeebyCId']);
Route::get('delete-employee/{id}',[EmployeeApiController::class,'deleteEmployee']);

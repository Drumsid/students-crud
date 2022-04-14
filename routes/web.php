<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\AjaxStudentController;

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

//Route::get('/', [HomePageController::class, "index"])->name("homepage");

Route::resources([
    "students" => StudentController::class,
]);
Route::get('/', [AjaxStudentController::class, 'index'])->name("ajax-homePage");
Route::post('ajax-students', [AjaxStudentController::class, 'store']);
Route::get('ajax-fetch-students', [AjaxStudentController::class, 'fetchstudent']);
Route::get('ajax-edit-student/{id}', [AjaxStudentController::class, 'edit']);
Route::put('ajax-update-student/{id}', [AjaxStudentController::class, 'update']);
Route::delete('ajax-delete-student/{id}', [AjaxStudentController::class, 'destroy']);


//Route::get('/users', [\App\Http\Controllers\TestController::class, "index"]);

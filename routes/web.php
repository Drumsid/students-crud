<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\HomePageController;

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

Route::get('/', [HomePageController::class, "index"])->name("homepage");

Route::resources([
    "students" => StudentController::class,
]);

Route::get("/title", function () {
    $title = "test23423";
    return view("test", compact("title"));
});

//Route::get('/users', [\App\Http\Controllers\TestController::class, "index"]);

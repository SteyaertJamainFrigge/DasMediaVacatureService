<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'App\Http\Controllers\JobController@index');
Auth::routes();
Route::group(['middleware' => ['auth']], function () {
    Route::resource('/companies', CompanyController::class);
    Route::resource('/cities', CityController::class);
    Route::resource('/jobs', JobController::class);
});

Route::get('/jobs/{job}', 'App\Http\Controllers\JobController@show');

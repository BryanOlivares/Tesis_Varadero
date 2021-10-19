<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\AceptReservationController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\CreateReservationController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\UserController;



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

Route::get('/', function () {
    return view('welcome');
});



Auth::routes(['verify' => true]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

Route::get('/reports', [FileController::class, 'index'])->name('reports.ver')->middleware('verified');
Route::get('/reports/pdf', [FileController::class, 'exportPdf'])->name('reports.descargar')->middleware('verified');
Route::apiResource('/services', ServiceController::class)->names('services')->middleware('verified');
Route::apiResource('/reservations', ReservationController::class)->names('reservations')->middleware('verified');
Route::apiResource('/createreservations', CreateReservationController::class)->names('createreservations')->middleware('verified');
Route::apiResource('/history', HistoryController::class)->names('history')->middleware('verified');
Route::apiResource('/aceptreservations',  AceptReservationController::class)->names('aceptreservations')->middleware('verified');
Route::apiResource('/users', UserController::class)->names('users')->middleware('verified');
Route::apiResource('/download_files', FileController::class)->names('download_files')->middleware('verified');
Route::apiResource('/view_reservations', ViewController::class)->names('view_reservations')->middleware('verified');

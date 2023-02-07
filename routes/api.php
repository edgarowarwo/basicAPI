<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentClassController;
use App\Http\Controllers\Api\StudentSubjectController;

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

// Student Class Table Routes
Route::get('/class',[StudentClassController::class, 'ReadClass']);
Route::post('/class/store',[StudentClassController::class, 'StoreClass']);
Route::get('/class/edit/{id}',[StudentClassController::class, 'EditClass']);
Route::post('/class/update/{id}',[StudentClassController::class, 'UpdateClass']);
Route::get('/class/delete/{id}',[StudentClassController::class, 'DeleteClass']);

// Student Subject Table Routes
Route::get('/subject',[StudentSubjectController::class, 'ReadSubject']);
Route::post('/subject/store',[StudentSubjectController::class, 'StoreSubject']);
Route::get('/subject/edit/{id}',[StudentSubjectController::class, 'EditSubject']);
Route::post('/subject/update/{id}',[StudentSubjectController::class, 'UpdateSubject']);
Route::get('/subject/delete/{id}',[StudentSubjectController::class, 'DeleteSubject']);
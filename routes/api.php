<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentClassController;
use App\Http\Controllers\Api\StudentSubjectController;
use App\Http\Controllers\Api\StudentSectionController;
use App\Http\Controllers\Api\StudentController;

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

// Student Section Table Routes
Route::get('/section',[StudentSectionController::class, 'ReadSection']);
Route::post('/section/store',[StudentSectionController::class, 'StoreSection']);
Route::get('/section/edit/{id}',[StudentSectionController::class, 'EditSection']);
Route::post('/section/update/{id}',[StudentSectionController::class, 'UpdateSection']);
Route::get('/section/delete/{id}',[StudentSectionController::class, 'DeleteSection']);

// Student Table Routes
Route::get('/student',[StudentController::class, 'ReadStudent']);
Route::post('/student/store',[StudentController::class, 'StoreStudent']);
Route::get('/student/edit/{id}',[StudentController::class, 'EditStudent']);
Route::post('/student/update/{id}',[StudentController::class, 'UpdateStudent']);
Route::get('/student/delete/{id}',[StudentController::class, 'DeleteStudent']);
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentCourseController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/students',[StudentController::class,"getAllStudents"]);
Route::post('/students',[StudentController::class,"createStudent"]);
Route::get('/students/{id}',[StudentController::class,"getStudentById"]);
Route::put('/students/{id}',[StudentController::class,"updateStudent"]);
Route::delete('/students/{id}',[StudentController::class,"deleteStudent"]);

Route::get('/students/{id}/courses', [StudentCourseController::class, 'getStudentCourses']);
Route::post('/students/{id}/courses', [StudentCourseController::class, 'addCourseToStudent']);
Route::delete('/students/{id}/courses/{courseId}', [StudentCourseController::class, 'removeCourseFromStudent']);

Route::get('/courses', [CourseController::class, 'getAllCourses']);
Route::post('/courses', [CourseController::class, 'createCourse']);
Route::get('/courses/{id}', [CourseController::class, 'getCourseById']);
Route::put('/courses/{id}', [CourseController::class, 'updateCourse']);
Route::delete('/courses/{id}', [CourseController::class, 'deleteCourse']);

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentCourseController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [WelcomeController::class,'show']);

Route::get('/welcome', [WelcomeController::class,'show']);
Route::get('/api/welcome', [WelcomeController::class,'showAPI']);


Route::get('/students',[StudentController::class,"getAllStudents"]);
Route::post('/students',[StudentController::class,"createStudent"]);
Route::get('/students/{id}',[StudentController::class,"getStudentById"]);
Route::put('/students/{id}',[StudentController::class,"updateStudent"]);
Route::delete('/students/{id}',[StudentController::class,"deleteStudent"]);

Route::get('/courses', [CourseController::class, 'getAllCourses']);
Route::post('/courses', [CourseController::class, 'createCourse']);
Route::get('/courses/{id}', [CourseController::class, 'getCourseById']);
Route::put('/courses/{id}', [CourseController::class, 'updateCourse']);
Route::delete('/courses/{id}', [CourseController::class, 'deleteCourse']);

Route::get('/students/{id}/courses', [StudentCourseController::class, 'getStudentCourses']);
Route::post('/students/{id}/courses', [StudentCourseController::class, 'addCourseToStudent']);
Route::delete('/students/{id}/courses/{courseId}', [StudentCourseController::class, 'removeCourseFromStudent']);



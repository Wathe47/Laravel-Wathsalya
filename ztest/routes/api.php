<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\OrderController;
use App\Services\DatabaseConnector;

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

Route::get('/users',[UserController::class,'getAllUsers']);
Route::get('/users/{id}',[UserController::class,'getUserById']);
Route::post('/users',[UserController::class,'createUser']);
Route::put('/users/{id}',[UserController::class,'updateUser']);
Route::delete('/users/{id}',[UserController::class,'deleteUser']);

Route::get("/books",[BookController::class,'getAllBooks']);
Route::get("/books/{id}",[BookController::class,'getBookById']);
Route::post("/books",[BookController::class,'createBook']);
Route::put("/books/{id}",[BookController::class,'updateBook']);
Route::delete("/books/{id}",[BookController::class,'deleteBook']);

Route::get("/orders",[OrderController::class,'getAllOrders']);
Route::post("/orders",[OrderController::class,'createOrder']);
Route::delete("/orders/{id}",[OrderController::class,'deleteOrder']);

Route::post('/customdb/users', function(DatabaseConnector $db, Request $request){
   return $db->insertUsers($request->name,$request->email,$request->age);
});
Route::get('/customdb/users/age/{age}', function(DatabaseConnector $db, $age){
   return $db->getUsersAboveAge($age);
});

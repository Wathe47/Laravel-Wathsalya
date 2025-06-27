<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function getAllUsers(){
      $users = User::all();
      return response()->json($users);
    }


    public function getUserById($id){
      $user = User::find($id);
      if(!$user){
         return response()-> json(["message"=>"User not found"]);
      }
      return response()->json($user);
    }


    public function createUser(Request $request){
      $user = User::create([
         "name" => $request->name,
         "email" => $request->email,
         "age" => $request->age,
      ]);
      return response()->json([
         'message'=>"User has been created successfully",
         "user" => $user
      ]);
    }

    public function updateUser(Request $request,$id){
      $user = User::find($id);
      if(!$user){
         return response()-> json(["message"=>"User not found"]);
      }
      $user->update($request->all());
      return response()->json([
         'message'=>"User has been updated successfully",
         "user" => $user
      ]);

   }

    public function deleteUser($id){
      $user = User::find($id);
      if(!$user){
         return response()-> json(["message"=>"User not found"]);
      }

      $user->delete();
      return response()->json([
         'message'=>"User has been deleted successfully"
      ]);   
   }
}

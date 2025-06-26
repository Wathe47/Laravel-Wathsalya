<?php

namespace App\Http\Controllers;
use App\Models\Student;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function getAllStudents(){
      $students = Student::all();
      return response()->json($students);
    }

    public function createStudent(Request $request){

      // $validated = $request->validate([
      //    'name' => 'required|string|max:255',
      //    'email' => 'required|email|unique:students,email',
      //    'age' => 'required|integer|min:1|max:120'
      // ]);

      // $student = Student::create($request);

      $student = Student::create([
         'name' => $request->name,
         'email' => $request->email,
         'age' => $request->age
      ]);

      return response()->json([
         'message' => 'Student created successfully',
         'student' => $student
      ], 201);
    }

      public function getStudentById($id){
         $student = Student::find($id);
         if(!$student){
            return response()->json(['message' => 'Student not found'], 404);
         }
         return response()->json($student);
      }

      public function updateStudent(Request $request, $id){
            $student = Student::find($id);
            if(!$student){
               return response()->json(['message' => 'Student not found'], 404);
            }
   
            // $validated = $request->validate([
            //    'name' => 'sometimes|required|string|max:255',
            //    'email' => 'sometimes|required|email|unique:students,email,' . $id,
            //    'age' => 'sometimes|required|integer|min:1|max:120'
            // ]);
   
            $student->update($request->all());
   
            return response()->json([
               'message' => 'Student updated successfully',
               'student' => $student
            ]);
         }

      public function deleteStudent($id){
         $student = Student::find($id);
         if(!$student){
            return response()->json(['message' => 'Student not found'], 404);
         }

         $student->delete();

         return response()->json(['message' => 'Student deleted successfully']);
      }
   
      
}
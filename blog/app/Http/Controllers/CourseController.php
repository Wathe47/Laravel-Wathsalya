<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
      public function getAllCourses()
      {
         $courses = Course::all();
         return response()->json($courses);
      }
   
      public function createCourse(Request $request)
      {
         $course = Course::create([
               'name' => $request->name,
               'description' => $request->description,
               'credits' => $request->credits
         ]);
   
         return response()->json([
               'message' => 'Course created successfully',
               'course' => $course
         ], 201);
      }
   
      public function getCourseById($id)
      {
         $course = Course::find($id);
         if (!$course) {
            return response()->json(['message' => 'Course not found'], 404);
         }
         return response()->json($course);
      }

      public function updateCourse(Request $request, $id)
      {
         $course = Course::find($id);
         if (!$course) {
            return response()->json(['message' => 'Course not found'], 404);
         }

         $course->update($request->all());

         return response()->json([
            'message' => 'Course updated successfully',
            'course' => $course
         ]);
      }

      public function deleteCourse($id)
      {
         $course = Course::find($id);
         if (!$course) {
            return response()->json(['message' => 'Course not found'], 404);
         }

         $course->delete();

         return response()->json(['message' => 'Course deleted successfully']);
      }
}

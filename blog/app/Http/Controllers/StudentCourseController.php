<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class StudentCourseController extends Controller
{
    // Get all courses for a student
    public function getStudentCourses($id)
    {
        $student = Student::find($id);
        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }
        $courses = $student->courses;
        return response()->json($courses);
    }

    // Attach a course to a student (accepts course_id in request body)
    public function addCourseToStudent(Request $request, $id)
    {
        $student = Student::find($id);
        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'status' => 'nullable|string',
            'enrollment_date' => 'nullable|date',
            'completion_date' => 'nullable|date',
        ]);
        $student->courses()->attach($request->course_id, [
            'status' => $request->status ?? 'enrolled',
            'enrollment_date' => $request->enrollment_date,
            'completion_date' => $request->completion_date,
        ]);
        return response()->json(['message' => 'Course added to student']);
    }

    // Detach a course from a student
    public function removeCourseFromStudent($id, $courseId)
    {
        $student = Student::find($id);
        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }
        $student->courses()->detach($courseId);
        return response()->json(['message' => 'Course removed from student']);
    }
}

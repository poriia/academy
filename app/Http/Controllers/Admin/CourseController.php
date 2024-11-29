<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseRequest;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all();
        $title = 'Courses list';

        return view('admin/courses/index', compact('courses', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/courses/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        try {
            $course = Course::create([
                'title' => $request->title,
                'category_id' => $request->category_id,
                'description' => $request->description,
                'publish_at' => $request->publish_at,
                'is_private' => $request->is_private,
            ]);

            if (!$course) {
                throw new Exception('course can not create!');
            }

            return redirect()->route('admin.courses.index')->with('success_message', 'course created successful!');
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
            return redirect()->route(route: 'admin.courses.create')->with('error_message', 'course create failed!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        return view('admin/courses/show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return view('admin/courses/edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        try {
            $course->title = $request->title;
            $course->category_id = $request->category_id;
            $course->description = $request->description;
            $course->publish_at = $request->publish_at;
            $course->is_private = $request->is_private;
            $course->save();

            return redirect()->route('admin.courses.index')->with('success_message', 'Course Updated successful!');
        } catch (Exception $exception) {
            return redirect()->back()->with('error_message', 'Course update failed!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        try {
            $course->delete();

            return redirect()->route('admin.courses.index')->with('success_message', 'Course Deleted successful!');
        } catch (Exception $exception) {
            return redirect()->back()->with('error_message', 'Course delete failed!');
        }
    }
}

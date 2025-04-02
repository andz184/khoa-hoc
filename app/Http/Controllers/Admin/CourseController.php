<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::paginate(10);
        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        $categories = \App\Models\Category::all();
        return view('admin.courses.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'course_code' => 'required|string|max:50|unique:courses,course_code',
            'description' => 'required|string',
            'short_description' => 'nullable|string|max:255',
            'instructor_name' => 'required|string|max:255',
            'regular_price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'categories' => 'required|array|min:1',
            'categories.*' => 'exists:categories,id'
        ]);

        $course = new Course();
        $course->title = $request->title;
        $course->course_code = $request->course_code;
        $course->description = $request->description;
        $course->short_description = $request->short_description;
        $course->instructor_name = $request->instructor_name;
        $course->regular_price = $request->regular_price;
        $course->sale_price = $request->sale_price;
        $course->is_published = $request->has('is_published');
        $course->slug = Str::slug($request->slug ?: $request->title);

        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            // Lưu file vào thư mục storage/app/public/courses
            $file->move(storage_path('app/public/courses'), $filename);
            // Lưu đường dẫn tương đối vào database
            $course->thumbnail = 'courses/' . $filename;
        }

        $course->save();

        // Attach categories
        if ($request->has('categories')) {
            $course->categories()->attach($request->categories);
        }

        return redirect()->route('admin.courses.index')
            ->with('success', 'Khóa học đã được tạo thành công.');
    }

    public function edit(Course $course)
    {
        $categories = \App\Models\Category::all();
        return view('admin.courses.edit', compact('course','categories'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'course_code' => 'required|string|max:50|unique:courses,course_code,' . $course->id,
            'description' => 'required|string',
            'short_description' => 'nullable|string|max:255',
            'instructor_name' => 'required|string|max:255',
            'regular_price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'categories' => 'required|array|min:1',
            'categories.*' => 'exists:categories,id'
        ]);

        $course->title = $request->title;
        $course->course_code = $request->course_code;
        $course->description = $request->description;
        $course->short_description = $request->short_description;
        $course->instructor_name = $request->instructor_name;
        $course->regular_price = $request->regular_price;
        $course->sale_price = $request->sale_price;
        $course->is_published = $request->has('is_published');
        $course->slug = Str::slug($request->slug ?: $request->title);

        if ($request->hasFile('thumbnail')) {
            // Delete old image if exists
            if ($course->thumbnail) {
                $oldPath = storage_path('app/public/' . $course->thumbnail);
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }

            $file = $request->file('thumbnail');
            $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            // Lưu file vào thư mục storage/app/public/courses
            $file->move(storage_path('app/public/courses'), $filename);
            // Lưu đường dẫn tương đối vào database
            $course->thumbnail = 'courses/' . $filename;
        }

        $course->save();

        // Sync categories
        if ($request->has('categories')) {
            $course->categories()->sync($request->categories);
        }

        return redirect()->route('admin.courses.index')
            ->with('success', 'Khóa học đã được cập nhật thành công.');
    }

    public function destroy(Course $course)
    {
        if ($course->thumbnail) {
            $path = storage_path('app/public/' . $course->thumbnail);
            if (file_exists($path)) {
                unlink($path);
            }
        }
        $course->delete();

        return redirect()->route('admin.courses.index')
            ->with('success', 'Khóa học đã được xóa thành công.');
    }

    public function toggleStatus(Course $course)
    {
        $course->status = !$course->status;
        $course->save();

        return response()->json([
            'success' => true,
            'message' => 'Course status updated successfully.',
            'status' => $course->status
        ]);
    }

    public function toggleRegistration(Course $course)
    {
        $course->allow_registration = !$course->allow_registration;
        $course->save();

        return response()->json([
            'success' => true,
            'message' => 'Course registration status updated successfully.',
            'allow_registration' => $course->allow_registration
        ]);
    }
}

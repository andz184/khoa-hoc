<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Lấy tất cả khóa học đã publish
        $courses = Course::with('categories')
            ->where('is_published', true)
            ->latest()
            ->get();

        // Phân chia khóa học thành nhóm để hiển thị
        $featuredCourses = $courses->take(3); // 3 khóa học nổi bật (mới nhất)
        $popularCourses = $courses->sortByDesc('students_count')->take(6); // 6 khóa học phổ biến

        // Lấy tất cả danh mục kèm khóa học
        $categories = \App\Models\Category::with(['courses' => function($query) {
            $query->where('is_published', true);
        }])->where('status', true)->get();

        return view('client.index', compact('featuredCourses', 'popularCourses', 'categories','courses'));
    }

    public function course()
    {
        // Lấy tất cả khóa học đã publish
        $courses = Course::with('categories')
            ->where('is_published', true)
            ->latest()
            ->paginate(9);

        return view('client.cource', compact('courses'));
    }

    public function courceDetail($slug)
    {
        $course = Course::with(['categories', 'lessons'])
            ->where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        return view('client.course_details', compact('course'));
    }

    public function courseLanding($slug)
    {
        $course = Course::with(['categories', 'lessons'])
            ->where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        // Create stats for the landing page
        $stats = [
            'teachers' => 1, // For a specific course, typically 1 instructor
            'students' => $course->students_count ?? rand(50, 100), // Use actual count or placeholder
            'online_students' => $course->online_students ?? rand(40, 90),
            'offline_students' => $course->offline_students ?? rand(10, 30),
        ];

        return view('client.course_landing', compact('course', 'stats'));
    }

    public function homeLearn() {
        return view('client.learn.index');
    }

    public function listCourse() {
        return view('client.learn.listcousre');
    }

    public function watchVideo() {
        return view('client.learn.watchvideo');
    }

    public function homeAdmin() {
        return view('admin.index');
    }
}

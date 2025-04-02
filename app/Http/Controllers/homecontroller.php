<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Lấy 6 khóa học mới nhất đã được publish
        $courses = Course::with('categories')
            ->where('is_published', true)
            ->latest()
            ->take(6)
            ->get();

        // Lấy thống kê số lượng
        $stats = [
            'teachers' => Course::distinct('instructor_name')->count(),
            'students' => 960, // Có thể thay thế bằng số lượng học viên thực tế sau
            'online_students' => 1020, // Có thể thay thế bằng số lượng học viên online thực tế sau
            'offline_students' => 820, // Có thể thay thế bằng số lượng học viên offline thực tế sau
        ];

        return view('client.index', compact('courses', 'stats'));
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
        $course = Course::with('categories')
            ->where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        return view('client.course_details', compact('course'));
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

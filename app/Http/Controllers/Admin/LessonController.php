<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Course $course)
    {
        $lessons = $course->lessons()->orderBy('sort_order')->get();
        return view('admin.lessons.index', compact('course', 'lessons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Course $course)
    {
        return view('admin.lessons.create', compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Course $course)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'objectives' => 'required|string',
                'youtube_link' => 'required|url',
                'download_link' => 'nullable|file|mimes:json|max:10240',
                'sort_order' => 'nullable|integer|min:0',
                'is_published' => 'boolean',
                'is_visible' => 'boolean'
            ]);

            $lesson = new Lesson();
            $lesson->title = $request->title;
            $lesson->description = $request->description;
            $lesson->objectives = $request->objectives;
            $lesson->youtube_link = $request->youtube_link;
            $lesson->sort_order = $request->sort_order;
            $lesson->is_published = $request->boolean('is_published');
            $lesson->is_visible = $request->boolean('is_visible', true);
            $lesson->course_id = $course->id;

            if ($request->hasFile('download_link')) {
                $file = $request->file('download_link');
                $filename = time() . '_' . $file->getClientOriginalName();
                // Store file in public/storage/lessons/json directory
                $file->move(public_path('storage/lessons/json'), $filename);
                $lesson->download_link = 'lessons/json/' . $filename;
                $lesson->original_filename = $file->getClientOriginalName();
            }

            $lesson->save();

            return redirect()->route('admin.courses.lessons.index', $course)
                ->with('success', 'Bài học đã được thêm thành công.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course, Lesson $lesson)
    {
        // Lấy tên file gốc từ đường dẫn
        if ($lesson->download_link) {
            $originalFileName = basename($lesson->download_link);
            // Loại bỏ timestamp từ tên file (định dạng: timestamp_filename.json)
            $lesson->original_filename = preg_replace('/^\d+_/', '', $originalFileName);
        }

        return view('admin.lessons.edit', compact('course', 'lesson'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course, Lesson $lesson)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'objectives' => 'required|string',
                'youtube_link' => 'required|url',
                'download_link' => 'nullable|file|mimes:json|max:10240',
                'sort_order' => 'nullable|integer|min:0',
                'is_published' => 'boolean',
                'is_visible' => 'boolean'
            ]);

            $lesson->title = $request->title;
            $lesson->description = $request->description;
            $lesson->objectives = $request->objectives;
            $lesson->youtube_link = $request->youtube_link;
            $lesson->sort_order = $request->sort_order;
            $lesson->is_published = $request->boolean('is_published');
            $lesson->is_visible = $request->boolean('is_visible', true);

            if ($request->hasFile('download_link')) {
                // Xóa file cũ nếu tồn tại
                if ($lesson->download_link) {
                    $oldFilePath = public_path('storage/' . $lesson->download_link);
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                $file = $request->file('download_link');
                $filename = time() . '_' . $file->getClientOriginalName();
                // Store file in public/storage/lessons/json directory
                $file->move(public_path('storage/lessons/json'), $filename);
                $lesson->download_link = 'lessons/json/' . $filename;
                $lesson->original_filename = $file->getClientOriginalName();
            }

            $lesson->save();

            return redirect()->route('admin.courses.lessons.index', $course)
                ->with('success', 'Bài học đã được cập nhật thành công.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course, Lesson $lesson)
    {
        $lesson->delete();

        return redirect()->route('admin.courses.lessons.index', $course)
            ->with('success', 'Bài học đã được xóa thành công.');
    }

    public function updateOrder(Request $request, Course $course)
    {
        $request->validate([
            'orders' => 'required|array',
            'orders.*.id' => 'required|exists:lessons,id',
            'orders.*.sort_order' => 'required|integer|min:0'
        ]);

        foreach ($request->orders as $order) {
            Lesson::where('id', $order['id'])
                ->where('course_id', $course->id)
                ->update(['sort_order' => $order['sort_order']]);
        }

        return response()->json([
            'success' => true,
            'orders' => $request->orders
        ]);
    }

    public function togglePublish(Course $course, Lesson $lesson)
    {
        try {
            $lesson->is_published = !$lesson->is_published;
            $lesson->save();

            return response()->json([
                'success' => true,
                'is_published' => $lesson->is_published,
                'message' => $lesson->is_published ? 'Bài học đã được xuất bản' : 'Bài học đã được ẩn'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra: ' . $e->getMessage()
            ], 500);
        }
    }

    public function toggleVisibility(Course $course, Lesson $lesson)
    {
        try {
            $lesson->is_visible = !$lesson->is_visible;
            $lesson->save();

            return response()->json([
                'success' => true,
                'is_visible' => $lesson->is_visible,
                'message' => $lesson->is_visible ? 'Bài học đã được hiển thị' : 'Bài học đã được ẩn'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra: ' . $e->getMessage()
            ], 500);
        }
    }
}

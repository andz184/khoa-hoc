<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class CourseSeeder extends Seeder
{
    public function run()
    {
        // Tạo danh mục mẫu
        $categories = [
            ['name' => 'Web Development', 'slug' => 'web-development'],
            ['name' => 'Mobile Development', 'slug' => 'mobile-development'],
            ['name' => 'UI/UX Design', 'slug' => 'ui-ux-design'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        // Tạo khóa học mẫu
        $courses = [
            [
                'title' => 'Web Development Fundamentals',
                'slug' => 'web-development-fundamentals',
                'description' => 'Learn the basics of web development including HTML, CSS, and JavaScript.',
                'instructor_name' => 'John Doe',
                'regular_price' => 99.99,
                'sale_price' => 79.99,
                'thumbnail' => 'courses/web-dev.jpg',
                'is_published' => true,
                'rating' => 4.5,
                'total_reviews' => 120,
            ],
            [
                'title' => 'Mobile App Development with React Native',
                'slug' => 'mobile-app-development-react-native',
                'description' => 'Build cross-platform mobile applications using React Native framework.',
                'instructor_name' => 'Jane Smith',
                'regular_price' => 129.99,
                'sale_price' => 99.99,
                'thumbnail' => 'courses/mobile-dev.jpg',
                'is_published' => true,
                'rating' => 4.8,
                'total_reviews' => 85,
            ],
            [
                'title' => 'UI/UX Design Masterclass',
                'slug' => 'ui-ux-design-masterclass',
                'description' => 'Master the art of creating beautiful and user-friendly interfaces.',
                'instructor_name' => 'Mike Johnson',
                'regular_price' => 149.99,
                'sale_price' => 119.99,
                'thumbnail' => 'courses/ui-ux.jpg',
                'is_published' => true,
                'rating' => 4.7,
                'total_reviews' => 95,
            ],
        ];

        foreach ($courses as $course) {
            $newCourse = Course::create($course);

            // Gán danh mục cho khóa học
            if ($course['slug'] === 'web-development-fundamentals') {
                $newCourse->categories()->attach(Category::where('slug', 'web-development')->first()->id);
            } elseif ($course['slug'] === 'mobile-app-development-react-native') {
                $newCourse->categories()->attach(Category::where('slug', 'mobile-development')->first()->id);
            } else {
                $newCourse->categories()->attach(Category::where('slug', 'ui-ux-design')->first()->id);
            }
        }
    }
}

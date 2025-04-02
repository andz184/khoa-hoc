<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;


class Course extends Model
{
    protected $fillable = [
        'course_code',
        'title',
        'slug',
        'description',
        'short_description',
        'instructor_name',
        'thumbnail',
        'regular_price',
        'sale_price',
        'is_published',
        'objectives',
        'eligibility',
        'duration',
        'available_slots',
        'schedule',
        'rating',
        'total_reviews',
        'status',
        'price',
        'allow_registration'
    ];

    protected $casts = [
        'rating' => 'float',
        'total_reviews' => 'integer',
        'is_published' => 'boolean',
        'status' => 'boolean',
        'price' => 'decimal:2',
        'regular_price' => 'decimal:2',
        'sale_price' => 'decimal:2',
        'allow_registration' => 'boolean'
    ];

    /**
     * Get the categories for the course.
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'course_category');
    }

    /**
     * Get the price packages for the course.
     */
    public function prices()
    {
        return $this->hasMany(CoursePrice::class)->orderBy('sort_order');
    }

    /**
     * Get the default price package for the course.
     */
    public function defaultPrice()
    {
        return $this->hasOne(CoursePrice::class)->where('is_default', true);
    }

    /**
     * Boot function from Laravel.
     */
    protected static function boot()
    {
        parent::boot();

        // Tự động tạo slug từ title trước khi lưu
        static::creating(function ($course) {
            if (!$course->slug) {
                $course->slug = Str::slug($course->title);
            }
        });
    }

    /**
     * Get the current price of the course.
     */
    public function getCurrentPrice()
    {
        return $this->sale_price ?? $this->regular_price;
    }

    /**
     * Check if the course is on sale.
     */
    public function isOnSale()
    {
        return !is_null($this->sale_price) && $this->sale_price < $this->regular_price;
    }
}

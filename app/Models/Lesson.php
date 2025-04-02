<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Lesson extends Model
{
    protected $fillable = [
        'course_id',
        'title',
        'slug',
        'description',
        'objectives',
        'youtube_link',
        'download_link',
        'sort_order',
        'is_published'
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'sort_order' => 'integer'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($lesson) {
            if (!$lesson->slug) {
                $lesson->slug = Str::slug($lesson->title);
            }
        });
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CoursePrice extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'name',
        'price',
        'description',
        'duration_months',
        'is_default',
        'sort_order'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'duration_months' => 'integer',
        'is_default' => 'boolean',
        'sort_order' => 'integer'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}

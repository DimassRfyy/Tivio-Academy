<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseTestimonial extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'course_id',
        'user_id',
        'message',
        'rating'
    ];

    public function course(): BelongsTo {
        return $this->belongsTo(Course::class);
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Tool extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'photo',
        'link',
        'is_free'
    ];

    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'course_tools');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($tool) {
            if ($tool->photo) {
                Storage::delete($tool->photo);
            }
        });

        static::updating(function ($tool) {
            if ($tool->isDirty('photo')) {
                Storage::delete($tool->getOriginal('photo'));
            }
        });
    }
}

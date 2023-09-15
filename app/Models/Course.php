<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    protected $fillable = [
        'name',
        'code',
        'slug',
        'department_id',
        'level_id',
        'description',
        'period',
        'thumbnail',
        'featured'
    ];

    public function department() :BelongsTo
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function level(): BelongsTo
    {
        return $this->belongsTo(CourseLevel::class, 'level_id');
    }

    public function unit(): BelongsToMany
    {
        return $this->belongsToMany(Unit::class);
    }
}

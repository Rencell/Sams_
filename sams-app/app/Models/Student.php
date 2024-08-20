<?php

namespace App\Models;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Student extends Model
{
    protected $guarded =[];
    use HasFactory, SoftDeletes;

    public function subject(): BelongsToMany
    {
        return $this->belongsToMany(Subject::class, 'subject_student');
    }

    public function attendance(): HasMany
    {
        return $this->hasMany(Attendance::class, 'attendance_subject');
    }
}

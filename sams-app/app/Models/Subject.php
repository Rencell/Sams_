<?php

namespace App\Models;

use App\Models\Attendance;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Subject extends Model
{
    protected $guarded =[];
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function student(): BelongsToMany
    {
        return $this->belongsToMany(Student::class, 'subject_student');
    }


    public function attendance(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }

    public function attendances(): HasMany
    {
        return $this->hasMany(attendance::class, 'attendance_subject');
    }


}

// app/Models/Student.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'nationality',
        'father_name',
        'address',
        'father_phone',
        'mother_phone',
        'father_job',
        'mother_job',
        'total_children',
        'total_boys',
        'total_girls',
        'child_order',
        'parents_divorced',
        'guardian',
        'shad_mobile',
        'class_id',
    ];

    protected $casts = [
        'parents_divorced' => 'boolean',
    ];

    public function class(): BelongsTo
    {
        return $this->belongsTo(ClassRoom::class, 'class_id');
    }

    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }

    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }
}

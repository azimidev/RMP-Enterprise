<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Course
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Student[] $students
 * @mixin \Eloquent
 */
class Course extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'course';

    /**
     * Get the Students for this Course
     */
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}

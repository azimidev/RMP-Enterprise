<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
        return $this->belongsToMany(Student::class)->withTimestamps();
    }

    /**
     * Get the University for this Course
     */
    public function university()
    {
        return $this->belongsTo(University::class);
    }
}

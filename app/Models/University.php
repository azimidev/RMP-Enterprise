<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'university';

    /**
     * Get the Courses for this University
     */
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}

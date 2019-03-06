<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentAddress extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'student_address';

    // public $timestamps = false;

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}

<?php

namespace App\Models;

use App\Models\Course;
use App\Models\StudentAddresses;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'student';

    public $timestamps = false;

    protected $hidden = ['address_id', 'created_at', 'updated_at'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class, 'id', 'course_id');
    }

    public function address()
    {
        return $this->hasOne(StudentAddress::class, 'id');
    }
}

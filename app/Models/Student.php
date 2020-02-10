<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Student
 *
 * @property-read \App\Models\StudentAddress $address
 * @property-read \App\Models\Course $course
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Course[] $courses
 * @mixin \Eloquent
 */
class Student extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table    = 'student';
	protected $fillable = [
		'firstname',
		'surname',
		'email',
		'nationality',
		'address_id',
		'course_id',
	];
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

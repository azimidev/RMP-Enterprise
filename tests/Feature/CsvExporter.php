<?php

namespace Tests\Feature;

use Storage;
use Tests\TestCase;
use App\Models\User;
use App\Models\Student;
use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CsvExporter extends TestCase
{
	use DatabaseTransactions;

	/** @test */
	public function does_not_show_students_for_unauthenticated_users()
	{
		$this->get('/view')->assertStatus(500);
	}

	/** @test */
	public function show_students_for_authenticated_users()
	{
		$user = factory(User::class)->create();
		$this->actingAs($user);

		$this->get('/view')->assertStatus(200);
	}

	/** @test */
	public function it_generates_csv_for_students()
	{
		$user = factory(User::class)->create();
		$this->actingAs($user);
		$fileName = 'student.csv';

		$students   = factory(Student::class, 3)->create();
		$studentIds = $students->pluck('id')->all();

		Storage::fake('students');
		$file = UploadedFile::fake()->create($fileName);

		$this->post('/export', ['studentId' => $studentIds])
		     ->assertSuccessful();

		$this->assertEquals($fileName, $file->name);
	}
}

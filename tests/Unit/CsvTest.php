<?php

namespace Tests\Unit;

use App\Http\Csv;
use Tests\TestCase;
use App\Models\User;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CsvTest extends TestCase
{
	use DatabaseTransactions;

	public $fileName;

	public function setUp()
	{
		parent::setUp();

		$user = factory(User::class)->create();
		$this->actingAs($user);
		$this->fileName = 'example';
	}

	/** @test */
	public function it_gets_the_student_attributes()
	{
		$studentRecords    = factory(Student::class, 1)->create();
		$studentAttributes = new Csv($studentRecords, $this->fileName);

		$this->assertEquals([
			"firstname",
			"surname",
			"email",
			"nationality",
			"address_id",
			"course_id",
			"id",
		], $studentAttributes->getAttributes());
	}

	/** @test */
	public function it_gets_the_course_attributes()
	{
		$courseRecords     = factory(Course::class, 1)->create();
		$coursesAttributes = new Csv($courseRecords, $this->fileName);

		$this->assertEquals([
			"course_name",
			"university",
			"updated_at",
			"created_at",
			"id",
		], $coursesAttributes->getAttributes());
	}

	/** @test */
	public function it_returns_the_correct_headers()
	{
		$records = factory(Student::class, 1)->create();
		$csv     = new Csv($records, $this->fileName);

		$this->assertEquals([
			'Content-type'        => 'text/csv',
			'Content-Disposition' => "attachment; filename=\"{$this->fileName}.csv\"",
		], $csv->headers());
	}

	/** @test */
	public function it_makes_csv_file()
	{
		$records = factory(Student::class, 3)->create();
		$csv     = (new Csv($records, $this->fileName))->make()->getStatusCode();

		$this->assertEquals(200, $csv);
	}
}

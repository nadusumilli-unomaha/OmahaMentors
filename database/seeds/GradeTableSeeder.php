<?php

use Illuminate\Database\Seeder;
use App\Grade;
use App\Student;

class GradeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$grade_student_0 = Student::where('firstName','Student')->first();

        $grade = new Grade();
        $grade->subject = 'Mathematics';
        $grade->period = '3 credits';
        $grade->actual = '4.0';
        $grade->comments = 'He did very well in the class';
        $grade->student_id = $grade_student_0->id;
        $grade->save();
    }
}

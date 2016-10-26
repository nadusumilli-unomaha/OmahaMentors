<?php

use Illuminate\Database\Seeder;
use App\Visit;
use App\User;
use App\Student;

class VisitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
    	$visit_student_0 = Student::where('firstName','Student')->first();
    	$visit_user_0 = User::whereHas('roles', function ($query) {
                            $query->where('name', 'like', 'Mentor');
                        })->first();

        $visit = new Visit();
        $visit->check = 'Absent';
        $visit->Date = '2016-10-29';
        $visit->user_id = $visit_user_0->id;
        $visit->student_id = $visit_student_0->id;
        $visit->save();
    }
}

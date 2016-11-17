<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Grade;
use App\Visit;
use PDF;
use App\User;
use App\Note;
use Input;
use DB;
use Excel;

class ExcelController extends Controller
{
    public function getImport(){
    	return view('excel.importStudent');
    }

    public function postImport(){
    	Excel::load(Input::file('student'), function($reader){
    		$reader->each(function($sheet){
    			Student::firstorCreate($sheet->toArray());
    		});
    	});
    	return view('users.afterLogin');
    }

    public function getExport(){
    	$export = Student::all();
        $grade = Grade::all();
        $visits = Visit::all();
        $notes = Note::all();
        $users = User::whereHas('roles', function ($query) {
                                $query->where('name', 'like', 'Mentor');
                            })->get();
        
    	Excel::create('Export Student Data', function($excel) use($export,$grade,$users,$visits,$notes){
    		$excel->sheet('Students', function($sheet) use($export){
    			$sheet->fromArray($export);
    		});
            $excel->sheet('Grades', function($sheet) use($grade){
                $sheet->fromArray($grade);
            });
            $excel->sheet('Mentors', function($sheet) use($users){
                $sheet->fromArray($users);
            });
            $excel->sheet('Visits', function($sheet) use($visits){
                $sheet->fromArray($visits);
            });
            $excel->sheet('Notes', function($sheet) use($notes){
                $sheet->fromArray($notes);
            });
    	})->export('xlsx');
    }
}

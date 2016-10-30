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
    	Excel::create('Export Data', function($excel) use($export){
    		$excel->sheet('Sheet 1', function($sheet) use($export){
    			$sheet->fromArray($export);
    		});
    	})->export('xlsx');
    }
}

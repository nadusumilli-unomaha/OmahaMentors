<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Student;
use App\Grade;
use App\Visit;
use PDF;
use App\User;
use App\Note;


class PDFController extends Controller
{
    public function generatePDF(){
$students=Student::all();
    $pdf=PDF::loadview('PDF.report',compact('students'));
return $pdf->download('report.pdf');
    }

     public function index()
    {
     
            $students=Student::all();
            return view('PDF.index',compact('students'));
        }

        public function show($id)
    {
                    $student = Student::findOrFail($id);
            return view('PDF.show',compact('student'));
        }

          
    
        
}

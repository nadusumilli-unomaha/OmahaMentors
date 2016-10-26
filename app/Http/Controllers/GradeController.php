<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Grade;
use App\User;
use App\Student;

use Auth; 

use Session;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            $grades=Grade::all();
            return view('grades.index',compact('grades'));
        }
        else{
            return redirect('/');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::check()){
            $mentors = User::whereHas('roles', function ($query) {
                                $query->where('name', 'like', 'Mentor');
                            })->pluck('firstName','id');
            $students = Student::pluck('firstName','id');  
            return view('grades.create',compact('mentors','students'));
        }
        else{
            return redirect('/');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
                'subject' => 'required',
                'period' => 'required',
                'actual' => 'required',
                'comments' => 'required',
            ]);
        $grade= new Grade($request->all());
        $grade->save();
        return redirect('/afterLogin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Auth::check()){
            $grade = Grade::findOrFail($id);
            return view('grades.show',compact('grade'));
        }
        else{
            return redirect('/');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::check() ){
            $grade=Grade::find($id);
            return view('grades.edit',compact('grade'));
        }
        else{
            session()->flash('cust_edit_msg', 'You do not have permissions to edit other grades!.');
            return redirect('grades');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $grade= new Grade($request->all());
        $grade=Grade::find($id);
        $grade->update($request->all());
        return redirect('/afterLogin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Grade::find($id)->delete();
        return redirect('/afterLogin');
    }
}

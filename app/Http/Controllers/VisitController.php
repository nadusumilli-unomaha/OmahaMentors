<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Visit;
use App\User;
use App\Student;
use Log;

class VisitController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            $visits=Visit::all();
            return view('visits.index',compact('visits'));
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
            return view('visits.create',compact('mentors','students'));
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
                'check' => 'required',
                'Date' => 'required|date|date_format:Y-m-d',
            ]);
        $visit = new Visit();
        $visit->Date = $request->Date;
        $visit->check = $request->check;
        $visit->user_id = $request->user_id;
        $visit->student_id = $request->student_id;
        $visit->save();
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
            $visit = Visit::findOrFail($id);
            return view('visits.show',compact('visit'));
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
            $visit=Visit::find($id);
            return view('visits.edit',compact('visit'));
        }
        else{
            return redirect('/');
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
        $this->validate($request,[
                'check' => 'required',
                'Date' => 'required|date|date_format:Y-m-d',
            ]);
        $visit=Visit::find($id);
        if($request->date)
        {
            $visit->Date = $request->date;
        }
        if($request->check)
        {
            $visit->check = $request->check;
        }
        else{
            $visit->check = 'Absent';
        }
        $visit->update();
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
        Visit::find($id)->delete();
        return redirect('/afterLogin');
    }
}

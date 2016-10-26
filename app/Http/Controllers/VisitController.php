<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Visit;
use App\User;
use App\Student;

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
        /*$this->validate($request,[
                'name' => 'required|unique:visits,name',
                'address' => 'required',
                'cust_number' => 'required|numeric',
                'city' => 'required',
                'state' => 'required',
                'zip' => 'required|numeric|digits:5',
                'email' => 'required|email|unique:visits,email',
                'home_phone' => 'numeric|digits:10|unique:visits,home_phone',
                'cell_phone' => 'required|numeric|digits:10|unique:visits,cell_phone',
            ]);*/
        $visit = new Visit($request->all());
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
        $visit=Visit::find($id);
        if($request->date)
        {
            $visit->date = $request->date;
        }
        else if($request->check)
        {
            $visit->check = $request->check;
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

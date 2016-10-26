<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Role;
use App\Student;
use App\Mentor;
use App\Visit;
use App\Grade;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            $users=User::all();
            $mentors = User::whereHas('roles', function ($query) {
                            $query->where('name', 'like', 'Mentor');
                        })->get();
            $employees = User::whereHas('roles', function ($query) {
                            $query->where('name', 'like', 'Employee');
                        })->get();
            $admin = User::where('email', Auth::user()->email)->first();
            $students = Student::all();
            $visits = Visit::all();
            $grades = Grade::all();
            return view('users.index',compact('users','mentors','employees','students','visits','grades','admin'));
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
            return view('users.create');
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
                'lastName' => 'required',
                'firstName' => 'required',
                'address' => 'required',
                'city' => 'required',
                'state' => 'required',
                'zip' => 'required|numeric|digits:5',
                'email' => 'required|email|unique:users,email',
                'phone' => 'required|numeric|digits:10|unique:users,phone',
        ]);
        $user = new User;
        $user->firstName = $request['firstName'];
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->lastName = $request['lastName'];
        $user->address = $request['address'];
        $user->city = $request['city'];
        $user->state = $request['state'];
        $user->zip = $request['zip'];
        $user->phone = $request['phone'];
        $user->role_request = $request['role_request'];
        $user->save();
        $user->roles()->attach(Role::where('name','Pending')->first());
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
            $user = User::findOrFail($id);
            return view('users.show',compact('user'));
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
            $user=User::find($id);
            return view('users.edit',compact('user'));
        }
        else{
            session()->flash('cust_edit_msg', 'You do not have permissions to edit other users!.');
            return redirect('users');
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
                'lastName' => 'required',
                'firstName' => 'required',
                'address' => 'required',
                'city' => 'required',
                'state' => 'required',
                'zip' => 'required|numeric|digits:5',
                'email' => 'required|email',
                'phone' => 'required|numeric|digits:10',
        ]);
        $user1=User::find($id);
        $user1->firstName = $request->firstName;
        $user1->email = $request->email;
        $user1->password = $user1->password;
        $user1->lastName = $request->lastName;
        $user1->address = $request->address;
        $user1->city = $request->city;
        $user1->state = $request->state;
        $user1->zip = $request->zip;
        $user1->phone = $request->phone;
        $user1->update();
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
        User::find($id)->delete();
        return redirect('users');
    }

    public function postAdminAssignRoles(Request $request)
    {
        $user = User::where('email', $request['email'])->first();
        $user->roles()->detach();
        if($request['role_admin']){
            $user->roles()->attach(Role::where('name','Admin')->first());
        }
        if($request['role_employee']){
            $user->roles()->attach(Role::where('name','Employee')->first());
        }
        if($request['role_mentor']){
            $user->roles()->attach(Role::where('name','Mentor')->first());
        }
        if($request['role_pending']){
            $user->roles()->attach(Role::where('name','Pending')->first());
        }
        return redirect()->back();
    }
}

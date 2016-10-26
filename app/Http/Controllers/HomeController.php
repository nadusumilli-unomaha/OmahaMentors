<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Student;
use App\Mentor;
use App\Visit;
use App\Grade;
use Illuminate\Support\Facades\Hash;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('email', Auth::user()->email)->first();//First is required because without first you get a collection and you cannot roles() on a collection.
        $students = Student::all();
        foreach ($user->roles as $role) {
            if($role->name === 'Pending')
            {
                return view('users.RegistrationSuccess');
            }
            else if($role->name === 'Mentor')
            {
                $students = Student::where('user_id',$user->id)->get();
                $visits = Visit::all();
                return view('users.afterLogin', compact('user','students','visits'));
            }
            else if($role->name === 'Employee')
            {
                $students = Student::all();
                $visits = Visit::all();
                $grades = Grade::all();
                $mentors = User::whereHas('roles', function ($query) {
                                $query->where('name', 'like', 'Mentor');
                            })->get();
                return view('users.afterLogin', compact('user','students','mentors','visits','grades'));
            }
            else
            {
                $users = User::all();            
                return view('home',compact('users'));
            }
        }
    }

    public function afterLogin()
    {
        $user = User::where('email', Auth::user()->email)->first();//First is required because without first you get a collection and you cannot roles() on a collection.
        foreach ($user->roles as $role) {
            if($role->name === 'Mentor')
            {
                $students = Student::where('user_id',$user->id)->get();
                $visits = Visit::all();
                return view('users.afterLogin', compact('user','students','visits'));
            }
            else if($role->name === 'Pending')
            {
                $passwordSuccess = '';
                return view('users.RegistrationSuccess',compact('passwordSuccess'));
            }
            else if($role->name === 'Employee')
            {
                $students = Student::all();
                $visits = Visit::all();
                $grades = Grade::all();
                $mentors = User::whereHas('roles', function ($query) {
                                $query->where('name', 'like', 'Mentor');
                            })->get();
                return view('users.afterLogin', compact('user','students','mentors','visits','grades'));
            }
            else
            {
                $students = Student::all();            
                $users = User::all();
                return view('home',compact('users'));
            }
        }
    }

    public function resetPassword()
    {
        $user = User::where('email', Auth::user()->email)->first();
        return view('users.resetPassword',compact('user'));
    }

    public function updatePassword(Request $request)
    {
        $passwordSuccess = 'failed';
        $this->validate($request,[
                'email' => 'required|email',
                'password' => 'required|unique:users,password',
            ]);
        $user = User::where('email',Auth::user()->email)->first();
        if (Hash::check($request->oldpassword, $user->password))
        {
            $user->password = bcrypt($request->password);
            $user->update();
            $passwordSuccess = 'passed';
            return view('users.RegistrationSuccess',compact('passwordSuccess'));
        }
        return view('users.RegistrationSuccess',compact('passwordSuccess'));
    }
}

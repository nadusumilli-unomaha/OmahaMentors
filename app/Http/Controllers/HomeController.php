<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Student;
use App\Mentor;
use App\Visit;
use App\Grade;
use App\Note;
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
                return redirect()->action('UserController@index');
            }
        }
    }

    public function afterLogin(Request $request)
    {
        $user = User::where('email', Auth::user()->email)->first();//First is required because without first you get a collection and you cannot roles() on a collection.
        foreach ($user->roles as $role) {
            if($role->name === 'Mentor')
            {
                $students = Student::where('user_id',$user->id)->get();
                $visits = Visit::all();
                $notes = Note::all();
                return view('users.afterLogin', compact('user','students','visits','notes'));
            }
            else if($role->name === 'Pending')
            {
                $passwordSuccess = '';
                return view('users.RegistrationSuccess',compact('passwordSuccess'));
            }
            else if($role->name === 'Employee')
            {
                //This is the student search algorithm.
                if($request->studentTerm){
                    $students = Student::where('firstName','ilike','%'.$request->studentTerm.'%')
                        ->orWhere('email','ilike','%'.$request->studentTerm.'%')
                        ->orWhere('lastName','ilike','%'.$request->studentTerm.'%')
                        ->orWhere('city','ilike','%'.$request->studentTerm.'%')
                        ->orWhere('state','ilike','%'.$request->studentTerm.'%')
                        ->orWhere('address','ilike','%'.$request->studentTerm.'%')
                        ->orderBy('id','desc')
                        ->paginate(5);
                }
                else{
                    $students = Student::all();
                }
                //This is the visit search algorithm.
                if($request->visitTerm){
                    $visits = Visit::where('check','ilike','%'.$request->visitTerm.'%')
                        /*->orWhere('mentor','like','%'.$request->visitTerm.'%')
                        ->orWhere('student','like','%'.$request->visitTerm.'%')*/
                        ->orderBy('id','desc')
                        ->paginate(5);
                }
                else{
                    $visits = Visit::all();
                }
                //This is the grade search algorithm.
                if($request->gradeTerm){
                    $grades = Grade::where('period','ilike','%'.$request->gradeTerm.'%')
                        ->orWhere('subject','ilike','%'.$request->gradeTerm.'%')
                        ->orWhere('actual','ilike','%'.$request->gradeTerm.'%')
                        ->orWhere('comments','ilike','%'.$request->gradeTerm.'%')
                        ->orderBy('id','desc')
                        ->paginate(5);
                }
                else{
                    $grades = Grade::all();
                }
                //This is the mentor search algorithm.
                if($request->mentorTerm){
                    $mentors = User::whereHas('roles', function ($query) use($request){
                                $query->where('name', 'like', 'Mentor');
                    })
                        ->where(function ($query) use($request){
                            $query->where('firstName','ilike','%'.$request->mentorTerm.'%')
                            ->orWhere('email','ilike','%'.$request->mentorTerm.'%')
                            ->orWhere('lastName','ilike','%'.$request->mentorTerm.'%')
                            ->orWhere('city','ilike','%'.$request->mentorTerm.'%')
                            ->orWhere('state','ilike','%'.$request->mentorTerm.'%')
                            ->orWhere('address','ilike','%'.$request->mentorTerm.'%');  
                        })
                        ->orderBy('id','desc')
                        ->paginate(5);
                }
                else{
                    $mentors = User::whereHas('roles', function ($query) {
                                $query->where('name', 'like', 'Mentor');
                            })->get();
                }
                return view('users.afterLogin', compact('user','students','mentors','visits','grades'));
            }
            else
            {
                $students = Student::all();            
                $users = User::all();
                return redirect()->action('UserController@index');
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

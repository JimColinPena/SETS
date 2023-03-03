<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
use Redirect;
use Auth;
use View;


class UserController extends Controller
{
    public function getSignup(){
        return view('user.signup');
    }

     public function postSignup(Request $request){
        $this->validate($request, [
         // 'name' => 'required| min:4',
            'email' => 'email|required|unique:users',
            'password' => 'required| min:4'
        ]);
        $user = new User([
            'name' => $request->input('fname').' '.$request->mname.'. '.$request->lname,
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);
         $user->save();
         $student = new Student;
         $student->first_name = $request->fname;
         $student->last_name = $request->lname;
         $student->middle_name = $request->mname;
         $student->section = $request->section;
         $student->course = $request->course;
         $student->save();
         Auth::login($user);
         return redirect()->route('user.profile');
    }

    public function getSignin(){
        return view('user.signin');
    }

    public function postSignin(Request $request){
        $this->validate($request, [
            'email' => 'email| required',
            'password' => 'required| min:4'
        ]);
        if(auth()->attempt(array('email' => $request->email, 'password' => $request->password))) {
            // if (auth()->user()->isAdmin == 1) {
            //     return redirect()->route('dashboard.index');
            // } else {
                return redirect()->route('user.profile');
            // }
        }
        else {
            return redirect()->route('user.signin')->with('error','Email-Address And Password Are Wrong.');
        }
     }

    public function getProfile(){
        if(!Auth::check())
        {
            return redirect()->back();
        }
        // $student = Student::where('id',Auth::id())->first();
        // return view('dashboard.profile_info');

        $info = Student::where('id',Auth::id())->get();
        return View::make('dashboard.profile_info', compact('info'));
        
    }

    public function getLogout(){
        Auth::logout();
        return redirect()->route('user.signin');
    }
}

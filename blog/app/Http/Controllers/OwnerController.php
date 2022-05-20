<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Information;
class OwnerController extends Controller
{
    public function index()
    {
    
        $user = Information::all();
        return view('dashboard')->with('user',$user);
    }
    public function newregister()
    {
    
        return view('newregister');
    }

    public function employeestore(Request $request){

        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required'

        ]);



        $employee = new User();
        $employee->name = $request->input('name');
        $employee->email = $request->input('email');
        $employee->password = Hash::make($request->input('password'));
        $employee->save();

        return redirect('/dashboard');
    }

    public function employeedetails($id){
        $info = Information::findOrFail($id);
        $user = User::all();
        return view('employee')->with('info',$info)->with('user',$user);
    }

}

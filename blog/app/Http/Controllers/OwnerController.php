<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\User;
use App\Information;
class OwnerController extends Controller
{
    public function index()
    {
        

        
        $users = User::all();
        $information = DB::table('information')-> orderBy('id','desc')->get();
        $todayDate = Carbon::now()->format('m/d/Y');

        return view('dashboard')->with('users',$users)->with('information',$information)->with('todayDate',$todayDate);
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
        $info =  DB::table('information')-> orderBy('created_at', 'desc');
        $user = User::findOrFail($id);
        return view('employee2')->with('info',$info)->with('user',$user);
    }


    

}

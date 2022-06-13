<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Information;
class EmployeeController extends Controller
{
    public function index()
    {
        // $todayDate = Carbon::now()->format('d M, Y');
        $todayDate = Carbon::now()->format('m/d/Y');

        $todayTime = Carbon::now()->format('h:i A');
        return view('index')->with('todayDate',$todayDate)->with('todayTime',$todayTime);
    }
    public function checkout()
    {
        $todayDate = Carbon::now()->format('m/d/Y');

        $todayTime = Carbon::now()->format('h:i A');

        $infos = Information::all();
        return view('checkout')->with('todayDate',$todayDate)->with('todayTime',$todayTime)->with('infos',$infos);
    }


    public function checkin(Request $request){

        $this->validate($request,[
            'date' => 'required',
            'name' => 'required',
            'checkin' => 'required',

      
        ]);



        $checkin = new Information();
        $checkin -> user_id = Auth::id();
        $checkin->name = $request->input('name');
        $checkin->date = $request->input('date');
        $checkin->checkin = $request->input('checkin');
        $checkin->save();

        return redirect('/checkout')->with('status','You Have Checked in...');
    }

    public function check_out(Request $request,$id){
        $checkout = Information::findOrFail($id);
        $checkout->checkout = $request->input('checkout');
        $checkout->out = $request->input('out');
        $checkout->update();

        return redirect('/')->with('status','You Have Checked out...');
    }

}
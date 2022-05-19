<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class EmployeeController extends Controller
{
    public function index()
    {
        $todayDate = Carbon::now()->format('d M, Y');
        return view('index')->with('todayDate',$todayDate);
    }

}

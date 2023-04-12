<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReserveController extends Controller
{
    //
    public function add()
    {
        return view('camp.reserve');
    }
    
    public function form()
    {
        return view('camp.form');
    }
    
     public function form_1()
    {
        return view('camp.form_1');
    }
    
     public function complete()
    {
        return view('camp.complete');
    }
}

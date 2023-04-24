<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Accommodation;

class FormController extends Controller
{
    //
    public function form()
    {
        return view('camp.form');
    }
    public function form_1(Request $request)
    {
        return view('camp.form_1');
    }
    
    public function complete(Request $request)
    {
        return view('camp.complete');
    }
}

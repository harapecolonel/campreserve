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
    public function create(Request $request)
    {
        return redirect('camp/form_1');
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

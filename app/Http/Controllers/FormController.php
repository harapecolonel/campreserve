<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Accommodation;

use App\Models\User;

class FormController extends Controller
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
    
    public function confirm(Request $request)
    {
        $this->validate($request, Accommodation::$rules);
        $form = $request->all(); //配列だから['key']の形で値を取得する必要がある

        return view('camp.confirm', ['form' => $form]);
    }
    
    public function complete(Request $request)
    {
        $accommodation = new Accommodation;
        
        $form = $request->all();
        
        $accommodation->fill($form);
        $accommodation->save();
        
        
        return view('camp.complete');
    }
}

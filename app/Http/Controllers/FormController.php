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
    
    
    public function register(Request $request)
    {
        $form = $request->all();
        
        $user = new User;
        $user->name = $form['name'];
        $user->email = $form['email'];
        $user->password = encrypt('1234');
        $user->save();
        //dd($user->id);
    
        $accommodation = new Accommodation;
        $accommodation->check_in_datetime = $form['check_in_date'] . ' ' . $form['check_in_time'];
        $accommodation->check_out_date = $form['check_out_date'];
        $accommodation->number_of_users = $form['number_of_users'];
        $accommodation->camp_id = 1;
        $accommodation->site_id = 1;
        $accommodation->user_id = $user->id;
        $accommodation->price = 1000;
        $accommodation->save();
        
        return view('camp.complete');
    }
    
     public function complete(Request $request)
    {
        
        return view('camp.complete');
    }
}

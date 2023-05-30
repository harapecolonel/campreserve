<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Accommodation;

use App\Models\User;

use App\Models\Camp;

use App\Models\Site;

use Carbon\Carbon;

class FormController extends Controller
{
    //
     public function camp($campId,$siteId)
    {
        $camp = Camp::find($campId);
        $site = Site::find($siteId);
        //現在の年、月のカレンダーデータを取得する
        $month = Carbon::now()->month;
        $year = Carbon::now()->year;
        $calendar = $this->getCalendarDates($year, $month);
        return view('camp.index', ['camp' => $camp,'site' => $site,'dates' => $calendar,'currentMonth' => $month]);
    }
    
    
    public function form(Request $request,$campId,$siteId,$date)
    {
        $camp = Camp::find($campId);
        $site = Site::find($siteId);
        $date = new Carbon($date);
       
        
        return view('camp.form',['camp' => $camp,'site' => $site,'date' => $date]);
    }
    
    public function confirm(Request $request,$campId,$siteId,$date)
    {
        $this->validate($request, Accommodation::$rules);
        $form = $request->all(); //配列だから['key']の形で値を取得する必要がある
        $camp = Camp::find($campId);
        $site = Site::find($siteId);
        $date = new Carbon($date);
        

        return view('camp.confirm', ['form' => $form,'camp' => $camp,'site' => $site,'date' => $date]);
    }
    
    
    public function register(Request $request,$campId,$siteId)
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
        
        $camp = Camp::find($campId);
        $site = Site::find($siteId);
        
        return view('camp.complete',['camp' => $camp,'site' => $site]);
    }
    
     public function complete(Request $request)
    {
        
        return view('camp.complete');
    }
    
    private function getCalendarDates($year, $month)
    {
        
        $dateStr = sprintf('%04d-%02d-01', $year, $month);
        $date = new Carbon($dateStr);
        // カレンダーを四角形にするため、前月となる左上の隙間用のデータを入れるためずらす
        $date->subDay($date->dayOfWeek);
        // 同上。右下の隙間のための計算。
        $count = 31 + $date->dayOfWeek;
        $count = ceil($count / 7) * 7;
        $dates = [];

        for ($i = 0; $i < $count; $i++, $date->addDay()) {
            // copyしないと全部同じオブジェクトを入れてしまうことになる
            $dates[] = $date->copy();
        }
        return $dates;
    }
}

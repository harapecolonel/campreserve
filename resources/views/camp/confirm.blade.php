{{-- layouts/form.blade.phpを読み込む --}}
@extends('layouts.form')

{{-- form.blade.phpの@yield('title')に'camp'を埋め込む --}}
@section('title', 'camp')

{{-- camp.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
      <body>
        <div class="form1">
        <h1>予約フォーム</h1>
        <form action="{{ route('camp.register',['campId' => $camp->id, 'siteId' => $site->id])}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form">
            <div class="col-md-12">
              <label class="col-md-4">キャンプ場: {{ $camp->camp_name }}</label>
            </div>
            <div class="col-md-12">
              <label class="col-md-4">サイト場: {{ $site->site_name }}</label>
            </div>
            <div class="col-md-12">
              @if($date->isWeekend())
                <label class="col-md-4">料金: {{ $site->holidayrate }}</label>
                <input type="hidden" class="form-control" name="price" value="{{  $site->holidayrate }}">
              @else
                <label class="col-md-4">料金: {{$site->weekdayrate }}</label>
                <input type="hidden" class="form-control" name="price" value="{{  $site->weekdayrate }}">
              @endif
            </div>
            <div class="row">
              <label class="col-md-4">氏名 : {{ $form['name'] }}</label>
              <div class="col-md-8">
                <input type="hidden"  name="name" value="{{ $form['name'] }}">
              </div>
             </div>
            <label class="col-md-8">メールアドレス : {{ $form['email'] }}</label>
             <input type="hidden"  name="email" value="{{ $form['email'] }}">
            <label class="col-md-4">利用者数 : {{ $form['number_of_users'] }}名</label>
              <div class="col-md-12">
                <input type="hidden"  name="number_of_users" value="{{ $form['number_of_users'] }}">
              </div>
            <label class="col-md-12">チェックイン日 : {{ $date->format('Y年m月d日') }}</label>
              <div class="col-md-12">
                <input type="hidden"  name="check_in_date" value="{{ $date->format('Y-m-d') }}">
              </div>
            <label class="col-md-4">チェックイン時間 : {{  $form['check_in_time'] }}</label>
              <div class="col-md-12">
                <input type="hidden"  name="check_in_time" value="{{ $form['check_in_time'] }}">
              </div>
            <label class="col-md-8">チェックアウト日 : {{ $form['check_out_date'] }}</label>
              <div class="col-md-12">
                <input type="hidden"  name="check_out_date" value="{{ $form['check_out_date'] }}">
              </div>
               <input type="submit"  class="btn btn-primary" value="完了画面へ">
           </div>
      </form>
        </div>
      </body>
    @yield('content')
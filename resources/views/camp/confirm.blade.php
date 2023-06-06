{{-- layouts/form.blade.phpを読み込む --}}
@extends('layouts.form')

{{-- form.blade.phpの@yield('title')に'camp'を埋め込む --}}
@section('title', 'camp')

{{-- camp.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
      <div class="row">
        <div class="col-md-5 mx-auto">
          <body>
            <div class="container">
              <h1 class="text-center mt-2 mb-5">予約フォーム</h1>
              <form action="{{ route('camp.register',['campId' => $camp->id, 'siteId' => $site->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="container">
                  <div class="form-group row">
                    <label class="col-sm-12 col-form-label">キャンプ場: {{ $camp->camp_name }}</label>
                    <div class="col-md-8">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-12 col-form-label">サイト場: {{ $site->site_name }}</label>
                    <div class="col-md-8">
                    </div>
                  </div>
                  <div class="form-group row">
                    @if($date->isWeekend())
                      <label class="col-sm-12 col-form-label">料金: {{ $site->holidayrate }}</label>
                      <input type="hidden" class="form-control" name="price" value="{{  $site->holidayrate }}">
                    @else
                      <label class="col-sm-12 col-form-label">料金: {{$site->weekdayrate }}</label>
                      <input type="hidden" class="form-control" name="price" value="{{  $site->weekdayrate }}">
                    @endif
                    <div class="col-md-8">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-12 col-form-label">氏名 : {{ $form['name'] }}</label>
                    <input type="hidden"  name="name" value="{{ $form['name'] }}">
                    <div class="col-md-8">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-12 col-form-label">メールアドレス : {{ $form['email'] }}</label>
                    <input type="hidden"  name="email" value="{{ $form['email'] }}">
                    <div class="col-md-8">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-12 col-form-label">利用者数 : {{ $form['number_of_users'] }}名</label>
                    <input type="hidden"  name="number_of_users" value="{{ $form['number_of_users'] }}">
                    <div class="col-md-8">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-12 col-form-label">チェックイン日 : {{ $date->format('Y年m月d日') }}</label>
                    <input type="hidden"  name="check_in_date" value="{{ $date->format('Y-m-d') }}">
                    <div class="col-md-8">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-12 col-form-label">チェックイン時間 : {{  $form['check_in_time'] }}</label>
                    <input type="hidden"  name="check_in_time" value="{{ $form['check_in_time'] }}">
                    <div class="col-md-8">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-12 col-form-label">チェックアウト日 : {{ $date->addDay()->format('Y年m月d日') }}</label>
                    <input type="hidden"  name="check_out_date" value="{{ $date->addDay()->format('Y-m-d') }}">
                    <div class="col-md-12">
                    </div>
                  </div>
                  <div class="text-center my-5">
                    <input type="submit"  class="btn btn-primary" value="完了画面へ">
                  </div>
                </div>
              </form>
            </div>
          </body>
        </div>
      </div>
    </div>
    @yield('content')
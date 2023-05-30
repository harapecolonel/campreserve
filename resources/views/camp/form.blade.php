{{-- layouts/form.blade.phpを読み込む --}}
@extends('layouts.form')

{{-- form.blade.phpの@yield('title')に'camp'を埋め込む --}}
@section('title', 'camp')

{{-- camp.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
      <body>
        <h1>予約フォーム</h1>
        <form action="{{ route('camp.confirm',['campId' => $camp->id, 'siteId' => $site->id, 'date' => $date->format('Y-m-d')]) }}" method="post" enctype="multipart/form-data">
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
            
            <label class="col-md-4">氏名</label>
            <div class="col-md-12">
              <input type="text" class="form-control" name="name" value="{{ old('name') }}">
            </div>
            <label class="col-md-4">メールアドレス</label>
            <div class="col-md-12">
              <input type="email" class="form-control" name="email" value="{{ old('email') }}">
            </div>
            <label class="col-md-4">利用者数</label>
            <div class="col-md-12">
              <input type="text" class="form-control" name="number_of_users"　value="{{ old('number_of_users') }}">
            </div>
            <label class="col-md-12">チェックイン日:{{ $date->format('Y年m月d日') }}</label>
            <div class="col-md-12">
              <input type="hidden" class="form-control" name="check_in_date" value="{{ $date }}">
            </div>
            <label class="col-md-4">チェックイン時間</label>
            <div class="col-md-12">
              <input type="time" class="form-control" name="check_in_time" value="{{ old('check_in_time') }}">
            </div>
            <label class="col-md-4">チェックアウト日</label>
            <div class="col-md-12">
              <input type="date" class="form-control" name="check_out_date" value="{{ old('check_out_date') }}">
            </div>
            <input type="submit"  class="btn btn-primary" value="確認画面へ">
            <div class="validation">
             @if (count($errors) > 0)
              <ul>
                  @foreach($errors->all() as $e)
                      <li>{{ $e }}</li>
                  @endforeach
              </ul>
             @endif
            </div>
          </div>
      </form>
      </body>
    @yield('content')
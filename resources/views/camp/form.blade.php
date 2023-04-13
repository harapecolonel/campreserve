{{-- layouts/form.blade.phpを読み込む --}}
@extends('layouts.form')

{{-- form.blade.phpの@yield('title')に'camp'を埋め込む --}}
@section('title', 'camp')

{{-- camp.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
      <body>
        <h1>予約フォーム</h1>
        <div class="form">
          <p>キャンプ場</p>
          <p>利用サイト名</p>
          <label class="col-md-4">氏名</label>
            <div class="col-md-12">
              <input type="text" class="form-control" name="name" value="{{ old('name') }}">
            </div>
          <label class="col-md-4">メールアドレス</label>
            <div class="col-md-12">
              <input type="email" class="form-control" name="mailaddress" value="{{ old('address') }}">
            </div>
          <label class="col-md-4">チェックイン日</label>
            <div class="col-md-12">
              <input type="date" class="form-control" name="checkin" value="{{ old('checkin') }}">
            </div>
          <label class="col-md-4">チェックイン時間</label>
            <div class="col-md-12">
              <input type="time" class="form-control" name="checkintime" value="{{ old('checkintime') }}">
            </div>
          <label class="col-md-4">チェックアウト日</label>
            <div class="col-md-12">
              <input type="date" class="form-control" name="checkout" value="{{ old('checkout') }}">
            </div>
            <input type="submit" class="btn btn-primary" value="確認画面へ">
        </div>
      </body>
    @yield('content')
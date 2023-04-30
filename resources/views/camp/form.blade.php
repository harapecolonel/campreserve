{{-- layouts/form.blade.phpを読み込む --}}
@extends('layouts.form')

{{-- form.blade.phpの@yield('title')に'camp'を埋め込む --}}
@section('title', 'camp')

{{-- camp.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
      <body>
        <h1>予約フォーム</h1>
        <form action="{{ route('camp.confirm') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="validation">
             @if (count($errors) > 0)
              <ul>
                  @foreach($errors->all() as $e)
                      <li>{{ $e }}</li>
                  @endforeach
              </ul>
             @endif
          </div>
          <div class="form">
            <p>キャンプ場</p>
            <p>利用サイト名</p>
            <p>料金</p>
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
            <label class="col-md-4">チェックイン日</label>
              <div class="col-md-12">
                <input type="date" class="form-control" name="check_in_date" value="{{ old('check_in_date') }}">
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
          </div>
      </form>
      </body>
    @yield('content')
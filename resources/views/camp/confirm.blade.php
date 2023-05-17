{{-- layouts/form.blade.phpを読み込む --}}
@extends('layouts.form')

{{-- form.blade.phpの@yield('title')に'camp'を埋め込む --}}
@section('title', 'camp')

{{-- camp.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
      <body>
        <div class="form1">
        <h1>予約フォーム</h1>
        <form action="{{ route('camp.register') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form">
            <p>キャンプ場</p>
            <p>利用サイト名</p>
            <p>料金</p>
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
            <label class="col-md-4">チェックイン日 : {{ $form['check_in_date'] }}</label>
              <div class="col-md-12">
                <input type="hidden"  name="check_in_date" value="{{ $form['check_in_date'] }}">
              </div>
            <label class="col-md-4">チェックイン時間 : {{ $form['check_in_time'] }}</label>
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
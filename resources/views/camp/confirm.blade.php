{{-- layouts/form.blade.phpを読み込む --}}
@extends('layouts.form')

{{-- form.blade.phpの@yield('title')に'camp'を埋め込む --}}
@section('title', 'camp')

{{-- camp.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
      <body>
        <div class="form1">
        <h1>予約フォーム</h1>
        <form action="{{ route('camp.complete') }}" method="get" enctype="multipart/form-data">
          <div class="form">
            <p>キャンプ場</p>
            <p>利用サイト名</p>
            <div class="row">
              <label class="col-md-4">氏名 : {{ $form['name'] }}</label>
              <div class="col-md-8">
               </div>
             </div>
            <label class="col-md-8">メールアドレス : {{ $form['email'] }}</label>
            <label class="col-md-4">利用者数 : {{ $form['number_of_users'] }}名</label>
              <div class="col-md-12">
              </div>
            <label class="col-md-4">チェックイン日 : {{ $form['check_in_date'] }}</label>
              <div class="col-md-12">
              </div>
            <label class="col-md-4">チェックイン時間 : {{ $form['check_in_time'] }}</label>
              <div class="col-md-12">
              </div>
            <label class="col-md-8">チェックアウト日 : {{ $form['check_out_date'] }}</label>
              <div class="col-md-12">
              </div>
               <input type="submit"  class="btn btn-primary" value="完了画面へ">
           </div>
      </form>
        </div>
      </body>
    @yield('content')
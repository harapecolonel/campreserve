{{-- layouts/form.blade.phpを読み込む --}}
@extends('layouts.form')

{{-- form.blade.phpの@yield('title')に'camp'を埋め込む --}}
@section('title', 'camp')

{{-- camp.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
      <div class="row">
        <div class="col-md-6 mx-auto">
          <body>
            <div class="container">
              <h1 class="text-center mt-2 mb-5">予約フォーム</h1>
              <form action="{{ route('camp.register',['campId' => $camp->id, 'siteId' => $site->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="container">
                  <div class="form-group row p-auto">
                    <label class="col-sm-6 col-form-label mb-md-3">キャンプ場</label>
                    <div class="col-md-6">
                      {{ $camp->camp_name }}
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-6 col-form-label mb-md-3">サイト場</label>
                    <div class="col-md-6">
                      {{ $site->site_name }}
                    </div>
                  </div>
                  <div class="form-group row">
                    @if($date->isWeekend())
                      <label class="col-sm-6 col-form-label mb-md-3">料金</label>
                      <input type="hidden" class="form-control" name="price" value="{{  $site->holidayrate }}">
                      <div class="col-md-6">
                        {{ $site->holidayrate }}
                      </div>
                    @else
                      <label class="col-sm-6 col-form-label mb-md-3">料金</label>
                      <input type="hidden" class="form-control" name="price" value="{{  $site->weekdayrate }}">
                      <div class="col-md-6">
                        {{$site->weekdayrate }}
                      </div>
                    @endif
                  </div>
                  <div class="form-group row">
                    <label class="col-md-6 col-form-label mb-md-3">氏名</label>
                    <input type="hidden"  name="name" value="{{ $form['name'] }}">
                    <div class="col-md-6">
                      {{ $form['name'] }}
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-6 col-form-label mb-md-3">メールアドレス</label>
                    <input type="hidden"  name="email" value="{{ $form['email'] }}">
                    <div class="col-md-6">
                      {{ $form['email'] }}
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-6 col-form-label mb-md-3">利用者数 </label>
                    <input type="hidden"  name="number_of_users" value="{{ $form['number_of_users'] }}">
                    <div class="col-md-6">
                      {{ $form['number_of_users'] }}名
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-6 col-form-label mb-md-3">チェックイン日</label>
                    <input type="hidden"  name="check_in_date" value="{{ $date->format('Y-m-d') }}">
                    <div class="col-md-6">
                       {{ $date->format('Y年m月d日') }}
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-6 col-form-label mb-md-3">チェックイン時間</label>
                    <input type="hidden"  name="check_in_time" value="{{ $form['check_in_time'] }}">
                    <div class="col-md-6">
                      {{  $form['check_in_time'] }}
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-6 col-form-label mb-md-3">チェックアウト日</label>
                    <input type="hidden"  name="check_out_date" value="{{ $date->addDay()->format('Y-m-d') }}">
                    <div class="col-md-6">
                      {{ $date->addDay()->format('Y年m月d日') }}
                    </div>
                  </div>
                  <div class="text-center my-3">
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
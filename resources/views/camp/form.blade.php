{{-- layouts/form.blade.phpを読み込む --}}
@extends('layouts.form')

{{-- form.blade.phpの@yield('title')に'camp'を埋め込む --}}
@section('title', 'camp')

{{-- camp.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
      <div class="row">
        <div class="col-md-8 mx-auto">
          <body>
            <div class="container">
              <h1 class="text-center mt-2 mb-5">予約フォーム</h1>
              <form action="{{ route('camp.confirm',['campId' => $camp->id, 'siteId' => $site->id, 'date' => $date->format('Y-m-d')]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="container">
                  <div class="form-group row">
                    <label class="col-sm-4">キャンプ場 </label>
                    <div class="col-md-8">
                      {{ $camp->camp_name }}
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-labe">サイト場 </label>
                    <div class="col-md-8">
                      {{ $site->site_name }}
                    </div>
                  </div>
                  <div class="form-group row">
                    @if($date->isWeekend())
                      <label class="col-sm-4 col-form-labe">料金</label>
                      <div class="col-md-8">
                         {{ $site->holidayrate }}
                      </div>
                      <input type="hidden" class="form-control" name="price" value="{{  $site->holidayrate }}">
                    @else
                      <label class="col-sm-4 col-form-labe">料金</label>
                       <div class="col-md-8">
                          {{$site->weekdayrate }}
                       </div>
                      <input type="hidden" class="form-control" name="price" value="{{  $site->weekdayrate }}">
                    @endif
                  </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">氏名</label>
                      <div class="col-md-8">
                      <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        @if ($errors->has('name'))
                          <p>{{$errors->first('name')}}</p>
                        @endif  
                      </div>
                    </div>
                    <div class="form-group row">
                      <label  class="col-sm-4 col-form-label">メールアドレス</label>
                      <div class="col-md-8">
                      <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                          <p>{{$errors->first('email')}}</p>
                        @endif
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">利用者数</label>
                      <div class="col-md-8">
                        <input type="text" class="form-control" name="number_of_users"　value="{{ old('number_of_users') }}">
                           @if ($errors->has('number_of_users'))
                            <p>{{$errors->first('number_of_users')}}</p>
                           @endif  
                      </div>
                    </div>
                    <div class="form-group row">
                      <label  class="col-sm-4 col-form-label">チェックイン日</label>
                      <div class="col-md-8">
                        {{ $date->format('Y年m月d日') }}
                      </div>
                      <input type="hidden" class="form-control" name="check_in_date" value="{{ $date }}">
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">チェックイン時間</label>
                      <div class="col-md-8">
                        <input type="time" class="form-control" name="check_in_time" value="{{ old('check_in_time') }}">
                          @if ($errors->has('check_in_time'))
                            <p>{{$errors->first('check_in_time')}}</p>
                          @endif 
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">チェックアウト日</label>
                      <div class="col-md-8">
                        {{ $date->addDay()->format('Y年m月d日') }}
                      </div>
                       <input type="hidden" class="form-control" name="check_out_date" value="{{ $date->addDay() }}">
                    </div>
                    <div class="text-center my-5">
                      <input type="submit"  class="btn btn-primary" value="確認画面へ">
                      <div class="validation">
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </body>
        </div>
      </div>
    </div>
        @yield('content')
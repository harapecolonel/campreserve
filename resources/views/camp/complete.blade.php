{{-- layouts/camp.blade.phpを読み込む --}}
@extends('layouts.complete')

{{-- camp.blade.phpの@yield('title')に'camp'を埋め込む --}}
@section('title', 'camp')

{{-- camp.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
<body>
  <form action="{{ route('camp.complete') }}" method="post" enctype="multipart/form-data">
    <p>予約完了</p>
    <button>TOPへ戻る</button>
  </form>
</body>
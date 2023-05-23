{{-- layouts/camp.blade.phpを読み込む --}}
@extends('layouts.camp')


{{-- camp.blade.phpの@yield('title')に'camp'を埋め込む --}}
@section('title', 'camp')

{{-- camp.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
  <body>
    <div class="container-fluid">
      <div class="row">
          <h1>camp</h1>
            <table>
              <tr>
                <div class="image-0">
                  <div class="image-1">
                    <td><img src="/images/7650973264_IMG_3376.JPG" alt="キャンプ場の写真1" width="400px"height="200px"></td>
                  </div>
                  <div class="image-2">
                      <td><img src="/images/camp-g6f2ec4285_1920.jpg" alt="キャンプ場の写真2" width="400px"height="200px"></td>
                  </div>
                  <div class="image-3">
                      <td><img src="/images/campfire-g2efeb8f49_1920.jpg" alt="キャンプ場の写真3" width="400px"height="200px"></td>
                  </div>
                </div>
              </tr>
            </table>
                <div class="card-contents">
                  <div class="left-contents">
                    <div class="calendar">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            @foreach (['日', '月', '火', '水', '木', '金', '土'] as $dayOfWeek)
                            <th>{{ $dayOfWeek }}</th>
                            @endforeach
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($dates as $date)
                          @if ($date->dayOfWeek == 0)
                          <tr>
                          @endif
                            <td
                              @if ($date->month != $currentMonth)
                              class="bg-secondary"
                              @endif
                            >
                            
                            <a href="{{ route('camp.form', ['campId' => $camp->id, 'siteId' => $site->id, 'date' => $date->format('Y-m-d')]) }}">{{ $date->day }}</a> 
                  
                            </td>
                          @if ($date->dayOfWeek == 6)
                          </tr>
                          @endif
                          @endforeach
                        </tbody>
                      </table>

                    <!--<p>May 2023</p>-->
                    <!--<table>-->
                    <!--  <tr>-->
                    <!--    <th>SUN</th>-->
                    <!--    <th>MON</th>-->
                    <!--    <th>TUE</th>-->
                    <!--    <th>WED</th>-->
                    <!--    <th>THU</th>-->
                    <!--    <th>FRI</th>-->
                    <!--    <th>SAT</th>-->
                    <!--  </tr>-->
                    <!--  <tr>-->
                    <!--    <td></td>-->
                    <!--    <td></td>-->
                    <!--    <td></td>-->
                    <!--    <td></td>-->
                    <!--    <td>1</td>-->
                    <!--    <td>2</td>-->
                    <!--    <td>3</td>-->
                    <!--  </tr>-->
                    <!--  <tr>-->
                    <!--    <td>4</td>-->
                    <!--    <td>5</td>-->
                    <!--    <td>6</td>-->
                    <!--    <td>7</td>-->
                    <!--    <td>8</td>-->
                    <!--    <td>9</td>-->
                    <!--    <td>10</td>-->
                    <!--  </tr>-->
                    <!--  <tr>-->
                    <!--    <td>11</td>-->
                    <!--    <td>12</td>-->
                    <!--    <td>13</td>-->
                    <!--    <td>14</td>-->
                    <!--    <td>15</td>-->
                    <!--    <td>16</td>-->
                    <!--    <td>17</td>-->
                    <!--  </tr>-->
                    <!--  <tr>-->
                    <!--    <td>18</td>-->
                    <!--    <td>19</td>-->
                    <!--    <td>20</td>-->
                    <!--    <td>21</td>-->
                    <!--    <td>22</td>-->
                    <!--    <td>23</td>-->
                    <!--    <td>24</td>-->
                    <!--  </tr>-->
                    <!--  <tr>-->
                    <!--    <td>25</td>-->
                    <!--    <td>26</td>-->
                    <!--    <td>27</td>-->
                    <!--    <td>28</td>-->
                    <!--    <td>29</td>-->
                    <!--    <td>30</td>-->
                    <!--    <td>31</td>-->
                    <!--  </tr>-->
                    <!--</table>-->
                  </div>
                </div>
                <div class="right-contents">
                  <div class="facilities">
                    <table>
                      <tr>
                        <th>キャンプ場名</th>
                        <td>{{ $camp->camp_name }}</td>
                      </tr>
                      <tr>
                        <th><span>住所</span></th>
                        <td>{{ $camp->address }}</td>
                      </tr>
                      <tr>
                        <th><span>電話番号</span></th>
                        <td>{{ $camp->tel }}</td>
                      </tr>
                      <tr>
                        <th>説明</th>
                        <td>{{ $camp->explanation }}</td>
                        <!--<h2>施設情報</h2>-->
                        <!--<p>あふれる自然を感じられるキャンプ場です。1日限定3組。</p>-->
                        <!--<td>施設利用料・駐車場代・ゴミ回収費・シャワー代込み<br>-->
                        <!-- ・展望サイト5000円〜<br>-->
                        <!-- ・森サイト3000円〜<br>-->
                        <!-- ・秘密基地サイト2500円〜<br>-->
                        <!--  ※チェックイン時に現金払い<br>-->
                        <!--  ※サイト料金はご宿泊日（平日・休日）により異なります</td>-->
                        <!--<span>営業時間</span>-->
                        <!--<td>-->
                        <!--  <p><span>［受付時間］</span></p>-->
                        <!--  <p>・平日　8:30～17:00</p>-->
                        <!--  <p>・週末　8:30～18:00</p>-->
                        <!--  <p><span>［売店営業時間］</span></p>-->
                        <!--  <p>・平日　13:00～17:00</p>-->
                        <!--  <p>・週末　13:00～18:00</p>-->
                        <!--  <p><span>［チェックイン］</span></p>-->
                        <!--  <p>・13:00～16:00</p>-->
                        <!--  <p>※アーリー・レイト可（ご希望の方は電話にてご連絡ください）</p>-->
                        <!--  <p><span>［チェックアウト］</span></p>-->
                        <!--  <p>・〜11:00まで</p>-->
                        <!--</td>-->
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </body>
@endsection

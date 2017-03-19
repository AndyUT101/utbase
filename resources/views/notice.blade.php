@extends('layouts.utbase') 
@section('content')
<!-- Demo Panel -->
<div class="row">
  <div class="col-md-12">
    <div class="panel">
      <div class="panel-heading text-primary">
        <h3 class="panel-title"><i class="fa fa-th"></i> 顯示情況
        </h3>
      </div>
<div class="panel-body ">
        <table class="table">
          <thead>
            <tr>
              <th>資訊內容</th>
              <th>尺寸</th>
              <th>瀏覽畫面內容</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>控制系統</td>
              <td>--</td>
              <td><a href="{{ url('/') }}">{{ url('/') }}</a></td>
            </tr>
            <tr>            <tr>
              <td>新聞資訊feed</td>
              <td>1920 x 126</td>
              <td><a href="{{ url('display/newsfeed') }}">{{ url('display/newsfeed') }}</a></td>
            </tr>
            <tr>
              <td>餐牌顯示</td>
              <td>1488 x 954</td>
              <td><a href="{{ url('display/meal') }}">{{ url('display/meal') }}</a></td>
            </tr>          
            <tr>
              <td>日期及時間顯示</td>
              <td>438 x 954</td>
              <td><a href="{{ url('display/timeweather') }}">{{ url('display/timeweather') }}</a></td>
            </tr>  
           </tbody>
        </table>
      <!-- /panel body -->
    </div>
  </div>
<div class="col-md-12">
    <div class="panel">
      <div class="panel-heading text-primary">
        <h3 class="panel-title"><i class="fa fa-th"></i> 顯示位置設定
        </h3>
      </div>
    <div class="panel-body">
        <p><a href="https://www.yodeck.com" type="button" class="btn btn-warning" target="_blank">使用 YoDeck</a>
</p>
    </div>
  </div>
</div>
@endsection

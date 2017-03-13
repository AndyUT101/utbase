@extends('layouts.utbase') 
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-cascade">
      <div class="panel-heading">
        <h3 class="panel-title text-primary">預覽</h3>
      </div>
      <div class="panel-body panel-border">
      <p>請檢查更新內容是否有錯誤，如無錯誤請更新資料。</p>
        <a href="{{ url('/import/process', $excelkey) }}" class="btn btn-success btn-lg btn-animate-demo">更新資料</a>
      </div>
      <div>
        <table class="table">
          <thead>
            <tr>
              <th>日期 #</th>
              <th>早餐</th>
              <th>午餐</th>
              <th>湯水</th>
              <th>水果</th>
              <th>下午茶</th>
              <th>晚餐</th>
              <th>宵夜</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($menupreview as $menurow)
            <tr>
              <td>{{ $menurow -> date }}</td>
              <td>{{ $menurow -> breakfast1 }}
                <br/>{{ $menurow -> breakfast2 }}</td>
              <td>{{ $menurow -> lunch1 }}
                <br/>{{ $menurow -> lunch2 }}</td>
              <td>{{ $menurow -> soup1 }}
                <br/>{{ $menurow -> soup2 }}</td>
              <td>{{ $menurow -> fruit1 }}
                <br/>{{ $menurow -> fruit2 }}</td>
              <td>{{ $menurow -> teatime1 }}
                <br/>{{ $menurow -> teatime2 }}</td>
              <td>{{ $menurow -> dinner1 }}
                <br/>{{ $menurow -> dinner2 }}</td>
              <td>{{ $menurow -> supper1 }}
                <br/>{{ $menurow -> supper2 }}</td>                                
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>    
</div>
@endsection

@extends('layouts.utbase') 
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-cascade">
      <div class="panel-heading">
        <h3 class="panel-title text-primary">
                        Demo Panel
                        <span class="pull-right">
                          <a href="#" class="panel-minimize"><i class="fa fa-chevron-up"></i></a>
                          <a href="#" class="panel-close"><i class="fa fa-times"></i></a>
                        </span>
                      </h3>
      </div>
      <div class="panel-body panel-border">
        <a href="{{ url('/import/process', $excelkey) }}" class="btn btn-success btn-lg btn-animate-demo">Success</a>
      </div>
      <div>
        <table class="table">
          <thead>
            <tr>
              <th>Date #</th>
              <th>早餐</th>
              <th>午餐</th>
              <th>湯水</th>
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

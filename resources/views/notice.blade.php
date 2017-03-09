@extends('layouts.utbase') 
@section('content')
<!-- Demo Panel -->
<div class="row">
  <div class="col-md-12">
    <div class="panel">
      <div class="panel-heading text-primary">
        <h3 class="panel-title"><i class="fa fa-th"></i> 顯示情況
          <span class="pull-right">
            <div class="btn-group code">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Classes used"><i class="fa fa-code"></i></a>
              <ul class="dropdown-menu pull-right list-group" role="menu">
                <li class="list-group-item"><code>.table</code></li>
              </ul>
            </div>
            <a href="#" class="panel-minimize"><i class="fa fa-chevron-up"></i></a>
            <a href="#" class="panel-close"><i class="fa fa-times"></i></a>
          </span>
        </h3>
      </div>
      <div class="panel-body ">
        <table class="table">
          <thead>
            <tr>
              <th>Date #</th>
              <th>Meal</th>
              <th>Menu</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($recently_meal as $menu)
            <tr>
              <td>{{ $menu -> availabledate }}</td>
              <td><span class="label bg-seagreen text-white">早餐</span></td>
              <td>{{ $menu -> breakfast1 }}
                <br/>{{ $menu -> breakfast2 }}</td>
            </tr>
            <tr>
              <td></td>
              <td><span class="label bg-info text-white">午餐</span></td>
              <td>{{ $menu -> lunch1 }}
                <br/>{{ $menu -> lunch2 }}</td>
            </tr>
            <tr>
              <td></td>
              <td><span class="label bg-pink text-white">湯水</span></td>
              <td>{{ $menu -> soup1 }}
                <br/>{{ $menu -> soup2 }}</td>
            </tr>
            <tr>
              <td></td>
              <td><span class="label bg-purple text-white">下午茶</span></td>
              <td>{{ $menu -> teatime1 }}
                <br/>{{ $menu -> teatime2 }}</td>
            </tr>
            <tr>
              <td></td>
              <td><span class="label bg-yellow text-white">晚餐</span></td>
              <td>{{ $menu -> dinner1 }}
                <br/>{{ $menu -> dinner2 }}</td>
            </tr>
            <tr>
              <td></td>
              <td><span class="label label-default text-white">宵夜</span></td>
              <td>{{ $menu -> supper1 }}
                <br/>{{ $menu -> supper2 }}</td>
            </tr>

            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /panel body -->
    </div>
  </div>

</div>
@endsection

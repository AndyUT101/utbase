@extends('layouts.utbase')
@section('content')
@if ($success)
<div class="row">
  <div class="col-md-12">
    <div class="alert alert-success">
      餐單設定已更新
    </div>
  </div>
</div>
@endif
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-cascade panel-file-upload">
      <div class="panel-heading">
        <h3 class="panel-title">
               File uploader
               <span class="pull-right">
                <a  href="#" class="panel-minimize"><i class="fa fa-chevron-up"></i></a>
                <a  href="#"  class="panel-settings"><i class="fa fa-cog"></i></a>
                <a  href="#"  class="panel-close"><i class="fa fa-times"></i></a>
              </span>
            </h3>
      </div>
      <div class="panel-body nopadding">
        <form id="upload" method="post" action="{{ url('/import/timetable') }}" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div id="drop">
            Drop Here
            <br />
            <a>Browse</a>
            <input type="file" name="uploaddoc" />
          </div>
          <ul>
            <!-- The file uploads will be shown here -->
          </ul>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
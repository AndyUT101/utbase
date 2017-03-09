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
    <div class="panel panel-cascade">
      <div class="panel-heading">
        <h3 class="panel-title text-primary">
                        上傳餐單資料
                        <span class="pull-right">
                          <a href="#" class="panel-minimize"><i class="fa fa-chevron-up"></i></a>
                          <a href="#" class="panel-close"><i class="fa fa-times"></i></a>
                        </span>
                      </h3>
      </div>
      <div class="panel-body panel-border">
        上傳附餐單資料的xlsx檔案，請在<a href="{{ url('/resource/template') }}" target="_blank">此處下載範本文件</a>。
      </div>
      <!-- /panel body -->
    </div>
  </div>
  <div class="col-md-12">
    <div class="panel panel-cascade panel-file-upload">
      <div class="panel-heading">
        <h3 class="panel-title">
               上傳檔案 (.xlsx)
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
            拖放檔案到此
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
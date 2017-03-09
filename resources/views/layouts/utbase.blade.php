<!DOCTYPE html>
<html lang="UTF-8">

  <head>
    <meta charset="utf-8">
    <title>{{ $title }} | 蔚耆苑餐單顯示系統</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="{{ url('css/bootstrap.css') }}" rel="stylesheet">

    <!-- Loading Stylesheets -->
    <link href="{{ url('css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ url('css/style.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ url('less/style.less') }}" rel="stylesheet" title="lessCss" id="lessCss">

    <!-- Loading Custom Stylesheets -->
    <link href="{{ url('css/custom.css') }}" rel="stylesheet">

    <link rel="shortcut icon" href="images/favicon.ico">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="{{ url('js/html5shiv.js') }}"></script>
      <![endif]-->
  </head>

  <body>
    <div class="site-holder">
      <!-- this is a dummy text -->
      <!-- .navbar -->
      <nav class="navbar" role="navigation">

        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <a class="navbar-brand" href="#"><i class="fa fa-list btn-nav-toggle-responsive text-white"></i> <span class="logo">Cas<strong>ca</strong>de <i class="fa fa-bookmark"></i></span></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav user-menu navbar-right ">

            <li><a href="#" class="user dropdown-toggle" data-toggle="dropdown"><span class="username"><img src="{{ url('images/userlogo.jpg') }}" class="user-avatar" alt="">  蔚耆苑 </span></a>
              <ul class="dropdown-menu">
                <li><a href="#"><i class="fa fa-cogs"></i> 設定</a></li>
                <li class="divider"></li>
                <li><a href="{{ url('/logout') }}" class="text-danger"><i class="fa fa-lock"></i> 登出</a></li>
              </ul>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </nav>
      <!-- /.navbar -->

      <!-- .box-holder -->
      <div class="box-holder">

        <!-- .left-sidebar -->
        <div class="left-sidebar">
          <div class="sidebar-holder">
            <ul class="nav  nav-list">

              <!-- sidebar to mini Sidebar toggle -->
              <li class="nav-toggle">
                <button class="btn  btn-nav-toggle text-primary"><i class="fa fa-angle-double-left toggle-left"></i> </button>
              </li>

              @if ($navtitle == 'index') <li class="active"> @else <li> @endif<a href="{{ url('/') }}" data-original-title="Dashboard"><i class="fa fa-dashboard"></i><span class="hidden-minibar"> 主目錄 </span></a></li>
              @if ($navtitle == 'uploadmeal') <li class="active"> @else <li> @endif<a href="{{ url('/import/timetable') }}" data-original-title="Top Navbar"><i class="fa fa-indent"></i><span class="hidden-minibar"> 上傳餐單 </span></a></li>

              <li>
                <a class="dropdown" href="#" data-original-title="Forms"><i class="fa fa-list-alt"></i><span class="hidden-minibar"> 資訊展示</span></a>
                <ul style="display: block;">
                  @if ($navtitle == 'timeweather') <li class="active"> @else <li> @endif<a href="{{ url('/setting/timeweather') }}" data-original-title="Dropzone"><i class="fa fa-level-down"></i><span class="hidden-minibar">  天氣及時間</span></a></li>
                  @if ($navtitle == 'newsfeed') <li class="active"> @else <li> @endif<a href="{{ url('/setting/newsfeed') }}" data-original-title="Input Masks"><i class="fa fa-pencil-square"></i><span class="hidden-minibar"> 新聞資訊</span></a></li>
                </ul>
              </li>

              @if ($navtitle == 'notice') <li class="active"> @else <li> @endif<a href="{{ url('notice') }}" data-original-title="Top Navbar"><i class="fa fa-indent"></i><span class="hidden-minibar"> 系統資訊 </span></a></li>

              <ul class="list-group theme-options">
                <li class="list-group-item" href="#">


                  <div class="form-group backgroundImage hidden">
                    <label class="control-label">Paste Image Url and then hit enter</label>
                    <input type="text" class="form-control" id="backgroundImageUrl" />
                  </div>
                </li>

                </li>
              </ul>
            </ul>
          </div>
        </div>
        <!-- /.left-sidebar -->

        <!-- .content -->
        <div class="content">
          <div class="row">
            <div class="col-mod-12">

              <ul class="breadcrumb">
                <li><a href="{{ url('/') }}">主目錄</a></li>
                @if ($navtitle != 'index')<li class="active">{{ $title }}</li>@endif
              </ul>

              <h3 class="page-header"> {{ $title }} <i class="fa fa-info-circle animated bounceInDown show-info"></i> </h3>

              <blockquote class="page-information hidden">
                <p>
                  <b>Template Page</b> is the basic page where you can add more pages according to your requirements easily within this division.
                </p>
              </blockquote>

            </div>
          </div>
        @yield('content')
        </div>
        <!-- /.content -->
        
        <!-- /rightside bar -->

      </div>
      <!-- /.box-holder -->
    </div>
    <!-- /.site-holder -->



    <!-- Load JS here for Faster site load =============================-->
    <script src="{{ url('js/jquery-1.10.2.min.js') }}"></script>
    <script src="{{ url('js/jquery-ui-1.10.3.custom.min.js') }}"></script>
    <script src="{{ url('js/less-1.5.0.min.js') }}"></script>
    <script src="{{ url('js/jquery.ui.touch-punch.min.js') }}"></script>
    <script src="{{ url('js/bootstrap.min.js') }}"></script>
    <script src="{{ url('js/bootstrap-select.js') }}"></script>
    <script src="{{ url('js/bootstrap-switch.js') }}"></script>
    <script src="{{ url('js/jquery.tagsinput.js') }}"></script>
    <script src="{{ url('js/jquery.placeholder.js') }}"></script>
    <script src="{{ url('js/bootstrap-typeahead.js') }}"></script>
    <script src="{{ url('js/application.js') }}"></script>
    <script src="{{ url('js/moment.min.js') }}"></script>
    <script src="{{ url('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('js/jquery.sortable.js') }}"></script>
    <script src="{{ url('js/jquery.gritter.js') }}"></script>
    <script src="{{ url('js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ url('js/skylo.js') }}"></script>
    <script src="{{ url('js/prettify.min.js') }}"></script>
    <script src="{{ url('js/jquery.noty.js') }}"></script>
    <script src="{{ url('js/bic_calendar.js') }}"></script>
    <script src="{{ url('js/jquery.accordion.js') }}"></script>
    <script src="{{ url('js/theme-options.js') }}"></script>
    <script src="{{ url('js/jquery.textfill.min.js') }}"</script>

    <script src="{{ url('js/bootstrap-progressbar.js') }}"></script>
    <script src="{{ url('js/bootstrap-progressbar-custom.js') }}"></script>
    <script src="{{ url('js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ url('js/bootstrap-colorpicker-custom.js') }}"></script>

    <!-- Page Scripts  =============================-->
    <script src="{{ url('js/jquery.fileupload.js') }}"></script>
    <script src="{{ url('js/jquery.iframe-transport.js') }}"></script>
    <script src="{{ url('js/file-uploads-custom.js') }}"></script>
    <script src="{{ url('js/jquery.knob.js') }}"></script>

    <!-- Core Jquery File  =============================-->
    <script src="{{ url('js/core.js') }}"></script>


  </body>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Screens | Cascade Flat , Responsive Bootstrap 3.0 Admin Template</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Loading Bootstrap -->
  <link href="css/bootstrap.css" rel="stylesheet">

  <!-- Loading Stylesheets -->    
  <link href="{{ url('css/bootstrap.css') }}" rel="stylesheet">
  <link href="{{ url('css/font-awesome.css') }}" rel="stylesheet">
  <link href="{{ url('css/login.css') }}" rel="stylesheet">
</head>
<body>
  <div class="login-box">
    <h1><i class='fa fa-bookmark'></i>&nbsp;Welcome To Cascade </h1>
    <hr>
    <h5>LOGIN</h5>

    <div class="input-box">
      <div class="row">
        <div class="col-md-8 col-md-offset-2 col-xs-10 col-xs-offset-1">
          <form  role="form" method="POST" action="{{ route('login') }}">
          {{ csrf_field() }}
            <div class="input-group form-group">
              <span class="input-group-addon"><i class='fa fa-envelope'></i></span>
              <input id="username" type="text" class="form-control" name="username" placeholder="Username" value="{{ old('text') }}" required autofocus>
            </div>
            <div class="input-group form-group">
              <span class="input-group-addon"><i class='fa fa-key'></i></span>
              <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
            <div class="form-group">
              <button type="submit" class="btn  btn-block  btn-submit pull-right">Submit</button>
            </div>
          </form>
        </div>
        <!-- col -->
      </div>
      <!-- row -->
    </div>
    <!-- input-box -->
  </div>
  <!-- lock-box -->
</body>
</html>
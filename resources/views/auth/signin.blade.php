<!DOCTYPE html>
<html lang="en">
<head>
    <meta Charset="UTF-8">
    <title>Retail Management System</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
    {{ Html::style('bootstrap/css/bootstrap.min.css') }}
    {{ Html::style('dist/css/style.css') }}

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>
<body class="login-page">
<div class="login-box">
    <div class="login-logo">
      Retail Management System
    </div> <!-- End Login-logo -->

    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        
        <div class="">

            <form class="form-vertical" role="form" method="post" action="{{ route('auth.signin') }}">
                <div class="form-group has-feedback{{ $errors->has('username') ? ' has-error' : ''}}">
                  <input type="text" name="username" class="form-control" placeholder="Username" id="username">
                  <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  @if ($errors->has('username'))
                      <span class="help-block">{{ $errors->first('username') }}</span>
                  @endif
                </div>
                <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : ''}}">
                  <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                  <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                  @if ($errors->has('password'))
                      <span class="help-block">{{ $errors->first('password') }}</span>
                  @endif
                </div>
                <div class="row">
                  <div class="col-xs-8">
                  </div>
                  <!-- /.col -->
                  <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                  </div>
                  <!-- /.col -->
                </div>
                <input type="hidden" name="_token" value="{{ Session::token() }}">


            </form>
        </div>
    </div><!-- End login-box-body -->
</div><!-- End Login-box -->
  <!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.0 -->
<!-- <script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
 -->
{{ Html::script('plugins/jQuery/jQuery-2.2.0.min.js') }}
 <!-- Bootstrap 3.3.5 -->
<!-- <script src="bootstrap/js/bootstrap.min.js"></script>
 -->
{{ Html::script('bootstrap/js/bootstrap.min.js') }}
 <!-- AdminLTE App -->
<!-- <script src="dist/js/app.min.js"></script>
 -->
 {{ Html::script('dist/js/app.min.js') }}

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta Charset="UTF-8">
	<title>Retail Management System</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
	{{ Html::style('bootstrap/css/bootstrap.css') }}
  {{ Html::style('dist/css/style.css') }}
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>
<body>
	@include('templates.partials.navigation')
	<div class="container">
		@include('templates.partials.alerts')
		@yield('content')
<!-- 		<h3>Welcome to Retail MS</h3>
welcome home, soo dhawow
	-->
	</div> 
  <!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.0 -->
<!-- <script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
 -->
{{ Html::script('plugins/jQuery/jQuery-2.2.0.min.js') }}
{{ Html::script('plugins/jQuery/jQuery-1.12.1.min.js') }}
 <!-- Bootstrap 3.3.5 -->
<!-- <script src="bootstrap/js/bootstrap.min.js"></script>
 -->
{{ Html::script('bootstrap/js/bootstrap.min.js') }}
 <!-- AdminLTE App -->
<!-- <script src="dist/js/app.min.js"></script>
 -->
 {{ Html::script('dist/js/main.js') }}

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
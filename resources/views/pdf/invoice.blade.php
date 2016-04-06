<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
  {{ Html::style('bootstrap/css/bootstrap.css') }}
  {{ Html::style('dist/css/style.css') }}
  <style type="text/css">
  #invoice-header {
    text-align: center;
    padding: 0;
   }
  #invoice-header h4 {
    padding: -6;
  }
  #details {
    //font-weight: bold;
  }
  .table {
    border-collapse: collapse;
    width: 100%;
    border: 1px solid black;

 }

 .table, th, td {
    text-align: center;
    border: 1px solid black;
 }

  </style>
  </head>
  <body>
          
{{ $data }}
          
  </body>
</html>
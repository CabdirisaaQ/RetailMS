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
    padding: 0;
  }
  #details {
    font-weight: bold;
  } 
 @media print {
  .table {
    border-collapse: collapse;
    width: 100%;
    border: 1px solid black;

 }

 .table, th, td {
    text-align: center;
    border: 1px solid black;
 }
}
 .table, th, td {
    text-align: center;
    border: 1px solid black;
     border-collapse: collapse;
     width: 100%;
 }
 td {
    height: 10px;
}
  </style>
  </head>
  <body>
          <div id="invoice-header">
            <h4 > <strong>Sales Report </strong></h4>

          </div>

    <br>     

        <table class="table" style="">
            <tr>

              <th>Date</th>
              <th>Z-Report No.</th>
              <th>Items</th>
              <th>Total</th>
              <th>Casheir</th>
              <th>Manager</th>
            </tr>

          @foreach ($data as $line)
              <tr> 
                  <td>{{ $line['updated_at'] }}</td> 
                  <td>{{ $line['zReport'] }}</td> 
                  <td>{{ $line['item'] }}</td> 
                  <td>${{ $line['total'] }}</td> 
                  <td>{{ $line['created_by'] }}</td>
                  <td>{{ $line['updated_by'] }}</td>
              </tr> 
          @endforeach
        @if($total == NULL)
          <tr> 
            <td></td> 
            <td></td> 
            <td>{{ $total['itemCount'] }}</td> 
            <td><strong>{{ $total['totalCount'] }}</strong></td> 
            <td></td>
            <td></td>
          </tr>
        @else
          <tr> 
            <td></td> 
            <td></td> 
            <td>{{ $total['itemCount'] }}</td> 
            <td><strong>{{ $total['totalCount'] }}</strong></td> 
                        <td></td>
            <td></td>
          </tr>
        @endif
      </table>
  </body>
</html>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
  {{ Html::style('../bootstrap/css/bootstrap.css') }}
  {{ Html::style('../dist/css/style.css') }}
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
  </style>
  </head>
  <body>
          <div id="invoice-header">
            <h4 > <strong>Guul Alle Fuel Station & Supermarket </strong></h4>
            <h4 > Hargeisa, Somaliland </h4>
            <h4 > Tel: 51548/4786525 </h4>
            <h4 > Zaad: 415786 , edahab: 987451</h4>
          </div>
          <br>
        <div id="details" class="clearfix">
            <div>Receipt No. : {{ $data[0]['receiptNo'] }}</div>
            <div>Date/Time    : {{ $date }}</div>
            <div>Description  : Transactions for {{ $date }}</div>
            <div>cashier   : {{ $data[0]['created_by'] }}</div>
        </div>
    <br>     

        <table class="table" style="">
            <tr>
              <th></th>
              <th>item</th>
              <th>UOM</th>
              <th>price</th>
              <th>qty</th>
              <th>total</th>
            </tr>

          @foreach ($data as $line)
              <tr> 
                  <td>{{ $line->productId }}</td> 
                  <td>{{ $line->uom }}</td> 
                  <td>${{ $line->unitPrice }}</td> 
                  <td>{{ $line->qty }}</td> 
                  <td>${{ $line->total }}</td>
              </tr> 
          @endforeach
        @if($total == NULL)
          <tr> 
            <td></td> 
            <td></td> 
            <td></td> 
            <td><strong>Total sales</strong></td> 
            <td><strong>$0</strong></td>
          </tr>
        @else
          <tr> 
            <td></td> 
            <td></td> 
            <td></td> 
            <td><strong>Total sales</strong></td> 
            <td><strong>$ {{ $total }}</strong></td> 
          </tr>
        @endif
      </table>
  </body>
</html>
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
    padding: -3;
  }
  #details {
    /*font-weight: bold;*/
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
        </div>
        <br>
      <div id="details" class="clearfix">
          <div>Z-report No. : {{ $data['zReport'] }}</div>
          <div>Date/Time    : {{ $date }}</div>
          <div>Description  : Transactions for {{ $date }}</div>
          <div>cashier   : {{ $data['created_by'] }}</div>
          <div>Manager    : {{ $data['updated_by'] }}</div>
      </div>
 

<br>
      <table class="table">
   
          <tr>
            <th></th>
            <th>Receipts</th>
            <th>Transactions</th>
            <th>Total Sales</th>
          </tr>

          <tr>
            <td class="no">{{ $data['receiptCount'] }}</td>
            <td class="desc">{{ $data['transactionCount'] }}</td>
            <td class="total">${{ $data['total'] }} </td>
          </tr>
      </table>
        <div id="details" class="clearfix">
        <br>
        <br>
            <div>Manager    : {{ $data['updated_by'] }}   ________________________</div> 
            <br>
            <div>cashier   : {{ $data['created_by'] }}   ________________________</div>
            <br>
        </div>
        
        <br><br>
        ----------------------------------------------------------------------------------------------------------------------------------------------
       <br>
        <br>
              <div id="invoice-header">
                <h4 > <strong>Guul Alle Fuel Station & Supermarket </strong></h4>
                <h4 > Hargeisa, Somaliland </h4>
                <h4 > Tel: 51548/4786525 </h4>
              </div>
              <br>
                  <div id="details" class="clearfix">
          <div>Z-report No. : {{ $data['zReport'] }}</div>
          <div>Date/Time    : {{ $date }}</div>
          <div>Description  : Transactions for {{ $date }}</div>
          <div>cashier   : {{ $data['created_by'] }}</div>
          <div>Manager    : {{ $data['updated_by'] }}</div>
      </div>
  
<br>

      <table class="table">
   
          <tr>
            <th></th>
            <th>Receipts</th>
            <th>Transactions</th>
            <th>Total Sales</th>
          </tr>

          <tr>
            <td class="no">{{ $data['receiptCount'] }}</td>
            <td class="desc">{{ $data['transactionCount'] }}</td>
            <td class="total">${{ $data['total'] }} </td>
          </tr>
      </table>
        <div id="details" class="clearfix">
        <br>
            <div>Manager    : {{ $data['updated_by'] }}   ________________________</div> 
            <br>
            <div>cashier   : {{ $data['created_by'] }}   ________________________</div>
            <br>
        </div>
  </body>
</html>
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
  </style>
  </head>
  <body>
          <div id="invoice-header">
            <h4 > <strong>Guul Alle Fuel Station & Supermarket </strong></h4>
            <h4 > Hargeisa, Somaliland </h4>
            <h4 > Tel: 51548/4786525 </h4>
            <h4 > Zaad: 415786 , edahab: 987451</h4>
          </div>
          <h3>Purchase Order</h3>

          <br>
                <table class="table table-condensed" style="boarder:0;">
                      <tr> 
                            <td></td>  
                            <th>Item</th> 
                            <th>Qty</th>
                            <th>Unit Price</th> 
                            <th>Total</th>
                            <th>Cash</th> 
                            <th>Credit</th> 
                        </tr> 

                    </table> 
  </body>
</html>
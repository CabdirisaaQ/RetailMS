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
            <h4 > Mobile: 4054623 </h4>
            <h4 > Zaad: 404384  E-dahab: 27403 </h4>
          </div>
          <h3>Purchase Order</h3>

                <h4>Purchase Order Number : {{ $data[1][0]['purchasesNo'] }}</h4>
                <h4>Vendor Name : {{$data[0]}}</h4>
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
                       @foreach ($data[1] as $product)
                        <tr> 
                                <td>{{ $product->getProductName($product->productId) }}</td> 
                                <td>{{ $product->unitsInOrder }}</td> 
                                <td>{{ $product->unitPrice }}</td> 
                                <td>{{ $product->total }}</td> 
                                <td>{{ $product->cash }}</td> 
                                <td>{{ $product->credit }}</td> 
 
                        </tr> 
                      @endforeach
                        <tr> 
                            <td></td> 
                            <td></td>
                            <td></td> 
                            <td></td> 
                            <td><strong>Total</strong></td> 
                            <td><strong>{{$data[2]}}</strong></td> 
                        </tr>
                        <tr> 
                            <td></td> 
                            <td></td>
                            <td></td>
                            <td></td> 
                            <td><strong>Cash</strong></td> 
                            <td><strong>{{$data[3]}}</strong></td> 
                        </tr>
                        <tr> 
                            <td></td> 
                            <td></td> 
                            <td></td>
                            <td></td> 
                            <td><strong>Credit</strong></td> 
                            <td><strong>{{$data[4]}}</strong></td> 
                        </tr>
                    </table> 
  </body>
</html>
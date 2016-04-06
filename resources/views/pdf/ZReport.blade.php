<!DOCTYPE html>
<html lang="en">
  <head>
    {{ Html::style('bootstrap/css/bootstrap.css') }}
    {{ Html::style('dist/css/style.css') }}
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Zreport</title>
  </head>
  <body>
 
    <main>
      <div id="details" class="row">
        <div id="invoice">
          <h1>Zreport {{ $invoice }}</h1>
          <div class="date">Date of Invoice: {{ $date }}</div>
        </div>
      </div>
      <div class="col-lg-8">
        
      <table class="table table-hover table-bordered table-condensed">
        <thead>
          <tr>
            <th class="no">#</th>
            <th class="desc">DESCRIPTION</th>
            <th class="unit">UNIT PRICE</th>
            <th class="total">TOTAL</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $row)
          <tr>
            <td class="no">{{ $row['receiptNo'] }}</td>
            <td class="desc">{{ $row['productId'] }}</td>
            <td class="unit">{{ $row['unitPrice'] }}</td>
            <td class="total">{{ $row['total'] }} </td>
          </tr>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <td colspan="2"></td>
            <td >TOTAL</td>
            <td>$6,500.00</td>
          </tr>
        </tfoot>
      </table>
      <button class="btn-primary"> good</button>
      </div>
  </body>
</html>
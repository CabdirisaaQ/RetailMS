<!-- Modal -->
<div id="selectItem" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Select Item</h4>
      </div>
      <div class="modal-body">
        @if (!$products->count())
          <p>You have no stock.</p>
        @else
            
            <table class="table table-hover table-bordered table-condensed" style="font-size:12px;">
                <thead> 
                    <tr style="background: #3c8dbc;color: white;"> 
                        <th>Barcode</th> 
                        <th>Description</th>
                        <th>Stock Amount</th>
                         
                    </tr> 
                </thead> 
                <tbody>
                  @foreach ($products as $product)
                    <tr> 
                       <td class=""><a href="{{ route('/sales/addToCurt', $product->descripiton) }}">{{ $product->barcode }}</a></td> 
                       <td class=""><a href="{{ route('/sales/addToCurt', $product->descripiton) }}">{{ $product->descripiton }}</a></td> 
                       <td class="stock-qty"><a href="{{ route('/sales/addToCurt', $product->descripiton) }}">{{ $product->itemInStock }}</a></td> 
                    </tr> 
                  @endforeach
                </tbody>
            </table> 
        @endif 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
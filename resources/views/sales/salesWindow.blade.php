	<div class="form-group col-lg-8">
	    <input type="text" name="searchItem" class="form-control" id="searchItem" value="" placeholder="Search Item by barcode" autofocus>
	    <span id="searchItemResponse"></span>                
	</div>
	<div class="col-lg-8 sales-window" style="margin:0;padding:0;">
		@if (count($dump) == 0)
		  	<table class="table table-hover table-bordered table-condensed " style="font-size:12px;margin:0;padding:0;">
		          <thead> 
		              <tr style="background: #3c8dbc;color: white;"> 
		                  <th>Item No.</th> 
		                  <th>item description</th>
		                  <th>UOM</th> 
		                  <th>unit price</th> 
		                  <th>qty</th> 
		                  <th>amount</th> 
		              </tr> 
		          </thead> 
		          <tbody>
		              <tr>  
		                      <td></br></td>
							  <td></br></td> 
		                      <td></br></td> 
		                      <td></br></td>
		                      <td></br></td>
		                      <td></br></td>
		              </tr>
		              <tr>  
		                      <td></br></td>
							  <td></br></td> 
		                      <td></br></td> 
		                      <td></br></td>
		                      <td></br></td>
		                      <td></br></td>
		              </tr>
		              <tr>  
		                      <td></br></td>
							  <td></br></td> 
		                      <td></br></td> 
		                      <td></br></td>
		                      <td></br></td>
		                      <td></br></td>
		              </tr>
		              <tr>  
		                      <td></br></td>
							  <td></br></td> 
		                      <td></br></td> 
		                      <td></br></td>
		                      <td></br></td>
		                      <td></br></td>
		              </tr>
		              <tr>  
		                      <td></br></td>
							  <td></br></td> 
		                      <td></br></td> 
		                      <td></br></td>
		                      <td></br></td>
		                      <td></br></td>
		              </tr>
		              <tr>  
		                      <td></br></td>
							  <td></br></td> 
		                      <td></br></td> 
		                      <td></br></td>
		                      <td></br></td>
		                      <td></br></td>
		              </tr>
		              <tr>  
		                      <td></br></td>
							  <td></br></td> 
		                      <td></br></td> 
		                      <td></br></td>
		                      <td></br></td>
		                      <td></br></td>
		              </tr>
		              <tr>  
		                      <td></br></td>
							  <td></br></td> 
		                      <td></br></td> 
		                      <td></br></td>
		                      <td></br></td>
		                      <td></br></td>
		              </tr>

		          </tbody>
		    </table>
		@else
		    <table class="table table-hover table-bordered table-condensed" style="font-size:12px;margin:0;padding:0;">
		        <thead> 
		            <tr style="background: #3c8dbc;color: white;"> 
		                <th>Item No.</th>
		                <th>Description</th>
		                <th>UOM</th>
		                <th>Unit price</th> 
		                <th>QTY</th>
		                <th>Amount</th> 
		            </tr> 
		        </thead> 
		        <tbody>
		          @foreach ($dump as $product)
		            <tr class="item" data="{{ $product->id }}"> 
		               <td>{{ $product->barcode }}</td> 
		               <td>{{ $product->item }}</td> 
		               <td>{{ $product->uom }}</td> 
		               <td>$ {{ $product->unitPrice }}</a></td> 
		               <td>{{ $product->qty }}</a></td> 
		               <td>$ {{ $product->total }}</a></td> 
		            </tr> 
		          @endforeach
		        </tbody>
		    </table> 
		@endif
	</div>
	<div class="col-lg-4">
		<a href="{{ route('auth.signout')}}" class="btn btn-primary btn-block btn-lg">Logg Off</a></br>
		<button type="submit" class="btn btn-primary btn-block btn-lg" data-toggle="modal" data-target="#selectItem">Select Item</button></br>
		<button id="bill" type="submit" class="btn btn-primary btn-block btn-lg">Generate Bill</button></br>
        <button type="button" class="btn btn-primary btn-block btn-lg" id="item-return-btn" value="return">Return item</button></BR>
		@if (Auth::user()->isAdmin())
		<button id="GetZReport" type="submit" class="btn btn-primary btn-block btn-lg" data-toggle="modal" data-target="#GetZReport-modal">Z-Report</button></br>
		@else
		<button type="submit" class="btn btn-primary btn-block btn-lg" disabled>Z-Report</button></br>
		@endif
	</div>

		

 				 
@extends('templates.default')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <a href="{{route('admin.index')}}">Go Back</a> 
    </br>
            <h3>Your Stock List</h3>
            @if (!$products->count())
            	<p>You have no stock.</p>
            @else
                
                <table class="table table-hover table-bordered table-condensed" style="font-size:12px;">
                    <thead> 
                        <tr> 
                            <th>Barcode</th> 
                            <th>Description</th>
                            <th>item In Stock(PCS)</th> 
                            <th>Qty Per Unit(PCS)</th>
                            <th>Unit Price (per CRT)</th> 
                            <th>Unit Self Price</th> 
                            <th>Item Price</th>
                            <th>Item Shelf Price</th>
                            <th>created by</th>
                            <th>created at</th>
                            <th>updated by</th>
                            <th>updated at</th> 
                        </tr> 
                    </thead> 
                    <tbody>
                    	@foreach ($products as $product)
                        <tr> 
                                <th>{{ $product->barcode }}</th> 
                                <td>{{ $product->descripiton }}</td> 
                                <td>{{ $product->itemInStock($product->itemInStock,$product->unitsInOrder) }}</td> 
                                <td>{{ $product->quantityPerUnit }}</td> 
                                <td>${{ $product->unitPrice }}</td> 
                                <td>${{ $product->unitShelfPrice }}</td> 
                                <td>${{ $product->itemPrice }}</td> 
                                <td>${{ $product->itemShelfPrice }}</td> 
                                <td>{{ $product->created_by }}</td>
                                <td>{{ $product->created_at }}</td>
                                <td>{{ $product->updated_by }}</td>
                                <td>{{ $product->updated_at }}</td>
                                <td><a href="{{ route('admin.product.editProduct',$product->id) }}" class="btn btn-xs btn-primary">Adjust</a</td> 
                        </tr> 
                    	@endforeach
                    </tbody>
                </table> 
            @endif
    </div>
    
</div>
@stop
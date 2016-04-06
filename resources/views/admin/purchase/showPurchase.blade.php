
@extends('templates.default')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <a href="{{route('admin.purchase.index')}}">Go Back</a> 
    </br>
            <h3>Posted Purchase Order</h3>
            @if (!$previewList->count())
            	<p>Something wrong happend please call 0634050885</p>
            @else
                <h6>Purchase Order Number : {{ $previewList[0]['purchasesNo'] }}</h6>
                <h6>Vendor Name : {{$vendor}}</h6>
                <h6>Prepared By : {{$previewList[0]['created_by']}}</h6>
                <h6>Date & Time : {{$previewList[0]['created_at']}}</h6>
                <table class="table table-hover table-bordered table-condensed" style="font-size:12px;">
                    <thead> 
                        <tr> 
                            <th>Item</th> 
                            <th>Unit Price</th> 
                            <th>Qty</th>
                            <th>Total</th>
                            <th>Cash</th> 
                            <th>Credit</th> 
                            <th></th> 
                        </tr> 
                    </thead> 
                    <tbody>
                    	@foreach ($previewList as $product)
                        <tr> 
                                <th>{{ $product->getProductName($product->productId) }}</th> 
                                <td>${{ $product->unitPrice }}</td> 
                                <td>{{ $product->unitsInOrder }}</td> 
                                <td>${{ $product->total }}</td> 
                                <td>${{ $product->cash }}</td> 
                                <td>-${{ $product->credit }}</td> 
                        </tr> 
                    	@endforeach
                        <tr> 
                            <th></th> 
                            <th></th>
                            <th></th> 
                            <th></th>
                            <th><h5>Total</h5></th> 
                            <th><h5>${{$total}}</h5></th> 
                            <th></th> 
                        </tr>
                        <tr> 
                            <th></th> 
                            <th></th>
                            <th></th> 
                            <th></th>
                            <th><h5>Cash</h5></th> 
                            <th><h5>${{$cash}}</h5></th> 
                            <th></th> 
                        </tr>
                        <tr> 
                            <th></th> 
                            <th></th>
                            <th></th> 
                            <th></th>
                            <th><h5>Credit</h5></th> 
                            <th><h5>-${{$credit}}</h5></th> 
                            <th></th> 
                        </tr>
                    </tbody>
                </table> 
            @endif

            <form class="form-vertical" role="form" method="post" action="{{ route('admin.purchase.postPurchase') }}">  
                <div class="">
                    <button type="submit" class="btn btn-primary">Print Copy</button>
                </div>
                <input type="hidden" name="purchasesNo" value="{{ $previewList[0]['purchasesNo'] }}">
                <input type="hidden" name="_token" value="{{ Session::token() }}">
                
            </form>
    </div>
    
</div>
@stop
@extends('templates.default')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <a href="{{route('admin.index')}}">Go Back</a> 
    </br>
            <h3>Purchase Order</h3>
            @if (!$previewList->count())
            	<p>Something wrong happend please call 0634050885</p>
            @else
                <h4>Purchase Order Number : {{ $previewList[0]['purchasesNo'] }}</h4>
                <h4>Vendor Name : {{$vendor}}</h4>
                <table class="table table-hover table-bordered table-condensed" style="font-size:12px;">
                    <thead> 
                        <tr> 
                            <th>Item</th> 
                            <th>Qty</th>
                            <th>Unit Price</th> 
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
                                <td>{{ $product->unitsInOrder }}</td> 
                                <td>${{ $product->unitPrice }}</td> 
                                <td>${{ $product->total }}</td> 
                                <td>${{ $product->cash }}</td> 
                                <td>-${{ $product->credit }}</td> 
                                <td>
                                    {!! Form::open([
                                                'method' => 'DELETE',
                                                'route' => ['admin.purchase.deletePurchaseDetaile', $product->transactionId]
                                            ]) !!}
                                                {!! Form::submit('Delete Line', ['class' => 'btn btn-xs btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td> 
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
                    <button type="submit" class="btn btn-primary">Post & Print</button>
                </div>
                <input type="hidden" name="purchasesNo" value="{{ $previewList[0]['purchasesNo'] }}">
                <input type="hidden" name="_token" value="{{ Session::token() }}">
                
            </form>
    </div>
    
</div>
@stop
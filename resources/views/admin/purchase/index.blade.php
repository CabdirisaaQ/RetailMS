@extends('templates.default')

@section('content')
<div class="row">
    <div class="col-lg-18">
        <a href="{{route('admin.index')}}">Go Back</a> 
    </br>
            <h3>Purchase Order List</h3>
            <ul>
                <li><a href="{{route('admin.purchase.purchase')}}">Create New Purchase</a></li>
            </ul>

            <div class="row">
            <div class="col-lg-8">
                
            </div>
            </div>

            <form class="form-horizontal" role="form" method="post" action="{{ route('admin.purchase.purchaseQuery') }}">  

                <div class="form-group{{ $errors->has('from') ? ' has-error' : '' }} col-lg-3">
                    <label for="start" class="control-label">From :</label>
                    <input type="date" name="from" value="{{ Request::old('from') ?: '' }}">
                    @if ($errors->has('from'))
                        <span class="help-block">{{ $errors->first('from') }}</span>
                    @endif 
                </div>
                <div class="form-group{{ $errors->has('to') ? ' has-error' : '' }} col-lg-3">
                    <label for="start" class="control-label">To :</label>
                    <input type="date" name="to" value="{{ Request::old('to') ?: '' }}">
                    @if ($errors->has('to'))
                        <span class="help-block">{{ $errors->first('to') }}</span>
                    @endif 
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>

            @if (count($List) < 1)
            	<p>You have no purchase order.</p>
            @else
                
                <table class="table table-hover table-bordered table-condensed" style="font-size:12px;">
                    <thead> 
                        <tr> 
                            <th>Order Number</th> 
                            <th>Vendor</th>
                            <th>Total</th> 
                            <th>Cash($)</th> 
                            <th>Credit($)</th> 
                            <th>Status</th> 
                            <th>Date Created</th> 
                            <th>User Created</th> 
                            <th>Date Cleared</th> 
                            <th>User Cleared</th> 
                        </tr> 
                    </thead> 
                    <tbody>
                    	@foreach ($List as $po)
                        <tr> 
                            <th scope="row"><a href="{{ route('admin.purchase.showPurchase', $po['purchasesNo']) }}">{{ $po['purchasesNo']}}</a></th> 
                                <td>{{ $po['vendor'] }}</td> 
                                <td>{{ $po['total'] }}</td> 
                                <td>{{ $po['cash'] }}</td> 
                                <td>{{ $po['credit'] }}</td> 
                                <td>{{ $po['status'] }}</td> 
                                <td>{{ $po['created_at'] }}</td> 
                                <td>{{ $po['created_by'] }}</td> 
                                <td>{{ $po['updated_at'] }}</td> 
                                <td>{{ $po['updated_by'] }}</td> 
                                @if ($po['status'] == 'open')
                                <td><a href="{{ route('admin.purchase.clearPurchase', $po['purchasesNo']) }}" class="btn btn-xs btn-primary">Clear Order</a></td> 
                                @endif
                        </tr> 
                    	@endforeach
                    </tbody>
                </table> 
            @endif
    </div>
    
</br></br></br></br>

</div>
@stop
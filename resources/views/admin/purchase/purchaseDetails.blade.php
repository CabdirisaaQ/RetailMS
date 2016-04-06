@extends('templates.default')

@section('content')
<a href="{{route('admin.index')}}">Go Back</a>
    <h3>Purchase Order NO: {{ $purchasesNo }}</h3>
    <div class="row">
    <form id="newPurchaseOrder"class="form-horizontal" role="form" method="post" action="{{ route('admin.purchase.purchaseDetails') }}">
    	<input type="hidden" name="purchasesNo" value="{{ $purchasesNo}}">
    	<input type="hidden" name="vendorId" value="{{ $vendorId}}">
        <div class="col-lg-6">
            <div class="form-group">
			<label for="productId" class="control-label col-lg-4">Product Description</label>
            <div class="col-lg-8">
            <select id="purchasedItem" name="productId" class="form-control">
            @foreach ($products as $productId => $descripiton)
                <option value="{{$productId}}">{{$descripiton}}</option>
            @endforeach
            </select>
            </div>
        	</div>
            <div class="form-group{{ $errors->has('unitPrice') ? ' has-error' : '' }}">
                <label for="unitPrice" class="control-label col-lg-4">Unit Price</label>
                <div class="col-lg-8">
                <input id="unitPrice-txt" type="text" name="unitPrice" class="form-control" id="unitPrice" value="">
                @if ($errors->has('unitPrice'))
                    <span class="help-block">{{ $errors->first('unitPrice') }}</span>
                @endif                
                </div>
            </div>
            <div class="form-group{{ $errors->has('unitShelfPrice') ? ' has-error' : '' }}">
                <label for="unitShelfPrice" class="control-label col-lg-4">Unit Shelf Price</label>
                <div class="col-lg-8">
                <input id="unitShelfPrice-txt" type="text" name="unitShelfPrice" class="form-control" id="unitShelfPrice" value="">
                @if ($errors->has('unitShelfPrice'))
                    <span class="help-block">{{ $errors->first('unitShelfPrice') }}</span>
                @endif                
                </div>
            </div>
            <div class="form-group{{ $errors->has('itemPrice') ? ' has-error' : '' }}">
                <label for="itemPrice" class="control-label col-lg-4">Item Price</label>
                <div class="col-lg-8">
                <input id="itemPrice-txt" type="text" name="itemPrice" class="form-control" id="itemPrice" value="">
                @if ($errors->has('itemPrice'))
                    <span class="help-block">{{ $errors->first('itemPrice') }}</span>
                @endif                
                </div>
            </div>
            <div class="form-group{{ $errors->has('itemShelfPrice') ? ' has-error' : '' }}">
                <label for="itemShelfPrice" class="control-label col-lg-4">Item Shelf Price</label>
                <div class="col-lg-8">
                <input id="itemShelfPrice-txt" type="text" name="itemShelfPrice" class="form-control" id="itemShelfPrice" value="">
                @if ($errors->has('itemShelfPrice'))
                    <span class="help-block">{{ $errors->first('itemShelfPrice') }}</span>
                @endif                
                </div>
            </div>
              
        </div>
    <div class="col-lg-6">
            <div class="form-group{{ $errors->has('unitsInOrder') ? ' has-error' : '' }}">
                <label for="unitsInOrder" class="control-label col-lg-4">Units in order (CRT)</label>
                <div class="col-lg-8">
                <input id="unitsInOrder-txt" type="text" name="unitsInOrder" class="form-control" id="unitsInOrder" value="">
                @if ($errors->has('unitsInOrder'))
                    <span class="help-block">{{ $errors->first('unitsInOrder') }}</span>
                @endif                
                </div>
            </div>
            <div class="form-group{{ $errors->has('total') ? ' has-error' : '' }}">
                <label for="total" class="control-label col-lg-4">Total</label>
                <div class="col-lg-8">
                <input id="total-txt" type="text" name="total" class="form-control" id="total" value="">
                @if ($errors->has('total'))
                    <span class="help-block">{{ $errors->first('total') }}</span>
                @endif                
                </div>
            </div>
            <div class="form-group{{ $errors->has('cash') ? ' has-error' : '' }}">
                <label for="cash" class="control-label col-lg-4">Cash</label>
                <div class="col-lg-8">
                <input id="cash-txt" type="text" name="cash" class="form-control" id="cash" value="">
                @if ($errors->has('cash'))
                    <span class="help-block">{{ $errors->first('cash') }}</span>
                @endif                
                </div>
            </div>
            <div class="form-group{{ $errors->has('credit') ? ' has-error' : '' }}">
                <label for="credit" class="control-label col-lg-4">Credit</label>
                <div class="col-lg-8">
                <input id="credit-txt" type="text" name="credit" class="form-control" id="credit" value="">
                @if ($errors->has('credit'))
                    <span class="help-block">{{ $errors->first('credit') }}</span>
                @endif                
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary next">Next Item</button>
            </div>
            <input type="hidden" name="_token" value="{{ Session::token() }}">
        
    </form>
        <form class="" role="form" method="post" action="{{ route('admin.purchase.previewPurchase') }}">  
            <input type="hidden" name="purchasesNo" value="{{ $purchasesNo }}">
                <button type="submit" class="btn btn-primary previewbtn">Show Purchase Report</button>
            <input type="hidden" name="_token" value="{{ Session::token() }}">
        </form>
    </div>
    </div>
@stop

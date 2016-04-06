
@extends('templates.default')

@section('content')
<a href="{{route('admin.index')}}">Go Back</a>
    <h3>Create New Product</h3>
    <div class="row">
    <div class="col-lg-6">

        <form class="form-vertical" role="form" method="post" action="{{ route('admin.product.createProduct') }}">
            <div class="form-group{{ $errors->has('descripiton') ? ' has-error' : '' }}">
                <label for="descripiton" class="control-label">Description</label>
                <input type="text" name="descripiton" class="form-control" id="descripiton" value="{{ Request::old('descripiton') ?: '' }}">
                @if ($errors->has('descripiton'))
                    <span class="help-block">{{ $errors->first('descripiton') }}</span>
                @endif                
            </div>
            <div class="form-group{{ $errors->has('barcode') ? ' has-error' : '' }}">
                <label for="barcode" class="control-label">Barcode</label>
                <input id="createItemBarcode-txt" type="text" name="barcode" class="form-control" barcode="barcode" size="40" value="{{ Request::old('barcode') ?: '' }}">
                @if ($errors->has('barcode'))
                    <span class="help-block">{{ $errors->first('barcode') }}</span>
                @endif     
            </div>
            <button id="barcodeGen" class="btn btn-primary btn-sm">Generate Barcode</button>           
            <div class="form-group{{ $errors->has('quantityPerUnit') ? ' has-error' : '' }}">
                <label for="quantityPerUnit" class="control-label">Quantity per unit</label>
                <input type="text" id="createItemquantityPerUnit-txt" name="quantityPerUnit" class="form-control" id="quantityPerUnit" value="{{ Request::old('quantityPerUnit') ?: '' }}">
                @if ($errors->has('quantityPerUnit'))
                    <span class="help-block">{{ $errors->first('quantityPerUnit') }}</span>
                @endif                
            </div>
            <div class="form-group{{ $errors->has('unitPrice') ? ' has-error' : '' }}">
                <label for="unitPrice" class="control-label">Unit Price</label>
                <input id="createItemunitPrice-txt" type="text" name="unitPrice" class="form-control" id="unitPrice" value="{{ Request::old('unitPrice') ?: ''}}">
                @if ($errors->has('unitPrice'))
                    <span class="help-block">{{ $errors->first('unitPrice') }}</span>
                @endif                
            </div>
            <div class="form-group{{ $errors->has('unitShelfPrice') ? ' has-error' : '' }}">
                <label for="unitShelfPrice" class="control-label">Unit Shelf Price</label>
                <input id="createItemunitShelfPrice-txt" type="text" name="unitShelfPrice" class="form-control" id="unitShelfPrice" value="{{ Request::old('unitShelfPrice') ?: ''}}">
                @if ($errors->has('unitShelfPrice'))
                    <span class="help-block">{{ $errors->first('unitShelfPrice') }}</span>
                @endif                
            </div>
            <div class="form-group{{ $errors->has('itemPrice') ? ' has-error' : '' }}">
                <label for="itemPrice" class="control-label">Item Price</label>
                <input id="createItemitemPrice-txt" type="text" name="itemPrice" class="form-control" id="itemPrice" value="{{ Request::old('itemPrice') ?: '' }}">
                @if ($errors->has('itemPrice'))
                    <span class="help-block">{{ $errors->first('itemPrice') }}</span>
                @endif                
            </div>
            <div class="form-group{{ $errors->has('itemShelfPrice') ? ' has-error' : '' }}">
                <label for="itemShelfPrice" class="control-label">Item Shelf Price</label>
                <input id="createItemitemShelfPrice-txt" type="text" name="itemShelfPrice" class="form-control" id="itemShelfPrice" value="{{ Request::old('itemShelfPrice') ?: '' }}">
                @if ($errors->has('itemShelfPrice'))
                    <span class="help-block">{{ $errors->first('itemShelfPrice') }}</span>
                @endif                
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save Product</button>
            </div>
            <input type="hidden" name="_token" value="{{ Session::token() }}">
        </form>
    </div>
</div>
@stop

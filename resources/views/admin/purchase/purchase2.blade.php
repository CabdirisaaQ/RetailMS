
@extends('templates.default')

@section('content')
<a href="{{route('admin.index')}}">Go Back</a>
    <h3>Purchase an existing item</h3>
    <div class="row">
    <div class="col-lg-6">

        <form class="form-vertical" role="form" method="post" action="{{ route('admin.product.purchase2') }}">
            <div class="form-group{{ $errors->has('id') ? ' has-error' : '' }}">
                <label for="id" class="control-label">Barcode</label>
                <input type="text" name="id" class="form-control" id="id" value="{{ $product->id }}">
                @if ($errors->has('id'))
                    <span class="help-block">{{ $errors->first('id') }}</span>
                @endif                
            </div>
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="control-label">Item name</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ $product->name }}">
                @if ($errors->has('name'))
                    <span class="help-block">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="products" class="control-label">Vendor</label>
                <select name="vendors" class="form-control">
                @foreach ($vendors as $id => $company)
                    <option value="{{$id}}">{{$company}}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group{{ $errors->has('unitsInOrder') ? ' has-error' : '' }}">
                <label for="unitsInOrder" class="control-label">Units in order</label>
                <input type="text" name="unitsInOrder" class="form-control" id="unitsInOrder" value="">
                @if ($errors->has('unitsInOrder'))
                    <span class="help-block">{{ $errors->first('unitsInOrder') }}</span>
                @endif                
            </div>
            <div class="form-group{{ $errors->has('quantityPerUnit') ? ' has-error' : '' }}">
                <label for="quantityPerUnit" class="control-label">Quantity per unit</label>
                <input type="text" name="quantityPerUnit" class="form-control" id="quantityPerUnit" value="{{ $product->quantityPerUnit }}">
                @if ($errors->has('quantityPerUnit'))
                    <span class="help-block">{{ $errors->first('quantityPerUnit') }}</span>
                @endif                
            </div>
            <div class="form-group{{ $errors->has('unitPrice') ? ' has-error' : '' }}">
                <label for="unitPrice" class="control-label">Unit Price</label>
                <input type="text" name="unitPrice" class="form-control" id="unitPrice" value="{{ $product->unitPrice}}">
                @if ($errors->has('unitPrice'))
                    <span class="help-block">{{ $errors->first('unitPrice') }}</span>
                @endif                
            </div>
            <div class="form-group{{ $errors->has('itemPrice') ? ' has-error' : '' }}">
                <label for="itemPrice" class="control-label">Item Price</label>
                <input type="text" name="itemPrice" class="form-control" id="itemPrice" value="{{ $product->itemPrice }}">
                @if ($errors->has('itemPrice'))
                    <span class="help-block">{{ $errors->first('itemPrice') }}</span>
                @endif                
            </div>
            <div class="form-group{{ $errors->has('shelfPrice') ? ' has-error' : '' }}">
                <label for="shelfPrice" class="control-label">Shelf Price</label>
                <input type="text" name="shelfPrice" class="form-control" id="shelfPrice" value="{{ $product->shelfPrice }}">
                @if ($errors->has('shelfPrice'))
                    <span class="help-block">{{ $errors->first('shelfPrice') }}</span>
                @endif                
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-default">Save</button>
            </div>
            <input type="hidden" name="_token" value="{{ Session::token() }}">
        </form>
    </div>
</div>
@stop

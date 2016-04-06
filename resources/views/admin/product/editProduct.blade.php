@extends('templates.default')

@section('content')
<a href="{{route('admin.index')}}">Go Back</a>
    <h3>Product Adjustment</h3>
    <div class="row">
    <div class="col-lg-6">
        <form class="form-vertical" role="form" method="post" action="{{ route('admin.product.editProduct',$product->id) }}">
            <div class="form-group">
                <label for="id" class="control-label">Description</label>
                <input type="text" name="id" class="form-control" id="id" value="{{ $product->descripiton }}" disabled>               
            </div>
            <div class="form-group{{ $errors->has('unitsInStock') ? ' has-error' : '' }}">
                <label for="itemInStock" class="control-label">Item In Stock</label>
                <input type="text" name="itemInStock" class="form-control" id="itemInStock" value="{{ $product->itemInStock }}">
                @if ($errors->has('itemInStock'))
                    <span class="help-block">{{ $errors->first('itemInStock') }}</span>
                @endif                
            </div>
            <div class="form-group">
                <label for="unitPrice" class="control-label">Unit Price</label>
                <input type="text" name="unitPrice" class="form-control" id="unitPrice" value="{{ $product->unitPrice }}" disabled>
            </div>
            <div class="form-group">
                <label for="quantityPerUnit" class="control-label">Quantity Per Unit</label>
                <input type="text" name="quantityPerUnit" class="form-control" id="quantityPerUnit" value="{{ $product->quantityPerUnit }}" disabled>
            </div>
            <div class="form-group{{ $errors->has('unitShelfPrice') ? ' has-error' : '' }}">
                <label for="unitShelfPrice" class="control-label">Unit Shelf Price</label>
                <input type="text" name="unitShelfPrice" class="form-control" id="unitShelfPrice" value="{{ $product->unitShelfPrice }}">
                @if ($errors->has('unitShelfPrice'))
                    <span class="help-block">{{ $errors->first('unitShelfPrice') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="itemPrice" class="control-label">Item Price</label>
                <input type="text" name="itemPrice" class="form-control" id="itemPrice" value="{{ $product->itemPrice }}" disabled>
            </div>
            <div class="form-group{{ $errors->has('itemShelfPrice') ? ' has-error' : '' }}">
                <label for="itemShelfPrice" class="control-label">Item Shelf Price</label>
                <input type="text" name="itemShelfPrice" class="form-control" id="itemShelfPrice" value="{{ $product->itemShelfPrice }}">
                @if ($errors->has('itemShelfPrice'))
                    <span class="help-block">{{ $errors->first('itemShelfPrice') }}</span>
                @endif
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-default">Adjust Product</button>
            </div>
            <input type="hidden" name="_token" value="{{ Session::token() }}">
        </form>
    </div>
</div>
@stop

@extends('templates.default')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <a href="{{route('admin.index')}}">Go Back</a> 
    </br>
            <h3>Result</h3>
            <form class="form-vertical" role="form" method="post" action="{{ route('admin.product.findProduct') }}">
                <div class="form-group">
                    <label for="id" class="control-label">Item id</label>
                    <select name="id" class="form-control">
                        @foreach ($products as $id)
                            <option value="{{$id}}">{{$id}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-default">Serch Product</button>
                </div>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form> 
        
           
           
            
    </div>
    
</div>
@stop
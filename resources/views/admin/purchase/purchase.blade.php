@extends('templates.default')

@section('content')
<a href="{{route('admin.index')}}">Go Back</a>
    <h3>Purchase Order NO. {{$purchasesNo}}</h3>
    <div class="row">
    <div class="col-lg-6">

        <form id="GetZReportform" class="form-vertical" role="form" method="post" action="{{ route('admin.purchase.purchase') }}">           
            <input type="hidden" name="purchasesNo" value="{{ $purchasesNo }}">
            <div class="form-group">
                <label for="products" class="control-label">Vendor</label>
                <select name="vendors" class="form-control">
                @foreach ($vendors as $id => $company)
                    <option value="{{$id}}">{{$company}}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-default">Next</button>
            </div>
            <input type="hidden" name="_token" value="{{ Session::token() }}">
        </form>
    </div>
</div>
@stop


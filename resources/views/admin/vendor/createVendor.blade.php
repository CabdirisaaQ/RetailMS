
@extends('templates.default')

@section('content')
<a href="{{route('admin.index')}}">Go Back</a>
    <h3>Create new vendor</h3>
    <div class="row">
    <div class="col-lg-6">
        <form class="form-vertical" role="form" method="post" action="{{ route('admin.vendor.createVendor') }}">
            <div class="form-group{{ $errors->has('company') ? ' has-error' : '' }}">
                <label for="company" class="control-label">Company name</label>
                <input type="text" name="company" class="form-control" id="company" value="{{ Request::old('company') ?: '' }}">
                @if ($errors->has('company'))
                    <span class="help-block">{{ $errors->first('company') }}</span>
                @endif                
            </div>
            <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                <label for="location" class="control-label">Location</label>
                <input type="text" name="location" class="form-control" id="location" value="{{ Request::old('location') ?: '' }}">
                @if ($errors->has('location'))
                    <span class="help-block">{{ $errors->first('location') }}</span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('tel') ? ' has-error' : '' }}">
                <label for="tel" class="control-label">Contact number</label>
                <input type="text" name="tel" class="form-control" id="tel" value="{{ Request::old('tel') ?: '' }}">
                @if ($errors->has('tel'))
                    <span class="help-block">{{ $errors->first('tel') }}</span>
                @endif
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-default">Create Vendor</button>
            </div>
            <input type="hidden" name="_token" value="{{ Session::token() }}">
        </form>
    </div>
</div>
@stop

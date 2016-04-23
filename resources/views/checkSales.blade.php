@extends('templates.default')

@section('content')
<div class="row">
    <div class="col-lg-10">
    </br>
            <h3>Invoice History</h3>
            <ul>
                <li><a href="{{ route('transactionHistory') }}">Check Invoices</a></li>
            </ul>          

            <form class="form-vertical" role="form" method="post" action="{{ route('sales.salesReport') }}">  
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
                <div class="">
                    <button type="submit" class="btn btn-primary">Print</button>
                </div>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
                
            </form>
    </div>    
</div>
@stop

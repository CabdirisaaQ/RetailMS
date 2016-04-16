@extends('templates.default')

@section('content')
<div class="row">
    <div class="col-lg-10">
    </br>
            <h3>Invoice History</h3>
            <ul>
                <li><a href="{{ route('transactionHistory') }}">Check Invoices</a></li>
            </ul>

            <form class="form-horizontal" role="form" method="post" action="{{ route('checkSalesQuery') }}">  

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
                <p>You have no sales history.</p>
            @else
                <table class="table table-hover table-bordered table-condensed" style="font-size:12px;">
                    <thead> 
                        <tr> 
                            <th>Date</th>
                            <th>Z-Report No.</th> 
                            <th>Items</th> 
                            <th>Total</th> 
                            <th>Cashair</th> 
                            <th>Manager</th>
                    </thead> 
                    <tbody>
                      @foreach ($List as $line)
                        <tr style="right:100px;"> 
                            <th scope="row">{{ $line['updated_at'] }}</th> 
                                <td>{{ $line['zReport'] }}</td> 
                                <td>{{ $line['item'] }}</td> 
                                <td>{{ $line['total'] }}</td> 
                                <td>{{ $line['created_by'] }}</td> 
                                <td>{{ $line['updated_by'] }}</td> 
                        </tr> 
                      @endforeach
                    </tbody>
                </table> 
            @endif

            <form class="form-vertical" role="form" method="post" action="{{ route('sales.salesReport') }}">  
                <div class="">
                    <button type="submit" class="btn btn-primary">Print Copy</button>
                </div>
                <input type="hidden" name="record_set" value="{{ $List }}">
                <input type="hidden" name="_token" value="{{ Session::token() }}">
                
            </form>
    </div>    
</div>
@stop

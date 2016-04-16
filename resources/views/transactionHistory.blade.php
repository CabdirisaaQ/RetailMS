@extends('templates.default')

@section('content')
<div class="row">
    <div class="col-lg-18">
    </br>
            <h3>Invoice History</h3>
            <ul>
                <li><a href="{{ route('checkSales') }}">Check Sales</a></li>
            </ul>
                <table class="table table-hover table-bordered table-condensed" style="font-size:12px;">
                    <thead> 
                        <tr> 
                            <th>Receipt No.</th> 
                            <th>Total</th> 
                            <th>Date</th>
                            <th>Staff Name</th>
                            <th></th>
                    </thead> 
                    <tbody>
                      @foreach ($List as $line)
                        <tr style="right:100px;"> 
                            <th scope="row">{{ $line['receiptNo'] }}</th> 
                                <td>{{ $line['total'] }}</td> 
                                <td>{{ $line['created_at'] }}</td> 
                                <td>{{ $line['created_by'] }}</td> 
                                <td>
                                    {!! Form::open([
                                                'method' => 'POST',
                                                'route' => ['invoice', $line['receiptNo']]
                                            ]) !!}
                                                {!! Form::submit('print Invoice', ['class' => 'btn btn-primary']) !!}
                                    {!! Form::close() !!}
                                </td>
                        </tr> 
                      @endforeach
                    </tbody>
                </table> 
    </div>    
</div>
@stop


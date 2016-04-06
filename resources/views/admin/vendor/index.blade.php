@extends('templates.default')

@section('content')
<div class="row">
    <div class="col-lg-20">
        <a href="{{route('admin.index')}}">Go Back</a> 
    </br>
            <h3>Your Vendor List</h3>
            <ul>
                <li><a href="{{route('admin.vendor.createVendor')}}">Create New Vendor</a></li>
            </ul>
            @if (!$vendors->count())
            	<p>You have no vendors.</p>
            @else
                
                <table class="table table-hover table-bordered table-condensed" style="font-size:12px;">
                    <thead> 
                        <tr> 
                            <th>Company Name</th> 
                            <th>Location</th>
                            <th>Contact</th>  
                            <th>created by</th>
                            <th>created at</th>
                            <th>updated by</th>
                            <th>updated at</th>
                        </tr> 
                    </thead> 
                    <tbody>
                    	@foreach ($vendors as $vendor)
                        <tr> 
                            <th scope="row">{{ $vendor->company }}</th> 
                                <td>{{ $vendor->location }}</td> 
                                <td>{{ $vendor->tel }}</td> 
                                <td>{{ $vendor->created_by }}</td>
                                <td>{{ $vendor->created_at }}</td>
                                <td>{{ $vendor->updated_by }}</td>
                                <td>{{ $vendor->updated_at }}</td>
                                <td><a href="{{ route('admin.vendor.editVendor',$vendor->id) }}" class="btn btn-xs btn-primary">Edit</a</td> 
<!--                                 <td>
                                    {!! Form::open([
                                                'method' => 'DELETE',
                                                'route' => ['admin.vendor.deleteVendor', $vendor->id]
                                            ]) !!}
                                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td> -->
                        </tr> 
                    	@endforeach
                    </tbody>
                </table> 
            @endif
    </div>
    
</div>
@stop
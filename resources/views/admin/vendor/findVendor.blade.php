@extends('templates.default')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <a href="{{route('admin.index')}}">Go Back</a> 
    </br>
            <h3>Result</h3>
            <ul>
                <li><a href="{{route('admin.vendor.createVendor')}}">Create New Vendor</a></li>
            </ul>

                <table class="table table-hover">
                    <thead> 
                        <tr> 
                            <th>Company Name</th> 
                            <th>Location</th>
                            <th>Contact Number</th> 
                            <th>Total Cash</th> 
                            <th>Total Credit</th> 
                        </tr> 
                    </thead> 
                    <tbody>
                        <tr> 
                            <th scope="row">{{ $vendor->company }}</th> 
                                <td>{{ $vendor->location }}</td> 
                                <td>{{ $vendor->tel }}</td> 
                                <td>{{ $vendor->cash }}</td> 
                                <td>{{ $vendor->credit }}</td> 
                        </tr> 
                    </tbody>
                </table> 
    </div>
    
</div>
@stop
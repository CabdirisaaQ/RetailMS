@extends('templates.default')

@section('content')
<div class="row">
    <div class="col-lg-6">
        <a href="{{route('admin.index')}}">Go Back</a> > <a href="{{route('admin.staff.createStaff')}}">Create New Staff</a>
    </br>
            <h3>Result</h3> 
               <a href="{{route('admin.index')}}">Go Back</a> 
                <table class="table table-hover">
                    <thead> 
                        <tr> 
                            <th>Username</th> 
                            <th>First Name</th>
                            <th>Last Name</th> 
                            <th>Employement</th>
                            <th>Permission</th>
                        </tr> 
                    </thead> 
                    <tbody>
                    	
                        <tr> 
                            <th scope="row">{{ $staff->username }}</th> 
                                <td>{{ $staff->fname }}</td> 
                                <td>{{ $staff->lname }}</td> 
                                <td>{{ $staff->employment }}</td> 
                                <td>{{ $staff->permission }}</td> 
                        </tr> 
                    	
                    </tbody>
                </table> 
            
    </div>
    
</div>
@stop
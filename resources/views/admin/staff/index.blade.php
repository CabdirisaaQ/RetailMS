@extends('templates.default')

@section('content')
<div class="row">
    <div class="col-lg-18">
        <a href="{{route('admin.index')}}">Go Back</a> 
    </br>
            <h3>Your Staff List</h3>
            <ul>
                <li><a href="{{route('admin.staff.createStaff')}}">Create New Staff</a></li>
            </ul>
            @if (!$staff->count())
            	<p>You have no staff.</p>
            @else
                
                <table class="table table-hover table-bordered table-condensed" style="font-size:12px;">
                    <thead> 
                        <tr> 
                            <th>Username</th> 
                            <th>First Name</th>
                            <th>Last Name</th> 
                            <th>Employement</th>
                            <th>Permission</th>
                            <th>created by</th>
                            <th>created at</th>
                            <th>updated by</th>
                            <th>updated at</th>
                        </tr> 
                    </thead> 
                    <tbody>
                    	@foreach ($staff as $user)
                        <tr> 
                            <th scope="row">{{ $user->username }}</th> 
                                <td>{{ $user->fname }}</td> 
                                <td>{{ $user->lname }}</td> 
                                <td>{{ $user->employment }}</td> 
                                <td>{{ $user->permission }}</td>
                                <td>{{ $user->created_by }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>{{ $user->updated_by }}</td>
                                <td>{{ $user->updated_at }}</td>
                                <td><a href="{{ route('admin.staff.editStaff',$user->id) }}" class="btn btn-xs btn-primary">Edit</a</td> 
<!--                                 <td>
                                    {!! Form::open([
                                                'method' => 'DELETE',
                                                'route' => ['admin.staff.deleteStaff', $user->id]
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
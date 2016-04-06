
@extends('templates.default')

@section('content')
<a href="{{route('admin.index')}}">Go Back</a>
    <h3>Edit staff</h3>
    <div class="row">
    <div class="col-lg-6">
        <form class="form-vertical" role="form" method="post" action="{{ route('admin.staff.editStaff',$staff->id) }}">
            <div class="form-group">
                <label for="id" class="control-label">Staff ID</label>
                <input type="text" name="id" class="form-control" id="id" value="{{ $staff->id }}" disabled>               
            </div>
            <div class="form-group{{ $errors->has('fname') ? ' has-error' : '' }}">
                <label for="fname" class="control-label">Your first name</label>
                <input type="text" name="fname" class="form-control" id="fname" value="{{ $staff->fname }}">
                @if ($errors->has('fname'))
                    <span class="help-block">{{ $errors->first('fname') }}</span>
                @endif                
            </div>
            <div class="form-group{{ $errors->has('lname') ? ' has-error' : '' }}">
                <label for="lname" class="control-label">Your last name</label>
                <input type="text" name="lname" class="form-control" id="lname" value="{{ $staff->lname }}">
                @if ($errors->has('lname'))
                    <span class="help-block">{{ $errors->first('lname') }}</span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                <label for="username" class="control-label">Choose a username</label>
                <input type="text" name="username" class="form-control" id="username" value="{{ $staff->username }}">
                @if ($errors->has('username'))
                    <span class="help-block">{{ $errors->first('username') }}</span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('employment') ? ' has-error' : '' }}">
                <label for="employment" class="control-label">employment type</label>
                <input type="text" name="employment" class="form-control" id="employment" value="{{ $staff->employment }}">
                @if ($errors->has('employment'))
                    <span class="help-block">{{ $errors->first('employment') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="permission" class="control-label">permission type</label>
                <input type="text" name="permission" class="form-control" id="permission" value="{{ $staff->permission }}" disabled>
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="control-label">Choose a password</label>
                <input type="password" name="password" class="form-control" id="password" value="{{ $staff->password }}">
                @if ($errors->has('password'))
                    <span class="help-block">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-default">Sign up</button>
            </div>
            <input type="hidden" name="_token" value="{{ Session::token() }}">
        </form>
    </div>
</div>
@stop


@extends('templates.default')

@section('content')
    <h3>Sign up</h3>
    <div class="row">
    <div class="col-lg-6">
        <form class="form-vertical" role="form" method="post" action="{{ route('auth.signup') }}">
            <div class="form-group{{ $errors->has('fname') ? ' has-error' : '' }}">
                <label for="fname" class="control-label">Your first name</label>
                <input type="text" name="fname" class="form-control" id="fname" value="{{ Request::old('fname') ?: '' }}">
                @if ($errors->has('fname'))
                    <span class="help-block">{{ $errors->first('fname') }}</span>
                @endif                
            </div>
            <div class="form-group{{ $errors->has('lname') ? ' has-error' : '' }}">
                <label for="lname" class="control-label">Your last name</label>
                <input type="text" name="lname" class="form-control" id="lname" value="{{ Request::old('lname') ?: '' }}"">
                @if ($errors->has('lname'))
                    <span class="help-block">{{ $errors->first('lname') }}</span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                <label for="username" class="control-label">Choose a username</label>
                <input type="text" name="username" class="form-control" id="username" value="{{ Request::old('username') ?: '' }}">
                @if ($errors->has('username'))
                    <span class="help-block">{{ $errors->first('username') }}</span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('employment') ? ' has-error' : '' }}">
                <label for="employment" class="control-label">employment type</label>
                <input type="text" name="employment" class="form-control" id="employment" value="{{ Request::old('employment') ?: '' }}">
                @if ($errors->has('employment'))
                    <span class="help-block">{{ $errors->first('employment') }}</span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('permission') ? ' has-error' : '' }}">
                <label for="permission" class="control-label">permission type</label>
                <input type="text" name="permission" class="form-control" id="permission" value="{{ Request::old('permission') ?: '' }}">
                @if ($errors->has('permission'))
                    <span class="help-block">{{ $errors->first('permission') }}</span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="control-label">Choose a password</label>
                <input type="password" name="password" class="form-control" id="password" value="{{ Request::old('password') ?: '' }}">
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
	
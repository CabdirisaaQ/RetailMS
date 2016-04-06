
@extends('templates.default')

@section('content')
<a href="{{route('admin.index')}}">Go Back</a>
    <h3>Create new staff</h3>
    <div class="row">
        <div class="col-lg-6">
        <form class="form-horizontal" role="form" method="post" action="{{ route('admin.staff.createStaff') }}">
            <div class="form-group{{ $errors->has('fname') ? ' has-error' : '' }}">
                <label for="fname" class="control-label col-lg-4 text-left">Your first name</label>
                <div class="col-lg-8">
                <input type="text" name="fname" class="form-control" id="fname" value="{{ Request::old('fname') ?: '' }}">
                @if ($errors->has('fname'))
                    <span class="help-block">{{ $errors->first('fname') }}</span>
                @endif                
                </div>
            </div>
            <div class="form-group{{ $errors->has('lname') ? ' has-error' : '' }}">
                <label for="lname" class="control-label col-lg-4">Your last name</label>
                <div class="col-lg-8">
                <input type="text" name="lname" class="form-control" id="lname" value="{{ Request::old('lname') ?: '' }}">
                @if ($errors->has('lname'))
                    <span class="help-block">{{ $errors->first('lname') }}</span>
                @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                <label for="username" class="control-label col-lg-4">Choose a username</label>
                <div class="col-lg-8">
                <input type="text" name="username" class="form-control" id="username" value="{{ Request::old('username') ?: '' }}">
                @if ($errors->has('username'))
                    <span class="help-block">{{ $errors->first('username') }}</span>
                @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="control-label col-lg-4">Choose a password</label>
                <div class="col-lg-8">
                <input type="password" name="password" class="form-control col-lg-8" id="password" value="{{ Request::old('password') ?: '' }}">
                @if ($errors->has('password'))
                    <span class="help-block">{{ $errors->first('password') }}</span>
                @endif
                </div>
            </div>

            <div class="form-group">
            <label for="employment" class="control-label col-lg-4">employment type</label>
            <div class="col-lg-8">   
            <select name="employment" class="form-control col-lg-8">
                    <option value="casheir" selected>Casheir</option>
                    <option value="manager">Manager</option>
            </select>
            </div>               
            </div>
            <div class="form-group">
            <label for="permission" class="control-label col-lg-4">permission type</label>
            <div class="col-lg-8">
            <select name="permission" class="form-control col-lg-8">
                    <option value="user" selected>User</option>
                    <option value="admin">Admin</option>
            </select>
            </div>           
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary pull-right">Save staff</button>
            </div>
            <input type="hidden" name="_token" value="{{ Session::token() }}">
        </form>
        </div>
    </div>
@stop
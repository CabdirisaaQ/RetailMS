@extends('templates.default')

@section('content')
@if (Auth::check())
<div id="display" class="row">
@include('salesWindow')
</div>
@include('selectItem')	
@include('editItem')
@include('salesDetaile');
@include('bill');
@include('getZReport');
@else

@include('auth.signin')

@endif
@stop
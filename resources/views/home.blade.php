@extends('templates.default')

@section('content')
@if (Auth::check())
<div id="display" class="row">
@include('sales.salesWindow')
</div>
@include('sales.selectItem')	
@include('sales.editItem')
@include('sales.salesDetaile');
@include('sales.bill');
@include('sales.getZReport');
@else

@include('auth.signin')

@endif
@stop
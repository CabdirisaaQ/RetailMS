@extends('templates.default')

@section('content')
<h2>Back Office</h2>
Here is where you can manage your store
<h5>Staff Management</h5>
<ul>
<a href="{{ route('admin.staff.index')}}"><li>Staff list</li></a>
<a href="{{ route('admin.staff.createStaff') }}"><li>Create new staff</li></a>
</ul>
<h5>Vendor Management</h5>
<ul>
<a href="{{ route('admin.vendor.index')}}"><li>Vendor list</li></a>
<a href="{{ route('admin.vendor.createVendor') }}"><li>Create New Vendor</li></a>
</ul>
<h5>Stock Management</h5>
<ul>
<a href="{{ route('admin.product.stock')}}"><li>View Stock</li></a>
<a href="{{ route('admin.product.createProduct')}}"><li>Create New Product</li></a>
</ul>
<h5>Product Management</h5>
<ul>
<a href="{{ route('admin.purchase.index') }}"><li>Purchase Orders List</li></a>
<a href="{{ route('admin.purchase.purchase') }}"><li>Create New Purchase</li></a>
</ul>
@stop
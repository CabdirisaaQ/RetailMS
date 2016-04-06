<?php

namespace Retailms\Http\Controllers;

use Illuminate\Http\Request;

use Retailms\Http\Requests;
use Retailms\Models\Product;
use Retailms\Http\Controllers\Controller;

class SaleController extends Controller
{
    public function index()
    {
    	dd('hello, soo dhawow');
    }

    public function selectItem()
    {
    	// get all the stock
    	$products = Product::all();
    	dd($products);
    	// load the view and pass the vendor
    	return View('admin.product.stock')
    	    ->with('products', $products);
    }

   
}

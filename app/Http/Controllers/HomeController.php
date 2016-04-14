<?php

namespace Retailms\Http\Controllers;

use Auth;
use Retailms\Models\Product;
use Retailms\Models\Temp_sale;
use Retailms\Models\User;
use Retailms\Models\Sale;
use Illuminate\Http\Request;
use Retailms\Http\Controllers\PdfController;

class HomeController extends Controller
{
	public function index()
	{	
		dd('hello from the HomeController');
	}

}
<?php
/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    
	/**
	 * Alert flash message
	 */
	Route::get('/alert', function () {
	       return redirect()->route('home')->with('info', 'You have signed up!');
	});


	/**
	 * Home page
	 */
	Route::get('/', [
		'uses' => '\Retailms\Http\Controllers\HomeController@index',
		'as'   => 'home',
		//'middleware' =>	['auth'],
	]);


	/**
	 * Authentication
	 */

	Route::get('/signin', [
		'uses' => '\Retailms\Http\Controllers\Auth\AuthController@getSignin',
		'as' => 'auth.signin',
		'middleware' =>	['guest'],
	]);

	Route::post('/signin', [
		'uses' => '\Retailms\Http\Controllers\Auth\AuthController@postSignin',
		'middleware' =>	['guest'],
	]);

	Route::get('/signout', [
		'uses' => '\Retailms\Http\Controllers\Auth\AuthController@getSignout',
		'as' => 'auth.signout',
	]);
	/**
	 * Admin page
	 */

	Route::get('/admin', [
		'uses'  	=> '\Retailms\Http\Controllers\AdminController@index',
		'as'		=> 'admin.index',
		'middleware'=>	['admin'],
	]);

	/**
	 * Staff routes
	 */

	// show staff list
	Route::get('/admin/staff', [
		'uses' => '\Retailms\Http\Controllers\StaffController@index',
		'as' => 'admin.staff.index',
		'middleware' => ['admin'],
	]);

	// create new staff
	Route::get('/admin/staff/createStaff',[
		'uses' => '\Retailms\Http\Controllers\StaffController@create',
		'as'   => 'admin.staff.createStaff',
		'middleware'	=> ['admin'],
	]);

	Route::post('/admin/staff/createStaff',[
		'uses' => '\Retailms\Http\Controllers\StaffController@store',
		'middleware'	=> ['admin'],
	]);

	// search by id
	Route::get('/admin/staff/{id}',[
		'uses' => '\Retailms\Http\Controllers\StaffController@show',
		'as'   => 'admin.staff.findStaff',
		'middleware'	=> ['admin'],
	]);

	// edit staff
	Route::get('/admin/staff/{id}/edit',[
		'uses' => '\Retailms\Http\Controllers\StaffController@edit',
		'as'   => 'admin.staff.editStaff',
		'middleware'	=> ['admin'],
	]);

	Route::post('/admin/staff/{id}/edit',[
		'uses' => '\Retailms\Http\Controllers\StaffController@update',
		'middleware'	=> ['admin'],
	]);

	// Delete staff
	Route::delete('/admin/staff/{id}',[
		'uses' => '\Retailms\Http\Controllers\StaffController@destroy',
		'as'   => 'admin.staff.deleteStaff',
		'middleware'	=> ['admin'],
	]);

	/**
	 * Vendor routes
	 */

	// show vendor list
	Route::get('/admin/vendor', [
		'uses' => '\Retailms\Http\Controllers\VendorController@index',
		'as' => 'admin.vendor.index',
		'middleware' => ['admin'],
	]);

	// create new vendeor
	Route::get('/admin/vendor/createVndeor',[
		'uses' => '\Retailms\Http\Controllers\VendorController@create',
		'as'   => 'admin.vendor.createVendor',
		'middleware'	=> ['admin'],
	]);

	Route::post('/admin/vendor/createVndeor',[
		'uses' => '\Retailms\Http\Controllers\VendorController@store',
		'middleware'	=> ['admin'],
	]);

	// search by id
	Route::get('/admin/vendor/{id}',[
		'uses' => '\Retailms\Http\Controllers\VendorController@show',
		'as'   => 'admin.vendor.findVendor',
		'middleware'	=> ['admin'],
	]);

	// edit vendor
	Route::get('/admin/vendor/{id}/edit',[
		'uses' => '\Retailms\Http\Controllers\VendorController@edit',
		'as'   => 'admin.vendor.editVendor',
		'middleware'	=> ['admin'],
	]);

	Route::post('/admin/vendor/{id}/edit',[
		'uses' => '\Retailms\Http\Controllers\VendorController@update',
		'middleware'	=> ['admin'],
	]);

	// Delete vendor
	Route::delete('/admin/vendor/{id}',[
		'uses' => '\Retailms\Http\Controllers\VendorController@destroy',
		'as'   => 'admin.vendor.deleteVendor',
		'middleware'	=> ['admin'],
	]);

	/**
	 * Products routes
	 */

	// show vendor list
	Route::get('/admin/product/stock', [
		'uses' => '\Retailms\Http\Controllers\ProductController@index',
		'as' => 'admin.product.stock',
		'middleware' => ['admin'],
	]);

	// Find product details
	Route::get('/admin/product/stock/{description}', [
		'uses' => '\Retailms\Http\Controllers\ProductController@findProduct',
		'as' => 'admin.product.findStock',
		'middleware' => ['admin'],
	]);

	// create new product
	Route::get('/admin/product/createProduct',[
		'uses' => '\Retailms\Http\Controllers\ProductController@create',
		'as'   => 'admin.product.createProduct',
		'middleware'	=> ['admin'],
	]);

	Route::Post('/admin/product/createProduct',[
		'uses' => '\Retailms\Http\Controllers\ProductController@store',
		'middleware'	=> ['admin'],
	]);

	// update product
	Route::get('/admin/product/editProduct/{id}',[
		'uses' => '\Retailms\Http\Controllers\ProductController@edit',
		'as'   => 'admin.product.editProduct',
		'middleware'	=> ['admin'],
	]);

	Route::Post('/admin/product/editProduct/{id}',[
		'uses' => '\Retailms\Http\Controllers\ProductController@update',
		'middleware'	=> ['admin'],
	]);

	/**
	 * Purchas Routs
	 */

	Route::get('/admin/purchase/index',[
		'uses' => '\Retailms\Http\Controllers\PurchaseController@index',
		'as'   => 'admin.purchase.index',
		'middleware'	=> ['admin'],
	]);

	// Create new purchase
	Route::get('/admin/purchase/purchase',[
		'uses' => '\Retailms\Http\Controllers\PurchaseController@create',
		'as'   => 'admin.purchase.purchase',
		'middleware'	=> ['admin'],
	]);

	Route::post('/admin/purchase/purchase',[
		'uses' => '\Retailms\Http\Controllers\PurchaseController@newPurchaseOrder',
		'middleware'	=> ['admin'],
	]);

	// purchase details
	Route::get('/admin/purchase/purchaseDetails',[
		'uses' => '\Retailms\Http\Controllers\PurchaseController@store',
		'as'   => 'admin.purchase.purchaseDetails',
		'middleware'	=> ['admin'],
	]);

	Route::post('/admin/purchase/purchaseDetails',[
		'uses' => '\Retailms\Http\Controllers\PurchaseController@store',
		'as'   => 'admin.purchase.purchaseDetails',
		'middleware'	=> ['admin'],
	]);

	// preview purchase order
	Route::get('/admin/purchase/previewPurchase',[
		'uses' => '\Retailms\Http\Controllers\PurchaseController@previewPurchase',
		'as'   => 'admin.purchase.previewPurchase',
		'middleware'	=> ['admin'],
	]);

	Route::post('/admin/purchase/previewPurchase',[
		'uses' => '\Retailms\Http\Controllers\PurchaseController@previewPurchase',
		'as'   => 'admin.purchase.previewPurchase',
		'middleware'	=> ['admin'],
	]);

	// Delete purchase detail
	Route::delete('/admin/purchase/deletePurchaseDetaile{id}',[
		'uses' => '\Retailms\Http\Controllers\PurchaseController@destroy',
		'as'   => 'admin.purchase.deletePurchaseDetaile',
		'middleware'	=> ['admin'],
	]);

	// post purchases order
	Route::post('/admin/purchase/postPurchase',[
		'uses' => '\Retailms\Http\Controllers\PurchaseController@finalizePurchase',
		'as'   => 'admin.purchase.postPurchase',
		'middleware'	=> ['admin'],
	]);

	// Select One Purchase
	Route::get('/admin/purchase/showPurchase/{purchasesNo}',[
		'uses' => '\Retailms\Http\Controllers\PurchaseController@showPurchase',
		'as'   => 'admin.purchase.showPurchase',
		'middleware'	=> ['admin'],
	]);

	// Clear Purchase
	Route::get('/admin/purchase/clearPurchase/{purchasesNo}',[
		'uses' => '\Retailms\Http\Controllers\PurchaseController@clearPurchase',
		'as'   => 'admin.purchase.clearPurchase',
		'middleware'	=> ['admin'],
	]);

	// print Purchase History
	Route::get('/admin/purchase/printPurchaseHistory',[
		'uses' => '\Retailms\Http\Controllers\PurchaseController@printPurchaseHistory',
		'as'   => 'admin.purchase.printPurchaseHistory',
		'middleware'	=> ['admin'],
	]);

	// purchaseQuery
	Route::post('/admin/purchase/purchaseQuery',[
		'uses' => '\Retailms\Http\Controllers\PurchaseController@purchaseQuery',
		'as'   => 'admin.purchase.purchaseQuery',
		'middleware'	=> ['admin'],
	]);

	/**
	 * Sales routes
	 */

	// Search barcode
	Route::get('/sales/searchBarcode/{barcode}', [
		'uses'  	=> '\Retailms\Http\Controllers\HomeController@searchBarcode',
		'middleware'=>	['auth'],
	]);	

	Route::get('/sales/selectItem', [
		'uses'  	=> '\Retailms\Http\Controllers\SaleController@selectItem',
		'middleware'=>	['auth'],
	]);

	// add to curt
	Route::get('/sales/addToCurt/{description}', [
		'uses'  	=> '\Retailms\Http\Controllers\HomeController@add',
		'as'		=> '/sales/addToCurt',
		'middleware'=>	['auth'],
	]);

	// edit item
	Route::get('/sales/editItem/{id}', [
		'uses'  	=> '\Retailms\Http\Controllers\HomeController@edit',
		'as'		=> '/sales/editItem',
		'middleware'=>	['auth'],
	]);

	Route::post('/sales/editItem/{id}', [
		'uses'  	=> '\Retailms\Http\Controllers\HomeController@update',
		'as'		=> '/sales/editItem',
		'middleware'=>	['auth'],
	]);

	// delete item from dummy items
	Route::delete('/sales/deleteItem/{id}',[
		'uses' => '\Retailms\Http\Controllers\HomeController@destroy',
		'as'   => '/sales/deleteItem',
		'middleware'	=> ['auth'],
	]);

	// change item unit of measure
	Route::post('/sales/itemUOM/{id}',[
		'uses' => '\Retailms\Http\Controllers\HomeController@changeUOM',
		'as'   => '/sales/itemUOM',
		'middleware'	=> ['auth'],
	]);

	// this will get the refreshed list of dummy items
	Route::get('salesWindow', function () { // the first parameter is the route name, it does not necessarily need to match your template's name
    return view( 'salesWindow' ); // this will trigger the template compilation
	});

	// Preview Bill
	Route::get('/sales/bill', [
		'uses'  	=> '\Retailms\Http\Controllers\HomeController@bill',
		'as'		=> '/sales/bill',
		'middleware'=>	['auth'],
	]);

	// Generate Bill
	Route::get('/sales/saveOrder', [
		'uses'  	=> '\Retailms\Http\Controllers\HomeController@save',
		'as'		=> '/sales/saveOrder',
		'middleware'=>	['auth'],
	]);


	// Show Transaction History
	Route::get('/sales/transactionHistory', [
		'uses'  	=> '\Retailms\Http\Controllers\HomeController@getTransactionHistory',
		'as'		=> 'transactionHistory',
		'middleware'=>	['auth'],
	]);

	Route::get('/sales/checkSales', [
		'uses'  	=> '\Retailms\Http\Controllers\HomeController@checkSales',
		'as'		=> 'checkSales',
		'middleware'=>	['auth'],
	]);

	Route::post('/sales/checkSalesQuery', [
		'uses'  	=> '\Retailms\Http\Controllers\HomeController@checkSalesQuery',
		'as'		=> 'checkSalesQuery',
		'middleware'=>	['auth'],
	]);

	// get z report
	Route::get('/sales/getZReport', [
		'uses'  	=> '\Retailms\Http\Controllers\HomeController@getZReport',
		'as'		=> '/sales/getZReport',
		'middleware'=>	['auth'],
	]);

	// get z report
	Route::get('/sales/getZReport', [
		'uses'  	=> '\Retailms\Http\Controllers\HomeController@getZReport',
		'as'		=> '/sales/getZReport',
		'middleware'=>	['auth'],
	]);

	// generate the z report
	Route::get('/sales/returnItem', [
		'uses'  	=> '\Retailms\Http\Controllers\HomeController@returnItem',
		'as'		=> '/sales/returnItem',
		'middleware'=>	['auth'],
	]);

	/*------------------------------------------------------------------------
	//  Report printing
	------------------------------------------------------------------------*/
	/*Route::get('/sales/{invoice}', function ($invoiceId) {
    
    	return Auth::user()->downloadInvoice($invoiceId, [
       		 'vendor'  => 'Your Company',
        	 'product' => 'Your Product',
    ]);*/

	
	// invoice printing
	Route::post('/sales/invoice/{receiptNo}', [
    	'uses' => '\Retailms\Http\Controllers\HomeController@printInvoice',
    	'as' => 'invoice',
    	'middleware' =>['auth'],
    ]);
    
    Route::post('/sales/ZReport', [
    	'uses' => '\Retailms\Http\Controllers\HomeController@ZReport',
    	'as' => '/sales/ZReport',
    	'middleware' =>['auth'],
    ]);

    // This one is for printing Sales report
    Route::post('/sales/salesReport', [
    	'uses' => '\Retailms\Http\Controllers\HomeController@salesReport',
    	'as' => 'sales.salesReport',
    	'middleware' =>['auth'],
    ]);

    // this is a temproray for testing only
    Route::get('/sales/ZReport/report', [
    	'uses' => '\Retailms\Http\Controllers\HomeController@reportGen',
    	'as' => '/sales/ZReport/report',
    	'middleware' =>['auth'],
    ]);


	/*// search by id
	// Purchase an existing item
	Route::get('/admin/product/purchase2',[
		'uses' => '\Retailms\Http\Controllers\ProductController@edit',
		'as'   => 'admin.product.purchase2',
		'middleware'	=> ['admin'],
	]);

	Route::post('/admin/product/purchase2',[
		'uses' => '\Retailms\Http\Controllers\ProductController@update',
		'middleware'	=> ['admin'],
	]);*/
	/*


	// Delete vendor
	Route::delete('/admin/product/{id}',[
		'uses' => '\Retailms\Http\Controllers\ProductController@destroy',
		'as'   => 'admin.product.deleteVendor',
		'middleware'	=> ['admin'],
	]);*/

});

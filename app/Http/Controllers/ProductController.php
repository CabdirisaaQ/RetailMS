<?php

namespace Retailms\Http\Controllers;

use Validator;
use Retailms\Models\Vendor;
use Retailms\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {	
        // get all the stock
        $products = Product::all();
        //dd($products);
        // load the view and pass the vendor
        return View('admin.product.stock')
            ->with('products', $products);
    }

    // view the stock who is about to run
    public function stockReminder()
    {   
        // get all the stock
        $products = Product::where('itemInStock', '<=' , '10')->get();
        //dd($products);
        // load the view and pass the vendor
        return View('admin.product.stockReminder')
            ->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {   
        return view('admin.product.createProduct');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
/*        dd($request);
*/        $this->validate($request, [
            'descripiton'       => 'unique:products|required|max:255',
            'barcode'           => 'unique:products|required|max:255',
            'quantityPerUnit'   => 'required|max:255',
            'unitPrice'         => 'required|max:255',
            'unitShelfPrice'    => 'required|max:255',
            'itemPrice'         => 'required|max:255',
            'itemShelfPrice'    => 'required|max:255',
        ]);

        // dd('all validated');

        $now = new \DateTime();
        Product::create([
            'descripiton'      =>  $request->input('descripiton'),
            'barcode'          =>  $request->input('barcode'),
            'itemInStock'     =>  0,
            'quantityPerUnit'  =>  $request->input('quantityPerUnit'),
            'unitPrice'        =>  $request->input('unitPrice'),
            'unitShelfPrice'   =>  $request->input('unitShelfPrice'),
            'itemPrice'        =>  $request->input('itemPrice'),
            'itemShelfPrice'   =>  $request->input('itemShelfPrice'),
            'created_by'       =>  $request->user()->username,
            'created_at'       =>  $now,
            'updated_by'       =>  NULL,
            'updated_at'       =>  NULL,
        ]);

        return redirect()
        ->route('admin.product.stock')
        ->with('info', 'New item had been created in stock successfully.');
    }

    public function find()
    {
       //dd('good');
        $products   = Product::lists('productId');
          //  dd($products);
            //return view('link.create')->with('categories', $categories);
        return view('admin.product.findProduct')
                ->with('products', $products);
    }

    public function findProduct($descripiton)
    {
        //return $descripiton;
       $query = Product::where('descripiton','=', $descripiton)->first();
       return $query;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */

    public function khayr($value='')
    {
        return $value;
    }

    public function show(Request $request)
    {
        $this->validate($request, [
            'productId'                => 'required|max:255',
        ]);

        // get all vendor
        $product = Product::find($request->input('productId'));
        $vendors    = Vendor::lists('company', 'id');

        // dd($product->descripiton);
        // show the view and pass the vendor to it
        return view('admin.product.purchase2')
                ->with('vendors', $vendors)
                ->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        
        // find vendor
        $product = Product::find($id);

        // show the view and pass the product to it
        return view('admin.product.editProduct')
                ->with('product', $product);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request,$id)
    {
        // update product

        $this->validate($request, [
            'itemInStock'      => 'required|max:255',
            'unitShelfPrice'    => 'required|max:255',
            'itemShelfPrice'    => 'required|max:255',
        ]);

        // store
        $product = Product::find($id);
        $product->itemInStock   =  $request->input('itemInStock');
        $product->unitShelfPrice =  $request->input('unitShelfPrice');
        $product->itemShelfPrice =  $request->input('itemShelfPrice');        
        $product->save();

        // redirect
        return redirect()
            ->route('admin.product.stock')
            ->with('info', 'Changes had been saved successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        /*// deleting staff
        $vendor = Vendor::find($id);
        $vendor->delete();

         // redirect
         return redirect()
                    ->route('admin.vendor.index')
                    ->with('info', 'Vendor had been deleted successfully.');*/
    }


}
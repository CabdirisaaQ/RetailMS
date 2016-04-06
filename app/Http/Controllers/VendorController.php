<?php

namespace Retailms\Http\Controllers;

use Auth;
use Validator;
use Retailms\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {	
        // get all the vendors
        $vendors = Vendor::all();

        // load the view and pass the vendor
        return View('admin.vendor.index')
            ->with('vendors', $vendors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.vendor.createVendor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $now = new \DateTime();
        $this->validate($request, [
            'company'   => 'required|max:255|unique:vendors',
            'location'  => 'required|max:255',
            'tel'       => 'required|max:255',
        ]);

    
        Vendor::create([
            'company'   =>  $request->input('company'),
            'location'  =>  $request->input('location'),
            'tel'       =>  $request->input('tel'),
            'created_by'=>  $request->user()->username,
            'created_at'=>  $now,
            'updated_by'=>  NULL,
            'updated_at'=>  NULL,
        ]);

        return redirect()
        ->route('admin.vendor.index')
        ->with('info', 'New vendor had been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        // get all vendor
        $vendor = Vendor::find($id);

        // show the view and pass the vendor to it
        return view('admin.vendor.findVendor')
                ->with('vendor', $vendor);
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
        $vendor = Vendor::find($id);

        // show the view and pass the vendor to it
        return view('admin.vendor.editVendor')
                ->with('vendor', $vendor);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request,$id)
    {
        // update vendor
        $now = new \DateTime();
        $this->validate($request, [
            'company'   => 'required|max:255',
            'location'  => 'required|max:255',
            'tel'       => 'required|max:255',
        ]);

        // store
        $vendor = Vendor::find($id);
        $vendor->company    =  $request->input('company');
        $vendor->location   =  $request->input('location');
        $vendor->tel        =  $request->input('tel');
        $vendor->updated_by =  $request->user()->username;
        $vendor->updated_at =  $now;
        $vendor->save();

        // redirect
        return redirect()
            ->route('admin.vendor.index')
            ->with('info', 'Vendor had been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        // deleting staff
        $vendor = Vendor::find($id);
        $vendor->delete();

         // redirect
         return redirect()
                    ->route('admin.vendor.index')
                    ->with('info', 'Vendor had been deleted successfully.');
    }
}
<?php

namespace Retailms\Http\Controllers;

use Auth;
use Validator;
use Retailms\Models\Vendor;
use Retailms\Models\Product;
use Retailms\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    
    protected $vendorId = 0;
    protected $purchasesNo = '';
    protected $products;
    private $finalizePurchaseReport = array();


   /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {	

        // get all the purchase order's purchaseNo
        $purchaseOrders = Purchase::all();
        // assign the first purchaseNo in the list
        $purchaseNoList[0] = $purchaseOrders[0]['purchasesNo'];

        // loop through all the purchaseNo and extract the indivduall purchase order
        for ($i=1; $i < sizeof($purchaseOrders) ; $i++) { 
            // skip if the purchaseNo is duplicated
            if ($purchaseOrders[$i]['purchasesNo'] == $purchaseOrders[$i-1]['purchasesNo']) {
                continue;
            }
            // push the result in to the array
            array_push($purchaseNoList,$purchaseOrders[$i]['purchasesNo']);
        }

        // so based on the purchasesNo, get the details
        for ($i=0; $i < sizeof($purchaseNoList) ; $i++) { 
            // push the result in to the array
            $List[$i] = $this->getPurchaseInfo($purchaseNoList[$i]);
        }

        //dd($List);

        // load the view and pass the vendor
        return View('admin.purchase.index')
            ->with('List', $List);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // this is a temprory file that will be used for the first time
        // this will generate the first purchase oreder number
      //  $purchasesNo = "0000001";
        $lastPurchaseNo = Purchase::all()->last();
        $newPurchaseNo = $lastPurchaseNo['purchasesNo'] + 1;
        $purchasesNo = substr(sprintf("%'.06d", $newPurchaseNo),-7); 
       // dd($purchasesNo);
      

        // Return a list of the vendors to the view
        $vendors = Vendor::lists('company','id'); 

        return view('admin.purchase.purchase')
            ->with('purchasesNo',$purchasesNo)
            ->with('vendors', $vendors);
    }

    /**
     *  - Assign the purchase order id 
     *  - assign the vendor id
     */
    public function newPurchaseOrder(Request $request)
    {
        // vlidate the request input
        $this->validate($request, [
            'purchasesNo'   => 'required|max:255',
            'vendors'      => 'required|max:255',
        ]);

        // Assign the purchase id 
        $this->purchasesNo = $request->input('purchasesNo');

        // Assign the vendor id 
        $this->vendorId = $request->input('vendors');

        // prepare a list of all the products in the database
        $products = Product::lists('descripiton','id');
      //  dd($this->products);

        // return the view
        return view('admin.purchase.purchaseDetails')
                ->with('purchasesNo', $this->purchasesNo)
                ->with('products',$products)
                ->with('vendorId', $this->vendorId);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        // validate all input
        $this->validate($request, [
            // purchase related input
            'purchasesNo'    => 'required|max:255',
            'vendorId'       => 'required|max:255',
            'productId'      => 'required|max:255',
            'total'          => 'required|max:255',
            'cash'           => 'required|max:255',
            'credit'         => 'required|max:255',
            // product related input
            'unitShelfPrice' => 'required|max:255',
            'itemPrice'      => 'required|max:255',
            'itemShelfPrice' => 'required|max:255',
            // both product and purchase related
            'unitsInOrder'   => 'required|max:255',
            'unitPrice'      => 'required|max:255',
            
        ]);


        
        $now = new \DateTime();
        // update the product table
        $product = Product::find($request->input('productId'));
        $product->itemInStock   +=  $request->input('unitsInOrder');
        $product->unitPrice       =  $request->input('unitPrice');
        $product->unitShelfPrice  =  $request->input('unitShelfPrice');        
        $product->itemPrice       =  $request->input('itemPrice');        
        $product->itemShelfPrice  =  $request->input('itemShelfPrice');       
        $product->updated_by      =  $request->user()->username;       
        $product->updated_at      =  $now;       
        $product->save();

        // Save purchase record
        Purchase::create([
            'purchasesNo'  =>  $request->input('purchasesNo'),
            'vendorId'     =>  $request->input('vendorId'),
            'productId'    =>  $request->input('productId'),
            'unitsInOrder' =>  $request->input('unitsInOrder'),
            'unitPrice'    =>  $request->input('unitPrice'),
            'total'        =>  $request->input('total'),
            'cash'         =>  $request->input('cash'),
            'credit'       =>  $request->input('credit'),
            'created_by'   =>  $request->user()->username,
            'created_at'   =>  $now,
            'updated_by'   =>  NULL,
            'updated_at'   =>  NULL,
        ]);


         $products = Product::lists('descripiton','id');
        // return the view
        return view('admin.purchase.purchaseDetails')
                ->with('info','one transaction saved successfully')
                ->with('purchasesNo', $request->input('purchasesNo'))
                ->with('products',$products)
                ->with('vendorId', $this->vendorId);
    }

    /**
     * Preview purchase 
     */
    public function previewPurchase(Request $request)
    {
        $this->validate($request, [
            'purchasesNo'    => 'required|max:255',          
        ]);

         // Extract the list of transaction for that purhase
         $previewList = Purchase::where('purchasesNo', $request->input('purchasesNo'))->get();
         // Extract the name of the company
         $company = Vendor::find($previewList[0]['vendorId']);

         // sum up all the total, cash and credit
         $total = $this->getTotal($previewList);
         $cash  = $this->getCash($previewList);
         $credit= $this->getCredit($previewList);

         // harvest the purchase details
         $this->finalizePurchaseReport[0] = $company['company'];
         $this->finalizePurchaseReport[1] = $previewList;
         $this->finalizePurchaseReport[2] = $total;
         $this->finalizePurchaseReport[3] = $credit;
         $this->finalizePurchaseReport[4] = $cash;

       //  dd($this->finalizePurchaseReport[1][0]['unitPrice']);

         // return the view
         return view('admin.purchase.previewPurchase')
                    ->with('vendor', $company['company'])
                    ->with('previewList',$previewList)
                    ->with('total',$total)
                    ->with('credit',$credit)
                    ->with('cash',$cash);
    }

    /**
     * Finalize the purchase oarder
     */
    public function finalizePurchase(Request $request)
    {
        $this->validate($request, [
            'purchasesNo'    => 'required|max:255',          
        ]);

        $record = '';

         // Extract the list of transaction for that purhase
         $previewList = Purchase::where('purchasesNo', $request->input('purchasesNo'))->get();
         // Extract the name of the company
         $company = Vendor::find($previewList[0]['vendorId']);

         // sum up all the total, cash and credit
         $total = $this->getTotal($previewList);
         $cash  = $this->getCash($previewList);
         $credit= $this->getCredit($previewList);


         $record[0] = $company['company'];
         $record[1] = $previewList;
         $record[2] = $total;
         $record[3] = $cash;
         $record[4] = $credit;


         $report = new PdfController();

         $reportType = 'pdf.purchaseOrder';
         $reportName = 'Purchase Order-' . date('d-m-Y');
        
         //dd($record);
         return $report->invoice($record,$reportName,$reportType);  

    }

    public function showPurchase($purchaseNo)
    {

        // Extract the list of transaction for that purhase
        $previewList = Purchase::where('purchasesNo', $purchaseNo)->get();
        // Extract the name of the company
        $company = Vendor::find($previewList[0]['vendorId']);

        // sum up all the total, cash and credit
        $total = $this->getTotal($previewList);
        $cash  = $this->getCash($previewList);
        $credit= $this->getCredit($previewList);
        
        // dd($total);

        // return the view
        return view('admin.purchase.showPurchase')
                   ->with('vendor', $company['company'])
                   ->with('previewList',$previewList)
                   ->with('total',$total)
                   ->with('credit',$credit)
                   ->with('cash',$cash);
    }

    /**
     * Clear purchase order
     */
    public function clearPurchase($purchaseNo)
    {   
       // dd(Auth::user()->username);
        $now = new \DateTime();
        // Extract the list of transaction for that purhase
        $previewList = Purchase::where('purchasesNo', $purchaseNo)->get();

        // so based on the purchasesNo, get the details
        for ($i=0; $i < sizeof($previewList) ; $i++) { 
            // Clear all the records in the table
          //  $username = $request->user()->username;
            $record = Purchase::where('transactionId',$previewList[$i]['transactionId'])->update(['credit' => 0,'cash' => $previewList[$i]['total'],'updated_by'=>Auth::user()->username,'updated_at'=>$now]);
        }

        return $this->index();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $purchasesNo = '';
        $previewList = '';

        /* 1- Retrevi the transaction record befor deleting 
           2 - retrive the purchaseNo befor deleting */    
        $purchaseDetaile = Purchase::where('transactionId', $id)->get();
        //dd($purchaseDetaile);
        if (empty($purchaseDetaile[0])) {
            return $this->index();
        } else {
            $purchasesNo = $purchaseDetaile[0]['purchasesNo'];

            // 3- substract the unitsInOrder from the itemInStock
             $now = new \DateTime();
            $entryDetail = Product::find($purchaseDetaile[0]['productId']);
            $entryDetail->itemInStock =  $entryDetail->itemInStock - $purchaseDetaile[0]['unitsInOrder'];
            $entryDetail->updated_by   =   Auth::user()->username;
            $entryDetail->updated_at   =  $now;
            $entryDetail->save();

            // 4- delete the record
            $purchaseDetaile = Purchase::where('transactionId', $id)->delete();

            /*5- prepare the view details
              - Extract the list of transaction for that purhase
              - Extract the name of the company
              - sum up all the total, cash and credit  */
             $previewList = Purchase::where('purchasesNo', $purchasesNo)->get();  

            // dd($previewList);

             if (empty($previewList[0])) {
                    return $this->index();
                } else {
                    $company = Vendor::find($previewList[0]['vendorId']);
                    $total = $this->getTotal($previewList);
                    $cash  = $this->getCash($previewList);
                    $credit= $this->getCredit($previewList);

                    // return the view
                    return view('admin.purchase.previewPurchase')
                               ->with('vendor', $company['company'])
                               ->with('previewList',$previewList)
                               ->with('total',$total)
                               ->with('credit',$credit)
                               ->with('cash',$cash);   
                }
                   
              
        }
        
    }

    public function getTotal($previewList)
    {
        $sum = 0;

        for ($x = 0; $x < sizeof($previewList) ; $x++) {
             $sum += $previewList[$x]['total'];
         }

        return $sum ;
    }

    public function calculateTotal($purchasesNo)
    {
        
        $record = Purchase::where('purchasesNo',$purchasesNo)->get();

        $sum = 0;

        for ($x = 0; $x < sizeof($record) ; $x++) {
             $sum += $record[$x]['total'];
         }

        return $sum ;

    }

    public function getCash($previewList)
    {
        $sum = 0;

        for ($x = 0; $x < sizeof($previewList) ; $x++) {
             $sum += $previewList[$x]['cash'];
         }

        return $sum ;
    }

    public function calculateCash($purchasesNo)
    {
        $record = Purchase::where('purchasesNo',$purchasesNo)->get();

        $sum = 0;

        for ($x = 0; $x < sizeof($record) ; $x++) {
             $sum += $record[$x]['cash'];
         }

        return $sum ;
    }

    public function getCredit($previewList)
    {
        $sum = 0;

        for ($x = 0; $x < sizeof($previewList) ; $x++) {
             $sum += $previewList[$x]['credit'];
         }

        return -$sum ;
    }

    public function calculateCredit($purchasesNo)
    {
        $record = Purchase::where('purchasesNo',$purchasesNo)->get();

        $sum = 0;

        for ($x = 0; $x < sizeof($record) ; $x++) {
             $sum += $record[$x]['credit'];
         }

        return $sum ;
    }

    public function searchVendorName($purchasesNo)
    {
        $record = Purchase::where('purchasesNo',$purchasesNo)->first();
        $result = Vendor::find($record['vendorId']);
        return $result['company'];
    }

    public function getPurchaseInfo($purchasesNo)
    {   
        $result;
        $record = Purchase::where('purchasesNo',$purchasesNo)->get();

        $result['purchasesNo'] = $purchasesNo;
        $result['vendor']      = $this->searchVendorName($purchasesNo);
        $result['total']       = $this->calculateTotal($purchasesNo);
        $result['cash']        = $this->calculateCash($purchasesNo);
        $result['credit']      = $this->calculateCredit($purchasesNo);
        $result['created_at']  = $record[0]['created_at'];
        $result['created_by']  = $record[0]['created_by'];
        $result['updated_at']  = $record[0]['updated_at'];
        $result['updated_by']  = $record[0]['updated_by'];

        if ($result['total'] == $result['cash']) {
            $result['status'] = 'closed';
        } else {
            $result['status'] = 'open';
        }

        return $result;
    }

    public function purchaseQuery(Request $request)
    {
        
        $this->validate($request, [
                    'from'    => 'required',          
                    'to'    => 'required',          
        ]);

        $from = strtotime($request->input('from'));
        $to = strtotime($request->input('to'));
        
        $purchaseOrders = Purchase::whereBetween('created_at', [date("Y-m-d h:i:s", $from), date("Y-m-d h:i:s", $to)])->get();

        $purchaseNoList[0] = $purchaseOrders[0]['purchasesNo'];

        // loop through all the purchaseNo and extract the indivduall purchase order
        for ($i=1; $i < sizeof($purchaseOrders) ; $i++) { 
            // skip if the purchaseNo is duplicated
            if ($purchaseOrders[$i]['purchasesNo'] == $purchaseOrders[$i-1]['purchasesNo']) {
                continue;
            }
            // push the result in to the array
            array_push($purchaseNoList,$purchaseOrders[$i]['purchasesNo']);
        }

        // so based on the purchasesNo, get the details
        for ($i=0; $i < sizeof($purchaseNoList) ; $i++) { 
            // push the result in to the array
            $List[$i] = $this->getPurchaseInfo($purchaseNoList[$i]);
        }

        // dd($purchaseOrders);
       //dd($List);

        // load the view and pass the vendor
        return View('admin.purchase.index')
            ->with('List', $List);
                    
    }

    // Reports

    public function printPurchaseHistory()
    {
       // dd('fariid');
        // get all the purchase order's purchaseNo
        $purchaseOrders = Purchase::all();
        // assign the first purchaseNo in the list
        $purchaseNoList[0] = $purchaseOrders[0]['purchasesNo'];

        // loop through all the purchaseNo and extract the indivduall purchase order
        for ($i=1; $i < sizeof($purchaseOrders) ; $i++) { 
            // skip if the purchaseNo is duplicated
            if ($purchaseOrders[$i]['purchasesNo'] == $purchaseOrders[$i-1]['purchasesNo']) {
                continue;
            }
            // push the result in to the array
            array_push($purchaseNoList,$purchaseOrders[$i]['purchasesNo']);
        }

        // so based on the purchasesNo, get the details
        for ($i=0; $i < sizeof($purchaseNoList) ; $i++) { 
            // push the result in to the array
            $List[$i] = $this->getPurchaseInfo($purchaseNoList[$i]);
        }


       // dd($List);
        // load the view and pass the vendor
        return $this->reportGen($List);
    }

    public function reportGen($List)
    {

        $report = new PdfController();

        //$report->getData($record);

        $reportType = 'pdf.purchaseHistory';
        $reportName = 'Purchase Balance Sheet ' . date('d-m-Y');

        //$record = Sale::where('zReport',$zReport)->get();

       // $report_info = $this->getZReportInfo($record) ;
        //dd($reportType);

        return $report->invoice($List,$reportName,$reportType);
    }
}
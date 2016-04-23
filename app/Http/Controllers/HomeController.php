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
		$products = Product::all();
    	//dd($products);
    	// load the view and pass the vendor
    	// return the homw view
        $products = Product::all();
        $temp_sales_details = Temp_sale::all();

        $dummy_total = 0;

        for ($x = 0; $x < sizeof($temp_sales_details) ; $x++) {
             $dummy_total += $temp_sales_details[$x]['total'];
         }

        // Get Transaction History
        //$transactionHistory = $this->getTransactionHistory();
        
        return View('home')
            ->with('products', $products)
           // ->with('transactionHistory',$transactionHistory)
            ->with('dummyTotal', $dummy_total)
            ->with('dump', $temp_sales_details);
	}

    public function searchBarcode($barcode)
    {
        // find product details based on the description
        $product = Product::where('barcode', $barcode)->first();

        // get the last inserted dummy item
        //$last_dummy_item = Temp_sale::where('barcode', $barcode)->get()->last();

        $now = new \DateTime();

        Temp_sale::create([
            'barcode'         =>  $product->barcode,
            'item'         =>  $product->descripiton,
            'uom'         =>  'pcs',
            'unitPrice'    => $product->itemShelfPrice,
            'created_at'   => $now,
            'created_by'   => Auth::user()->username,
        ]);

        // return the homw view
       /* $products = Product::all();
        $temp_sales_details = Temp_sale::all();*/

        return "true";
        
    }

	 public function add($descripiton)
    {
    	//dd($description);
    	 
         // find product details based on the description
         $product = Product::where('descripiton', $descripiton)->first();
         //dd($product);
    	 $now = new \DateTime();

    	Temp_sale::create([
            'barcode'         =>  $product->barcode,
            'item'         =>  $product->descripiton,
            'uom'         =>  'pcs',
            'unitPrice'    => $product->itemShiftPrice,
    	    'created_at'   => $now,
    	    'created_by'   => Auth::user()->username,
    	]);

    	// return the homw view
    	$products = Product::all();
    	$temp_sales_details = Temp_sale::all();

        return $this->index();
    	
        // return View('home')
    	   //  ->with('products', $products)
       	//     ->with('dump', $temp_sales_details);
    }

    // change the unite of mesurment for the item
    public function changeUOM($id)
    {   
        // get the dummy item
        $item = Temp_sale::find($id);

        // get the itme form product table
        $product = Product::where('barcode', $item->barcode)
                          ->where('descripiton',$item->item)
                          ->first();


        if ($item->uom == 'pcs') {
            $item->uom = 'crt';
            $item->unitPrice = $product->unitShelfPrice;
            $item->total = $item->qty * $product->unitShelfPrice;
            $item->save();
            
        } elseif ($item->uom == 'crt') {
            $item->uom = 'pcs';
            $item->unitPrice = $product->itemShelfPrice;
            $item->total = $item->qty * $product->itemShelfPrice;
            $item->save();
        }

        return $item ;
    }

    // return the item to the stock
    public function returnItem()
    {   
        // set all the variables you need
        $newQty = 0;
        $newStockQty=0;
        $check = "";
        $x = 0;
        // get the dummy item
        $dummy_item = Temp_sale::all();

        

       for ($x = 0; $x < sizeof($dummy_item) ; $x++) {
             
            // fetch the itme detail form product table
            $product = Product::where('barcode', $dummy_item[$x]['barcode'])
                              ->first();
            // calculate the new itemInStock amount
            $newQty = $dummy_item[$x]['qty'];
                              
            if ($dummy_item[$x]['uom'] == 'crt') { // make sure you consider the UOM
                $newQty = $dummy_item[$x]['qty'] * $product->quantityPerUnit;
            }

            $newStockQty = $product->itemInStock + $newQty;    

             // fetch the sales table for that transaction
            $sales_transaction = Sale::where('productId',$product->id)
                                      ->where('qty', $dummy_item[$x]['qty'])
                                      ->where('uom', $dummy_item[$x]['uom'])
                                      ->orderBy('created_at','decs')
                                      ->get()
                                      ->first();

            // $dummy_item[$x];
            // check if it is empty
            if (!empty($sales_transaction)) {
                //delete the sales transaction
               // $sales_transaction->delete();
                $id = $sales_transaction->transactionId;
               // $sales_to_be_deleted = Sale::find();
                /*

                // update the stock
                                                */
                $check .= $this->deleteTransaction($id);
                $product_to_be_updated = Product::where('barcode', $dummy_item[$x]['barcode'])
                                                ->update(['itemInStock' => $newStockQty]);
                $this->destroy($dummy_item[$x]['id']);
                
                $check .= '- item return successfully </br>';
                return 1;
            } else {
                $check .= '- could not found the transaction in the database</br>' ;
                return 0;
            }
                 
        }


       // return  $check;
    }

    public function edit($id)
    {
        $temp_sales_detaile = Temp_sale::find($id);
        return $temp_sales_detaile;

    }

    public function update(Request $request,$id)
    {
        
        $item = Temp_sale::find($id);
        $item->unitPrice    =  $request->input('unitPrice');
        $item->qty          =  $request->input('qty');
        $item->total        =  $request->input('unitPrice') * $request->input('qty');
        $item->save();

        return $item;
    }

    public function destroy($id)
    {
        $item = Temp_sale::destroy($id);
        return $item;
    }

    public function deleteTransaction($id)
    {
        // deleting staff
        $transaction = Sale::where('transactionId', $id);
        $transaction->delete();

         // redirect
         return "\n - Transaction deleted successfully.";
    }

    public function bill()
    {
        $temp_sales_details = Temp_sale::all();
        return $temp_sales_details;
    }

    // receiptNo genratpr
    public function receiptNoGen($value='')
    {
        $lastReceiptNo = Sale::all()->last();
        $newReceiptNo = $lastReceiptNo['receiptNo'] + 1;
        
        return substr(sprintf("%'.010d", $newReceiptNo),-11);
    }

    // save the sales order

    public function save()
    {
       
        // 1- get all the dummy items & products
        $dummy_order = Temp_sale::all();
        $products = Product::all();

        // 2- generate the recipt No
        $receiptNo = $this->receiptNoGen();

        // loop through out all the records 
        for ($x = 0; $x < sizeof($dummy_order); $x++) {

            // search that item from the product table
            $product = Product::where('descripiton', $dummy_order[$x]['item'])->first();
            
            // 2. a) update each product stock quantity
            $new_itemInStock = $product['itemInStock'] - $dummy_order[$x]['qty'];
            $record = Product::where('id',$product['id'])->update(['itemInStock' => $new_itemInStock]);

            //    b) save each record using the same receiptNo , but diffrent transaction id
            $now = new \DateTime();
            Sale::create([
                'receiptNo'    =>  $receiptNo,
                'productId'    =>  $product['id'],
                'unitPrice'    =>  $dummy_order[$x]['unitPrice'],
                'total'        =>  $dummy_order[$x]['total'],
                'uom'          =>  $dummy_order[$x]['uom'],
                'qty'          =>  $dummy_order[$x]['qty'],
                'created_by'   =>  Auth::user()->username,
                'created_at'   =>  $now,
                'updated_by'   =>  NULL,
                'updated_at'   =>  NULL,
            ]);

        }

        // 4. trancate the dummy table
       Temp_sale::truncate();
       return 'Order Saved succesfully';
        // return $product;

    }

    // show transaction-History

    public function checkSales()
    { return View('checkSales'); }
    
    // get the sales info

    public function getSalesInfo($zReport)
    {
        $result;
        $record = Sale::where('zReport',$zReport)->get();

        $sum = 0;

        for ($x = 0; $x < sizeof($record) ; $x++) {
             $sum += $record[$x]['total'];
         }

        //$result['zReport']   = $zReport;
        $result['total']       = $sum;
        $result['created_by']  = $record[0]['created_by'];

        // find out the quantity
        if ($record[0]['uom'] == 'crt') {
            // Retrive the record
            $item = Product::where('id',$record[0]['productId'])->first();
            // Multiply
            $result['item']  = $record[0]['qty'] * $item->quantityPerUnit;

        } else {
            $result['item']  = $record[0]['qty'];
        }
        
        $result['updated_by']  = $record[0]['updated_by'];
        $result['updated_at']  = $record[0]['updated_at'];
        $result['zReport']  = $record[0]['zReport'];

        return $result;
    }

    // show transaction-History

    public function getTransactionHistory()
    {
        // get all sales order's receiptNo
        $sales = Sale::all();
        // assign the first purchaseNo in the list
        $receiptNoList[0] = $sales[0]['receiptNo'];

        // loop through all the purchaseNo and extract the indivduall purchase order
        for ($i=1; $i < sizeof($sales) ; $i++) { 
            // skip if the purchaseNo is duplicated
            if ($sales[$i]['receiptNo'] == $sales[$i-1]['receiptNo']) {
                continue;
            }
            // push the result in to the array
            array_push($receiptNoList,$sales[$i]['receiptNo']);
        }

        // so based on the receiptNo, get the details
        for ($i=0; $i < sizeof($receiptNoList) ; $i++) { 
            // push the result in to the array
            $List[$i] = $this->getReceiptInfo($receiptNoList[$i]);
        }

         //dd($List);

        // load the view and pass the vendor
        //return $List[0];
        return View('transactionHistory')
            ->with('List', $List);
    }

    public function salesReport(Request $request)
    {
        $itemCount = 0;
        $totalCount = 0;

        $this->validate($request, [
                 'from'    => 'required',          
                 'to'    => 'required',          
        ]);

        $from = strtotime($request->input('from'));
        $to = strtotime($request->input('to'));

        $sales = Sale::whereNotNull('zReport')
                     ->orderBy('zReport','asc')
                     ->whereBetween('updated_at', [date("Y-m-d h:i:s", $from), date("Y-m-d h:i:s", $to)])
                     ->get();

        // assign the first purchaseNo in the list
        $zReport[0] = $sales[0]['zReport'];

        // loop through all the purchaseNo and extract the indivduall purchase order
        for ($i=1; $i < sizeof($sales) ; $i++) { 
         // skip if the purchaseNo is duplicated
         if ($sales[$i]['zReport'] === $sales[$i-1]['zReport'] || $sales[$i]['zReport'] == NULL) {
             continue;
         }
         // push the result in to the array
         array_push($zReport,$sales[$i]['zReport']);
        }

        // so based on the zReport, get the details
        for ($i=0; $i < sizeof($zReport) ; $i++) { 
             // push the result in to the array
             $List[$i]    = $this->getSalesInfo($zReport[$i]);
             $itemCount  += $List[$i]['item'];
             $totalCount += $List[$i]['total'];
        }

        $count['itemCount'] = $itemCount;
        $count['totalCount'] = $totalCount;

        $report = new PdfController();

        $reportType = 'salesReport';
        $reportName = 'salesReport-' . date('d-m-Y');

        $report_info = $List;

        return $report->invoice($report_info,$reportName,$reportType,$count);
    }

    // get the receipt info

    public function getReceiptInfo($receiptNo)
    {
        $result;
        $record = Sale::where('receiptNo',$receiptNo)->get();

        $result['receiptNo']   = $receiptNo;
        $result['total']       = $this->calculateTotal($receiptNo);
        $result['created_at']  = $record[0]['created_at'];
        $result['created_by']  = $record[0]['created_by'];
        $result['updated_by']  = $record[0]['updated_by'];
        $result['zReport']  = $record[0]['zReport'];

        return $result;
    }

    public function calculateTotal($receiptNo)
    {
        
        $record = Sale::where('receiptNo',$receiptNo)->get();

        $sum = 0;

        for ($x = 0; $x < sizeof($record) ; $x++) {
             $sum += $record[$x]['total'];
         }

        return $sum ;

    }

    // print invoice
    public function printInvoice(Request $request,$receiptNo)
    {

       $report = new PdfController();

       $reportType = 'invoice';
       $reportName = 'invoice-' . date('d-m-Y');
       $total = 0;

       $record = Sale::where('receiptNo', $receiptNo)->get();

     //  $report_info = $this->getReceiptInfo($record) ;

       for ($i=0; $i < sizeof($record) ; $i++) { 

            $descripiton = Product::where('id',$record[$i]['productId'])->first();
           $record[$i]['productId'] = $descripiton['descripiton'];

           $total += $record[$i]['total'];
       }

       return $report->invoice($record,$reportName,$reportType,$total);
    }

    public function getZReport()
    {
        $users = User::all();

        return $users;
    }

    public function ZReport(Request $request)
    {
        // Retrive the selected username
        $username = $request->input('users');

        // get the ZReport Number
        $zReport = $this->zReportNoGen();

        // do the query
        $record = Sale::where('created_by',$username)
                        ->whereNull('zReport')
                        ->orWhere('zReport', '=', '')
                        ->get();
        // set the time
        $now = new \DateTime();
        // check if there is some records or not
        if ($record->isEmpty()) {
            
            $products = Product::all();
            // load the view and pass the vendor
            // return the homw view
            $products = Product::all();
            $temp_sales_details = Temp_sale::all();

            $dummy_total = 0;

            for ($x = 0; $x < sizeof($temp_sales_details) ; $x++) {
                  $dummy_total += $temp_sales_details[$x]['total'];
             }

            // Get Transaction History
            $transactionHistory = $this->getTransactionHistory();

           return redirect()->route('home')
                  ->with('products', $products)
                  ->with('transactionHistory',$transactionHistory)
                  ->with('dummyTotal', $dummy_total)
                  ->with('dump', $temp_sales_details)
                  ->with('info','No Transaction for this user yet!');
        }

       // dd($record);
                         
        // loop through all the record set
        for ($x = 0; $x < sizeof($record) ; $x++) {
           Sale::where('transactionId',$record[$x]['transactionId'])
                            ->update(['zReport' => $zReport,'updated_by'=>Auth::user()->username,'updated_at'=>$now]); 
        }

        //$this->reportGen($zReport);
        return $this->reportGen($zReport);
    }

    public function zReportNoGen()
    {

        // do the query
        $lastZReportNo = Sale::whereNotNull('zReport')
                        ->orWhere('zReport', '<>', '')
                        ->orderBy('zReport', 'desc')
                        ->get();

        $newZReportNo = $lastZReportNo[0]['zReport'] + 1;
        
        return substr(sprintf("%'.010d", $newZReportNo),-11);
    }

    public function reportGen($zReport)
    {
        $report = new PdfController();

        //$report->getData($record);

        $reportType = 'ZReport';
        $reportName = 'Z-report-' . date('d-m-Y');

        $record = Sale::where('zReport',$zReport)->get();

        $report_info = $this->getZReportInfo($record) ;
        //dd($report_info);

        return $report->invoice($report_info,$reportName,$reportType);
    }

    public function getZReportInfo($sales)
    {
        // assign the first purchaseNo in the list
        $receiptNoList[0] = $sales[0]['receiptNo'];

        // loop through all the purchaseNo and extract the indivduall purchase order
        for ($i=1; $i < sizeof($sales) ; $i++) { 
            // skip if the purchaseNo is duplicated
            if ($sales[$i]['receiptNo'] == $sales[$i-1]['receiptNo']) {
                continue;
            }
            // push the result in to the array
            array_push($receiptNoList,$sales[$i]['receiptNo']);
        }

        // so based on the receiptNo, get the details
        for ($i=0; $i < sizeof($receiptNoList) ; $i++) { 
            // push the result in to the array
            $List[$i] = $this->getReceiptInfo($receiptNoList[$i]);
        }

       // dd($List);

        $report_data['receiptCount'] = count($List);
        $report_data['transactionCount'] = count($sales);
        $report_data['created_by'] = $List[0]['created_by'];
        $report_data['updated_by'] = $List[0]['updated_by'];
        $report_data['zReport'] = $List[0]['zReport'];

        $sum = 0;
        for ($x = 0; $x < sizeof($List) ; $x++) {
             $sum += $List[$x]['total'];
         }

        $report_data['total'] = $sum;

        //dd($report_data);

        // load the view and pass the vendor
        return $report_data;
    }



}
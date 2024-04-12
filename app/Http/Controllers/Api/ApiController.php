<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\clients;
use App\Models\vendors;
use App\Models\fees;
use App\Models\PayableInvoice;
use App\Models\PurchaseOrder;
use App\Models\PurchaseOredrLine;
use App\Models\InvoiceCustomerName;

class ApiController extends Controller
{
   
    public function index() //Select all vendors
    {
      
            $vendor = vendors::all();
            if($vendor->count() > 0){
                
                return response()->json([
                    'status' => 200,
                    'vendor' => $vendor
                ], 200);
            }else{
    
                return response()->json([
                    'status' => 404,
                    'message' => 'No Records Found'
                ], 404);
            }
        
        //$users = vendors::all();
        //return response()->json($users);
    }
    public function ap_invoice() //Select all ap invoice
    {
      
        $ApInvoiceList = PayableInvoice::join('ap_fees as fees', function($join) {
            $join->on('ap_invoice.id', '=', 'fees.invoice_id')
                 ->where('fees.status', '=', 'unpaid');
        })
        ->select('ap_invoice.*', 'fees.id', 'fees.first_name', 'fees.last_name', 'ap_invoice.purchase_order_id', 'fees.amount', 'ap_invoice.date_created', 'ap_invoice.date_due', 'fees.status')
        ->get();
            if($ApInvoiceList->count() > 0){
                
                return response()->json([
                    'status' => 200,
                    'ApInvoiceList' => $ApInvoiceList
                ], 200);
            }else{
    
                return response()->json([
                    'status' => 404,
                    'message' => 'No Records Found'
                ], 404);
            }
        
        //$users = vendors::all();
        //return response()->json($users);
    }
    public function ap_purchase_order() //Select all ap PO
    {
      
        $ApPo = PurchaseOrder::all();
        
       /* $ApPo = PayableInvoice::join('ap_fees as fees', function($join) {
            $join->on('ap_invoice.id', '=', 'fees.invoice_id')
                 ->where('fees.status', '=', 'unpaid');
        })
        ->select('ap_invoice.*', 'fees.id', 'fees.first_name', 'fees.last_name', 'ap_invoice.purchase_order_id', 'fees.amount', 'ap_invoice.date_created', 'ap_invoice.date_due', 'fees.status')
        ->get();*/
            if($ApPo->count() > 0){
                
                return response()->json([
                    'status' => 200,
                    'ApPo' => $ApPo
                ], 200);
            }else{
    
                return response()->json([
                    'status' => 404,
                    'message' => 'No Records Found'
                ], 404);
            }
        
        //$users = vendors::all();
        //return response()->json($users);
    }

    public function ap_to_budget() 
{
    $curl = curl_init();
    $url = "https://fms3-swasfcrb.fguardians-fms.com/s-pull-approved";
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    curl_close($curl);
    $data = json_decode($response, true);
    if (!empty($data)) {
        foreach ($data as $item) {
            // Retrieve the record by its reference
            $existingItem = fees::where('reference', $item['reference'])->first();
            if ($existingItem) {
    
                $nestedComment = $item['comment'];
                $comment = $nestedComment['comment'];
                $existingItem->status = $item['status'];
                $existingItem->updated_at = $item['updated_at'];
                $existingItem->comment = $comment;
                // Save the changes
                $existingItem->save();
            } else {
                // If the record does not exist, create a new record
                RequestBudget::create([
                    'reference' => $item['reference'],
                    'status' => $item['status'],
                    'updated_at' => $item['updated_at'],
                    'comment' => $item['comment']['comment'] // Assuming 'comment' key exists directly
                ]);
            }

            // Send data to another endpoint or service
            $postData = [
                'reference' => $item['reference'],
                'status' => $item['status'],
                'updated_at' => $item['updated_at'],
                'comment' => $comment // Sending comment obtained earlier
                // Add other data fields if needed
            ];

            // Example of sending data using cURL POST request
            $curl = curl_init();
            curl_setopt_array($curl, [
                CURLOPT_URL => "https://example.com/endpoint", // Replace with your endpoint URL
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => json_encode($postData),
                CURLOPT_HTTPHEADER => [
                    'Content-Type: application/json',
                    // Add any other headers if required
                ],
            ]);
            $response = curl_exec($curl);
            curl_close($curl);

            // Process response if needed
        }
    }
}



    /*------------------AR <API-----------------------------------></API-----------------------------------*/
    public function ar_invoice() //Select all ar invoice
    {
      
        $ArInvoice = InvoiceCustomerName::select('id', 'customer_id', 'customer_name', 'po_number', 'date', 'due_date', 
        'amount', 'invoice_from', 'invoice_to', 'status')->get();

     
            if($ArInvoice->count() > 0){
                
                return response()->json([
                    'status' => 200,
                    'ArInvoice' => $ArInvoice
                ], 200);
            }else{
    
                return response()->json([
                    'status' => 404,
                    'message' => 'No Records Found'
                ], 404);
            }
        
        //$users = vendors::all();
        //return response()->json($users);
    }

}




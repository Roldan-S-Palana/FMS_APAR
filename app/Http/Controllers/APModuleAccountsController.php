<?php

namespace App\Http\Controllers;

use carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\fees;
use App\Models\PayableInvoice;
use App\Models\FeeStatus;
use App\Models\vendors;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;

class APModuleAccountsController extends Controller
{
    /** view fee list page */
    public function feeCollectionView()
    {
        //All AP Invoice Sum
        $aptotalAmount = fees::sum('amount');
        $aptotalRowsInvoice = fees::count();
        //All AP Invoice Sum complete
        $aptotalAmountComplete = fees::where('status', 'complete')->sum('amount');
        $aptotalRowsInvoiceComplete = fees::where('status', 'complete')->count();
        //All AP Invoice Sum unpaid
        $aptotalAmountUnpaid = fees::where('status', 'unpaid')->sum('amount');
        $aptotalRowsInvoiceUnpaid = fees::where('status', 'unpaid')->count();
        //All AP Invoice Sum cancelled
        $aptotalAmountCancelled = fees::where('status', 'cancelled')->sum('amount');
        $aptotalRowsInvoiceCancelled = fees::where('status', 'cancelled')->count();
        $feesList = fees::all();
        return view('apmoduleaccounts.feescollections', (compact(
            'feesList',
            'aptotalAmount',
            'aptotalRowsInvoice',
            'aptotalAmountComplete',
            'aptotalRowsInvoiceComplete',
            'aptotalAmountUnpaid',
            'aptotalRowsInvoiceUnpaid',
            'aptotalAmountCancelled',
            'aptotalRowsInvoiceCancelled',
        )));;
    }
     /** incoice overdue page*/
     public function ApInvoiceOverdue()
     {
 
         //All AP Invoice Sum
         $aptotalAmount = fees::sum('amount');
         $aptotalRowsInvoice = fees::count();
         //All AP Invoice Sum complete
         $aptotalAmountComplete = fees::where('status', 'complete')->sum('amount');
         $aptotalRowsInvoiceComplete = fees::where('status', 'complete')->count();
         //All AP Invoice Sum unpaid
         $aptotalAmountUnpaid = fees::where('status', 'unpaid')->sum('amount');
         $aptotalRowsInvoiceUnpaid = fees::where('status', 'unpaid')->count();
         //All AP Invoice Sum cancelled
         $aptotalAmountCancelled = fees::where('status', 'cancelled')->sum('amount');
         $aptotalRowsInvoiceCancelled = fees::where('status', 'cancelled')->count();
         $currentDate = Carbon::now();

         $currentDate = Carbon::now();

         $invoiceList = PayableInvoice::join('ap_fees as fees', function($join) {
             $join->on('ap_invoice.id', '=', 'fees.invoice_id')
                  ->where('fees.status', '=', 'unpaid');
         })
         ->select('ap_invoice.*', 'fees.id', 'fees.first_name', 'fees.last_name', 'ap_invoice.purchase_order_id', 'fees.amount', 'ap_invoice.date_created', 'ap_invoice.date_due')
         ->get()
         ->map(function ($value) use ($currentDate) {
             $dueDate = Carbon::parse($value->date_due);
             $daysOverdue = $currentDate->diffInDays($dueDate, false); // Calculate difference in days
             $value->days_overdue = $daysOverdue > 0 ? $daysOverdue : 0; // Set to 0 if not overdue
             return $value;
         });
         
         return view('apmoduleaccounts.tab.overdue_ap_invoices', compact('invoiceList',
         'aptotalAmount',
         'aptotalRowsInvoice',
         'aptotalAmountComplete',
         'aptotalRowsInvoiceComplete',
         'aptotalAmountUnpaid',
         'aptotalRowsInvoiceUnpaid',
         'aptotalAmountCancelled',
         'aptotalRowsInvoiceCancelled'));
         

 
        
     }


    /** view fee add and fetch invoice id*/


    public function showInvoices()
    {
        $invoices = PayableInvoice::all();
        $vendors = vendors::all();

        $status = FeeStatus::all();
        return view('apmoduleaccounts.fee-add', compact('invoices', 'status', 'vendors'));
    }

    //save fee
    public function feeSave(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'invoice_id' => 'required',
            'vendor_id' => 'required',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'gender'  => 'required',
            'fee_type' => 'required|string',
            'amount'  => 'required',
            'update_date' => 'required|date',
            'status'   => 'required|string',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {


            $feeSave = new fees;
            $feeSave->invoice_id   = $request->invoice_id;
            $feeSave->vendor_id   = $request->vendor_id;
            $feeSave->first_name   = $request->first_name;
            $feeSave->last_name    = $request->last_name;
            $feeSave->gender       = $request->gender;
            $feeSave->fee_type        = $request->fee_type;
            $feeSave->amount = $request->amount;
            $feeSave->update_date = $request->update_date;
            $feeSave->status         = $request->status;
            $feeSave->save();

            Toastr::success('Fees has been added successfully :)', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            $errorMessage = $e->getMessage();
            return response()->json(['error' => $errorMessage], 500);
            // return redirect()->back();
        }
    }
}

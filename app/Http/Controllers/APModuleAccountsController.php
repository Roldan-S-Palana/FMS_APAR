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

         $invoiceList = fees::join('ap_fees', 'ap_invoice.id', '=', 'icn.po_number')
         ->select('ap_invoice.*', 'ap_fees.id', 'ap_fees.first_name', 'ap_fees.last_name', 'ap_fees.amount', 'ap_invoice.due_created', 'ap_invoice.date_due')
         ->get();

 
         return view('apmoduleaccounts.tab.overdue_ap_invoices', (compact(
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

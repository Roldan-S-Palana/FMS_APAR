<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Carbon;
use App\Models\User;
use App\Models\InvoiceDetails;
use App\Models\InvoiceDiscount;
use App\Models\InvoiceTotalAmount;
use App\Models\InvoiceCustomerName;
use App\Models\InvoicePaymentDetails;
use App\Models\InvoiceAdditionalCharges;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\clients;

class ARModuleInvoiceController extends Controller
{
    /** index page */
    public function invoiceList()
    {
        //All AR Invoice Sum
        $artotalAmount = InvoiceCustomerName::sum('amount');
        $artotalRowsInvoice = InvoiceCustomerName::count();
        //All AR Invoice Sum complete
        $artotalAmountComplete = InvoiceCustomerName::where('status', 'complete')->sum('amount');
        $artotalRowsInvoiceComplete = InvoiceCustomerName::where('status', 'complete')->count();
        //All AR Invoice Sum unpaid
        $artotalAmountUnpaid = InvoiceCustomerName::where('status', 'unpaid')->sum('amount');
        $artotalRowsInvoiceUnpaid = InvoiceCustomerName::where('status', 'unpaid')->count();
        //All AR Invoice Sum cancelled
        $artotalAmountCancelled = InvoiceCustomerName::where('status', 'cancelled')->sum('amount');
        $artotalRowsInvoiceCancelled = InvoiceCustomerName::where('status', 'cancelled')->count();

        $invoiceList = InvoiceDetails::join('ar_invoice_customer_names as icn', 'ar_invoice_details.id', '=', 'icn.po_number')
            ->select('ar_invoice_details.*', 'icn.id', 'icn.customer_id', 'icn.customer_name', 'icn.po_number', 'icn.due_date', 'icn.status', 'ar_invoice_details.amount')
            ->get();

           

        return view('armoduleinvoices.list_invoices', compact(
            'invoiceList',
            'cutomer_name',
            'artotalAmount',
            'artotalRowsInvoice',
            'artotalAmountComplete',
            'artotalRowsInvoiceComplete',
            'artotalAmountUnpaid',
            'artotalRowsInvoiceUnpaid',
            'artotalAmountCancelled',
            'artotalRowsInvoiceCancelled'
        ));
    }


    /** invoice paid page */
    public function invoicePaid()
    {
        return view('armoduleinvoices.tab.paid_invoices');
    }

    /** incoice overdue page*/
    public function invoiceOverdue()
    {

        //All AR Invoice Sum
        $artotalAmount = InvoiceCustomerName::sum('amount');
        $artotalRowsInvoice = InvoiceCustomerName::count();
        //All AR Invoice Sum complete
        $artotalAmountComplete = InvoiceCustomerName::where('status', 'complete')->sum('amount');
        $artotalRowsInvoiceComplete = InvoiceCustomerName::where('status', 'complete')->count();
        //All AR Invoice Sum unpaid
        $artotalAmountUnpaid = InvoiceCustomerName::where('status', 'unpaid')->sum('amount');
        $artotalRowsInvoiceUnpaid = InvoiceCustomerName::where('status', 'unpaid')->count();
        //All AR Invoice Sum cancelled
        $artotalAmountCancelled = InvoiceCustomerName::where('status', 'cancelled')->sum('amount');
        $artotalRowsInvoiceCancelled = InvoiceCustomerName::where('status', 'cancelled')->count();

        $currentDate = Carbon::now();
        $ArListOverdue = InvoiceCustomerName::where('status', 'unpaid')
            ->get()
            ->map(function ($value) use ($currentDate) {
                $dueDate = Carbon::parse($value->due_date);
                $daysOverdue = $currentDate->diffInDays($dueDate, false); // Calculate difference in days
                $value->days_overdue = $daysOverdue > 0 ? $daysOverdue : 0; // Set to 0 if not overdue
                return $value;
            });


        return view('armoduleinvoices.tab.overdue_invoices', compact(
            'ArListOverdue',
            'artotalAmount',
            'artotalRowsInvoice',
            'artotalAmountComplete',
            'artotalRowsInvoiceComplete',
            'artotalAmountUnpaid',
            'artotalRowsInvoiceUnpaid',
            'artotalAmountCancelled',
            'artotalRowsInvoiceCancelled'
        ));
    }

    /** invoice draft */
    public function invoiceDraft()
    {
        return view('armoduleinvoices.tab.draft_invoices');
    }

    /** recurring apmoduleinvoices.blade */
    public function invoiceRecurring()
    {
        return view('armoduleinvoices.tab.recurring_invoices');
    }

    /** invoice cancelled */
    public function invoiceCancelled()
    {
        return view('armoduleinvoices.tab.cancelled_invoices');
    }

    /** invoice grid */
    public function invoiceGrid()
    {
        return view('armoduleinvoices.grid_invoice');
    }

    /** invoice add page */
    public function invoiceAdd()
    {
        $cutomer_name = clients::all();
        $po_number = InvoiceDetails::all();

        $users = User::whereIn('role_name', ['Client'])->get();
        return view('armoduleinvoices.invoice_add', compact('cutomer_name','po_number'));
    }

    /** save record incoice */
    public function saveRecord(Request $request)
    {
        // $request->validate([
        //     'first_name'    => 'required|string',
        //     'last_name'     => 'required|string',
        // ]);

        DB::beginTransaction();
        try {

            $customerName                    = new InvoiceCustomerName;
            $customerName->customer_name     = $request->customer_name;
            $customerName->po_number         = $request->po_number;
            $customerName->date              = $request->date;
            $customerName->due_date          = $request->due_date;
            $customerName->enable_tax        = $request->enable_tax;
            $customerName->recurring_incoice = $request->recurring_incoice;
            $customerName->by_month          = $request->by_month;
            $customerName->month             = $request->month;
            $customerName->invoice_from      = $request->invoice_from;
            $customerName->invoice_to        = $request->invoice_to;
            $customerName->save();

            /** invoice id last record */
            $invoiceId = InvoiceCustomerName::select('id')->orderBy('id', 'DESC')->first();

            foreach ($request->items as $key => $values) {
                $InvoiceDetails             = new InvoiceDetails;
                $InvoiceDetails->invoice_id = $invoiceId->invoice_id;
                $InvoiceDetails->items      = $request->items[$key];
                $InvoiceDetails->category   = $request->category[$key];
                $InvoiceDetails->quantity   = $request->quantity[$key];
                $InvoiceDetails->price      = $request->price[$key];
                $InvoiceDetails->amount     = $request->amount[$key];
                $InvoiceDetails->discount   = $request->discount[$key];
                $InvoiceDetails->save();
            }

            if ($request->hasFile('upload_sign')) {
                $file        = $request->file('upload_sign');
                $upload_sign = $file->store('upload_sign', 'local'); // 'local' disk corresponds to the storage/app directory    
            } else {
                $upload_sign = 'NULL';
            }

            /** InvoiceTotalAmount */
            $InvoiceTotalAmount                          = new InvoiceTotalAmount;
            $InvoiceTotalAmount->invoice_id              = $invoiceId->invoice_id;
            $InvoiceTotalAmount->taxable_amount          = $request->taxable_amount;
            $InvoiceTotalAmount->round_off               = $request->round_off;
            $InvoiceTotalAmount->total_amount            = $request->total_amount;
            $InvoiceTotalAmount->upload_sign             = $upload_sign;
            $InvoiceTotalAmount->name_of_the_signatuaory = $request->name_of_the_signatuaory;
            $InvoiceTotalAmount->save();

            /** InvoiceAdditionalCharges */
            if (!empty($request->service_charge)) {
                foreach ($request->service_charge as $key => $values) {
                    $InvoiceAdditionalCharges                 = new InvoiceAdditionalCharges;
                    $InvoiceAdditionalCharges->invoice_id     = $invoiceId->invoice_id;
                    $InvoiceAdditionalCharges->service_charge = $request->service_charge[$key];
                    $InvoiceAdditionalCharges->save();
                }
            }
            /** InvoiceDiscount */
            if (!empty($request->offer_new)) {
                foreach ($request->offer_new as $key => $values) {
                    $InvoiceDiscount             = new InvoiceDiscount;
                    $InvoiceDiscount->invoice_id = $invoiceId->invoice_id;
                    $InvoiceDiscount->offer_new  = $request->offer_new[$key];
                    $InvoiceDiscount->save();
                }
            }

            /** InvoicePaymentDetails */
            $InvoicePaymentDetails                            = new InvoicePaymentDetails;
            $InvoicePaymentDetails->invoice_id                = $invoiceId->invoice_id;
            $InvoicePaymentDetails->account_holder_name       = $request->account_holder_name;
            $InvoicePaymentDetails->bank_name                 = $request->bank_name;
            $InvoicePaymentDetails->ifsc_code                 = $request->ifsc_code;
            $InvoicePaymentDetails->account_number            = $request->account_number;
            $InvoicePaymentDetails->add_terms_and_Conditions  = $request->add_terms_and_Conditions;
            $InvoicePaymentDetails->add_notes                 = $request->add_notes;
            $InvoicePaymentDetails->save();

            Toastr::success('Has been add successfully :)', 'Success');
            DB::commit();
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            $errorMessage = $e->getMessage();
            return response()->json(['error' => $errorMessage], 500);
            // \Log::info($e);
            // Toastr::error('fail, Add new invoice  :)', 'Error');
            // return redirect()->back();
        }
    }

    /** invoice edit */
    public function invoiceEdit($id)
    {
        $invoiceEdit = InvoiceCustomerName::where('id', $id)->first();
        $users = User::whereIn('role_name', ['Client'])->get();

        return view('armoduleinvoices.invoice_edit', compact('users'));
    }

    /** invoice view */
    public function invoiceView()
    {
        return view('armoduleinvoices.ar_invoice_view');
    }

    /** invoice settings */
    public function invoiceSettings()
    {
        return view('armoduleinvoices.settings.settings_invoices');
    }

    /** invoice settingst tax */
    public function invoiceSettingsTax()
    {
        return view('armoduleinvoices.settings.settings_tax');
    }

    /** invoice settings bank */
    public function invoiceSettingsBank()
    {
        return view('armoduleinvoices.settings.settings_bank');
    }

    public function fetchInvoiceData()
    {
        // Fetch data from each model
        $invoiceDetails = InvoiceDetails::all();
        $invoiceDiscount = InvoiceDiscount::all();
        $invoiceTotalAmount = InvoiceTotalAmount::all();
        $invoiceCustomerName = InvoiceCustomerName::all();
        $invoicePaymentDetails = InvoicePaymentDetails::all();
        $invoiceAdditionalCharges = InvoiceAdditionalCharges::all();

        // Assemble data into an array
        $invoiceData = [
            'details' => $invoiceDetails,
            'discount' => $invoiceDiscount,
            'total_amount' => $invoiceTotalAmount,
            'customer_name' => $invoiceCustomerName,
            'payment_details' => $invoicePaymentDetails,
            'additional_charges' => $invoiceAdditionalCharges,
        ];

        // Convert data to JSON
        $jsonData = json_encode($invoiceData);

        // Return JSON response
        return response()->json($jsonData);
    }
}

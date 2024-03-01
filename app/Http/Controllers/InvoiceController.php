<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;
use App\Models\InvoiceDetails;
use App\Models\InvoiceDiscount;
use App\Models\InvoiceTotalAmount;
use App\Models\InvoiceCustomerName;
use App\Models\InvoicePaymentDetails;
use App\Models\InvoiceAdditionalCharges;
use Brian2694\Toastr\Facades\Toastr;

class InvoiceController extends Controller
{
    /** index page */
    public function invoiceList()
    {
    // $invoiceList = InvoiceDetails::join('fgms_g7_invoice_customer_names as icn', 'fgms_g7_invoice_details.invoice_id', 'icn.invoice_id')
      //      ->join('fgms_g7_invoice_total_amounts as ita', 'fgms_g7_invoice_details.invoice_id', 'ita.invoice_id') // Add this line for the additional join
        //    ->select('fgms_g7_invoice_details.*', 'icn.customer_name', 'ita.total_amount')
          //  ->distinct('fgms_g7_invoice_details.invoice_id')
            //->get();
        $invoiceList = InvoiceDetails::join('invoice_customer_names as icn', 'invoice_details.invoice_id', 'icn.invoice_id')
            ->join('invoice_total_amounts as ita', 'invoice_details.invoice_id', 'ita.invoice_id') // Add this line for the additional join
            ->select('invoice_details.*', 'icn.customer_name', 'ita.total_amount')
            ->distinct('invoice_details.invoice_id')
            ->get();
        return view('invoices.list_invoices', compact('invoiceList'));
    }

    /** invoice paid page */
    public function invoicePaid()
    {
        return view('invoices.tab.paid_invoices');
    }

    /** incoice overdue page*/
    public function invoiceOverdue()
    {
        return view('invoices.tab.overdue_invoices');
    }

    /** invoice draft */
    public function invoiceDraft()
    {
        return view('invoices.tab.draft_invoices');
    }

    /** recurring invoices.blade */
    public function invoiceRecurring()
    {
        return view('invoices.tab.recurring_invoices');
    }

    /** invoice cancelled */
    public function invoiceCancelled()
    {
        return view('invoices.tab.cancelled_invoices');
    }

    /** invoice grid */
    public function invoiceGrid()
    {
        return view('invoices.grid_invoice');
    }

    /** invoice add page */
    public function invoiceAdd()
    {
        $users = User::whereIn('role_name', ['Client'])->get();
        return view('invoices.invoice_add', compact('users'));
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
            $invoiceId = InvoiceCustomerName::select('invoice_id')->orderBy('id', 'DESC')->first();

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
            \Log::info($e);
            Toastr::error('fail, Add new student  :)', 'Error');
            return redirect()->back();
        }
    }

    /** invoice edit */
    public function invoiceEdit($id)
    {
        $users = User::whereIn('role_name', ['Client'])->get();
        $invoiceEdit = InvoiceCustomerName::where('id', $id)->first();

        return view('invoices.invoice_edit', compact('users'));
    }

    /** invoice view */
    public function invoiceView()
    {
        return view('invoices.invoice_view');
    }

    /** invoice settings */
    public function invoiceSettings()
    {
        return view('invoices.settings.settings_invoices');
    }

    /** invoice settingst tax */
    public function invoiceSettingsTax()
    {
        return view('invoices.settings.settings_tax');
    }

    /** invoice settings bank */
    public function invoiceSettingsBank()
    {
        return view('invoices.settings.settings_bank');
    }
}

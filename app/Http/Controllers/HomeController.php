<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\clients;
use App\Models\InvoiceDetails;
use App\Models\InvoiceCustomerName;
use App\Models\fees;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    /** home dashboard */
    public function index()
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


        /*---------------------------------------------------------------------------------------------------------*/
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



        $this->middleware('CheckRole:Admin');
        //$clientList = clients::all();
        $clientList = InvoiceDetails::join('ar_invoice_customer_names as icn', 'ar_invoice_details.id', '=', 'icn.po_number')
            ->select('icn.customer_id', 'icn.customer_name', 'icn.po_number', 'ar_invoice_details.items', 'ar_invoice_details.quantity', 'ar_invoice_details.amount')
            ->get();

        return view('dashboard.home', compact(
            'clientList',
            'aptotalAmount',
            'aptotalRowsInvoice',
            'artotalAmount',
            'artotalRowsInvoice',
            'aptotalAmountComplete',
            'aptotalRowsInvoiceComplete',
            'artotalAmountComplete',
            'artotalRowsInvoiceComplete',
            'aptotalAmountUnpaid',
            'aptotalRowsInvoiceUnpaid',
            'artotalAmountUnpaid',
            'artotalRowsInvoiceUnpaid',
            'aptotalAmountCancelled',
            'aptotalRowsInvoiceCancelled',
            'artotalAmountCancelled',
            'artotalRowsInvoiceCancelled'
        ));
    }

    /** profile user */
    public function userProfile()
    {
        $clientList = clients::all();

        return view('dashboard.profile', compact('clientList'));
    }

    /** vendor dashboard */
    public function vendorDashboardIndex()
    {
        $this->middleware('CheckRole:Vendor');
        $clientList = clients::all();

        return view('dashboard.vendor_dashboard', compact('clientList'));
    }

    /** client dashboard */
    public function clientDashboardIndex()
    {
        $this->middleware('CheckRole:Client');
        $clientList = clients::all();

        return view('dashboard.client_dashboard', compact('clientList'));
    }

    /** ar dashboard */

    public function arDashboardIndex()
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

        $this->middleware('CheckRole:Staff');
        $clientList = clients::all();

        return view('dashboard.ar', compact(
            'clientList',
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
    /** ap dashboard */

    public function apDashboardIndex()
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


        $this->middleware('CheckRole:Staff');
        $clientList = clients::all();

        return view('dashboard.ap', compact(
            'clientList',
            'aptotalAmount',
            'aptotalRowsInvoice',
            'aptotalAmountComplete',
            'aptotalRowsInvoiceComplete',
            'aptotalAmountUnpaid',
            'aptotalRowsInvoiceUnpaid',
            'aptotalAmountCancelled',
            'aptotalRowsInvoiceCancelled',
        ));
    }
}

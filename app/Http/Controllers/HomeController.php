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

         //All AR Invoice Sum
         $artotalAmount = InvoiceCustomerName::sum('amount');
         $artotalRowsInvoice = fees::count();

        $this->middleware('CheckRole:Admin');
        //$clientList = clients::all();
        $clientList = InvoiceDetails::join('ar_invoice_customer_names as icn', 'ar_invoice_details.id', '=', 'icn.po_number')
            ->select( 'icn.customer_id','icn.customer_name', 'icn.po_number', 'ar_invoice_details.items','ar_invoice_details.quantity', 'ar_invoice_details.amount')
            ->get();

        return view('dashboard.home', compact('clientList','aptotalAmount', 'aptotalRowsInvoice','artotalAmount','artotalRowsInvoice'));
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

        $this->middleware('CheckRole:Staff');
        $clientList = clients::all();

        return view('dashboard.ar', compact('clientList'));
    }
    /** ap dashboard */

    public function apDashboardIndex()
    {
        $this->middleware('CheckRole:Staff');
        $clientList = clients::all();

        return view('dashboard.ap', compact('clientList'));
    }
}

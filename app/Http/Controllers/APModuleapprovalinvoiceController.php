<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InvoiceApproval;


class APModuleapprovalinvoiceController extends Controller
{
    public function approvalView()
    {
        $invoices = InvoiceApproval::where('status', 'awaiting_approval')->get();
        return view('accounts.invoiceapproval', ['invoices' => $invoices]);
    }
    public function approvalGrid()
    {
        return view('accounts.grid_approval');
    }
    public function approvalList()
    {
        return view('accounts.list_approval');
    }

    public function approvalSave()
    {
        $invoices = InvoiceApproval::where('status', 'awaiting_approval')->get();
        return view('accounts.invoiceapproval', ['invoices' => $invoices]);
    }
}

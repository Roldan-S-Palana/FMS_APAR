@extends('layouts.master')
@section('content')
    {{-- message --}}
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Invoices</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Invoices</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col"></div>
                    <div class="col-auto">
                        <a href="{{ route('armoduleinvoice/list/page') }}" class="invoices-links active">
                            <i class="fa fa-list" aria-hidden="true"></i>
                        </a>
                        <a href="{{ route('armoduleinvoice/grid/page') }}" class="invoices-links">
                            <i class="fa fa-th" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="card report-card">
                <div class="card-body pb-0">
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="app-listing">
                                <li>
                                    <div class="multipleSelection">
                                        <div class="selectBox">
                                            <p class="mb-0"><i class="fas fa-user-plus me-1 select-icon"></i> Select
                                                User</p>
                                            <span class="down-icon"><i class="fas fa-chevron-down"></i></span>
                                        </div>
                                        <div id="checkBoxes">
                                            <form action="#">
                                                <p class="checkbox-title">Customer Search</p>
                                                <div class="form-custom">
                                                    <input type="text" class="form-control bg-grey"
                                                        placeholder="Enter Customer Name">
                                                </div>
                                                <div class="selectBox-cont">
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="username">
                                                        <span class="checkmark"></span> Brian Johnson
                                                    </label>
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="username">
                                                        <span class="checkmark"></span> Russell Copeland
                                                    </label>
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="username">
                                                        <span class="checkmark"></span> Greg Lynch
                                                    </label>
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="username">
                                                        <span class="checkmark"></span> John Blair
                                                    </label>
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="username">
                                                        <span class="checkmark"></span> Barbara Moore
                                                    </label>
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="username">
                                                        <span class="checkmark"></span> Hendry Evan
                                                    </label>
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="username">
                                                        <span class="checkmark"></span> Richard Miles
                                                    </label>
                                                </div>
                                                <button type="submit" class="btn w-100 btn-primary">Apply</button>
                                                <button type="reset" class="btn w-100 btn-grey">Reset</button>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="multipleSelection">
                                        <div class="selectBox">
                                            <p class="mb-0"><i class="fas fa-calendar me-1 select-icon"></i> Select
                                                Date</p>
                                            <span class="down-icon"><i class="fas fa-chevron-down"></i></span>
                                        </div>
                                        <div id="checkBoxes">
                                            <form action="#">
                                                <p class="checkbox-title">Date Filter</p>
                                                <div class="selectBox-cont selectBox-cont-one h-auto">
                                                    <div class="date-picker">
                                                        <div class="form-custom cal-icon">
                                                            <input class="form-control datetimepicker" type="text"
                                                                placeholder="Form">
                                                        </div>
                                                    </div>
                                                    <div class="date-picker pe-0">
                                                        <div class="form-custom cal-icon">
                                                            <input class="form-control datetimepicker" type="text"
                                                                placeholder="To">
                                                        </div>
                                                    </div>
                                                    <div class="date-list">
                                                        <ul>
                                                            <li><a href="#" class="btn date-btn">Today</a></li>
                                                            <li><a href="#" class="btn date-btn">Yesterday</a></li>
                                                            <li><a href="#" class="btn date-btn">Last 7 days</a>
                                                            </li>
                                                            <li><a href="#" class="btn date-btn">This month</a></li>
                                                            <li><a href="#" class="btn date-btn">Last month</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="multipleSelection">
                                        <div class="selectBox">
                                            <p class="mb-0"><i class="fas fa-book-open me-1 select-icon"></i> Select
                                                Status</p>
                                            <span class="down-icon"><i class="fas fa-chevron-down"></i></span>
                                        </div>
                                        <div id="checkBoxes">
                                            <form action="#">
                                                <p class="checkbox-title">By Status</p>
                                                <div class="selectBox-cont">
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="name" checked>
                                                        <span class="checkmark"></span> All Invoices
                                                    </label>
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="name">
                                                        <span class="checkmark"></span> Paid
                                                    </label>
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="name">
                                                        <span class="checkmark"></span> Overdue
                                                    </label>
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="name">
                                                        <span class="checkmark"></span> Draft
                                                    </label>
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="name">
                                                        <span class="checkmark"></span> Recurring
                                                    </label>
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="name">
                                                        <span class="checkmark"></span> Cancelled
                                                    </label>
                                                </div>
                                                <button type="submit" class="btn w-100 btn-primary">Apply</button>
                                                <button type="reset" class="btn w-100 btn-grey">Reset</button>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="multipleSelection">
                                        <div class="selectBox">
                                            <p class="mb-0"><i class="fas fa-bookmark me-1 select-icon"></i> By
                                                Category</p>
                                            <span class="down-icon"><i class="fas fa-chevron-down"></i></span>
                                        </div>
                                        <div id="checkBoxes">
                                            <form action="#">
                                                <p class="checkbox-title">Category</p>
                                                <div class="form-custom">
                                                    <input type="text" class="form-control bg-grey"
                                                        placeholder="Enter Category Name">
                                                </div>
                                                <div class="selectBox-cont">
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="category">
                                                        <span class="checkmark"></span> Advertising
                                                    </label>
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="category">
                                                        <span class="checkmark"></span> Food
                                                    </label>
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="category">
                                                        <span class="checkmark"></span> Marketing
                                                    </label>
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="category">
                                                        <span class="checkmark"></span> Repairs
                                                    </label>
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="category">
                                                        <span class="checkmark"></span> Software
                                                    </label>
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="category">
                                                        <span class="checkmark"></span> Stationary
                                                    </label>
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="category">
                                                        <span class="checkmark"></span> Travel
                                                    </label>
                                                </div>
                                                <button type="submit" class="btn w-100 btn-primary">Apply</button>
                                                <button type="reset" class="btn w   -100 btn-grey">Reset</button>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="report-btn">

                                        <a href="#" data-bs-toggle="modal" data-bs-target="#report_preview" class="btn">
                                            <img src="assets/img/icons/invoices-icon5.png" alt="">
                                            Generate report
                                        </a>
                                    </div>
                                    <div class="modal custom-modal fade invoices-preview" id="report_preview" role="dialog">
                                        <div class="modal-dialog modal-dialog-centered modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <div class="row justify-content-center">
                                                        <div class="col-lg-12">
                                                            <div class="card invoice-info-card">
                                                                <div class="card-body pb-0">
                                                                    <div class="invoice-item invoice-item-one">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="invoice-logo">
                                                                                    <img src="{{ URL::to('assets/img/logo.png') }}" alt="logo">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="invoice-info">
                                                                                    <div class="invoice-head">
                                                                                        <h2 class="text-primary">Accounts Receivables</h2>
                                                                                        <p>Report</p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                
                                                                        
                                                                        <div class="row">
                                                                            <div class="col-xl-3 col-sm-6 col-12">
                                                                                <div class="card inovices-card">
                                                                                    <div class="card-body">
                                                                                        <div class="inovices-widget-header">
                                                                                            <span class="inovices-widget-icon">
                                                                                                <img src="{{ URL::to('assets/img/icons/invoices-icon1.svg') }}" alt="">
                                                                                            </span>
                                                                                            <div class="inovices-dash-count">
                                                                                                <div class="inovices-amount">₱ {{ $artotalAmount }}</div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <p class="inovices-all">All AR Invoices <span>{{ $artotalRowsInvoice }}</span></p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xl-3 col-sm-6 col-12">
                                                                                <div class="card inovices-card">
                                                                                    <div class="card-body">
                                                                                            <div class="inovices-widget-header">
                                                                                                <span class="inovices-widget-icon">
                                                                                                    <img src="{{ URL::to('assets/img/icons/invoices-icon2.svg') }}" alt="">
                                                                                                </span>
                                                                                                <div class="inovices-dash-count">
                                                                                                    <div class="inovices-amount">₱ {{ $artotalAmountComplete }}</div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <p class="inovices-all">All AR Paid Invoices
                                                                                                <span>{{ $artotalRowsInvoiceComplete }}</span>
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-xl-3 col-sm-6 col-12">
                                                                                    <div class="card inovices-card">
                                                                                        <div class="card-body">
                                                                                            <div class="inovices-widget-header">
                                                                                                <span class="inovices-widget-icon">
                                                                                                    <img src="{{ URL::to('assets/img/icons/invoices-icon3.svg') }}" alt="">
                                                                                                </span>
                                                                                                <div class="inovices-dash-count">
                                                                                                    <div class="inovices-amount">₱ {{ $artotalAmountUnpaid }}</div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <p class="inovices-all">All AR Unpaid Invoices
                                                                                                <span>{{ $artotalRowsInvoiceUnpaid }}</span>
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-xl-3 col-sm-6 col-12">
                                                                                    <div class="card inovices-card">
                                                                                        <div class="card-body">
                                                                                            <div class="inovices-widget-header">
                                                                                                <span class="inovices-widget-icon">
                                                                                                    <img src="{{ URL::to('assets/img/icons/invoices-icon4.svg') }}" alt="">
                                                                                                </span>
                                                                                                <div class="inovices-dash-count">
                                                                                                    <div class="inovices-amount">₱ {{ $artotalAmountCancelled }}</div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <p class="inovices-all">All AR Cancelled Invoices
                                                                                                <span>{{ $artotalRowsInvoiceCancelled }}</span>
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                
                                
                                                                    <div class="invoice-item invoice-table-wrap">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="table-responsive">
                                                                                    <table class="invoice-table table table-center mb-0">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th>Invoice ID</th>
                                                                                                <th>Customer Id</th>
                                                                                                <th>Customer Name</th>
                                                                                                <th>PO no.</th>
                                                                                                <th>Amount</th>
                                                                                                <th>Due date</th>
                                                                                                <th>Status</th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            @foreach($invoiceList as  $value)
                                                                                            <tr>
                                                                                                <td>
                                                                                                    
                                                                                                    {{ $value->id }}
                                                                                                </td>
                                                                                                <td>{{ $value->customer_id }}</td>
                                                                                                <td>{{ $value->customer_name }}</td>
                                                                                                <td>{{ $value->po_number }}</td>
                                                                                                <td>
                                                                                                    {{ $value->amount }}
                                                                                                 </td>
                                                                                                <td>
                                                                                                   {{ $value->due_date }}
                                                                                                </td>
                                                                                                <td class="">{{ $value->status }}</td>
                                                                                                
                                                                                            </tr>
                                                                                            @endforeach
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                
                                                                    <!--<div class="row align-items-center justify-content-center">
                                                                        <div class="col-lg-6 col-md-6">
                                                                            <div class="invoice-payment-box">
                                                                                <h4>Payment Details</h4>
                                                                                <div class="payment-details">
                                                                                    <p>Debit Card XXXXXXXXXXXX-2541 HDFC Bank</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 col-md-6">
                                                                            <div class="invoice-total-card">
                                                                                <div class="invoice-total-box">
                                                                                    <div class="invoice-total-inner">
                                                                                        <p>Taxable <span>₱6,660.00</span></p>
                                                                                        <p>Additional Charges <span>₱6,660.00</span></p>
                                                                                        <p>Discount <span>₱3,300.00</span></p>
                                                                                        <p class="mb-0">Sub total <span>₱3,300.00</span></p>
                                                                                    </div>
                                                                                    <div class="invoice-total-footer">
                                                                                        <h4>Total Amount <span>₱143,300.00</span></h4>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>-->
                                                                    <!--<div class="invoice-sign-box">
                                                                        <div class="row">
                                                                            <div class="col-lg-8 col-md-8">
                                                                                <div class="invoice-terms">
                                                                                    <h6>Notes:</h6>
                                                                                    <p class="mb-0">Enter customer notes or any other details</p>
                                                                                </div>
                                                                                <div class="invoice-terms mb-0">
                                                                                    <h6>Terms and Conditions:</h6>
                                                                                    <p class="mb-0">Enter customer notes or any other details</p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-4 col-md-4">
                                                                                <div class="invoice-sign text-end">
                                                                                    <img class="img-fluid d-inline-block"
                                                                                        src="{{ URL::to('assets/img/signature.png') }}" alt="sign">
                                                                                    <span class="d-block">{{ Session::get('name') }}</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>-->
                                                                    <div class="col align-self-end">
                                                                        <div class="invoice-sign text-end align-self-end">
                                                                            <img class="img-fluid d-inline-block align-self-end"
                                                                                src="{{ URL::to('assets/img/signature.png') }}" alt="sign">
                                                                            <span class="d-block">{{ Session::get('name') }}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card invoices-tabs-card border-0">
                <div class="card-body card-body pt-0 pb-0">
                    <div class="invoices-main-tabs">
                        <div class="row align-items-center">
                            <div class="col-lg-8 col-md-8">
                                <div class="invoices-tabs">
                                    <ul>
                                        <li><a class="active" href="{{ route('armoduleinvoice/list/page') }}">All Invoice</a></li>
                                        <li><a href="{{ route('armoduleinvoice/paid/page') }}">Paid</a></li>
                                        <li><a href="{{ route('armoduleinvoice/overdue/page') }}">Overdue</a></li>
                                        <li><a href="{{ route('armoduleinvoice/draft/page') }}">Draft</a></li>
                                        <li><a href="{{ route('armoduleinvoice/recurring/page') }}">Recurring</a></li>
                                        <li><a href="{{ route('armoduleinvoice/cancelled/page') }}">Cancelled</a></li>
                                    </ul>
                                </div> 
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="invoices-settings-btn">
                                    <a href="invoices-settings.html" class="invoices-settings-icon">
                                        <i class="feather feather-settings"></i>
                                    </a>
                                    <a href="{{ route('armoduleinvoice/add/page') }}" class="btn">
                                        <i class="feather feather-plus-circle"></i> New Invoice
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card inovices-card">
                        <div class="card-body">
                            <div class="inovices-widget-header">
                                <span class="inovices-widget-icon">
                                    <img src="{{ URL::to('assets/img/icons/invoices-icon1.svg') }}" alt="">
                                </span>
                                <div class="inovices-dash-count">
                                    <div class="inovices-amount">₱ {{ $artotalAmount }}</div>
                                </div>
                            </div>
                            <p class="inovices-all">All AR Invoices <span>{{ $artotalRowsInvoice }}</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card inovices-card">
                        <div class="card-body">
                                <div class="inovices-widget-header">
                                    <span class="inovices-widget-icon">
                                        <img src="{{ URL::to('assets/img/icons/invoices-icon2.svg') }}" alt="">
                                    </span>
                                    <div class="inovices-dash-count">
                                        <div class="inovices-amount">₱ {{ $artotalAmountComplete }}</div>
                                    </div>
                                </div>
                                <p class="inovices-all">All AR Paid Invoices
                                    <span>{{ $artotalRowsInvoiceComplete }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card inovices-card">
                            <div class="card-body">
                                <div class="inovices-widget-header">
                                    <span class="inovices-widget-icon">
                                        <img src="{{ URL::to('assets/img/icons/invoices-icon3.svg') }}" alt="">
                                    </span>
                                    <div class="inovices-dash-count">
                                        <div class="inovices-amount">₱ {{ $artotalAmountUnpaid }}</div>
                                    </div>
                                </div>
                                <p class="inovices-all">All AR Unpaid Invoices
                                    <span>{{ $artotalRowsInvoiceUnpaid }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card inovices-card">
                            <div class="card-body">
                                <div class="inovices-widget-header">
                                    <span class="inovices-widget-icon">
                                        <img src="{{ URL::to('assets/img/icons/invoices-icon4.svg') }}" alt="">
                                    </span>
                                    <div class="inovices-dash-count">
                                        <div class="inovices-amount">₱ {{ $artotalAmountCancelled }}</div>
                                    </div>
                                </div>
                                <p class="inovices-all">All AR Cancelled Invoices
                                    <span>{{ $artotalRowsInvoiceCancelled }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-stripped table-hover datatable">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Invoice ID</th>
                                            <th>Customer Id</th>
                                            <th>Customer Name</th>
                                            <th>PO no.</th>
                                            <th>Amount</th>
                                            <th>Due date</th>
                                            <th>Status</th>
                                            <th class="text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($invoiceList as  $value)
                                        <tr>
                                            <td>
                                                <label class="custom_check">
                                                    <input type="checkbox" name="invoice">
                                                    <span class="checkmark"></span>
                                                </label>
                                                <a href="view-invoice.html" class="invoice-link">{{ $value->id }}</a>
                                            </td>
                                            <td>{{ $value->customer_id }}</td>
                                            <td>{{ $value->customer_name }}</td>
                                            <td>{{ $value->po_number }}</td>
                                            <td>
                                                {{ $value->amount }}
                                             </td>
                                            <td>
                                               {{ $value->due_date }}
                                            </td>
                                            <td class="">{{ $value->status }}</td>
                                            <td class="text-end">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="{{ url('armoduleinvoice/edit/page'.$value->invoice_id) }}">
                                                            <i class="far fa-edit me-2"></i>Edit
                                                        </a>
                                                        <a class="dropdown-item" href="view-invoice.html">
                                                            <i class="far fa-eye me-2"></i>View
                                                        </a>
                                                        <a class="dropdown-item" href="view-invoice.html">
                                                            <i class="fa fa-window-maximize"></i>Approval
                                                        </a>
                                                        <a class="dropdown-item" href="view-invoice.html">
                                                            <i class="fa fa-paper-plane"></i> Send Notice
                                                        </a>
                                                        <a class="dropdown-item" href="view-invoice.html">
                                                            <i class="fa fa-window-restore"></i> Reconcile
                                                        </a>
                                                        <a class="dropdown-item" href="javascript:void(0);">
                                                            <i class="far fa-trash-alt me-2"></i>Delete
                                                        </a>
                                                        <a class="dropdown-item" href="javascript:void(0);">
                                                            <i class="far fa-check-circle me-2"></i>Mark as sent
                                                        </a>
                                                        <a class="dropdown-item" href="javascript:void(0);">
                                                            <i class="far fa-paper-plane me-2"></i>Send Invoice
                                                        </a>
                                                        <a class="dropdown-item" href="#">
                                                            <i class="far fa-copy me-2"></i>Clone Invoice
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@section('script')
@endsection
@endsection

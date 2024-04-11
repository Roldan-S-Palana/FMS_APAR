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
                            <li class="breadcrumb-item"><a href="invoices.html">Invoice</a></li>
                            <li class="breadcrumb-item active">AP Invoices Overdue</li>
                        </ul>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('armoduleinvoice/overdue/page') }}" class="invoices-links active">
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
                                                        <input type="checkbox" name="name">
                                                        <span class="checkmark"></span> All Invoices
                                                    </label>
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="name">
                                                        <span class="checkmark"></span> Paid
                                                    </label>
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="name" checked>
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
                                                <button type="reset" class="btn w-100 btn-grey">Reset</button>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="report-btn">
                                        <a href="#" class="btn">
                                            <img src="assets/img/icons/invoices-icon5.png" alt="" class="me-2">
                                            Generate report
                                        </a>
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
                                        <li><a href="{{ route('apmoduleaccounts/fees/collections/page') }}">All Invoice</a></li>
                                        <li><a href="{{ route('armoduleinvoice/paid/page') }}">Paid</a></li>
                                        <li><a class="active"
                                                href="{{ route('apmoduleaccounts/fees/overdue') }}">Overdue</a></li>
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
                                    <div class="inovices-amount">₱ {{ $aptotalAmount }}</div>
                                </div>
                            </div>
                            <p class="inovices-all">All AR Invoices <span>{{ $aptotalRowsInvoice }}</span></p>
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
                                    <div class="inovices-amount">₱ {{ $aptotalAmountComplete }}</div>
                                </div>
                            </div>
                            <p class="inovices-all">All AR Paid Invoices
                                <span>{{ $aptotalRowsInvoiceComplete }}</span>
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
                                    <div class="inovices-amount">₱ {{ $aptotalAmountUnpaid }}</div>
                                </div>
                            </div>
                            <p class="inovices-all">All AR Unpaid Invoices
                                <span>{{ $aptotalRowsInvoiceUnpaid }}</span>
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
                                    <div class="inovices-amount">₱ {{ $aptotalAmountCancelled }}</div>
                                </div>
                            </div>
                            <p class="inovices-all">All AR Cancelled Invoices
                                <span>{{ $aptotalRowsInvoiceCancelled }}</span>
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
                                            <th>Invoice to</th>
                                            <th>PO no.</th>
                                            <th>Amount</th>
                                            <th>Created on</th>
                                            <th>Due date</th>
                                            <th>Status</th>
                                            <th class="text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ArListOverdue as $value)
                                            <tr>
                                                <td>

                                                    <a href="view-invoice.html"
                                                        class="invoice-link">{{ $value->id }}</a>
                                                </td>
                                                <td>{{ $value->customer_name }}</td>
                                                <td>{{ $value->po_number }}</td>
                                                <td>{{ $value->amount }}</td>
                                                <td>{{ $value->date }}</td>
                                                <td> {{ $value->due_date }}</td>
                                                <td>
                                                    <span class="badge bg-danger-light">Overdue {{ $value->days_overdue }}
                                                        days</span>
                                                </td>
                                                <td class="text-end">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item"
                                                                href="{{ url('armoduleinvoice/edit/page' . $value->invoice_id) }}">
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

    <div class="modal custom-modal fade" id="delete_paid" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <h3>Delete Invoice Overdue</h3>
                        <p>Are you sure want to delete?</p>
                    </div>
                    <div class="modal-btn delete-action">
                        <div class="row">
                            <div class="col-6">
                                <a href="javascript:void(0);" class="btn btn-primary paid-continue-btn">Delete</a>
                            </div>
                            <div class="col-6">
                                <a href="javascript:void(0);" data-bs-dismiss="modal"
                                    class="btn btn-primary paid-cancel-btn">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

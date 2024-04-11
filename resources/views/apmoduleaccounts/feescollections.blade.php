@extends('layouts.master')
@section('content')
    {{-- message --}}
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Payable Posting</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Payable Posting</li>
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

                                        <a href="#" data-bs-toggle="modal" data-bs-target="#report_preview"
                                            class="btn">
                                            <img src="assets/img/icons/invoices-icon5.png" alt="">
                                            Generate report
                                        </a>
                                    </div>
                                </li>
                                <style>
                                    @media print {
                                        /* Hide unnecessary elements */
                                        body > *:not(.printable) {
                                            display: none !important;
                                        }
                                
                                        /* Additional styles for printing */
                                        .modal-dialog {
                                            position: static !important;
                                        }
                                
                                        .modal-header,
                                        .modal-footer {
                                            display: none !important;
                                        }
                                
                                        .modal-content {
                                            box-shadow: none !important;
                                            border: none !important;
                                            width: auto !important;
                                            margin: 0 !important;
                                            padding: 0 !important;
                                            max-height: none !important;
                                            overflow: visible !important;
                                        }
                                
                                        .modal-body {
                                            padding: 0 !important;
                                            max-height: none !important;
                                            overflow: visible !important;
                                        }
                                
                                        .invoice-logo,
                                        .invoice-info {
                                            display: block !important;
                                        }
                                
                                        .invoice-item {
                                            margin-bottom: 20px !important;
                                        }
                                
                                        .invoice-table-wrap,
                                        .modal-content {
                                            overflow: visible !important;
                                        }
                                    }
                                </style>


                                <div class="modal-body printable">
                                    <div class="modal custom-modal fade invoices-preview" id="report_preview"
                                        role="document">
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
                                                                                    <img src="{{ URL::to('assets/img/logo.png') }}"
                                                                                        alt="logo">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="invoice-info">
                                                                                    <div class="invoice-head">
                                                                                        <h2 class="text-primary">
                                                                                            Accounts
                                                                                            Payables</h2>
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
                                                                                    <!--Front Card---->
                                                                                    <div class="flip-card-inner">
                                                                                        <div class="flip-card-front">
                                                                                            <div
                                                                                                class="inovices-widget-header">
                                                                                                <span
                                                                                                    class="inovices-widget-icon">
                                                                                                    <img src="{{ URL::to('assets/img/icons/invoices-icon1.svg') }}"
                                                                                                        alt="">
                                                                                                </span>
                                                                                                <div
                                                                                                    class="inovices-dash-count">
                                                                                                    <div
                                                                                                        class="inovices-amount">
                                                                                                        ₱
                                                                                                        {{ $aptotalAmount }}
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <p class="inovices-all">All
                                                                                                AP
                                                                                                Invoices
                                                                                                <span>{{ $aptotalRowsInvoice }}</span>
                                                                                            </p>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-xl-3 col-sm-6 col-12">
                                                                            <div class="card inovices-card">
                                                                                <div class="card-body">
                                                                                    <!--Front Card---->
                                                                                    <div class="flip-card-inner">
                                                                                        <div class="flip-card-front">
                                                                                            <div
                                                                                                class="inovices-widget-header">
                                                                                                <span
                                                                                                    class="inovices-widget-icon">
                                                                                                    <img src="{{ URL::to('assets/img/icons/invoices-icon2.svg') }}"
                                                                                                        alt="">
                                                                                                </span>
                                                                                                <div
                                                                                                    class="inovices-dash-count">
                                                                                                    <div
                                                                                                        class="inovices-amount">
                                                                                                        ₱
                                                                                                        {{ $aptotalAmountComplete }}
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <p class="inovices-all">All
                                                                                                AP
                                                                                                Paid Invoices
                                                                                                <span>{{ $aptotalRowsInvoiceComplete }}</span>
                                                                                            </p>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xl-3 col-sm-6 col-12">
                                                                            <div class="card inovices-card">
                                                                                <div class="card-body">
                                                                                    <!--Front Card---->
                                                                                    <div class="flip-card-inner">
                                                                                        <div class="flip-card-front">
                                                                                            <div
                                                                                                class="inovices-widget-header">
                                                                                                <span
                                                                                                    class="inovices-widget-icon">
                                                                                                    <img src="{{ URL::to('assets/img/icons/invoices-icon3.svg') }}"
                                                                                                        alt="">
                                                                                                </span>
                                                                                                <div
                                                                                                    class="inovices-dash-count">
                                                                                                    <div
                                                                                                        class="inovices-amount">
                                                                                                        ₱
                                                                                                        {{ $aptotalAmountUnpaid }}
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <p class="inovices-all">All
                                                                                                AP
                                                                                                Unpaid Invoices
                                                                                                <span>{{ $aptotalRowsInvoiceUnpaid }}</span>
                                                                                            </p>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xl-3 col-sm-6 col-12">
                                                                            <div class="card inovices-card">
                                                                                <div class="card-body">
                                                                                    <!--Front Card---->
                                                                                    <div class="flip-card-inner">
                                                                                        <div class="flip-card-front">
                                                                                            <div
                                                                                                class="inovices-widget-header">
                                                                                                <span
                                                                                                    class="inovices-widget-icon">
                                                                                                    <img src="{{ URL::to('assets/img/icons/invoices-icon4.svg') }}"
                                                                                                        alt="">
                                                                                                </span>
                                                                                                <div
                                                                                                    class="inovices-dash-count">
                                                                                                    <div
                                                                                                        class="inovices-amount">
                                                                                                        ₱
                                                                                                        {{ $aptotalAmountCancelled }}
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <p class="inovices-all">All
                                                                                                AP
                                                                                                Cancelled Invoices
                                                                                                <span>{{ $aptotalRowsInvoiceCancelled }}</span>
                                                                                            </p>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>


                                                                        <div class="invoice-item invoice-table-wrap">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div class="table-responsive">
                                                                                        <table
                                                                                            class="invoice-table table table-center mb-0">
                                                                                            <thead>
                                                                                                <tr>
                                                                                                    <th>ID</th>
                                                                                                    <th>Name</th>
                                                                                                    <th>Gender</th>
                                                                                                    <th>Fees Type</th>
                                                                                                    <th>Amount</th>
                                                                                                    <th>Paid Date</th>
                                                                                                    <th>Status</th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                @foreach ($feesList as $key => $list)
                                                                                                    <tr>

                                                                                                        <td class="id">
                                                                                                            {{ $list->id }}
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            <a
                                                                                                                href="#">{{ $list->first_name }}
                                                                                                                {{ $list->last_name }}</a>
                                                                                                        </td>
                                                                                                        <td> {{ $list->gender }}
                                                                                                        </td>
                                                                                                        <td>{{ $list->fee_type }}
                                                                                                        </td>
                                                                                                        <td>{{ $list->amount }}
                                                                                                        </td>
                                                                                                        <td>{{ $list->update_date }}
                                                                                                        </td>
                                                                                                        <td>{{ $list->status }}
                                                                                                        </td>

                                                                                                    </tr>
                                                                                                @endforeach
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>


                                                                        <div class="col align-self-end">
                                                                            <div
                                                                                class="invoice-sign text-end align-self-end">
                                                                                <img class="img-fluid d-inline-block align-self-end"
                                                                                    src="{{ URL::to('assets/img/signature.png') }}"
                                                                                    alt="sign">
                                                                                <span
                                                                                    class="d-block">{{ Session::get('name') }}</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary"
                                                            onclick="printModal()">Print</button>
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                    </div>
                                                    <script>
                                                        function printModal() {
                                                            // Set focus to the modal body
                                                            document.querySelector('.modal-body').focus();
                                                            // Trigger the print function
                                                            window.print();
                                                        }
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                function printModal() {
                    // Set focus to a focusable element within the modal body
                    var firstElement = document.querySelector('.modal-body :first-child');
                    if (firstElement) {
                        firstElement.focus();
                    }
                    // Trigger the print function
                    window.print();
                }
            </script>

            <div class="card invoices-tabs-card border-0">
                <div class="card-body card-body pt-0 pb-0">
                    <div class="invoices-main-tabs">
                        <div class="row align-items-center">
                            <div class="col-lg-8 col-md-8">
                                <div class="invoices-tabs">
                                    <ul>
                                        <li><a class="active" href="{{ route('armoduleinvoice/list/page') }}">All
                                                Invoice</a></li>
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
                            <!--Front Card---->
                            <div class="flip-card-inner">
                                <div class="flip-card-front">
                                    <div class="inovices-widget-header">
                                        <span class="inovices-widget-icon">
                                            <img src="{{ URL::to('assets/img/icons/invoices-icon1.svg') }}"
                                                alt="">
                                        </span>
                                        <div class="inovices-dash-count">
                                            <div class="inovices-amount">₱ {{ $aptotalAmount }}</div>
                                        </div>
                                    </div>
                                    <p class="inovices-all">All AP Invoices <span>{{ $aptotalRowsInvoice }}</span></p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card inovices-card">
                        <div class="card-body">
                            <!--Front Card---->
                            <div class="flip-card-inner">
                                <div class="flip-card-front">
                                    <div class="inovices-widget-header">
                                        <span class="inovices-widget-icon">
                                            <img src="{{ URL::to('assets/img/icons/invoices-icon2.svg') }}"
                                                alt="">
                                        </span>
                                        <div class="inovices-dash-count">
                                            <div class="inovices-amount">₱ {{ $aptotalAmountComplete }}</div>
                                        </div>
                                    </div>
                                    <p class="inovices-all">All AP Paid Invoices
                                        <span>{{ $aptotalRowsInvoiceComplete }}</span>
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card inovices-card">
                        <div class="card-body">
                            <!--Front Card---->
                            <div class="flip-card-inner">
                                <div class="flip-card-front">
                                    <div class="inovices-widget-header">
                                        <span class="inovices-widget-icon">
                                            <img src="{{ URL::to('assets/img/icons/invoices-icon3.svg') }}"
                                                alt="">
                                        </span>
                                        <div class="inovices-dash-count">
                                            <div class="inovices-amount">₱ {{ $aptotalAmountUnpaid }}</div>
                                        </div>
                                    </div>
                                    <p class="inovices-all">All AP Unpaid Invoices
                                        <span>{{ $aptotalRowsInvoiceUnpaid }}</span>
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card inovices-card">
                        <div class="card-body">
                            <!--Front Card---->
                            <div class="flip-card-inner">
                                <div class="flip-card-front">
                                    <div class="inovices-widget-header">
                                        <span class="inovices-widget-icon">
                                            <img src="{{ URL::to('assets/img/icons/invoices-icon4.svg') }}"
                                                alt="">
                                        </span>
                                        <div class="inovices-dash-count">
                                            <div class="inovices-amount">₱ {{ $aptotalAmountCancelled }}</div>
                                        </div>
                                    </div>
                                    <p class="inovices-all">All AP Cancelled Invoices
                                        <span>{{ $aptotalRowsInvoiceCancelled }}</span>
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-table">
                            <div class="card-body">

                                <div class="page-header">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h3 class="page-title">Payable Posting</h3>
                                        </div>
                                        <div class="col-auto text-end float-end ms-auto download-grp">
                                            <a href="#" class="btn btn-outline-primary me-2"><i
                                                    class="fas fa-download"></i> Download</a>
                                            <a href="add-fees-collection.html" class="btn btn-primary"><i
                                                    class="fas fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table
                                        class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                        <thead class="student-thread">
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Gender</th>
                                                <th>Fees Type</th>
                                                <th>Amount</th>
                                                <th>Paid Date</th>
                                                <th>Status</th>
                                                <th class="text-end">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($feesList as $key => $list)
                                                <tr>

                                                    <td class="id">{{ $list->id }}</td>
                                                    <td>
                                                        <a href="#">{{ $list->first_name }}
                                                            {{ $list->last_name }}</a>
                                                    </td>
                                                    <td> {{ $list->gender }}</td>
                                                    <td>{{ $list->fee_type }}</td>
                                                    <td>{{ $list->amount }}</td>
                                                    <td>{{ $list->update_date }}</td>
                                                    <td>{{ $list->status }} </td>
                                                    <td class="text-end">
                                                        <div class="dropdown dropdown-action">
                                                            <a href="#" class="action-icon dropdown-toggle"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="fas fa-ellipsis-v"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item"
                                                                    href="{{ url('armoduleinvoice/edit/page' . $list->invoice_id) }}">
                                                                    <i class="far fa-edit me-2"></i>Edit
                                                                </a>
                                                                <a class="dropdown-item" href="view-invoice.html">
                                                                    <i class="far fa-eye me-2"></i>View
                                                                </a>
                                                                <a class="dropdown-item" href="view-invoice.html">
                                                                    <i class="fa fa-window-maximize"></i>Approval
                                                                </a>
                                                                <a class="dropdown-item" href="view-invoice.html">
                                                                    <i class="bi bi-cash-coin"></i> Send Payment
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
    @endsection

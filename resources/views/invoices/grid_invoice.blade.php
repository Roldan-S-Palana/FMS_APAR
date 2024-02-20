@extends('layouts.master')
@section('content')
    {{-- message --}}
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Invoice Grid</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Invoice Grid</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col"></div>
                    <div class="col-auto">
                        <a href="{{ route('invoice/list/page') }}" class="invoices-links">
                            <i class="fa fa-list" aria-hidden="true"></i>
                        </a>
                        <a href="{{ route('invoice/grid/page') }}" class="invoices-links active">
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
                    <div class="invoices-main-tabs border-0 pb-0">
                        <div class="row align-items-center">
                            <div class="col-lg-12 col-md-12">
                                <div class="invoices-settings-btn invoices-settings-btn-one">
                                    <a href="invoices-settings.html" class="invoices-settings-icon">
                                        <i class="feather feather-settings"></i>
                                    </a>
                                    <a href="{{ route('invoice/add/page') }}" class="btn">
                                        <i class="feather feather-plus-circle"></i> New Invoice
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-lg-4 col-xl-3 d-flex">
                    <div class="card invoices-grid-card w-100">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <a href="view-invoice.html" class="invoice-grid-link">IN093439#@09</a>
                            <div class="dropdown dropdown-action">
                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="edit-invoice.html"><i
                                            class="far fa-edit me-2"></i>Edit</a>
                                    <a class="dropdown-item" href="view-invoice.html"><i
                                            class="far fa-eye me-2"></i>View</a>
                                    <a class="dropdown-item" href="javascript:void(0);"><i
                                            class="far fa-trash-alt me-2"></i>Delete</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-middle">
                            <h2 class="card-middle-avatar">
                                <a href="profile.html">
                                    <img class="avatar avatar-sm me-2 avatar-img rounded-circle" src="{{ URL::to('/images/photo_defaults.jpg') }}" alt="User Image"> StarCode Moore
                                </a>
                            </h2>
                        </div>
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <span><i class="far fa-money-bill-alt"></i> Amount</span>
                                    <h6 class="mb-0">$1,54,220</h6>
                                </div>
                                <div class="col-auto">
                                    <span><i class="far fa-calendar-alt"></i> Due Date</span>
                                    <h6 class="mb-0">23 Mar, 2022</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="badge bg-success-dark">Paid</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 d-flex">
                    <div class="card invoices-grid-card w-100">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <a href="view-invoice.html" class="invoice-grid-link">IN093439#@10</a>
                            <div class="dropdown dropdown-action">
                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="edit-invoice.html"><i
                                            class="far fa-edit me-2"></i>Edit</a>
                                    <a class="dropdown-item" href="view-invoice.html"><i
                                            class="far fa-eye me-2"></i>View</a>
                                    <a class="dropdown-item" href="javascript:void(0);"><i
                                            class="far fa-trash-alt me-2"></i>Delete</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-middle">
                            <h2 class="card-middle-avatar">
                                <a href="profile.html">
                                    <img class="avatar avatar-sm me-2 avatar-img rounded-circle" src="{{ URL::to('/images/photo_defaults.jpg') }}" alt="User Image"> StarCode Moore
                                </a>
                            </h2>
                        </div>
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <span><i class="far fa-money-bill-alt"></i> Amount</span>
                                    <h6 class="mb-0">$1,222</h6>
                                </div>
                                <div class="col-auto">
                                    <span><i class="far fa-calendar-alt"></i> Due Date</span>
                                    <h6 class="mb-0">18 Mar 2022</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="badge bg-danger-dark">Overdue</span>
                                </div>
                                <div class="col text-end">
                                    <span class="text-danger text-sm">Overdue 14 days</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 d-flex">
                    <div class="card invoices-grid-card w-100">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <a href="view-invoice.html" class="invoice-grid-link">IN093439#@11</a>
                            <div class="dropdown dropdown-action">
                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="edit-invoice.html"><i
                                            class="far fa-edit me-2"></i>Edit</a>
                                    <a class="dropdown-item" href="view-invoice.html"><i
                                            class="far fa-eye me-2"></i>View</a>
                                    <a class="dropdown-item" href="javascript:void(0);"><i
                                            class="far fa-trash-alt me-2"></i>Delete</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-middle">
                            <h2 class="card-middle-avatar">
                                <a href="profile.html">
                                    <img class="avatar avatar-sm me-2 avatar-img rounded-circle" src="{{ URL::to('/images/photo_defaults.jpg') }}" alt="User Image"> StarCode Moore
                                </a>
                            </h2>
                        </div>
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <span><i class="far fa-money-bill-alt"></i> Amount</span>
                                    <h6 class="mb-0">$3,470</h6>
                                </div>
                                <div class="col-auto">
                                    <span><i class="far fa-calendar-alt"></i> Due Date</span>
                                    <h6 class="mb-0">10 Mar 2022</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="badge bg-secondary-dark">Cancelled</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 d-flex">
                    <div class="card invoices-grid-card w-100">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <a href="view-invoice.html" class="invoice-grid-link">IN093439#@12</a>
                            <div class="dropdown dropdown-action">
                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="edit-invoice.html"><i
                                            class="far fa-edit me-2"></i>Edit</a>
                                    <a class="dropdown-item" href="view-invoice.html"><i
                                            class="far fa-eye me-2"></i>View</a>
                                    <a class="dropdown-item" href="javascript:void(0);"><i
                                            class="far fa-trash-alt me-2"></i>Delete</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-middle">
                            <h2 class="card-middle-avatar">
                                <a href="profile.html">
                                    <img class="avatar avatar-sm me-2 avatar-img rounded-circle" src="{{ URL::to('/images/photo_defaults.jpg') }}" alt="User Image"> StarCode Moore
                                </a>
                            </h2>
                        </div>
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <span><i class="far fa-money-bill-alt"></i> Amount</span>
                                    <h6 class="mb-0">$8,265</h6>
                                </div>
                                <div class="col-auto">
                                    <span><i class="far fa-calendar-alt"></i> Due Date</span>
                                    <h6 class="mb-0">30 Mar 2022</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="badge bg-primary-dark">Sent</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 d-flex">
                    <div class="card invoices-grid-card w-100">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <a href="view-invoice.html" class="invoice-grid-link">IN093439#@13</a>
                            <div class="dropdown dropdown-action">
                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="edit-invoice.html"><i
                                            class="far fa-edit me-2"></i>Edit</a>
                                    <a class="dropdown-item" href="view-invoice.html"><i
                                            class="far fa-eye me-2"></i>View</a>
                                    <a class="dropdown-item" href="javascript:void(0);"><i
                                            class="far fa-trash-alt me-2"></i>Delete</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-middle">
                            <h2 class="card-middle-avatar">
                                <a href="profile.html">
                                    <img class="avatar avatar-sm me-2 avatar-img rounded-circle" src="{{ URL::to('/images/photo_defaults.jpg') }}" alt="User Image"> StarCode Moore
                                </a>
                            </h2>
                        </div>
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <span><i class="far fa-money-bill-alt"></i> Amount</span>
                                    <h6 class="mb-0">$5,200</h6>
                                </div>
                                <div class="col-auto">
                                    <span><i class="far fa-calendar-alt"></i> Due Date</span>
                                    <h6 class="mb-0">20 Mar 2022</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="badge bg-secondary-dark">Cancelled</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 d-flex">
                    <div class="card invoices-grid-card w-100">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <a href="view-invoice.html" class="invoice-grid-link">IN093439#@14</a>
                            <div class="dropdown dropdown-action">
                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="edit-invoice.html"><i
                                            class="far fa-edit me-2"></i>Edit</a>
                                    <a class="dropdown-item" href="view-invoice.html"><i
                                            class="far fa-eye me-2"></i>View</a>
                                    <a class="dropdown-item" href="javascript:void(0);"><i
                                            class="far fa-trash-alt me-2"></i>Delete</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-middle">
                            <h2 class="card-middle-avatar">
                                <a href="profile.html">
                                    <img class="avatar avatar-sm me-2 avatar-img rounded-circle" src="{{ URL::to('/images/photo_defaults.jpg') }}" alt="User Image"> StarCode Moore
                                </a>
                            </h2>
                        </div>
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <span><i class="far fa-money-bill-alt"></i> Amount</span>
                                    <h6 class="mb-0">$480</h6>
                                </div>
                                <div class="col-auto">
                                    <span><i class="far fa-calendar-alt"></i> Due Date</span>
                                    <h6 class="mb-0">15 Mar 2022</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="badge bg-primary-dark">Sent</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 d-flex">
                    <div class="card invoices-grid-card w-100">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <a href="view-invoice.html" class="invoice-grid-link">IN093439#@15</a>
                            <div class="dropdown dropdown-action">
                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="edit-invoice.html"><i
                                            class="far fa-edit me-2"></i>Edit</a>
                                    <a class="dropdown-item" href="view-invoice.html"><i
                                            class="far fa-eye me-2"></i>View</a>
                                    <a class="dropdown-item" href="javascript:void(0);"><i
                                            class="far fa-trash-alt me-2"></i>Delete</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-middle">
                            <h2 class="card-middle-avatar">
                                <a href="profile.html">
                                    <img class="avatar avatar-sm me-2 avatar-img rounded-circle" src="{{ URL::to('/images/photo_defaults.jpg') }}" alt="User Image"> StarCode Moore
                                </a>
                            </h2>
                        </div>
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <span><i class="far fa-money-bill-alt"></i> Amount</span>
                                    <h6 class="mb-0">$1,999</h6>
                                </div>
                                <div class="col-auto">
                                    <span><i class="far fa-calendar-alt"></i> Due Date</span>
                                    <h6 class="mb-0">08 Mar 2022</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="badge bg-danger-dark">Overdue</span>
                                </div>
                                <div class="col text-end">
                                    <span class="text-danger text-sm">Overdue 10 days</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 d-flex">
                    <div class="card invoices-grid-card w-100">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <a href="view-invoice.html" class="invoice-grid-link">IN093439#@016</a>
                            <div class="dropdown dropdown-action">
                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="edit-invoice.html"><i
                                            class="far fa-edit me-2"></i>Edit</a>
                                    <a class="dropdown-item" href="view-invoice.html"><i
                                            class="far fa-eye me-2"></i>View</a>
                                    <a class="dropdown-item" href="javascript:void(0);"><i
                                            class="far fa-trash-alt me-2"></i>Delete</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-middle">
                            <h2 class="card-middle-avatar">
                                <a href="profile.html">
                                    <img class="avatar avatar-sm me-2 avatar-img rounded-circle" src="{{ URL::to('/images/photo_defaults.jpg') }}" alt="User Image"> StarCode Moore
                                </a>
                            </h2>
                        </div>
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <span><i class="far fa-money-bill-alt"></i> Amount</span>
                                    <h6 class="mb-0">$2,700</h6>
                                </div>
                                <div class="col-auto">
                                    <span><i class="far fa-calendar-alt"></i> Due Date</span>
                                    <h6 class="mb-0">18 Mar, 2022</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="badge bg-success-dark">Paid</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="invoice-load-btn">
                        <a href="#" class="btn">
                            <span class="spinner-border text-primary"></span> Load more
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

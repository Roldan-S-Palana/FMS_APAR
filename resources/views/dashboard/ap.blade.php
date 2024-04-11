@extends('layouts.master')
@section('content')
    {{-- message --}}
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Welcome {{ Session::get('name') }}!</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active">{{ Session::get('name') }}</li>
                            </ul>
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
                            <p class="inovices-all">All AP Invoices <span>{{ $aptotalRowsInvoice }}</span></p>
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
                            <p class="inovices-all">All AP Paid Invoices
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
                            <p class="inovices-all">All AP Unpaid Invoices
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
                            <p class="inovices-all">All AP Cancelled Invoices
                                <span>{{ $aptotalRowsInvoiceCancelled }}</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-lg-6">

                    <div class="card card-chart">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <h5 class="card-title">Overview</h5>
                                </div>
                                <div class="col-6">
                                    <ul class="chart-list-out">
                                        <li><span class="circle-blue"></span>Vendor</li>
                                        <li><span class="circle-green"></span>Client</li>
                                        <li class="star-menus"><a href="javascript:;"><i class="fas fa-ellipsis-v"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="apexcharts-area"></div>
                        </div>
                    </div>

                </div>
                <div class="col-md-12 col-lg-6">

                    <div class="card card-chart">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <h5 class="card-title">Number of Clients</h5>
                                </div>
                                <div class="col-6">
                                    <ul class="chart-list-out">
                                        <li><span class="circle-blue"></span>Male</li>
                                        <li><span class="circle-green"></span>Female</li>
                                        <li class="star-menus"><a href="javascript:;"><i class="fas fa-ellipsis-v"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="bar"></div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 d-flex">

                    <div class="card flex-fill student-space comman-shadow">
                        <div class="card-header d-flex align-items-center">
                            <h5 class="card-title">Top Clients</h5>
                            <ul class="chart-list-out student-ellips">
                                <li class="star-menus"><a href="javascript:;"><i class="fas fa-ellipsis-v"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table star-student table-hover table-center table-borderless table-striped">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th class="text-center">Marks</th>
                                            <th class="text-center">Percentage</th>
                                            <th class="text-end">Year</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-nowrap">
                                                <div>PRE2209</div>
                                            </td>
                                            <td class="text-nowrap">
                                                <a href="profile.html">
                                                    <img class="rounded-circle"src="{{ URL::to('assets/img/profiles/avatar-01.jpg') }}"
                                                        width="25" alt="Top Client"> John Doe
                                                </a>
                                            </td>
                                            <td class="text-center">1185</td>
                                            <td class="text-center">98%</td>
                                            <td class="text-end">
                                                <div>2019</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-nowrap">
                                                <div>PRE1245</div>
                                            </td>
                                            <td class="text-nowrap">
                                                <a href="profile.html">
                                                    <img class="rounded-circle"src="{{ URL::to('assets/img/profiles/avatar-01.jpg') }}"
                                                        width="25" alt="Top Client"> John Doe
                                                </a>
                                            </td>
                                            <td class="text-center">1195</td>
                                            <td class="text-center">99.5%</td>
                                            <td class="text-end">
                                                <div>2018</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-nowrap">
                                                <div>PRE1625</div>
                                            </td>
                                            <td class="text-nowrap">
                                                <a href="profile.html">
                                                    <img class="rounded-circle"src="{{ URL::to('assets/img/profiles/avatar-01.jpg') }}"
                                                        width="25" alt="Top Client"> John Doe
                                                </a>
                                            </td>
                                            <td class="text-center">1196</td>
                                            <td class="text-center">99.6%</td>
                                            <td class="text-end">
                                                <div>2017</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-nowrap">
                                                <div>PRE2516</div>
                                            </td>
                                            <td class="text-nowrap">
                                                <a href="profile.html">
                                                    <img class="rounded-circle"src="{{ URL::to('assets/img/profiles/avatar-01.jpg') }}"
                                                        width="25" alt="Top Client"> John Doe
                                                </a>
                                            </td>
                                            <td class="text-center">1187</td>
                                            <td class="text-center">98.2%</td>
                                            <td class="text-end">
                                                <div>2016</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-nowrap">
                                                <div>PRE2209</div>
                                            </td>
                                            <td class="text-nowrap">
                                                <a href="profile.html">
                                                    <img class="rounded-circle"src="{{ URL::to('assets/img/profiles/avatar-01.jpg') }}"
                                                        width="25" alt="Top Client"> John Doe
                                                </a>
                                            </td>
                                            <td class="text-center">1185</td>
                                            <td class="text-center">98%</td>
                                            <td class="text-end">
                                                <div>2015</div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-xl-6 d-flex">

                    <div class="card flex-fill comman-shadow">
                        <div class="card-header d-flex align-items-center">
                            <h5 class="card-title ">Client Activity </h5>
                            <ul class="chart-list-out Client-ellips">
                                <li class="star-menus"><a href="javascript:;"><i class="fas fa-ellipsis-v"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="activity-groups">
                                <div class="activity-awards">
                                    <div class="award-boxs">
                                        <img src="assets/img/icons/award-icon-01.svg" alt="Award">
                                    </div>
                                    <div class="award-list-outs">
                                        <h4>Title</h4>
                                        <h5>Description</h5>
                                    </div>
                                    <div class="award-time-list">
                                        <span>1 Day ago</span>
                                    </div>
                                </div>
                                <div class="activity-awards">
                                    <div class="award-boxs">
                                        <img src="assets/img/icons/award-icon-02.svg" alt="Award">
                                    </div>
                                    <div class="award-list-outs">
                                        <h4>Title</h4>
                                        <h5>Description</h5>
                                    </div>
                                    <div class="award-time-list">
                                        <span>2 hours ago</span>
                                    </div>
                                </div>
                                <div class="activity-awards">
                                    <div class="award-boxs">
                                        <img src="assets/img/icons/award-icon-03.svg" alt="Award">
                                    </div>
                                    <div class="award-list-outs">
                                        <h4>Title</h4>
                                        <h5>Description</h5>
                                    </div>
                                    <div class="award-time-list">
                                        <span>2 Week ago</span>
                                    </div>
                                </div>
                                <div class="activity-awards mb-0">
                                    <div class="award-boxs">
                                        <img src="assets/img/icons/award-icon-04.svg" alt="Award">
                                    </div>
                                    <div class="award-list-outs">
                                        <h4>Title</h4>
                                        <h5>Description</h5>
                                    </div>
                                    <div class="award-time-list">
                                        <span>3 Day ago</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card flex-fill fb sm-box" style= "background-color:#1877f2;">
                        <div class="social-likes">
                            <p>Like us on facebook</p>
                            <h6>50,095</h6>
                        </div>
                        <div class="social-boxs">
                            <img src="assets/img/icons/social-icon-01.svg" alt="Social Icon">
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card flex-fill twitter sm-box" style= "background-color:#1d9bf0;">
                        <div class="social-likes">
                            <p>Follow us on twitter</p>
                            <h6>48,596</h6>
                        </div>
                        <div class="social-boxs">
                            <img src="assets/img/icons/social-icon-02.svg" alt="Social Icon">
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card flex-fill insta sm-box" style= "background-color: #fe643b;">
                        <div class="social-likes">
                            <p>Follow us on instagram</p>
                            <h6>52,085</h6>
                        </div>
                        <div class="social-boxs">
                            <img src="assets/img/icons/social-icon-03.svg" alt="Social Icon">
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card flex-fill linkedin sm-box" style="background-color: #0a66c2;">
                        <div class="social-likes">
                            <p>Follow us on linkedin</p>
                            <h6>69,050</h6>
                        </div>
                        <div class="social-boxs">
                            <img src="assets/img/icons/social-icon-04.svg" alt="Social Icon">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

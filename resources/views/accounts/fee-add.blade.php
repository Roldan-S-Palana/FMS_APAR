@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Add Fees</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('client/add/page') }}">client</a></li>
                                <li class="breadcrumb-item active">Add Fees</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            {{-- message --}}
            {!! Toastr::message() !!}
            <div class="row">
                <div class="col-sm-12">
                    <div class="card comman-shadow">
                        <div class="card-body">
                            <form action="{{ route('account/fees/add/save') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="form-title client-info">Fee Information
                                            <span>
                                                <a href="javascript:;"><i class="feather-moon"></i></a>
                                            </span>
                                        </h5>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Invoice Reference <span class="login-danger">*</span></label>
                                            <select class="form-control select @error('invoice_id') is-invalid @enderror"
                                                name="invoice_id">
                                                <option selected disabled>Select Invoice</option>
                                                @foreach ($invoices as $invoice)
                                                    <option value="{{ $invoice->id }}"
                                                        {{ old('invoice_id') == $invoice->id ? 'selected' : '' }}>
                                                        {{ $invoice->id }}</option>
                                                @endforeach
                                            </select>
                                            @error('invoice_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>First Name <span class="login-danger">*</span></label>
                                            <input type="text"
                                                class="form-control @error('first_name') is-invalid @enderror"
                                                name="first_name" placeholder="Enter First Name"
                                                value="{{ old('first_name') }}">
                                            @error('first_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Last Name <span class="login-danger">*</span></label>
                                            <input type="text"
                                                class="form-control @error('last_name') is-invalid @enderror"
                                                name="last_name" placeholder="Enter Last Name"
                                                value="{{ old('last_name') }}">
                                            @error('last_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Gender <span class="login-danger">*</span></label>
                                            <select class="form-control select  @error('gender') is-invalid @enderror"
                                                name="gender">
                                                <option selected disabled>Select Gender</option>
                                                <option value="Female"
                                                    {{ old('gender') == 'Female' ? 'selected' : 'Female' }}>Female</option>
                                                <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male
                                                </option>
                                                <option value="Others" {{ old('gender') == 'Others' ? 'selected' : '' }}>
                                                    Others</option>
                                            </select>
                                            @error('gender')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Fee type <span class="login-danger">*</span></label>
                                            <input type="text"
                                                class="form-control @error('fee_type') is-invalid @enderror" name="fee_type"
                                                placeholder="Enter Fee Type" value="{{ old('fee_type') }}">
                                            @error('fee_type')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Amount <span class="login-danger">*</span></label>
                                            <input type="number"
                                                class="form-control @error('amount') is-invalid @enderror" name="amount"
                                                placeholder="Enter Fee Type" value="{{ old('amount') }}">
                                            @error('amount')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms calendar-icon">
                                            <label>Paid date <span class="login-danger">*</span></label>
                                            <input
                                                class="form-control datetimepicker @error('paid_date') is-invalid @enderror"
                                                name="paid_date" type="text" placeholder="DD-MM-YYYY"
                                                value="{{ old('paid_date') }}">
                                            @error('paid_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Invoice Status <span class="login-danger">*</span></label>
                                        <select class="form-control select @error('status') is-invalid @enderror"
                                            name="status">
                                            <option selected disabled>Select Status</option>
                                            @foreach ($status as $stat)
                                                <option value="{{ $stat->fee_status }}"
                                                    {{ old('status') == $stat->fee_status ? 'selected' : '' }}>
                                                    {{ $stat->fee_status }}</option>
                                            @endforeach
                                        </select>
                                        @error('status')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="client-submit">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

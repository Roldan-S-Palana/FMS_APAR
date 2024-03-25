@extends('layouts.master')
@section('content')
    {{-- message --}}
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Add Vendors</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="vendors.html">Vendors</a></li>
                            <li class="breadcrumb-item active">Add Vendors</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('vendor/save') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="form-title"><span>Basic Details</span></h5>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Full Name<span class="login-danger">*</span></label>
                                            <input type="text"
                                                class="form-control  @error('full_name') is-invalid @enderror"
                                                name="full_name" id="full_name" placeholder="Full name"
                                                value="{{ old('full_name') }}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Company name <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control" name="company_name" id="company_name"
                                                placeholder="Company Name"value="{{ old('company_name') }}">
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
                                            <label>Contact Number <span class="login-danger">*</span></label>
                                            <input type="number"
                                                class="form-control @error('contact_no') is-invalid @enderror"
                                                name="contact_no" placeholder="Enter Experience"
                                                value="{{ old('contact_no') }}">
                                            @error('contact_no')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms calendar-icon">
                                            <label>Contract Start <span class="login-danger">*</span></label>
                                            <input type="text"
                                                class="form-control datetimepicker @error('contract_start') is-invalid @enderror"
                                                name="contract_start" placeholder="DD-MM-YYYY"
                                                value="{{ old('contract_start') }}">
                                            @error('contract_start')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms calendar-icon">
                                            <label>Contract Due <span class="login-danger">*</span></label>
                                            <input type="text"
                                                class="form-control datetimepicker @error('contract_due') is-invalid @enderror"
                                                name="contract_due" placeholder="DD-MM-YYYY"
                                                value="{{ old('contract_due') }}">
                                            @error('contract_due')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <h5 class="form-title"><span>Payment</span></h5>
                                    </div>

                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Payment Method <span class="login-danger">*</span></label>
                                            <select
                                                class="form-control select @error('payment_method') is-invalid @enderror"
                                                name="payment_method" id="payment_method">
                                                <option selected disabled>Method</option>
                                                @foreach ($payment_method as $name)
                                                    <option value="{{ $name->payment_method }}">
                                                        {{ $name->payment_method }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('payment_method')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Payment Term <span class="login-danger">*</span></label>
                                            <select class="form-control select @error('payment_term') is-invalid @enderror"
                                                name="payment_term" id="payment_term">
                                                <option selected disabled>Term</option>
                                                @foreach ($payment_term as $name)
                                                    <option value="{{ $name->payment_term }}">{{ $name->payment_term }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('payment_term')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-12">
                                        <h5 class="form-title"><span>Address</span></h5>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group local-forms">
                                            <label>Address <span class="login-danger">*</span></label>
                                            <input type="text"
                                                class="form-control @error('address') is-invalid @enderror" name="address"
                                                placeholder="Enter address" value="{{ old('address') }}">
                                            @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>City <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control @error('city') is-invalid @enderror"
                                                name="city" placeholder="Enter City" value="{{ old('city') }}">
                                            @error('city')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!--<div class="col-12 col-sm-4">
                                                            <div class="form-group local-forms">
                                                                <label>State <span class="login-danger">*</span></label>
                                                                <input type="text"
                                                                    class="form-control @error('state') is-invalid @enderror" name="state"
                                                                    placeholder="Enter State" value="{{ old('state') }}">
                                                                @error('state')
        <span class="invalid-feedback" role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
    @enderror
                                                            </div>
                                                        </div>-->
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Zip Code <span class="login-danger">*</span></label>
                                            <input type="text"
                                                class="form-control @error('zip_code') is-invalid @enderror"
                                                name="zip_code" placeholder="Enter Zip" value="{{ old('zip_code') }}">
                                            @error('zip_code')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Region <span class="login-danger">*</span></label>
                                            <input type="text"
                                                class="form-control @error('region') is-invalid @enderror" name="region"
                                                placeholder="Enter region" value="{{ old('region') }}">
                                            @error('region')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                   

                                    <!----File Uploads---->
                                    <div class="row">
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group clients-up-files">
                                                <label>Signature</label>
                                                <div class="uplod">
                                                    <label
                                                        class="file-upload image-upbtn mb-0 @error('signature') is-invalid @enderror">
                                                        Choose File <input type="file" name="signature">
                                                    </label>
                                                    @error('signature')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group clients-up-files">
                                                <label>BIR 2302</label>
                                                <div class="uplod">
                                                    <label
                                                        class="file-upload image-upbtn mb-0 @error('bir_2302') is-invalid @enderror">
                                                        Choose File <input type="file" name="bir_2302">
                                                    </label>
                                                    @error('bir_2302')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-12 col-sm-4">
                                            <div class="form-group clients-up-files">
                                                <label>Business Permit</label>
                                                <div class="uplod">
                                                    <label
                                                        class="file-upload image-upbtn mb-0 @error('business_perm') is-invalid @enderror">
                                                        Choose File <input type="file" name="business_perm">
                                                    </label>
                                                    @error('business_perm')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-4">
                                            <div class="form-group clients-up-files">
                                                <label>SEC or DTI Registration</label>
                                                <div class="uplod">
                                                    <label
                                                        class="file-upload image-upbtn mb-0 @error('sec_dti_reg') is-invalid @enderror">
                                                        Choose File <input type="file" name="sec_dti_reg">
                                                    </label>
                                                    @error('sec_dti_reg')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-4">
                                            <div class="form-group clients-up-files">
                                                <label>Accreditation Documents</label>
                                                <div class="uplod">
                                                    <label
                                                        class="file-upload image-upbtn mb-0 @error('accred_docu') is-invalid @enderror">
                                                        Choose File <input type="file" name="accred_docu">
                                                    </label>
                                                    @error('accred_docu')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-4">
                                            <div class="form-group clients-up-files">
                                                <label>Others</label>
                                                <div class="uplod">
                                                    <label
                                                        class="file-upload image-upbtn mb-0 @error('other_docu') is-invalid @enderror">
                                                        Choose File <input type="file" name="other_docu">
                                                    </label>
                                                    @error('other_docu')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                                <div class="col-12">
                                    <div class="student-submit">
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
@section('script')
    <script>
        // select auto vendor id
        $('#full_name').on('change', function() {
            $('#user_id').val($(this).find(':selected').data('user_id'));
        });
    </script>
@endsection
@endsection

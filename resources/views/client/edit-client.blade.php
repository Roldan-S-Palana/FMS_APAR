@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Edit clients</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('client/add/page') }}">client</a></li>
                                <li class="breadcrumb-item active">Edit clients</li>
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
                            <form action="{{ route('client/update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" class="form-control" name="id" value="{{ $clientEdit->id }}"
                                    readonly>
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="form-title client-info">Client Information
                                            <span>
                                                <a href="javascript:;"><i class="feather-moon"></i></a>
                                            </span>
                                        </h5>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>First Name <span class="login-danger">*</span></label>
                                            <input type="text"
                                                class="form-control @error('first_name') is-invalid @enderror"
                                                name="first_name" value="{{ $clientEdit->first_name }}">
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
                                                name="last_name" value="{{ $clientEdit->last_name }}">
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
                                                    {{ $clientEdit->gender == 'Female' ? 'selected' : 'Female' }}>Female
                                                </option>
                                                <option value="Male"
                                                    {{ $clientEdit->gender == 'Male' ? 'selected' : 'Male' }}>
                                                    Male</option>
                                                <option value="Others"
                                                    {{ $clientEdit->gender == 'Others' ? 'selected' : 'Others' }}>Others
                                                </option>
                                            </select>
                                            @error('gender')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                     <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms calendar-icon">
                                            <label>Date Of Birth <span class="login-danger">*</span></label>
                                            <input class="form-control datetimepicker @error('date_of_birth') is-invalid @enderror" name="date_of_birth" type="text" placeholder="DD-MM-YYYY" value="{{ old('date_of_birth') }}">
                                            @error('date_of_birth')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Zip Code </label>
                                            <input class="form-control @error('zip_code') is-invalid @enderror"
                                                type="text" name="zip_code" placeholder="Enter zip code"
                                                value="{{ $clientEdit->zip_code }}">
                                            @error('zip_code')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>City <span class="login-danger">*</span></label>
                                            <select class="form-control select @error('city') is-invalid @enderror"
                                                name="city">
                                                <option selected disabled>Please Select City </option>
                                                <option value="Caloocan"
                                                    {{ $clientEdit->city == 'Caloocan' ? 'selected' : '' }}>
                                                    Caloocan</option>
                                                <option value="Valenzuela"
                                                    {{ $clientEdit->city == 'Valenzuela' ? 'selected' : '' }}>Valenzuela
                                                </option>
                                                <option value="Quezon City"
                                                    {{ $clientEdit->city == 'Quezon City' ? 'selected' : '' }}>Quezon City
                                                </option>
                                            </select>
                                            @error('city')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Region <span class="login-danger">*</span></label>
                                            <select class="form-control select @error('region') is-invalid @enderror"
                                                name="region">
                                                <option selected disabled>Please Select region </option>
                                                <option value="NCR"
                                                    {{ $clientEdit->region == 'NCR' ? 'selected' : '' }}>NCR
                                                </option>
                                                <option value="CAR"
                                                    {{ $clientEdit->region == 'CAR' ? 'selected' : '' }}>CAR
                                                </option>
                                                <option value="Others"
                                                    {{ $clientEdit->region == 'Others' ? 'selected' : '' }}>...
                                                </option>
                                            </select>
                                            @error('region')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>E-Mail <span class="login-danger">*</span></label>
                                            <input class="form-control @error('email') is-invalid @enderror" type="text"
                                                name="email" placeholder="Enter Email Address"
                                                value="{{ $clientEdit->email }}">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Phone </label>
                                            <input class="form-control @error('phone_number') is-invalid @enderror"
                                                type="text"
                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');"
                                                name="phone_number" placeholder="Enter Phone Number"
                                                value="{{ $clientEdit->phone_number }}">
                                            @error('phone_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group clients-up-files">
                                            <label>Upload Client Photo (150px X 150px)</label>
                                            <div class="uplod">
                                                <label
                                                    class="file-upload image-upbtn mb-0 @error('upload') is-invalid @enderror">
                                                    Choose File <input type="file" name="upload">
                                                </label>
                                                @error('upload')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group clients-up-files">
                                            <label>Upload Signature (150px X 150px)</label>
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
                                    <div class="col-12">
                                        <div class="client-submit">
                                            <button type="submit" class="btn btn-primary">Update</button>
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

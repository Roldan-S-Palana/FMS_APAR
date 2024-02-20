
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
                                <input type="hidden" class="form-control" name="id" value="{{ $clientEdit->id }}" readonly>
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="form-title client-info">client Information
                                            <span>
                                                <a href="javascript:;"><i class="feather-more-vertical"></i></a>
                                            </span>
                                        </h5>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>First Name <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ $clientEdit->first_name }}">
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
                                            <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ $clientEdit->last_name }}">
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
                                            <select class="form-control select  @error('gender') is-invalid @enderror" name="gender">
                                                <option selected disabled>Select Gender</option>
                                                <option value="Female" {{ $clientEdit->gender == 'Female' ? "selected" :"Female"}}>Female</option>
                                                <option value="Male" {{ $clientEdit->gender == 'Male' ? "selected" :""}}>Male</option>
                                                <option value="Others" {{ $clientEdit->gender == 'Others' ? "selected" :""}}>Others</option>
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
                                            <input class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" type="text"  value="{{ $clientEdit->date_of_birth }}">
                                            @error('date_of_birth')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Roll </label>
                                            <input class="form-control @error('roll') is-invalid @enderror" type="text" name="roll" value="{{ $clientEdit->roll }}">
                                            @error('roll')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Blood Group <span class="login-danger">*</span></label>
                                            <select class="form-control select @error('blood_group') is-invalid @enderror" name="blood_group">
                                                <option selected disabled>Please Select Group </option>
                                                <option value="A+" {{ $clientEdit->blood_group == 'A+' ? "selected" :""}}>A+</option>
                                                <option value="B+" {{ $clientEdit->blood_group == 'B+' ? "selected" :""}}>B+</option>
                                                <option value="O+" {{ $clientEdit->blood_group == 'O+' ? "selected" :""}}>O+</option>
                                            </select>
                                            @error('blood_group')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Religion <span class="login-danger">*</span></label>
                                            <select class="form-control select @error('religion') is-invalid @enderror" name="religion">
                                                <option selected disabled>Please Select Religion </option>
                                                <option value="Hindu" {{ $clientEdit->religion == 'Hindu' ? "selected" :""}}>Hindu</option>
                                                <option value="Christian" {{ $clientEdit->religion == 'Christian' ? "selected" :""}}>Christian</option>
                                                <option value="Others" {{ $clientEdit->religion == 'Others' ? "selected" :""}}>Others</option>
                                            </select>
                                            @error('religion')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>E-Mail <span class="login-danger">*</span></label>
                                            <input class="form-control @error('email') is-invalid @enderror" type="text" name="email"  value="{{ $clientEdit->email }}">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Class <span class="login-danger">*</span></label>
                                            <select class="form-control select @error('class') is-invalid @enderror" name="class">
                                                <option selected disabled>Please Select Class </option>
                                                <option value="12" {{ $clientEdit->class == '12' ? "selected" :""}}>12</option>
                                                <option value="11" {{ $clientEdit->class == '11' ? "selected" :""}}>11</option>
                                                <option value="10" {{ $clientEdit->class == '10' ? "selected" :""}}>10</option>
                                            </select>
                                            @error('class')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Section <span class="login-danger">*</span></label>
                                            <select class="form-control select @error('section') is-invalid @enderror" name="section">
                                                <option selected disabled>Please Select Section </option>
                                                <option value="A" {{ $clientEdit->section == 'A' ? "selected" :""}}>A</option>
                                                <option value="B" {{ $clientEdit->section == 'B' ? "selected" :""}}>B</option>
                                                <option value="C" {{ $clientEdit->section == 'C' ? "selected" :""}}>C</option>
                                            </select>
                                            @error('section')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Admission ID </label>
                                            <input class="form-control @error('admission_id') is-invalid @enderror" type="text" name="admission_id" value="{{ $clientEdit->admission_id }}">
                                            @error('admission_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Phone </label>
                                            <input class="form-control @error('phone_number') is-invalid @enderror" type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');" name="phone_number" value="{{ $clientEdit->phone_number }}">
                                            @error('phone_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group clients-up-files">
                                            <label>Upload client Photo (150px X 150px)</label>
                                            <div class="uplod">
                                                <h2 class="table-avatar">
                                                    <a class="avatar avatar-sm me-2">
                                                        <img class="avatar-img rounded-circle" src="{{ Storage::url('client-photos/'.$clientEdit->upload) }}" alt="User Image">
                                                    </a>
                                                </h2>
                                                <label class="file-upload image-upbtn mb-0 @error('upload') is-invalid @enderror">
                                                    Choose File <input type="file" name="upload">
                                                </label>
                                                <input type="hidden" name="image_hidden" value="{{ $clientEdit->upload }}">
                                                @error('upload')
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

@extends('layouts.app')
@section('content')
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-6 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="index.html"><img src="{{ URL::to('assets/images/logo/logo.png') }}" alt="Logo"></a>
                    </div>
                    <h1 class="auth-title">Creation of Purok</h1>
                    <p class="auth-subtitle mb-5">Create Purok</p>

                    <form method="POST" action="{{ route('purok/add/save') }}" class="md-float-material" enctype="multipart/form-data">
                        @csrf


                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-lg @error('purok_name') is-invalid @enderror" name="purok_name" value="{{ old('purok_name') }}" placeholder="Enter Purok Name">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            @error('purok_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-lg @error('comp_address') is-invalid @enderror" name="comp_address" value="{{ old('comp_address') }}" placeholder="Enter Complete Address">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            @error('comp_address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Create</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class='text-gray-600'>Go <a href="{{ route('purokManagement') }}"
                        class="font-bold">Back?</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 d-none d-lg-block">
                <div id="auth-right">
                <div class="col-md-5">
                        <img src="
                        assets/images/login_background.png" width="240%">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

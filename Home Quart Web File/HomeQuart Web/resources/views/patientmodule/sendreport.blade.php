@extends('layouts.master')
@section('menu')
@extends('sidebar.dashboard')
@endsection
@section('content')
    @if (Auth::user()->role_name=='Patient')
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            <div class="col-12 col-lg-3" style="float: right">  
                <div class="card" data-bs-toggle="modal" data-bs-target="#default">
                    <div class="card-body py-4 px-5">
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl">
                                <img src="{{ URL::to('/images/'. Auth::user()->p_picture) }}" alt="{{ Auth::user()->p_picture }}">
                            </div>
                            <div class="ms-3 name">
                                <h5 class="font-bold">{{ Auth::user()->full_name }}</h5>
                                <h6 class="text-muted mb-0">{{ Auth::user()->email }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br><br><br><br><br><br><h1>Send Report</h1><hr>
            {{-- mo comment si she frank bubu --}}
            
            <section class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-6 col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <table>
                                                <h4>Input Image</h4>
                                                <tr>
                                                    <input type="file" name="photoProof" id="photoProof">
                                                </tr>
                                            </table>
                                            <table>
                                                <th>Specify Symptoms</th>
                                                <tr>
                                                    <td>
                                                        <input type="checkbox" name="headache" id="headache"> Headache
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="checkbox" name="fever" id="fever"> Fever
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="checkbox" name="cough" id="cough"> Cough
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="checkbox" name="shortness" id="shortness"> Shortness of breath
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <table >
                                                <th>Enter Temperature</th>
                                                <tr style="text-align: left">
                                                    <td>Morning: <input type="text" name="morning" id="morning"></td>
                                                </tr>
                                                <tr style="text-align: left">
                                                    <td>Afternoon: <input type="text" name="afternoon" id="afternoon"></td>
                                                </tr>
                                                <tr style="text-align: left">
                                                    <td>Evening: <input type="text" name="evening" id="evening"></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <table style="text-align: left">
                                                <th>Medicine Intaked</th>
                                                <tr>
                                                    <td><input type="radio" name="paracetamol" id="paracetamol"> Paracetamol</td>
                                                </tr>
                                                <tr>    
                                                    <td><input type="radio" name="ibuprofen" id="ibuprofen"> Ibuproffen</td>
                                                </tr>
                                                <tr>
                                                    <td><input type="radio" name="salbotamol" id="salbotamol"> Salbotamol</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <button type="button" class="btn btn-primary btn-lg">SUBMIT</button>
                </div>
            </section>
                
            {{-- user profile modal --}}
            <div class="card-body">
                <!--Basic Modal -->
                <div class="modal fade text-left" id="default" tabindex="-1" aria-labelledby="myModalLabel1" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myModalLabel1">User Profile</h5>
                                <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                                    X
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Full Name</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" name="full_name" value="{{ Auth::user()->full_name }}" readonly>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-person"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Email Address</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" readonly>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-envelope"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Mobile Number</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="number" class="form-control" value="{{ Auth::user()->contactno }}" readonly>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-phone"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
            
                                        <div class="col-md-4">
                                            <label>Status</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" value="{{ Auth::user()->status }}" readonly>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-bag-check"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label>Role Name</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" value="{{ Auth::user()->role_name }}" readonly>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-exclude"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Close</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            {{-- end user profile modal --}}
            {{-- message --}}
            {!! Toastr::message() !!}
        
            <br><br><br><br><br><br><br><br><br><br><br><br><hr>
            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; Home Quart</p>
                    </div>
                    {{-- <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                        href="http://Fix-It.com">Team Fix It</a></p>
                    </div> --}}
                </div>
            </footer>
        </div>
    @endif
@endsection
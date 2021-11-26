@extends('layouts.master')
@section('menu')
@extends('sidebar.dashboard')
@endsection
@section('content')
    @if (Auth::user()->role_name=='Doctor')
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Patient Quarantine Information</h3>
                            <p class="text-subtitle text-muted">Includes personal details, temperature progress etc.</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Patient Quarantine Information</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                {{-- message --}}
                {!! Toastr::message() !!}
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                           Patient Quarantine Information Details
                        </div>
                        <section class="row">
                            <div class="col-12">
                                <div class="row">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="row-col-md-12">
                                                            Patient Name:<input type="text" class="form-control" placeholder="Full Name" id="first-name-icon" name="full_name" value="{{ $data[0]->full_name }}"readonly> <br>
                                                            
                                                    </div>
                                                    <hr>
                                                    <section class="row">
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-6 col-lg-3 col-md-6">
                                                                    <div class="card">
                                                                        <div class="card-body px-3 py-4-5">
                                                                            <div class="row">
                                                                                <center>
                                                                                    <table>
                                                                                        <tr>    
                                                                                        @foreach ($data as $key => $items)
                                                                                        @if ($loop->last)
                                                                                        <h5>{{ $items->temp_input }}</h5>
                                                                                        @endif
                                                                                        @endforeach
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <p>Last Temperature</p>
                                                                                        </tr>
                                                                                    </table>
                                                                                </center>
                                                                                    
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6 col-lg-3 col-md-6">
                                                                    <div class="card">
                                                                        <div class="card-body px-3 py-4-5">
                                                                            <div class="row">
                                                                                    <center>
                                                                                        <table>
                                                                                            <tr>
                                                                                            @foreach ($data as $key => $items)
                                                                                            @if ($loop->last)
                                                                                            <h5>{{ $items->date_time }}</h5>
                                                                                            @endif
                                                                                             @endforeach
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <p>Last Report/Measure</p>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </center>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6 col-lg-3 col-md-6">
                                                                    <div class="card">
                                                                        <div class="card-body px-3 py-4-5">
                                                                            <div class="row">
                                                                                    <center>
                                                                                        <table >
                                                                                            <tr>
                                                                                                <h5>Positive-Fever</h5>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <p>Status and Symptoms</p>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </center>   
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6 col-lg-3 col-md-6">
                                                                    <div class="card">
                                                                        <div class="card-body px-3 py-4-5">
                                                                            <div class="row">
                                                                                    <center>
                                                                                        <table>
                                                                                            <tr>
                                                                                                <h5>12d 14h 43m</h5>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <p>Remaining Time Period</p>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </center>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </section>
                                                    <section class="row">
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-6 col-lg-4 col-md-6">
                                                                    <div class="card">
                                                                        <div class="card-body px-3 py-4-5">
                                                                            <div class="row">
                                                                                    <table >
                                                                                        <th>Personal Information</th>
                                                                                        <tr>
                                                                                            <td>
                                                                                                Name:
                                                                                            </td>
                                                                                            <td>
                                                                                                <input type="text"  id="first-name-icon" name="full_name" value="{{ $data[0]->full_name }}"readonly> <br>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                                Email:
                                                                                            </td>
                                                                                            <td>
                                                                                                <input type="text"  name="email" value="{{ $data[0]->email }}"readonly> <br>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                                Contact:
                                                                                            </td>
                                                                                            <td>
                                                                                                <input type="text"  name="phone" value="{{ $data[0]->contactno }}"readonly> <br>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6 col-lg-4 col-md-6">
                                                                    <div class="card">
                                                                        <div class="card-body px-3 py-4-5">
                                                                            <div class="row">
                                                                                    <center>
                                                                                        <h6>Temperature Progress</h6>
                                                                                        <div id="chart-indonesia"></div>
                                                                                    </center>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6 col-lg-4 col-md-6">
                                                                    <div class="card">
                                                                        <div class="card-body px-3 py-4-5">
                                                                            <div class="row">
                                                                                <div class="col-md-8">
                                                                                    <table>
                                                                                        <th>Summary</th>
                                                                                        <tr>
                                                                                            <td>Reports needed per day: 3</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Medicine Intake: Paracetamol</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Swabtest Result: Postive</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Undergone Swabtes: YES</td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <form class="form form-horizontal" action="{{ route('consultupdate') }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $data[0]->id }}">
                                                            <input type="text" name="user_id" value="{{ $data[0]->user_id }}" readonly>
                                                            <div class="form-body">
                                                                <div class="row">
                                                                    <h3>Consult This Patient</h3>
                                                                    <div class="col-md-4">
                                                                        <label>Name:</label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="form-group has-icon-left">
                                                                            <div class="position-relative">
                                                                                <input type="text" class="form-control" name="full_name" value="{{ $data[0]->full_name }}" readonly>
                                                                                <div class="form-control-icon">
                                                                                    <i class="bi bi-person"></i>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <br>
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <label>Quarantine Period for the Patient:</label>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <table>
                                                                                <tr>
                                                                                    <td>From:
                                                                                        <input type="date" name="qperiod_start" id="qperiod_start" class="form-control">
                                                                                    </td>
                                                                                    <td>To:
                                                                                        <input type="date" name="qperiod_end" id="qperiod_end" class="form-control">
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                            <script>
                                                                                document.getElementById('qperiod_start').valueAsDate = new Date();
                                                                            </script>
                                                                        </div>
                                                                    </div>
                                                                    <br>
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <label>Medicine needed to be intake:</label>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <table>
                                                                            <div class="form-group position-relative has-icon-left mb-4">
                                                                                <fieldset class="form-group">
                                                                                        <select class="form-select" name="recommend_medicine" id="recommend_medicine">  
                                                                                                <option hidden selected disabled><--Select Medicine--></option>
                                                                                                @foreach ($assignM as $key => $value)
                                                                                                    <option value="{{ $value->medicine_name }}"> {{ $value->medicine_name }}</option>
                                                                                                @endforeach  
                                                                                        </select>
                                                                                </fieldset>
                                                                            </div>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                    <br>
                                                                    <div class="row">
                                                                    <div class="col-md-4">
                                                                            <label>Important Remarks for the Patient:</label>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <table>
                                                                                <tr>
                                                                                    <td>
                                                                                       <textarea name="remarks" id="remarks" cols="75" rows="3" placeholder="Remarsk here..." class="form-control"></textarea> 
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div> <br>
                                                        <div class="col-12 d-flex justify-content-end">
                                                            <button type="submit"
                                                                class="btn btn-primary me-1 mb-1">CONSULT</button>
                                                            <a  href="{{ route('patientList') }}"
                                                                class="btn btn-light-secondary me-1 mb-1">CANCEL</a>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                        </section>
                    </div>
                </section>
            
            </section>
            
            {{-- message --}}
            {!! Toastr::message() !!}
            
            <footer>
            <div class="footer clearfix mb-0 text-muted">
            <div class="float-start">
                <p>2021 &copy; Home Quart</p>
            </div>
            <div class="float-end">
                <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                >Team Fix-it</a></p>
            </div>
        </div>
            </footer>
        </div>
    @endif
@endsection
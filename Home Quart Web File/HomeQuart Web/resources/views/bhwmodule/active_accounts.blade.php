@extends('layouts.master')
@section('menu')
@extends('sidebar.dashboard')
@endsection
@section('content')
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
                    <h3>Active Quarantine Patient Management Control</h3>
                    <p class="text-subtitle text-muted">List of active accounts for the patients</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Active Account Mangement</li>
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
                    Active Accounts Datatable
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Full Name</th>
                                <th>Profile</th>
                                <th>Age</th>
                                <th>Purok</th>
                                <th>Isolation</th>
                                <th>Address</th>
                                <th>Gender</th>
                                <th>Contact No.</th>
                                <th>Contact Person</th>
                                <th>Swab Test Status</th>
                                <th>Quarantine Period</th>
                                <th>Account Status</th>
                                <th class="text-center">Action</th>
                            </tr>    
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $item)
                                @if($item->assign_purok == Auth::user()->assign_purok)
                                <tr>
                                    
                                    <td class="id">{{ ++$key }}</td>
                                    <td class="full_name">{{ $item->full_name }}</td>
                                    <td class="photo">
                                        <div class="avatar avatar-xl">
                                            <img src="{{ URL::to('/images/'. $item->p_picture) }}" alt="{{ $item->p_picture }}">
                                        </div>
                                    </td>
                                    <td class="age">{{ $item->age }}</td>
                                    <td class="assign_purok">{{ $item->assign_purok }}</td>
                                    <td class="assign_purok">{{ $item->place_isolation }}</td>
                                    <td class="address">{{ $item->address }}</td>
                                    <td class="gender">{{ $item->gender }}</td>
                                    <td class="contact_no">{{ $item->contactno }}</td>
                                    <td class="contact_per">{{ $item->contact_per }}</td>
                                    <td class="swab_report">{{ $item->swab_report }}</td>
                                    <td class="qperiod_end">{{ $item->qperiod_start }} until {{ $item->qperiod_end }}</td>
                                    @if($item->status =='Active')
                                    <td class="status">{{ $item->status }}</td>
                                    @endif
                                    @if($item->status =='Disable')
                                    <td class="status">{{ $item->status }}</td>
                                    @endif
                                    @if($item->status =='Done')
                                    <td class="status">{{ $item->status }}</td>
                                    @endif
                                    @if ($item->place_isolation == 'Isolation Facility')
                                    <td class="text-center">
                                        <a href="{{ url('sendReport/Account/'.$item->id) }}">
                                            <span class="badge bg-success"><i class="bi bi-send-plus"></i>REPORT</span>
                                        </a>  
                                     </td>
                                    @endif
                                    @if ($item->place_isolation != 'Isolation Facility')
                                    <td class="text-center">
                                        <p>Can't Report</p>
                                    </td>
                                    @endif
                                    
                                </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
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
@endsection

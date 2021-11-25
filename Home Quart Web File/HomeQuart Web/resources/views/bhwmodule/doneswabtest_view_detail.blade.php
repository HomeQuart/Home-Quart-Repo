@extends('layouts.master')
@section('menu')
@extends('sidebar.dashboard')
@endsection
@section('content')
<div id="main">
    <style>
        .avatar.avatar-im .avatar-content, .avatar.avatar-xl img {
            width: 40px !important;
            height: 40px !important;
            font-size: 1rem !important;
        }
        .form-group[class*=has-icon-]s .form-select {
            padding-left: 2rem;
        }

    </style>
    
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Patient Done Swab Test </h3>
                    <p class="text-subtitle text-muted">This patient has done swabtest</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Done Swab Test View </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div> 

        @if (Auth::user()->role_name=='BHW')
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Patient Done SwabTest Details</h4>
                </div>
                <div class="card-content">
                <div class="card-body">
                    
                    <!-- <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Full Name</th>
                                <th>Swab Result</th>
                                <th>Swab Proof</th>
                            </tr>    
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $item)
                            @if($item->swab_result != '')
                                <tr>
                                    <td class="id">{{ ++$key }}</td>
                                    <td class="full_name">{{ $item->full_name }}</td>
                                    
                                    <td class="swab_result">{{ $item->swab_result }}</td>
                                    <td class="swab_proof">
                                            <img src="{{ URL::to('/swabtestImage/'. $item->swab_proof) }}" alt="{{ $item->swab_proof }}" width="50%">
                                    </td>
                                </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table> -->

                    <table>
                    @foreach ($data as $key => $item)
                            @if($item->swab_result != '')
                                <tr>
                                    <td>ID:</td>
                                    <td class="id">{{ ++$key }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        Full Name:
                                    </td>
                                    <td class="full_name">{{ $item->full_name }}</td>
                                </tr>
                                <tr>
                                    <td>Swabtest Result:</td>
                                    <td class="swab_result">{{ $item->swab_result }}</td>
                                </tr>
                                <tr>
                                    <td>Swab Test Proof</td>
                                    <td class="swab_proof">
                                            <img src="{{ URL::to('/swabtestImage/'. $item->swab_proof) }}" alt="{{ $item->swab_proof }}" width="50%">
                                    </td>
                                </tr>
                            @endif
                            @endforeach
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <br><hr>
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
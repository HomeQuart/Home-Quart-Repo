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
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Add New Medicine</h3>
                <p class="text-subtitle text-muted">Add new medicine here</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Medicine</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    
    {{-- message --}}
    {!! Toastr::message() !!}

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Form Input Information</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form form-horizontal" action="{{ route('form/save') }}" method="POST">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <table>
                                    <tr>
                                        <td>
                                            <label>Medicine Name:</label>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control @error('full_name') is-invalid @enderror" value="{{ old('full_name') }}"
                                                placeholder="Enter medicine name" id="first-name-icon" name="full_name">
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label>Symptoms Type:</label>
                                        </td>
                                        <td>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <input type="checkbox" name="fever" id="fever" value="Fever"> Fever <br>
                                            <input type="checkbox" name="cough" id="cough" value="Cough"> Cough <br>
                                            <input type="checkbox" name="shortnessOfBreath" id="shortnessOfBreath" value="Shortness of Breath"> Shortness of Breath <br>
                                            <input type="checkbox" name="lossOfTaste" id="lossOfTaste" value="Loss of Taste"> Loss of Taste <br>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Save</button>
                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
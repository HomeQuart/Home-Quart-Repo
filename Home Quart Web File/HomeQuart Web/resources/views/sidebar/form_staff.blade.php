<div id="sidebar" class="active">
    <div class="sidebar-wrapper active" style="background-color:#b2d3ec">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                {{-- <div class="logo">
                    <a href="{{ route('home') }}"><img src="{{ URL::to('assets/images/logo/logo.png') }}" alt="Logo" srcset=""></a>
                </div> --}}
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>
                <li class="sidebar-item active" >
                    <a href="{{ route('home') }}" class='sidebar-link' style="background-color:#4390bc">
                        <i class="bi bi-house-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <div class="card-body">
                        <div class="badges">
                            @if (Auth::user()->role_name=='Admin')
                            <span>Name: <span class="fw-bolder">{{ Auth::user()->full_name }}</span></span>
                            <hr>
                            <span>Role Name:</span>
                            <span class="badge bg-success">Admin</span>
                            @endif
                            @if (Auth::user()->role_name=='Doctor')
                                <span>Name: <span class="fw-bolder">{{ Auth::user()->full_name }}</span></span>
                                <hr>
                                <span>Role Name:</span>
                                <span class="badge bg-info">Doctor</span>
                            @endif
                            @if (Auth::user()->role_name=='BHW')
                                <span>Name: <span class="fw-bolder">{{ Auth::user()->full_name }}</span></span>
                                <hr>
                                <span>Role Name:</span>
                                <span class="badge bg-info">Barangay Health Worker</span>
                            @endif
                            @if (Auth::user()->role_name=='Patient')
                                <span>Name: <span class="fw-bolder">{{ Auth::user()->full_name }}</span></span>
                                <hr>
                                <span>Role Name:</span>
                                <span class="badge bg-warning">Quarantine Patient</span>
                            @endif
                        </div>
                    </div>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('change/password') }}" class='sidebar-link'>
                        <i class="bi bi-shield-lock"></i>
                        <span>Change Password</span>
                    </a>
                </li>

                @if (Auth::user()->role_name=='Admin')
                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-hexagon-fill"></i>
                            <span>User Management</span>
                        </a>
                        <ul class="submenu">
                            <li class="submenu-item">
                                <a href="{{ route('userManagement') }}">User Accounts</a>
                            </li>
                            <li class="submenu-item">
                                <a href="{{ route('activity/log') }}">User Activity Log</a>
                            </li>
                            <li class="submenu-item">
                                <a href="{{ route('activity/login/logout') }}">Activity Log</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('purokManagement') }}" class='sidebar-link'>
                            <i class="bi bi-shield-lock"></i>
                            <span>Purok Management</span>
                        </a>
                    </li>
                @endif
               
                {{-- DOCTOR SIDEBAR Dashboard --}}
                @if (Auth::user()->role_name=='Doctor')
                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-hexagon-fill"></i>
                            <span>Patient Management</span>
                        </a>
                        <ul class="submenu">
                            <li class="submenu-item">
                                <a href="#">Patient List</a>
                            </li>
                            <li class="submenu-item">
                                <a href="{{ route('reportList') }}">Report Summary</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-hexagon-fill"></i>
                            <span>Brgy Health Worker Management</span>
                        </a>
                        <ul class="submenu">
                            <li class="submenu-item">
                                <a href="{{ route('bhwList') }}">Health Worker List</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-file-earmark-medical-fill"></i>
                            <span>Medicine Management</span>
                        </a>
                        <ul class="submenu">
                            <li class="submenu-item active">
                                <a href="{{ route('addMedicine') }}">Add Medicine</a>
                            </li>
                            <li class="submenu-item">
                                <a href="{{ route('form/view/detail') }}">Display Medicines</a>
                            </li>
                        </ul>
                    </li>
                @endif


                {{-- BHW SIDEBAR Dashboard --}}
                @if (Auth::user()->role_name=='BHW')
                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-hexagon-fill"></i>
                            <span>Patient Pending Accounts </span>
                        </a>
                        <ul class="submenu">
                            <li class="submenu-item">
                                <a href="{{ route('pendingaccounts') }}">Manage Pending Accounts</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-file-earmark-medical-fill"></i>
                            <span>Patient Management</span>
                        </a>
                        <ul class="submenu">
                            <li class="submenu-item">
                                <a href="{{ route('activeaccounts') }}">Patient Information</a>
                            </li>
                            <li class="submenu-item">
                                <a href="{{ route('underQuarantine') }}">Patient Under Quarantine</a>
                            </li>
                            <li class="submenu-item">
                                <a href="{{ route('doneQuarantine') }}">Patient Done Quarantine</a>
                            </li>
                        </ul>
                    </li>
                @endif

                {{-- PATIENT SIDEBAR Dashboard --}}
                @if (Auth::user()->role_name=='Patient')
                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-hexagon-fill"></i>
                            <span>Report</span>
                        </a>
                        <ul class="submenu">
                            <li class="submenu-item">
                                <a href="#">Send Report</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-file-earmark-medical-fill"></i>
                            <span>DATA</span>
                        </a>
                        <ul class="submenu">
                            <li class="submenu-item active">
                                <a href="#">Consultations</a>
                            </li>
                            <li class="submenu-item">
                                <a href="#">Temperature Progress</a>
                            </li>
                            <li class="submenu-item">
                                <a href="#">Contact Hotlines</a>
                            </li>
                        </ul>
                    </li>
                @endif
                {{-- <li class="sidebar-title">Forms &amp; Tables</li>
                <li class="sidebar-item  has-sub active">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-file-earmark-medical-fill"></i>
                        <span>Form Elements</span>
                    </a>
                    <ul class="submenu active">
                        <li class="submenu-item active">
                            <a href="{{ route('form/staff/new') }}">Staff Input</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-grid-1x2-fill"></i>
                        <span>View Record</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item">
                            <a href="{{ route('form/view/detail') }}">View Detail</a>
                        </li>
                    </ul>
                </li> --}}
                <li class="sidebar-item">
                    <a href="{{ route('logout') }}" class='sidebar-link'>
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Log Out</span>
                    </a>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
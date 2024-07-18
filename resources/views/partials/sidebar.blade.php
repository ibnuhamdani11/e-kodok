<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!-- User box -->
        <div class="user-box text-center">

            <img src="{{ asset('adminto/images/users/user-1.jpg') }}" alt="user-img" title="Mat Helme"
                class="rounded-circle img-thumbnail avatar-md">
            <div class="dropdown">
                <a href="#" class="user-name dropdown-toggle h5 mt-2 mb-1 d-block" data-bs-toggle="dropdown"
                    aria-expanded="false">Admin</a>
                <div class="dropdown-menu user-pro-dropdown">

                    <!-- item-->
                    <!-- <a href="{{ route('signout') }}" class="dropdown-item notify-item">
                        <i class="fe-log-out me-1"></i>
                        <span>Logout</span>
                    </a> -->

                </div>
            </div>

            <!-- <p class="text-muted left-user-info">Admin Head</p> -->

            <ul class="list-inline">
                <!-- <li class="list-inline-item">
                    <a href="#" class="text-muted left-user-info">
                        <i class="mdi mdi-cog"></i>
                    </a>
                </li> -->

                <li class="list-inline-item">
                    <a href="{{ route('signout') }}">
                        <i class="mdi mdi-power"></i>
                    </a>
                </li>
            </ul>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ route('pencarian')}}">
                        <i class="mdi mdi-book-search-outline"></i>
                        <!-- <span class="badge bg-success rounded-pill float-end">9+</span> -->
                        <span> Pencarian </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('lembar-kontrol')}}">
                        <i class="mdi mdi-book-information-variant"></i>
                        <!-- <span class="badge bg-success rounded-pill float-end">9+</span> -->
                        <span> Lembar Kontrol </span>
                    </a>
                </li>
                <li>
                    <a href="#petugas" data-bs-toggle="collapse">
                        <i class="mdi mdi-account-circle-outline"></i>
                        <!-- <span class="badge bg-success rounded-pill float-end">9+</span> -->
                        <span> Petugas </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="petugas">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('verifikator') }}">Verikator</a>
                            </li>
                            <li>
                                <a href="{{ route('kasi-urji') }}">Kasi Urji</a>
                            </li>
                            <li>
                                <a href="{{ route('pembayar') }}">Pembayar</a>
                            </li>
                        </ul>
                    </div>
                </li> 

                
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
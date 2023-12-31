<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/home" class="brand-link">
        {{-- <img src="{{ asset('admin/dist/images/logo-lam-kprs.png') }}" alt="AdminLTE Logo" style="width:200px"> --}}
        {{-- <img src="{{ asset('admin/dist/images/logo.jpg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-2"
            style="opacity: .8"> --}}
        <span class="brand-text font-weight-light">Tiket</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a class="d-block">{{ Auth::User()->name }}</a>
            </div>
        </div> --}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link @yield('dashboard')">
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                @if (Auth::user()->role == 'promotor')
                    <li class="nav-item">
                        <a href="{{ route('eventType.index') }}" class="nav-link @yield('event.type')">
                            <p>
                                Tipe Event
                            </p>
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                    <a href="{{ route('event.index') }}" class="nav-link @yield('event')">
                        <p>
                            Event
                        </p>
                    </a>
                </li>
                @if (Auth::user()->role == 'user')
                    <li class="nav-item">
                        <a href="{{ route('ticket.index') }}" class="nav-link @yield('ticket')">

                            <i class="fa-solid fa-ticket"></i>
                            <p>
                                Tiket
                            </p>
                        </a>
                    </li>
                @endif

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

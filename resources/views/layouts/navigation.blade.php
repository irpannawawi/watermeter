<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Main</li>

                <li>
                    <a href="{{route('dashboard')}}" class="waves-effect">
                        <i class="ti-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                @if (Auth::user()->role == 'admin')
                    
                <li>
                    <a href="{{route('users')}}" class=" waves-effect">
                        <i class="fa fa-users"></i>
                        <span>Pengguna</span>
                    </a>
                </li>
                
                <li>
                    <a href="{{route('pelanggan')}}" class=" waves-effect">
                        <i class="ti-home"></i>
                        <span>Pelanggan</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('tagihan-pengguna')}}" class=" waves-effect">
                        <i class="ti-money"></i>
                        <span>Tagihan pengguna</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('log')}}" class="waves-effect">
                        <i class="fa fa-history"></i>
                        <span>Log</span>
                    </a>
                </li>
                @else
                <li>
                    <a href="{{route('tagihan')}}" class=" waves-effect">
                        <i class="ti-money"></i>
                        <span>Tagihan</span>
                    </a>
                </li>
                @endif

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
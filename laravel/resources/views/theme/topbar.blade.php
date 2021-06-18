<div class="topbar">

    <nav class="navbar-custom">
        <ul class="list-inline float-right mb-0">
            <li class="list-inline-item dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                   aria-haspopup="false" aria-expanded="false">
                    <img src="{{ asset('theme/assets/images/logo.png') }}" alt="user" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5>Welcome</h5>
                    </div>
                    <a class="dropdown-item" href="{{ route('perfil') }}"><i class="mdi mdi-account-circle m-r-5 text-muted"></i> Perfil</a>
                    <a class="dropdown-item" href="{{ route('historial') }}"><i class="mdi mdi-wallet m-r-5 text-muted"></i> Historial</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" data-target='#salirModal' data-toggle='modal'><i class="mdi mdi-logout m-r-5 text-muted"></i> Salir</a>
                </div>
            </li>
        </ul>
        <div class="clearfix"></div>

    </nav>

</div>

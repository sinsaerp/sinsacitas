<div class="left side-menu">
    <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
        <i class="ion-close"></i>
    </button>

    <!-- LOGO -->
    <div class="topbar-left">
        <div class="text-center">
            <a href="{{ route('home') }}" class="logo"><i class="mdi mdi-assistant"></i> SINSA ERP</a>
            <!-- <a href="{{ route('home') }}l" class="logo"><img src="{{ asset('theme/assets/images/f3.png') }}" height="24" alt="logo"></a> -->
            @if(!empty(auth()->user()->FullName))
                <p style="font-size: 11px"><b>{{ auth()->user()->FullName }}</b></p>
            @endif
        </div>
    </div>

    <div class="sidebar-inner slimscrollleft">

        <div id="sidebar-menu">
            <ul>
                <li class="menu-title">Opciones</li>


                <li>
                    <a href="{{ route('citas') }}" class="waves-effect"><i class="mdi mdi-calendar-clock"></i><span> Agendar Cita </span></a>
                </li>

                <li>
                    <a href="{{ route('perfil') }}" class="waves-effect"><i class="mdi mdi-calendar-clock"></i><span> Mis Datos </span></a>
                </li>

                <li>
                    <a href="{{ route('historial') }}" class="waves-effect"><i class="mdi mdi-calendar-clock"></i><span> Historial </span></a>
                </li>
                <li>
                    <a data-target='#salirModal' data-toggle='modal' class="waves-effect"><i class="mdi mdi-close"></i><span> Cerrar Sesión </span></a>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div> <!-- end sidebarinner -->
</div>

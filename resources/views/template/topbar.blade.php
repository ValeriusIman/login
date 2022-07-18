<!-- Right navbar links -->
<ul class="navbar-nav ml-auto">
    <!-- Messages Dropdown Menu -->
    <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-user"></i>
            <span class="hidden-xs">{{$session['name']}}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <div class="dropdown-divider"></div>
            <div class="dropdown-divider"></div>
            <a href="{{route('/logout')}}" class="dropdown-item">
                <i class="fas fa-fw fa-power-off mr-2"></i>Keluar
            </a>
        </div>
    </li>
</ul>

<div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
                <a href="{{url('/dashboard')}}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            @if($session['role'] === 'admin')
                <li class="nav-item">
                    <a href="{{url('/user')}}" class="nav-link">
                        <i class="nav-icon fas fa-user-alt"></i>
                        <p>
                            User
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/json')}}" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>
                            Data Json
                        </p>
                    </a>
                </li>
            @endif
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>

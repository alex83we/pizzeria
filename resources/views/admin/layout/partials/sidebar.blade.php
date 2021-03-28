<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link text-center">
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/images/{{ auth()->user()->photo == '' ? 'default.png' : 'profile_picture/'.auth()->user()->photo }}" alt="{{ Auth::user()->name }}" class="img-circle elevation-2">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard.index') }}" class="nav-link {{ Request::is('admin') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-chalkboard"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('admin/benutzereinstellungen*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::is('admin/benutzereinstellungen*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Benutzereinstellungen
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.user.profile') }}" class="nav-link {{ Request::is('admin/benutzereinstellungen/profile*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Profile</p>
                            </a>
                        </li>
                        {{--<li class="nav-item">
                            <a href="{{ route('admin.photo.index') }}" class="nav-link {{ Request::is('admin/benutzereinstellungen/photo*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-image"></i>
                                <p>Foto ändern</p>
                            </a>
                        </li>--}}
                        <li class="nav-item">
                            <a href="{{ route('admin.user.getPassword') }}" class="nav-link {{ Request::is('admin/benutzereinstellungen/password*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-lock"></i>
                                <p>Passwort ändern</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{--<li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-bell nav-icon"></i>
                        <p>Benachrichtigung</p>
                    </a>
                </li>--}}
                <li class="nav-header">Firmen Einstellung</li>
                <li class="nav-item">
                    <a href="{{ route('admin.firma.index') }}" class="nav-link {{ Request::is('admin/firma') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-building"></i>
                        <p>
                            Firmenverwaltung
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.zutaten.index') }}" class="nav-link {{ Request::is('admin/zutaten') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-pizza-slice"></i>
                        <p>
                            Zutaten
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.kategorien.index') }}" class="nav-link {{ Request::is('admin/kategorien') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-bars"></i>
                        <p>
                            Kategorien
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/kanban.html" class="nav-link {{ Request::is('admin/speisekarte') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file"></i>
                        <p>
                            Speisekarte
                        </p>
                    </a>
                </li>
                @canany(['create user', 'create permission', 'create role'])
                <li class="nav-header">Admin</li>
                <li class="nav-item {{ Request::is('admin/management*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::is('admin/management*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @canany(['create role','create permission'])
                            <li class="nav-item">
                                <a href="{{ route('admin.role.index') }}" class="nav-link {{ Request::is('admin/management/role*') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>Rollenverwaltung</p>
                                </a>
                            </li>
                        @endcanany
                        @can('create permission')
                            <li class="nav-item">
                                <a href="{{ route('admin.permission.index') }}" class="nav-link {{ Request::is('admin/management/permission*') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-user-tag"></i>
                                    <p>Berechtigungen</p>
                                </a>
                            </li>
                        @endcan
                        @can('create user')
                        <li class="nav-item">
                            <a href="{{ route('admin.user.index') }}" class="nav-link {{ Request::is('admin/management/user*') ? 'active' : '' }}">
                                <i class="fas fa-users-cog nav-icon"></i>
                                <p>Users</p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcanany
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-power-off"></i>
                        <p>
                            {{ __('Logout') }}
                        </p>
                        <form id="logout-form-sidebar" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
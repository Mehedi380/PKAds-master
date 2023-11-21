<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ config('app.name', 'PKAds') }}</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" />

    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css"
        href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>

<body class="app sidebar-mini rtl">
    <script>
        // If you put this on end of the body it doesn't work properly
        if (localStorage.getItem('sidebarStyle')) {
            $('.app').addClass('sidenav-toggled');
        }

    </script>
    <!-- Navbar-->
    <header class="app-header">
        <a class="app-header__logo" href="{{ url('dashboard') }}">{{
                config('app.name', 'PKAds')
            }}</a>
        <!-- Sidebar toggle button-->
        <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
        <!-- Navbar Right Menu-->
        <ul class="app-nav">
            <!-- User Menu-->
            <li class="dropdown">
                <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i
                        class="fa fa-user fa-lg"></i></a>
                <ul class="dropdown-menu settings-menu dropdown-menu-right">
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out fa-lg"></i>{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <div class="app-sidebar__user">
            <img class="app-sidebar__user-avatar" src="{{ asset('images/profile.png') }}"
                alt="{{ Auth::user()->first_name }}" />
            <div>
                <p class="app-sidebar__user-name">
                    {{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}
                </p>
                <p class="app-sidebar__user-designation">System Admin</p>
            </div>
        </div>
        <ul class="app-menu">
            <li>
                <a class="app-menu__item" href="{{ url('dashboard') }}">
                    <i class="app-menu__icon fa fa-dashboard"></i>
                    <span class="app-menu__label">
                        {{ __('Dashboard') }}
                    </span>
                </a>
            </li>
            <li class="treeview">
                <a class="app-menu__item" href="#" data-toggle="treeview">
                    <i class="app-menu__icon fa fa-pie-chart"></i>
                    <span class="app-menu__label">{{ __('Agents') }}</span>
                    <i class="treeview-indicator fa fa-angle-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a class="treeview-item" href="{{ route('agents.index') }}">
                            <i class="icon fa fa-circle-o"></i>
                            {{ __('All Agents') }}
                        </a>
                    </li>
                    <li>
                        <a class="treeview-item" href="{{ route('agents.create') }}" rel="noopener">
                            <i class="icon fa fa-circle-o"></i>
                            {{ __('Add Agent') }}
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a class="app-menu__item" href="#" data-toggle="treeview">
                    <i class="app-menu__icon fa fa-laptop"></i>
                    <span class="app-menu__label">{{ __('Clients') }}</span>
                    <i class="treeview-indicator fa fa-angle-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a class="treeview-item" href="{{ route('clients.index') }}">
                            <i class="icon fa fa-circle-o"></i>
                            {{ __('All Clients') }}
                        </a>
                    </li>
                    <li>
                        <a class="treeview-item" href="{{ route('clients.create') }}" rel="noopener">
                            <i class="icon fa fa-circle-o"></i>
                            {{ __('Add Client') }}
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a class="app-menu__item" href="#" data-toggle="treeview">
                    <i class="app-menu__icon fa fa-th-list"></i>
                    <span class="app-menu__label">{{__('Schedules') }}</span>
                    <i class="treeview-indicator fa fa-angle-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a class="treeview-item" href="{{ route('schedules.index') }}">
                            <i class="icon fa fa-circle-o"></i>
                            {{ __('All Schedules') }}
                        </a>
                    </li>
                    <li>
                        <a class="treeview-item" href="{{ route('schedules.create') }}" rel="noopener">
                            <i class="icon fa fa-circle-o"></i>
                            {{ __('Add Schedule') }}
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a class="app-menu__item" href="#" data-toggle="treeview">
                    <i class="app-menu__icon fa fa-th-list"></i>
                    <span class="app-menu__label">{{__('DSRs') }}</span>
                    <i class="treeview-indicator fa fa-angle-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a class="treeview-item" href="{{ route('dsrs.index') }}">
                            <i class="icon fa fa-circle-o"></i>
                            {{ __('All DSRs') }}
                        </a>
                    </li>
                    <li>
                        <a class="treeview-item" href="{{ route('dsrs.create') }}" rel="noopener">
                            <i class="icon fa fa-circle-o"></i>
                            {{ __('Add DSR') }}
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="app-menu__item" href="{{ url('bills') }}">
                    <i class="app-menu__icon fa fa-usd"></i>
                    <span class="app-menu__label">
                        {{ __('Bills') }}
                    </span>
                </a>
            </li>
            @if (Auth::user()->role == 1)
            <li class="treeview">
                <a class="app-menu__item" href="#" data-toggle="treeview">
                    <i class="app-menu__icon fa fa-laptop"></i>
                    <span class="app-menu__label">{{ __('Admins') }}</span>
                    <i class="treeview-indicator fa fa-angle-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a class="treeview-item" href="{{ route('admins.index') }}">
                            <i class="icon fa fa-circle-o"></i>
                            {{ __('All Admins') }}
                        </a>
                    </li>
                    <li>
                        <a class="treeview-item" href="{{ route('admins.create') }}" rel="noopener">
                            <i class="icon fa fa-circle-o"></i>
                            {{ __('Add Admin') }}
                        </a>
                    </li>
                </ul>
            </li>
            @endif
        </ul>
    </aside>
    <main class="app-content">
        @yield('content')
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}" defer></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{ asset('js/plugins/pace.min.js') }}"></script>
    <!-- Data table plugin-->
    <script type="text/javascript" src="{{ asset('js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/bootstrap-notify.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/bootstrap-datepicker.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/select2.min.js') }}"></script>
    <script type="text/javascript">
        $('.data-table').DataTable();
        $('.select2').select2();
        $('.date-picker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true
        });

        $('.app-menu a[href^="' + location.href + '"].app-menu__item').addClass('active');
        $('a[href^="' + location.href + '"]').closest('.treeview').addClass('is-expanded');

    </script>
    @if(Session::has('response'))
    <script>
        var toastData = {
            html: '{{Session::get("response.message")}}',
            classes: '{{Session::get("response.type") == "success" ? "green" : "red"}}'
        };
        $.notify({
            title: '',
            message: '{{Session::get("response.message")}}',
            icon: '{{Session::get("response.type") == "success" ? "fa fa-check" : "fa fa-close"}}'
        }, {
            type: '{{Session::get("response.type") == "success" ? "success" : "danger"}}'
        });

    </script>
    @endif
</body>

</html>

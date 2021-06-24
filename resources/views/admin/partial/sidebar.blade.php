

<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html"> <img alt="image" src="{{ asset('assets/img/favicon.ico') }}" class="header-logo" /> <span
                    class="logo-name">Object Finder</span>
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="dropdown active">
                <a href="index.html" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown">
                <a href="{{ url('admin/users_list') }}" class="nav-link"><i data-feather="monitor"></i><span>Users List</span></a>
            </li>
            <li class="dropdown">
                <a href="{{ url('admin/create_blog') }}" class="nav-link"><i data-feather="monitor"></i><span>Create Blog</span></a>
            </li>
            <li class="dropdown">
                <a href="{{ url('admin/my_blog') }}" class="nav-link"><i data-feather="monitor"></i><span>My Blog</span></a>
            </li>

            {{-- <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i
                            data-feather="monitor"></i><span>Brokers</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="index.php?nav=add_brokers">Add Broker</a></li>
                    <li><a class="nav-link" href="index.php?nav=brokers">Brokers List</a></li>
                </ul>
            </li> --}}






<!--             <li class="dropdown">-->
<!--               <a href="#" class="menu-toggle nav-link has-dropdown"><i-->
<!--                   data-feather="briefcase"></i><span>Widgets</span></a>-->
<!--               <ul class="dropdown-menu">-->
<!--                 <li><a class="nav-link" href="widget-chart.html">Chart Widgets</a></li>-->
<!--                 <li><a class="nav-link" href="widget-data.html">Data Widgets</a></li>-->
<!--               </ul>-->
<!--             </li>-->
        </ul>
    </aside>
</div>

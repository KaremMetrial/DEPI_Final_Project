<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                        class="fas fa-search"></i></a></li>
        </ul>
    </form>
    <ul class="navbar-nav navbar-right">

        <li class="dropdown"><a href="#" data-toggle="dropdown"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{ asset(Auth::user()->avatar)  }}" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">{{ Auth::user()->name }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">Logged in 5 min ago</div>
                <a href="{{ route('admin.profile') }}" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profile
                </a>
                <a href="features-activities.html" class="dropdown-item has-icon">
                    <i class="fas fa-bolt"></i> Activities
                </a>
                <a href="features-settings.html" class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i> Settings
                </a>


                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('logout')"
                                     onclick="event.preventDefault();
                                                this.closest('form').submit();">
                        <i class="fas fa-sign-out-alt"></i> {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>


            </div>
        </li>
    </ul>
</nav>
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>

            <li class="{{ Str::startsWith(Route::currentRouteName(), 'admin.dashboard') ? 'active' : '' }}"><a
                    class=" nav-link" href="{{ route('admin.dashboard') }}"><i class="fas fa-fire"></i>General Dashboard</a>
            </li>

            <li class="menu-header">Starter</li>
            {{--
                        <li class="dropdown">
                                        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Layout</span></a>
                                        <ul class="dropdown-menu">
                                            <li><a class="nav-link" href="layout-default.html">Default Layout</a></li>
                                            <li><a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a></li>
                                            <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
                                        </ul>
                                    </li>
                                    --}}
            <li class="{{ Str::startsWith(Route::currentRouteName(), 'admin.slider') ? 'active' : '' }}"><a
                    class="nav-link" href="{{ route('admin.slider.index') }}"><i class="far fa-square"></i>
                    <span>Slider</span></a></li>
            <li class="dropdown {{ Str::startsWith(Route::currentRouteName(), 'admin.category') || Str::startsWith(Route::currentRouteName(), 'admin.product') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-columns"></i> <span>Manage Restaurant</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ Str::startsWith(Route::currentRouteName(), 'admin.category') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.category.index') }}" >
                            <i class="far fa-square"></i> <span>Products Category</span>
                        </a>
                    </li>
                    <li class="{{ Str::startsWith(Route::currentRouteName(), 'admin.product') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.product.index') }}" >
                            <i class="far fa-square"></i> <span>Products</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="{{ Str::startsWith(Route::currentRouteName(), 'admin.setting') ? 'active' : '' }}"><a
                    class="nav-link" href="{{ route('admin.setting.index') }}"><i class="far fa-square"></i>
                    <span>Setting</span></a></li>

        </ul>

    </aside>
</div>


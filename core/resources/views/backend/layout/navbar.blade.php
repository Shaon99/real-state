<nav class="navbar navbar-expand-lg main-navbar">

    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li class="bars-icon-navbar"><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg "><i
                        class="fas fa-bars"></i></a></li>

            </li>
        </ul>
        
    </form>


    <ul class="navbar-nav navbar-right">
        <li class="my-auto mx-2">
            <a href="{{ route('home') }}" target="_blank"
            class="visit-site-btn"><i
                class="fas fa-globe-africa "></i><span
                class="visit_site">{{ __('Visit Site') }}</span></a>
        </li>
     


        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">

                <div class="d-lg-inline-block text-capitalize">{{ __('Hi') }},
                    {{ auth()->guard('admin')->user()->username }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">

                <a href="{{ route('admin.profile') }}" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> {{ __('Profile') }}
                </a>

                <a href="{{ route('admin.logout') }}" class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                </a>
            </div>
        </li>
    </ul>
</nav>

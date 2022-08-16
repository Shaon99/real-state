<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a class="text-white" href="{{ route('admin.home') }}">{{ @$general->sitename }}
            </a>
        </div>

        <ul class="sidebar-menu">

            <li class="nav-item dropdown {{ menuActive('admin.home') }}">
                <a href="{{ route('admin.home') }}" class="nav-link "><i
                        class="fas fa-fire"></i><span>{{ __('Dashboard') }}</span></a>
            </li>

            
            <li class="nav-item dropdown {{ @$locationsActive }}">
                <a href="{{ route('admin.locations.index') }}" class="nav-link "><i
                        class="fa fa-map-marker"></i><span>{{ __('Location') }}</span></a>
            </li>
    
            <li class="nav-item dropdown {{ @$propertytypeActive }}">
                <a href="{{ route('admin.property-type.index') }}" class="nav-link "><i
                        class="fa fa-home"></i><span>{{ __('Property Type') }}</span></a>
            </li>

            <li class="nav-item dropdown {{ @$propertiesActive }}">
                <a href="{{ route('admin.properties.index') }}" class="nav-link "><i
                        class="fa fa-home"></i><span>{{ __('Properties') }}</span></a>
            </li>
           

            <li class="menu-header">{{ __('Email Settings') }}</li>

            <li class="nav-item dropdown {{ @$navEmailManagerActiveClass }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-envelope"></i>
                    <span>{{ __('Email Manager') }}</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ @$subNavEmailConfigActiveClass }}">
                        <a class="nav-link"
                            href="{{ route('admin.email.config') }}">{{ __('Email Configure') }}</a>
                    </li>
                    <li class="{{ @$subNavEmailTemplatesActiveClass }}">
                        <a class="nav-link"
                            href="{{ route('admin.email.templates') }}">{{ __('Email Templates') }}</a>
                    </li>

                    <li class="{{ @$subscriberActiveClass }}">
                        <a class="nav-link"
                            href="{{ route('admin.sendEmail') }}">{{ __('Email To Subscriber') }}</a>
                    </li>
                </ul>
            </li>


            <li class="menu-header">{{ __('System Settings') }}</li>

            <li class="nav-item dropdown {{ @$navGeneralSettingsActiveClass }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-cog"></i>
                    <span>{{ __('General Settings') }}</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ @$subNavGeneralSettingsActiveClass }}">
                        <a class="nav-link"
                            href="{{ route('admin.general.setting') }}">{{ __('General Settings') }}</a>
                    </li>

                    <li>
                        <a class="nav-link"
                            href="{{ route('admin.general.database') }}">{{ __('Database Backup') }}</a>
                    </li>
                    <li>
                        <a class="nav-link"
                            href="{{ route('admin.general.cacheclear') }}">{{ __('Cache Clear') }}</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown {{ @$navManagePagesActiveClass }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>{{ __('Frontend') }}</span>
                </a>

                <ul class="dropdown-menu">
                    <li class="{{ @$subNavPagesActiveClass }}">
                        <a class="nav-link" href="{{ route('admin.frontend.pages') }}">{{ __('Pages') }}</a>
                    </li>

                    @forelse($urlSections as $key => $section)
                    
                        <li class="@if(frontendFormatter($key)==frontendFormatter(@$activeClass)) active @else ' ' @endif">
                            <a class="nav-link"
                                href="{{ route('admin.frontend.section.manage', ['name' => $key]) }}">{{ frontendFormatter($key) . ' Section' }}</a>
                        </li>
                    @empty

                    @endif
                </ul>

            </li>



            <li class="nav-item dropdown {{ @$subscribersActiveClass }}">
                <a href="{{ route('admin.subscribers') }}" class="nav-link "><i
                        class="fas fa-users"></i><span>{{ __('Newsletter Subscriber') }}</span></a>
            </li>
            <li class="nav-item dropdown {{ @$contactusActiveClass }}">
                <a href="{{ route('admin.requestquery') }}" class="nav-link "><i
                        class="fas fa-users"></i><span>{{ __('Request-Query') }}</span></a>
            </li>

            <li class="nav-item dropdown {{ @$contactusActiveClass }}">
                <a href="{{ route('admin.contact-us') }}" class="nav-link "><i
                        class="fas fa-users"></i><span>{{ __('Contact-Us-Data') }}</span></a>
            </li>

        </ul>

    </aside>
</div>

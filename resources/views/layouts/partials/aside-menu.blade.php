<!--begin::Aside Menu-->
<div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
    <!--begin::Menu Container-->
    <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
        <!--begin::Menu Nav-->
        <ul class="menu-nav">

            {{-- <li class="menu-section">
                <h4 class="menu-text">Funzioni</h4>
                <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
            </li>

                <li class="menu-item menu-item-submenu {{ request()->routeIs('dashboard.placeholder.*') ? 'menu-item-active' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="{{ url('/placeholder') }}" class="menu-link">
                        <span class="menu-icon">
                            <i class="fas fa-seedling"></i>
                        </span>
                        <span class="menu-text">Placeholder</span>
                    </a>
                </li> --}}


                <!--
                --
                -- SUPER ADMIN SECTION
                --
                -->
                <li class="menu-section">
                    <h4 class="menu-text">Amministrazione</h4>
                    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                </li>

                <li class="menu-item menu-item-submenu {{ request()->routeIs('dashboard.admin.placeholder*') ? 'menu-item-open menu-item-here' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <span class="menu-icon">
                            <i class="far fa-newspaper"></i>
                        </span>
                        <span class="menu-text">Clienti</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                                <span class="menu-link">
                                    <span class="menu-text">Placeholder</span>
                                </span>
                            </li>
                        {{-- foreach con gli utenti per portare ai loro progetti --}}
                            <li class="menu-item {{ request()->routeIs('dashboard.admin.placeholder.sub-1.*') ? 'menu-item-active' : '' }}" aria-haspopup="true">
                                <a href="{{ url('/admin/placeholder/sub-1') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">Sub one</span>
                                </a>
                            </li>

                            <li class="menu-item {{ request()->routeIs('dashboard.admin.placeholder.sub-2.*') ? 'menu-item-active' : '' }}" aria-haspopup="true">
                                <a href="{{ url('/admin/placeholder/sub-2') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">Sub two</span>
                                </a>
                            </li>
                            <li class="menu-item {{ request()->routeIs('dashboard.admin.placeholder.sub-3.*') ? 'menu-item-active' : '' }}" aria-haspopup="true">
                                <a href="{{ url('/admin/placeholder/sub-3') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">Sub three</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="menu-item menu-item-submenu {{ request()->routeIs('dashboard.admin.users.*') ? 'menu-item-active' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="{{ url('/admin/users') }}" class="menu-link menu-toggle">
                            <span class="menu-icon">
                                <i class="fas fa-user-lock"></i>
                            </span>
                        <span class="menu-text">Utenti</span>
                    </a>
                </li>

        </ul>
        <!--end::Menu Nav-->
    </div>
    <!--end::Menu Container-->
</div>
<!--end::Aside Menu-->

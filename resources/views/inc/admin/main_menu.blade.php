 <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="/">
                        <div class="brand-logo"><img class="logo" src="{{ asset( \App\Settings::select('logo')->first()->value('logo'))}}" /></div>
                    </a></li>
                   
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="bx bx-x d-block d-xl-none font-medium-4 primary"></i><i class="toggle-icon bx bx-disc font-medium-4 d-none d-xl-block primary" data-ticon="bx-disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" data-icon-style="lines">              
                <li class="nav-item {{ Request::is('/dashboard') ? 'active' : '' }}"><a href="/dashboard"><i class="bx bxs-dashboard"></i><span class="menu-title">Dashboard</span></a>
                </li>
                <li class=" nav-item {{ Request::is('plans*') ? 'active' : '' }}"><a href="{{ route('plans.index') }}"><i class="bx bx-briefcase-alt-2"></i><span class="menu-title" data-i18n="User">Plans</span></a>
                </li>
                <li class=" nav-item {{ Request::is('categories*') ? 'active' : '' }}"><a href="{{ route('category.index') }}"><i class="bx bx-receipt"></i><span class="menu-title">Products Category</span></a>
                </li>
                <li class=" nav-item {{ Request::is('products*') ? 'active' : '' }}"><a href="{{ route('products.index') }}"><i class="fa fa-shopping-cart"></i><span class="menu-title">Products</span></a>
                </li>
                <li class=" nav-item {{ Request::is('upsells*') ? 'active' : '' }}"><a href="{{ route('upsells.index') }}"><i class="bx bx-package"></i><span class="menu-title">Upsells</span></a>
                </li>
                <li class=" nav-item {{ Request::is('suggestion*') ? 'active' : '' }}"><a href="{{ route('suggestion.index') }}"><i class="bx bxs-file"></i><span class="menu-title">Suggested Products</span></a>
                </li>
                <li class=" nav-item {{ Request::is('users*') ? 'active' : '' }}"><a href="{{ route('users.index') }}"><i class="bx bxs-user-pin"></i><span class="menu-title">Subscribers</span></a>
                </li>
                <li class=" nav-item {{ Request::is('ambassadors*') ? 'active' : '' }}"><a href="{{ route('ambassadors.index') }}"><i class="bx bxs-user"></i><span class="menu-title">Ambassadors</span></a>
                </li>
                <li class=" nav-item {{ Request::is('testimonials*') ? 'active' : '' }}"><a href="{{ route('testimonials.index') }}"><i class="fa fa-quote-left"></i><span class="menu-title">Testimonials</span></a>
                </li>

                <li class=" nav-item {{ Request::is('transactions*') ? 'active' : '' }}"><a href="{{ route('transactions.index') }}"><i class="bx bxs-wallet-alt"></i><span class="menu-title">Transactions</span></a>
                </li>

                <li class=" nav-item {{ Request::is('payouts*') ? 'active' : '' }}"><a href="{{ route('payouts.index') }}"><i class="bx bx-money"></i><span class="menu-title">Payouts</span></a>
                </li>
                <li class=" nav-item {{ Request::is('salespage*') ? 'active' : '' }}"><a href="{{ route('salespage') }}"><i class="fa fa-link"></i><span class="menu-title">Salespage Requests</span></a>
                </li>

                <li class=" nav-item {{ Request::is('settings*') ? 'active' : '' }}"><a href="{{ route('settings.index') }}"><i class="menu-livicon" data-icon="wrench"></i><span class="menu-title" data-i18n="Account Settings">Settings</span></a>
                </li>

        </div>
    </div>
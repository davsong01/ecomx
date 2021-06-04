<!-- Preloader Start -->
<header>
    <!-- Header Start -->
   <div class="header-area header-transparent">
        <div class="main-header">
           <div class="header-bottom  header-sticky">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-2 col-lg-2 col-md-1">
                            <div class="logo">
                              <a href="/"><img class="dlogo" src="{{ asset( \App\Settings::select('logo')->first()->value('logo'))}}" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10 col-md-8">
                            <!-- Main-menu -->
                            <div class="main-menu f-right d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">  
                                                                                                                                                                      
                                        <li><a href="/">Home</a></li>
                                        <li><a href="#about">About</a></li>
                                        <li><a href="{{ route('contact') }}">Contact</a></li>
                                        <li><a href="https://blog.ecomx.com.ng">Blog</a></li>
                                        <li><a href="/forum">Forum</a></li>
                                        @guest
                                        <li class="add-list"><a href="/login"><i class="fa fa-sign-in"></i>Sign in</a></li>
                                        <li class="add-list"><a href="/register"><i class="fa fa-sign-out"></i>Sign Up</a></li>
                                        @else
                                        <li class={{ Request::is('/dashboard') ? "active" : "" }}><a href="{{ route('dashboard') }}"><i class="fa fa-sign-in"></i>My Account</a>
                                            <ul class="submenu">
                                                <li class="{{ Request::is('/dashboard') ? "active" : "" }}"><a href="{{ route('dashboard') }}">Dashboard</li></a>
                                                <li class="{{ Request::is('/update_profile') ? "active" : "" }}"><a href="{{ route('update_profile', auth()->user()->id) }}">My Profile</a></li>
                                                @if(auth()->user()->referral_bonus >= \App\Settings::select('referral_threshold')->first()->value('referral_threshold'))
                                                <li class="{{ Request::is('/createwithdrawal') ? "active" : "" }}"><a href="{{ route('withdrawals') }}">Request for withdrawal</a></li>@endif
                                                <li class="{{ Request::is('/planinfo') ? "active" : "" }}"><a href="{{ route('plan.info', auth()->user()->id) }}">Plan Information</a></li>
                                            </ul>
                                        </li>
                                        <li class="add-list"> <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                                Sign out
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </li>
                                        @endguest
                                       
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
           </div>
        </div>
   </div>
    <!-- Header End -->
</header>
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
                              <a href="/"><img class="dlogo" src="<?php echo e(asset( \App\Settings::select('logo')->first()->value('logo'))); ?>" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10 col-md-8">
                            <!-- Main-menu -->
                            <div class="main-menu f-right d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">  
                                                                                                                                                                      
                                        <li><a href="/">Home</a></li>
                                        <li><a href="<?php echo e(route('about')); ?>">About</a></li>
                                        <li><a href="<?php echo e(route('faq')); ?>">FAQ</a></li>
                                        <li><a href="<?php echo e(route('contact')); ?>">Contact</a></li>
                                        <li><a href="https://blog.ecomx.com.ng">Blog</a></li>
                                        <li><a href="/forum">Forum</a></li>
                                        <?php if(auth()->guard()->guest()): ?>
                                        <li class="add-list"><a href="/login"><i class="fa fa-sign-in"></i>Sign in</a></li>
                                        <li class="add-list"><a href="/register"><i class="fa fa-sign-out"></i>Sign Up</a></li>
                                        <?php else: ?>
                                        <li><a href="<?php echo e(route('user.resources')); ?>">Resources</a></li>

                                        <li class=<?php echo e(Request::is('/dashboard') ? "active" : ""); ?>><a href="<?php echo e(route('dashboard')); ?>"><i class="fa fa-sign-in"></i>My Account</a>
                                            <ul class="submenu">
                                                <li class="<?php echo e(Request::is('/dashboard') ? "active" : ""); ?>"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</li></a>
                                                <li class="<?php echo e(Request::is('/update_profile') ? "active" : ""); ?>"><a href="<?php echo e(route('update_profile', auth()->user()->id)); ?>">My Profile</a></li>
                                                <?php if(auth()->user()->referral_bonus >= \App\Settings::select('referral_threshold')->first()->value('referral_threshold')): ?>
                                                <li class="<?php echo e(Request::is('/createwithdrawal') ? "active" : ""); ?>"><a href="<?php echo e(route('withdrawals')); ?>">Request for withdrawal</a></li><?php endif; ?>
                                                <li class="<?php echo e(Request::is('/planinfo') ? "active" : ""); ?>"><a href="<?php echo e(route('plan.info', auth()->user()->id)); ?>">Plan Information</a></li>
                                            </ul>
                                        </li>
                                        <?php if(Auth::user()->isSwitchingUser() ): ?>
                                        <li class="sidebar-item hide-menu"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                            style="color:yellow !important; font-weight:bolder" href="<?php echo e(route('stop.switchuser')); ?>" aria-expanded="false"><i class="fa fa-arrow-left"></i><span
                                                class="hide-menu">BACK TO ADMIN</span></a></li>
                                        <?php endif; ?>
                                      
                                        <li class="add-list"> <a class="nav-link" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                                Sign out
                                            </a>
                                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                                <?php echo csrf_field(); ?>
                                            </form>
                                        </li>
                                        <?php endif; ?>
                                       
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
</header><?php /**PATH C:\xampp\htdocs\Laravel Projects\EcomX\resources\views/inc/header.blade.php ENDPATH**/ ?>
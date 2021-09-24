 <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="/">
                        <div class="brand-logo"><img class="logo" src="<?php echo e(asset( \App\Settings::select('logo')->first()->value('logo'))); ?>" /></div>
                    </a></li>
                   
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="bx bx-x d-block d-xl-none font-medium-4 primary"></i><i class="toggle-icon bx bx-disc font-medium-4 d-none d-xl-block primary" data-ticon="bx-disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" data-icon-style="lines"> 
                           
                <?php if(Auth::user()->isSwitchingUser() ): ?>
                <li class="sidebar-item hide-menu"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                    style="color:yellow !important; font-weight:bolder" href="<?php echo e(route('stop.switchuser')); ?>" aria-expanded="false"><i class="fa fa-arrow-left"></i><span
                        class="hide-menu">BACK TO ADMIN</span></a></li>
                <?php endif; ?>
               
                <li class="nav-item <?php echo e(Request::is('/dashboard') ? 'active' : ''); ?>"><a href="/dashboard"><i class="bx bxs-dashboard"></i><span class="menu-title">Dashboard</span></a>
                </li>
                
                <?php if(Auth::user()->level == 2 || Auth::user()->level == 4): ?>
                <li class=" nav-item <?php echo e(Request::is('categories*') ? 'active' : ''); ?>"><a href="<?php echo e(route('category.index')); ?>"><i class="bx bx-receipt"></i><span class="menu-title">Products Category</span></a>
                </li>
                <li class=" nav-item <?php echo e(Request::is('products*') ? 'active' : ''); ?>"><a href="<?php echo e(route('products.index')); ?>"><i class="fa fa-shopping-cart"></i><span class="menu-title">Products</span></a>
                </li>
                <li class=" nav-item <?php echo e(Request::is('upsells*') ? 'active' : ''); ?>"><a href="<?php echo e(route('upsells.index')); ?>"><i class="bx bx-package"></i><span class="menu-title">Upsells</span></a>
                </li>
                <li class=" nav-item <?php echo e(Request::is('suggestion*') ? 'active' : ''); ?>"><a href="<?php echo e(route('suggestion.index')); ?>"><i class="bx bxs-file"></i><span class="menu-title">Suggested Products</span></a>
                <li class=" nav-item <?php echo e(Request::is('resource*') ? 'active' : ''); ?>"><a href="<?php echo e(route('resource.index')); ?>"><i class="fa fa-video-camera"></i><span class="menu-title">Resources</span></a>
                </li>

                <?php endif; ?>

                <?php if(Auth::user()->level == 2 || Auth::user()->level == 3): ?> 
                <li class=" nav-item <?php echo e(Request::is('users*') ? 'active' : ''); ?>"><a href="<?php echo e(route('users.index')); ?>"><i class="bx bxs-user-pin"></i><span class="menu-title">Subscribers</span></a>
                </li>
                <li class=" nav-item <?php echo e(Request::is('ambassadors*') ? 'active' : ''); ?>"><a href="<?php echo e(route('ambassadors.index')); ?>"><i class="bx bxs-user"></i><span class="menu-title">Ambassadors</span></a>
                </li>
                <li class=" nav-item <?php echo e(Request::is('testimonials*') ? 'active' : ''); ?>"><a href="<?php echo e(route('testimonials.index')); ?>"><i class="fa fa-quote-left"></i><span class="menu-title">Testimonials</span></a>
                </li>
                <?php endif; ?>
                <?php if(Auth::user()->level == 2): ?>
                
                <li class=" nav-item <?php echo e(Request::is('plans*') ? 'active' : ''); ?>"><a href="<?php echo e(route('plans.index')); ?>"><i class="bx bx-briefcase-alt-2"></i><span class="menu-title" data-i18n="User">Plans</span></a>
                </li>

                <li class=" nav-item <?php echo e(Request::is('transactions*') ? 'active' : ''); ?>"><a href="<?php echo e(route('transactions.index')); ?>"><i class="bx bxs-wallet-alt"></i><span class="menu-title">Transactions</span></a>
                </li>

                <li class=" nav-item <?php echo e(Request::is('payouts*') ? 'active' : ''); ?>"><a href="<?php echo e(route('payouts.index')); ?>"><i class="bx bx-money"></i><span class="menu-title">Payouts</span></a>
                </li>
                <li class=" nav-item <?php echo e(Request::is('salespage*') ? 'active' : ''); ?>"><a href="<?php echo e(route('salespage')); ?>"><i class="fa fa-link"></i><span class="menu-title">Salespage Requests</span></a>
                </li>
                <li class=" nav-item <?php echo e(Request::is('staff*') ? 'active' : ''); ?>"><a href="<?php echo e(route('staff.index')); ?>"><i class="bx bxs-user"></i><span class="menu-title">Staff</span></a>
                <li class=" nav-item <?php echo e(Request::is('settings*') ? 'active' : ''); ?>"><a href="<?php echo e(route('settings.index')); ?>"><i class="menu-livicon" data-icon="wrench"></i><span class="menu-title" data-i18n="Account Settings">Settings</span></a>
                </li>
                <?php endif; ?>

        </div>
    </div><?php /**PATH C:\xampp\htdocs\Laravel Projects\EcomX\resources\views/inc/admin/main_menu.blade.php ENDPATH**/ ?>
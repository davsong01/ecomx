<!doctype html>
<html class="no-js" lang="zxx">
    <?php echo $__env->make('inc.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

   <body>

    <?php echo $__env->make('inc.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <main>

        <!-- Hero Area Start-->
        <?php echo $__env->yieldContent('slider'); ?>
        <!--Hero Area End-->
        <!-- Popular Locations Start -->

        <!--Breadcrumbs---->
        <section class="contact-section">
            <div class="container">
                
                <div class="row">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo $__env->yieldContent('inactive'); ?></a></li>
                              <li class="breadcrumb-item active"><?php echo $__env->yieldContent('active'); ?></li>
                            </ol>
                          </nav>
                    </div>
                   
                </div>
            </div>
        </section>
        <?php echo $__env->yieldContent('main'); ?>

    </main>
    <?php echo $__env->yieldContent('content'); ?>
    <?php echo $__env->make('inc.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Scroll Up -->
    <div id="back-top" >
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>


    <!-- JS here -->
		<!-- All JS Custom Plugins Link Here here -->
        <script src="<?php echo e(asset('js/vendor/modernizr-3.5.0.min.js')); ?>"></script>
		<!-- Jquery, Popper, Bootstrap -->
		<script src="<?php echo e(asset('js/vendor/jquery-1.12.4.min.js')); ?>"></script>
        
	    <!-- Jquery Mobile Menu -->
        <script src="<?php echo e(asset('js/jquery.slicknav.min.js')); ?>"></script>

		<!-- Jquery Slick , Owl-Carousel Plugins -->
        
        <script src="<?php echo e(asset('js/slick.min.js')); ?>"></script>
		<!-- One Page, Animated-HeadLin -->
        <script src="<?php echo e(asset('js/wow.min.js')); ?>"></script>
		<script src="<?php echo e(asset('js/animated.headline.js')); ?>"></script>
        <script src="<?php echo e(asset('js/jquery.magnific-popup.js')); ?>"></script>

		<!-- Nice-select, sticky -->
        <script src="<?php echo e(asset('js/jquery.nice-select.min.js')); ?>"></script>
		<script src="<?php echo e(asset('js/jquery.sticky.js')); ?>"></script>
        
        <!-- contact js -->
        <script src="<?php echo e(asset('js/contact.js')); ?>"></script>
        <script src="<?php echo e(asset('js/jquery.form.js')); ?>"></script>
        <script src="<?php echo e(asset('js/jquery.validate.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/mail-script.js')); ?>"></script>
        <script src="<?php echo e(asset('js/jquery.ajaxchimp.min.js')); ?>"></script>
        
		<!-- Jquery Plugins, main Jquery -->	
        <script src="<?php echo e(asset('js/plugins.js')); ?>"></script>
        <script src="<?php echo e(asset('js/main.js')); ?>"></script>
        <script src="<?php echo e(asset('js/popper.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>

        <!--Single products page--->
        <script src="<?php echo e(asset('single_products_assets/js/jquery-3.3.1.min.js')); ?>"></script>
        <script src="<?php echo e(asset('single_products_assets/js/popper.min.js')); ?>"></script>
        <script src="<?php echo e(asset('single_products_assets/js/bootstrap.min.js')); ?>"></script>
        <script src="<?php echo e(asset('single_products_assets/js/owl.carousel.min.js')); ?>"></script>
        <script src="<?php echo e(asset('single_products_assets/js/main.js')); ?>"></script>
        
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\Laravel Projects\EcomX\resources\views/layouts/dashboard.blade.php ENDPATH**/ ?>
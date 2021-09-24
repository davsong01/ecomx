<!doctype html>
<html>
    <?php echo $__env->make('inc.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

   <body>
    
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="<?php echo e(asset(\App\Settings::select('preloader')->first()->value('preloader'))); ?>" alt="">
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('inc.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <main>

        <!-- Hero Area Start-->
        <?php echo $__env->yieldContent('slider'); ?>
        <!--Hero Area End-->
        <!-- Popular Locations Start -->

        <?php echo $__env->yieldContent('main'); ?>
       

    </main>
    <div>
        <?php echo $__env->yieldContent('content'); ?>
    </div>
    
    <?php echo $__env->make('inc.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Scroll Up -->
    


        <!-- JS here -->
		<!-- All JS Custom Plugins Link Here here -->
        <script src="<?php echo e(asset('js/vendor/modernizr-3.5.0.min.js')); ?>"></script>
		<!-- Jquery, Popper, Bootstrap -->
		<script src="<?php echo e(asset('js/vendor/jquery-1.12.4.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/popper.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
	    <!-- Jquery Mobile Menu -->
        <script src="<?php echo e(asset('js/jquery.slicknav.min.js')); ?>"></script>

		<!-- Jquery Slick , Owl-Carousel Plugins -->
        <script src="<?php echo e(asset('js/owl.carousel.min.js')); ?>"></script>
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
        <!--Start of Tawk.to Script-->
        <script type="text/javascript">
            var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
            (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/60e0c61e649e0a0a5cca64bd/1f9n0br47';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
            })();
        </script>
    <!--End of Tawk.to Script-->
    </body>
</html><?php /**PATH C:\xampp\htdocs\Laravel Projects\EcomX\resources\views/layouts/app.blade.php ENDPATH**/ ?>
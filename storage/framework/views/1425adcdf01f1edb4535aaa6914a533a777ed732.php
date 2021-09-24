<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo e(config('app.name')); ?> - <?php echo $__env->yieldContent('title', 'Nigeria’s first affiliate Mini eCom Platform'); ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset(\App\Settings::select('favicon')->first()->value('favicon'))); ?>">


    

    <!-- jQuery -->
    <script src="//code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/slicknav.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/flaticon.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/animate.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/magnific-popup.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/fontawesome-all.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/themify-icons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/slick.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/nice-select.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    <style>
        
        body {
            padding: 30px 0;
        }

        textarea {
            min-height: 200px;
        }

        .deleted {
            opacity: 0.65;
        }
    </style>

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
</head>
<body style="padding: 0; !important">
    
    <?php echo $__env->make('inc.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 
    <main>

    <!-- Hero Start-->
        <div class="hero-area2  slider-height2 hero-overly d-flex align-items-center" style="min-height: 200px;  !important">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center pt-50">
                            <h3 style="color: white;"><?php echo e(config('app.name')); ?> Community</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!--Hero End -->

        <div class="container mb-20" >
            <?php echo $__env->make('forum::partials.breadcrumbs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('forum::partials.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </main>

    <script>
    var toggle = $('input[type=checkbox][data-toggle-all]');
    var checkboxes = $('table tbody input[type=checkbox]');
    var actions = $('[data-actions]');
    var forms = $('[data-actions-form]');
    var confirmString = "<?php echo e(trans('forum::general.generic_confirm')); ?>";

    function setToggleStates() {
        checkboxes.prop('checked', toggle.is(':checked')).change();
    }

    function setSelectionStates() {
        checkboxes.each(function() {
            var tr = $(this).parents('tr');

            $(this).is(':checked') ? tr.addClass('active') : tr.removeClass('active');

            checkboxes.filter(':checked').length ? $('[data-bulk-actions]').removeClass('hidden') : $('[data-bulk-actions]').addClass('hidden');
        });
    }

    function setActionStates() {
        forms.each(function() {
            var form = $(this);
            var method = form.find('input[name=_method]');
            var selected = form.find('select[name=action] option:selected');
            var depends = form.find('[data-depends]');

            selected.each(function() {
                if ($(this).attr('data-method')) {
                    method.val($(this).data('method'));
                } else {
                    method.val('patch');
                }
            });

            depends.each(function() {
                (selected.val() == $(this).data('depends')) ? $(this).removeClass('hidden') : $(this).addClass('hidden');
            });
        });
    }

    setToggleStates();
    setSelectionStates();
    setActionStates();

    toggle.click(setToggleStates);
    checkboxes.change(setSelectionStates);
    actions.change(setActionStates);

    forms.submit(function() {
        var action = $(this).find('[data-actions]').find(':selected');

        if (action.is('[data-confirm]')) {
            return confirm(confirmString);
        }

        return true;
    });

    $('form[data-confirm]').submit(function() {
        return confirm(confirmString);
    });
    </script>

    <?php echo $__env->yieldContent('footer'); ?>
    <?php echo $__env->make('inc.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div id="back-top" >
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>
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
</body>
</html>
<?php /**PATH C:\xampp\htdocs\Laravel Projects\EcomX\resources\views/vendor/forum/master.blade.php ENDPATH**/ ?>
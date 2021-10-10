<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo e(config('app.name')); ?> - <?php echo $__env->yieldContent('title', 'Nigeria’s first full blown drop-ship/Mini eCom platform and more'); ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset(\App\Settings::select('favicon')->first()->value('favicon'))); ?>">

    <!-- CSS here -->
    
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
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
    <link rel="stylesheet" href="<?php echo e(asset('css/ckeditor.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('single_products_assets/fonts/icomoon/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('single_products_assets/css/owl.carousel.min.css')); ?>">
    
    <!-- Single product page style -->
    <link rel="stylesheet" href="<?php echo e(asset('single_products_assets/css/bootstrap.min.css')); ?>">
    <!-- Style -->
    <link rel="stylesheet" href="<?php echo e(asset('single_products_assets/css/style.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

   
    <?php echo $__env->yieldContent('extra-css'); ?>
    <style>
       .accordion {
          background-color: #eee;
          color: #444;
          cursor: pointer;
          padding: 18px;
          width: 100%;
          border: none;
          text-align: left;
          outline: none;
          font-size: 15px;
          transition: 0.4s;
        }
        
        .active, .accordion:hover {
          background-color: #ccc;
        }
        
        .accordion:after {
          content: '\002B';
          color: #777;
          font-weight: bold;
          float: right;
          margin-left: 5px;
        }
        
        .active:after {
          content: "";
        }
        
        .panel {
          padding: 0 18px;
          background-color: white;
          max-height: 0;
          overflow: hidden;
          transition: max-height 0.2s ease-out;
        }
    </style>
</head><?php /**PATH C:\xampp\htdocs\Laravel Projects\EcomX\resources\views/inc/head.blade.php ENDPATH**/ ?>
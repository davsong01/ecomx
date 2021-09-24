<?php $__env->startSection('slider'); ?>
    <div class="slider-area hero-overly">
        <div class="single-slider hero-overly  slider-height d-flex align-items-center" style="min-height:600px !important">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-9">
                        <!-- Hero Caption -->
                        <div class="hero__caption">
                            <h1>Start Your eCom Business With Nearly Zero Budget</h1>
                        </div>
                        
                    </div>
                </div>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>
<div class="categories-area section-padding30">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Section Tittle -->
                <div class="section-tittle text-center mb-80">
                    <span style="margin-bottom: 0px !important;">Overview</span>
                    <h2>What is eComX?</h2>
                </div>  
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <iframe width="100%" height="460" src="https://www.youtube-nocookie.com/embed/ZHPTkMHM5bk?controls=0?rel=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen ></iframe>
            </div>
           
        </div>
        <div class="row justify-content-center">
            <div class="room-btn pt-20">
                <a href="https://youtube.com/playlist?list=PLyQJmMWtIpCBoEgf9qodgkITU4U7dwWdn" class="btn view-btn1" target="_blank">Check out more eComX videos</a>
            </div>
        </div>
        
    </div>
</div>
<!-- Categories Area Start -->
<div class="categories-area section-padding30" id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Section Tittle -->
                <div class="section-tittle text-center mb-80">
                    <span style="margin-bottom: 0px !important;">About</span>
                    <h2>Why <?php echo e(config('app.name')); ?></h2>
                </div>  
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-cat text-center mb-50">
                    <div class="">
                        <span><img class="about" src="<?php echo e(asset('images/site/free.png')); ?>" alt=""></span>
                    </div>
                    <div class="cat-cap">
                        <h5><a href="">No Product cost</a></h5>
                        <p>Zero Product Cost Up-front <br><br></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-cat text-center mb-50">
                    <div>
                        <span><img class="about" src="<?php echo e(asset('images/site/shipping.png')); ?>" alt=""></span>
                    </div>
                    <div class="cat-cap">
                        <h5><a href="">No import costs</a></h5>
                        <p>No More Paying for Expensive Shipping Fee from China </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-cat text-center mb-50">
                    <div>
                        <span><img class="about" src="<?php echo e(asset('images/site/copy.png')); ?>" alt=""></span>
                    </div>
                    <div class="cat-cap">
                        <h5><a href="">Pre configured salespage</a></h5>
                        <p>Sales Copy Done For You </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-cat text-center mb-50">
                    <div class="">
                        <span><img class="about" src="<?php echo e(asset('images/site/advert.png')); ?>" alt=""></span>
                    </div>
                    <div class="cat-cap">
                        <h5><a>Advanced advert info</a></h5>
                        <p>Facebook Creatives & Target Audience Done For You</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Categories Area End -->
<div class="peoples-visit dining-padding-top">
    <!-- Single Left img -->
    <div class="single-visit left-img">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-lg-8">
                    <div class="visit-caption">
                        <span>How it works</span> 
                        <p><?php echo e(config('app.name')); ?> makes it easy to make money running your own eCommerce business. <br><br>

                            You absolutely need near to zero startup capital to start making huge chunk of money for yourself in the eCom space. <br><br>
                            
                            All you have to do is subscribe, get access to already available unique products in various niches, promote, we process the deliveries for you and remit your money to your account. <br><br>
                            
                            You can operate this from virtually anywhere including Sambisa forest. <br><br>
                            
                            
                            <?php echo e(config('app.name')); ?> has partnered with reliable Payment On Delivery Logistics companies that handle your deliveries effortlessly across Nigeria and Ghana. 
                           
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- peoples-visit Start -->
<div class="popular-location">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Section Tittle -->
                <div class="section-tittle text-center mb-80">
                    <span>Categories</span>
                    <div class="visit-caption">
                        <p class="normalize" style="text-align: center; important">Get Access to Unique Products in Various Niches That Sell Out in No Time</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="single-location mb-30">
                    <div class="location-img">
                        <img src="<?php echo e(asset($category->image)); ?>" alt="category_image">
                    </div>
                    <div class="location-details">
                        <p><?php echo e($category->title); ?></p>
                        <a href="#" class="location-btn"><?php echo e($category->products_count); ?> Product(s)</a>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <!-- More Btn -->
        <div class="row justify-content-center">
            <div class="room-btn pt-20">
                <a href="/register" class="btn view-btn1">Get started</a>
            </div>
        </div>
    </div>
</div>

<!-- Popular Locations End -->
<!-- Services Area Start -->
<div class="services-area pt-150 pb-150 section-bg" data-background="<?php echo e(asset('images/gallery/EASYTOEXPLORE-1.png')); ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Section Tittle -->
                <div class="section-tittle section-tittle2 text-center mb-80">
                    <span>Easy to explore</span>
                    <h2>Step by step guide</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-between">
            <div class="col-lg-3 col-md-6">
                <div class="single-services text-center mb-50">
                    <div class="services-icon">
                        <i style="font-size:30px; color: #f8971f;" class="fab fa-telegram-plane"></i>
                        
                    </div>
                    <div class="services-cap">
                        <h5><a href="#">1. Subscribe</a></h5>
                        <p>Subscribe to any of our flexible plans</p>
                    </div>
                    <!-- Shpape -->
                    <img class="shape1 d-none d-lg-block" src="<?php echo e(asset('images/icon/serices1.png')); ?>" alt="">
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="single-services text-center mb-50">
                    <div class="services-icon">
                        <span class="flaticon-problem"></span>
                    </div>
                    <div class="services-cap">
                        <h5><a href="#">2. Access products</a></h5>
                        <p>Get access to products/Salespage copies/Facebook ad creatives</p>
                    </div>
                    <img class="shape2 d-none d-lg-block" src="<?php echo e(asset('images/icon/serices2.png')); ?>" alt="">
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="single-services text-center mb-50">
                    
                    <div class="services-icon" >
                        <span><img src="<?php echo e(asset('images/site/loudspeaker.png')); ?>" alt=""></span>
                    </div>
                    <div class="services-cap">
                        <h5><a href="#">3. Promote products</a></h5>
                        <p>Promote products and send your orders for deliveries to be processed</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="single-services text-center mb-50">
                    <div class="services-icon">
                        <span class="flaticon-respect"></span>
                    </div>
                    <div class="services-cap">
                        <h5><a href="#">4. Receive your money</a></h5>
                        <p>Receive your money less the product fee and delivery fee weekly. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Testimonial End -->
<div class="testimonial-area testimonial-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Section Tittle -->
                <div class="section-tittle text-center">
                    <span>Flexible Plans</span>
                    <div class="visit-caption">
                        <p class="normalize" style="text-align:center !important">Your journey to earning 6 - 7 figures weekly begins by subscribing to any of the plans below. Choose the plan that best suit you. </p>
                    </div>
                </div> 
            </div>
        </div>
       
        <div class="row">
            <!-- Section Tittle -->
            <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4 col-sm-6">
                <div class="pricingTable">
                    <div class="pricingTable-header">
                        <h5><a href="#" style="color:white"><?php echo e($plan->title); ?></a></h5>
                        
                    </div>
                    <div class="pricing-icon">
                        <i class="fas fa-paper-plane"></i>
                    </div>
                    <div class="price-value">
                        <span class="amount">&#8358;<?php echo e(number_format($plan->mprice, 2)); ?></span>
                        <span class="duration">/mo</span>
                    </div>
                    <ul class="list-group list-group-flush">
                        
                        <?php $__currentLoopData = json_decode($plan->features); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="<?php echo e($feature == 'break' ? '' : 'list-group-item'); ?>" style="color: <?php echo e($feature == 'break' ? 'white' : 'black'); ?>"> <i class="fa fa-check"></i> <?php echo e($feature); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                        
                    </ul>  <br> 
                    <li class="add-list app"><a href="/register" style="color:white"><i class="fa fa-sign-in"></i>Get started</a></li>
                
                </div>  
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php if(count($testimonials) > 0): ?>
<div class="testimonial-area testimonial-padding" style="background: #06a4ad;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Section Tittle -->
                <div class="section-tittle text-center">
                    <span>Our client testimonials</span>
                    <h2>What eCom guys are saying</h2>
                </div> 
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-11 col-md-11">
                <div class="h1-testimonial-active">
                    <!-- Single Testimonial -->
                    <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="single-testimonial text-center">
                        <!-- Testimonial Content -->
                        <div class="testimonial-caption ">
                            <div class="testimonial-top-cap">
                                <p><?php echo $testimonial->content; ?></p>
                            </div>
                            <!-- founder -->
                            <div class="testimonial-founder d-flex align-items-center justify-content-center mb-30">
                                <div class="founder-img">
                                    <img src="<?php echo e(asset($testimonial->image)); ?>" alt=""  style="width: 82px; border-radius: 50%; height: 82px;">
                                </div>
                                <div class="founder-text">
                                    <span><?php echo e($testimonial->name); ?></span>
                                    <p><?php echo e($testimonial->title); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<?php if(count($ambassadors) > 0): ?>
<div class="popular-location">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Section Tittle -->
                <div class="section-tittle text-center mb-80">
                    <span><?php echo e(config('app.name')); ?>'s Ambassadors</span>
                    <p></p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php $__currentLoopData = $ambassadors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-3 col-sm-6">
                <div class="our-team">
                    <div class="pic">
                        <img src="<?php echo e(asset($a->image)); ?>">
                        <ul class="social">
                            <li><a href="<?php echo e($a->linkedin_link); ?>" class="fab fa-linkedin"></a></li>
                            <li><a href="<?php echo e($a->twitter_link); ?>" class="fab fa-twitter"></a></li>
                            <li><a href="<?php echo e($a->facebook_link); ?>" class="fab fa-facebook"></a></li>                            
                        </ul>
                    </div>
                    <div class="team-content">
                        <h3 class="title"><?php echo e($a->name); ?></h3>
                        <span class="post"><?php echo e($a->title); ?></span>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        
</div>
<?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel Projects\EcomX\resources\views/welcome.blade.php ENDPATH**/ ?>
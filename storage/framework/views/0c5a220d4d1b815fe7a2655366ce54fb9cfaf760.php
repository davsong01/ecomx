<?php $__env->startSection('extra-css'); ?>
<style>
.photo-gallery {
    color:#313437;
    background-color:#fff;
  }
  
  .photo-gallery p {
    color:#7d8285;
  }
  
  .photo-gallery h2 {
    font-weight:bold;
    margin-bottom:40px;
    padding-top:40px;
    color:inherit;
  }
  
  @media (max-width:767px) {
    .photo-gallery h2 {
      margin-bottom:25px;
      padding-top:25px;
      font-size:24px;
    }
  }
  
  .photo-gallery .intro {
    font-size:16px;
    max-width:500px;
    margin:0 auto 40px;
  }
  
  .photo-gallery .intro p {
    margin-bottom:0;
  }
  
  .photo-gallery .photos {
    padding-bottom:20px;
  }
  
  .photo-gallery .item {
    padding-bottom:30px;
  }
</style>
  
<?php $__env->stopSection(); ?>
<?php $__env->startSection('slider'); ?>
    <!-- Hero Start-->
    <div class="hero-area2  slider-height2 hero-overly2 d-flex align-items-center" style="min-height: 200px;  !important">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center pt-50">
                        <h4 style="color: white; margin-top: 50px;"><?php echo e($product->title); ?></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Hero End -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('inactive', 'Home'); ?>
<?php $__env->startSection('active', $product->title); ?>
<?php $__env->startSection('main'); ?>
<div class="listing-area pb-12">
    <div class="container mb-20">
        <div class="row">
            <!-- Right content --> 
            <div class="col-12">
                <h2 class="contact-title"><?php echo e($product->title); ?></h2>
                <?php echo $__env->make('inc.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <ul class="blog-info-link mt-3 mb-4">
                    <?php if(isset($product->category)  &&  count($product->category) > 0): ?>
                    <li>
                        <a href="#"><i class="fa fa-list-alt"></i>
                        <?php $__currentLoopData = $product->category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('category.filter', $category->slug)); ?>"><?php echo e($category->title); ?> </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </a>
                    </li>
                    <?php endif; ?>
                    <li><a href="#"><i class="fa fa-money"></i> &#8358;<?php echo e($product->price); ?></a></li>
                </ul>
            </div>
            
        </div>
        <div class="row">
            <!-- Right content -->
            <div class="col-12">
                <h5>Product images</h5>
            </div>
        </div>
        <div class="row">
            <div class="photo-gallery">
                <div class="container">
                    <div class="row photos">
                        <?php $__currentLoopData = json_decode($product->f_image); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(count(json_decode($product->f_image))  < 2 ): ?>
                         <div class="col-sm-6 col-md-12 col-lg-12 item"><a href="<?php echo e(route('get.file', $image)); ?>" data-lightbox="photos"><img class="img-fluid" src="<?php echo e(route('get.file', $image)); ?>"></a></div>
                        <?php else: ?>
                        <div class="col-sm-6 col-md-12 col-lg-4 item"><a href="<?php echo e(route('get.file', $image)); ?>" data-lightbox="photos"><img class="img-fluid" src="<?php echo e(route('get.file', $image)); ?>"></a></div>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
        </div>
        
        <?php if(isset($product->videos) && $product->videos != 'null'): ?>
        <div class="row">
            <!-- Right content -->
            <div class="col-12">
                <h5>Video Resource</h5>
            </div>

            <div class="col-12" style="display: flex;margin-top:10px">
                <?php echo $product->videos; ?>

             </div>
        </div>
        <?php endif; ?>
        <div class="row">
            <!-- Right content -->
            <div class="col-12 mt-10">
                <h5>Product Description</h5>
            </div>
            <div class="col-12 product mt-10">
                <?php echo $product->description; ?>

            </div>  
        </div>

        <div class="row">
            <?php if($isProductHasSalesPage > 0): ?>
                <button class="accordion">Salespage</button>
               
                <div class="panel ck-content">
                    <?php if(auth()->user()->plan->viewCreatives == 1): ?>
                        <p class="details">
                            <div class="count mb-10">
                                <?php if($hasPreviouslyRequested >= 31): ?>
                                    <?php if(!is_null($requestedForCurrentProduct) && $requestedForCurrentProduct->status == 0): ?>
                                        <div class="col-12">
                                            <p class="view-btn1" style="padding: 20px;
                                            text-align: center;background: #06a4ad; color: white;" disabed>Product's salespage requested, awaiting approval</p>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(!is_null($requestedForCurrentProduct) && $requestedForCurrentProduct->status == 1): ?>
                                        SalesPage demo: <a class="btn view-btn1" style="background: #06a4ad; color: white;" href="<?php echo e(route('downloadsalespagefile', $salespage_file)); ?>"> <i class="fa fa-download"></i> Download file</a><br><br>
                                    <?php endif; ?>
                                    
                                    <?php if(is_null($requestedForCurrentProduct)): ?>
                                    <span>
                                        <form action="<?php echo e(route('salespages.submit')); ?>" method="POST" onsubmit="return confirm('You are about to request for salespage for: <?php echo e($product->title); ?>');">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" value="<?php echo e($product->id); ?>" name="pid">
                                            <button class="btn view-btn1" style="background: #06a4ad; color: white;">Request this product's salespage </button>
                                        </form>
                                    </span>
                                    <?php endif; ?>

                                <?php else: ?>
                                <span>
                                    <button class="btn view-btn1" style="background: #06a4ad; color: white;" onclick="alert('You can only make 1 salespage request per month, contact us if you need more');">Request this product's salespage</button>
                                    </form>
                                </span>
                                <?php endif; ?>
                              
                            </div> 
                            Watch how to Create your own Salespage below 
                            
                        </p>
                        <div class="col-12" style="margin-top:10px;">
                            <?php echo \App\Settings::select('salespage_howto')->value('salespage_howto'); ?>

                        </div>  
                    <?php else: ?>
                        <p class="details" style="width: 100%;"><h5 style="color:red">Sorry!!!</h5> You cannot view Salespage link nor download the salespage demo except you upgrade your plan! <br><br>
                            <a style="background: #06a4ad !important;
                            border-radius: 30px;
                            padding: 10px 20px !important;
                            color:white;
                            margin: 0 11px;" href="<?php echo e(route('plan.upgrade', auth()->user()->plan->id)); ?>"><strong>Upgrade plan now</a> 
                        </p>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <button class="accordion">Facebook Ads creative </button>
            <div class="panel">
                <?php if(auth()->user()->plan->viewCreatives == 1): ?>
                <p class="details">
                    <?php echo $product->creatives; ?>

                    Watch how to Create your own Facebook Ads creative below 
                    <div class="col-12" style="margin-top:10px;">
                        <?php echo \App\Settings::select('facebook_howto')->value('facebook_howto'); ?>

                    </div>
                </p>
                <?php else: ?>
                <p class="details"><h5 style="color:red">Sorry!!!</h5> You cannot view Facebook creatives except you upgrade your plan! <strong style="color:white">ou cannot view Facebook creatives except</strong><br><br>
                    <a style="background: #06a4ad !important;
                    border-radius: 30px;
                    padding: 10px 20px !important;
                    color:white;
                    margin: 0 11px;" href="<?php echo e(route('plan.upgrade', auth()->user()->plan->id)); ?>"><strong>Upgrade plan now</strong></a> 
                    </p>
                <?php endif; ?>
            </div>
            <?php if(isset($upsell_array) && $upsell_array != null): ?>
            <button class="accordion">Upsells</button>
            <div class="panel">
                <?php if(auth()->user()->plan->viewUpsells == 1): ?>
                <p class="details">
                    
                    <div class="row">
                        <?php $__currentLoopData = $upsell_array; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $upsell): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-3 col-sm-6">
                            <div class="product-grid">
                                <div class="product-image">
                                    <a href="<?php echo e(route('single.upsell', $upsell->slug)); ?>">
                                        <img class="pic-1" src="<?php echo e(route('get.upsellfile', $upsell->main_image)); ?>">
                                        <img class="pic-2" src="<?php echo e(route('get.upsellfile', $upsell->main_image)); ?>">
                                    </a>
                                   
                                    <a class="add-to-cart" href="<?php echo e(route('single.upsell', $upsell->slug)); ?>">View</a>
                                </div>
                                <div class="product-content">
                                    <h3 class="title"><a href="<?php echo e(route('single.upsell', $upsell->slug)); ?>"><?php echo e($upsell->name); ?></a></h3>
                                    <span class="price">&#8358;<?php echo e(number_format($upsell->price, 2)); ?></span>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    </div>
                    <div class="row">
                        Watch how to Create your own Upsell Product 
                        
                        <?php echo \App\Settings::select('upsell_howto')->value('upsell_howto'); ?>

                    </div>
                    
                    
                </p>
                <?php else: ?>
                    <h5 style="color:red">Sorry!!!</h5> You cannot view upsell products except you upgrade your plan! <br><br>
                    <p class="details">
                        <a style="background: #06a4ad !important;border-radius: 30px;padding: 10px 20px !important;   color:white; margin: 0 11px;" href="<?php echo e(route('plan.upgrade', auth()->user()->plan->id)); ?>"><strong>Upgrade plan now</strong></a> 
                    </p>
                <?php endif; ?>
                
                </div>
            <?php endif; ?>
            <script>
                var acc = document.getElementsByClassName("accordion");
                var i;

                for (i = 0; i < acc.length; i++) {
                acc[i].addEventListener("click", function() {
                    this.classList.toggle("active");
                    var panel = this.nextElementSibling;
                    if (panel.style.maxHeight) {
                    panel.style.maxHeight = null;
                    } else {
                    panel.style.maxHeight = panel.scrollHeight + "px";
                    } 
                });
                }
            </script>
           
        </div>

    </div>
</div>
<!-- listing-area Area End -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel Projects\EcomX\resources\views/users/singleproduct.blade.php ENDPATH**/ ?>
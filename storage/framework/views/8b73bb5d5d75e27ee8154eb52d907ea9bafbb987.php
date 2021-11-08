<?php $__env->startSection('slider'); ?>
    <!-- Hero Start-->
    <div class="hero-area2  slider-height2 hero-overly2 d-flex align-items-center" style="min-height: 200px;  !important">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center pt-50">
                        <h2></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Hero End -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('inactive', 'Home'); ?>
<?php $__env->startSection('active', 'Upgrade/Downgrade Plan'); ?>
<?php $__env->startSection('title', 'Upgrade/Downgrade Plan'); ?>
<?php $__env->startSection('main'); ?>
     <!--================Blog Area =================-->
     <section class="blog_area single-post-area section-padding" style="padding-top: 20px;">
        <div class="container">
           <div class="row">
            <div class="col-lg-12">
                <!-- Section Tittle -->
                <div class="section-tittle text-center">
                    <span>Upgrade/Downgrade Plan</span>
                    <p>Hello <?php echo e(auth()->user()->username); ?>, you are on the <strong class="planinfo"><?php echo e(auth()->user()->plan->title); ?></strong> plan from <strong class="planinfo"><?php echo e(auth()->user()->plan_start); ?></strong> to <strong class="planinfo"><?php echo e(auth()->user()->plan_expiry); ?></strong>. <br>
                      Please choose from the options below to upgrade/downgrade your plan</p>
                    <?php echo $__env->make('inc.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>

            <div class="container-fluid" style="background: linear-gradient(90deg, #00C9FF 0%, #92FE9D 100%);">
                <div class="container p-5">
                  <div class="row">
                    <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                      <div class="col-lg-4 col-md-12 mb-4">
                        <div class="card h-100 shadow-lg">
                          <div class="card-body">
                            <div class="text-center p-3">
                              <h5 class="card-title"><?php echo e($plan->title); ?></h5>
                              <span class="h2">&#8358;<?php echo e(number_format($plan->mprice, 2)); ?>/mo</span>
                            </div>
                            
                          </div>
                          <ul class="list-group list-group-flush">
                            <?php $__currentLoopData = json_decode($plan->features); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="list-group-item"> <i class="fa fa-check"></i> <?php echo e($feature); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <form method="POST" action="<?php echo e(route('checkout')); ?>">
                              <?php echo csrf_field(); ?>
                              <select class="form-control" style="border-radius:0px !important; float: none; !important" name="price" id="price" required>
                                <option value="" selected>Choose Validity period</option>
                                <option value="<?php echo e($plan->mprice); ?>">&#8358;<?php echo e(number_format($plan->mprice, 2)); ?>/ mo</option>
                                <option value="<?php echo e($plan->threemprice); ?>">&#8358;<?php echo e(number_format($plan->threemprice, 2)); ?>/3 mo (<?php echo e($plan->threempercentoff); ?>% off)</option>
                                <option value="<?php echo e($plan->sixmprice); ?>">&#8358;<?php echo e(number_format($plan->sixmprice, 2)); ?>/6 mo (<?php echo e($plan->sixmpercentoff); ?>% off)</option>
                                <option value="<?php echo e($plan->twelvemprice); ?>">&#8358;<?php echo e(number_format($plan->twelvemprice, 2)); ?>/12 mo (<?php echo e($plan->twelvempercentoff); ?>% off)</option>
                              </select>
                            
                            </li>
                          
                          </ul>
                          
                          <div class="card-body text-right">
                            <br>
                            <input type="hidden" name="plan" value="<?php echo e($plan->id); ?>">
                            <input type="hidden" name="type" value="2">
                            <button class="btn btn-outline-primary btn-lg" style="border-radius:30px">Upgrade</button>
                            <br>
                          </div>
                        </form>
                        </div>
                      </div>
                    
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>    
                </div>
              </body>
            
             
        </div>
     </section>
 <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel Projects\EcomX\resources\views/users/upgradeplan.blade.php ENDPATH**/ ?>
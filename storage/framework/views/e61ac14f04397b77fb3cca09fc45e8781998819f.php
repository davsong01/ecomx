<?php $__env->startSection('slider'); ?>
    <!-- Hero Start-->
    <div class="hero-area2  slider-height2 hero-overly2 d-flex align-items-center" style="min-height: 200px;  !important">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center pt-50">
                        <h2 style="color: white;">All Resources</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Hero End -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('inactive', 'Home'); ?>
<?php $__env->startSection('active', 'Resources'); ?>
<?php $__env->startSection('main'); ?>
    
    <div class="listing-area pt-12 pb-12">
        <div class="container">
            <div class="row">
                <?php $__empty_1 = true; $__currentLoopData = $resources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resource): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="col-md-12 col-sm-12">
                    <div class="">
                        <p><?php echo e($resource->title); ?></p>
                        <div class="">
                            <p><?php echo $resource->link; ?></p>
                        </div>
                    </div>
                    <hr style="color: #06a4ad; height: px; border: 1px solid;">
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-md-12 col-sm-12">
                    <p>No resource currently available</p>
                </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
   
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel Projects\EcomX\resources\views/users/resources.blade.php ENDPATH**/ ?>
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
<?php $__env->startSection('active', 'Plan Information'); ?>
<?php $__env->startSection('main'); ?>
<div class="content-body">
    <!-- Basic Inputs start -->
    <section id="basic-input">
        <div class="row">
            <div class="col-12">
                <div class="card">
                   
                    <div class="card-content">
                        <div class="card-body">
                            <div class="col-lg-6 col-sm-12 col-md-6" style="margin: 0 auto;">
                                <div class="col-md-12 col-sm-12">
                                    
                                    <h4 style="display:flex">Subscribed Plan details <a href="<?php echo e(route('plan.upgrade', auth()->user()->plan->id)); ?>" class="btn btn-primary" style="display:flex;margin: 0 auto;border-radius: 20px;padding: 20px 15px;font-size: 12px;text-transform: none;">Upgrade Plan</a></h4>
                                    <?php echo $__env->make('inc.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <fieldset class="form-group">
                                        <label for="">Plan name </label>
                                        <input type="text" class="form-control" value="<?php echo e(auth()->user()->plan->title); ?>" disabled>
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label for="">Subscription Date </label>
                                        <input type="text" class="form-control" value="<?php echo e(auth()->user()->plan_start); ?>" disabled>
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label for="name">Expiry date</label>
                                        <input type="text" class="form-control" value="<?php echo e(auth()->user()->plan_expiry); ?>" disabled>
                                    </fieldset>  
                                    <a href="<?php echo e(route('dashboard')); ?>" class="btn btn-primary" style="width:100%;margin: 0 auto;" type="submit">Visit Dashboard</a>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Basic Inputs end -->          
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel Projects\EcomX\resources\views/users/planprofile.blade.php ENDPATH**/ ?>
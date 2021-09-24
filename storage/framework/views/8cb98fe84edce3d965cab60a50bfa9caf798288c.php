<?php $__env->startSection('title', 'Forgot password'); ?>
<?php $__env->startSection('slider'); ?>
    <!-- Hero Start-->
    <div class="hero-area2  slider-height2 hero-overly2 d-flex align-items-center" style="min-height: 200px;  !important">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center pt-50">
                        <h2>Reset password</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Hero End -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
    <!--Hero End -->
    <!-- ================ contact section start ================= -->
    <section class="contact-section">
        <div class="container">
            
            <div class="row">
                <div class="col-12">
                    <h2 style="text-align:center" class="contact-title"></h2>
                    
                </div>
                <div class="col-lg-12">
                   
                    <?php echo $__env->make('inc.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <form class="mb-2" method="POST" action="<?php echo e(route('password.update')); ?>">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="token" value="<?php echo e($token); ?>">
                         <div class="form-group">
                            <label class="text-bold-600" for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" value="<?php echo e($email ?? old('email')); ?>" placeholder="Enter your email">
                           
                        </div>
                        
                        <div class="form-group">
                            <label class="text-bold-600" for="password">New Password</label>
                            <input type="password" class="form-control" id="password" name="password" value="<?php echo e(old('password')); ?>" placeholder="Enter a new password">
                            
                        </div>
                        <div class="form-group mb-2">
                            <label class="text-bold-600" for="password_confirmation">Confirm New Password</label>
                            <input type="password" class="form-control" value="<?php echo e(old('password_confirmation')); ?>" id="password_confirmation" name="password_confirmation" placeholder="Confirm your new password">
                        </div>
                        <button type="submit" class="btn btn-primary glow position-relative w-100">Reset my password<i id="icon-arrow" class="bx bx-right-arrow-alt"></i></button>
                    </form>
                    <p><small><a href="/login" style="color: #3c14ff;">I remembermy password!</a></small></p>
                </div>
                
            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel Projects\EcomX\resources\views/auth/passwords/reset.blade.php ENDPATH**/ ?>
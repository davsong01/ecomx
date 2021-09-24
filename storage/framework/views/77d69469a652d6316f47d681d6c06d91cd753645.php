<?php $__env->startSection('title', 'Login'); ?>
<?php $__env->startSection('slider'); ?>
    <!-- Hero Start-->
    <div class="hero-area2  slider-height2 hero-overly2 d-flex align-items-center" style="min-height: 200px;  !important">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center pt-50">
                        <h2>Sign in</h2>
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
                    <h2 style="text-align:center" class="contact-title">Sign in</h2>
                </div>
                <div class="col-lg-6 col-sm-12 col-md-6" style="margin: 0 auto;">
                   
                    <?php echo $__env->make('inc.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <form method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input class="form-control" name="email" id="email" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your email'" placeholder="Enter your email">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input class="form-control" name="password" id="password" type="password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your password'" placeholder="Password" value="<?php echo e(old('password')); ?>" required>
                                    <p class="normalize" onclick="oldFunction()" style="margin-top: 10px;">
                                        <input type="checkbox" id="check" > &nbspShow password

                                    </p>
                                    <p class="normalize" style="margin-top: 10px;">
                                       <a href="password/reset">Forgot password?</a> 
                                    </p>
                                    <script>
                                        function oldFunction() {
                                            var x = document.getElementById("password");
                                            var c = document.getElementById("check");
                                            
                                            if (x.type === "password") {
                                                x.type = "text";
                                                c.checked="checked";
                                            } else {
                                                x.type = "password";
                                                c.checked="";
                                            }
                                            
                                        } 
                                    </script>
                                </div>
                            </div>
                            
                        </div>
                       
                        <div class="form-group mt-3">
                            <button type="submit" class="button button-contactForm boxed-btn">Login</button>
                        </div>
                    </form>
                    <p class="normalize">Don't have an account? <a href="/register" style="color: #3c14ff;">Sign Up here</a></p>
                </div>
                
            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel Projects\EcomX\resources\views/auth/login.blade.php ENDPATH**/ ?>
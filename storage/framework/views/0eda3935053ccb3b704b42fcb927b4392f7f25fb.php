<?php $__env->startSection('extra-css'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<?php $__env->stopSection(); ?>
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
<?php $__env->startSection('active', 'Select Plan'); ?>
<?php $__env->startSection('main'); ?>
     <!--================Blog Area =================-->
     <section class="blog_area single-post-area section-padding" style="padding-top: 20px;">
        <div class="container">
          <div class="row">
            <div class="col-12">
                <!-- Section Tittle -->
                <div class="section-tittle text-center">
                    <span>Checkout</span>
                    <p>You have selected the plan with the information below, click proceed to make payment for this plan or back to select another plan</p>
                    <?php echo $__env->make('inc.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12 section-tittle text-center">
                <h5 style="color:#06a4ad">Plan Name</h5>
                <?php echo e($plan->title); ?>

                <h5 style="color:#06a4ad">Plan Validity</h5>
                <?php echo e($plan->validity); ?> month(s)
                <h5 style="color:#06a4ad">Plan Price</h5>
                &#8358;<?php echo e($plan->amount); ?></h5>
            </div>
          </div> 
          <form method="POST" action="<?php echo e(route('pay')); ?>">
                <input type="hidden" name="orderID" value="<?php echo e($plan->id); ?>">
                <input type="hidden" name="email" value="<?php echo e(auth()->user()->email); ?>">
                <input type="hidden" name="amount" id="amount" value="<?php echo e($plan->amount * 100); ?>">
                
                <input type="hidden" name="quantity" value="1">
                <input type="hidden" name="currency" value="NGN">
                <input type="hidden" name="metadata"
                    value="<?php echo e(json_encode($array = ['plan_id' => $plan->id, 'validity'=> $plan->validity, 'type' => $plan->type ])); ?>">
                    <input type="hidden" name="reference" value="<?php echo e(Paystack::genTranxRef()); ?>"> 
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                
                <div class="card-body text-center"> 
                  <br>
                  <button class="btn btn-primary btn-lg" style="border-radius:30px; width:100%">Pay with Card</button>
                  <br>
                </div>
                <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-info btn-lg" style="border-radius:30px; width:100%; color:black">Pay with alternative payment</button>
                
            </form>
        </div> 
        
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <div section-tittle text-center>
          <h5 style="line-height: 1.5;"><strong>Please make payment of &#8358;<?php echo e($plan->amount); ?> into the account details below</strong><br>
            <em>Bank: </em>Access (Diamond) <br>
            <em>Account Name: </em>127 Resources <br>
            <em>Account Number: </em>0081792189 <br><br>

            After payment, kindly send the following details to <strong>+234 808 660 7905</strong> via WhatsApp <br><br>
            1. Your Name <br>
            2. Your Email <br>
            3. Your Phone number <br>
            4.  Amount Paid <br>
            5. Screenshot of payment receipt <br>
            6. <strong><?php echo e($plan->title); ?></strong> plan
          </h5>
        </div>
           
        </div>
       
      </div>
      
    </div>
  </div>
  
          <div class="card-body text-center"> 
            <a style="color:red" href="<?php echo e(route('selectplans')); ?>">Take me back, I want to choose another plan</a>
          </div>
      </body>
            
     </section>
 <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel Projects\EcomX\resources\views/users/checkout.blade.php ENDPATH**/ ?>
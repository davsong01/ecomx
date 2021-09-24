<?php $__env->startSection('slider'); ?>
    <!-- Hero Start-->
    <div class="hero-area2  slider-height2 hero-overly2 d-flex align-items-center" style="min-height: 200px;  !important">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center pt-50">
                        <h2>Request for withdrawal</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Hero End -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title', 'Request withdrawal'); ?>
<?php $__env->startSection('inactive', 'Home'); ?>
<?php $__env->startSection('active', 'request  withdrawal'); ?>
<?php $__env->startSection('main'); ?>
<div class="content-body">
    <!-- Basic Inputs start -->
    <section id="basic-input">
        <div class="row" style="margin: 0 auto;">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">All Withdrawal requests </h4>
                        <?php if(auth()->user()->referral_bonus > \App\Settings::select('referral_threshold')->first()->value('referral_threshold')): ?>
                        <a href="<?php echo e(route('withdrawals.create')); ?>" class="btn btn-primary mt-1">Create new request</a>
                        <?php endif; ?>
                        <?php echo $__env->make('inc.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        
                    </div>
                   <div class="card-body">
                    <div>
                        You can view the status of all your withdrawal requests here, please note that you cannot add new requests when you have a pending request
                    </div>
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Paid at</th>
                                    <th>Amount Paid</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $withdraws; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $withdraw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($withdraw->created_at); ?></td>
                                    <td>&#8358;<?php echo e($withdraw->amount_requested); ?></td>
                                    <td><?php echo e($withdraw->status == 1 ? 'Paid' : 'Pending'); ?></td>
                                    <td><?php echo e($withdraw->paid_at); ?></td>
                                    <td><?php echo $withdraw->amount_paid <= 0 ? '' : '&#8358;'.$withdraw->amount_paid; ?></td>
                                    <?php if($withdraw->status == 0): ?>
                                    <td style="padding-left: 5px;padding-right: 5px; ">
                                        <div class="button-group">
                                            <form id="delete" style="float: left;" onsubmit="return confirm('Are you sure you want to delete forever?');" action="<?php echo e(route('payout.destroy', $withdraw->id)); ?>" method="POST" >
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?> 
                                                <button class="form-control deletebutton" type="submit"><i class="fa fa-trash" style="color: #950026;"></i></button>
                                            </form>  
                                        </div>
                                    </td>
                                    <?php else: ?>
                                    <td>N/A</td>
                                    <?php endif; ?>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        
                        </table>
                    </div>
                   </div>
                   
                </div>
            </div>
        </div>
    </section>
    <!-- Basic Inputs end -->          
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel Projects\EcomX\resources\views/users/withdraw.blade.php ENDPATH**/ ?>
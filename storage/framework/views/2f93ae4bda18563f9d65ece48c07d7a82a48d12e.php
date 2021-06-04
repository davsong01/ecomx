<?php $__env->startSection('title', 'Payouts'); ?>
<?php $__env->startSection('active'); ?>
<li class="breadcrumb-item">All Payouts</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="content-body">
    <!-- Zero configuration table -->
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">All Payouts</h4>
                        <a href="<?php echo e(route('payouts.create')); ?>" class="btn btn-primary p-1">Add new payout</a>
                        <?php echo $__env->make('inc.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Amount Requested(&#8358;)</th>
                                            <th>Status</th>
                                            <th>Amount paid(&#8358;)</th>
                                            <th>Date Paid</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $payouts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payout): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr> 
                                            <td><?php echo e($payout->user->name ?? 'User deleted'); ?> </td>
                                            <td><?php echo e($payout->user->phone ?? 'User deleted'); ?> </td>
                                            <td><?php echo e($payout->amount_requested); ?> </td>
                                            <td><?php echo e($payout->status == 1 ? 'Paid' : 'Pending'); ?> </td>
                                            <td><?php echo e($payout->amount_paid); ?> </td>
                                            <td><?php echo e($payout->paid_at); ?> </td>                                            
                                            <td style="padding-left: 5px;padding-right: 5px; ">
                                                
                                                <div class="button-group">
                                                    <a class="actions" href="<?php echo e(route('payouts.edit', $payout->id)); ?>"> <i style="padding: 9px;
                                                        border: 1px solid;
                                                        border-radius: 4px !important;" class="bx bxs-edit"></i></
                                                    </a>
                                                </div>
                                                <?php if($payout->status == 0 || !isset($payout->user)): ?>
                                                <div class="button-group">
                                                    <form id="delete" style="float: left;" onsubmit="return confirm('Are you sure you want to delete forever?');" action="<?php echo e(route('payouts.destroy', $payout->id)); ?>" method="POST" >
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?> 
                                                        <button class="form-control deletebutton" type="submit"><i class="fa fa-trash" style="color: #950026;"></i></button>
                                                    </form>  
                                                </div>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                      
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ Zero configuration table -->         
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admindashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel Projects\EcomX\resources\views/admin/payouts/index.blade.php ENDPATH**/ ?>
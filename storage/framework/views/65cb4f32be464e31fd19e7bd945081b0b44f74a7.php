<?php $__env->startSection('title', 'Subscribers'); ?>
<?php $__env->startSection('active'); ?>
<li class="breadcrumb-item">All Subscribers</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="content-body">
    <!-- Zero configuration table -->
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">All Subscribers</h4>
                        <a href="<?php echo e(route('users.create')); ?>" class="btn btn-primary mt-1">Add new subscriber</a>
                        <?php echo $__env->make('inc.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Upline</th>
                                            <th>Bonus</th>
                                            <th>Plan</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $subscribers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr> 
                                            <td><?php echo e($user->name); ?> </td>
                                            <td><?php echo e($user->username); ?> </td>
                                            <td><?php echo e($user->email); ?> </td>
                                            <td><?php echo e($user->phone); ?> </td>
                                            <td><?php echo e(isset($user->upline)? $user->upline->name : 'N/A'); ?> </td>
                                            <td>&#8358;<?php echo e($user->referral_bonus); ?> </td>
                                            <td><?php if(isset($user->plan)): ?>
                                                <?php echo e($user->plan->title); ?> <br>
                                            <small><span style="color:green">Start: <?php echo e($user->plan_start); ?> <br> End: <?php echo e($user->plan_expiry); ?> </span></small></td>
                                            <?php else: ?> N/A
                                            <?php endif; ?>
                                            <td style="padding-left: 5px;padding-right: 5px; ">
                                                
                                                <div class="button-group">
                                                    <a class="actions" href="<?php echo e(route('users.edit', $user->id)); ?>"> <i style="padding: 9px;
                                                        border: 1px solid;
                                                        border-radius: 4px !important;" class="bx bxs-edit"></i></
                                                    </a>
                                                </div>
                                                <div class="button-group">
                                                    <a class="actions" data-toggle="tooltip" data-placement="top" title="Switch To" href="<?php echo e(route('switchuser', $user->id)); ?>"> <i style="padding: 9px;
                                                        border: 1px solid;
                                                        border-radius: 4px !important;" class="fa fa-unlock"></i></
                                                    </a>
                                                </div>
                                                <div class="button-group">
                                                    <form id="delete" style="float: left;" onsubmit="return confirm('Are you sure you want to delete forever?');" action="<?php echo e(route('users.destroy', $user->id)); ?>" method="POST" >
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?> 
                                                        <button class="form-control deletebutton" type="submit"><i class="fa fa-trash" style="color: #950026;"></i></button>
                                                    </form>  
                                                </div>
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
<?php echo $__env->make('layouts.admindashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel Projects\EcomX\resources\views/admin/users/index.blade.php ENDPATH**/ ?>
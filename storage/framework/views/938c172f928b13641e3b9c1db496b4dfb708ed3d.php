<?php $__env->startSection('title', 'Sales page Requests'); ?>
<?php $__env->startSection('active'); ?>
<li class="breadcrumb-item">All Requests</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="content-body">
    <!-- Zero configuration table -->
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">All Requests</h4>
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
                                            <th>Email</th>
                                            <th>Product</th>
                                            <th>Date Approved</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $requests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(isset($request->user)): ?>
                                        <tr> 
                                            <td><?php echo e($request->user->name); ?> </td>
                                            <td><?php echo e($request->user->phone); ?> </td>
                                            <td><?php echo e($request->user->email); ?> </td>
                                            <td><?php echo e($request->product->title); ?> </td>
                                            <td><?php echo e($request->approved_at); ?> </td>
                                            <td><?php echo e($request->status == 1 ? 'Approved' : 'Pending'); ?> </td>
                                            <td style="padding-left: 5px;padding-right: 5px; ">
                                                <?php if($request->status == 0): ?>
                                                <div class="button-group">
                                                    <a class="actions" onclick="return confirm('You are about to approve a salespage request!');" href="<?php echo e(route('salespages.approve', $request->id)); ?>"> <i style="padding: 9px;
                                                        border: 1px solid;
                                                        border-radius: 4px !important;" class="fa fa-check"></i></
                                                    </a>
                                                </div>
                                                <?php endif; ?>
                                                <?php if($request->status == 1): ?>
                                                <div class="button-group">
                                                    <a class="actions" onclick="return confirm('You are about to unapprove a salespage request!');" href="<?php echo e(route('salespages.unapprove', $request->id)); ?>"> <i style="padding: 9px;
                                                        border: 1px solid;
                                                        border-radius: 4px !important;" class="fa fa-close"></i></
                                                    </a>
                                                </div>
                                                <?php endif; ?>
                                                <div class="button-group">
                                                    <form id="delete" style="float: left;" onsubmit="return confirm('Are you sure you want to delete forever?');" action="<?php echo e(route('salespage.destroy', $request->id)); ?>" method="POST" >
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?> 
                                                        <button class="form-control deletebutton" type="submit"><i class="fa fa-trash" style="color: #950026;"></i></button>
                                                    </form>  
                                                </div>
                                             
                                            </td>
                                        </tr>
                                        <?php endif; ?>
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
<?php echo $__env->make('layouts.admindashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel Projects\EcomX\resources\views/admin/salespagerequest/index.blade.php ENDPATH**/ ?>
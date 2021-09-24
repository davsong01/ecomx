<?php $__env->startSection('title', 'Edit staff'); ?>
<?php $__env->startSection('item'); ?>
<li class="breadcrumb-item"> <a href="<?php echo e(route('staff.index')); ?>">All Staff</a></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('active'); ?>
<li class="breadcrumb-item">Edit staff</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="content-body">
    <!-- Basic Inputs start -->
    <section id="basic-input">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit staff</h4>
                        <?php echo $__env->make('inc.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="<?php echo e(route('staff.update', $staff->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('Patch'); ?>
                            <div class="col-md-12 col-sm-12">
                                <fieldset class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="<?php echo e(old('name') ?? $staff->name); ?>" placeholder="Enter name" required>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?php echo e(old('email') ?? $staff->email); ?>" placeholder="Enter email" required>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <input type="phone" class="form-control" id="phone" name="phone" value="<?php echo e(old('phone') ?? $staff->phone); ?>" placeholder="Enter phone" required>
                                </fieldset>
                            
                                <fieldset class="form-group">
                                    <label for="level">Admin Rights</label>
                                    <select class="form-control" name="level" id="level" >
                                        <option value="2" <?php echo e($staff->level == 2 ? 'selected' : ''); ?>>Admin</option>
                                        <option value="3" <?php echo e($staff->level == 3 ? 'selected' : ''); ?>>User Manager</option>
                                        <option value="4" <?php echo e($staff->level== 4 ? 'selected' : ''); ?>>Product Manager</option>
                                    </select>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="account_name">Password(Leave blank to use default: 123454321 )</label>
                                    <input type="text" class="form-control" id="password" name="password" value="<?php echo e(old('password')); ?>" placeholder="Enter password">
                                </fieldset>
                                                            
                                <button class="btn btn-primary pt-1" style="width:100%" type="submit">Create</button>
                                </form>
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

<?php echo $__env->make('layouts.admindashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel Projects\EcomX\resources\views/admin/staff/edit.blade.php ENDPATH**/ ?>
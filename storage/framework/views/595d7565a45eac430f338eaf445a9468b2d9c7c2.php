<?php $__env->startSection('title', 'Edit Subscriber'); ?>
<?php $__env->startSection('item'); ?>
<li class="breadcrumb-item"> <a href="<?php echo e(route('users.index')); ?>">All Users</a></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('active'); ?>
<li class="breadcrumb-item">Edit <?php echo e($user->name); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="content-body">
    <!-- Basic Inputs start -->
    <section id="basic-input">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit <?php echo e($user->name); ?>r</h4>
                        <?php echo $__env->make('inc.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="<?php echo e(route('users.update', $user->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PATCH'); ?>
                            <div class="col-md-12 col-sm-12">
                                <fieldset class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="<?php echo e(old('name') ?? $user->name); ?>" placeholder="Enter name" required>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?php echo e(old('email') ?? $user->email); ?>" placeholder="Enter email" required>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <input class="form-control" name="phone" id="phone" type="tel" placeholder="Enter phone number, e.g 07000000001" pattern="[0-9]{11}" value="<?php echo e(old('phone') ?? $user->phone); ?>" required>
                                   
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="bank_name">Bank Name(Optional)</label>
                                    <input type="text" class="form-control" id="bank_name" name="bank_name" value="<?php echo e(old('bank_name') ?? $user->bank_name); ?>" placeholder="Enter bank name">
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="account_name">Account Name(Optional)</label>
                                    <input type="text" class="form-control" id="account_name" name="account_name" value="<?php echo e(old('account_name') ?? $user->account_name); ?>" placeholder="Enter account name">
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="account_number">Account Nnmber(Optional)</label>
                                    <input type="text" class="form-control" id="account_number" name="account_number" value="<?php echo e(old('account_number') ?? $user->account_number); ?>" placeholder="Enter account number">
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="referral_bonus">Referral Bonus(Optional)</label>
                                    <input type="number" class="form-control" id="referral_bonus" name="referral_bonus" value="<?php echo e(old('referral_bonus') ?? $user->referral_bonus); ?>" placeholder="Enter referral bonus" required>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="upline">Upline(Optional)</label>
                                    <select class="form-control" name="MY_upline" id="MY_upline" >
                                        <?php if($user->upline): ?>
                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $upline): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($upline->id); ?>" <?php echo e($user->upline->id == $upline->id ? 'selected' : ''); ?>><?php echo e($upline->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                        <option value="">-- Select Option --</option>
                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $upline): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($upline->id); ?>" <?php echo e(old('MY_upline') == $upline->id ? 'selected' : ''); ?>><?php echo e($upline->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="account_name">Password(Leave blank to use default: 123454321 )</label>
                                    <input type="text" class="form-control" id="password" name="password" value="<?php echo e(old('password')); ?>" placeholder="Enter password">
                                </fieldset>
                                
                                <fieldset class="form-group">
                                    <label for="validity">Plan(Optional)</label>
                                    <select class="form-control" name="plan_id" id="plan_id" >
                                        <option value="">Select Plan</option>
                                        <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($user->plan): ?>
                                        <option value="<?php echo e($plan->id); ?>" <?php echo e($user->plan->id == $plan->id ? 'selected' : ''); ?>><?php echo e($plan->title); ?></option>
                                        <?php else: ?>
                                        
                                        <option value="<?php echo e($plan->id); ?>" <?php echo e(old('plan_id') == $plan->id ? 'selected' : ''); ?>><?php echo e($plan->title); ?></option>
                                       
                                        <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="validity">Validity</label>
                                    <select class="form-control" name="validity" id="validity" >
                                        <option value="1" <?php echo e(($user->validity >= 1 && $user->validity < 3) ? 'selected' : ''); ?>>1 month</option>
                                        <option value="3" <?php echo e(($user->validity >= 3 && $user->validity < 6) ? 'selected' : ''); ?>>3 months</option>
                                        <option value="6" <?php echo e(($user->validity >= 6 && $user->validity < 9) ? 'selected' : ''); ?>>6 months</option>
                                        <option value="12" <?php echo e(($user->validity >= 12) ? 'selected' : ''); ?>>12 months</option>
                                    </select>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="plan_start">Date Paid(Optional): <?php echo e($user->plan_start); ?></label>
                                    <input type="date" class="form-control" id="plan_start" name="plan_start" value="<?php echo e(old('plan_start') ??   $user->plan_start); ?>" placeholder="Enter Date Paid">
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="plan_expiry">Plan Expiry(Optional): <?php echo e($user->plan_expiry); ?></label>
                                    <input type="date" class="form-control" id="plan_expiry" name="plan_expiry" value="<?php echo e(old('plan_expiry')); ?>" placeholder="Enter Expiry date">
                                </fieldset>
                                
                                
                                <button class="btn btn-primary" style="width:100%" type="submit">Create</button>
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

<?php echo $__env->make('layouts.admindashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel Projects\EcomX\resources\views/admin/users/edit.blade.php ENDPATH**/ ?>
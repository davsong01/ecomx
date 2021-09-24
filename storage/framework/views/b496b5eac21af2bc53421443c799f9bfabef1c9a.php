<?php $__env->startSection('title', 'Create resource'); ?>
<?php $__env->startSection('item'); ?>
<li class="breadcrumb-item"> <a href="<?php echo e(route('resource.index')); ?>">Resources</a></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('active'); ?>
<li class="breadcrumb-item">Create Resource</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="content-body">
    <!-- Basic Inputs start -->
    <section id="basic-input">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add New Resource</h4>
                        <?php echo $__env->make('inc.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="<?php echo e(route('resource.store')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="col-md-12 col-sm-12">
                                <fieldset class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" value="<?php echo e(old('title')); ?>" placeholder="Enter Title" required>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="link">Link</label>
                                    <input type="url" class="form-control" id="link" name="link" value="<?php echo e(old('link')); ?>" placeholder="Enter link" required>
                                </fieldset>
                                
                                
                                <fieldset class="form-group">
                                    <label for="public">Public? (Subscribed and Unsubscribed users can view public resources) | Optional</label>
                                    <select class="form-control" name="public" id="public">
                                        <option value="">--Select option</option>
                                        <option value="1" <?php echo e(old('public') == 1 ? 'selected' : ''); ?>>Yes</option>
                                        <option value="0" <?php echo e(old('public') == 0 ? 'selected' : ''); ?>>No</option>
                                        
                                    </select>
                                </fieldset>
                               
                                <button class="btn btn-primary p-1" style="width:100%" type="submit">Create</button>
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

<?php echo $__env->make('layouts.admindashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel Projects\EcomX\resources\views/admin/resources/create.blade.php ENDPATH**/ ?>
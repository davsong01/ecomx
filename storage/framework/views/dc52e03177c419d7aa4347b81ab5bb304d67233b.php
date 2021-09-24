<?php $__env->startSection('title', 'Update category'); ?>
<?php $__env->startSection('item'); ?>
<li class="breadcrumb-item"> <a href="<?php echo e(route('category.index')); ?>">Product Category</a></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('active'); ?>
<li class="breadcrumb-item">Update <?php echo e($category->title); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="content-body">
    <!-- Basic Inputs start -->
    <section id="basic-input">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Update Category</h4>
                        <?php echo $__env->make('inc.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="<?php echo e(route('category.update', $category->id)); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PATCH'); ?>
                            <div class="col-md-12 col-sm-12">
                                <fieldset class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" value="<?php echo e(old('title') ?? $category->title); ?>" placeholder="Enter Title" required>
                                </fieldset>
                                <fieldset class="form-group">
                                    <img src="<?php echo e(asset($category->image)); ?>" alt="category_image" style="width: 10%; height: 10%;"><br> 
                                    
                                    <label for="image">Replace Category image (Optional | 360px by 286px preferred dimensions)</label>
                                    <input type="file" class="form-control" id="image" name="image" value="<?php echo e(old('image')); ?>">
                                </fieldset>

                                <fieldset class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" name="status" id="status" required>
                                        <option value="">--Select option</option>
                                        <option value="0" <?php echo e($category->status == 0 ? 'selected' : ''); ?>>Draft</option>
                                        <option value="1" <?php echo e($category->status == 1 ? 'selected' : ''); ?>>Published</option>
                                    </select>
                                </fieldset>
                                <button class="btn btn-primary" style="width:100%" type="submit">Update</button>
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

<?php echo $__env->make('layouts.admindashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel Projects\EcomX\resources\views/admin/categories/edit.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title', 'Create bestseller'); ?>
<?php $__env->startSection('item'); ?>
<li class="breadcrumb-item"> <a href="<?php echo e(route('bestseller.index')); ?>">Bestsellers</a></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('active'); ?>
<li class="breadcrumb-item">Create new bestseller product</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="content-body">
    <!-- Basic Inputs start -->
    <section id="basic-input">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add New bestseller product</h4>
                        <?php echo $__env->make('inc.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="<?php echo e(route('bestseller.store')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="col-md-12 col-sm-12">
                                <fieldset class="form-group">
                                    <label for="title">Select Product</label>
                                    <select class="form-control select2" name="product" id="product">
                                        <option value="">--Select Product--</option>
                                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e(old('product') ?? $product->id); ?>" <?php echo e(old('product') == $product->id ? 'selected' : ''); ?>><?php echo e($product->title); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    
                                </fieldset>

                                <fieldset class="form-group">
                                    <label for="order">Order</label>
                                    <input type="number" class="form-control" name="order" id="order" value="<?php echo e(old('order')); ?>" placeholder="Enter order" required>
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

<?php echo $__env->make('layouts.admindashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel Projects\EcomX\resources\views/admin/bestsellers/create.blade.php ENDPATH**/ ?>
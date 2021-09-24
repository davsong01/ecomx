<?php $__env->startSection('title', 'Create Product'); ?>
<?php $__env->startSection('item'); ?>
<li class="breadcrumb-item"> <a href="<?php echo e(route('products.index')); ?>">All Products</a></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('active'); ?>
<li class="breadcrumb-item">Create Product</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="content-body">
    <!-- Basic Inputs start -->
    <section id="basic-input">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add New Product</h4>
                        <?php echo $__env->make('inc.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="<?php echo e(route('products.store')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="col-md-12 col-sm-12">
                                <fieldset class="form-group">
                                    <label for="title">Product Name</label>
                                    <input type="text" class="form-control" id="title" name="title" value="<?php echo e(old('title')); ?>" placeholder="Enter product name">
                                </fieldset>

                                <fieldset class="form-group">
                                    <label for="price">Price</label>
                                    <input type="number" class="form-control" name="price" id="price" value="<?php echo e(old('price')); ?>" placeholder="Enter Price" required>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="stock">In stock</label>
                                    <input type="number" class="form-control" name="stock" id="stock" value="<?php echo e(old('stock')); ?>" placeholder="Enter quantity available" required>
                                </fieldset>
                                
                                <fieldset class="form-group">
                                    <label for="f_images">Featured Images</label>
                                    <input type="file" class="form-control" name="f_images[]" id="f_images" value="<?php echo e(old('f_images')); ?>" required multiple accept="image/*">
                                </fieldset>
                                

                                <fieldset class="form-group">
                                    <label for="videos">Product Videos Link(Youtube link | Optional)</label>
                                    <input type="url" class="form-control" name="videos" id="videos" value="<?php echo e(old('videos')); ?>">
                                </fieldset>
                                
                                <fieldset class="form-group">
                                    <label for="creatives">Creatives</label>
                                    <textarea id="summary-ckeditor" required="required" type="text" class="form-control" name="creatives" value="<?php echo e(old('creatives')); ?>" rows="8" autofocus><?php echo e(old('creatives')); ?></textarea>
                                </fieldset>

                                <fieldset class="form-group">
                                    <label for="description">Product description</label>
                                    <textarea required="required" id="description" type="text" class="form-control" name="description" value="<?php echo e(old('description')); ?>" rows="8" autofocus><?php echo e(old('description')); ?></textarea>
                                </fieldset>

                                <fieldset class="form-group">
                                    <label for="title">Sales Page Link</label>
                                    <input type="url" class="form-control" id="salespage_link" name="salespage_link" value="<?php echo e(old('salespage_link')); ?>" placeholder="Enter product salespage link">
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="salespage_file">Sales Page File (Not more than 1mb )</label>
                                    <input type="file" class="form-control" id="salespage_file" name="salespage_file" value="<?php echo e(old('salespage_file')); ?>" >
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="status">Upsells (Optional)</label>
                                    <select class="form-control js-example-basic-multiple" name="upsell[]" id="upsell" multiple="multiple">
                                       
                                        <?php $__currentLoopData = $upsells; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $upsell): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($upsell->id); ?>" <?php echo e(old('upsell') == $upsell->id ? 'selected' : ''); ?>><?php echo e($upsell->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </fieldset>

                                <fieldset class="form-group">
                                    <label for="status">Category</label>
                                    <select class="form-control js-example-basic-multiple" name="category[]" id="category" multiple="multiple" required>
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($category->id); ?>" <?php echo e(old('category') == $category->id ? 'selected' : ''); ?>><?php echo e($category->title); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </fieldset>

                                <fieldset class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" name="status" id="status" required>
                                        <option value="">--Select option</option>
                                        <option value="0" <?php echo e(old('status') == 0 ? 'selected' : ''); ?>>Draft</option>
                                        <option value="1" <?php echo e(old('status') == 1 ? 'selected' : ''); ?>>Published</option>
                                    </select>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdn.ckeditor.com/4.14.0/full/ckeditor.js"></script>                                         
    <script>
        CKEDITOR.replace( 'summary-ckeditor', {
            filebrowserUploadUrl: "<?php echo e(route('upload', ['_token' => csrf_token() ])); ?>",
            filebrowserUploadMethod: 'form'
        });

        CKEDITOR.replace( 'description', {
            filebrowserUploadUrl: "<?php echo e(route('upload', ['_token' => csrf_token() ])); ?>",
            filebrowserUploadMethod: 'form'
        });
        
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
        
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admindashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel Projects\EcomX\resources\views/admin/products/create.blade.php ENDPATH**/ ?>
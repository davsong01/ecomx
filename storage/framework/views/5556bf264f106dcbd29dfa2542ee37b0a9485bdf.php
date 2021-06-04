<?php $__env->startSection('title', 'Edit Product'); ?>
<?php $__env->startSection('item'); ?>
<li class="breadcrumb-item"> <a href="<?php echo e(route('products.index')); ?>">All Products</a></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('active'); ?>
<li class="breadcrumb-item">Edit <?php echo e($product->name); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('extra-script'); ?>
<script src="https://cdn.ckeditor.com/4.14.0/full/ckeditor.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="content-body">
    <!-- Basic Inputs start -->
<section id="basic-input">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <?php echo $__env->make('inc.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
               
                </div>
                <div class="card-content">
                    <div class="card-body">
                        
                       <div class="row">  
                        <?php if(isset($product->f_image) && $product->f_image != 'null'): ?>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="text">Product Featured Images</label>
                                </div>
                            </div>
                          
                            <?php $__currentLoopData = json_decode($product->f_image); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-3 col-sm-4">
                            <img src="<?php echo e(route('get.file', $image)); ?>" alt="<?php echo $image; ?>" style="width: 100%; height: auto;">
                            <div> 
                            <form action="<?php echo e(route('productfile.replace')); ?>" method="POST" enctype="multipart/form-data">

                                <?php echo csrf_field(); ?>
                                <input type="hidden" value="<?php echo e($product->id); ?>" name="pid">
                                <input style="font-size: 10px; width: 100%;font-size: 10px !important;float: left;" class="btn btn-primary glow" type="file" name="image" accept="image/*" required>
                                <input type="hidden" value="<?php echo e($image); ?>" name="old_image">                               
                                <button class="form-control deletebutton" data-toggle="tooltip" title="Replace file"><i class="fa fa-exchange" style="color: #950026;float: left;
                                    border-radius: 0px !important;height: 35px;"></i>Replace</button>
                            </form>  
                            <form action="<?php echo e(route('productfile.delete')); ?>" method="POST">

                                <?php echo csrf_field(); ?>
                                <input type="hidden" value="<?php echo e($product->id); ?>" name="pid">
                               
                                <input type="hidden" value="<?php echo e($image); ?>" name="old_image">                               
                                <button class="form-control deletebutton" data-toggle="tooltip" title="delete file"><i class="fa fa-trash" style="color: #950026;float: left;
                                    border-radius: 0px !important;height: 35px;"></i>Delete</button>
                            </form>  
                                   
                              </div>
                            </div>                        
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                  
                        </div>
                        <?php endif; ?>
                        
                            <div class="col-12">
                                <form action="<?php echo e(route('products.update', $product->id)); ?>" method="POST" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PATCH'); ?>
                                    <fieldset class="form-group">
                                        <label for="title">Product Name</label>
                                        <input type="text" class="form-control" id="title" name="title" value="<?php echo e(old('title') ?? $product->title); ?>" placeholder="Enter product name">
                                    </fieldset>
    
                                    <fieldset class="form-group">
                                        <label for="price">Price</label>
                                        <input type="number" class="form-control" name="price" id="price" value="<?php echo e(old('price') ?? $product->price); ?>" placeholder="Enter price" required>
                                    </fieldset>
                        
                                    <fieldset class="form-group">
                                        <label for="stock">In Stock</label>
                                        <input type="number" class="form-control" name="stock" id="stock" value="<?php echo e(old('stock') ?? $product->stock); ?>" placeholder="Enter quantity available" required>
                                    </fieldset>

                                    <fieldset class="form-group">
                                        <label for="f_images">Add more Featured Images(Optional, 634px by 811px)</label>
                                        <input type="file" class="form-control" name="f_images[]" id="f_images" value="<?php echo e(old('f_images')); ?>" multiple accept="image/*">
                                    </fieldset>
                                    
                                    <fieldset class="form-group">
                                        <label for="videos">Product Video Link(Optional)</label>
                                        <input type="text" class="form-control" name="videos" id="videos" value="<?php echo e(old('videos') ?? $product->videos); ?>" multiple accept="video/*">
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label for="creatives">Creatives</label>
                                        <textarea id="creatives" required="required" type="text" class="form-control" name="creatives" value="<?php echo e(old('creatives')); ?>" rows="8" autofocus><?php echo e(old('creatives') ?? $product->creatives); ?></textarea>
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label for="description">Product description</label>
                                        <textarea required="required" type="text" id="description" class="form-control" name="description" value="<?php echo e(old('description') ?? $product->description); ?>" rows="8" autofocus><?php echo e(old('description') ?? $product->description); ?></textarea>
                                    </fieldset>
    
                                    <fieldset class="form-group">
                                        <label for="title">Sales Page Link</label>
                                        <input type="url" class="form-control" id="salespage_link" name="salespage_link" value="<?php echo e(old('salespage_link') ?? $product->salespage_link); ?>" placeholder="Enter product salespage link">
                                    </fieldset>
                                    <fieldset class="form-group">
                                        
                                        <label for="salespage_file">Replace Sales Page File (Not more than 1mb )</label><br>
                                        <a style="color:blue" href="<?php echo e(route('get.salespagefile', $salespage_file)); ?>"> <?php echo e($salespage_file); ?> </a>
                                        <input type="file" class="form-control" id="salespage_file" name="salespage_file" value="<?php echo e(old('salespage_file')); ?>" >
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label for="status">Upsell Products 
                                        </label>
                                        <select class="form-control js-example-basic-multiple" name="upsell_products[]" id="upsell_products" multiple="multiple" >
                                            <?php $__currentLoopData = $upsells; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $upsell): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($upsell->id); ?>" 
                                                <?php $__currentLoopData = json_decode($product->upsell_products, false); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $upproduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php echo e($upproduct == $upsell->id ? 'selected' : ''); ?>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                 ><?php echo e($upsell->name .$upsell->id); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>

                                    </fieldset>
                                    
                                    <fieldset class="form-group">
                                        <label for="status">Category </label>
                                        <select class="form-control js-example-basic-multiple" name="category[]" id="category" multiple="multiple" required>
                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($category->id); ?>" 
                                                <?php $__currentLoopData = $product->category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                 <?php echo e($cat->id == $category->id ? 'selected' : ''); ?>

                                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                 ><?php echo e($category->title); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </fieldset>

                                    <fieldset class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control" name="status" id="status" required>
                                            <option value="0" <?php echo e($product->status == 0 ? 'selected' : ''); ?>>Draft</option>
                                            <option value="1" <?php echo e($product->status == 1 ? 'selected' : ''); ?>>Published</option>
                                        </select>
                                    </fieldset>

                                    <button class="btn btn-primary p-1" style="width:100%" type="submit">Update</button>
                                </form>
                       
                               
                            </div>
                        </div>
                        
                    </div>
                </div>                
            </div>
        </div>
    </div>
</section>
<!-- Basic Inputs end -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdn.ckeditor.com/4.14.0/full/ckeditor.js"></script>                                         
    <script>
        CKEDITOR.replace( 'creatives', {
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

<?php echo $__env->make('layouts.admindashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel Projects\EcomX\resources\views/admin/products/edit.blade.php ENDPATH**/ ?>
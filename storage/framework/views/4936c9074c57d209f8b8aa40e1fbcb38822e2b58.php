<div class="col-xl-3 col-lg-3 col-md-6">
    <div class="row">
        <div class="col-12">
                <div class="small-section-tittle2 mb-45">
                <h4>Filter by Categories</h4>

            </div>
        </div>
    </div>
    <!-- Job Category Listing start -->
    <div class="category-listing" style="margin-bottom: 10px;" >
        <a class="cat" style="color: black;" href="<?php echo e(route('dashboard')); ?>"> All Categories</a><br>
       <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <a class="cat" style="color: black;" href="<?php echo e(route('category.filter', $category->slug)); ?>"><?php echo e($category->title); ?> (<?php echo e($category->products_count); ?>)</a><br>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <!-- Job Category Listing End -->
</div><?php /**PATH C:\xampp\htdocs\Laravel Projects\EcomX\resources\views/inc/filter.blade.php ENDPATH**/ ?>
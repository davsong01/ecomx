<?php $__env->startSection('title', 'Products'); ?>
<?php $__env->startSection('active'); ?>
<li class="breadcrumb-item">Products</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="content-body">
    <!-- Zero configuration table -->
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">All products</h4>
                        <a href="<?php echo e(route('products.create')); ?>" class="btn btn-primary p-1">Add new</a>
                        <?php echo $__env->make('inc.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>In Stock</th>
                                            <th>Category(s)</th>
                                            <th>No of Upsells</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr> 
                                            <td><?php echo e($no++); ?></td>
                                            <td><?php echo e($product->title); ?></td>
                                            <td><?php echo e($product->price); ?></td>
                                            <td><?php echo e($product->stock); ?></td>
                                            <td>
                                                <?php $__currentLoopData = $product->category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php echo e($category->title); ?> | <br>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </td>
                                            <td><?php echo e($product->upsell_products_count); ?></td>
                                            <td><?php echo e(($product->status == 1) ? 'Published' : 'Draft'); ?></td>
                                            
                                            <td style="padding-left: 5px;padding-right: 5px; ">
                                                <div class="button-group">
                                                    <a class="actions" data-toggle="tooltip" title="View/Edit upsell" href="<?php echo e(route('products.edit', $product->id)); ?>"> <i style="padding: 9px;
                                                        border: 1px solid;
                                                        border-radius: 4px !important;" class="bx bxs-edit"></i></
                                                    </a>
                                                </div>
                                                <div class="button-group">
                                                    <form id="delete" style="float: left;" onsubmit="return confirm('Are you sure you want to delete forever?');" action="<?php echo e(route('products.destroy', $product->id)); ?>" method="POST" >
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
<?php echo $__env->make('layouts.admindashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel Projects\EcomX\resources\views/admin/products/index.blade.php ENDPATH**/ ?>
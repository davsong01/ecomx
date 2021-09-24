<?php $__env->startSection('title', 'Category'); ?>
<?php $__env->startSection('active'); ?>
<li class="breadcrumb-item">Categories</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="content-body">
    <!-- Zero configuration table -->
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">All categories</h4>
                        <a href="<?php echo e(route('category.create')); ?>" class="btn btn-primary mt-1">Add new</a>
                        <?php echo $__env->make('inc.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>No of Products</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr> 
                                            <td><?php echo e($category->title); ?></td>
                                            <td><?php echo e($category->products_count); ?></td>
                                            <td><?php echo e($category->status == 0 ?'Draft' : 'Published'); ?></td>
                                           
                                            <td style="padding-left: 5px;padding-right: 5px;">
                                           
                                            <div class="button-group">
                                                <a class="actions" data-toggle="tooltip" title="View/Edit category" href="<?php echo e(route('category.edit', $category->id)); ?>"> <i style="padding: 9px;
                                                    border: 1px solid;
                                                    border-radius: 4px !important;" class="bx bxs-edit"></i></
                                                </a>
                                            </div>
                                            <div class="button-group">
                                                <form id="delete" style="float: left;" onsubmit="return confirm('Are you sure you want to delete forever?');" action="<?php echo e(route('category.destroy', $category->id)); ?>" method="POST" >
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?> 
                                                    <button class="form-control deletebutton" type="submit"><i class="fa fa-trash" style="color: #950026;"></i></button>
                                                </form>  
                                            </div>
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
<?php echo $__env->make('layouts.admindashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel Projects\EcomX\resources\views/admin/categories/index.blade.php ENDPATH**/ ?>
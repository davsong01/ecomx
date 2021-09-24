<?php $__env->startComponent('mail::message'); ?>
<?php if($data['type'] = 1): ?>
Dear Admin,

New product suggestion from <?php echo e(auth()->user()->name); ?>,

Details below

<strong>Product Name: </strong> <?php echo e($data['name']); ?>



Attached to this email is the suggested product image
You can also login to the portal to view suggested products

<?php $__env->startComponent('mail::button', ['url' => config('app.url') .'/suggestion']); ?>
Login here<br><br>
<?php echo $__env->renderComponent(); ?>

<?php endif; ?>
Thanks,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\xampp\htdocs\Laravel Projects\EcomX\resources\views/emails/suggestion.blade.php ENDPATH**/ ?>
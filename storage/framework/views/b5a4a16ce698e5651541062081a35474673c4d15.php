<?php $__env->startComponent('mail::message'); ?>
<?php if($d['type'] == 'newproduct'): ?>
Dear <?php echo e($d['name']); ?>,

A new unique product has been added on your eComX product list page.

Another opportunity to make more sales and more money.

Click <a href="<?php echo e(config('app.url')); ?>/dashboard"><b>HERE</b></a> to access the product, the sales page and facebook ad creative.

All the best!

Thanks,<br>
<?php echo e(config('app.name')); ?>


<?php endif; ?>
<?php if($d['type'] == 'newregistration'): ?>
Hi <?php echo e($d['name']); ?> ,

Welcome to the eComX Trybe! 

You’re one-step to getting started. 

<b>Subscribe to a plan</b> to kick-off your earnings with eCom Business. 

Everything has been done for you, from access to unique hot selling products to sales copy of the product, advert creatives for your ad and even upsells. 

<a href="<?php echo e(config('app.url')); ?>/selectplans"><b>Get started now</b></a>


eComX
<?php endif; ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\xampp\htdocs\Laravel Projects\EcomX\resources\views/emails/newproductmail.blade.php ENDPATH**/ ?>
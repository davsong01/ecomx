<?php $__env->startComponent('mail::message'); ?>

<?php if($data['type'] == 'salespageapprovalemail'): ?>
Dear <?php echo e($data['name']); ?>,

Your request for salespage has been approved, you can now download  the salespage demo for this product.

Find below your request details.

Product name: <?php echo e($data['product']); ?>;
Date requested: <?php echo e($data['created_at']); ?>;  
Date approved: <?php echo e($data['approved_at']); ?>;  

<?php endif; ?>

<?php if($data['type'] == 'salespageemail'): ?>
Dear Admin,

New salespage request

Details are:

Subscriber'name: <?php echo e($data['name']); ?>; <br>
Subscriber's Email: <?php echo e($data['email']); ?>; <br>
Subscriber's Phone: <?php echo e($data['phone']); ?>; <br>
Product name: <?php echo e($data['product']); ?>; <br>
Date requested: <?php echo e($data['date_requested']); ?>; <br><br>

Please login to your dashboard to approve or delete request

<?php $__env->startComponent('mail::button', ['url' => config('app.url').'/salespage']); ?>
    Login to approve or delete request
<?php echo $__env->renderComponent(); ?>

<?php endif; ?>
<?php if($data['type'] == 1): ?>
Dear Admin,

New Withdraw Notification

Please pay:
Name : <?php echo e($data['name']); ?><br>
Email : <?php echo e($data['email']); ?><br>
Phone : <?php echo e($data['phone']); ?><br>
Amount Requested :  &#8358;<?php echo e($data['amount_requested']); ?><br>


Please login to your dashboard to process payment

<?php $__env->startComponent('mail::button', ['url' => config('app.url')]); ?>
    Login to approve payment
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>

<?php if($data['type'] == 2): ?>
Dear <?php echo e($data['name']); ?>,

Payment Notification

Please find details below:

Amount requested :  &#8358;<?php echo e($data['amount_requested']); ?><br>
Amount paid :  &#8358;<?php echo e($data['amount_paid']); ?><br>
Date paid : <?php echo e($data['paid_at']); ?><br>
Referral balance :  &#8358;<?php echo e($data['balance']); ?><br>
Status : Paid<br>
<?php endif; ?>

Thanks,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\xampp\htdocs\Laravel Projects\EcomX\resources\views/emails/notification.blade.php ENDPATH**/ ?>
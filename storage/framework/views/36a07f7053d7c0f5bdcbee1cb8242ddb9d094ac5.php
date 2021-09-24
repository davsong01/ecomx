<ol class="breadcrumb">
    <li><a href="<?php echo e(url(config('forum.routing.prefix'))); ?>"><?php echo e(trans('forum::general.index')); ?></a></li>
    <?php if(isset($category) && $category): ?>
        <?php echo $__env->make('forum::partials.breadcrumb-categories', ['category' => $category], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php if(isset($thread) && $thread): ?>
        <li><a href="<?php echo e(Forum::route('thread.show', $thread)); ?>"><?php echo e($thread->title); ?></a></li>
    <?php endif; ?>
    <?php if(isset($breadcrumb_other) && $breadcrumb_other): ?>
        <li><?php echo $breadcrumb_other; ?></li>
    <?php endif; ?>
</ol>
<?php /**PATH C:\xampp\htdocs\Laravel Projects\EcomX\resources\views/vendor/forum/partials/breadcrumbs.blade.php ENDPATH**/ ?>
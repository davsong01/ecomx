<tr>
    <td <?php echo e($category->threadsEnabled ? '' : 'colspan=5'); ?>>
        <p class="<?php echo e(isset($titleClass) ? $titleClass : ''); ?>"><a href="<?php echo e(Forum::route('category.show', $category)); ?>"><?php echo e($category->title); ?></a></p>
        <span class="text-muted"><?php echo e($category->description); ?></span>
    </td>
    <?php if($category->threadsEnabled): ?>
        <td><?php echo e($category->thread_count); ?></td>
        <td><?php echo e($category->post_count); ?></td>
        <td>
            <?php if($category->newestThread): ?>
                <a href="<?php echo e(Forum::route('thread.show', $category->newestThread)); ?>">
                    <?php echo e($category->newestThread->title); ?>

                    (<?php echo e($category->newestThread->authorName); ?>)
                </a>
            <?php endif; ?>
        </td>
        <td>
            <?php if($category->latestActiveThread): ?>
                <a href="<?php echo e(Forum::route('thread.show', $category->latestActiveThread->lastPost)); ?>">
                    <?php echo e($category->latestActiveThread->title); ?>

                    (<?php echo e($category->latestActiveThread->lastPost->authorName); ?>)
                </a>
            <?php endif; ?>
        </td>
    <?php endif; ?>
</tr>
<?php /**PATH C:\xampp\htdocs\Laravel Projects\EcomX\resources\views/vendor/forum/category/partials/list.blade.php ENDPATH**/ ?>
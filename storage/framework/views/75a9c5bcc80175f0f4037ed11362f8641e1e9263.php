<div class="widget-v2 widget-flex"
     style="background-image: url(<?php echo e(asset('public/images/admin/wave-bg.png')); ?>);">
    <div class="widget-header">
        <h6 class="widget-label"><?php echo $title; ?></h6>
        <div class="widget-large-icon">
            <div class="icon-wrapper bg-admin-theme">
                <?php if(isset($icon)): ?><i class='<?php echo e($icon); ?>' style="display: inline-block;"></i>
                <?php else: ?> <i class="voyager-people" style="display: inline-block;"></i>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="widget-counter"><span class="counter"><?php echo $text; ?></span></div>
    <div class="widget-footer">
        <span><a href="<?php echo e($button['link']); ?>">View All</a> <b>&#10132;</b> </span>
    </div>
</div>
<?php /**PATH C:\wamp64\www\new laravel project\himachalcabrentals.com\resources\views/vendor/voyager/dimmer.blade.php ENDPATH**/ ?>
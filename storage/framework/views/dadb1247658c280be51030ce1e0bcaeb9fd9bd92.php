<div class="achievement-counter-side">
    <div class="row">
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-12 mb-2">
                <div class="achievement-box-style-one">
                    <div class="achievement-box-content text-start text-white">
                        <h4 style="font-weight: 700"><?php echo e($post->title); ?></h4>
                        <p><?php echo e($post->tagLine); ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<?php /**PATH C:\wamp64\www\new laravel project\himachalcabrentals.com\resources\views/components/site/home/v2/feature.blade.php ENDPATH**/ ?>
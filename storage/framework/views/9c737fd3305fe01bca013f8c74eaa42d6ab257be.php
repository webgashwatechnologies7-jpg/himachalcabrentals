<?php if($show): ?>
    <div class="destination-area destination-style-two pt-110">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-sm-10 ">
                    <div class="section-head-alpha text-center mx-auto">
                        <h2><?php echo e($section->headLine); ?></h2>
                        <p><?php echo e($section->tagLine); ?></p>
                    </div>
                </div>
            </div>
            <?php if($data && count($data) > 0): ?>
                <div class="row d-flex justify-content-start g-4">
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-md-6 col-sm-10 fadeffect"
                        >
                            <a href="<?php echo e(route('site.destination',['slug' => $post->slug])); ?>">
                                <div class="destination-item">
                                    <div class="destination-img">
                                        <img
                                            data-src="<?php echo e(\TCG\Voyager\Facades\Voyager::image($post->thumbnail('cropped','image'))); ?>"
                                            alt="<?php echo e($post->title); ?>" class="lozad">
                                    </div>
                                    <div class="destination-overlay">
                                        <div class="content">
                                            <a href="<?php echo e(route('site.destination',['slug' => $post->slug])); ?>">
                                                <h5><?php echo e($post->title); ?></h5></a>
                                            <a href="<?php echo e(route('site.destination',['slug' => $post->slug])); ?>">
                                                <h6><?php echo e($post->tour_packages_count); ?> Tours</h6></a>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>

<?php /**PATH C:\wamp64\www\new laravel project\himachalcabrentals.com\resources\views/components/site/home/v2/destination.blade.php ENDPATH**/ ?>
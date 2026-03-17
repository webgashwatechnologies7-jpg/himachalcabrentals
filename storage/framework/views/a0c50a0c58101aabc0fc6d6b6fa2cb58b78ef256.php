<div class="testimonial-area testimonial-style-one mt-120">
    <div class="testimonial-shape-group"></div>
    <div class="container position-relative">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="section-head-alpha">
                    <h2><?php echo e($section->headLine); ?></h2>
                    <p><?php echo e($section->tagLine); ?></p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="slider-arrows text-center d-lg-flex d-none justify-content-end mb-3">
                    <div class="testi-prev custom-swiper-prev" tabindex="0" role="button" aria-label="Previous slide"><i
                            class="bi bi-chevron-left"></i></div>
                    <div class="testi-next custom-swiper-next" tabindex="0" role="button" aria-label="Next slide"><i
                            class="bi bi-chevron-right"></i></div>
                </div>
            </div>
        </div>
        <div class="swiper testimonial-slider-one position-relative">
            <div class="swiper-wrapper">
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="swiper-slide">
                        <div class="testimonial-card testimonial-card-alpha">
                            <div class="testimonial-overlay-img">
                                <img
                                    src="<?php echo e(\TCG\Voyager\Facades\Voyager::image($post->thumbnail('cropped','image'))); ?>"
                                    alt>
                            </div>
                            <div class="testimonial-card-top">
                                <div class="qoute-icon"><i class="bx bxs-quote-left"></i></div>
                                <div class="testimonial-thumb"><img
                                        src="<?php echo e(\TCG\Voyager\Facades\Voyager::image($post->thumbnail('cropped','image'))); ?>"
                                        alt="<?php echo e($post->name); ?>"></div>
                                <h3 class="testimonial-count"><?php echo e('0'.$key + 1); ?></h3>
                            </div>
                            <div class="testimonial-body">
                                <p><?php echo e(\Illuminate\Support\Str::limit(strip_tags($post->review),200,'...')); ?></p>
                                <div class="testimonial-bottom">
                                    <div class="reviewer-info">
                                        <h4 class="reviewer-name"><?php echo e($post->name); ?></h4>
                                        <h6><?php echo e($post->location); ?></h6>
                                    </div>
                                    <ul class="testimonial-rating">
                                        <li><i class="bi bi-star-fill"></i></li>
                                        <li><i class="bi bi-star-fill"></i></li>
                                        <li><i class="bi bi-star-fill"></i></li>
                                        <li><i class="bi bi-star-fill"></i></li>
                                        <li><i class="bi bi-star-fill"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</div>

<?php /**PATH C:\wamp64\www\new laravel project\himachalcabrentals.com\resources\views/components/site/home/v2/testimonails.blade.php ENDPATH**/ ?>
<div class="blog-area blog-style-one pt-110  ">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-head-alpha text-center mx-auto">
                    <h2><?php echo e($section->headLine); ?></h2>
                    <p><?php echo e($section->tagLine); ?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-card-alpha">
                        <div class="blog-thumb">
                            <a href="<?php echo e(route('site.blogPost',['slug' => $post->slug])); ?>">
                                <img
                                    src="<?php echo e(\TCG\Voyager\Facades\Voyager::image($post->thumbnail('cropped','image'))); ?>"
                                    alt="<?php echo e($post->alt_title); ?>">
                            </a>
                            <div class="blog-lavel">
                                <a href="javascript:void(0);" rel="nofollow"><i class="bi bi-calendar3"></i> Novembar
                                    16, 2021</a>
                            </div>
                        </div>
                        <div class="blog-content">
                            <h4 class="blog-title"><a
                                    href="<?php echo e(route('site.blogPost',['slug' => $post->slug])); ?>"><?php echo e($post->title); ?></a></h4>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>

<?php /**PATH C:\wamp64\www\new laravel project\himachalcabrentals.com\resources\views/components/site/home/v2/blog.blade.php ENDPATH**/ ?>
<?php $__env->startPush('styles'); ?>
    <style>
        .cus-btn {
            font-weight: 600;
            padding: 7px 12px;
            font-size: 15px
        }

        @media (max-width: 1199px) {
            .cus-btn {
                padding: 6px 12px;
                font-size: 14px
            }
        }

        @media only screen and (min-width: 993px) and (max-width: 1399px) {

            .cus-btn {
                padding: 6px 8px;
                font-size: 12px !important;
            }

            .book-btn {
                padding: 6px 8px !important;

            }

            .book-btn a {
                font-size: 12px !important;
            }
        }

        @media only screen and (min-width: 993px) and (max-width: 1199px) {
            .bxs-right-arrow-alt {
                display: none;
            }
        }
    </style>
<?php $__env->stopPush(); ?>
<div class="package-area package-style-one pt-110 ">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-head-alpha text-center mx-auto">
                    <h2><?php echo e($section->headLine); ?></h2>
                    <p><?php echo e($section->tagLine); ?></p>
                </div>
            </div>
        </div>
        <div class="row g-4">
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4 col-md-6">
                    <div class="package-card-alpha">
                        <div class="package-thumb">
                            <a href="<?php echo e(route('site.tourPackage',['slug' => $post->slug])); ?>"><img
                                    src="<?php echo e(get_package_image($post->thumbnail('cropped','image'))); ?>"
                                    alt="<?php echo e($post->alt_title); ?>"></a>
                            <p class="card-lavel">
                                <i class="bi bi-clock"></i> <span><?php echo e($post->nights); ?> Nights & <?php echo e($post->days); ?> Days</span>
                            </p>
                        </div>
                        <div class="package-card-body">
                            <h3 class="p-card-title"><a
                                    href="<?php echo e(route('site.tourPackage',['slug' => $post->slug])); ?>"><?php echo e($post->title); ?></a>
                            </h3>
                            <div class="d-flex justify-content-between px-2 pb-2 pt-4">
                                <div class="d-flex flex-column align-items-center">
                                    <i class='bx bx-food-menu bg-danger text-white p-2 rounded-circle'></i>
                                    <small>Food</small>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <i class='bx bx-car bg-danger text-white p-2 rounded-circle'></i>
                                    <small>Cabs</small>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <i class='bx bx-hotel bg-danger text-white p-2 rounded-circle'></i>
                                    <small>Hotel</small>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <i class='bx bx-images bg-danger text-white p-2 rounded-circle'></i>
                                    <small>More</small>
                                </div>
                            </div>
                            <div class="p-card-bottom">
                                <div class="book-btn">
                                    <a href="javascript:void(0);"
                                       onclick="packageEnquiry('<?php echo e($post->id); ?>','<?php echo e($post->title); ?> (<?php echo e($post->nights); ?>N/<?php echo e($post->days); ?>D)')">Enquire
                                        Now <i class="bx bxs-right-arrow-alt"></i></a>
                                </div>
                                <div class="border border-dark rounded cus-btn">
                                    <a href="<?php echo e(route('site.tourPackage',['slug' => $post->slug])); ?>"
                                       class="text-dark text-uppercase">View
                                        Details <i
                                            class="bx bxs-right-arrow-alt"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="row text-center">
            <div class="package-bottom-btn">
                <a href="<?php echo e(url('tour-packages')); ?>" class="button-fill-primary">View All Packages</a>
            </div>
        </div>
    </div>
</div>

<?php /**PATH C:\wamp64\www\new laravel project\himachalcabrentals.com\resources\views/components/site/home/v2/packages.blade.php ENDPATH**/ ?>
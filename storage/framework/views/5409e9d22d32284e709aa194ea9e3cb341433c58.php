<?php if (isset($component)) { $__componentOriginal060ba1f57f99c8c33dc0afb221de7a92839c0311 = $component; } ?>
<?php $component = App\View\Components\SiteLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('site-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SiteLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
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

            .package-card-alpha .package-thumb .card-lavel{
                clip-path: none !important;
                padding: 10px;
            }
        </style>
    <?php $__env->stopPush(); ?>
    <?php if (isset($component)) { $__componentOriginaladbfccfbd399fc7411c8a41eefbbb00fced58b8a = $component; } ?>
<?php $component = App\View\Components\Site\Breadcrumb::resolve(['title' => $title] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('site.breadcrumb'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Site\Breadcrumb::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaladbfccfbd399fc7411c8a41eefbbb00fced58b8a)): ?>
<?php $component = $__componentOriginaladbfccfbd399fc7411c8a41eefbbb00fced58b8a; ?>
<?php unset($__componentOriginaladbfccfbd399fc7411c8a41eefbbb00fced58b8a); ?>
<?php endif; ?>
    <div class="package-area package-style-one pt-50">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-head-alpha text-center mx-auto">
                        <h2><?php echo e($page->headLine); ?></h2>
                        <p><?php echo e($page->tagLine); ?></p>
                    </div>
                </div>
            </div>
            <div class="row g-4">
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="package-card-alpha">
                            <div class="package-thumb">
                                <a href="<?php echo e(route('site.tourCategory',['slug' => $post->slug])); ?>"><img
                                        src="<?php echo e(get_package_image($post->thumbnail('cropped','image'))); ?>"
                                        alt="<?php echo e($post->alt_title); ?>"></a>
                                <p class="card-lavel">
                                    <i class="bi bi-pin-map-fill"></i>
                                    <span><?php echo e($post->tour_packages_count); ?> Tours</span>
                                </p>
                            </div>
                            <div class="package-card-body">
                                <h3 class="p-card-title"><a
                                        href="<?php echo e(route('site.tourCategory',['slug' => $post->slug])); ?>"><?php echo e($post->title); ?></a>
                                </h3>































                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal060ba1f57f99c8c33dc0afb221de7a92839c0311)): ?>
<?php $component = $__componentOriginal060ba1f57f99c8c33dc0afb221de7a92839c0311; ?>
<?php unset($__componentOriginal060ba1f57f99c8c33dc0afb221de7a92839c0311); ?>
<?php endif; ?>
<?php /**PATH C:\wamp64\www\new laravel project\himachalcabrentals.com\resources\views/site/templates/pages/tour-packages.blade.php ENDPATH**/ ?>
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
            .des {
                color: #000 !important;
                text-align: justify;
            }

            .des ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
                margin-left: 20px;
                display: flex;
                flex-direction: column;
                flex-wrap: wrap;
            }

            .des ul li {
                margin-bottom: 10px;
                position: relative;
                padding-left: 20px;
                color: #000;
            }

            .des ul li::before {
                position: absolute;
                content: "\f138"; /* Font Awesome check icon Unicode value */
                left: 0;
                font-family: "bootstrap-icons"; /* Font Awesome font family */
                font-weight: 900; /* Font Awesome icon weight */
                color: #ff4838 !important;
            }

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
    <?php if (isset($component)) { $__componentOriginaladbfccfbd399fc7411c8a41eefbbb00fced58b8a = $component; } ?>
<?php $component = App\View\Components\Site\Breadcrumb::resolve(['title' => $destination->title] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
            <div class="des mb-5">
                <?php echo $destination->description; ?>

            </div>
            <?php if($tourPackages->isNotEmpty()): ?>
                <div class="row g-4">
                    <?php $__currentLoopData = $tourPackages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="package-card-alpha">
                                <div class="package-thumb">
                                    <a href="<?php echo e(route('site.tourPackage',['slug' => $post->slug])); ?>"><img
                                            src="<?php echo e(get_package_image($post->thumbnail('cropped','image'))); ?>"
                                            alt="<?php echo e($post->alt_title); ?>"></a>
                                    <p class="card-lavel">
                                        <i class="bi bi-clock"></i>
                                        <span><?php echo e($post->nights); ?> Nights & <?php echo e($post->days); ?> Days</span>
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
                                        <div class="border border-dark cus-btn rounded">
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
            <?php endif; ?>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal060ba1f57f99c8c33dc0afb221de7a92839c0311)): ?>
<?php $component = $__componentOriginal060ba1f57f99c8c33dc0afb221de7a92839c0311; ?>
<?php unset($__componentOriginal060ba1f57f99c8c33dc0afb221de7a92839c0311); ?>
<?php endif; ?>
<?php /**PATH C:\wamp64\www\new laravel project\himachalcabrentals.com\resources\views/site/templates/destination.blade.php ENDPATH**/ ?>
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
            .t-overview p {
                color: #000 !important;
            }

            .t-overview ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
                margin-left: 20px;
                display: flex;
                flex-direction: column;
                flex-wrap: wrap;
            }

            .t-overview ul li {
                margin-bottom: 10px;
                position: relative;
                padding-left: 20px;
                color: #000;
            }

            .t-overview ul li::before {
                position: absolute;
                content: "\f138";
                left: 0;
                font-family: "bootstrap-icons";
                font-weight: 900;
                color: #ff4838 !important;
            }

            .t-itinerary ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
                margin-left: 20px;
                display: flex;
                flex-direction: column;
                flex-wrap: wrap;
            }

            .t-itinerary ul li {
                margin-bottom: 10px;
                position: relative;
                padding-left: 20px;
                color: #000 !important;
                text-align: justify;
            }

            .t-itinerary ul li::before {
                position: absolute;
                content: "\f138";
                left: 0;
                font-family: "bootstrap-icons";
                font-weight: 900;
                color: #ff4838 !important;
            }

            .tour-package-details .package-plan-tab .plans-accordion .plans-accordion-single .accordion-button .plan-title h5 {
                font-size: 16px;
            }

            .tour-package-details .package-plan-tab .plans-accordion .plans-accordion-single .accordion-button {
                position: relative;
            }

            .tour-package-details .package-plan-tab .plans-accordion .plans-accordion-single .accordion-button .paln-index-circle {
                position: absolute;
                width: 60px;
                height: 60px;
            }

            .tour-package-details .package-plan-tab .plans-accordion .plans-accordion-single .accordion-button .plan-title {
                margin-left: 90px;
            }

            .tour-package-details .package-plan-tab .plans-accordion .plans-accordion-single .accordion-button {
                border-radius: 0;
                padding: 10px;
            }

            @media screen and (max-width: 520px) {
                .t-overview {
                    font-size: 14px !important;
                }

                .plan-title h5 {
                    font-weight: 600 !important;
                }
            }

            .tour-package-details .package-plan-tab .plans-accordion .plans-accordion-single .accordion-button::after {
                display: none !important;
            }
        </style>
    <?php $__env->stopPush(); ?>
    <?php if (isset($component)) { $__componentOriginaladbfccfbd399fc7411c8a41eefbbb00fced58b8a = $component; } ?>
<?php $component = App\View\Components\Site\Breadcrumb::resolve(['title' => $package->title,'middle' => true,'subTitle' => 'Tour Packages','subUrl' => 'tour-packages'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
    <div class="package-details-wrapper pt-76">
        <div class="container">
            <div class="row ">
                <div class="col-lg-8">
                    <div class="tour-package-details">
                        <div class="pd-header">
                            <div class=" pd-top row row-cols-lg-4 row-cols-md-2 row-cols-2 gy-4">
                                <div class="col">
                                    <div class="pd-single-info">
                                        <div class="info-icon">
                                            <img src="<?php echo e(asset('images/icons/pd1.svg')); ?>" alt="time">
                                        </div>
                                        <div class="info">
                                            <h6>Duration</h6>
                                            <span><?php echo e($package->nights); ?> Nights / <?php echo e($package->days); ?> Days</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pd-thumb">
                                <img src="<?php echo e(get_package_image($package->image)); ?>" alt="image">
                            </div>
                            <div class="header-bottom">
                                <div class="pd-lavel d-flex justify-content-between align-items-center flex-wrap gap-2">
                                    <h5 class="location"><i
                                            class="bi bi-geo-alt"></i> <?php echo e($package->getDestinationNamesAttribute()); ?></h5>
                                </div>
                                <h2 class="pd-title"><?php echo e($package->title); ?></h2>
                            </div>
                        </div>
                        <div class="package-details-tabs">

                            <div class="tab-content" id="pills-tabContent">

                                <div class="tab-pane fade show active package-plan-tab tab-body mt-3" id="pill-body2"
                                     role="tabpanel" aria-labelledby="pills-package2">
                                    <h3 class="d-subtitle">Overview</h3>
                                    <div class="t-overview" style="text-align: justify;">
                                        <?php echo $package->description; ?>

                                    </div>
                                    <h3 class="d-subtitle mt-5">Itinerary</h3>
                                    <div class="accordion plans-accordion" id="planAccordion">
                                        <?php echo format_itinerary($package->itinerary); ?>

                                    </div>
                                    <h3 class="d-subtitle mt-5">Inclusion</h3>
                                    <ul class="mt-3">
                                        <?php $__currentLoopData = parse_inclusion_exclusion_list($package->inclusions); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="d-flex align-items-baseline mb-1 py-1" style="color: #000"><i
                                                    class="bi bi-check-circle me-1"
                                                    style="color: rgba(33,186,113,0.99)"></i> <?php echo e($element); ?>

                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                    <h3 class="d-subtitle mt-5">Exclusion</h3>
                                    <ul class="mt-3">
                                        <?php $__currentLoopData = parse_inclusion_exclusion_list($package->exclusions); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="d-flex align-items-baseline mb-1 py-1" style="color: #000"><i
                                                    class="bi bi-x-circle me-1"
                                                    style="color: rgba(206,19,19,0.85)"></i> <?php echo e($element); ?>

                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="package-sidebar">
                        <?php if (isset($component)) { $__componentOriginal0e0eb54d3a2d152f6b50c87a99d60f6df50a816b = $component; } ?>
<?php $component = App\View\Components\Site\TourBookingForm::resolve(['tour' => $package->id] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('site.tour-booking-form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Site\TourBookingForm::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0e0eb54d3a2d152f6b50c87a99d60f6df50a816b)): ?>
<?php $component = $__componentOriginal0e0eb54d3a2d152f6b50c87a99d60f6df50a816b; ?>
<?php unset($__componentOriginal0e0eb54d3a2d152f6b50c87a99d60f6df50a816b); ?>
<?php endif; ?>
                        <?php if($relatedTourPackages->isNotEmpty()): ?>
                            <aside class="package-widget-style-2 widget-recent-package-entries mt-30">
                                <div class="widget-title text-center">
                                    <h4>Related Package</h4>
                                </div>
                                <div class="widget-body">
                                    <ul>
                                        <?php $__currentLoopData = $relatedTourPackages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relPack): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="package-sm">
                                                <div class="thumb">
                                                    <a href="<?php echo e(route('site.tourPackage',['slug' => $relPack->slug])); ?>">
                                                        <img
                                                            src="<?php echo e(get_package_image($relPack->thumbnail('cropped','image'))); ?>"
                                                            alt>
                                                    </a>
                                                </div>
                                                <div class="info">
                                                    <h6>
                                                        <a href="<?php echo e(route('site.tourPackage',['slug' => $relPack->slug])); ?>"><?php echo e($relPack->title); ?></a>
                                                    </h6>
                                                </div>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            </aside>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal060ba1f57f99c8c33dc0afb221de7a92839c0311)): ?>
<?php $component = $__componentOriginal060ba1f57f99c8c33dc0afb221de7a92839c0311; ?>
<?php unset($__componentOriginal060ba1f57f99c8c33dc0afb221de7a92839c0311); ?>
<?php endif; ?>

<?php /**PATH C:\wamp64\www\new laravel project\himachalcabrentals.com\resources\views/site/templates/tour-package-2.blade.php ENDPATH**/ ?>
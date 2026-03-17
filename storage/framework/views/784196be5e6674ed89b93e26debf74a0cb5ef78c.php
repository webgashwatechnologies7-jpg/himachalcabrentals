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
            .cab-title {
                font-size: 20px !important;
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
                        <b class="font-weight-bold text-dark text-decoration-underline"><?php echo e($title); ?></b>
                        <h2 class="pt-1"><?php echo e($page->headLine); ?></h2>
                        <p><?php echo e($page->tagLine); ?></p>
                    </div>
                </div>
            </div>
            <div class="row g-4">
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="package-card-alpha">
                            <div class="package-thumb">
                                <a href="javascript:void(0);"><img
                                        src="<?php echo e(get_package_image($post->thumbnail('cropped','image'))); ?>"
                                        alt="<?php echo e($post->alt_title); ?>" height="281"
                                        style="object-fit: cover; object-position: center center"></a>
                                <p class="card-lavel">
                                    <i class="bi bi-cash-coin"></i>
                                    <span>₹<?php echo e($post->rent_per_day); ?></span> /Day<sup>*</sup></span>
                                </p>
                            </div>
                            <div class="package-card-body">
                                <h3 class="p-card-title"><a
                                        href="javascript:void(0);"><?php echo e($post->title); ?></a>
                                </h3>
                                <div class="d-flex justify-content-between px-2 pb-2 pt-4">
                                    <div class="d-flex flex-column align-items-center">
                                        <i class='bx bx-food-menu bg-danger text-white p-2 rounded-circle'></i>
                                        <small><?php echo e($post->seats); ?> + 1 Seats</small>
                                    </div>
                                    <div class="d-flex flex-column align-items-center">
                                        <i class='bx bx-car bg-danger text-white p-2 rounded-circle'></i>
                                        <small><?php echo e($post->ac_type); ?></small>
                                    </div>
                                    <div class="d-flex flex-column align-items-center">
                                        <i class='bx bx-hotel bg-danger text-white p-2 rounded-circle'></i>
                                        <small><?php echo e($post->fuel_type); ?></small>
                                    </div>
                                </div>
                                <div class="p-card-bottom">
                                    <div class="book-btn" style="width: 100%;">
                                        <a href="javascript:void(0);" style="width: 100%; text-align: center;"
                                           onclick="bookCab(<?php echo e(json_encode(['id' => $post->id, 'title' => $post->title, 'seats' => $post->seats])); ?>)">Book
                                            Now
                                            <i
                                                class="bx bxs-right-arrow-alt"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <?php $__env->startPush('scripts'); ?>
        <script>
            function bookCab(cab) {
                if (localStorage.getItem("BOOK_CAB") != null) {
                    localStorage.removeItem("BOOK_CAB");
                }
                localStorage.setItem("BOOK_CAB", JSON.stringify(cab));
                window.location.href = '<?php echo e(url('/taxi-booking')); ?>'
            }
        </script>
    <?php $__env->stopPush(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal060ba1f57f99c8c33dc0afb221de7a92839c0311)): ?>
<?php $component = $__componentOriginal060ba1f57f99c8c33dc0afb221de7a92839c0311; ?>
<?php unset($__componentOriginal060ba1f57f99c8c33dc0afb221de7a92839c0311); ?>
<?php endif; ?>
<?php /**PATH C:\wamp64\www\new laravel project\himachalcabrentals.com\resources\views/site/templates/pages/cabs.blade.php ENDPATH**/ ?>
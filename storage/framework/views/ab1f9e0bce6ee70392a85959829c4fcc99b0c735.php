<?php if (isset($component)) { $__componentOriginal060ba1f57f99c8c33dc0afb221de7a92839c0311 = $component; } ?>
<?php $component = App\View\Components\SiteLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('site-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SiteLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
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
    <div class="destination-area destination-style-two pt-50">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-sm-10 ">
                    <div class="section-head-alpha text-center mx-auto">
                        <h2><?php echo e($page->headLine); ?></h2>
                        <p><?php echo e($page->tagLine); ?></p>
                    </div>
                </div>
            </div>
            <?php if($data && count($data) > 0): ?>
                <div class="row d-flex justify-content-start g-4">
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-md-6 col-sm-10 fadeffect"
                        >
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
<?php /**PATH C:\wamp64\www\new laravel project\himachalcabrentals.com\resources\views/site/templates/pages/destinations.blade.php ENDPATH**/ ?>
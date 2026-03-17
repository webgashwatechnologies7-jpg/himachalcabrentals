<?php if (isset($component)) { $__componentOriginal060ba1f57f99c8c33dc0afb221de7a92839c0311 = $component; } ?>
<?php $component = App\View\Components\SiteLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('site-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SiteLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <?php if (isset($component)) { $__componentOriginalea3d2547ef826d6b532c440b88fa4dcb3b626253 = $component; } ?>
<?php $component = App\View\Components\Site\Home\Slider::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('site.home.slider'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Site\Home\Slider::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalea3d2547ef826d6b532c440b88fa4dcb3b626253)): ?>
<?php $component = $__componentOriginalea3d2547ef826d6b532c440b88fa4dcb3b626253; ?>
<?php unset($__componentOriginalea3d2547ef826d6b532c440b88fa4dcb3b626253); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginal75132cfb29e51546c3dccad738c0d97c24267efe = $component; } ?>
<?php $component = App\View\Components\Site\Home\QueryForm::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('site.home.query-form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Site\Home\QueryForm::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal75132cfb29e51546c3dccad738c0d97c24267efe)): ?>
<?php $component = $__componentOriginal75132cfb29e51546c3dccad738c0d97c24267efe; ?>
<?php unset($__componentOriginal75132cfb29e51546c3dccad738c0d97c24267efe); ?>
<?php endif; ?>
    <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($section->model == MODEL_TOUR_PACKAGE): ?>
            <?php if (isset($component)) { $__componentOriginald6b55b8fdb23a6fed143b4e9640a2e941df0b757 = $component; } ?>
<?php $component = App\View\Components\Site\Home\Packages::resolve(['section' => $section] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('site.home.packages'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Site\Home\Packages::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald6b55b8fdb23a6fed143b4e9640a2e941df0b757)): ?>
<?php $component = $__componentOriginald6b55b8fdb23a6fed143b4e9640a2e941df0b757; ?>
<?php unset($__componentOriginald6b55b8fdb23a6fed143b4e9640a2e941df0b757); ?>
<?php endif; ?>
        <?php elseif($section->model == MODEL_DESTINATION): ?>
            <?php if (isset($component)) { $__componentOriginal00566a090f5a8ef04b42a438471fad38f7fe5ee9 = $component; } ?>
<?php $component = App\View\Components\Site\Home\Destination::resolve(['section' => $section] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('site.home.destination'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Site\Home\Destination::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal00566a090f5a8ef04b42a438471fad38f7fe5ee9)): ?>
<?php $component = $__componentOriginal00566a090f5a8ef04b42a438471fad38f7fe5ee9; ?>
<?php unset($__componentOriginal00566a090f5a8ef04b42a438471fad38f7fe5ee9); ?>
<?php endif; ?>


        <?php elseif($section->model == MODEL_TESTIMONAIL): ?>
            <?php if (isset($component)) { $__componentOriginalc46839edcbbe9ec70523d135cf335132cd63b02d = $component; } ?>
<?php $component = App\View\Components\Site\Home\Testimonails::resolve(['section' => $section] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('site.home.testimonails'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Site\Home\Testimonails::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc46839edcbbe9ec70523d135cf335132cd63b02d)): ?>
<?php $component = $__componentOriginalc46839edcbbe9ec70523d135cf335132cd63b02d; ?>
<?php unset($__componentOriginalc46839edcbbe9ec70523d135cf335132cd63b02d); ?>
<?php endif; ?>
        <?php elseif($section->model == MODEL_CAB): ?>
            <?php if (isset($component)) { $__componentOriginala8c90ee4bc7e4dd12dece4d221bcced95c746f6a = $component; } ?>
<?php $component = App\View\Components\Site\Home\Cabs::resolve(['section' => $section] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('site.home.cabs'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Site\Home\Cabs::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala8c90ee4bc7e4dd12dece4d221bcced95c746f6a)): ?>
<?php $component = $__componentOriginala8c90ee4bc7e4dd12dece4d221bcced95c746f6a; ?>
<?php unset($__componentOriginala8c90ee4bc7e4dd12dece4d221bcced95c746f6a); ?>
<?php endif; ?>
        <?php elseif($section->model == MODEL_POST): ?>
            <?php if (isset($component)) { $__componentOriginal1b534319ee40b138cbaa8e519a955fae999ddb9e = $component; } ?>
<?php $component = App\View\Components\Site\Home\Blog::resolve(['section' => $section] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('site.home.blog'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Site\Home\Blog::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1b534319ee40b138cbaa8e519a955fae999ddb9e)): ?>
<?php $component = $__componentOriginal1b534319ee40b138cbaa8e519a955fae999ddb9e; ?>
<?php unset($__componentOriginal1b534319ee40b138cbaa8e519a955fae999ddb9e); ?>
<?php endif; ?>
        <?php else: ?>
            <div>Invalid Data..!!</div>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal060ba1f57f99c8c33dc0afb221de7a92839c0311)): ?>
<?php $component = $__componentOriginal060ba1f57f99c8c33dc0afb221de7a92839c0311; ?>
<?php unset($__componentOriginal060ba1f57f99c8c33dc0afb221de7a92839c0311); ?>
<?php endif; ?>

<?php /**PATH C:\wamp64\www\new laravel project\himachalcabrentals.com\resources\views/site/index.blade.php ENDPATH**/ ?>
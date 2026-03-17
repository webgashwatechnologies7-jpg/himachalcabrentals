<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <?php echo SEO::generate(); ?>

    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('favicon.ico')); ?>">
    <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('css/select2.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('css/jquery.fancybox.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('css/boxicons.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('css/swiper-bundle.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('css/animate.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('css/responsive.css')); ?>" rel="stylesheet" type="text/css">
    <style>
        .pop-modal {
            display: none;
            position: fixed;
            z-index: 999;
            padding-top: 40px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
        }

        .pop-modal-content {
            position: relative;
            background-color: #fefefe;
            margin: auto;
            padding: 0;
            border: 1px solid #888;
            width: 90%;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            -webkit-animation-name: animatetop;
            -webkit-animation-duration: 0.4s;
            animation-name: animatetop;
            animation-duration: 0.4s;
        }

        @keyframes animatetop {
            from {
                top: -300px;
                opacity: 0;
            }
            to {
                top: 0;
                opacity: 1;
            }
        }

        .pop-modal-header {
            position: relative;
            padding: 8px 16px;
            background-color: #dc3545;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 4px;
        }

        .pop-modal-header .heading {
            font-size: 16px;
            text-align: center;
            padding-top: 8px;
            color: #fff;
        }

        .pop-modal-body {
            padding: 2px 16px;
        }

        /* The Close Button */
        .pop-close {
            top: -8px;
            right: -8px;
            position: absolute;
            color: #ffffff;
            font-size: 18px;
            background: #000;
            width: 26px;
            height: 26px;
            border-radius: 50%;
            padding: 0 7px;
        }

        .pop-close:hover,
        .pop-close:focus {
            color: #dc3545;
            text-decoration: none;
            cursor: pointer;
            font-weight: bold;
        }

        #msform {
            text-align: center;
            position: relative;
            margin-top: 10px;
        }

        #msform fieldset {
            background: white;
            border: 0 none;
            border-radius: 0.5rem;
            box-sizing: border-box;
            width: 100%;
            margin: 0;
            padding-bottom: 20px;
            position: relative;
        }

        #msform fieldset:not(:first-of-type) {
            display: none;
        }

        #msform input, #msform textarea {
            padding: 8px 15px 8px 30px;
            border: 1px solid #ccc;
            border-radius: 0px;
            margin-top: 8px;
            width: 100%;
            box-sizing: border-box;
            color: #2C3E50;
            background-color: #ECEFF1;
            font-size: 14px;
            letter-spacing: 1px;
        }

        #msform input:focus, #msform textarea:focus {
            box-shadow: none !important;
            border: 1px solid #673AB7;
            outline-width: 0;
        }

        #msform .action-button {
            width: 100%;
            background: #000;
            color: white;
            border: 0 none;
            border-radius: 0px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 0px 10px 5px;
            float: right;
            padding: 15px;
        }

        #msform .action-button:hover, #msform .action-button:focus {
            background-color: #dc3545;
        }

        #msform .action-button-previous {
            width: 100px;
            background: #616161;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 0px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px 10px 0px;
            float: right;
        }

        #msform .action-button-previous:hover, #msform .action-button-previous:focus {
            background-color: #000000;
        }

        .form-card {
            text-align: left;
        }

        @media screen and (min-width: 421px) {
            .pop-modal-content {
                width: 420px;
            }
        }

        #progressbar {
            margin-bottom: 10px;
            margin-top: 10px;
            overflow: hidden;
            color: lightgrey
        }

        #progressbar .active {
            color: #dc3545;
        }

        #progressbar li {
            list-style-type: none;
            font-size: 12px;
            width: 33.33%;
            float: left;
            position: relative;
            font-weight: 400
        }

        #progressbar #personal:before {
            content: "1";
        }

        #progressbar #travel:before {
            content: "2"
        }

        #progressbar #finish:before {
            content: "3"
        }

        #progressbar li:before {
            width: 30px;
            height: 30px;
            line-height: 30px;
            display: block;
            font-size: 14px;
            color: #ffffff;
            background: lightgray;
            border-radius: 50%;
            margin: 0 auto 10px auto;
            padding: 2px
        }

        #progressbar li:after {
            content: '';
            width: 100%;
            height: 2px;
            background: lightgray;
            position: absolute;
            left: 0;
            top: 22px;
        }

        #progressbar li.active:before,
        #progressbar li.active:after {
            background: #dc3545;
        }

        .input-container {
            position: relative;
            width: 100%;
        }

        .input-container .icon {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #dc3545;
            font-size: 15px;
        }

        .form-card label.is-invalid {
            font-size: 12px;
            margin-bottom: 0;
            color: #C62828;
        }

        .form-card input.is-invalid {
            border: 1px solid #C62828 !important;
        }

        .m-alert {
            z-index: 10000;
        }

        @media (max-width: 767px) {
            .bottom-nav {
                position: fixed;
                bottom: 0;
                width: 100%;
                background-color: #fff;
                display: flex;
                justify-content: space-between;
                align-items: center;
                z-index: 1;
                box-shadow: 1px -1px 5px 0px rgba(0, 0, 0, 0.75);
                text-align: center;
            }

            .bottom-nav-item {
                padding: 10px 0;
                flex-grow: 1;
                display: flex;
                flex-direction: column;
                text-decoration: none;
                color: #333;
                background-color: #fff;
                transition: background-color 0.3s ease;
                text-transform: uppercase;
                font-size: 14px;
                border-right: 1px solid rgba(0, 0, 0, 0.04);
            }

            .bottom-nav-item:last-child {
                border-right: none;
            }

            .bottom-nav-item i {
                font-size: 20px;
            }

            .bottom-nav-item:hover {
                background-color: var(--primary);
                color: #fff;
                font-weight: bold;
            }

            .bottom-nav-item a:hover {
                color: #fff;
            }
        }

        @media (min-width: 768px) {
            .bottom-nav {
                display: none;
            }
        }
    </style>
    <?php echo $__env->yieldPushContent('styles'); ?>
    <?php echo get_all_seo_head_tags(); ?>

</head>
<body>
<?php echo get_all_seo_body_tags(); ?>

<div class="preloader">
    <div class="loader">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>
<?php if (isset($component)) { $__componentOriginal0fbbf07d0e764cb0eaf83a9205275a16ee002a1b = $component; } ?>
<?php $component = App\View\Components\Site\Nav::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('site.nav'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Site\Nav::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0fbbf07d0e764cb0eaf83a9205275a16ee002a1b)): ?>
<?php $component = $__componentOriginal0fbbf07d0e764cb0eaf83a9205275a16ee002a1b; ?>
<?php unset($__componentOriginal0fbbf07d0e764cb0eaf83a9205275a16ee002a1b); ?>
<?php endif; ?>
<main>
    <?php echo e($slot); ?>

</main>
<?php if (isset($component)) { $__componentOriginale6981dbbf32c4642e6ceb66bb9a5b078251341ff = $component; } ?>
<?php $component = App\View\Components\Site\Footer::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('site.footer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Site\Footer::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale6981dbbf32c4642e6ceb66bb9a5b078251341ff)): ?>
<?php $component = $__componentOriginale6981dbbf32c4642e6ceb66bb9a5b078251341ff; ?>
<?php unset($__componentOriginale6981dbbf32c4642e6ceb66bb9a5b078251341ff); ?>
<?php endif; ?>
<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.modal.package-query','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('modal.package-query'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.common.bottom-nav','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('common.bottom-nav'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

<script src="<?php echo e(asset('js/jquery-3.6.0.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/bootstrap.bundle.min.js')); ?>"></script>
<script defer src="<?php echo e(asset('js/chain_fade.js')); ?>"></script>
<script defer src="<?php echo e(asset('js/owl.carousel.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/swiper-bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/jquery.fancybox.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/select2.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/jquery-ui.js')); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"
        integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script defer src="<?php echo e(asset('js/main.js')); ?>"></script>
<script defer src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script>
<script>
    $(function () {
        $(".input-date-picker").datepicker({
            dateFormat: 'dd-mm-yy',
            minDate: 0,
            onClose: function () {
                this.focus();
            }
        });
    });
</script>
<?php echo $__env->yieldPushContent('scripts'); ?>
<script type="text/javascript">
    const observer = lozad('.lozad', {
        rootMargin: '10px 0px',
        threshold: 0.1,
        enableAutoReload: true
    });
    observer.observe();
</script>
</body>
</html>


<?php /**PATH C:\wamp64\www\new laravel project\himachalcabrentals.com\resources\views/layouts/site.blade.php ENDPATH**/ ?>
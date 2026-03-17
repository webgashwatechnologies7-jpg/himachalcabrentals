<?php $__env->startPush('styles'); ?>
    <style>
        .breadcrumb-item+.breadcrumb-item::before{
            font-family: bootstrap-icons !important;
            color: #ff4838;
            float: none;
            font-size: 12px;
        }
        @media screen and (max-width: 520px) {
            .breadcrumb-title{
                font-size: 24px !important;
                margin-bottom: 10px;
            }
            .breadcrumb-style-one{
                padding: 50px 0;
            }
        }
    </style>
<?php $__env->stopPush(); ?>
<div class="breadcrumb breadcrumb-style-one">
    <div class="container">
        <div class="col-lg-12 text-center">
            <h2 class="breadcrumb-title"><?php echo e($title); ?></h2>
            <ul class="d-flex justify-content-center breadcrumb-items flex-wrap">
                <li class="breadcrumb-item"><a href="<?php echo e(route('site.home')); ?>">Home</a></li>
                <?php if($middle): ?>
                    <li class="breadcrumb-item"><a href="<?php echo e(url($subUrl)); ?>"><?php echo e($subTitle); ?></a></li>
                <?php endif; ?>
                <li class="breadcrumb-item active"><?php echo e($title); ?></li>
            </ul>
        </div>
    </div>
</div>


<?php /**PATH C:\wamp64\www\new laravel project\himachalcabrentals.com\resources\views/components/site/breadcrumb.blade.php ENDPATH**/ ?>
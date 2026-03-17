<div class="topbar-area topbar-style-one">
    <div class="container">
        <div class="row p-2">
            <div class="col-sm-12 col-md-8 align-items-center d-sm-flex d-none justify-content-start">
                <div class="topbar-contact-left">
                    <ul class="contact-list">
                        <li><i class="bi bi-telephone-fill"></i> <a
                                href="tel:<?php echo e(setting('contact.contact_phone')); ?>">+91-<?php echo e(setting('contact.contact_phone')); ?></a>
                        </li>
                        <li><i class="bi bi-envelope-fill"></i> <a
                                href="#"><span><?php echo e(setting('contact.contact_email')); ?></span></a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-4 d-flex align-items-center d-md-flex d-none justify-content-end">
                <ul class="topbar-social-links">
                    <?php if(setting('social-media.facebook') && setting('social-media.facebook') != ''): ?>
                        <li><a href="#"><i class="bx bxl-facebook"></i></a></li>
                    <?php endif; ?>
                    <?php if(setting('social-media.instagram') && setting('social-media.instagram') != ''): ?>
                        <li><a href="#"><i class="bx bxl-instagram-alt"></i></a></li>
                    <?php endif; ?>
                    <?php if(setting('social-media.whatsapp') && setting('social-media.whatsapp') != ''): ?>
                        <li><a href="#"><i class="bx bxl-whatsapp-square"></i></a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<header>
    <div class="header-area header-style-one">
        <div class="container">
            <div class="row">
                <div class="col-xl-2 col-lg-12 col-md-12 col-sm-12 col-xs-12 align-items-center d-xl-flex d-lg-block">
                    <div class="nav-logo d-flex justify-content-between align-items-center">
                        <a href="<?php echo e(route('site.home')); ?>">
                            <?php if(setting('site.logo') == ''): ?>
                                <b>Logo</b>
                            <?php else: ?>
                                <img src="<?php echo e(\TCG\Voyager\Facades\Voyager::image(setting('site.logo'))); ?>" alt="logo">
                            <?php endif; ?>
                        </a>
                        <div class="d-flex align-items-center gap-4">
                            <div class="mobile-menu d-flex ">
                                <a href="javascript:void(0)" class="hamburger d-block d-xl-none">
                                    <span class="h-top"></span>
                                    <span class="h-middle"></span>
                                    <span class="h-bottom"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-10 col-lg-10 col-md-10 col-sm-6 col-xs-6">
                    <nav class="main-nav float-end">
                        <div class="inner-logo d-xl-none text-center">
                            <a href="<?php echo e(route('site.home')); ?>"><img
                                    src="<?php echo e(\TCG\Voyager\Facades\Voyager::image(setting('site.logo'))); ?>" alt></a>
                        </div>
                        <ul>
                            <li><a href="<?php echo e(route('site.home')); ?>">Home</a></li>
                            <li><a href="<?php echo e(url('/about-us')); ?>">About Us</a></li>
                            <li class="has-child-menu">
                                <a href="<?php echo e(url('/destinations')); ?>">Destinations</a>
                                <i class="fl flaticon-plus">+</i>
                                <ul class="sub-menu">
                                    <?php echo get_destination_nav_items(); ?>

                                </ul>
                            </li>
                            <li class="has-child-menu">
                                <a href="<?php echo e(url('/tour-packages')); ?>">Tour Packages</a>
                                <i class="fl flaticon-plus">+</i>
                                <ul class="sub-menu">
                                    <?php echo get_tour_category_list(); ?>

                                </ul>
                            </li>
                            <li><a href="<?php echo e(url('/our-cabs')); ?>">Our Cabs</a></li>
                            <li><a href="<?php echo e(url('/blog')); ?>">Blog</a></li>
                        </ul>
                        <div class="inner-contact-options d-xl-none">
                            <div class="contact-box-inner"><i class="bi bi-telephone-fill"></i> <a
                                    href="tel:<?php echo e(setting('contact.contact_phone')); ?>">+91-<?php echo e(setting('contact.contact_phone')); ?></a>
                            </div>
                            <div class="contact-box-inner"><i class="bi bi-envelope-fill"></i> <a
                                    href="mailto:<?php echo e(setting('contact.contact_email')); ?>"><span><?php echo e(setting('contact.contact_email')); ?></span></a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>


<?php /**PATH C:\wamp64\www\new laravel project\himachalcabrentals.com\resources\views/components/site/nav.blade.php ENDPATH**/ ?>
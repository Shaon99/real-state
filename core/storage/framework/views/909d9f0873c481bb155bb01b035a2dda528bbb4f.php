<header id="header-container" class="header head-tr">
    <div id="header" class="head-tr bottom">
        <div class="container container-header">
            <div class="left-side">
                <div id="logo">
                    <?php if(@$general->logo): ?>
                        <a href="<?php echo e(route('home')); ?>">
                            <img src="<?php echo e(getFile('logo', @$general->logo)); ?>"
                                data-sticky-logo="<?php echo e(getFile('logo', @$general->logo)); ?>" alt="logo">
                        </a>
                    <?php else: ?>
                        <a href="<?php echo e(route('home')); ?>">
                            <img src="<?php echo e(getFile('default', @$general->default_image)); ?>"
                                data-sticky-logo="<?php echo e(getFile('default', @$general->default_image)); ?>" alt="logo">
                        </a>
                    <?php endif; ?>
                </div>
                <div class="mmenu-trigger">
                    <button class="hamburger hamburger--collapse" type="button">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
                <nav id="navigation" class="style-1 head-tr">
                    <ul id="responsive">
                        <li>
                            <a href="<?php echo e(route('home')); ?>">HOME</a>
                        </li>
                        <li><a href="javascript:void(0)">PROPERTIES</a>
                            <ul>
                                <?php $__empty_1 = true; $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <li><a href="<?php echo e(route('collectionproperty',Str::slug($item->name))); ?>"><?php echo e($item->name); ?></a></li>   
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    
                                <?php endif; ?>
                                                            
                            </ul>
                        </li>
                        </li>
                        <?php $__empty_1 = true; $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <li><a href="<?php echo e(route('pages', $page->slug)); ?>"><?php echo e($page->name); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <?php endif; ?>

                        <li><a href="javascript:void(0)">gallery</a>
                            <ul>
                                <li><a href="<?php echo e(route('photogallery')); ?>">Photo Gallery</a></li>
                                <li><a href="<?php echo e(route('vediogallery')); ?>">Vedio Gallery</a></li>
                            </ul>
                        </li>

                    </ul>
                </nav>
                <!-- Main Navigation / End -->
            </div>
            <!-- Left Side Content / End -->

        </div>
    </div>
    <!-- Header / End -->

</header>
<div class="clearfix"></div>
<!-- Header Container / End -->
<?php /**PATH C:\xampp\htdocs\asset\core\resources\views/frontend/layout/header.blade.php ENDPATH**/ ?>
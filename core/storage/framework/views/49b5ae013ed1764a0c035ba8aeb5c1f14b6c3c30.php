<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a class="text-white" href="<?php echo e(route('admin.home')); ?>"><?php echo e(@$general->sitename); ?>

            </a>
        </div>

        <ul class="sidebar-menu">

            <li class="nav-item dropdown <?php echo e(menuActive('admin.home')); ?>">
                <a href="<?php echo e(route('admin.home')); ?>" class="nav-link "><i
                        class="fas fa-fire"></i><span><?php echo e(__('Dashboard')); ?></span></a>
            </li>

            
            <li class="nav-item dropdown <?php echo e(@$locationsActive); ?>">
                <a href="<?php echo e(route('admin.locations.index')); ?>" class="nav-link "><i
                        class="fa fa-map-marker"></i><span><?php echo e(__('Location')); ?></span></a>
            </li>
    
            <li class="nav-item dropdown <?php echo e(@$propertytypeActive); ?>">
                <a href="<?php echo e(route('admin.property-type.index')); ?>" class="nav-link "><i
                        class="fa fa-home"></i><span><?php echo e(__('Property Type')); ?></span></a>
            </li>

            <li class="nav-item dropdown <?php echo e(@$propertiesActive); ?>">
                <a href="<?php echo e(route('admin.properties.index')); ?>" class="nav-link "><i
                        class="fa fa-home"></i><span><?php echo e(__('Properties')); ?></span></a>
            </li>
           

            <li class="menu-header"><?php echo e(__('Email Settings')); ?></li>

            <li class="nav-item dropdown <?php echo e(@$navEmailManagerActiveClass); ?>">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-envelope"></i>
                    <span><?php echo e(__('Email Manager')); ?></span></a>
                <ul class="dropdown-menu">
                    <li class="<?php echo e(@$subNavEmailConfigActiveClass); ?>">
                        <a class="nav-link"
                            href="<?php echo e(route('admin.email.config')); ?>"><?php echo e(__('Email Configure')); ?></a>
                    </li>
                    <li class="<?php echo e(@$subNavEmailTemplatesActiveClass); ?>">
                        <a class="nav-link"
                            href="<?php echo e(route('admin.email.templates')); ?>"><?php echo e(__('Email Templates')); ?></a>
                    </li>

                    <li class="<?php echo e(@$subscriberActiveClass); ?>">
                        <a class="nav-link"
                            href="<?php echo e(route('admin.sendEmail')); ?>"><?php echo e(__('Email To Subscriber')); ?></a>
                    </li>
                </ul>
            </li>


            <li class="menu-header"><?php echo e(__('System Settings')); ?></li>

            <li class="nav-item dropdown <?php echo e(@$navGeneralSettingsActiveClass); ?>">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-cog"></i>
                    <span><?php echo e(__('General Settings')); ?></span></a>
                <ul class="dropdown-menu">
                    <li class="<?php echo e(@$subNavGeneralSettingsActiveClass); ?>">
                        <a class="nav-link"
                            href="<?php echo e(route('admin.general.setting')); ?>"><?php echo e(__('General Settings')); ?></a>
                    </li>

                    <li>
                        <a class="nav-link"
                            href="<?php echo e(route('admin.general.database')); ?>"><?php echo e(__('Database Backup')); ?></a>
                    </li>
                    <li>
                        <a class="nav-link"
                            href="<?php echo e(route('admin.general.cacheclear')); ?>"><?php echo e(__('Cache Clear')); ?></a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown <?php echo e(@$navManagePagesActiveClass); ?>">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span><?php echo e(__('Frontend')); ?></span>
                </a>

                <ul class="dropdown-menu">
                    <li class="<?php echo e(@$subNavPagesActiveClass); ?>">
                        <a class="nav-link" href="<?php echo e(route('admin.frontend.pages')); ?>"><?php echo e(__('Pages')); ?></a>
                    </li>

                    <?php $__empty_1 = true; $__currentLoopData = $urlSections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    
                        <li class="<?php if(frontendFormatter($key)==frontendFormatter(@$activeClass)): ?> active <?php else: ?> ' ' <?php endif; ?>">
                            <a class="nav-link"
                                href="<?php echo e(route('admin.frontend.section.manage', ['name' => $key])); ?>"><?php echo e(frontendFormatter($key) . ' Section'); ?></a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                    <?php endif; ?>
                </ul>

            </li>



            <li class="nav-item dropdown <?php echo e(@$subscribersActiveClass); ?>">
                <a href="<?php echo e(route('admin.subscribers')); ?>" class="nav-link "><i
                        class="fas fa-users"></i><span><?php echo e(__('Newsletter Subscriber')); ?></span></a>
            </li>
            <li class="nav-item dropdown <?php echo e(@$contactusActiveClass); ?>">
                <a href="<?php echo e(route('admin.requestquery')); ?>" class="nav-link "><i
                        class="fas fa-users"></i><span><?php echo e(__('Request-Query')); ?></span></a>
            </li>

            <li class="nav-item dropdown <?php echo e(@$contactusActiveClass); ?>">
                <a href="<?php echo e(route('admin.contact-us')); ?>" class="nav-link "><i
                        class="fas fa-users"></i><span><?php echo e(__('Contact-Us-Data')); ?></span></a>
            </li>

        </ul>

    </aside>
</div>
<?php /**PATH C:\xampp\htdocs\asset\core\resources\views/backend/layout/sidebar.blade.php ENDPATH**/ ?>
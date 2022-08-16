<?php
$footerContent = content('footer.content');
$footerElement = element('footer.element');
$contact = content('contact.content');
$newsletterContent = content('newsletter.content');
?>

<footer class="first-footer rec-pro">
    <div class="top-footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="netabout">
                        <a href="<?php echo e(route('home')); ?>" class="logo">
                            <img src="<?php echo e(getFile('footer', @$footerContent->data->footer_logo)); ?>" alt="logo">
                        </a>
                        <p><?php echo e(@$footerContent->data->footer_short_description); ?></p>
                    </div>
                    <div class="contactus">
                        <ul>
                            <li>
                                <div class="info">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    <p class="in-p"><?php echo e(@$contact->data->location); ?></p>
                                </div>
                            </li>
                            <li>
                                <div class="info">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                    <p class="in-p"><?php echo e(@$contact->data->phone); ?></p>
                                </div>
                            </li>
                            <li>
                                <div class="info">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    <p class="in-p ti"><?php echo e(@$contact->data->email); ?></p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-lg-3 col-md-6">
                    <div class="navigation">
                        <h3>Navigation</h3>
                        <div class="nav-footer text-capitalize">
                            <ul>
                                <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
                                <?php $__empty_1 = true; $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <li><a href="<?php echo e(route('pages', $page->slug)); ?>"><?php echo e($page->name); ?></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <?php endif; ?>
                            </ul>
                            <ul class="nav-right text-capitalize">
                                <li><a href="<?php echo e(route('photogallery')); ?>">Photo Gallery</a></li>
                                <li><a href="<?php echo e(route('vediogallery')); ?>">Vedio Gallery</a></li> 
                            </ul>
                        </div>
                    </div>
                </div>
          
                <div class="col-lg-4 col-md-6">
                    <div class="newsletters">
                        <h3><?php echo e(@$newsletterContent->data->title); ?></h3>
                        <p><?php echo e(@$newsletterContent->data->short_description); ?></p>
                    </div>
                    <form class="bloq-email" action="#" id="subscribe" method="post">
                        <div class="email">
                            <input type="email" class="subscribe-email" name="email" placeholder="Enter Your Email">
                            <input type="submit" value="Subscribe">
                            <p class="subscription-success"></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="second-footer rec-pro">
        <div class="container-fluid sd-f">
            <ul class="netsocials">
                <?php $__empty_1 = true; $__currentLoopData = $footerElement; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <li><a href="<?php echo e(@$item->data->social_link); ?>" target="_blank"><i
                                class="<?php echo e(@$item->data->social_icon); ?>" aria-hidden="true"></i></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <li><a href="#">data not found</a></li>
                <?php endif; ?>
            </ul>
            <p class="copy-right text-lowercase">@Copyright  reserved <?php echo e(__(@$general->sitename)); ?> | Developed by <a
                    class="text-capitalize text-success" href="https://www.techdynobd.com/" target="_blank">Techdyno BD Ltd</a></p>
        </div>
    </div>
</footer>

<a data-scroll href="#wrapper" class="go-up"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>
<?php /**PATH C:\xampp\htdocs\asset\core\resources\views/frontend/layout/footer.blade.php ENDPATH**/ ?>
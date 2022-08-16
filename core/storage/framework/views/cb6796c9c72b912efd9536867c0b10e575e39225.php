<?php
$content = content('why_choose_us.content');
$elements = element('why_choose_us.element');
?>
<section class="how-it-works bg-white rec-pro">
    <div class="container-fluid">
        <div class="sec-title">
            <h2><?php echo e(@$content->data->title); ?></h2>
            <p><?php echo e(@$content->data->short_description); ?></p>
        </div>
        <div class="row service-1">
            
            <?php $__empty_1 = true; $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <article class="col-lg-3 col-md-6 col-xs-12 serv" data-aos="fade-up" data-aos-delay="150">
                <div class="serv-flex">
                    <div class="art-1 img-13">
                        <img src="<?php echo e(getFile('why_choose_us',@$item->data->image)); ?>" alt="img">
                        <h3><?php echo e(@$item->data->title); ?></h3>
                    </div>
                    <div class="service-text-p">
                        <p class="text-center">
                            <?php echo e(@$item->data->short_description); ?>

                        </p>
                    </div>
                </div>
            </article> 
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                
            <?php endif; ?>
                              
        </div>
    </div>
</section>
<!-- END SECTION WHY CHOOSE US -->        <?php /**PATH C:\xampp\htdocs\asset\core\resources\views/frontend/sections/why_choose_us.blade.php ENDPATH**/ ?>
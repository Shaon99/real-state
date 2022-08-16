<?php
$content = content('testimonial.content');
$elements = element('testimonial.element');
?>
<!-- START SECTION TESTIMONIALS -->
<section class="testimonials bg-white-2 rec-pro">
    <div class="container-fluid">
        <div class="sec-title">
            <h2><?php echo e(@$content->data->title); ?></h2>
            <p><?php echo e(@$content->data->short_description); ?></p>
        </div>

        <div class="owl-carousel job_clientSlide">
            <?php $__empty_1 = true; $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="singleJobClinet" data-aos="zoom-in" data-aos-delay="150">
                    <p>
                        <?php echo e(@$item->data->description); ?>

                    </p>
                    <div class="detailJC">
                        <span><img src="<?php echo e(getFile('testimonial', @$item->data->image)); ?>" alt="img" /></span>
                        <h5><?php echo e(@$item->data->name); ?></h5>
                        <p><?php echo e(@$item->data->organisation); ?></p>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <?php endif; ?>
        </div>

    </div>
</section>
<!-- END SECTION TESTIMONIALS -->
<?php /**PATH C:\xampp\htdocs\asset\core\resources\views/frontend/sections/testimonial.blade.php ENDPATH**/ ?>
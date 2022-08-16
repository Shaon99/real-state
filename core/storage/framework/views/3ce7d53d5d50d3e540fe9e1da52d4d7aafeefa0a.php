<?php
$content = content('partner.content');
$elements = element('partner.element');

?>
<!-- STAR SECTION PARTNERS -->
<div class="partners bg-white rec-pro">
    <div class="container-fluid">
        <div class="sec-title">
            <h2><?php echo e(@$content->data->title); ?></h2>
            <p><?php echo e(@$content->data->short_description); ?></p>
        </div>

        <div class="owl-carousel style2">
            <?php $__empty_1 = true; $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="owl-item" data-aos="fade-up">
                    <img src="<?php echo e(getFile('partner', @$item->data->image)); ?>" alt="partner">
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- END SECTION PARTNERS -->
<?php /**PATH C:\xampp\htdocs\asset\core\resources\views/frontend/sections/partner.blade.php ENDPATH**/ ?>
<?php
$content = content('popular_place.content');
$popular_location = App\Models\Location::withCount('countProperties')->where('popular_location', 1)
    ->latest()
    ->limit(9)
    ->get();


?>

<section class="popular-places bg-white">
    <div class="container-fluid">
        <div class="sec-title">
            <h2><?php echo e(@$content->data->title); ?></h2>
            <p><?php echo e(@$content->data->short_description); ?></p>
        </div>
        <div class="row">       
            <?php $__empty_1 = true; $__currentLoopData = $popular_location; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="col-sm-6 col-lg-4 col-xl-4" data-aos="zoom-in" data-aos-delay="150">
                    <!-- Image Box -->
                    <a href="<?php echo e(route('locationproperty',Str::slug($item->name))); ?>" class="img-box hover-effect">
                        <img src="<?php echo e(getFile('location', $item->image)); ?>" class="img-responsive" alt="img">
                        <div class="img-box-content visible text-uppercase">
                            <h4><?php echo e($item->name); ?></h4>
                            <span><?php echo e(@$item->count_properties_count); ?> Properties</span>
                        </div>
                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <?php endif; ?>

        </div>
    </div>
</section>
<!-- END SECTION POPULAR PLACES -->
<?php /**PATH C:\xampp\htdocs\asset\core\resources\views/frontend/sections/popular_place.blade.php ENDPATH**/ ?>
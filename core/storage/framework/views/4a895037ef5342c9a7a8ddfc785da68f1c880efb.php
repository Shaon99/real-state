<?php
$content = content('popular_properties.content');
$popular_properties = App\Models\Properties::with('location')
    ->where('is_active', 1)
    ->where('is_popular', 1)
    ->latest()
    ->limit(8)
    ->get();
?>

<!-- START SECTION RECENTLY PROPERTIES -->
<section class="featured portfolio rec-pro disc">
    <div class="container-fluid">
        <div class="sec-title discover">
            <h2><?php echo e(@$content->data->title); ?></h2>
            <p><?php echo e(@$content->data->short_description); ?></p>
        </div>
        <div class="portfolio col-xl-12">
            <div class="slick-lancers">
                <?php $__empty_1 = true; $__currentLoopData = $popular_properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="agents-grid" data-aos="fade-up" data-aos-delay="150">
                        <div class="landscapes">
                            <div class="project-single">
                                <div class="project-inner project-head">
                                    <div class="homes">
                                        <!-- homes img -->
                                        <a href="<?php echo e(route('property.details', Str::slug($item->slug))); ?>" class="homes-img">
                                            <div class="homes-tag button alt featured"><?php echo e(@$item->type->name); ?></div>
                                            <img src="<?php echo e(getFile('properties', $item->picture)); ?>" alt="img"
                                            class="img-responsive" style="height: 209px;">
                                        </a>
                                    </div>
                                    <div class="button-effect">
                                        <a href="<?php echo e(route('property.details', Str::slug($item->slug))); ?>" class="btn"><i class="fa fa-link"></i></a>
                                        <?php if($item->property_vedio): ?>
                                            <a href="<?php echo e($item->property_vedio); ?>"
                                                class="btn popup-video popup-youtube"><i class="fas fa-video"></i></a>
                                        <?php endif; ?>

                                    </div>
                                </div>
                                <!-- homes content -->
                                <div class="homes-content text-capitalize">
                                    <!-- homes address -->
                                    <h3><a href="<?php echo e(route('property.details', Str::slug($item->slug))); ?>"><?php echo e($item->name); ?></a></h3>
                                    <p class="homes-address mb-3">
                                        <a href="<?php echo e(route('property.details', Str::slug($item->slug))); ?>">
                                            <i
                                                class="fa fa-map-marker"></i><span><?php echo e($item->address . ' , ' . @$item->location->name); ?></span>
                                        </a>
                                    </p>
                                    <!-- homes List -->
                                    <ul class="homes-list clearfix pb-3">
                                        <li class="the-icons">
                                            <i class="flaticon-bed mr-2" aria-hidden="true"></i>
                                            <span><?php echo e($item->bedroom); ?> Bedrooms</span>
                                        </li>
                                        <li class="the-icons">
                                            <i class="flaticon-bathtub mr-2" aria-hidden="true"></i>
                                            <span><?php echo e($item->bathroom); ?> Bathrooms</span>
                                        </li>
                                        <li class="the-icons">
                                            <i class="flaticon-square mr-2" aria-hidden="true"></i>
                                            <span><?php echo e($item->apartment_size); ?> sq ft</span>
                                        </li>
                                        <li class="the-icons">
                                            <i class="flaticon-car mr-2" aria-hidden="true"></i>
                                            <span><?php echo e($item->garages); ?> Garages</span>
                                        </li>
                                    </ul>
                                    <div class="price-properties footer pt-3 pb-0">
                                        <a data-title="<?php echo e($item->name); ?>" href="javascript:void(0)"
                                            class="btn btn-outline-light text-uppercase text-light ask-for-price"> ask for price </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <?php endif; ?>


            </div>
        </div>
    </div>
</section>
<!-- END SECTION RECENTLY PROPERTIES -->
<?php /**PATH C:\xampp\htdocs\asset\core\resources\views/frontend/sections/popular_properties.blade.php ENDPATH**/ ?>
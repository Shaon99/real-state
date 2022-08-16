<?php
$content = content('team.content');
$elements = element('team.element');

?>
<section class="team bg-white rec-pro">
    <div class="container-fluid">
        <div class="sec-title">
            <h2><?php echo e(@$content->data->title); ?></h2>
            <p><?php echo e(@$content->data->short_description); ?></p>
        </div>
        <div class="row team-all">
            <?php $__empty_1 = true; $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="col-lg-3 col-md-6 team-pro">
                <div class="team-wrap">
                    <div class="team-img">
                        <img src="<?php echo e(getFile('team',@$item->data->image)); ?>" alt="img" />
                    </div>
                    <div class="team-content">
                        <div class="team-info">
                            <h3><?php echo e(@$item->data->member_name); ?></h3>
                            <p><?php echo e(@$item->data->designation); ?></p>
                            <div class="team-socials">
                                <ul>
                                    <li>
                                        <a href="<?php echo e(@$item->data->facebook_link); ?>" target="_blank" title="facebook"><i class="fa fa-facebook"
                                                aria-hidden="true"></i></a>
                                        <a href="<?php echo e(@$item->data->linkedin_link); ?>" target="_blank" title="linkedin"><i class="fa fa-twitter fa fa-linkedin"
                                                aria-hidden="true"></i></a>
                                        <a href="<?php echo e(@$item->data->instagram_link); ?>" target="_blank" title="instagran"><i class="fa fa-instagram"
                                                aria-hidden="true"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <?php endif; ?>
           
        </div>

    </div>
</section>
<!-- END SECTION AGENTS -->
<?php /**PATH C:\xampp\htdocs\asset\core\resources\views/frontend/sections/team.blade.php ENDPATH**/ ?>
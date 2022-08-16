

<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?php echo e(__($pageTitle)); ?></h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?php echo e(route('admin.home')); ?>"><?php echo e(__('Dashboard')); ?></a>
                    </div>
                    <div class="breadcrumb-item"><?php echo e(__($pageTitle)); ?></div>
                </div>
            </div>

            <div class="section-body ">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="card bg-gradient-danger card-img-holder p-2 text-light">
                            <div class="card-body">
                                <img src="<?php echo e(asset('asset/circle.png')); ?>" class="card-img-absolute" alt="circle-image" />
                                <h4 class="font-weight-normal"><?php echo e(__('Total Properties')); ?> <i
                                        class="fas fa-home float-right"></i>
                                </h4>
                                <h2><?php echo e($totalProperties); ?></h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="card bg-gradient-primary card-img-holder p-2 text-light">
                            <div class="card-body">
                                <img src="<?php echo e(asset('asset/circle.png')); ?>" class="card-img-absolute" alt="circle-image" />
                                <h4 class="font-weight-normal"><?php echo e(__('Total Location')); ?> <i
                                        class="fas fa-map float-right"></i>
                                </h4>
                                <h2><?php echo e($totallocation); ?></h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="card bg-gradient-success card-img-holder p-2 text-light">
                            <div class="card-body">
                                <img src="<?php echo e(asset('asset/circle.png')); ?>" class="card-img-absolute" alt="circle-image" />
                                <h4 class="font-weight-normal"><?php echo e(__('Total Collection')); ?> <i
                                        class="fas fa-spinner fa-spin float-right"></i>
                                </h4>
                                <h2><?php echo e($collection); ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('backend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\asset\core\resources\views/backend/dashboard.blade.php ENDPATH**/ ?>
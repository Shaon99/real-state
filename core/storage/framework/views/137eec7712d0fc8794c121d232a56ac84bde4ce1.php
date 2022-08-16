

<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?php echo e(__($pageTitle)); ?></h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><?php echo e(__($pageTitle)); ?></div>
                    <div class="breadcrumb-item active"><a href="<?php echo e(route('admin.home')); ?>"><?php echo e(__('Dashboard')); ?></a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <?php if(request()->has('trashed')): ?>
                                <a href="<?php echo e(route('admin.properties.index')); ?>" class="btn btn-primary" data-toggle="tooltip"
                                    title="properties">
                                    Properties
                                </a>
                            <?php else: ?>
                            <a href="<?php echo e(route('admin.properties.create')); ?>" class="btn btn-icon icon-left btn-primary"><i
                                class="fas fa-plus-circle"></i><?php echo e(__('Create property')); ?></a>
                            <?php endif; ?>
                            <a href="<?php echo e(route('admin.properties.index', ['trashed' => 'DeletedRecords'])); ?>"
                                class="btn btn-danger" data-toggle="tooltip" title="recycle bin">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                        </div>
                     
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>                                            
                                            <th><?php echo e(__('Property Name')); ?></th>
                                            <th><?php echo e(__('Location')); ?></th>
                                            <th><?php echo e(__('Property Type')); ?></th>
                                            <th><?php echo e(__('apartment size')); ?></th>
                                            <th><?php echo e(__('Image')); ?></th>
                                            <th><?php echo e(__('Is-Featured')); ?></th>
                                            <th><?php echo e(__('Is-Popular')); ?></th>
                                            <th><?php echo e(__('Is-Activated')); ?></th>
                                            <th><?php echo e(__('Action')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__empty_1 = true; $__currentLoopData = $allproperties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        
                                            <tr>
                                                <td><?php echo e($item->name); ?></td>
                                                <td><?php echo e(@$item->location->name); ?></td>
                                                <td><?php echo e(@$item->propertyType->name); ?></td>
                                                <td><?php echo e($item->apartment_size); ?></td>
                                                <td>
                                                    <?php if($item->picture): ?>
                                                        <img class="rounded mr-1" height="100px" width="100px"
                                                            src="<?php echo e(getFile('properties', $item->picture)); ?>">
                                                    <?php else: ?>
                                                        <img class="rounded mr-1" height="100px" width="100px"
                                                            src="<?php echo e(getFile('default', @$general->default_image)); ?>">
                                                    <?php endif; ?>
                                                </td>

                                                <td>
                                                    <select class="form-control selectric" data-id="<?php echo e($item->id); ?>"
                                                        id="selectFeatured">
                                                        <option value="0"
                                                            <?php echo e($item->is_featured == 0 ? 'selected' : ''); ?>>
                                                            <?php echo e(__('NO')); ?></option>
                                                        <option value="1"
                                                            <?php echo e($item->is_featured == 1 ? 'selected' : ''); ?>>
                                                            <?php echo e(__('YES')); ?>

                                                        </option>

                                                    </select>
                                                </td>

                                                <td>
                                                    <select class="form-control selectric" data-id="<?php echo e($item->id); ?>"
                                                        id="selectPopular">
                                                        <option value="0" <?php echo e($item->is_popular == 0 ? 'selected' : ''); ?>>
                                                            <?php echo e(__('NO')); ?></option>
                                                        <option value="1" <?php echo e($item->is_popular == 1 ? 'selected' : ''); ?>>
                                                            <?php echo e(__('YES')); ?>

                                                        </option>

                                                    </select>
                                                </td>

                                                <td>
                                                    <select class="form-control selectric" data-id="<?php echo e($item->id); ?>"
                                                        id="selectStatus">
                                                        <option value="0" <?php echo e($item->is_active == 0 ? 'selected' : ''); ?>>
                                                            <?php echo e(__('Deactive')); ?></option>
                                                        <option value="1" <?php echo e($item->is_active == 1 ? 'selected' : ''); ?>>
                                                            <?php echo e(__('Active')); ?>

                                                        </option>

                                                    </select>
                                                </td>


                                                <td>
                                                    <?php if(request()->has('trashed')): ?>
                                                        <a class="btn btn-success btn-action mr-1"
                                                            href="<?php echo e(route('admin.property.restore', $item->id)); ?>"
                                                            data-toggle="tooltip" title="restore">
                                                            <i class="fas fa-trash-restore"></i>
                                                        </a>
                                                        <button class="btn btn-danger deleteforever"
                                                            data-href="<?php echo e(route('admin.property.deleteforever', $item->id)); ?>"
                                                            data-toggle="tooltip" title="Deleteforever" type="button">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    <?php else: ?>                                              
                                                    <a href="<?php echo e(route('admin.properties.edit', $item->id)); ?>"
                                                        class="btn btn-primary btn-action mr-1"><i
                                                            class="fa fa-edit"></i></a>
                                                    <button class="btn btn-danger delete"
                                                        data-href="<?php echo e(route('admin.properties.destroy', $item->id)); ?>"
                                                        data-toggle="tooltip" title="Delete" type="button">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <?php endif; ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    <script>
        'use strict'
        $(document).ready(function() {
            $(document).on('change', '#selectStatus', function() {
                let status = $(this).val();
                let id = $(this).attr('data-id');
                var url = "<?php echo e(route('admin.properties.status', ':id')); ?>";
                url = url.replace(':id', id);

                $.ajax({
                    type: 'GET',
                    url: url,
                    data: {
                        status: status
                    },
                    success: (data) => {
                        iziToast.success({
                            title: 'Status',
                            message: 'Successfully Change',
                            position: 'topRight',
                            theme: 'dark',
                            icon: 'fas fa-solid fa-check',
                            progressBarColor: 'rgb(0, 255, 184)',
                            color: '#17d990',
                            messageColor: '#ffffff',
                        });

                    },
                    error: (error) => {

                    }
                })
            });   
       
            $(document).on('change', '#selectFeatured', function() {
                let feature = $(this).val();
                let id = $(this).attr('data-id');
                var url = "<?php echo e(route('admin.properties.featured', ':id')); ?>";
                url = url.replace(':id', id);

                $.ajax({
                    type: 'GET',
                    url: url,
                    data: {
                        featured: feature
                    },
                    success: (data) => {
                        iziToast.success({
                            title: 'Featured',
                            message: 'Successfully Change',
                            position: 'topRight',
                            theme: 'dark',
                            icon: 'fas fa-solid fa-check',
                            progressBarColor: 'rgb(0, 255, 184)',
                            color: '#17d990',
                            messageColor: '#ffffff',
                        });

                    },
                    error: (error) => {

                    }
                })
            });


            $(document).on('change', '#selectPopular', function() {
                let popular = $(this).val();
                let id = $(this).attr('data-id');
                var url = "<?php echo e(route('admin.properties.popular', ':id')); ?>";
                url = url.replace(':id', id);

                $.ajax({
                    type: 'GET',
                    url: url,
                    data: {
                        popular:popular
                    },
                    success: (data) => {
                        iziToast.success({
                            title: 'Popular',
                            message: 'Successfully Change',
                            position: 'topRight',
                            theme: 'dark',
                            icon: 'fas fa-solid fa-check',
                            progressBarColor: 'rgb(0, 255, 184)',
                            color: '#17d990',
                            messageColor: '#ffffff',
                        });

                    },
                    error: (error) => {

                    }
                })
            });



        });

    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('backend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\asset\core\resources\views/backend/property/index.blade.php ENDPATH**/ ?>
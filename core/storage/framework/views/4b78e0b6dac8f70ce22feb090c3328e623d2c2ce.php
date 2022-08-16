
<?php $__env->startPush('style'); ?>
    <style>
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #676767 !important;
            line-height: 40px !important;
            text-transform: capitalize !important;
        }

        label {
            text-transform: capitalize;
        }


        .upload__inputfile {
            width: .1px;
            height: .1px;
            opacity: 0;
            overflow: hidden;
            position: absolute;
            z-index: -1;
        }

        .upload__btn {
            display: inline-block;
            color: #fff;
            text-align: center;
            min-width: 25%;
            padding: 16px;
            transition: all .3s ease;
            cursor: pointer;
            background-color: #6777ef;
            font-size: 12px;
            text-transform: uppercase
        }

        .upload__btn:hover {
            background-color: rgb(22, 21, 21);
            color: #ffffff;
            transition: all .3s ease;
        }

        .upload__btn-box {
            margin-bottom: 10px;
        }


        .upload__img-wrap {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -10px;
        }

        .upload__img-box {
            width: 200px;
            padding: 0 10px;
            margin-bottom: 12px;
        }

        .upload__img-close {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background-color: rgba(0, 0, 0, 0.5);
            position: absolute;
            top: 10px;
            right: 10px;
            text-align: center;
            line-height: 24px;
            z-index: 1;
            cursor: pointer;
        }


        .upload__img-close:hover {
            background-color: rgb(224, 47, 83);
        }

        .upload__img-close::after {
            content: '\2716';
            font-size: 14px;
            color: white;
        }



        .img-bg {
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            position: relative;
            padding-bottom: 100%;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?php echo e(__(@$pageTitle)); ?></h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?php echo e(route('admin.home')); ?>"><?php echo e(__('Dashboard')); ?></a>
                    </div>
                    <div class="breadcrumb-item"><?php echo e(__(@$pageTitle)); ?></div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-end">
                                <div>
                                    <a href="<?php echo e(route('admin.properties.index')); ?>"
                                        class="btn btn-primary"><?php echo e(__('Properties List')); ?></a>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo e(route('admin.properties.update', $property->id)); ?>" method="POST"
                                    class="needs-validation" novalidate="" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field("PUT"); ?>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="form-group col-md-4 col-4">
                                                <label><?php echo e(__('Property Name')); ?></label>
                                                <input type="text" class="form-control" name="name"
                                                    value="<?php echo e(old('name', $property->name)); ?>"
                                                    placeholder="enter property name" required="">
                                                <div class="invalid-feedback">
                                                    <?php echo e(__('property name can not be empty')); ?>

                                                </div>
                                            </div>

                                            <div class="form-group col-md-4 col-4">
                                                <label><?php echo e(__('Slug')); ?></label>
                                                <input type="text" class="form-control" name="slug"
                                                    value="<?php echo e(old('slug', $property->slug)); ?>" placeholder="enter slug"
                                                    required="">
                                                <div class="invalid-feedback">
                                                    <?php echo e(__('slug can not be empty')); ?>

                                                </div>
                                            </div>

                                            <div class="form-group col-md-4 col-4">
                                                <label><?php echo e(__('Property Address')); ?></label>
                                                <input type="text" class="form-control" name="address"
                                                    value="<?php echo e(old('address', $property->address)); ?>"
                                                    placeholder="enter property address" required="">
                                                <div class="invalid-feedback">
                                                    <?php echo e(__('property address can not be empty')); ?>

                                                </div>
                                            </div>

                                            <div class="form-group col-md-4 col-4">
                                                <label><?php echo e(__('Location')); ?></label>
                                                <select class="form-control select2" name="location" required="">
                                                    <option value="" selected disabled><?php echo e(__('select location')); ?>

                                                    </option>
                                                    <?php $__empty_1 = true; $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                        <option value="<?php echo e($item->id); ?>"
                                                            <?php echo e($property->location_id == $item->id ? 'selected' : ''); ?>>
                                                            <?php echo e($item->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                        <option disabled><?php echo e(__('location not found')); ?>

                                                        </option>
                                                    <?php endif; ?>
                                                </select>
                                                <div class="invalid-feedback">
                                                    <?php echo e(__('location can not be empty')); ?>

                                                </div>
                                            </div>


                                            <div class="form-group col-md-4 col-4">
                                                <label><?php echo e(__('Property Type')); ?></label>
                                                <select class="form-control select2" name="property_type" required="">
                                                    <option value="" selected disabled>
                                                        <?php echo e(__('select property type')); ?></option>
                                                    <?php $__empty_1 = true; $__currentLoopData = $property_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                        <option value="<?php echo e($item->id); ?>"
                                                            <?php echo e($property->property_type_id == $item->id ? 'selected' : ''); ?>>
                                                            <?php echo e($item->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                        <option disabled><?php echo e(__('property type not found')); ?>

                                                        </option>
                                                    <?php endif; ?>
                                                </select>
                                                <div class="invalid-feedback">
                                                    <?php echo e(__('property type can not be empty')); ?>

                                                </div>
                                            </div>

                                            <div class="form-group col-md-4 col-4">
                                                <label><?php echo e(__('Property Status')); ?></label>
                                                <select class="form-control select2" name="status" required="">
                                                    <option value="" selected disabled>
                                                        <?php echo e(__('select property type')); ?></option>
                                                    <option value="0" <?php echo e($property->status == 0 ? 'selected' : ''); ?>>
                                                        <?php echo e(__('on-going')); ?></option>
                                                    <option value="1" <?php echo e($property->status == 1 ? 'selected' : ''); ?>>
                                                        <?php echo e(__('complete')); ?></option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    <?php echo e(__('statsus can not be empty')); ?>

                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for=""><?php echo e(__('Completion-date')); ?></label>
                                                <input type="text" class="form-control" name="completion_date"
                                                    value="<?php echo e(old('completion-date', $property->completion_date)); ?>"
                                                    placeholder="enter completion-date">
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for=""><?php echo e(__('Launch-date')); ?></label>
                                                <input type="text" class="form-control" name="launch_date"
                                                    value="<?php echo e(old('launch-date', $property->launch_date)); ?>"
                                                    placeholder="enter launch-date">
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for=""><?php echo e(__('Land-area')); ?></label>
                                                <input type="text" class="form-control" name="land_area"
                                                    value="<?php echo e(old('land-area', $property->land_area)); ?>"
                                                    placeholder="enter land-area" required="">
                                                <div class="invalid-feedback">
                                                    <?php echo e(__('land-area can not be empty')); ?>

                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for=""><?php echo e(__('Apartment-size')); ?></label>
                                                <input type="text" class="form-control" name="apartment_size"
                                                    value="<?php echo e(old('apartment_size', $property->apartment_size)); ?>"
                                                    placeholder="enter apartment-size" required="">
                                                <div class="invalid-feedback">
                                                    <?php echo e(__('apartment-size can not be empty')); ?>

                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for=""><?php echo e(__('Number-of-floor')); ?></label>
                                                <input type="text" class="form-control" name="no_of_floor"
                                                    value="<?php echo e(old('no_0f_floor', $property->no_of_floors)); ?>"
                                                    placeholder="enter Number-of-floor">
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for=""><?php echo e(__('Apartment-floor')); ?></label>
                                                <input type="text" class="form-control" name="apartment_floor"
                                                    value="<?php echo e(old('apartment_floor', $property->apartment_floor)); ?>"
                                                    placeholder="enter apartment_floor">
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for=""><?php echo e(__('Room')); ?></label>
                                                <input type="text" class="form-control" name="room"
                                                    value="<?php echo e(old('room', $property->room)); ?>" placeholder="enter room"
                                                    required="">
                                                <div class="invalid-feedback">
                                                    <?php echo e(__('room can not be empty')); ?>

                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for=""><?php echo e(__('Bedroom')); ?></label>
                                                <input type="text" class="form-control" name="bedroom"
                                                    value="<?php echo e(old('bedroom', $property->bedroom)); ?>"
                                                    placeholder="enter bedroom" required="">
                                                <div class="invalid-feedback">
                                                    <?php echo e(__('bedroom can not be empty')); ?>

                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for=""><?php echo e(__('Bathroom')); ?></label>
                                                <input type="text" class="form-control" name="bathroom"
                                                    value="<?php echo e(old('bathroom', $property->bathroom)); ?>"
                                                    placeholder="enter bathroom" required="">
                                                <div class="invalid-feedback">
                                                    <?php echo e(__('bathroom can not be empty')); ?>

                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for=""><?php echo e(__('Garages')); ?></label>
                                                <input type="text" class="form-control" name="garages"
                                                    value="<?php echo e(old('garages', $property->garages)); ?>"
                                                    placeholder="enter bathroom">
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for=""><?php echo e(__('youtube-video-Link')); ?></label>
                                                <input type="text" class="form-control" name="video_link"
                                                    value="<?php echo e(old('video_link', $property->property_vedio)); ?>"
                                                    placeholder="enter youtube-video_link">
                                            </div>


                                            <div class="form-group col-md-4">
                                                <label for=""><?php echo e(__('Property-map-Link')); ?></label>
                                                <input type="text" class="form-control" name="map_link"
                                                    value="<?php echo e(old('map_link', $property->property_map_link)); ?>"
                                                    placeholder="enter Property-map-link">
                                            </div>


                                            <div class="form-group col-md-6">
                                                <label class="label" for="image"><?php echo e(__('Property-image')); ?> (1920 ×
                                                    1080
                                                    px)</label>
                                                <div class="form-group">
                                                    <div id="image-preview" class="image-preview"
                                                        style="background-image:url(<?php echo e(getFile('properties', @$property->picture)); ?>);">

                                                        <label for="image-upload"
                                                            id="image-label"><?php echo e(__('Choose File')); ?></label>
                                                        <input type="file" name="image" id="image-upload"
                                                            class="form-control"  />
                                                        <div class="invalid-feedback">
                                                            <?php echo e(__('image can not be empty')); ?>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="form-group col-md-6">
                                                <label class="label" for="image"><?php echo e(__('Floor-plan-Image')); ?> (770 ×
                                                    483
                                                    px)</label>
                                                <div class="form-group">
                                                    <div id="image-preview1"
                                                        class="image-preview"style="background-image:url(<?php echo e(getFile('properties', @$property->floor_plan_image)); ?>);">
                                                        <label for="image-upload1"
                                                            id="image-label1"><?php echo e(__('Choose File')); ?></label>
                                                        <input type="file" name="floor_image" id="image-upload1"
                                                            class="form-control" />
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="form-group col-md-12 col-12">
                                                <label><?php echo e(__('gallery Images')); ?> (750 x 500 px) (use 5 image for perfect
                                                    fit)</label>
                                                <div class="upload__box">
                                                    <div class="upload__btn-box">
                                                        <label class="upload__btn">
                                                            <lable>Choose Files</lable>
                                                            <input type="file" multiple="" name="gallery[]"
                                                                data-max_length="20" class="upload__inputfile">
                                                        </label>
                                                    </div>
                                                    <div class="upload__img-wrap">
                                                        <?php $__empty_1 = true; $__currentLoopData = @$property->gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                            <img width="25%" class="img-fluid mr-2 mt-2"
                                                                src="<?php echo e(getFile('properties-gallery', @$item->image)); ?>"
                                                                alt="img">
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <label for=""><?php echo e(__('Details')); ?></label>
                                                <textarea name="details" id="" cols="30" rows="5" class="form-control summernote"
                                                    required=""><?php echo e(old('details', $property->details)); ?></textarea>
                                                <div class="invalid-feedback">
                                                    <?php echo e(__('details can not be empty')); ?>

                                                </div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <button type="submit"
                                                    class="btn btn-primary"><?php echo e(__('Update Property')); ?>

                                                </button>
                                            </div>

                                        </div>
                                    </div>

                                </form>
                            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(asset('asset/admin/js/multipleimg.js')); ?>"></script>
    <script>
        'use strict'

        $('.summernote').summernote();

        $(function() {
            $.uploadPreview({
                input_field: "#image-upload",
                preview_box: "#image-preview",
                label_field: "#image-label",
                label_default: "<?php echo e(__('Choose File')); ?>",
                label_selected: "<?php echo e(__('Update Image')); ?>",
                no_label: false,
                success_callback: null
            });

            $.uploadPreview({
                input_field: "#image-upload1",
                preview_box: "#image-preview1",
                label_field: "#image-label1",
                label_default: "<?php echo e(__('Choose File')); ?>",
                label_selected: "<?php echo e(__('Update Image')); ?>",
                no_label: false,
                success_callback: null
            });
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\asset\core\resources\views/backend/property/edit.blade.php ENDPATH**/ ?>
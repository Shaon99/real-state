@extends('backend.layout.master')
@push('style')
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
@endpush
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __(@$pageTitle) }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.home') }}">{{ __('Dashboard') }}</a>
                    </div>
                    <div class="breadcrumb-item">{{ __(@$pageTitle) }}</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-end">
                                <div>
                                    <a href="{{ route('admin.properties.index') }}"
                                        class="btn btn-primary">{{ __('Properties List') }}</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.properties.update', $property->id) }}" method="POST"
                                    class="needs-validation" novalidate="" enctype="multipart/form-data">
                                    @csrf
                                    @method("PUT")
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="form-group col-md-4 col-4">
                                                <label>{{ __('Property Name') }}</label>
                                                <input type="text" class="form-control" name="name"
                                                    value="{{ old('name', $property->name) }}"
                                                    placeholder="enter property name" required="">
                                                <div class="invalid-feedback">
                                                    {{ __('property name can not be empty') }}
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4 col-4">
                                                <label>{{ __('Slug') }}</label>
                                                <input type="text" class="form-control" name="slug"
                                                    value="{{ old('slug', $property->slug) }}" placeholder="enter slug"
                                                    required="">
                                                <div class="invalid-feedback">
                                                    {{ __('slug can not be empty') }}
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4 col-4">
                                                <label>{{ __('Property Address') }}</label>
                                                <input type="text" class="form-control" name="address"
                                                    value="{{ old('address', $property->address) }}"
                                                    placeholder="enter property address" required="">
                                                <div class="invalid-feedback">
                                                    {{ __('property address can not be empty') }}
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4 col-4">
                                                <label>{{ __('Location') }}</label>
                                                <select class="form-control select2" name="location" required="">
                                                    <option value="" selected disabled>{{ __('select location') }}
                                                    </option>
                                                    @forelse ($locations as $item)
                                                        <option value="{{ $item->id }}"
                                                            {{ $property->location_id == $item->id ? 'selected' : '' }}>
                                                            {{ $item->name }}</option>
                                                    @empty
                                                        <option disabled>{{ __('location not found') }}
                                                        </option>
                                                    @endforelse
                                                </select>
                                                <div class="invalid-feedback">
                                                    {{ __('location can not be empty') }}
                                                </div>
                                            </div>


                                            <div class="form-group col-md-4 col-4">
                                                <label>{{ __('Property Type') }}</label>
                                                <select class="form-control select2" name="property_type" required="">
                                                    <option value="" selected disabled>
                                                        {{ __('select property type') }}</option>
                                                    @forelse ($property_types as $item)
                                                        <option value="{{ $item->id }}"
                                                            {{ $property->property_type_id == $item->id ? 'selected' : '' }}>
                                                            {{ $item->name }}</option>
                                                    @empty
                                                        <option disabled>{{ __('property type not found') }}
                                                        </option>
                                                    @endforelse
                                                </select>
                                                <div class="invalid-feedback">
                                                    {{ __('property type can not be empty') }}
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4 col-4">
                                                <label>{{ __('Property Status') }}</label>
                                                <select class="form-control select2" name="status" required="">
                                                    <option value="" selected disabled>
                                                        {{ __('select property type') }}</option>
                                                    <option value="0" {{ $property->status == 0 ? 'selected' : '' }}>
                                                        {{ __('on-going') }}</option>
                                                    <option value="1" {{ $property->status == 1 ? 'selected' : '' }}>
                                                        {{ __('complete') }}</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    {{ __('statsus can not be empty') }}
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="">{{ __('Completion-date') }}</label>
                                                <input type="text" class="form-control" name="completion_date"
                                                    value="{{ old('completion-date', $property->completion_date) }}"
                                                    placeholder="enter completion-date">
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="">{{ __('Launch-date') }}</label>
                                                <input type="text" class="form-control" name="launch_date"
                                                    value="{{ old('launch-date', $property->launch_date) }}"
                                                    placeholder="enter launch-date">
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="">{{ __('Land-area') }}</label>
                                                <input type="text" class="form-control" name="land_area"
                                                    value="{{ old('land-area', $property->land_area) }}"
                                                    placeholder="enter land-area" required="">
                                                <div class="invalid-feedback">
                                                    {{ __('land-area can not be empty') }}
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="">{{ __('Apartment-size') }}</label>
                                                <input type="text" class="form-control" name="apartment_size"
                                                    value="{{ old('apartment_size', $property->apartment_size) }}"
                                                    placeholder="enter apartment-size" required="">
                                                <div class="invalid-feedback">
                                                    {{ __('apartment-size can not be empty') }}
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="">{{ __('Number-of-floor') }}</label>
                                                <input type="text" class="form-control" name="no_of_floor"
                                                    value="{{ old('no_0f_floor', $property->no_of_floors) }}"
                                                    placeholder="enter Number-of-floor">
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="">{{ __('Apartment-floor') }}</label>
                                                <input type="text" class="form-control" name="apartment_floor"
                                                    value="{{ old('apartment_floor', $property->apartment_floor) }}"
                                                    placeholder="enter apartment_floor">
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="">{{ __('Room') }}</label>
                                                <input type="text" class="form-control" name="room"
                                                    value="{{ old('room', $property->room) }}" placeholder="enter room"
                                                    required="">
                                                <div class="invalid-feedback">
                                                    {{ __('room can not be empty') }}
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="">{{ __('Bedroom') }}</label>
                                                <input type="text" class="form-control" name="bedroom"
                                                    value="{{ old('bedroom', $property->bedroom) }}"
                                                    placeholder="enter bedroom" required="">
                                                <div class="invalid-feedback">
                                                    {{ __('bedroom can not be empty') }}
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">{{ __('Bathroom') }}</label>
                                                <input type="text" class="form-control" name="bathroom"
                                                    value="{{ old('bathroom', $property->bathroom) }}"
                                                    placeholder="enter bathroom" required="">
                                                <div class="invalid-feedback">
                                                    {{ __('bathroom can not be empty') }}
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="">{{ __('Garages') }}</label>
                                                <input type="text" class="form-control" name="garages"
                                                    value="{{ old('garages', $property->garages) }}"
                                                    placeholder="enter bathroom">
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="">{{ __('youtube-video-Link') }}</label>
                                                <input type="text" class="form-control" name="video_link"
                                                    value="{{ old('video_link', $property->property_vedio) }}"
                                                    placeholder="enter youtube-video_link">
                                            </div>


                                            <div class="form-group col-md-4">
                                                <label for="">{{ __('Property-map-Link') }}</label>
                                                <input type="text" class="form-control" name="map_link"
                                                    value="{{ old('map_link', $property->property_map_link) }}"
                                                    placeholder="enter Property-map-link">
                                            </div>


                                            <div class="form-group col-md-6">
                                                <label class="label" for="image">{{ __('Property-image') }} (1920 ×
                                                    1080
                                                    px)</label>
                                                <div class="form-group">
                                                    <div id="image-preview" class="image-preview"
                                                        style="background-image:url({{ getFile('properties', @$property->picture) }});">

                                                        <label for="image-upload"
                                                            id="image-label">{{ __('Choose File') }}</label>
                                                        <input type="file" name="image" id="image-upload"
                                                            class="form-control"  />
                                                        <div class="invalid-feedback">
                                                            {{ __('image can not be empty') }}
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="form-group col-md-6">
                                                <label class="label" for="image">{{ __('Floor-plan-Image') }} (770 ×
                                                    483
                                                    px)</label>
                                                <div class="form-group">
                                                    <div id="image-preview1"
                                                        class="image-preview"style="background-image:url({{ getFile('properties', @$property->floor_plan_image) }});">
                                                        <label for="image-upload1"
                                                            id="image-label1">{{ __('Choose File') }}</label>
                                                        <input type="file" name="floor_image" id="image-upload1"
                                                            class="form-control" />
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="form-group col-md-12 col-12">
                                                <label>{{ __('gallery Images') }} (750 x 500 px) (use 5 image for perfect
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
                                                        @forelse (@$property->gallery as $item)
                                                            <img width="25%" class="img-fluid mr-2 mt-2"
                                                                src="{{ getFile('properties-gallery', @$item->image) }}"
                                                                alt="img">
                                                        @empty
                                                        @endforelse
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <label for="">{{ __('Details') }}</label>
                                                <textarea name="details" id="" cols="30" rows="5" class="form-control summernote"
                                                    required="">{{ old('details', $property->details) }}</textarea>
                                                <div class="invalid-feedback">
                                                    {{ __('details can not be empty') }}
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <button type="submit"
                                                    class="btn btn-primary">{{ __('Update Property') }}
                                                </button>
                                            </div>

                                        </div>
                                    </div>

                                </form>
                            </div>
        </section>
    </div>
@endsection

@push('script')
    <script src="{{ asset('asset/admin/js/multipleimg.js') }}"></script>
    <script>
        'use strict'

        $('.summernote').summernote();

        $(function() {
            $.uploadPreview({
                input_field: "#image-upload",
                preview_box: "#image-preview",
                label_field: "#image-label",
                label_default: "{{ __('Choose File') }}",
                label_selected: "{{ __('Update Image') }}",
                no_label: false,
                success_callback: null
            });

            $.uploadPreview({
                input_field: "#image-upload1",
                preview_box: "#image-preview1",
                label_field: "#image-label1",
                label_default: "{{ __('Choose File') }}",
                label_selected: "{{ __('Update Image') }}",
                no_label: false,
                success_callback: null
            });
        })
    </script>
@endpush

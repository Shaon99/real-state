@extends('backend.layout.master')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __($pageTitle) }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item">{{ __($pageTitle) }}</div>
                    <div class="breadcrumb-item active"><a href="{{ route('admin.home') }}">{{ __('Dashboard') }}</a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            @if (request()->has('trashed'))
                                <a href="{{ route('admin.properties.index') }}" class="btn btn-primary" data-toggle="tooltip"
                                    title="properties">
                                    Properties
                                </a>
                            @else
                            <a href="{{ route('admin.properties.create') }}" class="btn btn-icon icon-left btn-primary"><i
                                class="fas fa-plus-circle"></i>{{ __('Create property') }}</a>
                            @endif
                            <a href="{{ route('admin.properties.index', ['trashed' => 'DeletedRecords']) }}"
                                class="btn btn-danger" data-toggle="tooltip" title="recycle bin">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                        </div>
                     
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>                                            
                                            <th>{{ __('Property Name') }}</th>
                                            <th>{{ __('Location') }}</th>
                                            <th>{{ __('Property Type') }}</th>
                                            <th>{{ __('apartment size') }}</th>
                                            <th>{{ __('Image') }}</th>
                                            <th>{{ __('Is-Featured') }}</th>
                                            <th>{{ __('Is-Popular') }}</th>
                                            <th>{{ __('Is-Activated') }}</th>
                                            <th>{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($allproperties as $item)
                                        
                                            <tr>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ @$item->location->name }}</td>
                                                <td>{{ @$item->propertyType->name }}</td>
                                                <td>{{ $item->apartment_size }}</td>
                                                <td>
                                                    @if ($item->picture)
                                                        <img class="rounded mr-1" height="100px" width="100px"
                                                            src="{{ getFile('properties', $item->picture) }}">
                                                    @else
                                                        <img class="rounded mr-1" height="100px" width="100px"
                                                            src="{{ getFile('default', @$general->default_image) }}">
                                                    @endif
                                                </td>

                                                <td>
                                                    <select class="form-control selectric" data-id="{{ $item->id }}"
                                                        id="selectFeatured">
                                                        <option value="0"
                                                            {{ $item->is_featured == 0 ? 'selected' : '' }}>
                                                            {{ __('NO') }}</option>
                                                        <option value="1"
                                                            {{ $item->is_featured == 1 ? 'selected' : '' }}>
                                                            {{ __('YES') }}
                                                        </option>

                                                    </select>
                                                </td>

                                                <td>
                                                    <select class="form-control selectric" data-id="{{ $item->id }}"
                                                        id="selectPopular">
                                                        <option value="0" {{ $item->is_popular == 0 ? 'selected' : '' }}>
                                                            {{ __('NO') }}</option>
                                                        <option value="1" {{ $item->is_popular == 1 ? 'selected' : '' }}>
                                                            {{ __('YES') }}
                                                        </option>

                                                    </select>
                                                </td>

                                                <td>
                                                    <select class="form-control selectric" data-id="{{ $item->id }}"
                                                        id="selectStatus">
                                                        <option value="0" {{ $item->is_active == 0 ? 'selected' : '' }}>
                                                            {{ __('Deactive') }}</option>
                                                        <option value="1" {{ $item->is_active == 1 ? 'selected' : '' }}>
                                                            {{ __('Active') }}
                                                        </option>

                                                    </select>
                                                </td>


                                                <td>
                                                    @if (request()->has('trashed'))
                                                        <a class="btn btn-success btn-action mr-1"
                                                            href="{{ route('admin.property.restore', $item->id) }}"
                                                            data-toggle="tooltip" title="restore">
                                                            <i class="fas fa-trash-restore"></i>
                                                        </a>
                                                        <button class="btn btn-danger deleteforever"
                                                            data-href="{{ route('admin.property.deleteforever', $item->id) }}"
                                                            data-toggle="tooltip" title="Deleteforever" type="button">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    @else                                              
                                                    <a href="{{ route('admin.properties.edit', $item->id) }}"
                                                        class="btn btn-primary btn-action mr-1"><i
                                                            class="fa fa-edit"></i></a>
                                                    <button class="btn btn-danger delete"
                                                        data-href="{{ route('admin.properties.destroy', $item->id) }}"
                                                        data-toggle="tooltip" title="Delete" type="button">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@push('script')
    <script>
        'use strict'
        $(document).ready(function() {
            $(document).on('change', '#selectStatus', function() {
                let status = $(this).val();
                let id = $(this).attr('data-id');
                var url = "{{ route('admin.properties.status', ':id') }}";
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
                var url = "{{ route('admin.properties.featured', ':id') }}";
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
                var url = "{{ route('admin.properties.popular', ':id') }}";
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
@endpush
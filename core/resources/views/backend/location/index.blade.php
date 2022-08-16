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
                                <a href="{{ route('admin.locations.index') }}" class="btn btn-primary" data-toggle="tooltip"
                                    title="Locations List">
                                    Location List
                                </a>
                            @else
                                <button data-href="{{ route('admin.locations.store') }}"
                                    class="btn btn-primary create">{{ __('Create Location') }}</button>
                            @endif
                            <a href="{{ route('admin.locations.index', ['trashed' => 'DeletedRecords']) }}"
                                class="btn btn-danger" data-toggle="tooltip" title="recycle bin">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped text-capitalize" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>{{ __('SL') }}</th>
                                            <th>{{ __('Location Name') }}</th>
                                            <th>{{ __('Image') }}</th>
                                            <th>{{ __('Popular Place') }}</th>
                                            <th>{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($locations as $item)
                                            <tr>
                                                <td>{{ @$loop->iteration }}</td>
                                                <td>{{ @$item->name }}</td>
                                                <td>
                                                    @if ($item->image)
                                                        <img class="rounded mr-1" height="100px" width="100px"
                                                            src="{{ getFile('location', $item->image) }}">
                                                    @else
                                                        <img class="rounded mr-1" height="100px" width="100px"
                                                            src="{{ getFile('default', @$general->default_image) }}">
                                                    @endif
                                                </td>
                                                <td>
                                                    <select class="form-control selectric" data-id="{{ $item->id }}"
                                                        id="selectStatus">
                                                        <option value="0"
                                                            {{ $item->popular_location == 0 ? 'selected' : '' }}>
                                                            {{ __('No') }}</option>
                                                        <option value="1"
                                                            {{ $item->popular_location == 1 ? 'selected' : '' }}>
                                                            {{ __('Yes') }}
                                                        </option>

                                                    </select>
                                                </td>
                                                <td>
                                                    @if (request()->has('trashed'))
                                                        <a class="btn btn-success btn-action mr-1"
                                                            href="{{ route('admin.location.restore', $item->id) }}"
                                                            data-toggle="tooltip" title="restore">
                                                            <i class="fas fa-trash-restore"></i>
                                                        </a>
                                                        <button class="btn btn-danger deleteforever"
                                                            data-href="{{ route('admin.location.deleteforever', $item->id) }}"
                                                            data-toggle="tooltip" title="Deleteforever" type="button">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    @else
                                                        <button class="btn btn-primary btn-action edit mr-1"
                                                            data-href="{{ route('admin.locations.update', $item->id) }}"
                                                            data-item="{{ $item }}" data-toggle="tooltip"
                                                            title="Edit">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </button>
                                                        <button class="btn btn-danger delete"
                                                            data-href="{{ route('admin.locations.destroy', $item->id) }}"
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


    <div class="modal fade" tabindex="-1" id="create" role="dialog">
        <div class="modal-dialog" role="document">
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('Create') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label for="">{{ __('Enter Name') }}</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Name">
                        <div class="form-group mt-4">
                            <label class="label" for="image">{{ __('Image') }} (h-750 x w-500 perfect fit)</label>
                            <div class="form-group">
                                <div id="image-preview" class="image-preview">
                                    <label for="image-upload" id="image-label">{{ __('Choose File') }}</label>
                                    <input type="file" name="image" id="image-upload" class="form-control" />
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ __('Close') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="modal fade" tabindex="-1" id="edit" role="dialog">
        <div class="modal-dialog" role="document">
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('Edit') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label for="">{{ __('Enter Name') }}</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Name">

                        <div class="form-group mt-4">
                            <label class="label" for="image">{{ __('Image') }} (h-750 x w-500 perfect fit)</label>
                            <div class="form-group">
                                <div id="image-preview1" class="image-preview">
                                    <label for="image-upload1" id="image-label1">{{ __('Choose File') }}</label>
                                    <input type="file" name="image" id="image-upload1" class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ __('Close') }}</button>

                        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $('.create').on('click', function() {
            const modal = $('#create');
            modal.find('form').attr('action', $(this).data('href'));
            modal.modal('show');
        })

        $('.edit').on('click', function() {
            const modal = $('#edit');
            const item = $(this).data('item');
            modal.find('form').attr('action', $(this).data('href'));
            modal.find('input[name=name]').val(item.name);
            var imageUrl = "../asset/images/location/" + item.image;
            modal.find('#image-preview1').css("background-image", "url(" + imageUrl + ")");
            modal.modal('show');
        })

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



        $(document).ready(function() {
            $(document).on('change', '#selectStatus', function() {
                let status = $(this).val();
                let id = $(this).attr('data-id');
                var url = "{{ route('admin.location.popular', ':id') }}";
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
        });
    </script>
@endpush

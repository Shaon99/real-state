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
                                <a href="{{ route('admin.property-type.index') }}" class="btn btn-primary" data-toggle="tooltip"
                                    title="Property Type List">
                                    Property Type List
                                </a>
                            @else
                                <button data-href="{{ route('admin.property-type.store') }}"
                                    class="btn btn-primary create">{{ __('Create Property Type') }}</button>
                            @endif
                            <a href="{{ route('admin.property-type.index', ['trashed' => 'DeletedRecords']) }}"
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
                                            <th>{{ __('Type Name') }}</th>                                           
                                            <th>{{ __('Created_at') }}</th> 
                                            <th>{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($types as $item)
                                            <tr>
                                                <td>{{ @$loop->iteration }}</td>
                                                <td>{{ @$item->name }}</td>                                           
                                                <td>{{ @$item->created_at->format('M d Y') }}</td>    
                                                <td>
                                                    @if (request()->has('trashed'))
                                                        <a class="btn btn-success btn-action mr-1"
                                                            href="{{ route('admin.propertytype.restore', $item->id) }}"
                                                            data-toggle="tooltip" title="restore">
                                                            <i class="fas fa-trash-restore"></i>
                                                        </a>
                                                        <button class="btn btn-danger deleteforever"
                                                            data-href="{{ route('admin.propertytype.deleteforever', $item->id) }}"
                                                            data-toggle="tooltip" title="Deleteforever" type="button">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    @else
                                                        <button class="btn btn-primary btn-action edit mr-1"
                                                            data-href="{{ route('admin.property-type.update', $item->id) }}"
                                                            data-item="{{ $item->name }}" data-toggle="tooltip"
                                                            title="Edit">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </button>
                                                        <button class="btn btn-danger delete"
                                                            data-href="{{ route('admin.property-type.destroy', $item->id) }}"
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
            modal.find('input[name=name]').val(item);           
            modal.modal('show');
        })
    </script>
@endpush

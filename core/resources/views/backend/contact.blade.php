@extends('backend.layout.master')

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

            <div class="section-body ">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th>{{ __('SL') }}</th>
                                                <th>{{ __('name') }}</th>
                                                <th>{{ __('Email') }}</th>
                                                <th>{{ __('Subject') }}</th>
                                                <th>{{ __('Message') }}</th>
                                                <th>{{ __('Reply') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($contacts as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->email }}</td>
                                                    <td>{{ $item->subject }}</td>
                                                    <td>{{ $item->message }}</td>
                                                    <td>
                                                        <button class="btn btn-warning reply-mail"
                                                        data-href="{{ route('admin.contact.mail', $item->id) }}"
                                                        data-mail="{{ $item->email}}"
                                                        data-toggle="tooltip" title="Reply" type="button">
                                                        <i class="fas fa-envelope"></i>
                                                    </button>
                                                    <button class="btn btn-danger delete"
                                                            data-href="{{ route('admin.contact.destroy', $item->id) }}"
                                                            data-toggle="tooltip" title="Delete" type="button">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
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
            </div>
        </section>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="mail">
        <div class="modal-dialog" role="document">
            <form action="" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('Send Mail to user') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">

                            <label for="">{{ __('Email') }}</label>

                            <input type="text" readonly name="email" id="reply-email" class="form-control">

                        </div>


                        <div class="form-group">

                            <label for="">{{ __('Subject') }}</label>

                            <input type="text" name="subject" class="form-control">

                        </div>

                        <div class="form-group">

                            <label for="">{{ __('Message') }}</label>

                            <textarea name="message" id="" cols="30" rows="10" class="form-control summernote"></textarea>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">{{ __('Send Mail') }}</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>




@endsection



@push('script')

    <script>
        'use strict'

        $(function() {
            $('.reply-mail').on('click', function(e) {
                e.preventDefault();

                const modal = $('#mail');

                modal.find('form').attr('action', $(this).data('href'));

                const email = $(this).data('mail');

                $('#reply-email').val(email);

                modal.modal('show');
            })

        })
    </script>

@endpush
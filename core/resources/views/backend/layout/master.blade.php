<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>
        @if (@$general->sitename)
            {{ __(@$general->sitename) . '-' }}
        @endif
        {{ __(@$pageTitle) }}
    </title>
    <link rel="shortcut icon" type="image/png" href="{{ getFile('icon', @$general->favicon) }}">
    <link rel="stylesheet" href="{{ asset('asset/admin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/admin/css/font-awsome.min.css') }}">
    @csrf
    <link rel="stylesheet" href="{{ asset('asset/admin/css/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/admin/css/datatables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/admin/css/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/admin/css/component-custom-switch.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/admin/modules/jquery-selectric/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/admin/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/admin/css/izitoast.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/admin/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/admin/css/select2.min.css') }}">


    @stack('style')
</head>

<body>
    <div id="app">
        <div class="main-wrapper">           
            @include('backend.layout.navbar')
            @include('backend.layout.sidebar')
            @yield('content')
            @include('backend.layout.footer')
        </div>
    </div>

    @include('backend.layout.deleteModal')
    @include('backend.layout.deleteForeverModal')

    @yield('script')

    <script src="{{ asset('asset/admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('asset/admin/js/proper.min.js') }}"></script>
    <script src="{{ asset('asset/admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('asset/admin/js/nicescroll.min.js') }}"></script>
    <script src="{{ asset('asset/admin/js/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('asset/admin/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('asset/admin/modules/moment.min.js') }}"></script>
    <script src="{{ asset('asset/admin/modules/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>
    <script src="{{ asset('asset/admin/js/stisla.js') }}"></script>
    <script src="{{ asset('asset/admin/js/scripts.js') }}"></script>
    <script src="{{ asset('asset/admin/js/izitoast.min.js') }}"></script>
    <script src="{{ asset('asset/admin/js/iconpicker.js') }}"></script>
    <script src="{{ asset('asset/admin/js/datatables.min.js') }}"></script>
    <script src="{{ asset('asset/admin/js/datatables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('asset/admin/js/modules-datatables.js') }}"></script>
    <script src="{{ asset('asset/admin/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('asset/admin/js/sortable.min.js') }}"></script>
    <script src="{{ asset('asset/admin/js/select2.min.js') }}"></script>

    @stack('script')


    <script>
        'use strict'
        $('.delete').on('click', function() {
            const modal = $('#delete');

            modal.find('form').attr('action', $(this).data('href'));

            modal.modal('show');
        })

        $('.deleteforever').on('click', function() {
            const modal = $('#deleteforever');

            modal.find('form').attr('action', $(this).data('href'));

            modal.modal('show');
        })
    </script>

    @if (Session::has('success'))
        <script>
            "use strict";
            iziToast.show({
                message: "{{ session('success') }}",
                position: 'topRight',
                theme: 'dark',
                icon: 'fas fa-solid fa-check',
                progressBarColor: 'rgb(0, 255, 184)',
                color: '#17d990',
                messageColor: '#ffffff',
            });
        </script>
    @endif

    @if (Session::has('error'))
        <script>
            "use strict";
            iziToast.show({
                message: "{{ __($error) }}",
                position: "topRight",
                theme: 'dark',
                icon: 'fa fa-exclamation-circle',
                progressBarColor: '#f78686',
                color: '#fb405d',
                messageColor: '#ffffff',
            });
        </script>
    @endif
    @if (session()->has('notify'))
        @foreach (session('notify') as $msg)
            <script>
                "use strict";
                iziToast.{{ $msg[0] }}({
                    message: "{{ __($msg[1]) }}",
                    position: 'topRight',
                    theme: 'dark',
                    icon: 'fas fa-solid fa-check',
                    progressBarColor: 'rgb(0, 255, 184)',
                    color: '#17d990',
                    messageColor: '#ffffff',
                });
            </script>
        @endforeach
    @endif

    @if (@$errors->any())
        <script>
            "use strict";
            @foreach ($errors->all() as $error)
                iziToast.show({
                    message: "{{ __($error) }}",
                    position: "topRight",
                    theme: 'dark',
                    icon: 'fa fa-exclamation-circle',
                    progressBarColor: '#f78686',
                    color: '#fb405d',
                    messageColor: '#ffffff',
                });
            @endforeach
        </script>
    @endif
</body>

</html>

@extends('backend.layout.master')
@push('style')
    <style>
        .text-custom{
            font-size: 14px;

        }
    </style>
@endpush
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __($pageTitle) }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.frontend.pages') }}">{{ __('Pages') }}</a>
                    </div>
                    <div class="breadcrumb-item">{{ __($pageTitle) }}</div>
                </div>
            </div>

            <div class="section-body text-custom">

                <div class="row">

                    <div class="col-md-12">


                        <div class="card">

                            <div class="card-body">

                                <div class="row">

                                    <form action="" method="POST" class="col-md-12">
                                        @csrf
                                        <div class="row">

                                            <div class="col-md-12">       
                                                <p class="text-capitalize">{{ __('Select The Section You Want to add your page  and green color for selected') }}</p>
                                                <ol class="simple_with_drop vertical section_style draggable-area ">

                                                    @if ($page->sections != null)
                                                        <div class="d-flex justify-content-start flex-wrap">
                                                            @foreach ($sections as $key => $sec)
                                                                <div class="col-md-3 my-2 selectable"
                                                                    id="{{ $key }}"
                                                                    data-clicked="{{ in_array($key, $page->sections) ? 'off' : 'on' }}"
                                                                    data-section="{{ $key }}">
                                                                    <div class="p-3 {{ in_array($key, $page->sections) ? 'bg-gradient-success' : 'bg-gradient-primary' }} text-center">
                                                                        <span class="text-white counter">
                                                                            {{ in_array($key, $page->sections) ? array_search($key, $page->sections) + 1 : '' }}
                                                                        </span>
                                                                        <span
                                                                            class="text-white text-center">{{ frontendFormatter($key) }}
                                                                        </span>


                                                                    </div>
                                                                </div>
                                                            @endforeach

                                                            <input type="hidden" name="sections[]" id="section_val">
                                                        </div>
                                                    @endif

                                                </ol>

                                            </div>


                                            <div class="form-group col-md-6 {{ $page->name == 'home' ? 'd-none' : '' }}">

                                                <label for="">{{ __('Page Name') }}</label>

                                                <input type="text" name="page" class="form-control" required
                                                    value="{{ $page->name }}">

                                            </div>

                                            <div
                                                class="form-group {{ $page->name == 'home' ? 'col-md-6' : 'col-md-6' }}">

                                                <label for="">{{ __('Page Order') }}</label>

                                                <input type="text" name="page_order" class="form-control"
                                                    value="{{ $page->page_order }}">

                                            </div>


                                            <div class="form-group col-md-6 {{ $page->name == 'home' ? 'd-none' : '' }}">

                                                <label for="">{{ __('status') }}</label>

                                                <select name="status" class="form-control">

                                                    <option value="1" {{ $page->status ? 'selected' : '' }}>
                                                        {{ __('Active') }}</option>
                                                    <option value="0" {{ $page->status ? '' : 'selected' }}>
                                                        {{ __('Inactive') }}</option>

                                                </select>

                                            </div>

                                            <div class="form-group col-md-6 {{ $page->name == 'home' ? 'd-none' : '' }}">

                                                <label for="">{{ __('Is Dropdown') }}</label>

                                                <select name="dropdown" class="form-control">

                                                    <option value="1" {{ $page->is_dropdown ? 'selected' : '' }}>
                                                        {{ __('Yes') }}</option>
                                                    <option value="0" {{ $page->is_dropdown ? '' : 'selected' }}>
                                                        {{ __('No') }}</option>

                                                </select>

                                            </div>

                                            <div class="form-group col-md-6">

                                                <label for="">{{ __('Seo Description') }}</label>
                                                <textarea name="seo_description" id="" cols="30" rows="5" class="form-control">{{ $page->seo_description ?? old('seo_description') }}</textarea>

                                            </div>


                                            <div
                                                class="form-group col-md-6 custom-section {{ $page->custom_section_data != null ? '' : 'd-none' }}">

                                                <label for="">{{ __('Custom Section') }}</label>
                                                <textarea name="custom_section" id="" cols="30" rows="5" class="form-control summernote">{{ $page->custom_section_data ?? old('custom_section') }}</textarea>

                                            </div>


                                            <div class="col-md-12">
                                                <button type="submit"
                                                    class="btn btn-primary float-right">{{ __('Update Page') }}</button>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        @endsection
</div>
</section>
@push('script')
    <script>
        (function($) {
            "use strict";
            let sections = [];
            @foreach ($page->sections as $section)
                sections.push("{{ $section }}")
            @endforeach


            $('.selectable').each(function(index) {

                $(this).on('click', function() {

                    if ($(this).attr('data-clicked') == 'off') {

                        $(this).children().removeClass('bg-gradient-success').addClass(
                            'bg-gradient-primary');

                        let value = $(this).attr('data-section')

                        let index = sections.indexOf(value)


                        sections.splice(index, 1)

                        $(this).attr('data-clicked', 'on')


                        counter(sections, value)

                        $('#section_val').val(JSON.stringify(sections));


                        return false;


                    }

                    $(this).children().removeClass('bg-gradient-primary').addClass(
                        'bg-gradient-success');

                    $(this).attr('data-clicked', 'off');

                    sections.push($(this).data('section'))

                    $(this).children().find('.counter').removeClass('d-none').text(sections.indexOf(
                        $(this).data('section')) + 1)

                    $('#section_val').val(JSON.stringify(sections));



                })
            })


            function counter(sections, romovalSectionId) {

                if (sections.indexOf(romovalSectionId)) {
                    $('#' + romovalSectionId).children().find('.counter').addClass('d-none')
                }

                for (let index = 0; index < sections.length; index++) {

                    let counterIndex = sections.indexOf(sections[index]) + 1;

                    $('#' + sections[index]).children().find('.counter').removeClass('d-none')
                        .text(counterIndex)



                }

            }

        })(jQuery);
    </script>
@endpush

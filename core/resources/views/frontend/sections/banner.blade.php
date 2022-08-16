@php
$content = content('banner.content');
@endphp
<section id="hero-area" class="parallax-searchs home15 thome-6 thome-1 overlay " data-stellar-background-ratio="0.5"
    style=" background: -webkit-gradient(linear, left top, left bottom, from(rgba(0, 0, 0, 0.5)), to(rgba(0, 0, 0, 0.5))), url({{ getFile('banner', @$content->data->image) }});
    no-repeat center top; background-size:cover;">
    <div class="hero-main">
        <div class="container" data-aos="zoom-in">
            <div class="row">
                <div class="col-12">
                    <div class="hero-inner">
                        <!-- Welcome Text -->
                        <div class="welcome-text">
                            <h1 class="h1">{{ @$content->data->title }}
                                <br class="d-md-none">
                                <span class="typed border-bottom"></span>
                            </h1>
                            <p class="mt-4">{{ @$content->data->short_description }}</p>
                        </div>
                        <!--/ End Welcome Text -->
                        <!-- Search Form -->
                        <div class="col-12">
                            <div class="banner-search-wrap">
                                <ul class="nav nav-tabs rld-banner-tab">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#tabs_1">For Sale</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="tabs_1">
                                        <div class="rld-main-search">
                                            <form action="" id="mainsearchItem" method="POST">
                                                @csrf
                                                <div class="row text-capitalize">
                                                    <div class="rld-single-input">
                                                        <input type="text"  id="name" name="name" placeholder="Enter Keyword...">
                                                        <br>
                                                        <small><span class="text-danger name-error"></span></small>

                                                    </div>
                                                    <div class="rld-single-select ml-22">
                                                        <select class="select single-select" id="collection">
                                                            <option value="" selected disabled>Property Type
                                                            </option>
                                                            @forelse ($types as $item)
                                                                <option value="{{ $item->id }}">{{ $item->name }}
                                                                </option>
                                                            @empty
                                                            @endforelse
                                                        </select>
                                                        <br><small><span
                                                                class="text-danger collection-error"></span></small>
                                                    </div>
                                                    <div class="rld-single-select">
                                                        <select class="select single-select mr-0" id="location">
                                                            <option value="" selected disabled>Location</option>

                                                            @forelse ($locations as $item)
                                                                <option value="{{ $item->id }}">{{ $item->name }}
                                                                </option>
                                                            @empty
                                                            @endforelse

                                                        </select>
                                                        <br> <small><span
                                                                class="text-danger location-error"></span></small>
                                                    </div>
                                                    <div class="dropdown-filter"><span>Advanced Search</span></div>
                                                    <div class="col-xl-2 col-lg-2 col-md-4 pl-0">
                                                        <button class="btn btn-yellow" type="submit">Search
                                                            Now</button>
                                                    </div>
                                                    
                                                    <div class="explore__form-checkbox-list full-filter">
                                                        <div class="row">
                                                            <div class="col-lg-4 col-md-6 py-1 pr-30 pl-0">
                                                                <!-- Form Property Status -->
                                                                    <select
                                                                        class="select single-select mr-0"
                                                                        id="status-p">
                                                                        <option value="" selected disabled>
                                                                            Property Status</option>
                                                                        <option value="0">On-Going
                                                                        </option>
                                                                        <option value="1">Complete
                                                                        </option>


                                                                    </select>
                                                               
                                                                <!--/ End Form Property Status -->
                                                            </div>
                                                            <div class="col-lg-4 col-md-6 py-1 pr-30 pl-0 ">
                                                                <!-- Form Bedrooms -->
                                                                <select
                                                                class="select single-select mr-0"
                                                                id="bed-p">
                                                                <option value="" selected disabled>
                                                                    Bedroom</option>
                                                                <option value="1">1
                                                                </option>
                                                                <option value="2">2
                                                                </option>
                                                                <option value="3">3
                                                                </option>
                                                                <option value="4">4
                                                                </option>
                                                                <option value="5">5
                                                                </option>
                                                                <option value="6">6
                                                                </option>


                                                            </select>
                                                                <!--/ End Form Bedrooms -->
                                                            </div>
                                                            <div class="col-lg-4 col-md-6 py-1 pl-0 pr-0">
                                                                <!-- Form Bathrooms -->
                                                                <select
                                                                class="select single-select mr-0"
                                                                id="bath-p">
                                                                <option value="" selected disabled>
                                                                    Bathroom</option>
                                                                <option value="1">1
                                                                </option>
                                                                <option value="2">2
                                                                </option>
                                                                <option value="3">3
                                                                </option>
                                                                <option value="4">4
                                                                </option>
                                                                <option value="5">5
                                                                </option>
                                                                <option value="6">6
                                                                </option>


                                                            </select>
                                                                <!--/ End Form Bathrooms -->
                                                            </div>
                                                            <div
                                                                class="col-lg-12 col-md-12 col-sm-12 py-1 pr-30 mr-5 sld">
                                                                <!-- Price Fields -->
                                                                <div class="main-search-field-2">
                                                                    <!-- Area Range -->
                                                                    <div class="range-slider">
                                                                        <label>Area Size</label>
                                                                        <div id="area-range" data-min="0" 
                                                                            data-max="3000" data-unit="sq ft"></div>
                                                                        <div class="clearfix"></div>
                                                                    </div>
                                                                    <br>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                            </form>
                                            <div class="pre">
                                                <div id="status">
                                                <div class="status-mes"></div>
                                            </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <!--/ End Search Form -->
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@push('style')
    <style>
        .homepage-9 section.portfolio {
            padding: 2.6rem 0;
            background: #ffffff !important;
        }
    </style>
@endpush
  <!-- START SECTION PROPERTIES LISTING -->
  <section class="properties-list featured portfolio blog">
    <div class="container" id="main">
        <!-- Search Form -->
        
         
    </div>
</section>
<!-- END SECTION PROPERTIES LISTING -->


@push('script')
    <script src="{{ asset('asset/frontend/js/typed.min.js') }}"></script>

    <script>
        'use strict';
        var typed = new Typed('.typed', {
            strings: ["House ^2000", "Apartment ^2000", "Plaza ^4000"],
            smartBackspace: false,
            loop: true,
            showCursor: true,
            cursorChar: "|",
            typeSpeed: 50,
            backSpeed: 30,
            startDelay: 800
        });



        $('.pre').hide();
        $(document).on('submit', '#mainsearchItem', function(e) {
            e.preventDefault();
            let name = $('#name').val();
            let collection = $('#collection').val();
            let location = $('#location').val();
            let status = $('#status-p').val();
            let bed = $('#bed-p').val();
            let bath = $('#bath-p').val();
            let area_min = $('.first-slider-value').val();            
            let area_max = $('.second-slider-value').val();           
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: "{{ route('mainsearch') }}",
                data: {
                    name: name,
                    collection: collection,
                    location: location,
                    status:status,
                    bed:bed,
                    bath:bath,
                    area_min:area_min,
                    area_max:area_max
                },
                beforeSend: function() {
                    $("#pre").show();
                },

                complete: function() {
                    $("#pre").hide();
                },
                success: (data) => {                   
                    $('#main').html(data);
                    $('.name-error').text('');
                    $('.collection-error').text('');
                    $('.location-error').text('');                   
                },
                error: (error) => {
                    if (typeof(error.responseJSON.errors.name) !== "undefined") {
                        $('.name-error').text(error.responseJSON.errors.name);
                    } else {
                        $('.name-error').text('');
                    }

                    if (typeof(error.responseJSON.errors.collection) !== "undefined") {
                        $('.collection-error').text(error.responseJSON.errors.collection);
                    } else {
                        $('.collection-error').text('');
                    }

                    if (typeof(error.responseJSON.errors.location) !== "undefined") {
                        $('.location-error').text(error.responseJSON.errors.location);
                    } else {
                        $('.location-error').text('');
                    }

                }
            })

        });
    </script>
@endpush

<!-- END HEADER SEARCH -->

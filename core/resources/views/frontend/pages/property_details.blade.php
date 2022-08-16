@extends('frontend.layout.master')
@push('style')
    <style>
        .inner-pages .headings-2 .listing-title-bar h3 {
            font-size: 27px !important;
        }

    
        img.mfp-img {
            margin: 0px !important;
            border-radius: 5px;
            height: auto;
        }

        .mfp-wrap {
            left: 60px !important;
            width: 100% !important;
        }

        button.mfp-arrow {
            display: none !important;
        }

        .mfp-with-zoom .mfp-container,
        .mfp-with-zoom.mfp-bg {
            opacity: 0 !important;
            -webkit-backface-visibility: hidden !important;
            -webkit-transition: all 0.3s ease-out !important;
            -moz-transition: all 0.3s ease-out !important;
            -o-transition: all 0.3s ease-out !important;
            transition: all 0.3s ease-out !important;
        }

        .mfp-with-zoom.mfp-ready .mfp-container {
            opacity: 1 !important;
        }

        .mfp-with-zoom.mfp-ready.mfp-bg {
            opacity: 0.8 !important;
        }

        .mfp-with-zoom.mfp-removing .mfp-container,
        .mfp-with-zoom.mfp-removing.mfp-bg {
            opacity: 0 !important;
        }

        .property.vid-si2 .popup-youtube,
        .property.wprt-image-video.vid-si2 .iq-waves {
            top: 71.8% !important;
        }

        .inner-pages .headings h1 {
            margin-top: 24.5rem;
            font-size: 26px;
            color: #fff;
            letter-spacing: 11.5px;
        }

        .single.detail-wrapper {
            margin-left: 22rem;
        }
    </style>
@endpush
@section('content')

    <section class="headings"
        style=" 
background: -webkit-gradient(linear, left top, left bottom, from(rgba(0, 0, 0, 0.5)), to(rgba(0, 0, 0, 0.5))), url({{ getFile('properties', $property->picture) }})no-repeat center center;
width: 100%;
height: 80vh;
background-size:cover;">
        <div class="text-heading text-center">
            <div class="container py-5">
                <h1>{{ @$pageTitle }}</h1>
                <h2 class="text-uppercase"><a class="text-uppercase" href="{{ route('home') }}">Home </a> &nbsp;/&nbsp;
                    {{ @$pageTitle }}</h2>
            </div>
        </div>
    </section>

    <!-- START SECTION PROPERTIES LISTING -->
    <section class="single-proper blog details">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 blog-pots">
                    <div class="row">
                        <div class="col-md-12 text-capitalize">
                            <section class="headings-2 pt-0">
                                <div class="pro-wrapper">
                                    <div class="detail-wrapper-body">
                                        <div class="listing-title-bar">
                                            <h3>{{ @$property->name }}
                                            </h3>
                                            <div class="mt-0">
                                                <a href="#" class="listing-address">
                                                    <i class="fa fa-map-marker pr-2 ti-location-pin mrg-r-5"></i>77 -
                                                    {{ @$property->address . ' , ' . @$property->location->name }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single detail-wrapper mr-2">
                                        <div class="detail-wrapper-body">
                                            <div class="listing-title-bar">
                                                <h4><span class="category-tag"
                                                        style="margin-left: 0;">{{ @$property->status == 0 ? 'On-Going' : 'Compeleted' }}</span>
                                                </h4>
                                                <div class="mt-0">
                                                    <a href="#listing-location" class="listing-address">
                                                        <p style="font-size:15px;color:#666;">Completion Date:
                                                            {{ @$property->completion_date ? @$property->completion_date : 'To be Announced' }}
                                                        </p>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- Star Description -->
                            <div class="blog-info details mb-30">
                                <h5 class="mb-4">Description</h5>
                                <p class="mb-3">
                                    @php
                                        echo @$property->details;
                                    @endphp
                                </p>
                            </div>
                            <!-- End Description -->
                        </div>
                    </div>
                    <!-- Star Property Details -->
                    <div class="single homes-content details mb-30">
                        <!-- title -->
                        <h5 class="mb-4">AT A GLANCE</h5>
                        <ul class="homes-list clearfix">
                            <li>
                                <span class="font-weight-bold mr-1">Property Type:</span>
                                <span class="det">{{ @$property->type->name }}</span>
                            </li>
                            <li>
                                <span class="font-weight-bold mr-1">Land Area:</span>
                                <span class="det">{{ @$property->land_area }}</span>
                            </li>
                            <li>
                                <span class="font-weight-bold mr-1">No. of Floors:</span>
                                <span class="det">{{ @$property->no_of_floors }}</span>
                            </li>
                            <li>
                                <span class="font-weight-bold mr-1">Apartment/Floor:</span>
                                <span class="det">{{ @$property->apartment_floor }}</span>
                            </li>
                            <li>
                                <span class="font-weight-bold mr-1">Apartment Size:</span>
                                <span class="det">{{ @$property->apartment_size }}</span>
                            </li>
                            <li>
                                <span class="font-weight-bold mr-1">Bedroom:</span>
                                <span class="det">{{ @$property->bedroom }}</span>
                            </li>
                            <li>
                                <span class="font-weight-bold mr-1">Bathroom:</span>
                                <span class="det">{{ @$property->bathroom }}</span>
                            </li>
                            <li>
                                <span class="font-weight-bold mr-1">Garages:</span>
                                <span class="det">{{ @$property->garages }}</span>
                            </li>
                            <li>
                                <span class="font-weight-bold mr-1">Launch Date:</span>
                                <span class="det">{{ @$property->launch_date }}</span>
                            </li>
                        </ul> <!-- title -->

                    </div>
                    @if (@$property->gallery[0]->image)
                        <div class="floor-plan property wprt-image-video w50 pro">
                            <h5>Feature Image</h5>
                            <div class="single-property-4">
                                <div class="container-fluid p0">
                                    <div class="row">
                                        <div class="col-sm-6 col-lg-6 p0">
                                            <div class="row m0">
                                                <div class="col-lg-12 p0">
                                                    <div class="zoom-gallery">
                                                        <a href="{{ getFile('properties-gallery', @$property->gallery[0]->image) }}"
                                                            title="Feature-Apartment-image">
                                                            <img class="img-fluid w100"
                                                                src="{{ getFile('properties-gallery', @$property->gallery[0]->image) }}"
                                                                alt="img">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-lg-6 p0">
                                            <div class="row m0">
                                                @forelse (@$property->gallery as $key => $item)
                                                    @if ($key > 0)
                                                        <div class="col-sm-6 col-lg-6 p0">
                                                            <div class="zoom-gallery">
                                                                <a href="{{ getFile('properties-gallery', @$item->image) }}"
                                                                    title="Feature-Apartment-image">
                                                                    <img class="img-fluid w100"
                                                                        src="{{ getFile('properties-gallery', @$item->image) }}"
                                                                        alt="img">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @empty
                                                @endforelse


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END SECTION HEADINGS -->
                        </div>
                    @else
                        <div class="floor-plan property wprt-image-video w50 pro">
                            <h5>Feature Image</h5>
                            <div class="single-property-4">
                                <div class="container-fluid p0">
                                    <div class="row">
                                        <div class="col-sm-6 col-lg-6 p0">
                                            <div class="row m0">
                                                <div class="col-lg-12 p0">
                                                    <div class="zoom-gallery">

                                                        <img class="img-fluid w100"
                                                            src="{{ getFile('default', @$general->default_image) }}"
                                                            alt="img">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-lg-6 p0">
                                            <div class="row m0">

                                                <div class="col-sm-6 col-lg-6 p0">
                                                    <div class="zoom-gallery">

                                                        <img class="img-fluid w100"
                                                            src="{{ getFile('default', @$general->default_image) }}"
                                                            alt="img">

                                                    </div>
                                                </div>



                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END SECTION HEADINGS -->
                        </div>
                    @endif

                    @if (@$property->floor_plan_image)
                        <div class="floor-plan property wprt-image-video w50 pro">
                            <h5>Floor Plans</h5>
                            <div class="zoom-gallery">
                                <a href="{{ getFile('properties', $property->floor_plan_image) }}" title="Floor-image">
                                    <img class="img-fluid w100"
                                        src="{{ getFile('properties', $property->floor_plan_image) }}" alt="img">
                                </a>
                            </div>

                        </div>
                    @else
                        <div class="floor-plan property wprt-image-video w50 pro">
                            <h5>Floor Plans</h5>
                            <div class="zoom-gallery">
                                <img class="img-fluid w100" src="{{ getFile('default', @$general->default_image) }}"
                                    alt="img">
                            </div>

                        </div>
                    @endif

                    <div class="property wprt-image-video w50 pro vid-si2">
                        <h5>Property Video</h5>
                        <img alt="image" src="{{ getFile('properties', @$property->picture) }}" alt="img">
                        <a class="icon-wrap popup-video popup-youtube" href="{{ $property->property_vedio }}">
                            <i class="fa fa-play"></i>
                        </a>
                        <div class="iq-waves">
                            <div class="waves wave-1"></div>
                            <div class="waves wave-2"></div>
                            <div class="waves wave-3"></div>
                        </div>
                    </div>
                    <div class="property-location map">
                        <h5>Location</h5>
                        <div class="divider-fade"></div>
                        <iframe src="{{ $property->property_map_link }}" width="100%" height="450" frameborder="0"
                            style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>


                </div>
                <aside class="col-lg-4 col-md-12 car">
                    <div class="single widget">
                        <!-- end author-verified-badge -->
                        <div class="sidebar">
                            <div class="widget-boxed mt-33 mt-5">
                                <div class="widget-boxed-body">
                                    <div class="sidebar-widget author-widget2">
                                        <div class="agent-contact-form-sidebar">
                                            <h4>Request Inquiry</h4>
                                            <form action="{{ route('akforprice') }}" method="post">
                                                @csrf
                                                <input type="text" name="title" value="{{ $property->name }}"
                                                    placeholder="title" hidden required />
                                                <input type="text" name="name" placeholder="Full Name" required />
                                                <input type="number" name="phone" placeholder="Phone Number"
                                                    required />
                                                <input type="email" name="email" placeholder="Email Address"
                                                    required />
                                                <textarea placeholder="Message" name="message" required></textarea>
                                                <input type="submit" class="multiple-send-message"
                                                    value="Submit Request" />
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="main-search-field-2">
                                <!-- End: Specials offer -->
                                <div class="widget-boxed popular mt-5">
                                    <div class="widget-boxed-header">
                                        <h4>Popular Collection</h4>
                                    </div>
                                    <div class="widget-boxed-body">
                                        <div class="recent-post">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        @forelse ($types as $item)
                                                            <div class="col-md-4">
                                                                <div class="tags">
                                                                    <span><a href="{{ route('collectionproperty', Str::slug($item->name)) }}"
                                                                            class="btn btn-outline-primary">{{ $item->name }}</a></span>
                                                                </div>
                                                            </div>
                                                        @empty
                                                        @endforelse
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
            <!-- START SIMILAR PROPERTIES -->
            <section class="similar-property featured portfolio p-0 bg-white-inner">
                <div class="container">
                    <h5>Similar Properties</h5>
                    <div class="row portfolio-items">
                        @forelse ($related as $item)
                            <div class="item col-lg-4 col-md-6 col-xs-12 landscapes">
                                <div class="project-single">
                                    <div class="project-inner project-head">
                                        <div class="homes">
                                            <!-- homes img -->
                                            <a href="single-property-1.html" class="homes-img">
                                                <img style="height: 225px;"
                                                    src="{{ getFile('properties', @$item->picture) }}" alt="home-1"
                                                    class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="button-effect">
                                            <a href="single-property-1.html" class="btn"><i
                                                    class="fa fa-link"></i></a>
                                            @if ($item->property_vedio)
                                                <a href="{{ $item->property_vedio }}"
                                                    class="btn popup-video popup-youtube"><i class="fas fa-video"></i></a>
                                            @endif

                                        </div>
                                    </div>
                                    <!-- homes content -->
                                    <div class="homes-content">
                                        <!-- homes address -->
                                        <h3><a href="single-property-1.html">{{ $item->name }}</a></h3>
                                        <p class="homes-address mb-3">
                                            <a href="single-property-1.html">
                                                <i
                                                    class="fa fa-map-marker"></i><span>{{ $item->address . ' , ' . @$item->location->name }}</span>
                                            </a>
                                        </p>
                                        <!-- homes List -->
                                        <ul class="homes-list clearfix pb-3">
                                            <li class="the-icons">
                                                <i class="flaticon-bed mr-2" aria-hidden="true"></i>
                                                <span>{{ $item->bedroom }} Bedrooms</span>
                                            </li>
                                            <li class="the-icons">
                                                <i class="flaticon-bathtub mr-2" aria-hidden="true"></i>
                                                <span>{{ $item->bathroom }} Bathrooms</span>
                                            </li>
                                            <li class="the-icons">
                                                <i class="flaticon-square mr-2" aria-hidden="true"></i>
                                                <span>{{ $item->apartment_size }} sq ft</span>
                                            </li>
                                            <li class="the-icons">
                                                <i class="flaticon-car mr-2" aria-hidden="true"></i>
                                                <span>{{ $item->garages }} Garages</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse

                    </div>
                </div>
            </section>
            <!-- END SIMILAR PROPERTIES -->
        </div>
    </section>
    <!-- END SECTION PROPERTIES LISTING -->
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('.zoom-gallery').magnificPopup({
                delegate: 'a',
                type: 'image',
                disableOn: 700,
                mainClass: 'mfp-fade',
                removalDelay: 160,
                preloader: false,
                fixedContentPos: false,
                mainClass: 'mfp-with-zoom mfp-img-mobile',
                image: {
                    verticalFit: true,
                    titleSrc: function(item) {
                        return item.el.attr('title');
                    }
                },
                gallery: {
                    enabled: true
                },
                zoom: {
                    enabled: true,
                    duration: 300,
                    opener: function(element) {
                        return element.find('img');
                    }
                }

            });
        });
    </script>
@endpush

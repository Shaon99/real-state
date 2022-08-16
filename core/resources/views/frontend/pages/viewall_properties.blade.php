@extends('frontend.layout.master')
@php
$content = content('feature.content');
@endphp
@push('style')
    <style>
        .homepage-9 section.portfolio {
            padding: 2.6rem 0;
            background: #f5f7fb !important;
        }
    </style>
@endpush
@section('content')
    <section class="headings"
        style=" 
background: -webkit-gradient(linear, left top, left bottom, from(rgba(0, 0, 0, 0.5)), to(rgba(0, 0, 0, 0.5))), url({{ getFile('feature', @$content->data->feature_heading) }})no-repeat center center;
width: 100%;
height: 50vh;">
        <div class="text-heading text-center">
            <div class="container py-5">
                <h1>{{ @$pageTitle }}</h1>
                <h2 class="text-uppercase"><a class="text-uppercase" href="{{ route('home') }}">Home </a> &nbsp;/&nbsp;
                    {{ @$pageTitle }}</h2>
            </div>
        </div>
    </section>
    <!-- END SECTION HEADINGS -->

    <!-- START SECTION PROPERTIES LISTING -->
    <section class="properties-list featured portfolio blog">
        <div class="container">
            <!-- Search Form -->
            <div class="col-12 px-0 parallax-searchs">
                <div class="banner-search-wrap">
                    <div class="tab-content text-capitalize">
                        <div class="tab-pane fade show active" id="tabs_1">
                            <div class="rld-main-search">
                                <form action="" id="searchItem" method="POST">   
                                    @csrf  
                                <div class="row">
                                    <div class="rld-single-input col-md-3">
                                        <input type="text"  name="name" id="name" placeholder="Enter Keyword...">                                        
                                       <br> <span class="text-danger name-error"></span>   
                                    </div>
                                    
                                    <div class="rld-single-select ml-22 col-md-3">
                                        <select class="select single-select" name="collection" id="collection">
                                            <option value="" selected disabled>select collection</option>
                                            @forelse ($types as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}
                                                </option>
                                            @empty
                                            @endforelse
                                        </select><br> <span class="text-danger collection-error"></span>
                                    </div>
                                    <div class="rld-single-select col-md-3">
                                        <select class="select single-select mr-0" id="location" name="location">
                                            <option value="" selected disabled>select location</option>
                                            @forelse ($locations as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}
                                                </option>
                                            @empty
                                            @endforelse
                                        </select><br>
                                        <span class="text-danger location-error"></span>                                   
                                    </div>
                                   
                                    <div class="col-md-3 pl-0">
                                        <button class="btn btn-yellow"  type="submit">Search Now</button>
                                    </div>                                   
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                    <div class="pre">
                        <div id="status">
                            <div class="status-mes"></div>
                        </div>
                    </div>
                    
                </div>
                
            </div>
            <div  id="searchable" class="text-capitalize">
                
          
            </div>
          
            <div class="row featured portfolio-items mt-5 text-capitalize" id="nonsearchable">
                
                @forelse ($properties as $item)
                    <div class="item col-lg-4 col-md-6 col-xs-12 landscapes sale">
                        <div class="project-single" data-aos="fade-up">
                            <div class="project-inner project-head">
                                <div class="project-bottom">
                                    <h4><a href="{{ route('property.details', Str::slug($item->slug)) }}">View
                                            Property</a><span class="category">{{ $item->name }}</span></h4>
                                </div>
                                <div class="homes">
                                    <!-- homes img -->
                                    <a href="{{ route('property.details', Str::slug($item->slug)) }}" class="homes-img">
                                        <div class="homes-tag button alt featured">{{ @$item->type->name }}</div>
                                        <img src="{{ getFile('properties', $item->picture) }}" alt="img"
                                            style="height:209px" class="img-responsive">
                                    </a>
                                </div>
                                <div class="button-effect">
                                    <a href="{{ route('property.details', Str::slug($item->slug)) }}" class="btn"><i
                                            class="fa fa-link"></i></a>
                                    @if ($item->property_vedio)
                                        <a href="{{ $item->property_vedio }}" class="btn popup-video popup-youtube"><i
                                                class="fas fa-video"></i></a>
                                    @endif
                                </div>
                            </div>
                            <!-- homes content -->
                            <div class="homes-content">
                                <!-- homes address -->
                                <h3><a
                                        href="{{ route('property.details', Str::slug($item->slug)) }}">{{ $item->name }}</a>
                                </h3>
                                <p class="homes-address mb-3">
                                    <a href="{{ route('property.details', Str::slug($item->slug)) }}">
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
                                <!-- Price -->
                                <div class="price-properties footer pt-3 pb-0">
                                    <a data-title="{{ $item->name }}" href="javascript:void(0)"
                                        class="btn btn-outline-light text-uppercase text-light ask-for-price"> ask for
                                        price
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                @empty
                    <h1>Property Not Found</h1>
                @endforelse
                <nav aria-label="..." class="pt-3">
                    <ul class="pagination grid-3">
                        {{ @$properties->links('frontend.pages.paginate') }}
                    </ul>
                </nav>
            </div>
            
        </div>
    </section>
    <!-- END SECTION PROPERTIES LISTING -->
@endsection
@push('script')
    <script>
        $('.pre').hide();        
        $(document).on('submit', '#searchItem', function(e) {
            e.preventDefault();
            const name = $('#name').val();
            const collection = $('#collection').val();
            const location = $('#location').val();           
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: "{{ route('search') }}",
                data: {
                    name: name,
                    collection: collection,
                    location: location,
                },
                beforeSend: function() {
                    $("#pre").show();
                },

                complete: function() {
                    $("#pre").hide();
                },
                success: (data) => {
                    $('#nonsearchable').hide();
                    $('#searchable').html(data);
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

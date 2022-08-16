@php
$content = content('feature.content');
$feature_properties = App\Models\Properties::with('location', 'type')
    ->where('is_active', 1)
    ->where('is_featured', 1)
    ->latest()
    ->limit(8)
    ->get();
@endphp
<!-- START SECTION FEATURED PROPERTIES -->
<section class="featured portfolio bg-white-2 rec-pro full-l">
    <div class="container-fluid">
        <div class="sec-title">
            <h2>{{ @$content->data->title }}</h2>
            <p>{{ @$content->data->short_description }}</p>
        </div>
        <div class="row portfolio-items">
            @forelse ($feature_properties as $item)
                <div class="item col-xl-6 col-lg-12 col-md-12 col-xs-12 landscapes sale">
                    <div class="project-single" data-aos="fade-right">
                        <div class="project-inner project-head">
                            <div class="homes">
                                <!-- homes img -->
                                <a href="{{ route('property.details', Str::slug($item->slug)) }}" class="homes-img">
                                    <div class="homes-tag button alt featured">{{ @$item->type->name }}</div>
                                    <img src="{{ getFile('properties', $item->picture) }}" alt="img"
                                        class="img-responsive">
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
                        <div class="homes-content text-capitalize">
                            <!-- homes address -->
                            <h3><a href="{{ route('property.details', Str::slug($item->slug)) }}">{{ $item->name }}</a>
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
                            <div class="price-properties footer pt-3 pb-0">
                                <a data-title="{{ $item->name }}" href="javascript:void(0)" class="btn btn-outline-light text-uppercase text-light ask-for-price"> ask for price
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
            @endforelse

        </div>
        <div class="bg-all">
            <a href="{{ route('allproperty') }}" class="btn btn-outline-light">View More</a>
        </div>
    </div>
</section>
<!-- END SECTION FEATURED PROPERTIES -->

@php
$content = content('popular_place.content');
$popular_location = App\Models\Location::withCount('countProperties')->where('popular_location', 1)
    ->latest()
    ->limit(9)
    ->get();


@endphp

<section class="popular-places bg-white">
    <div class="container-fluid">
        <div class="sec-title">
            <h2>{{ @$content->data->title }}</h2>
            <p>{{ @$content->data->short_description }}</p>
        </div>
        <div class="row">       
            @forelse ($popular_location as $item)
                <div class="col-sm-6 col-lg-4 col-xl-4" data-aos="zoom-in" data-aos-delay="150">
                    <!-- Image Box -->
                    <a href="{{ route('locationproperty',Str::slug($item->name)) }}" class="img-box hover-effect">
                        <img src="{{ getFile('location', $item->image) }}" class="img-responsive" alt="img">
                        <div class="img-box-content visible text-uppercase">
                            <h4>{{ $item->name }}</h4>
                            <span>{{ @$item->count_properties_count }} Properties</span>
                        </div>
                    </a>
                </div>
            @empty
            @endforelse

        </div>
    </div>
</section>
<!-- END SECTION POPULAR PLACES -->

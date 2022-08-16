@php
$content = content('testimonial.content');
$elements = element('testimonial.element');
@endphp
<!-- START SECTION TESTIMONIALS -->
<section class="testimonials bg-white-2 rec-pro">
    <div class="container-fluid">
        <div class="sec-title">
            <h2>{{ @$content->data->title }}</h2>
            <p>{{ @$content->data->short_description }}</p>
        </div>

        <div class="owl-carousel job_clientSlide">
            @forelse ($elements as $item)
                <div class="singleJobClinet" data-aos="zoom-in" data-aos-delay="150">
                    <p>
                        {{ @$item->data->description }}
                    </p>
                    <div class="detailJC">
                        <span><img src="{{ getFile('testimonial', @$item->data->image) }}" alt="img" /></span>
                        <h5>{{ @$item->data->name }}</h5>
                        <p>{{ @$item->data->organisation }}</p>
                    </div>
                </div>
            @empty
            @endforelse
        </div>

    </div>
</section>
<!-- END SECTION TESTIMONIALS -->

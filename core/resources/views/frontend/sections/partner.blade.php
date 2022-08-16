@php
$content = content('partner.content');
$elements = element('partner.element');

@endphp
<!-- STAR SECTION PARTNERS -->
<div class="partners bg-white rec-pro">
    <div class="container-fluid">
        <div class="sec-title">
            <h2>{{ @$content->data->title }}</h2>
            <p>{{ @$content->data->short_description }}</p>
        </div>

        <div class="owl-carousel style2">
            @forelse ($elements as $item)
                <div class="owl-item" data-aos="fade-up">
                    <img src="{{ getFile('partner', @$item->data->image) }}" alt="partner">
                </div>
            @empty
            @endforelse
        </div>
    </div>
</div>
<!-- END SECTION PARTNERS -->

@php
$content = content('why_choose_us.content');
$elements = element('why_choose_us.element');
@endphp
<section class="how-it-works bg-white rec-pro">
    <div class="container-fluid">
        <div class="sec-title">
            <h2>{{ @$content->data->title }}</h2>
            <p>{{ @$content->data->short_description }}</p>
        </div>
        <div class="row service-1">
            
            @forelse ($elements as $item)
            <article class="col-lg-3 col-md-6 col-xs-12 serv" data-aos="fade-up" data-aos-delay="150">
                <div class="serv-flex">
                    <div class="art-1 img-13">
                        <img src="{{ getFile('why_choose_us',@$item->data->image) }}" alt="img">
                        <h3>{{ @$item->data->title }}</h3>
                    </div>
                    <div class="service-text-p">
                        <p class="text-center">
                            {{ @$item->data->short_description }}
                        </p>
                    </div>
                </div>
            </article> 
            @empty
                
            @endforelse
                              
        </div>
    </div>
</section>
<!-- END SECTION WHY CHOOSE US -->        
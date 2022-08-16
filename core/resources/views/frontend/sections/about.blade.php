@php
$content = content('about.content');
@endphp
<section class="headings"
    style=" 
background: -webkit-gradient(linear, left top, left bottom, from(rgba(0, 0, 0, 0.5)), to(rgba(0, 0, 0, 0.5))), url({{ getFile('about', @$content->data->header_image) }})no-repeat center center;
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

<section class="about-us fh">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 who-1">
                <div>
                    <h2 class="text-left mb-4">About  <span>{{ @$content->data->title }}</span></h2>
                </div>
                <div class="pftext">
                    <p>
                        @php 
                          echo @$content->data->description
                        @endphp
                    
                    </p>
                </div>         
            </div>
            <div class="col-lg-6 col-md-12 col-xs-12">
                <div class="wprt-image-video w50">
                    <img alt="image" src="{{ getFile('about',@$content->data->image) }}">
                    <a class="icon-wrap popup-video popup-youtube" href="{{@$content->data->vedio_link}}">
                        <i class="fa fa-play"></i>
                    </a>
                    <div class="iq-waves">
                        <div class="waves wave-1"></div>
                        <div class="waves wave-2"></div>
                        <div class="waves wave-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

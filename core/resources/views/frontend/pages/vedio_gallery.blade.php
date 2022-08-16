@extends('frontend.layout.master')
@section('content')
    <section class="headings"
        style=" 
background: -webkit-gradient(linear, left top, left bottom, from(rgba(0, 0, 0, 0.5)), to(rgba(0, 0, 0, 0.5))), url({{ getFile('vedio_gallery', @$vedio_content->data->header_image) }})no-repeat center center;
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
                @forelse (@$vedios as $item)
                <div class="col-lg-6 col-md-6 col-xs-6 mb-3">
                    <div class="wprt-image-video w50">
                        <img alt="image"  src="{{ getFile('vedio_gallery',@$item->data->background_image) }}" style="height: 400px!important;">
                        <a class="icon-wrap popup-video popup-youtube" href="{{ @$item->data->vedio_link }}">
                            <i class="fa fa-play"></i>
                        </a>
                        <div class="iq-waves">
                            <div class="waves wave-1"></div>
                            <div class="waves wave-2"></div>
                            <div class="waves wave-3"></div>
                        </div>
                        
                    </div>
                    <h3 class="text-capitalize  py-2" style="font-size: 16px:font-weight:600">{{ @$item->data->title }}</h3>

                </div>
                @empty
                    
                @endforelse           
              
            </div>
            <nav aria-label="..." class="pt-5">
                <ul class="pagination mt-0">
                    {{ @$vedios->links('frontend.pages.paginate') }}
                </ul>
            </nav>
        </div>
    </section>
    <!-- END SECTION ABOUT -->

@endsection



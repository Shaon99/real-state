@extends('frontend.layout.master')

@push('style')
    <style>

img.mfp-img {
    margin: 0px !important;
    border-radius: 5px;
    height: auto;
}
.mfp-wrap{
    left: 60px!important;
    width: 100%!important;
}

        button.mfp-arrow{
         display: none!important;
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
    </style>
@endpush
@section('content')
    <section class="headings"
        style=" 
background: -webkit-gradient(linear, left top, left bottom, from(rgba(0, 0, 0, 0.5)), to(rgba(0, 0, 0, 0.5))), url({{ getFile('photo_gallery', @$photos_content->data->header_image) }})no-repeat center center;
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
    <!-- START SECTION BLOG -->
    <section class="blog-section">
        <div class="container">
            <div class="news-wrap">
                <div class="row">
                    @forelse ($photos as $item)
                        <div class="col-lg-6 col-md-6 col-xs-12 mb-3">
                            <div class="news-item">
                                <div class="news-item-img zoom-gallery">
                                    <a href="{{ getFile('photo_gallery', @$item->data->image) }}"
                                        title="{{ @$item->data->title }}" style="width:82px;height:125px;">
                                        <img style="height:350px; width:100%; object-fit:cover;" class="img-responsive"
                                            src="{{ getFile('photo_gallery', @$item->data->image) }}" alt="image">
                                          
                                    </a>
                                </div>                            
                                
                            </div>
                            <h3 class="text-capitalize  py-2" style="font-size: 16px:font-weight:600">{{ @$item->data->title }}</h3>
                        </div>
                    @empty
                    @endforelse

                </div>
            </div>
            <nav aria-label="..." class="pt-5">
                <ul class="pagination mt-0">
                    {{ @$photos->links('frontend.pages.paginate') }}
                </ul>
            </nav>
        </div>
    </section>
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
<!-- END SECTION BLOG -->

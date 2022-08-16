@extends('frontend.layout.master')
@section('content')
    @php
    $content = content('blog.content');
    $elements = App\Models\SectionData::where('key', 'blog.element')
        ->latest()
        ->paginate();

    @endphp
    <section class="headings"
        style=" 
    background: -webkit-gradient(linear, left top, left bottom, from(rgba(0, 0, 0, 0.5)), to(rgba(0, 0, 0, 0.5))), url({{ getFile('blog', @$content->data->header_image) }})no-repeat center center;
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
                    @forelse ($elements as $item)
                    <div class="col-lg-4 col-md-12 col-xs-12">
                        <div class="news-item">
                            <a href="{{ route('blog.details',[@$item->id,Str::slug(@$item->data->title)]) }}" class="news-img-link">
                                <div class="news-item-img">
                                    <img class="img-responsive" src="{{ getFile('blog', @$item->data->image) }}" alt="blog image">
                                </div>
                            </a>
                            <div class="news-item-text">
                                <a href="{{ route('blog.details',[@$item->id,Str::slug(@$item->data->title)]) }}">
                                    <h3>{{ @$item->data->title }}</h3>
                                </a>
                                <div class="dates">
                                    <span class="date">{{ @$item->created_at->format('M d Y') }}</span>
                                   
                                </div>
                                <div class="news-item-descr big-news text-justify">
                                    <p>{{Str::limit(@$item->data->short_description,150,'...') }}</p>
                                </div>
                                <div class="news-item-bottom">
                                    <a href="{{ route('blog.details',[@$item->id,Str::slug(@$item->data->title)]) }}" class="news-link">Read more...</a>                                 
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                        
                    @endforelse
                    
                </div>
            </div>
            <nav aria-label="..." class="pt-5">
                <ul class="pagination mt-0">
                    {{$elements->links('frontend.pages.paginate')}}
                </ul>
            </nav>
        </div>
    </section>
@endsection
<!-- END SECTION BLOG -->

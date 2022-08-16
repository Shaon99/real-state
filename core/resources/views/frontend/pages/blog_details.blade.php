@extends('frontend.layout.master')
@section('content')
    @php
    $content = content('blog.content');
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
    <section class="blog blog-section bg-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12 blog-pots">
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <div class="news-item details no-mb2">
                                <div class="news-item-img">
                                    <img class="img-responsive"
                                        style="display: inline-block;
                                        height: 450px;
                                        width: 100%;
                                        object-fit: cover;
                                    "
                                        src="{{ getFile('blog', @$blog->data->image) }}" alt="blog image">
                                </div>
                                <div class="news-item-text details pb-0">
                                    <h3>{{ @$blog->data->title }}</h3>
                                    <div class="dates">
                                        <span class="date">{{ @$blog->created_at->format('M d Y') }}</span>
                                    </div>
                                    <div class="news-item-descr big-news details visib mb-0">
                                        <p class="mb-3">{{ @$blog->data->short_description }}</p>
                                    </div>
                                    <p class="d-lg-block d-md-block">
                                        <?php
                                        echo @$blog->data->description;
                                        ?>
                                    </p>
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ URL::current() }}"
                                    target="_blank" class="text-uppercase my-3">
                                   share <i style="font-size:18px" class="ml-2 fab fa-facebook-f"></i>
                                </a>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
                <aside class="col-lg-3 col-md-12">
                    <div class="widget">
                        <div class="recent-post">
                            <h5 class="font-weight-bold mb-4">Recent Posts</h5>
                            @forelse ($recentblogs as $item)
                                <div class="recent-main">
                                    <div class="recent-img">
                                        <a href="{{ route('blog.details', [@$item->id, Str::slug(@$item->data->title)]) }}">
                                            <img 
                                                src="{{ getFile('blog', @$item->data->image) }}" alt="IMG"></a>
                                    </div>
                                    <div class="info-img">
                                        <a href="{{ route('blog.details', [@$item->id, Str::slug(@$item->data->title)]) }}">
                                            <h6>{{ @$item->data->title }}</h6>
                                        </a>
                                        <p>{{ @$item->created_at->format('M d Y') }}</p>
                                    </div>
                                </div>
                            @empty
                            @endforelse

                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>
    <!-- END SECTION BLOG -->
@endsection
<!-- END SECTION BLOG -->

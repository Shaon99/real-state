<header id="header-container" class="header head-tr">
    <div id="header" class="head-tr bottom">
        <div class="container container-header">
            <div class="left-side">
                <div id="logo">
                    @if (@$general->logo)
                        <a href="{{ route('home') }}">
                            <img src="{{ getFile('logo', @$general->logo) }}"
                                data-sticky-logo="{{ getFile('logo', @$general->logo) }}" alt="logo">
                        </a>
                    @else
                        <a href="{{ route('home') }}">
                            <img src="{{ getFile('default', @$general->default_image) }}"
                                data-sticky-logo="{{ getFile('default', @$general->default_image) }}" alt="logo">
                        </a>
                    @endif
                </div>
                <div class="mmenu-trigger">
                    <button class="hamburger hamburger--collapse" type="button">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
                <nav id="navigation" class="style-1 head-tr">
                    <ul id="responsive">
                        <li>
                            <a href="{{ route('home') }}">HOME</a>
                        </li>
                        <li><a href="javascript:void(0)">PROPERTIES</a>
                            <ul>
                                @forelse ($types as $item)
                                <li><a href="{{ route('collectionproperty',Str::slug($item->name)) }}">{{ $item->name }}</a></li>   
                                @empty
                                    
                                @endforelse
                                                            
                            </ul>
                        </li>
                        </li>
                        @forelse ($pages as $page)
                            <li><a href="{{ route('pages', $page->slug) }}">{{ $page->name }}</a></li>
                        @empty
                        @endforelse

                        <li><a href="javascript:void(0)">gallery</a>
                            <ul>
                                <li><a href="{{ route('photogallery') }}">Photo Gallery</a></li>
                                <li><a href="{{ route('vediogallery') }}">Vedio Gallery</a></li>
                            </ul>
                        </li>

                    </ul>
                </nav>
                <!-- Main Navigation / End -->
            </div>
            <!-- Left Side Content / End -->

        </div>
    </div>
    <!-- Header / End -->

</header>
<div class="clearfix"></div>
<!-- Header Container / End -->

@php
$footerContent = content('footer.content');
$footerElement = element('footer.element');
$contact = content('contact.content');
$newsletterContent = content('newsletter.content');
@endphp

<footer class="first-footer rec-pro">
    <div class="top-footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="netabout">
                        <a href="{{ route('home') }}" class="logo">
                            <img src="{{ getFile('footer', @$footerContent->data->footer_logo) }}" alt="logo">
                        </a>
                        <p>{{ @$footerContent->data->footer_short_description }}</p>
                    </div>
                    <div class="contactus">
                        <ul>
                            <li>
                                <div class="info">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    <p class="in-p">{{ @$contact->data->location }}</p>
                                </div>
                            </li>
                            <li>
                                <div class="info">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                    <p class="in-p">{{ @$contact->data->phone }}</p>
                                </div>
                            </li>
                            <li>
                                <div class="info">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    <p class="in-p ti">{{ @$contact->data->email }}</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-lg-3 col-md-6">
                    <div class="navigation">
                        <h3>Navigation</h3>
                        <div class="nav-footer text-capitalize">
                            <ul>
                                <li><a href="{{ route('home') }}">Home</a></li>
                                @forelse ($pages as $page)
                                    <li><a href="{{ route('pages', $page->slug) }}">{{ $page->name }}</a></li>
                                @empty
                                @endforelse
                            </ul>
                            <ul class="nav-right text-capitalize">
                                <li><a href="{{ route('photogallery') }}">Photo Gallery</a></li>
                                <li><a href="{{ route('vediogallery') }}">Vedio Gallery</a></li> 
                            </ul>
                        </div>
                    </div>
                </div>
          
                <div class="col-lg-4 col-md-6">
                    <div class="newsletters">
                        <h3>{{ @$newsletterContent->data->title }}</h3>
                        <p>{{ @$newsletterContent->data->short_description }}</p>
                    </div>
                    <form class="bloq-email" action="#" id="subscribe" method="post">
                        <div class="email">
                            <input type="email" class="subscribe-email" name="email" placeholder="Enter Your Email">
                            <input type="submit" value="Subscribe">
                            <p class="subscription-success"></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="second-footer rec-pro">
        <div class="container-fluid sd-f">
            <ul class="netsocials">
                @forelse ($footerElement as $item)
                    <li><a href="{{ @$item->data->social_link }}" target="_blank"><i
                                class="{{ @$item->data->social_icon }}" aria-hidden="true"></i></a></li>
                @empty
                    <li><a href="#">data not found</a></li>
                @endforelse
            </ul>
            <p class="copy-right text-lowercase">@Copyright reserved {{ __(@$general->sitename) }} | Developed by <a
                    class="text-capitalize text-success" href="https://www.techdynobd.com/" target="_blank">Techdyno BD Ltd</a></p>
        </div>
    </div>
</footer>

<a data-scroll href="#wrapper" class="go-up"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>

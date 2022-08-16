@extends('frontend.layout.master')
@section('content')
    @php
    $contact = content('contact.content');
    @endphp

    <section class="headings"
        style=" 
    background: -webkit-gradient(linear, left top, left bottom, from(rgba(0, 0, 0, 0.5)), to(rgba(0, 0, 0, 0.5))), url({{ getFile('contact', @$contact->data->header_image) }})no-repeat center center;
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

    <!-- START SECTION CONTACT US -->
    <section class="contact-us">
        <div class="container">
            <div class="property-location mb-5">
                <h3>Our Location</h3>
                <div class="divider-fade">
                    <iframe src="{{ @$contact->data->map_link }}" width="100%" height="450" frameborder="0"
                        style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <h3 class="mb-4">Contact Us</h3>
                    <form action="{{ route('contact') }}" id="contactform" class="contact-form" name="contactform"
                        method="POST" novalidate>
                        @csrf
                        <div id="success" class="successform">
                            <p class="alert alert-success font-weight-bold" role="alert">Your message was sent
                                successfully!</p>
                        </div>
                        <div id="error" class="errorform">
                            <p>Something went wrong, try refreshing and submitting the form again.</p>
                        </div>
                        <div class="form-group">
                            <input type="text" required class="form-control input-custom input-full" name="name"
                                placeholder="Name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control input-custom input-full" name="email"
                                placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="text" required class="form-control input-custom input-full" name="subject"
                                placeholder="subject">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control textarea-custom input-full" id="ccomment" name="message" required rows="8"
                                placeholder="Message"></textarea>
                        </div>
                        <button type="submit" id="submit-contact" class="btn btn-primary btn-lg">Submit</button>
                    </form>
                </div>
                <div
                    class="col-lg-4 col-md-12 bgc"style="background: linear-gradient(rgba(32, 51, 100, 0.8), rgba(32, 51, 100, 0.8)), url({{ getFile('contact', @$contact->data->site_image) }}) no-repeat center center;
                    padding: 2rem;
    background-size: cover;">
                    <div class="call-info">
                        <h3>Contact Details</h3>
                        <p class="mb-5">Please find below contact details and contact us today!</p>
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
            </div>
        </div>
    </section>
    <!-- END SECTION CONTACT US -->
@endsection

@php
$content = content('team.content');
$elements = element('team.element');

@endphp
<section class="team bg-white rec-pro">
    <div class="container-fluid">
        <div class="sec-title">
            <h2>{{ @$content->data->title }}</h2>
            <p>{{ @$content->data->short_description }}</p>
        </div>
        <div class="row team-all">
            @forelse ($elements as $item)
            <div class="col-lg-3 col-md-6 team-pro">
                <div class="team-wrap">
                    <div class="team-img">
                        <img src="{{ getFile('team',@$item->data->image) }}" alt="img" />
                    </div>
                    <div class="team-content">
                        <div class="team-info">
                            <h3>{{ @$item->data->member_name }}</h3>
                            <p>{{ @$item->data->designation}}</p>
                            <div class="team-socials">
                                <ul>
                                    <li>
                                        <a href="{{@$item->data->facebook_link}}" target="_blank" title="facebook"><i class="fa fa-facebook"
                                                aria-hidden="true"></i></a>
                                        <a href="{{@$item->data->linkedin_link}}" target="_blank" title="linkedin"><i class="fa fa-twitter fa fa-linkedin"
                                                aria-hidden="true"></i></a>
                                        <a href="{{ @$item->data->instagram_link }}" target="_blank" title="instagran"><i class="fa fa-instagram"
                                                aria-hidden="true"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            @endforelse
           
        </div>

    </div>
</section>
<!-- END SECTION AGENTS -->

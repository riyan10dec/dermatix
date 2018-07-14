<?php
Theme::breadcrumb()
        ->add('Home', URL::to('/'))
        ->add('News & Update', URL::to('news-update'))
        ->add($event->title, URL::to('event/'.$event->slug));
Theme::set('fb-meta', '
        <meta property="og:title" content="'.$event->title.'" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="'.Request::url().'" />
        <meta property="og:image" content="'.$event->image->url().'" />
        <meta property="og:description" content="'.tagline($event->body, 100).'"/>

    ');

Theme::set('twitter-meta', '
        <meta name="twitter:title" content="'.$event->title.'">
        <meta name="twitter:description" content="'.tagline($event->body, 100).'">
        <meta name="twitter:image" content="'.$event->image->url().'">

    ');
?>
<section id="detail-up-events">
    <header class="page-header">
        <div class="container">
            <h1 class="title">{{ $event->title }}</h1>
        </div>
    </header>
    <div class="container">
        <div class="row">
            <div class="content blog blog-post col-sm-8 col-md-8">
                <div class="desc-event row">
                    <!-- <div class="col-sm-2">
                        <ul>
                            <li><strong>Community</strong></li>
                            <li><strong>Tempat</strong></li>
                            <li><strong>Acara</strong></li>
                            <li><strong>Waktu</strong></li>
                        </ul>
                    </div>
                    <div class="col-sm-10">
                        <ul>
                            <li><span>:</span>{{ $event->community }}</li>
                            <li><span>:</span>{{ $event->place }}</li>
                            <li><span>:</span>{{ $event->agenda }}</li>
                            <li><span>:</span>{{ $event->time }} WIB</li>
                        </ul>
                    </div> -->
                    <div class="col-xs-12">
                        <ul>
                            <!-- <li>
                                <strong id="strongChangeMobile" class="width20">Community</strong>
                                <span id="saperateChangeMobile" class="saperate width5">:</span>
                                <span id="desc-liChangeMobile" class="desc-li width75">{{ $event->community }}</span>
                            </li> -->
                            <li>
                                <strong id="strongChangeMobile_place" class="width20">Tempat</strong>
                                <span id="saperateChangeMobile_place" class="saperate width5">:</span>
                                <span id="desc-liChangeMobile_place"  class="desc-li width75">{{ $event->place }}</span>
                            </li>
                            <!-- <li>
                                <strong id="strongChangeMobile_agenda" class="width20">Acara</strong>
                                <span id="saperateChangeMobile_agenda" class="saperate width5">:</span>
                                <span id="desc-liChangeMobile_agenda"  class="desc-li width75">{{ $event->agenda }}</span>
                            </li> -->
                            <!-- <li>
                                <strong id="strongChangeMobile_time" class="width20">Waktu</strong>
                                <span id="saperateChangeMobile_time" class="saperate width5">:</span>
                                <span id="desc-liChangeMobile_time"  class="desc-li width75">{{ $event->time }}</span>
                            </li> -->
                        </ul>
                    </div>
                </div>
                {{--<img src="{{ URL::to('uploads/events/'.$event->banner) }}" alt="" class="img-responsive">--}}
                <img src="{{ $event->banner->url() }}" alt="" class="img-responsive">

                <ul class="rrssb-buttons">
                    <li class="rrssb-facebook">
                        <!--  Replace with your URL. For best results, make sure you page has the proper FB Open Graph tags in header:
                              https://developers.facebook.com/docs/opengraph/howtos/maximizing-distribution-media-content/ -->
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ Request::url() }}" class="popup">
                                <span class="rrssb-icon">
                                  <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="29" height="29" viewBox="0 0 29 29">
                                      <path d="M26.4 0H2.6C1.714 0 0 1.715 0 2.6v23.8c0 .884 1.715 2.6 2.6 2.6h12.393V17.988h-3.996v-3.98h3.997v-3.062c0-3.746 2.835-5.97 6.177-5.97 1.6 0 2.444.173 2.845.226v3.792H21.18c-1.817 0-2.156.9-2.156 2.168v2.847h5.045l-.66 3.978h-4.386V29H26.4c.884 0 2.6-1.716 2.6-2.6V2.6c0-.885-1.716-2.6-2.6-2.6z"
                                            class="cls-2" fill-rule="evenodd" />
                                  </svg>
                                </span>
                            <span class="rrssb-text">facebook</span>
                        </a>
                    </li>
                    <li class="rrssb-twitter">
                        <!-- Replace href with your Meta and URL information  -->
                        <a href="https://twitter.com/intent/tweet?text={{ $event->title }}%3A%20{{ Request::url() }}"
                           class="popup">
                                <span class="rrssb-icon">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28">
                                      <path d="M24.253 8.756C24.69 17.08 18.297 24.182 9.97 24.62c-3.122.162-6.22-.646-8.86-2.32 2.702.18 5.375-.648 7.507-2.32-2.072-.248-3.818-1.662-4.49-3.64.802.13 1.62.077 2.4-.154-2.482-.466-4.312-2.586-4.412-5.11.688.276 1.426.408 2.168.387-2.135-1.65-2.73-4.62-1.394-6.965C5.574 7.816 9.54 9.84 13.802 10.07c-.842-2.738.694-5.64 3.434-6.48 2.018-.624 4.212.043 5.546 1.682 1.186-.213 2.318-.662 3.33-1.317-.386 1.256-1.248 2.312-2.4 2.942 1.048-.106 2.07-.394 3.02-.85-.458 1.182-1.343 2.15-2.48 2.71z"
                                              />
                                  </svg>
                                </span>
                            <span class="rrssb-text">twitter</span>
                        </a>
                    </li>

                    <li class="rrssb-googleplus">
                        <!-- Replace href with your meta and URL information.  -->
                        <a href="https://plus.google.com/share?url={{ $event->title }}%20{{ Request::url() }}" class="popup">
                                <span class="rrssb-icon">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M21 8.29h-1.95v2.6h-2.6v1.82h2.6v2.6H21v-2.6h2.6v-1.885H21V8.29zM7.614 10.306v2.925h3.9c-.26 1.69-1.755 2.925-3.9 2.925-2.34 0-4.29-2.016-4.29-4.354s1.885-4.353 4.29-4.353c1.104 0 2.014.326 2.794 1.105l2.08-2.08c-1.3-1.17-2.924-1.883-4.874-1.883C3.65 4.586.4 7.835.4 11.8s3.25 7.212 7.214 7.212c4.224 0 6.953-2.988 6.953-7.082 0-.52-.065-1.104-.13-1.624H7.614z"/></svg>
                                </span>
                            <span class="rrssb-text">google+</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div id="sidebar" class="sidebar col-sm-4 col-md-4">
                <aside class="widget menu">
                    <header class="page-header">
                        <h3 class="title">Latest News Events</h3>
                    </header>
                    <!-- <nav class="mb30">
                        <ul>
                            @foreach($latest as $l)
                                <li><a href="{{ URL::to('event/'.$l->slug) }}" class="active">{{ $l->title }}</a></li>
                            @endforeach
                        </ul>
                    </nav> -->
                    <nav class="mb30">
                        <ul>
                            @foreach($latest as $l)
                                <li class="parent"><a href="{{ URL::to('event/'.$l->slug) }}"><span class="open-sub bgLightBlue"></span>{{ $l->title }}</a></li>
                            @endforeach
                        </ul>
                    </nav>
                </aside>
            </div>
        </div>
    </div><!-- .container -->

</section>
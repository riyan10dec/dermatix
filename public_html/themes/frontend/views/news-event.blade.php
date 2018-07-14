<?php
Theme::breadcrumb()
        ->add('Home', URL::to('/'))
        ->add('News & Events', URL::to('news-update'));
?>
<!-- <section id="up-events">
    <header class="page-header">
        <div class="container">
            <h1 class="title">Upcoming Events</h1>
        </div>
    </header>
    <div class="container">
        <article class="content col-sm-12 col-md-12">
            <div class="row">
                <article class="post col-sm-6 col-md-6">
                    <div class="row">
                        <div class="col-sm-4 post-tmbn">
                            <img src="{{ uploads_path('updates-img-1.jpg') }}" alt="" class="img-circle">
                        </div>
                        <div class="col-sm-8">
                            <h2 class="entry-title"><a href="{{ URL::to('upcoming-event') }}">Excepteur sint occaecat cupidatat</a></h2>
                            <div class="entry-content">
                                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                <div class="read-more">
                                    <a href="{{ URL::to('upcoming-event') }}">Baca Selengkapnya<img src="{{ assets_path('images/btn-readmore.png') }}" alt=""></a>
                                </div>
                            </div>
                            <footer class="entry-meta">
                                <span class="time">03.11.2012</span>
                                <span class="separator">|</span>
                                <span class="meta">Posted in <a href="#">Scar</a>, <a href="#">Activity</a></span>
                            </footer>
                        </div>
                    </div>
                </article>
                <article class="post col-sm-6 col-md-6">
                    <div class="row">
                        <div class="col-sm-4 post-tmbn">
                            <img src="{{ uploads_path('updates-img-2.jpg') }}" alt="" class="img-circle">
                        </div>
                        <div class="col-sm-8">
                            <h2 class="entry-title"><a href="{{ URL::to('upcoming-event') }}">Excepteur sint occaecat cupidatat</a></h2>
                            <div class="entry-content">
                                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                <div class="read-more">
                                    <a href="{{ URL::to('upcoming-event') }}">Baca Selengkapnya<img src="{{ assets_path('images/btn-readmore.png') }}" alt=""></a>
                                </div>
                            </div>
                            <footer class="entry-meta">
                                <span class="time">03.11.2012</span>
                                <span class="separator">|</span>
                                <span class="meta">Posted in <a href="#">Scar</a>, <a href="#">Activity</a></span>
                            </footer>
                        </div>
                    </div>
                </article>
            </div>
            <div class="row">
                <article class="post col-sm-6 col-md-6">
                    <div class="row">
                        <div class="col-sm-4 post-tmbn">
                            <img src="{{ uploads_path('updates-img-3.jpg') }}" alt="" class="img-circle">
                        </div>
                        <div class="col-sm-8">
                            <h2 class="entry-title"><a href="{{ URL::to('upcoming-event') }}">Excepteur sint occaecat cupidatat</a></h2>
                            <div class="entry-content">
                                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                <div class="read-more">
                                    <a href="{{ URL::to('upcoming-event') }}">Baca Selengkapnya<img src="{{ assets_path('images/btn-readmore.png') }}" alt=""></a>
                                </div>
                            </div>
                            <footer class="entry-meta">
                                <span class="time">03.11.2012</span>
                                <span class="separator">|</span>
                                <span class="meta">Posted in <a href="#">Scar</a>, <a href="#">Activity</a></span>
                            </footer>
                        </div>
                    </div>
                </article>
                <article class="post col-sm-6 col-md-6">
                    <div class="row">
                        <div class="col-sm-4 post-tmbn">
                            <img src="{{ uploads_path('updates-img-1.jpg') }}" alt="" class="img-circle">
                        </div>
                        <div class="col-sm-8">
                            <h2 class="entry-title"><a href="{{ URL::to('upcoming-event') }}">Excepteur sint occaecat cupidatat</a></h2>
                            <div class="entry-content">
                                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                <div class="read-more">
                                    <a href="{{ URL::to('upcoming-event') }}">Baca Selengkapnya<img src="{{ assets_path('images/btn-readmore.png') }}" alt=""></a>
                                </div>
                            </div>
                            <footer class="entry-meta">
                                <span class="time">03.11.2012</span>
                                <span class="separator">|</span>
                                <span class="meta">Posted in <a href="#">Scar</a>, <a href="#">Activity</a></span>
                            </footer>
                        </div>
                    </div>
                </article>
            </div>
            <div class="pagination-box text-center">
                <ul class="pagination">
                    <li class="disabled"><span>«</span></li>
                    <li class="active"><span>1</span></li>
                    <li><a href="http://localhost:8000/news-update?page=2">2</a></li>
                    <li><a href="http://localhost:8000/news-update?page=2" rel="next">»</a></li>   
                </ul>
            </div>
        </article>
    </div>
</section> -->
<div class="container">
    <div class="row">
      <a target="_blank" href="{{ URL::to('scarpersonality') }}">
        <img src="{{ assets_path('images/new.jpg') }}" alt="">
      </a>
    </div>
</div>    
<section id="news">
    <header class="page-header">
        <div class="container">
            <h1 class="title">News</h1>
        </div>
    </header>
    <div class="container">
      <!-- ini untuk hardcode nambahin news nya -->
        <article class="content col-xs-12">
          <div class="row">
            <article class="post col-sm-6 col-md-6">
                <div class="row">
                  <div class="col-sm-4 post-tmbn">
                      <img src="{{ URL::to('system/App/Modules/Events/Models/Event/images/000/000/020/thumb/luka_bakars.jpg') }}" alt="" class="img-circle">
                  </div>
                  <div class="col-sm-8">
                      <h2 class="entry-title"><a href="{{ URL::to('luka-bakar-mengintai') }}">Luka Bakar Mengintai di Sekitar Kita</a></h2>
                      <div class="entry-content">
                          <footer class="entry-meta">
                              <span class="time">09 September 2015, Bali, Indonesia.</span>
                          </footer>
                          <div class="read-more">
                              <a href="{{ URL::to('luka-bakar-mengintai/') }}">Baca Selengkapnya<img src="{{ assets_path('images/btn-readmore.png') }}" alt=""></a>
                          </div>
                      </div>
                  </div>
                </div>
              </article>
            <article class="post col-sm-6 col-md-6">
                <div class="row">
                  <div class="col-sm-4 post-tmbn">
                      <img src="{{ URL::to('system/App/Modules/Events/Models/Event/images/000/000/016/thumb/%20Press%20Conference.jpg') }}" alt="" class="img-circle">
                  </div>
                  <div class="col-sm-8">
                      <h2 class="entry-title"><a href="{{ URL::to('press-conference') }}">Press Conference : The 17th Annual Scientific Meeting of Indonesia</a></h2>
                      <div class="entry-content">
                          <footer class="entry-meta">
                              <span class="time">02 Mei 2015, Jakarta, Indonesia.</span>
                          </footer>
                          <div class="read-more">
                              <a href="{{ URL::to('press-conference/') }}">Baca Selengkapnya<img src="{{ assets_path('images/btn-readmore.png') }}" alt=""></a>
                          </div>
                      </div>
                  </div>
                </div>
              </article>
              
            </div>
            <!-- <div class="row">
                @foreach($events as $event)
                    <article class="post col-sm-6 col-md-6">
                    <div class="row">
                        <div class="col-sm-4 post-tmbn">
                            <img src="{{ $event->image->url('thumb') }}" alt="" class="img-circle">
                        </div>
                        <div class="col-sm-8">
                            <h2 class="entry-title"><a href="{{ URL::to('event/'.$event->slug) }}">{{ $event->title }}</a></h2>
                            <div class="entry-content">
                                <footer class="entry-meta">
                                    <span class="time">{{ date('d F Y', strtotime($event->date)).', '.$event->city }}, {{ $event->country }}.</span>
                                </footer>
                                <div class="read-more">
                                    <a href="{{ URL::to('event/'.$event->slug) }}">Baca Selengkapnya<img src="{{ assets_path('images/btn-readmore.png') }}" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
                @endforeach
            </div> -->
            <!-- <div class="pagination-box text-center">
                {{ $events->links() }}
            </div> -->
        </article>
    </div><!-- .container -->
</section>

<section id="events">
    <header class="page-header">
        <div class="container">
            <h1 class="title">Events</h1>
        </div>
    </header>
    <div class="container">
        <article class="content col-xs-12">
            <div class="row">
                @foreach($events as $event)
                    <article class="post col-sm-6 col-md-6">
                    <div class="row">
                        <div class="col-sm-4 post-tmbn">
                            <img src="{{ $event->image->url('thumb') }}" alt="" class="img-circle">
                        </div>
                        <div class="col-sm-8">
                            <h2 class="entry-title"><a href="{{ URL::to('event/'.$event->slug) }}">{{ $event->title }}</a></h2>
                            <div class="entry-content">
                                <footer class="entry-meta">
                                    <span class="time">{{ date('d F Y', strtotime($event->date)).', '.$event->city }}, {{ $event->country }}.</span>
                                </footer>
                                <div class="read-more">
                                    <a href="{{ URL::to('event/'.$event->slug) }}">Baca Selengkapnya<img src="{{ assets_path('images/btn-readmore.png') }}" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
                @endforeach
            </div>
            <div class="pagination-box text-center">
                {{ $events->links() }}
            </div>
        </article>
    </div><!-- .container -->
</section>
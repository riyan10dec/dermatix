<?php
Theme::breadcrumb()
        ->add('Home', URL::to('/'))
        ->add('News & Update', URL::to('news-update'))
        ->add('Luka Bakar Mengintai di Sekitar Kita', URL::to('luka-bakar-mengintai'));
?>
<section id="detail-up-events">
    <header class="page-header">
        <div class="container">
            <h1 class="title">Luka Bakar Mengintai di Sekitar Kita</h1>
        </div>
    </header>
    <div class="container">
        <div class="row">
            <div class="content blog blog-post col-sm-8 col-md-8">
                <div class="desc-event row">
                    <div class="col-xs-12">
                        <ul>
                            <li>
                                <strong id="strongChangeMobile_place" class="width20">Tempat</strong>
                                <span id="saperateChangeMobile_place" class="saperate width5">:</span>
                                <span id="desc-liChangeMobile_place"  class="desc-li width75">Bali</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <img src="{{ URL::to('uploads/events/luka_bakar.jpg') }}" alt="" class="img-responsive">
            </div>
            <div id="sidebar" class="sidebar col-sm-4 col-md-4">
                <aside class="widget menu">
                    <header class="page-header">
                        <h3 class="title">Latest News Event</h3>
                    </header>
                    <nav class="mb30">
                        <ul>
                            <li class="parent"><a href="http://dermatix.manifesto.co.id/event/media-workshop-1"><span class="open-sub bgLightBlue"></span>Media Workshop I</a></li>
                            <li class="parent"><a href="http://dermatix.manifesto.co.id/event/kogi"><span class="open-sub bgLightBlue"></span>KOGI 2012</a></li>
                            <li class="parent"><a href="http://dermatix.manifesto.co.id/event/media-workshop"><span class="open-sub bgLightBlue"></span>Hospital Media Workshop</a></li>
                            <li class="parent"><a href="http://dermatix.manifesto.co.id/event/asian"><span class="open-sub bgLightBlue"></span>ASIAN SCAR FORUM 2013</a></li>
                            <li class="parent"><a href="http://dermatix.manifesto.co.id/event/hospital"><span class="open-sub bgLightBlue"></span>Hospital Roadshow 2013</a></li>
                            <li class="parent"><a href="http://dermatix.manifesto.co.id/event/aocog"><span class="open-sub bgLightBlue"></span>AOCOG stands for Asian & Oceanic Congress</a></li>
                        </ul>
                    </nav>
                </aside>
            </div>
        </div>
    </div><!-- .container -->
</section>
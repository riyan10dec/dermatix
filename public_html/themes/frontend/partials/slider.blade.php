<div class="slider rs-slider load">
    <div class="tp-banner-container">
        <div class="tp-banner">
            <ul>
                <!-- <li data-delay="10000" data-transition="fade" data-slotamount="7" data-masterspeed="2000" class="slid2">
                    <div class="elements">
                        <div class="tp-caption lfl skewtoleft description col-xs-5"
                             data-x="0"
                             data-y="189"
                             data-speed="1000"
                             data-start="1000"
                             data-easing="Power4.easeOut"
                             data-endspeed="400"
                             data-endeasing="Power1.easeIn"
                             style="max-width: 380px; padding:20px;">
                            <p>"Untung Donna kasih Dermatix,
                                kini bekas luka bakarku
                                sudah memudar"</p>
                            <p class="subtitle-slider">Cynthia Lamusu - penyanyi</p>
                        </div>
                        <a href="{{ URL::to('talk-about-scar') }}#stories"
                           class="btn btn-primary tp-caption customin slider-t"
                           data-x="15"
                           data-y="332"
                           data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                           data-speed="1200"
                           data-start="1000"
                           data-easing="Power3.easeInOut"
                           data-endspeed="300"
                           style="z-index: 5">
                            Lihat Lainnya >>
                        </a>
                    </div>
                    <img class="replace-2x" src="{{ uploads_path('slider/rs-slider2-bg-dermatix.jpg') }}" alt="" data-bgfit="cover" data-bgposition="center top" data-bgrepeat="no-repeat">
                </li> -->
                <!-- <li data-delay="10000" data-transition="fade" data-slotamount="7" data-masterspeed="2000" class="slid2">
                    <div class="elements">

                        <div class="tp-caption lfl skewtoleft description col-xs-5"
                             data-x="0"
                             data-y="189"
                             data-speed="1000"
                             data-start="1000"
                             data-easing="Power4.easeOut"
                             data-endspeed="400"
                             data-endeasing="Power1.easeIn"
                             style="max-width: 380px; padding:20px;">
                            <p>"Aku selebriti, tapi juga seorang ibu"</p>
                            <p class="subtitle-slider">Donna Agnesia pakai Dermatix untuk atasi luka bekas caesar</p>
                        </div>

                        <a href="{{ URL::to('talk-about-scar') }}#stories"
                           class="btn btn-primary tp-caption customin slider-t"
                           data-x="15"
                           data-y="332"
                           data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                           data-speed="1200"
                           data-start="1000"
                           data-easing="Power3.easeInOut"
                           data-endspeed="300"
                           style="z-index: 5">
                            Lihat Lainnya >>
                        </a>
                    </div>

                    <img class="replace-2x" src="{{ uploads_path('slider/rs-slider2-bg-dermatix-2.jpg') }}" alt="" data-bgfit="cover" data-bgposition="center top" data-bgrepeat="no-repeat">
                </li> -->
                <!-- <li data-delay="10000" data-transition="fade" data-slotamount="7" data-masterspeed="2000" class="slid2">
                  <a target="_blank" href="{{ URL::to('scargame') }}">
                    <img style="width:100%;height:auto" class="replace-2x" src="{{ assets_path('images/1.jpg') }}">
                  </a>
                </li> -->
                <!-- <li data-delay="10000" data-transition="fade" data-slotamount="7" data-masterspeed="2000" class="slid2">
                  <a target="_blank" href="{{ URL::to('scargame') }}">
                    <img style="width:100%;height:auto" class="replace-2x" src="{{ assets_path('images/scargame.jpg') }}">
                  </a>
                </li>
                <li data-delay="10000" data-transition="fade" data-slotamount="7" data-masterspeed="2000" class="slid2">
                  <a target="_blank" href="{{ URL::to('videocompetition') }}">
                    <img style="width:100%;height:auto" class="replace-2x" src="{{ assets_path('images/videocomp.jpg') }}">
                  </a>
                </li>
                <li data-delay="10000" data-transition="fade" data-slotamount="7" data-masterspeed="2000" class="slid2">
                  <a target="_blank" href="{{ URL::to('scarpersonality') }}">
                    <img style="width:100%;height:auto" class="replace-2x" src="{{ assets_path('images/banner-scar.jpg') }}">
                  </a>
                </li> -->
                <li data-delay="10000" data-transition="fade" data-slotamount="7" data-masterspeed="2000" class="slid2">
                  <a target="_blank" href="{{ URL::to('scarpersonality') }}">
                    <img style="width:100%;height:auto" src="{{ assets_path('images/2.jpg') }}">
                  </a>
                </li>
                <li data-delay="10000" data-transition="fade" data-slotamount="7" data-masterspeed="2000" class="slid2">
                  <a target="_blank" href="{{ URL::to('scarpersonality') }}">
                    <img style="width:100%;height:auto" src="{{ assets_path('images/3.jpg') }}">
                  </a>
                </li>
                <li data-delay="10000" data-transition="fade" data-slotamount="7" data-masterspeed="2000" class="slid2">
                  <a target="_blank" href="{{ URL::to('scarpersonality') }}">
                    <img style="width:100%;height:auto" src="{{ assets_path('images/4.jpg') }}">
                  </a>
                </li>
                <li data-delay="10000" data-transition="fade" data-slotamount="7" data-masterspeed="2000" class="slid2">
                  <a target="_blank" href="{{ URL::to('scarpersonality') }}">
                    <img style="width:100%;height:auto" src="{{ assets_path('images/5.jpg') }}">
                  </a>
                </li>
                @foreach($banners as $banner)
                    @if($banner->type == 'video')
                        <li data-delay="30000" data-transition="fade" data-slotamount="7" data-masterspeed="2000" class="slid2">
                            <div class="tp-caption sft customout tp-videolayer"
                                 data-x="center" data-hoffset="134"
                                 data-y="center" data-voffset="-6"
                                 data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:5;scaleY:5;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                 data-speed="600"
                                 data-start="1000"
                                 data-easing="Power4.easeOut"
                                 data-endspeed="500"
                                 data-endeasing="Power4.easeOut"
                                 data-autoplay="false"
                                 data-autoplayonlyfirsttime="false"
                                 data-nextslideatend="true"
                                 data-ytid="{{ $banner->youtubeID() }}"
                                 data-videoattributes="enablejsapi=1&html5=1&hd=1&wmode=opaque&controls=1&showinfo=0&rel=0"
                                 data-videowidth="640"
                                 data-videoheight="360"
                                 style="z-index: 8">
                            </div>
                        </li>
                    @else
                        <li data-delay="10000" data-transition="fade" data-slotamount="7" data-masterspeed="2000" class="slid2">
                            <div class="elements">

                                <div class="tp-caption lfl skewtoleft description col-xs-5"
                                     data-x="0"
                                     data-y="189"
                                     data-speed="1000"
                                     data-start="1000"
                                     data-easing="Power4.easeOut"
                                     data-endspeed="400"
                                     data-endeasing="Power1.easeIn"
                                     style="max-width: 410px; padding:20px;">
                                    <p>"{{ $banner->title }}"</p>
                                    <p class="subtitle-slider">{{ $banner->desc }}</p>
                                </div>

                                <a href="{{ URL::to($banner->link) }}#stories"
                                   class="btn btn-primary tp-caption customin slider-t"
                                   data-x="15"
                                   data-y="332"
                                   data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                   data-speed="1200"
                                   data-start="1000"
                                   data-easing="Power3.easeInOut"
                                   data-endspeed="300"
                                   style="z-index: 5">
                                    Lihat Lainnya >>
                                </a>
                            </div>

                            <img class="replace-2x" src="{{ $banner->image->url('large') }}" alt="" data-bgfit="cover" data-bgposition="center top" data-bgrepeat="no-repeat">
                        </li>
                    @endif
                @endforeach
                {{--<li data-delay="30000" data-transition="fade" data-slotamount="7" data-masterspeed="2000" class="slid2">--}}
                  {{--<div class="tp-caption sft customout tp-videolayer"--}}
                    {{--data-x="center" data-hoffset="134"--}}
                    {{--data-y="center" data-voffset="-6"--}}
                    {{--data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:5;scaleY:5;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"--}}
                    {{--data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"--}}
                    {{--data-speed="600"--}}
                    {{--data-start="1000"--}}
                    {{--data-easing="Power4.easeOut"--}}
                    {{--data-endspeed="500"--}}
                    {{--data-endeasing="Power4.easeOut"--}}
                    {{--data-autoplay="false"--}}
                    {{--data-autoplayonlyfirsttime="false"--}}
                    {{--data-nextslideatend="true"--}}
                    {{--data-ytid="PQ3LReNLPuw"--}}
                    {{--data-videoattributes="enablejsapi=1&html5=1&hd=1&wmode=opaque&controls=1&showinfo=0&rel=0"--}}
                    {{--data-videowidth="640"--}}
                    {{--data-videoheight="360"--}}
                    {{--style="z-index: 8">--}}
                  {{--</div>--}}
                {{--</li>--}}
                {{--<li data-delay="10000" data-transition="fade" data-slotamount="7" data-masterspeed="2000" class="slid2">--}}
                    {{--<div class="elements">--}}

                        {{--<div class="tp-caption lfl skewtoleft description col-xs-5"--}}
                             {{--data-x="0"--}}
                             {{--data-y="189"--}}
                             {{--data-speed="1000"--}}
                             {{--data-start="1000"--}}
                             {{--data-easing="Power4.easeOut"--}}
                             {{--data-endspeed="400"--}}
                             {{--data-endeasing="Power1.easeIn"--}}
                             {{--style="max-width: 380px; padding:20px;">--}}
                            {{--<p>"Bekas luka tak lagi membuat canggung saat merias diri"</p>--}}
                            {{--<p class="subtitle-slider">Dengan Dermatix, bekas luka tersamarkan dan Anda pun bebas berekspresi.</p>--}}
                        {{--</div>--}}

                        {{--<a href="{{ URL::to('talk-about-scar') }}#stories"--}}
                           {{--class="btn btn-primary tp-caption customin slider-t"--}}
                           {{--data-x="15"--}}
                           {{--data-y="332"--}}
                           {{--data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"--}}
                           {{--data-speed="1200"--}}
                           {{--data-start="1000"--}}
                           {{--data-easing="Power3.easeInOut"--}}
                           {{--data-endspeed="300"--}}
                           {{--style="z-index: 5">--}}
                            {{--Lihat Lainnya >>--}}
                        {{--</a>--}}
                    {{--</div>--}}

                    {{--<img class="replace-2x" src="{{ uploads_path('slider/catok.jpg') }}" alt="" data-bgfit="cover" data-bgposition="center top" data-bgrepeat="no-repeat">--}}
                {{--</li>--}}
                {{--<li data-delay="10000" data-transition="fade" data-slotamount="7" data-masterspeed="2000" class="slid2">--}}
                    {{--<div class="elements">--}}
                        {{--<div class="tp-caption lfl skewtoleft description col-xs-5"--}}
                             {{--data-x="0"--}}
                             {{--data-y="189"--}}
                             {{--data-speed="1000"--}}
                             {{--data-start="1000"--}}
                             {{--data-easing="Power4.easeOut"--}}
                             {{--data-endspeed="400"--}}
                             {{--data-endeasing="Power1.easeIn"--}}
                             {{--style="max-width: 380px; padding:20px;">--}}
                            {{--<p>"Tunjukkan cinta-kasih Anda untuk kebaikan si kecil"</p>--}}
                            {{--<p class="subtitle-slider">Sekarang, Anda tak perlu khawatir dengan bekas luka C-section. Rawat dan percayakan pada ahlinya, Dermatix.</p>--}}
                        {{--</div>--}}
                        {{--<a href="{{ URL::to('talk-about-scar') }}#stories"--}}
                           {{--class="btn btn-primary tp-caption customin slider-t"--}}
                           {{--data-x="15"--}}
                           {{--data-y="332"--}}
                           {{--data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"--}}
                           {{--data-speed="1200"--}}
                           {{--data-start="1000"--}}
                           {{--data-easing="Power3.easeInOut"--}}
                           {{--data-endspeed="300"--}}
                           {{--style="z-index: 5">--}}
                            {{--Lihat Lainnya >>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                    {{--<img class="replace-2x" src="{{ uploads_path('slider/ibu_dermatix.jpg') }}" alt="" data-bgfit="cover" data-bgposition="center top" data-bgrepeat="no-repeat">--}}
                {{--</li>--}}
                {{--<li data-delay="10000" data-transition="fade" data-slotamount="7" data-masterspeed="2000" class="slid2">--}}
                    {{--<div class="elements">--}}

                        {{--<div class="tp-caption lfl skewtoleft description col-xs-5"--}}
                             {{--data-x="0"--}}
                             {{--data-y="189"--}}
                             {{--data-speed="1000"--}}
                             {{--data-start="1000"--}}
                             {{--data-easing="Power4.easeOut"--}}
                             {{--data-endspeed="400"--}}
                             {{--data-endeasing="Power1.easeIn"--}}
                             {{--style="max-width: 380px; padding:20px;">--}}
                            {{--<p>"Hobi memasak untuk keluarga pun lebih menyenangkan, tanpa khawatir bekas luka."</p>--}}
                        {{--</div>--}}

                        {{--<a href="{{ URL::to('talk-about-scar') }}#stories"--}}
                           {{--class="btn btn-primary tp-caption customin slider-t"--}}
                           {{--data-x="15"--}}
                           {{--data-y="332"--}}
                           {{--data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"--}}
                           {{--data-speed="1200"--}}
                           {{--data-start="1000"--}}
                           {{--data-easing="Power3.easeInOut"--}}
                           {{--data-endspeed="300"--}}
                           {{--style="z-index: 5">--}}
                            {{--Lihat Lainnya >>--}}
                        {{--</a>--}}
                    {{--</div>--}}

                    {{--<img class="replace-2x" src="{{ uploads_path('slider/masak.jpg') }}" alt="" data-bgfit="cover" data-bgposition="center top" data-bgrepeat="no-repeat">--}}
                {{--</li>--}}
                {{--<li data-delay="10000" data-transition="fade" data-slotamount="7" data-masterspeed="2000" class="slid2">--}}
                    {{--<div class="elements">--}}

                        {{--<div class="tp-caption lfl skewtoleft description col-xs-5"--}}
                             {{--data-x="0"--}}
                             {{--data-y="189"--}}
                             {{--data-speed="1000"--}}
                             {{--data-start="1000"--}}
                             {{--data-easing="Power4.easeOut"--}}
                             {{--data-endspeed="400"--}}
                             {{--data-endeasing="Power1.easeIn"--}}
                             {{--style="max-width: 380px; padding:20px;">--}}
                            {{--<p>"Jangan padamkan hobi Anda karena takut bekas luka!"</p>--}}
                            {{--<p class="subtitle-slider">Dengan Dermatix, Anda bebas lakukan olahraga apa pun tanpa perlu khawatir dengan luka yang membekas.</p>--}}
                        {{--</div>--}}

                        {{--<a href="{{ URL::to('talk-about-scar') }}#stories"--}}
                           {{--class="btn btn-primary tp-caption customin slider-t"--}}
                           {{--data-x="15"--}}
                           {{--data-y="332"--}}
                           {{--data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"--}}
                           {{--data-speed="1200"--}}
                           {{--data-start="1000"--}}
                           {{--data-easing="Power3.easeInOut"--}}
                           {{--data-endspeed="300"--}}
                           {{--style="z-index: 5">--}}
                            {{--Lihat Lainnya >>--}}
                        {{--</a>--}}
                    {{--</div>--}}

                    {{--<img class="replace-2x" src="{{ uploads_path('slider/sepeda_dermatix2.jpg') }}" alt="" data-bgfit="cover" data-bgposition="center top" data-bgrepeat="no-repeat">--}}
                {{--</li>          --}}
            </ul>
            <div class="tp-bannertimer"></div>
        </div>
        <div class="tp-bullets simplebullets round" style="bottom: 20px; left: 50%; margin-left: -42px;"></div>
    </div>
</div>
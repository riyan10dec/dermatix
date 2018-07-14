<?php Theme::set('slider', true); ?>

<div id="about">
    <div class="bg-content-about">
        <div class="container">
            <div class="row">

                <div class="col-sm-8" data-appear-animation="fadeInDown">
                    <h1 class="title-updates text-left">Get to know Dermatix<sup>&reg;</sup> Ultra Better</h1>

                    <div class="col-sm-6 col-xs-12 nopadleft"><img src="{{ uploads_path('pack_derma.png') }}" alt="Dermatix"></div>

                    <div class="col-sm-6 nopadleft text-justify">
                        Dermatix<sup>&reg;</sup> Ultra adalah inovasi terbaru formula perawatan bekas luka, yang terbukti efektif memudarkan, meratakan, dan menghaluskan bekas luka menonjol. Mengandung formula inovatif CPX technology dan Vitamin C Ester, melindungi kulit dari UVA dan UVB serta menyamarkan hiperpigmentasi. Memiliki kandungan anti iritasi dengan PH netral
                        <div class="clearfix"></div><br>
                        <div class="read-more">
                            <a href="{{ URL::to('identify-dermatix') }}#article-about-derma">Baca Selengkapnya<img src="{{ assets_path('images/btn-readmore.png') }}" alt=""></a>
                        </div>
                    </div>
                </div><!-- .services-box-two -->

                <div class="col-sm-4">
                    <h1 class="title-updates text-left fz-location">Dapatkan Dermatix di Lokasi berikut :</h1>
                    <!-- <h4 class="title-updates-h4">Dapatkan Deramtix di Lokasi berikut :</h4> -->
                    <div class="wtf mt-20" data-appear-animation="fadeInDown">
                        <div class="wtf-form">
                            {{ Form::select('city', $cities, Input::old('city'), ['class'=>'form-control city without-styles', 'data-plugin-selectTwo']) }}

                            {{--<a href="{{ URL::to('where-to-find') }}">--}}
                                {{--<input type="submit" class="btn btn-primary btn-sm">--}}
                            {{--</a>--}}
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div><!-- .services-box-two -->
            </div>
        </div>
    </div>
</div>
<div id="updates">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="title-updates text-center">Updates</h1>
            </div>
            @foreach($updates as $update)
                <div class="update_i col-sm-4">
                    <div class="big-icon bg animated wobble" data-appear-animation="wobble">
                        <img src="{{ $update->image->url('thumb') }}" alt="" class="img-circle img-100">
                    </div>
                    <h4 class="title title-updates-h4 animated bounceInLeft" data-appear-animation="bounceInLeft">{{ $update->title }}</h4>
                    <div class="text-small animated bounceInLeft home-article-pt" data-appear-animation="bounceInLeft">
                        <p class="content-of-title-updates">
                            {{ tagline($update->body, 120) }}
                        </p>
                        <div class="clearfix"></div><br>
                        <div class="read-more">
                            <a href="{{ URL::to('article/'.$update->slug) }}">Baca Selengkapnya<img src="{{ assets_path('images/btn-readmore.png') }}" alt=""></a>
                        </div>
                    </div>
                </div><!-- .services-box-two -->
            @endforeach
        </div>
    </div>

    <script>
        $(document).ready(function(){
            var url = "{{ URL::to('where-to-find') }}";
            $('.city').on('change', function () {
                window.location = url + '?city=' + $(this).val();
            });
        });
    </script>

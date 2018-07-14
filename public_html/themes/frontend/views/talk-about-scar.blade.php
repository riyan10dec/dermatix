<?php
Theme::breadcrumb()
        ->add('Home', URL::to('/'))
        ->add('Talk About Scar', URL::to('talk-about-scar'));
?>
<div class="container">
    <div class="row">
      <a target="_blank" href="{{ URL::to('scarpersonality') }}">
        <img src="{{ assets_path('images/talk-about-scars.jpg') }}" alt="">
      </a>
    </div>
    <section id="articles" class="content col-sm-6 col-md-6 p-x-y_verySmall">
        <header class="page-header">
            <h1 class="title">Articles About Scar</h1>
        </header>
        <div class="row">
            <div class="container-fluid">
                <div class="content blog">
                    @foreach($articles as $article)
                        <article class="post">
                            <div class="row">
                                <div class="col-sm-4 post-tmbn">
                                    <img src="{{ $article->image->url('thumb') }}" alt="" class="img-circle imgAuto">
                                </div>
                                <div class="col-sm-8">
                                    <h2 class="entry-title"><a href="{{ URL::to('article/'.$article->slug) }}">{{ $article->title }}</a></h2>
                                    <footer class="entry-meta">
                                        <span class="time">{{ date('d.m.Y', strtotime($article->created_at)) }}</span>
                                        <!-- <span class="separator">|</span>
                                        <span class="meta">Posted in <a href="#">Scar</a>, <a href="#">Activity</a></span> -->
                                    </footer>
                                    <div class="entry-content">
                                        {{ tagline($article->body, 130) }}
                                        <div class="read-more mt-20">
                                            <a href="{{ URL::to('article/'.$article->slug) }}">Baca Selengkapnya<img src="{{ assets_path('images/btn-readmore.png') }}" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article><!-- .post -->
                    @endforeach
                    <a href="{{ URL::to('article-scar') }}" style="display:block; text-align:center;">
                        <input type="submit" value="Baca artikel lainnya" class="btn btn-primary btn-sm">
                    </a>
                </div><!-- .content -->
            </div>
        </div>
    </section>

    <section id="stories" class="content col-sm-6 p-x-y_verySmall">
        <header class="page-header">
            <h1 class="title">Scar Stories</h1>
        </header>
        <div class="row">
            @foreach($stories as $story)
                <div class="container-fluid">
                    <div class="content blog">
                        <article class="post mb0">
                            <div class="row">
                                <div class="col-sm-4 post-tmbn">
                                    <img src="{{ $story->image->url('thumb') }}" alt="" class="img-circle imgAuto img-100">
                                </div>
                                <div class="col-sm-8">
                                    <h2 class="entry-title"><a href="{{ URL::to('story/'.$story->slug) }}">{{ $story->title }}</a></h2>
                                    <div class="entry-content">
                                        {{ tagline($story->body, 140) }}
                                        <div class="read-more mt-20">
                                            <a href="{{ URL::to('story/'.$story->slug) }}">Baca Selengkapnya<img src="{{ assets_path('images/btn-readmore.png') }}" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article> <!-- .post -->
                    </div><!-- .content -->
                </div>
            <!-- <div class="col-xs-4 product post-tmbn"> -->
                <!-- <a href="{{ URL::to('story/'.$story->slug) }}">
                    <img src="{{ $story->image->url('thumb') }}" alt="" class="" width="270" height="270">
                </a> -->
                <!-- <div class="product-description">
                    <div class="vertical">
                        <h3 class="product-name">{{ $story->title }}</h3>
                        <div class="read-more">
                            <a href="{{ URL::to('story/'.$story->slug) }}">Baca<img src="{{ assets_path('images/btn-readmore.png') }}" alt=""></a>
                        </div>
                    </div>
                </div> -->
            <!-- </div> --><!-- .product-->
            <!-- <div class="col-xs-4 product post-tmbn">
                <div class="bgTesti"></div>
            </div> -->
            @endforeach
            <div class="col-xs-12">
                <div class="wrapBtnStory_PTAS text-center">
                    <img src="{{ uploads_path('img_btnScar.jpg') }}" class="" alt="">
                    <div class="bgWhite_trans">
                        <a href="{{ URL::to('scar-stories') }}" class="btn btn-primary btn-sm mt-sm20">Baca Cerita Lainnya</a>
                        <a href="#" class="btn btn-primary btn-sm mt-sm20" data-toggle="modal" data-target="#gridSystemModal">Submit Testimoni Anda disini</a>
                    </div>
                </div>
                <div id="gridSystemModal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content text-center">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fa fa-close fa-lg"></i></span>
                          </button>
                          <h4 class="modal-title" id="gridModalLabel">Submit Testimoni Anda</h4>
                        </div>
                        {{ Form::open(array( 'url' => 'testi-user', 'files' => true, 'method' => 'post', 'role' => 'form', 'id' => 'testi-user-form' ) ) }}
                            <div class="modal-body" style="max-height: 500px;overflow-x: hidden;overflow-y: auto;">
                              <div class="container-fluid">
                                    <div class="row">
                                      <div id="imageFileinput_360" class="col-sm-4 col-xs-4">
                                          <div class="wrapForSpan" style="height:65px;max-height:inherit;">
                                              <span class="span-fileinput" style="max-width:80%;">Masukkan foto wajahmu</span>
                                          </div>
                                          {{ Form::file('image', ['class'=>'file-loading', 'id' => 'input-image-1']) }}
                                      </div>
                                      <div id="fc_input" class="col-sm-8 col-xs-8 text-left">
                                        <div class="form-group">
                                            {{ Form::text('title', Input::old('title'), ['class'=>'form-control', 'placeholder'=>'Nama', 'data-slug-converter', 'style'=>'margin-bottom:0;']) }}
                                        </div>  
                                        <div class="slug">
                                            {{ Form::text('slug', Input::old('slug'), ['class'=>'slug-url', 'data-slug', 'readonly']) }}
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6" style="padding-right:5px;">
                                                    {{ Form::text('usia', Input::old('usia'), ['class'=>'form-control', 'placeholder'=>'Usia', 'style'=>'margin-bottom:0;']) }}
                                                </div>
                                                <div class="col-sm-6" style="padding-left:5px;">
                                                    {{ Form::text('kota', Input::old('kota'), ['class'=>'form-control', 'placeholder'=>'Kota', 'style'=>'margin-bottom:0;']) }}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6" style="padding-right:5px;">
                                                    {{ Form::text('email', Input::old('email'), ['class'=>'form-control', 'placeholder'=>'Email *', 'style'=>'margin-bottom:0;']) }}
                                                </div>
                                                <div class="col-sm-6" style="padding-left:5px;">
                                                    {{ Form::text('phone', Input::old('phone'), ['class'=>'form-control', 'placeholder'=>'No Telepon *', 'style'=>'margin-bottom:0;']) }}
                                                </div>
                                            </div>
                                            <small style="display:block;">Email dan No. Telepon tidak akan kami tampilkan dalam website.</small>
                                        </div>
                                        <div class="form-group">
                                            {{ Form::text('pekerjaan', Input::old('pekerjaan'), ['class'=>'form-control', 'placeholder'=>'Pekerjaan', 'style'=>'margin-bottom:0;']) }}
                                        </div>
                                        <!-- <input type="text" class="form-control" placeholder="Nama">
                                        <input type="text" class="form-control width-50 inline" placeholder="Usia">
                                        <input type="text" class="form-control width-50 inline" placeholder="Kota">
                                        <input type="text" class="form-control" placeholder="Pekerjaan"> -->
                                      </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            {{ Form::textarea('body', Input::old('body'), ['class'=>'form-control', 'placeholder'=>'Testimoni Anda', 'data-plugin-redactor']) }}
                                            <!-- <textarea class="form-control" placeholder="Testimoni Anda"></textarea> -->
                                            <small style="margin-bottom: 10px;display: block;">Masukkan foto bekas lukamu, sebelum dan sesudah menggunakan Dermatix. </small>
                                        </div>
                                        <div id="fileinput480" class="col-sm-3 col-xs-3 height-before-after">
                                            <div class="wrapForSpan">
                                                <span class="span-fileinput">Before</span>
                                            </div>
                                            {{ Form::file('before', ['class'=>'file-loading', 'id' => 'input-image-2']) }}
                                        </div>
                                        <div id="fileinput480_2" class="col-sm-3 col-xs-3 height-before-after">
                                            <div class="wrapForSpan">
                                                <span class="span-fileinput">After</span>
                                            </div>
                                            {{ Form::file('after', ['class'=>'file-loading', 'id' => 'input-image-3']) }}
                                        </div>
                                    </div>
                              </div>
                            </div>
                            <div class="modal-footer">
                              {{ Form::submit('Submit', ['class'=>'btn btn-primary btn-sm', 'name'=>'publish']) }}
                              <!-- <button type="button" class="btn btn btn-primary btn-sm">Submit</button> -->
                            </div>
                        {{ Form::close() }}
                      </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>
            </div>
        </div>
    </section>
</div>

<section id="quickfact" class="content">
    <header class="page-header">
        <div class="container">
            <h1 class="title">Quick Facts</h1>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <div class="qf_i col-sm-4 col-md-4">
                <p>
                    <strong>Penyembuhan awal dapat dilihat setelah 12 minggu.</strong> Untuk bekas luka atau goresan besar diperlukan waktu 3 sampai 6 bulan atau lebih untuk melihat hasil dari Dermatix<sup>&reg;</sup> Ultra.
                </p>
            </div>
            <div class="qf_i col-sm-4 col-md-4">
                <p>
                    Untuk memastikan Dermatix<sup>&reg;</sup> Ultra bekerja dengan baik dan merasakan manfaat maksimal, pengobatan harus di lakukan dua kali sehari.
                </p>
            </div>
            <div class="qf_i col-sm-4 col-md-4">
                <p>
                    Dermatix<sup>&reg;</sup> Ultra akan menempel pada kulit dan merawat bekas luka selama 12 jam.
                </p>
            </div>
            <div class="qf_i col-sm-4 col-md-4">
                <p>
                    Jangan gunakan Dermatix<sup>&reg;</sup> Ultra terlalu banyak. Gunakan secukupnya untuk menutupi bekas luka.
                </p>
            </div>
            <div class="qf_i col-sm-4 col-md-4">
                <p>
                    Satu tube 7g Dermatix<sup>&reg;</sup> Ultra dapat digunakan selama 1 bulan dan satu tube 15g Dermatix<sup>&reg;</sup> Ultra dapat digunakan selama 2 bulan pada bekas luka sepanjang 15 cm.
                </p>
            </div>
            <div class="qf_i col-sm-4 col-md-4">
                <p>
                    Sebelum memulai perawatan dengan Dermatix<sup>&reg;</sup> Ultra, ambilah foto luka menonjol anda, ukur panjang dan tinggi bekas luka untuk melihat perkembangannya.
                </p>
            </div>
        </div>
    </div>
</section>

<?php 
    // Writing an in-line script.
    Theme::asset()->container('footer')->writeScript('inline-script', '
        $("#testi-user-form").validate({
            rules: {
                // simple rule, converted to {required:true}
                title: {
                    required: true
                },
                usia: {
                    required: true
                },
                kota: {
                    required: true
                },
                email: {
                  required: true,
                  email: true
                },
                phone: {
                  required: true,
                  number: true
                },
                body: {
                    required: true
                }
            },
            messages: {
                // simple rule, converted to {required:true}
                title: {
                    required: "Masukan nama anda"
                },
                usia: {
                    required: "Masukan usia anda"
                },
                kota: {
                    required: "Masukan kota anda"
                },
                email: {
                  required: "Masukan email anda",
                  email: "Format email harus benar"
                },
                phone: {
                  required: "Masukan No.Telepon anda",
                  number: "No.Telepon harus menggunakan angka"
                },
                body: {
                    required: "Masukan testimoni anda"
                }
            }
        });
    ');
?>
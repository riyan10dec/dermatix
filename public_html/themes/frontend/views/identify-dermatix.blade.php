<?php
Theme::breadcrumb()
        ->add('Home', URL::to('/'))
        ->add('About Dermatix Ultra', URL::to('identify-dermatix'));
?>
<div class="container">
	 <div class="row">
      <a target="_blank" href="{{ URL::to('scarpersonality') }}">
        <img src="{{ assets_path('images/identify-dermatix.jpg') }}" alt="">
      </a>
    </div>
    <section id="article-about-derma">
        <header class="page-header">
            <div class="container">
                <h1 class="title">Apa Itu Dermatix<sup>&reg;</sup> Ultra</h1>
            </div>
        </header>
        <div class="col-sm-6 col-xs-12">
            <img src="{{ uploads_path('pack_derma.png') }}" alt="">
            <div id="mobile360_imgTech" class="col-sm-6 col-xs-6">
                <img src="{{ uploads_path('formula_cpx.png') }}" alt="">
            </div>
            <div id="mobile360_imgTech2" class="col-sm-6 col-xs-6">
                <img src="{{ uploads_path('formula_cester.png') }}" alt="">
            </div>
        </div>
        <div class="col-sm-6 col-xs-12">
            <p class="text-justify mt-50">
                Dermatix<sup>&reg;</sup> Ultra adalah gel topikal terbaru yang digunakan dan direkomendasikan oleh para ahli bedah, dermatologis dan obgyn terkemuka di dunia, untuk mengatasi bekas luka menonjol.
            </p>
            <p class="text-justify">
                Dermatix<sup>&reg;</sup> Ultra sudah terbukti secara klinis bisa menyamarkan dan meratakan bekas luka menonjol, serta menghilangkan gatal dan ketidaknyamanan. Dermatix<sup>&reg;</sup> Ultra sangat mudah dipakai pada tubuh, termasuk wajah, sendi dan bagian lainya. Tersedia dalam kemasan tube 15g dan 7g dan dapat diperoleh dengan atau tanpa resep dokter.
            </p>
        </div>
        <div class="clearfix"></div>
            <!-- <div class="col-md-3 col-sm-6 col-xs-12 mt-30 ml-15 video640">
                <a class="popup-youtube" href="https://www.youtube.com/watch?v=MHbZZ-rR6d4">
                    <img src="{{ uploads_path('video-1.jpg') }}" class="img-circle imgY img-responsive" alt="" style="max-width:200px;height:auto!important;min-height:200px;">
                    <i class="fa fa-youtube-play fa-4x"></i>
                </a>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 mt-30 ml-15 video640">
                <a class="popup-youtube" href="https://www.youtube.com/watch?v=VEhb0DgdPQo">
                    <img src="{{ uploads_path('video-2.jpg') }}" alt="" class="img-circle imgY img-responsive" style="max-width:200px;height:auto!important;min-height:200px;">
                    <i class="fa fa-youtube-play fa-4x"></i>
                </a>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 mt-30 ml-15 video640">
                <a class="popup-youtube" href="https://www.youtube.com/watch?v=FSYKamDtw5s">
                    <img src="{{ uploads_path('video-3.jpg') }}" alt="" class="img-circle imgY img-responsive" style="max-width:200px;height:auto!important;min-height:200px;">
                    <i class="fa fa-youtube-play fa-4x"></i>
                </a>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 mt-30 ml-15 video640">
                <a class="popup-youtube" href="https://www.youtube.com/watch?v=FSYKamDtw5s">
                    <img src="{{ uploads_path('video-3.jpg') }}" alt="" class="img-circle imgY img-responsive" style="max-width:200px;height:auto!important;min-height:200px;">
                    <i class="fa fa-youtube-play fa-4x"></i>
                </a>
            </div> -->
            <div class="col-md-12 col-sm-12 col-xs-12 mt-30 ml-15 video640">
                <a class="popup-youtube" href="https://www.youtube.com/watch?v=PQ3LReNLPuw">
                    <img src="{{ uploads_path('video-1.jpg') }}" class="img-circle imgY img-responsive" alt="" style="max-width:200px;height:auto!important;min-height:200px;">
                    <i class="fa fa-youtube-play fa-4x"></i>
                </a>
            </div>
    </section>

    <section id="excellence">
        <header class="page-header">
            <div class="container">
                <h1 class="title">Keunggulan Dermatix<sup>&reg;</sup> Ultra</h1>
            </div>
        </header>
        <div class="row">
            <div class="ml-15">
                <div class="col-sm-4">
                    <div class="cycle-grey">
                        <img src="{{ uploads_path('ban-keunggulan.jpg') }}" class="img-circle" alt="">
                    </div>
                </div>
                <div class="col-sm-7">
                    <ul id="exc-derma_page-clinical" class="exc-derma">
                        <li>Cepat kering, transparan dan tidak berminyak</li>
                        <li>Aman untuk digunakan pada anak-anak.</li>
                        <li>Bisa menggunakan kosmetik di atas Dermatix<sup>&reg;</sup> Ultra setelah kering.</li>
                        <li>Cocok untuk kulit sensitif.</li>
                        <li>Mudah digunakan.</li>
                        <li>Cukup dioleskan dua kali sehari.</li>
                        <li>Kontak langsung secara terus menerus dengan kulit</li>
                        <li>dapat meningkatkan proses penyembuhan.</li>
                        <li>Ideal untuk bekas luka pada bagian tubuh yang sering bergerak: sendi, wajah.</li>
                        <li>Tidak menyebabkan Maserasi(ketika kulit menjadi pucat, lembab, keriput dan basah, akibat diplester terlalu lama)</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <seciton id="scar">
        <header class="page-header">
            <div class="container">
                <h1 class="title">Bekas luka yang bisa diterapi dengan Dermatix<sup>&reg;</sup> Ultra</h1>
            </div>
        </header>
        <div class="row ml-15 mr-15">
            <div class="col-sm-4 text-center">
                <img src="{{ uploads_path('bekasluka-1.jpg') }}" class="img-circle imgAuto img-scar" alt="">
                <h3 class="mt-20">Bekas Luka Bakar</h3>
            </div>
            <div class="col-sm-4 text-center">
                <img src="{{ uploads_path('bekasluka-2.jpg') }}" class="img-circle imgAuto img-scar" alt="">
                <h3 class="mt-20">Bekas Luka Operasi</h3>
            </div>
            <div class="col-sm-4 text-center">
                <img src="{{ uploads_path('bekasluka-3.jpg') }}" class="img-circle imgAuto img-scar" alt="">
                <h3 class="mt-20">Bekas Luka Gores</h3>
            </div>
        </div>
    </seciton>

    <section id="application">
        <header class="page-header">
            <div class="container">
                <h1 class="title">Cara Pakai Dermatix<sup>&reg;</sup></h1>
            </div>
        </header>
        <div class="video640">
            <a class="popup-youtube" href="https://www.youtube.com/watch?v=M8gEVfJyPVI">
                <img src="{{ uploads_path('a1.jpg') }}" alt="" class="img-responsive" style="margin:auto;">
                <i class="fa fa-youtube-play fa-4x" style="right:0;margin:auto;"></i>
            </a>
        </div>
        <div class="row20">
            <div class="mt-30-top">
                <div class="text-center">
                    <div class="col20">
                        <img src="{{ uploads_path('img-app-derma-1.jpg') }}" class="animated fadeInLeft" data-appear-animation="fadeInLeft">
                    </div>
                    <div class="col20">
                        <img src="{{ uploads_path('img-app-derma-2.jpg') }}" class="animated fadeInLeft" data-appear-animation="fadeInLeft">
                    </div>
                    <div class="col20">
                        <img src="{{ uploads_path('img-app-derma-3.jpg') }}" class="animated fadeInLeft" data-appear-animation="fadeInLeft">
                    </div>
                    <div class="col20">
                        <img src="{{ uploads_path('img-app-derma-4.jpg') }}" class="animated fadeInLeft" data-appear-animation="fadeInLeft">
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
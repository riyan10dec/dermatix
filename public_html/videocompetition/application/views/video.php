<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dermatix Behind The Scar Video Competition</title>
    <link rel="stylesheet" href="<?=base_url('assets/frontend/css/foundation.css')?>" />
    <link rel="stylesheet" href="<?=base_url('assets/frontend/css/app.css?v='.rand(10,1000))?>" />
    <link rel="stylesheet" href="http://manifesto.co.id/assets/frontend/vendor/malihu/jquery.mCustomScrollbar.css" />
    <meta property="og:url"                content="http://dermatix.co.id/videocompetition/" />
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="Dermatix Behind The Scar Video Competition" />
  </head>
  <body>
    <div class="off-canvas-wrapper">
      <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
        <div class="off-canvas position-right bg-corp" id="offCanvas" data-off-canvas data-position="right">
          <ul id="nav" class="nav navbar-nav navbar-center">
            <li>
                <a class="parent" href="http://dermatix.co.id">Home</a>
            </li>
            <li>
                <a class="parent" href="http://dermatix.co.id/talk-about-scar">Talk About Scar</a>
                <ul class="sub">
                    <li><a href="http://dermatix.co.id/videocompetition">Behind The Scar</a></li>
                    <li><a href="http://dermatix.co.id/talk-about-scar#articles">Articles</a></li>
                    <li><a href="http://dermatix.co.id/talk-about-scar#stories">Stories Of Scar</a></li>
                    <li><a href="http://dermatix.co.id/talk-about-scar#quickfact">Quick Fact</a></li>
                </ul>
            </li>
            <li>
                <a class="parent" href="http://dermatix.co.id/identify-dermatix">Identify Dermatix</a>
                <ul class="sub">
                    <li><a href="http://dermatix.co.id/identify-dermatix#article-about-derma">Apa itu Dermatix ?</a></li>
                    <li><a href="http://dermatix.co.id/identify-dermatix#excellence">Keunggulan Dermatix<sup>&reg;</sup> Ultra</a></li>
                    <li><a href="http://dermatix.co.id/identify-dermatix#scar">Jenis Bekas Luka</a></li>
                    <li><a href="http://dermatix.co.id/identify-dermatix#application">Cara Pakai Dermatix<sup>&reg;</sup></a></li>
                </ul>
            </li>
            <li>
                <a class="parent" href="http://dermatix.co.id/where-to-find">Where To Find Dermatix</a>
            </li>
            <li>
                <a class="parent" href="http://dermatix.co.id/clinical-evidence">Clinical Evidence</a>
            </li>
            <li>
                <a class="parent" href="http://dermatix.co.id/news-event">News & Events</a>
                <ul class="sub">
                    <li><a href="http://dermatix.co.id/news-event#news">News</a></li>
                    <li><a href="http://dermatix.co.id/news-event#events">Events</a></li>
                </ul>
            </li>
          </ul>                                               
        </div>
        <div class="off-canvas-content" data-off-canvas-content>
          <?php
          if($status['berhasil'] == 1){
          ?>
          <div id="popberhasil" class="popmuncul">
            <div class="close-btn"><img src="<?=base_url('assets/frontend/images/close-btn.png')?>" alt=""></div>
            <div class="row">
              <div class="wrap-terimakasih">
                Terima Kasih sudah mengikuti 'Dermatix Video Competition' video yang kamu submit akan di moderasi terlebih dahulu
              </div>
            </div>
          </div>
          <?php
          }
          ?>
          <div id="popup-daftar">
            <div class="close-btn"><img src="<?=base_url('assets/frontend/images/close-btn.png')?>" alt=""></div>
            <div class="row">
              <div class="wrap-jdl-page">
                <div class="jdl-page">
                  <div class="jdl-page-atas">
                    BEHIND THE SCAR
                  </div>
                  <div class="jdl-page-bawah">
                    Online Video Competition
                  </div>
                </div>
              </div>
            </div>
            <div class="row txt-submit">
              <div>SUBMIT VIDEO</div>
              <span>( Max 1 Minute and 20 MB Filesize )</span>
            </div>
            <div id="pilihan" class="row">
              <div class="large-offset-2 large-4 medium-6 small-6 column">
                <div class="wrap-pilihan">
                  <img src="<?=base_url('assets/frontend/images/upload-1.png')?>" alt="">
                  <div class="jdl-pilih">
                    Paste link Youtube
                  </div>
                  <div class="btn-pilih" lang="copy">COPY & PASTE LINK YOUTUBE</div>
                </div>
              </div>
              <div class="large-4 medium-6 small-6 column end">
                <div class="wrap-pilihan">
                  <img src="<?=base_url('assets/frontend/images/upload-3.png')?>" alt="">
                  <div class="jdl-pilih">
                    Upload video dari komputermu
                  </div>
                  <div class="btn-pilih" lang="upload">UPLOAD</div>
                </div>
              </div>
            </div>
            <form id="form-video" action="" role="form" method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="large-6 meduim-6 column">
                  <input type="hidden" name="form" id="input-nama" value="1">
                  <label>
                    Nama
                    <input type="text" name="nama" id="input-nama" value="">
                  </label>
                  <label>
                    Email
                    <input type="text" name="email" id="input-email" value="">
                  </label>
                  <label>
                    Nomor Telepon
                    <input type="text" name="telp" id="input-telp" value="">
                  </label>
                  <label class="item-upload">

                  </label>
                </div>
                <div class="large-6 meduim-6 column">
                  <label>
                    Judul Video
                    <input type="text" name="judul" id="input-judul" value="">
                  </label>
                  <label>
                    Deskripsi Video
                    <textarea rows="3" name="deskripsi" id="input-deskripsi"></textarea>
                  </label>
                  <div class="btn-prosess btn-submit">SUBMIT</div> <div class="btn-prosess btn-back">BACK</div>
                </div>
              </div>
            </form>
          </div>
          <div id="popup-term" class="wrap-scroll">
            <div class="close-btn"><img src="<?=base_url('assets/frontend/images/close-btn.png')?>" alt=""></div>
            <div class="wrap-term">
              <div class="jdl-term">TERMS & CONDITIONS</div>
              <div class="isi-term">
                Ladies, yuk ikutan Behind the Scar online video competition dari Dermatix, dan menangkan <b>MICHAEL KORS BAG</b> senilai jutaan rupiah! Tapi, sebelum mengikuti kompetisi “Behind the Scar” ini, yuk baca syarat dan ketentuannya.
              </div>  
              <div class="sub-jdl-term">KOMPETISI</div>
              <ol>
                <li>“Behind the Scar” merupakan kompetisi video online yang diadakan oleh Dermatix.</li>
                <li>Kompetisi ini terbuka untuk umum melalui registrasi online di dermatix.co.id.</li>
                <li>Kompetisi ini berlangsung dari tanggal 28 Maret 2016 hingga 28 April 2016.</li>
              </ol>
              <div class="sub-jdl-term">SYARAT UMUM</div>
              <ol>
                <li>Peserta adalah warga negara Indonesia (WNI) dan berlaku untuk semua usia.</li>
                <li>Setiap peserta boleh mengikutsertakan lebih dari 1 video.</li>
                <li>Peserta harus memiliki akun media sosial.</li>
                <li>Video yang diikutsertakan harus berdurasi minimal 1 menit.</li>
                <li>Video yang kamu ikutsertakan boleh menggunakan kamera apa pun, termasuk kamera handphone.</li>
                <li>Video tersebut juga harus memuat testimoni atau pengalaman kamu menggunakan Dermatix.</li>
                <li>Video yang diikutsertakan tidak mengandung SARA.</li>
                <li>Video yang diikutsertakan juga merupakan karya asli, bukan plagiat, atau tidak melanggar hak cipta. Dalam hal ini, peserta bertanggung jawab atas segala permasalahan hak cipta yang terkait dengan pembuatan dan kepemilikan video yang didaftarkan.</li>
                <li>Keputusan juri adalah mutlak dan tidak dapat diganggu gugat.</li>
              </ol>
              <div class="sub-jdl-term">CARA DAFTAR</div>
              <ol>
                <li>Buka website dermatix.co.id.</li>
                <li>Klik “Join the Competition Now” pada banner Behind The Scar Video Competition yang ada pada halaman muka tersebut, dan lakukan pengisian data diri di halaman yang tersedia.</li>
                <li>Rekam cerita atau testimonial tentang bekas lukamu dan cara yang kamu lakukan untuk merawatnya.</li>
                <li>
                  Upload video yang telah kamu buat, dan isi form pada halaman yang tersedia seperti: 
                  <ol style="list-style-type: lower-alpha;">
                    <li>Nama</li>
                    <li>E-mail</li>
                    <li>Nomor telepon peserta</li>
                    <li>Judul Video</li>
                    <li>Deskipsi Video</li>
                  </ol>
                </li>
                <li>
                  Kamu dapat meng-upload video tersebut dalam 3 pilihan cara.
                  <ol style="list-style-type: lower-alpha;">
                    <li>Paste link YouTube. Kamu bisa men-upload video tersebut melalui channel YouTube kamu, lalu copy dan paste link video tersebut melalui menu upload yang telah disediakan di website Dermatix.</li>
                    <!-- <li>Rekam dari webcam. Kamu juga bisa merekam langsung cerita kamu melalui webcam di komputer kamu. Tapi, untuk pilihan ini, kamu harus menggunakan browser Google Chrome. </li> -->
                    <li>Upload video dari komputermu. </li>
                  </ul>
                </li>
                <li>Setelah berhasil melakukan upload, share video kamu melalui media social kamu. Semakin banyak kamu melakukan share, semakin besar kesempatanmu untuk memenangkan <b>MICHAEL KORS BAG!</b></li>
              </ol>
            </div>
          </div>
          <div id="wrap-loading" style="display: none;"><img style="margin-top: 20%;" src="<?=base_url('assets/frontend/images/loading-modal.gif')?>" /></div>
          <header id="head-banner">
            <div class="row">
              <div class="logo"><img src="<?=base_url('assets/frontend/images/logo.png')?>" alt=""></div>
              <button id="btn-menu" type="button" class="button" data-toggle="offCanvas">
                <div class="line-btn"></div>
              </button>
            </div>
          </header>
          <div id="banner-vid">
            <div class="row">
              <div class="wrap-jdl-page">
                <div class="jdl-page">
                  <div class="jdl-page-atas">
                    BEHIND THE SCAR
                  </div>
                  <div class="jdl-page-bawah">
                    Online Video Competition
                  </div>
                </div>
              </div>
              <img src="<?=base_url('assets/frontend/images/banner-vid.jpg')?>" alt="">
              <div class="wrap-btn-join">
                <div class="btn-join">JOIN THE COMPETITION NOW</div>
                <div class="btn-term">Terms & Conditions</div>
              </div>
            </div>
          </div>
          <div id="scar-story" class="bg-gray">
            <div class="row first-row">
              <div class="wrap-jdl-page">
                <div class="jdl-page">
                  <div class="jdl-page-atas">
                    MY SCAR & TREATMENT STORY
                  </div>
                </div>
              </div>
              <img src="<?=base_url('assets/frontend/images/story.png')?>" alt="">
            </div>
          </div>
          <div id="how-to-join" class="bg-gray">
            <div class="row first-row">
              <div class="wrap-jdl-page">
                <div class="jdl-page">
                  <div class="jdl-page-atas">
                    HOW TO JOIN
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="large-3 medium-6 small-12 column">
                <div class="wrap-join">
                  <img src="<?=base_url('assets/frontend/images/step-1.png')?>" alt="">
                  <div class="jdl-join">1. Click Join</div>
                  <div class="sub-join">Click Join The Competition Now and fill in the form</div>
                </div>
              </div>
              <div class="large-3 medium-6 small-12 column">
                <div class="wrap-join">
                  <img src="<?=base_url('assets/frontend/images/step-2.png')?>" alt="">
                  <div class="jdl-join">2. Record your Scar & Treatment Story</div>
                  <div class="sub-join">Tell us your story plus testimony and record it as a video</div>
                </div>
              </div>
              <div class="large-3 medium-6 small-12 column">
                <div class="wrap-join">
                  <img src="<?=base_url('assets/frontend/images/step-3.png')?>" alt="">
                  <div class="jdl-join">3. Upload your Video</div>
                  <div class="sub-join">Tell us your story plus testimony and record it as a video</div>
                </div>
              </div>
              <div class="large-3 medium-6 small-12 column">
                <div class="wrap-join">
                  <img src="<?=base_url('assets/frontend/images/step-4.png')?>" alt="">
                  <div class="jdl-join">4. Share your Video</div>
                  <div class="sub-join">Share your video on social media. The more you share, the bigger chances to be the winner.</div>
                </div>
              </div>
            </div>
            <div class="row">
              <img src="<?=base_url('assets/frontend/images/batas.png')?>" alt="">
            </div>
            <div class="row prize">
              <div class="large-4 medium-4 small-12 column"><img src="<?=base_url('assets/frontend/images/hadiah-1.png')?>" alt=""></div>
              <div class="large-4 medium-4 small-12 column"><img src="<?=base_url('assets/frontend/images/hadiah-2.png')?>" alt=""></div>
              <div class="large-4 medium-4 small-12 column"><img src="<?=base_url('assets/frontend/images/hadiah-3.png')?>" alt=""></div>
              <div class="wrap-btn-join">
                <div class="btn-join">JOIN THE COMPETITION NOW</div>
                <div class="btn-term">Terms & Conditions</div>
              </div>
            </div>
            <div class="row">
              <img src="<?=base_url('assets/frontend/images/batas.png')?>" alt="">
            </div>
          </div>
          <div id="how-to-join" class="bg-gray">
            <div class="row first-row">
              <div class="wrap-jdl-page">
                <div class="jdl-page">
                  <div class="jdl-page-atas">
                    GALLERY
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              BELUM ADA DATA
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-68478376-1', 'auto');
      ga('send', 'pageview');

    </script>
    <script src="<?=base_url('assets/frontend/js/vendor/jquery.min.js')?>"></script>
    <script src="<?=base_url('assets/frontend/js/vendor/what-input.min.js')?>"></script>
    <script src="<?=base_url('assets/frontend/js/foundation.min.js')?>"></script>
    <script src="http://manifesto.co.id/assets/frontend/vendor/malihu/jquery.mCustomScrollbar.js"></script>
    <script>
    $(function() {
      $(".wrap-scroll").mCustomScrollbar({
        theme:"dark"
      });
    });
    var uri = "<?=base_url('saveform')?>";
    var urivideo = "<?=base_url('savevideo')?>";
    </script>
    <script src="<?=base_url('assets/frontend/js/app.js')?>"></script>
  </body>
</html>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dermatix Scar Personality Quiz</title>
    <link rel="stylesheet" href="<?=base_url('assets/frontend/css/foundation.css')?>" />
    <link rel="stylesheet" href="<?=base_url('assets/frontend/css/app.css')?>" />
    <link rel="stylesheet" href="http://manifesto.co.id/assets/frontend/vendor/malihu/jquery.mCustomScrollbar.css" />
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
          <div id="wrap-loading" style="display: none;"><img style="margin-top: 20%;" src="<?=base_url('assets/frontend/images/loading-modal.gif')?>" /></div>
          <header>
            <div class="container">
              <div class="logo"><img src="<?=base_url('assets/frontend/images/logo.png')?>" alt=""></div>
              <button id="btn-menu" type="button" class="button" data-toggle="offCanvas">
                <div class="line-btn"></div>
              </button>
            </div>
          </header>
          <div id="shadow"></div>
          <section class="container" id="landing">
            <div class="wrap-pic"><img src="<?=base_url('assets/frontend/images/pic-landing.png')?>" alt=""></div>
            <div class="wrap-txt-landing"><b><i>Ladies</i></b>, mengidentifikasi karakter seseorang juga bisa dilakukan dari caranya merawat bekas luka, lho.<br>Jadi, yuk, cari tahu tipe <i>personality</i> kamu dengan menjawab kuis dari Dermatix berikut.</div>
            <div id="btn-start" class="bg-corp">START THE QUIZ</div>
          </section>
          <section class="pertanyaan" id="tanya-1" data-tanya="1">
            <div class="large-12">
              <div class="columns large-6 wrap-tanya">
                <div class="tanya-kiri">
                  <div class="wrap-pertanyaan">
                    <div class="number">1.</div>
                    <div class="txt-tanya" style="padding-top:17px">BIASANYA, KAMU SERING TERLUKA<br>SAAT MELAKUKAN AKTIVITAS APA?</div>
                  </div>
                  <div class="wrap-dot">
                    <ul>
                      <li class="bg-done"></li>
                      <li></li>
                      <li></li>
                      <li></li>
                      <li></li>
                      <li></li>
                      <li></li>
                      <li></li>
                      <li></li>
                      <li></li>
                    </ul>
                  </div>
                  <div class="wrap-pagging">
                    1/10
                  </div>
                </div>
              </div>
              <div class="columns large-6 wrap-tanya bg-corp">
                <div class="row" style="margin:20px 0 40px">
                  <div class="medium-4 columns item-choice" data-option="a">
                    <img class="img-choice" src="<?=base_url('assets/frontend/images/1/a.png')?>" alt="">
                    <div class="txt-choice">a. Memasak</div>
                  </div>
                  <div class="medium-4 columns item-choice" data-option="b">
                    <img class="img-choice" src="<?=base_url('assets/frontend/images/1/b.png')?>" alt="">
                    <div class="txt-choice">b. Olahraga</div>
                  </div>
                  <div class="medium-4 columns item-choice" data-option="c">
                    <img class="img-choice" src="<?=base_url('assets/frontend/images/1/c.png')?>" alt="">
                    <div class="txt-choice">c. Merias diri</div>
                  </div>
                </div>
                <div class="row">
                  <div class="medium-4 medium-push-2 columns item-choice" data-option="d">
                    <img class="img-choice" src="<?=base_url('assets/frontend/images/1/d.png')?>" alt="">
                    <div class="txt-choice">d. Berkendara</div>
                  </div>
                  <div class="medium-4 medium-pull-2 columns item-choice" data-option="e">
                    <img class="img-choice" src="<?=base_url('assets/frontend/images/1/e.png')?>" alt="">
                    <div class="txt-choice">e. Bermain dengan hewan peliharaan</div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <section class="pertanyaan" id="tanya-2" data-tanya="2">
            <div class="large-12">
              <div class="columns large-6 wrap-tanya">
                <div class="tanya-kiri">
                  <div class="wrap-pertanyaan">
                    <div class="number">2.</div>
                    <div class="txt-tanya" style="padding-top:17px">JENIS LUKA SEPERTI APA YANG SERING<br>KAMU ALAMI DAN MENIMBULKAN BEKAS?</div>
                  </div>
                  <div class="wrap-dot">
                    <ul>
                      <li class="bg-done"></li>
                      <li class="bg-done"></li>
                      <li></li>
                      <li></li>
                      <li></li>
                      <li></li>
                      <li></li>
                      <li></li>
                      <li></li>
                      <li></li>
                    </ul>
                  </div>
                  <div class="wrap-pagging">
                    2/10
                  </div>
                </div>
              </div>
              <div class="columns large-6 wrap-tanya bg-corp">
                <div class="row" style="margin:40px 0">
                  <div class="medium-12 columns item-pita item-choice" data-option="a">
                    <div class="pita-tanya color-corp">a. Luka bakar</div>
                  </div>
                  <div class="medium-12 columns item-pita item-choice" data-option="b">
                    <div class="pita-tanya color-corp">b. Luka gores/Luka cakar</div>
                  </div>
                  <div class="medium-12 columns item-pita item-choice" data-option="c">
                    <div class="pita-tanya color-corp">c. Luka operasi</div>
                  </div>
                  <div class="medium-12 columns item-pita item-choice" data-option="d">
                    <div class="pita-tanya color-corp">d. Luka karena kulit gatal yang disebabkan alergi/digigit serangga</div>
                  </div>
                  <div class="medium-12 columns item-pita item-choice" data-option="e">
                    <div class="pita-tanya color-corp">e. Luka karena tersiram air panas</div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <section class="pertanyaan" id="tanya-3" data-tanya="3">
            <div class="large-12">
              <div class="columns large-6 wrap-tanya">
                <div class="tanya-kiri">
                  <div class="wrap-pertanyaan">
                    <div class="number">3.</div>
                    <div class="txt-tanya" style="padding-top:8px">DARI DAFTAR OLAHRAGA BERIKUT,<br>MANAKAH YANG PALING KAMU MINATI<br>UNTUK MEMBANTU MENJAGA KESEHATAN?</div>
                  </div>
                  <div class="wrap-dot">
                    <ul>
                      <li class="bg-done"></li>
                      <li class="bg-done"></li>
                      <li class="bg-done"></li>
                      <li></li>
                      <li></li>
                      <li></li>
                      <li></li>
                      <li></li>
                      <li></li>
                      <li></li>
                    </ul>
                  </div>
                  <div class="wrap-pagging">
                    3/10
                  </div>
                </div>
              </div>
              <div class="columns large-6 wrap-tanya bg-corp">
                <div class="row" style="margin:20px 0 40px">
                  <div class="medium-4 columns item-choice" data-option="a">
                    <img class="img-choice" src="<?=base_url('assets/frontend/images/3/a.png')?>" alt="">
                    <div class="txt-choice">a. Joging</div>
                  </div>
                  <div class="medium-4 columns item-choice" data-option="b">
                    <img class="img-choice" src="<?=base_url('assets/frontend/images/3/b.png')?>" alt="">
                    <div class="txt-choice">b. Bersepeda</div>
                  </div>
                  <div class="medium-4 columns item-choice" data-option="c">
                    <img class="img-choice" src="<?=base_url('assets/frontend/images/3/c.png')?>" alt="">
                    <div class="txt-choice">c. Berenang</div>
                  </div>
                </div>
                <div class="row">
                  <div class="medium-4 medium-push-2 columns item-choice" data-option="d">
                    <img class="img-choice" src="<?=base_url('assets/frontend/images/3/d.png')?>" alt="">
                    <div class="txt-choice">d. Voli</div>
                  </div>
                  <div class="medium-4 medium-pull-2 columns item-choice" data-option="e">
                    <img class="img-choice" src="<?=base_url('assets/frontend/images/3/e.png')?>" alt="">
                    <div class="txt-choice">e. Tenis</div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <section class="pertanyaan" id="tanya-4" data-tanya="4">
            <div class="large-12">
              <div class="columns large-6 wrap-tanya">
                <div class="tanya-kiri">
                  <div class="wrap-pertanyaan">
                    <div class="number">4.</div>
                    <div class="txt-tanya" style="padding-top:17px">KALAU KAMU TERLUKA SAAT OLAHRAGA<br>DI LUAR RUANGAN, APA YANG KAMU LAKUKAN?</div>
                  </div>
                  <div class="wrap-dot">
                    <ul>
                      <li class="bg-done"></li>
                      <li class="bg-done"></li>
                      <li class="bg-done"></li>
                      <li class="bg-done"></li>
                      <li></li>
                      <li></li>
                      <li></li>
                      <li></li>
                      <li></li>
                      <li></li>
                    </ul>
                  </div>
                  <div class="wrap-pagging">
                    4/10
                  </div>
                </div>
              </div>
              <div class="columns large-6 wrap-tanya bg-corp2">
                <div class="row" style="margin:40px 0">
                  <div class="medium-12 columns item-pita item-choice" data-option="a">
                    <div class="pita-tanya white-color">a. Berhenti dan segera mengobati luka.</div>
                  </div>
                  <div class="medium-12 columns item-pita item-choice" data-option="b">
                    <div class="pita-tanya white-color">b. Tetap melanjutkan olahraga selama luka tersebut tidak parah.</div>
                  </div>
                  <div class="medium-12 columns item-pita item-choice" data-option="c">
                    <div class="pita-tanya white-color">c. Duduk sambil memijit bagian pinggir luka.</div>
                  </div>
                  <div class="medium-12 columns item-pita item-choice" data-option="d">
                    <div class="pita-tanya white-color">d. Segera mencari pertolongan atau ke klinik.</div>
                  </div>
                  <div class="medium-12 columns item-pita item-choice" data-option="e">
                    <div class="pita-tanya white-color">e. Mencari toko terdekat yang menjual obat.</div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <section class="pertanyaan" id="tanya-5" data-tanya="5">
            <div class="large-12">
              <div class="columns large-6 wrap-tanya">
                <div class="tanya-kiri">
                  <div class="wrap-pertanyaan">
                    <div class="number">5.</div>
                    <div class="txt-tanya" style="padding-top:17px">Dari daftar kelebihan obat pemudar bekas<br>luka berikut ini, mana yang akan kamu utamakan?</div>
                  </div>
                  <div class="wrap-dot">
                    <ul>
                      <li class="bg-done"></li>
                      <li class="bg-done"></li>
                      <li class="bg-done"></li>
                      <li class="bg-done"></li>
                      <li class="bg-done"></li>
                      <li></li>
                      <li></li>
                      <li></li>
                      <li></li>
                      <li></li>
                    </ul>
                  </div>
                  <div class="wrap-pagging">
                    5/10
                  </div>
                </div>
              </div>
              <div class="columns large-6 wrap-tanya bg-corp">
                <div class="row" style="margin:40px 0">
                  <div class="medium-12 columns item-pita item-choice" data-option="a">
                    <div class="pita-tanya color-corp"> a. Obat pemudar bekas luka yang tidak lengket di kulit.</div>
                  </div>
                  <div class="medium-12 columns item-pita item-choice" data-option="b">
                    <div class="pita-tanya color-corp">b. Obat pemudar bekas luka yang cocok untuk kulit sensitif.</div>
                  </div>
                  <div class="medium-12 columns item-pita item-choice" data-option="c">
                    <div class="pita-tanya color-corp">c. Tidak ada yang spesifik; asal dapat memudarkan bekas luka.</div>
                  </div>
                  <div class="medium-12 columns item-pita item-choice" data-option="d">
                    <div class="pita-tanya color-corp">d. Obat yang teruji klinis.</div>
                  </div>
                  <div class="medium-12 columns item-pita item-choice" data-option="e">
                    <div class="pita-tanya color-corp">e. Obat pemudar bekas luka dengan merek terkenal.</div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <section class="pertanyaan" id="tanya-6" data-tanya="6">
            <div class="large-12">
              <div class="columns large-6 wrap-tanya">
                <div class="tanya-kiri">
                  <div class="wrap-pertanyaan">
                    <div class="number">6.</div>
                    <div class="txt-tanya" style="padding-top:8px">KALAU KAMU HARUS PERGI KE PESTA DAN<br>ADA BEKAS LUKA MENONJOL DI KENING,<br>APA YANG AKAN KAMU LAKUKAN?</div>
                  </div>
                  <div class="wrap-dot">
                    <ul>
                      <li class="bg-done"></li>
                      <li class="bg-done"></li>
                      <li class="bg-done"></li>
                      <li class="bg-done"></li>
                      <li class="bg-done"></li>
                      <li class="bg-done"></li>
                      <li></li>
                      <li></li>
                      <li></li>
                      <li></li>
                    </ul>
                  </div>
                  <div class="wrap-pagging">
                    6/10
                  </div>
                </div>
              </div>
              <div class="columns large-6 wrap-tanya bg-corp2">
                <div class="row" style="margin:10px 0">
                  <div class="medium-12 columns item-pita2 item-choice" data-option="a">
                    <div class="pita-tanya white-color">a. Mudah saja, saya akan menutupi bekas luka tersebut dengan kosmetik tebal.</div>
                  </div>
                  <div class="medium-12 columns item-pita2 item-choice" data-option="b">
                    <div class="pita-tanya white-color">b. Saya berusaha menyiasati bekas luka tersebut selain menggunakan kosmetik, juga menutupinya dengan poni.</div>
                  </div>
                  <div class="medium-12 columns item-pita2 item-choice" data-option="c">
                    <div class="pita-tanya white-color">c. Membiarkan bekas luka tersebut.</div>
                  </div>
                  <div class="medium-12 columns item-pita2 item-choice" data-option="d">
                    <div class="pita-tanya white-color">d. Jelas, saya tidak percaya diri dan tidak tahu apa yang harus saya lakukan.</div>
                  </div>
                  <div class="medium-12 columns item-pita2 item-choice" data-option="e">
                    <div class="pita-tanya white-color">e. Jika bekas luka tak memudar dan sangat mengganggu, saya akan melakukan operasi kecantikan.</div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <section class="pertanyaan" id="tanya-7" data-tanya="7">
            <div class="large-12">
              <div class="columns large-6 wrap-tanya">
                <div class="tanya-kiri">
                  <div class="wrap-pertanyaan">
                    <div class="number">7.</div>
                    <div class="txt-tanya" style="padding-top:17px">BERIKUT INI, BUAH APA YANG PALING KAMU SUKA<br>UNTUK MEMBANTU MENYEHATKAN KULIT?</div>
                  </div>
                  <div class="wrap-dot">
                    <ul>
                      <li class="bg-done"></li>
                      <li class="bg-done"></li>
                      <li class="bg-done"></li>
                      <li class="bg-done"></li>
                      <li class="bg-done"></li>
                      <li class="bg-done"></li>
                      <li class="bg-done"></li>
                      <li></li>
                      <li></li>
                      <li></li>
                    </ul>
                  </div>
                  <div class="wrap-pagging">
                    7/10
                  </div>
                </div>
              </div>
              <div class="columns large-6 wrap-tanya bg-corp">
                <div class="row">
                  <div class="medium-4 medium-push-2 columns item-choice" data-option="a">
                    <img class="img-choice" src="<?=base_url('assets/frontend/images/7/a.png')?>" alt="">
                    <div class="txt-choice">a. Stroberi</div>
                  </div>
                  <div class="medium-4 medium-pull-2 columns item-choice" data-option="b">
                    <img class="img-choice" src="<?=base_url('assets/frontend/images/7/b.png')?>" alt="">
                    <div class="txt-choice">b. Jeruk</div>
                  </div>
                </div>
                <div class="row" style="margin:20px 0 40px">
                  <div class="medium-4 columns item-choice" data-option="c">
                    <img class="img-choice" src="<?=base_url('assets/frontend/images/7/c.png')?>" alt="">
                    <div class="txt-choice">c. Tomat</div>
                  </div>
                  <div class="medium-4 columns item-choice" data-option="d">
                    <img class="img-choice" src="<?=base_url('assets/frontend/images/7/d.png')?>" alt="">
                    <div class="txt-choice">d. Lemon</div>
                  </div>
                  <div class="medium-4 columns item-choice" data-option="e">
                    <img class="img-choice" src="<?=base_url('assets/frontend/images/7/e.png')?>" alt="">
                    <div class="txt-choice">e. Pepaya</div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <section class="pertanyaan" id="tanya-8" data-tanya="8">
            <div class="large-12">
              <div class="columns large-6 wrap-tanya">
                <div class="tanya-kiri">
                  <div class="wrap-pertanyaan">
                    <div class="number">8.</div>
                    <div class="txt-tanya" style="padding-top:8px">KALAU PUNYA BEKAS LUKA AKIBAT TERBAKAR<br> ATAU TERSIRAM AIR PANAS,<br>APA YANG KAMU LAKUKAN UNTUK MERAWATNYA?</div>
                  </div>
                  <div class="wrap-dot">
                    <ul>
                      <li class="bg-done"></li>
                      <li class="bg-done"></li>
                      <li class="bg-done"></li>
                      <li class="bg-done"></li>
                      <li class="bg-done"></li>
                      <li class="bg-done"></li>
                      <li class="bg-done"></li>
                      <li class="bg-done"></li>
                      <li></li>
                      <li></li>
                    </ul>
                  </div>
                  <div class="wrap-pagging">
                    8/10
                  </div>
                </div>
              </div>
              <div class="columns large-6 wrap-tanya bg-corp">
                <div class="row" style="margin:20px 0">
                  <div class="medium-12 columns item-pita2 item-choice" data-option="a">
                    <div class="pita-tanya2 white-color">
                     a. Akan saya biarkan, nanti juga sembuh sendiri.
                     <div class="pita-vector-kiri"></div>
                     <div class="pita-vector-kanan"></div>
                    </div>
                  </div>
                  <div class="medium-12 columns item-pita2 item-choice" data-option="b">
                    <div class="pita-tanya2 white-color">
                     b. Merawat menggunakan obat yang telah teruji secara klinis.
                     <div class="pita-vector-kiri"></div>
                     <div class="pita-vector-kanan"></div>
                    </div>
                  </div>
                  <div class="medium-12 columns item-pita2 item-choice" data-option="c">
                    <div class="pita-tanya2 white-color">
                     c. Saya akan memilih obat yang paling sesuai dengan melakukan riset sebelum memutuskan pembelian.
                     <div class="pita-vector-kiri"></div>
                     <div class="pita-vector-kanan"></div>
                    </div>
                  </div>
                  <div class="medium-12 columns item-pita2 item-choice" data-option="d">
                    <div class="pita-tanya2 white-color">d. Akan saya rawat dengan obat yang bisa ditemukan di toko obat terdekat, jika memungkinkan akan saya gunakan obat tradisional. 
                     <div class="pita-vector-kiri"></div>
                     <div class="pita-vector-kanan"></div>
                    </div>
                  </div>
                  <div class="medium-12 columns item-pita2 item-choice" data-option="e">
                    <div class="pita-tanya2 white-color">
                     e. Saya harus segera ke dokter karena takut jika bekas luka akan menebal.
                     <div class="pita-vector-kiri"></div>
                     <div class="pita-vector-kanan"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <section class="pertanyaan" id="tanya-9" data-tanya="9">
            <div class="large-12">
              <div class="columns large-6 wrap-tanya">
                <div class="tanya-kiri">
                  <div class="wrap-pertanyaan">
                    <div class="number">9.</div>
                    <div class="txt-tanya" style="padding-top:17px">SAAT MELIHAT BEKAS LUKA PADA BAGIAN TUBUHMU,<br>APA YANG KAMU LAKUKAN?</div>
                  </div>
                  <div class="wrap-dot">
                    <ul>
                      <li class="bg-done"></li>
                      <li class="bg-done"></li>
                      <li class="bg-done"></li>
                      <li class="bg-done"></li>
                      <li class="bg-done"></li>
                      <li class="bg-done"></li>
                      <li class="bg-done"></li>
                      <li class="bg-done"></li>
                      <li class="bg-done"></li>
                      <li></li>
                    </ul>
                  </div>
                  <div class="wrap-pagging">
                    9/10
                  </div>
                </div>
              </div>
              <div class="columns large-6 wrap-tanya bg-corp">
                <div class="row" style="margin:40px 0">
                  <div class="medium-12 columns item-pita item-choice" data-option="a">
                    <div class="pita-tanya2 white-color">
                     a. Tidak mempermasalahkan, terutama jika hanya bekas luka kecil.
                     <div class="pita-vector-kiri"></div>
                     <div class="pita-vector-kanan"></div>
                    </div>
                  </div>
                  <div class="medium-12 columns item-pita item-choice" data-option="b">
                    <div class="pita-tanya2 white-color">
                      b. Langsung mengobati dengan sebaik mungkin.
                     <div class="pita-vector-kiri"></div>
                     <div class="pita-vector-kanan"></div>
                    </div>
                  </div>
                  <div class="medium-12 columns item-pita item-choice" data-option="c">
                    <div class="pita-tanya2 white-color">
                      c. Mencari referensi obat yang benar-benar manjur.
                     <div class="pita-vector-kiri"></div>
                     <div class="pita-vector-kanan"></div>
                    </div>
                  </div>
                  <div class="medium-12 columns item-pita item-choice" data-option="d">
                    <div class="pita-tanya2 white-color">
                      d. Segera mencari obat termurah, toh hanya bekas luka ringan.
                     <div class="pita-vector-kiri"></div>
                     <div class="pita-vector-kanan"></div>
                    </div>
                  </div>
                  <div class="medium-12 columns item-pita item-choice" data-option="e">
                    <div class="pita-tanya2 white-color">
                      e. Bekas luka sekecil apa pun adalah bencana! 
                     <div class="pita-vector-kiri"></div>
                     <div class="pita-vector-kanan"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <section class="pertanyaan" id="tanya-10" data-tanya="10">
            <div class="large-12">
              <div class="columns large-6 wrap-tanya">
                <div class="tanya-kiri">
                  <div class="wrap-pertanyaan">
                    <div class="number">10.</div>
                    <div class="txt-tanya" style="padding-top:17px">Berikut ini, MANA YANG AKAN<br>KAMU LAKUKAN UNTUK MEMUDARKAN BEKAS LUKA?</div>
                  </div>
                  <div class="wrap-dot">
                    <ul>
                      <li class="bg-done"></li>
                      <li class="bg-done"></li>
                      <li class="bg-done"></li>
                      <li class="bg-done"></li>
                      <li class="bg-done"></li>
                      <li class="bg-done"></li>
                      <li class="bg-done"></li>
                      <li class="bg-done"></li>
                      <li class="bg-done"></li>
                      <li class="bg-done"></li>
                    </ul>
                  </div>
                  <div class="wrap-pagging">
                    END
                  </div>
                </div>
              </div>
              <div class="columns large-6 wrap-tanya bg-corp">
                <div class="row" style="margin:20px 0">
                  <div class="medium-12 columns item-pita2 item-choice" data-option="a">
                    <div class="pita-tanya2 white-color">
                     a. Menggunakan obat/metode apa pun, yang terpenting dapat memudarkan bekas luka.
                     <div class="pita-vector-kiri"></div>
                     <div class="pita-vector-kanan"></div>
                    </div>
                  </div>
                  <div class="medium-12 columns item-pita2 item-choice" data-option="b">
                    <div class="pita-tanya2 white-color">
                      b. Menggunakan obat yang teruji klinis serta direkomendasikan oleh para ahli dan merawatnya dengan baik.
                     <div class="pita-vector-kiri"></div>
                     <div class="pita-vector-kanan"></div>
                    </div>
                  </div>
                  <div class="medium-12 columns item-pita2 item-choice" data-option="c">
                    <div class="pita-tanya2 white-color">
                      c. Memilih obat yang benar-benar pilihan; tidak cukup hanya dengan rekomendasi, tetapi menyesuaikan juga dengan kebutuhan bekas luka. 
                     <div class="pita-vector-kiri"></div>
                     <div class="pita-vector-kanan"></div>
                    </div>
                  </div>
                  <div class="medium-12 columns item-pita2 item-choice" data-option="d">
                    <div class="pita-tanya2 white-color">
                      d. Menggunakan obat yang tidak begitu mahal, asal dapat memudarkan bekas luka.
                     <div class="pita-vector-kiri"></div>
                     <div class="pita-vector-kanan"></div>
                    </div>
                  </div>
                  <div class="medium-12 columns item-pita2 item-choice" data-option="e">
                    <div class="pita-tanya2 white-color">
                      e. Segera ke dokter karena bekas luka adalah musuh kulit.
                     <div class="pita-vector-kiri"></div>
                     <div class="pita-vector-kanan"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <section class="container" id="result">
            <div class="wrap-result">
              <div class="txt-thank">THANK YOU!</div>
              <div class="subtxt-thank">Kindly write your name down below:</div>
              <form action="" id="form-submit">
                <input type="text" name='name-user' id='name-user' placeholder="NAME">
                <input type="text" name='email-user' id='email-user' placeholder="E-MAIL">
                <input type="hidden" name='hasil' id='hasil-option'>
                <div id='btn-result'>CHECK THE RESULT<br><img src="<?=base_url('assets/frontend/images/panah-submit.png')?>" alt=""></div>
              </form>
            </div>
          </section>
          <section class="container wrap-scroll" id="personality">
            <div id="wrap-personality">
              <div class="txt-atas">
                Hi <span class="txtnama" data-email=""></span> !<br>Kamu adalah type <i>personality</i> ...
              </div>
              <div class="pic-personality">
                <img src="<?=base_url('assets/frontend/images/hasil/a.png')?>" alt="">
              </div>
              <div class="wrap-txt-hasil" data-hasil="">
                Bekas luka akan membuatmu khawatir dengan berlebihan. Tipe ini juga akan mempertimbangkan berbagai cara untuk membuat bekas luka cepat memudar. Namun, terkadang, kecemasan yang berlebihan malah akan membuat perawatan lukamu kurang maksimal. Sekarang, kamu tidak perlu khawatir. Untuk menangani bekas luka, serahkan saja pada ahlinya: Dermatix!
              </div>
              <div class="wrap-share">
                Share your result
                <div class="wrap-icon">
                  <a class="klik-share" data-share="facebook" id="id-fb" onClick="" href="javascript: void(0)"><img src="<?=base_url('assets/frontend/images/icon-fb.png')?>" alt=""></a>
                  <a class="klik-share" data-share="twitter" id="id-twit" onClick="" href="javascript: void(0)"><img src="<?=base_url('assets/frontend/images/icon-twit.png')?>" alt=""></a>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
    
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
    var uri = "<?=base_url('index.php/saveform')?>";
    </script>
    <script src="<?=base_url('assets/frontend/js/app.js')?>"></script>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-68478376-1', 'auto');

    </script>
  </body>
</html>
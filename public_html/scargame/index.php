<?php
$pathdir = "./";
$strcss = "";
$strjs = "";
$bodyid = "bodyhome";
$pagename="home";
$baseDir = getcwd().'/';

require_once("db/db_eakoplak.php");
require_once("header_dermatix.php");
?>
  
  <div id="content">
  	<header class="header header-two">
    <div class="header-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-md-2 col-lg-3 logo-box">
                    <div class="logo">
                        <a href="http://dermatix.co.id">
                            <img alt="" class="logo-img" src="http://dermatix.co.id/themes/frontend/assets/images/logo.png">
                        </a>
                    </div>
                </div><!-- .logo-box -->
                <div class="col-xs-6 col-md-10 col-lg-9 right-box">
                    <div class="right-box-wrapper">
                        <div class="header-icons">
                            <div class="search-header hidden-600">
                                <a href="#">
                                    <svg xml:space="preserve" enable-background="new 0 0 16 16" viewBox="0 0 16 16" height="16px" width="16px" y="0" x="0">
                                        <path d="M12.001,10l-0.5,0.5l-0.79-0.79c0.806-1.021,1.29-2.308,1.29-3.71c0-3.313-2.687-6-6-6C2.687,0,0,2.687,0,6
                                        s2.687,6,6,6c1.402,0,2.688-0.484,3.71-1.29l0.79,0.79l-0.5,0.5l4,4l2-2L12.001,10z M6,10c-2.206,0-4-1.794-4-4s1.794-4,4-4
                                        s4,1.794,4,4S8.206,10,6,10z"/>
                                        <image style="vertical-align: top;" height="16" width="16" alt="" src="img/png-icons/search-icon.png">
				                    </image></svg>
                                </a>
                            </div><!-- .search-header -->
                        </div><!-- .header-icons -->

                        <div class="primary">
                            <div role="navigation" class="navbar navbar-default">
                                <button data-target=".primary .navbar-collapse" data-toggle="collapse" class="navbar-toggle btn-navbar collapsed" type="button">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>

                                <nav class="collapse collapsing navbar-collapse">
                                    <ul class="nav navbar-nav navbar-center" id="nav">
                                        <li>
                                            <a href="http://dermatix.co.id">Home</a>
                                        </li>
                                        <li class="parent">
                                            <a href="http://dermatix.co.id/talk-about-scar">Talk About Scar</a>
                                            <ul class="sub">
                                                <li><a href="http://dermatix.co.id/videocompetition">Behind The Scar</a></li>
                                                <li><a href="http://dermatix.co.id/scarpersonality">Scar Personality Quiz</a></li>
                                                <li><a href="http://dermatix.co.id/talk-about-scar#articles">Articles</a></li>
                                                <li><a href="http://dermatix.co.id/talk-about-scar#stories">Stories Of Scar</a></li>
                                                <li><a href="http://dermatix.co.id/talk-about-scar#quickfact">Quick Fact</a></li>
                                            </ul>
                                        </li>
                                        <li class="parent">
                                            <a href="http://dermatix.co.id/identify-dermatix">Identify Dermatix</a>
                                            <ul class="sub">
                                                <li><a href="http://dermatix.co.id/identify-dermatix#article-about-derma">Apa itu Dermatix ?</a></li>
                                                <li><a href="http://dermatix.co.id/identify-dermatix#excellence">Keunggulan Dermatix<sup>&reg;</sup> Ultra</a></li>
                                                <li><a href="http://dermatix.co.id/identify-dermatix#scar">Bekas luka yang bisa diterapi</a></li>
                                                <li><a href="http://dermatix.co.id/identify-dermatix#application">Cara Pakai Dermatix<sup>&reg;</sup></a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="http://dermatix.co.id/where-to-find">Where To Find Dermatix</a>
                                        </li>
                                        <li>
                                            <a href="http://dermatix.co.id/clinical-evidence">Clinical Evidence</a>
                                        </li>
                                        <li class="parent">
                                            <a href="http://dermatix.co.id/news-event">News &amp; Events</a>
                                            <ul class="sub">
                                                <li><a href="http://dermatix.co.id/news-event#news">News</a></li>
                                                <li><a href="http://dermatix.co.id/news-event#events">Events</a></li>
                                            </ul>
                                        </li>
                                                                                                                                                                </ul>
                                                                                                                                                                                                                                                                                                        </nav>
                            </div>
                        </div><!-- .primary -->
                    </div>
                </div>
                <div class="search-active col-sm-9 col-md-9" style="display: none;">
                    <a class="close" href="#"><span>close</span>×</a>
                    <form class="search-form" name="search-form" method="get" action="http://dermatix.co.id/search">
                        <input type="search" name="q" placeholder="Search here" class="search-string form-control">
                        <button class="search-submit">
                            <svg xml:space="preserve" enable-background="new 0 0 16 16" viewBox="0 0 16 16" height="16px" width="16px" y="0" x="0">
                                <path d="M12.001,10l-0.5,0.5l-0.79-0.79c0.806-1.021,1.29-2.308,1.29-3.71c0-3.313-2.687-6-6-6C2.687,0,0,2.687,0,6
                                s2.687,6,6,6c1.402,0,2.688-0.484,3.71-1.29l0.79,0.79l-0.5,0.5l4,4l2-2L12.001,10z M6,10c-2.206,0-4-1.794-4-4s1.794-4,4-4
                                s4,1.794,4,4S8.206,10,6,10z" fill="#231F20"/>
                                <image style="vertical-align: top;" height="16" width="16" alt="" src="img/png-icons/search-icon.png">
                            </image></svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>

    <!-- <nav class="navbar navbar-inverse navbar-fixed-top">
    	
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><img class="img-responsive col-xs-12 logo" alt="Responsive image" src="assets/images/layout/global/logo.png"></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">Talk About Scar</a></li>
            <li><a href="#contact">Identify Dermatix</a></li>
            <li><a href="#contact">Where To Find Dermatix</a></li>
            <li><a href="#contact">Clinical Evidence</a></li>
            <li><a href="#contact">News & Events</a></li>
          </ul>
        </div>
      </div>
    </nav> -->

    <div class="container">
	
		
		
		<div class="row " id="play_start">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
				<div class="bgplay">
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 bgwoman fadeInRight animated ">
							<!--<div class="bgwoman fadeInLeft animated"></div>-->
							
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 ">
							<div class="wrap_play fadeInDown animated" >
								<p>LET'S PLAY</p>
								<div class="btnplay" id="play">
									
								</div>
							</div>
							<div class="titlebig fadeInUp animated"></div>
						</div>
			
					</div>
				</div>
			</div>
		</div>
		
		<div class="row ">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
		
				<div id="quizzie">
					
								<div class="quiz-step step1 bgstep1">
									<div class="row">
										<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 top_div">
											<div class="box_desc2 fadeInLeft animated">
												<h3 class="header"><b>Yuk, Obati Bekas Lukamu!</b></h3>
												<p>“Ngefek nggak, sih, pakai Dermatix buat gue?”<br/>
														“Kok, beda-beda hasilnya?”</p>
																							<p>
														Pengin tahu seberapa sukses Dermatix memudarkan bekas lukamu?<br/>
														Yuk, ikuti kuis ini dengan klik salah satu bagian<br/>
														tubuh yang paling rentan terkena luka di samping.
														</p>								
												<div class="boxcheckout box_next">
													<div class="checkout">CHECK IT OUT</div>
													<div class="checkout"><i class="fa fa-angle-double-right" aria-hidden="true"></i></div>
												</div>
												
											</div>
										</div>
										<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 bot_div">
											<div class="bgwoman2 fadeInLeft animated">
												<div class="wajah quiz-answer" data-quizIndex="1" data-step="intro" >
													
													<div class="descline ">WAJAH <i class="fa fa-circle-o" aria-hidden="true"></i></div>
													<div class="line"></div>
												</div>
												<div class="lengan quiz-answer" data-quizIndex="2" data-step="intro">
													<div class="line"></div>
													<div class="descline">LENGAN <i class="fa fa-circle-o" aria-hidden="true"></i></div>
													
												</div>
												<div class="perut quiz-answer" data-quizIndex="3" data-step="intro">
													
													<div class="descline" data-quizIndex="1">PERUT <i class="fa fa-circle-o" aria-hidden="true"></i></div>
													<div class="line"></div>
												</div>
												<div class="paha quiz-answer" data-quizIndex="4" data-step="intro">
													<div class="line"></div>
													<div class="descline">PAHA <i class="fa fa-circle-o" aria-hidden="true"></i></div>
													
												</div>
												<div class="kaki quiz-answer" data-quizIndex="5" data-step="intro">
													
													<div class="descline">KAKI <i class="fa fa-circle-o" aria-hidden="true"></i></div>
													<div class="line"></div>
												</div>
											</div>
											<div class="title fadeInLeft animated"></div>
										</div>
							
									</div>
									
									
								</div>
								
								
								<div class="quiz-step step2 bgstep2 bgotherstep">
									<div class="row nomargin">
									
										
										
										<div   class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bgwoman3 fadeInRight animated">
											<div class="row">
												<div   class="col-xs-12 col-sm-1 col-md-1 col-lg-1 ">
													
												</div>
												<div   class="col-xs-12 col-sm-7 col-md-7 col-lg-7 ">
													<div class="question_step2">
														<p><b>Pilih salah satu penyebab bekas luka<br/>
													yang kamu alami.</b></p>
														<div class="row">
															<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 step2_answer fadeInLeft animated quiz-answer border" data-quizIndex="1" data-step="intro1">
																<div class="box_border">
																	<img class="border"  src="assets/images/layout/global/step3/luka1.png">
																</div>
																<p>Luka bakar</p>
															</div>
															<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3  step2_answer fadeInLeft animated quiz-answer" data-quizIndex="2" data-step="intro1">
																<div class="box_border">
																	<img class="border"  src="assets/images/layout/global/step3/luka2.png">
																</div>
																<p>Alergi</p>
															</div>
															<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3  step2_answer fadeInLeft animated quiz-answer" data-quizIndex="3"data-step="intro1">
																<div class="box_border">
																	<img class="border"  src="assets/images/layout/global/step3/luka3.png">
																</div>
																<p>Tergores</p>
															</div>
															<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 step2_answer  fadeInLeft animated quiz-answer" data-quizIndex="4" data-step="intro1">
																<div class="box_border">
																	<img class="border"  src="assets/images/layout/global/step3/luka4.png">
																</div>
																<p>Luka jahit</p>
															</div>

														</div>
															<p>Selesaikan setiap pertanyaan berikutnya,<br/>
															dan cari tahu seberapa besar kemampuanmu dalam merawat bekas luka! 
															</p>
															<div class="wrap_center_next">
																<div class="boxcheckout3 box_next">
																	<div class="checkout3">NEXT <br/> <span>Klik untuk lanjut</span></div>
																	<div class=" checkout-arrow"><i class="fa fa-angle-double-right" aria-hidden="true"></i></div>
																</div>	
															</div>
															
													</div>
													
													
												</div>
												<div   class="col-xs-12 col-sm-4 col-md-4 col-lg-4 ">
													
												</div>
												
											</div>
											
											
											<div class="row">
												<div class="col-xs-12 col-sm-12 -col-md-12 col-lg-12">
													<div class="box_wrapstepluka">
														<div class="row top_div">
															<div class="col-xs-12 col-sm-6 -col-md-6 col-lg-6">
																
																
															</div>
															<div class="col-xs-12 col-sm-6 -col-md-6 col-lg-6">
																
															</div>
														</div>	
														<div class="row bot_div">
															<div class="col-xs-12 col-sm-2 -col-md-2 col-lg-2">
															</div>
															<div class="col-xs-12 col-sm-10 -col-md-10 col-lg-10">
																<div class="wraptitlestep3">
																	<div class="titlestep3 fadeInUp animated"></div>
																</div>
															</div>
														</div>
														
														
													</div>
													
												</div>
											</div>
											
											
											
										</div>
									</div>	
										
								</div>
								
								
						
								<div class="quiz-step step3 bgstep3 bgotherstep3">
									<div class="row">
									
										<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 ">
											
										</div>
										
										<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8  bgwoman4 fadeInLeft animated">
											<div class="col-xs-12 col-sm-1 col-md-1 col-lg-1 ">
											
											</div>
											<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 ">
												<div class="question_step3">
													<p>1. Kapan waktu terbaik untuk mulai mengobati <br/> bekas luka dengan menggunakan Dermatix ?</p>
													<div class="row">
														<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 step3_answer fadeInLeft animated quiz-answer" data-quizIndex="1" data-step="1">
															<p class="wrapasnwer"><span class="wralpha">a.</span><span class="wradesc">Sejak luka masih baru</span></p>
														</div>
														<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4  step3_answer fadeInLeft animated quiz-answer" data-quizIndex="2" data-step="1">
															<p class="wrapasnwer"><span class="wralpha">b.</span><span class="wradesc">Segera setelah luka kering dan sembuh</span></p>
														</div>
														<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4  step3_answer fadeInLeft animated quiz-answer" data-quizIndex="3" data-step="1">
															<p class="wrapasnwer"><span class="wralpha">c.</span><span class="wradesc">2 bulan sejak luka terjadi</span></p>
														</div>
														<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 step3_answer  fadeInLeft animated quiz-answer" data-quizIndex="4" data-step="1">
															<p class="wrapasnwer"><span class="wralpha">d.</span><span class="wradesc">3 bulan sejak luka mengering</span></p>
														</div>
													</div>
													<div class="boxcheckout3  box_next">
														<div class="checkout3 checkout6">NEXT <br/> <span>Klik untuk lanjut</span></div>
														<div class=" checkout-arrow"><i class="fa fa-angle-double-right" aria-hidden="true"></i></div>
													</div>	
												</div>
											</div>
											<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 ">
												
											</div>
											
											
											
										</div>
										
									</div>
									
									<div class="row">
										<div class="col-xs-12 col-sm-12 -col-md-12 col-lg-12">
											<div class="box_wrap">
												<div class="row top_div">
													<div class="col-xs-12 col-sm-6 -col-md-6 col-lg-6">
														
														
													</div>
													<div class="col-xs-12 col-sm-6 -col-md-6 col-lg-6">
														
													</div>
												</div>	
												<div class="row bot_div">
													<div class="col-xs-12 col-sm-2 -col-md-2 col-lg-2">
													</div>
													<div class="col-xs-12 col-sm-10 -col-md-10 col-lg-10">
														<div class="wraptitlestep3 title_new">
															<div class="titlestep3 fadeInUp animated"></div>
														</div>
													</div>
												</div>
												
												
											</div>
											
										</div>
									</div>
									
									
								</div>
							
								
								<div class="quiz-step step4 bgstep3 bgotherstep4">
									<div class="row">
									
										<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 ">
											
										</div>
										
										<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 bgwoman5 fadeInUp animated ">
											
												<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6  ">
													<div class="question_step52">
														<p>2. Sebelum melakukan terapi terhadap bekas luka, apa yang harus pertama di lakukan ?</p>
														<div class="row">
															<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 step52_answer fadeInLeft animated quiz-answer" data-quizIndex="1" data-step="2">
																<p class="wrapasnwer"><span class="wralpha">a.</span><span class="wradesc">Memijat area bekas luka agar relaks</span></p>
															</div>
															<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4  step52_answer fadeInLeft animated quiz-answer" data-quizIndex="2" data-step="2">
																<p class="wrapasnwer"><span class="wralpha">b.</span><span class="wradesc">Bersihkan bekas luka dengan air dan langsung oleskan Dermatix</p>
															</div>
															<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4  step52_answer fadeInLeft animated quiz-answer" data-quizIndex="3" data-step="2">
																<p class="wrapasnwer"><span class="wralpha">c.</span><span class="wradesc">Bersihkan bekas luka dengan air dan keringkan</p>
															</div>
															<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 step52_answer  fadeInLeft animated quiz-answer" data-quizIndex="4" data-step="2">
																<p class="wrapasnwer"><span class="wralpha">d.</span><span class="wradesc">Oleskan handbody terlebih dahulu</p>
															</div>
														</div>
														
														<div class="boxcheckout3 box_next">
															<div class="checkout3 checkout6">NEXT <br/> <span>Klik untuk lanjut</span></div>
															<div class=" checkout-arrow"><i class="fa fa-angle-double-right" aria-hidden="true"></i></div>
														</div>	
														
													</div>
												</div>	
												<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6  ">
													
												</div>
										
										</div>
									</div>	
									
									
									<div class="row">
										<div class="col-xs-12 col-sm-12 -col-md-12 col-lg-12">
											<div class="box_wrap">
												<div class="row top_div">
													<div class="col-xs-12 col-sm-6 -col-md-6 col-lg-6">
														
														
													</div>
													<div class="col-xs-12 col-sm-6 -col-md-6 col-lg-6">
														
													</div>
												</div>	
												<div class="row bot_div">
													<div class="col-xs-12 col-sm-2 -col-md-2 col-lg-2">
													</div>
													<div class="col-xs-12 col-sm-10 -col-md-10 col-lg-10">
														<div class="wraptitlestep3 title_new">
															<div class="titlestep3"></div>
														</div>
													</div>
												</div>
												
												
											</div>
											
										</div>
									</div>
									
									
								</div>
								
								
								<div class="quiz-step step4 bgstep4 bgotherstep5">
									<div class="row">
										<div class="col-xs-12 col-sm-1 col-md-1 col-lg-1  ">	
										</div>
										
										<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10  ">
											<div class="row">
												<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8  ">
													<div class="question_step4">
														<p>3. Berapa ukuran yang tepat untuk <br/>penggunaan Dermatix ?</p>
														
													</div>
												</div>	
												<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4  ">
													<div class="bgwoman6 fadeInLeft animated"></div>
												</div>
											</div>
										</div>
										
										<div class="col-xs-12 col-sm-1 col-md-1 col-lg-1  ">	
										</div>
										
										
									</div>
									<div class="row">
										<div class="col-xs-12 col-sm-2 col-md-1 col-lg-2  ">	
										</div>
										<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8  ">
											<div class="row">
												<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 step4_answer fadeInLeft animated quiz-answer" data-quizIndex="1" data-step="3">
													<img  src="assets/images/layout/global/step6/opt1.png">
													<p>a.&nbsp;  Sekitar 5 cm</p>
												</div>
												<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3  step4_answer fadeInLeft animated quiz-answer" data-quizIndex="2" data-step="3">
													<img  src="assets/images/layout/global/step6/opt2.png">
													<p>b. &nbsp; Selebar kuku</p>
												</div>
												<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3  step4_answer fadeInLeft animated quiz-answer" data-quizIndex="3" data-step="3">
													<img  src="assets/images/layout/global/step6/opt3.png">
													<p>c. &nbsp; Sebesar biji jagung</p>
												</div>
												<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 step4_answer  fadeInLeft animated quiz-answer" data-quizIndex="4" data-step="3">
													<img  src="assets/images/layout/global/step6/opt4.png">
													<p>d. &nbsp; Tidak ada ukuran khusus</p>
												</div>
												
												<div class="boxcheckout3 box_next">
													<div class="checkout3">NEXT <br/> <span>Klik untuk lanjut</span></div>
													<div class=" checkout-arrow"><i class="fa fa-angle-double-right" aria-hidden="true"></i></div>
												</div>	
											</div>
										</div>
										<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2  ">	
										</div>
									</div>
									
									<div class="row">
										<div class="col-xs-12 col-sm-12 -col-md-12 col-lg-12">
											<div class="box_wrapstep4">
												<div class="row top_div">
													<div class="col-xs-12 col-sm-6 -col-md-6 col-lg-6">
														
														
													</div>
													<div class="col-xs-12 col-sm-6 -col-md-6 col-lg-6">
														
													</div>
												</div>	
												<div class="row bot_div">
													<div class="col-xs-12 col-sm-2 -col-md-2 col-lg-2">
													</div>
													<div class="col-xs-12 col-sm-10 -col-md-10 col-lg-10">
														<div class="wraptitlestep3">
															<div class="titlestep3 fadeInUp animated"></div>
														</div>
													</div>
												</div>
												
												
											</div>
											
										</div>
									</div>
									
									
								</div>
								
								
								
								<div class="quiz-step step5 bgstep5 bgotherstep">
									<div class="row">
										<div class="col-xs-12 col-sm-1 col-md-1 col-lg-1  ">	
										</div>
										
										<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10  ">
											<div class="row">
												<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
													<div class="question_step5">
														<p>4. Bagaimana cara terbaik mengoleskan Dermatix ?</p>
														
													</div>
												</div>
											</div>
										</div>
										
										<div class="col-xs-12 col-sm-1 col-md-1 col-lg-1  ">	
										</div>
										
										
									</div>
									<div class="row">
										<div class="col-xs-12 col-sm-1 col-md-1 col-lg-1  ">	
										</div>
										<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10  ">
											<div class="row">
												<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 step4_answer fadeInDown animated quiz-answer" data-quizIndex="1" data-step="4">
													<img  src="assets/images/layout/global/step7/opt1.png">
													<p class="wrapasnwer"><span class="wralpha">a.</span><span class="wradesc2">Tipis dan merata sepanjang bekas luka</span></p>
												</div>
												<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3  step4_answer fadeInDown animated quiz-answer" data-quizIndex="2" data-step="4">
													<img  src="assets/images/layout/global/step7/opt2.png">
													<p class="wrapasnwer2"><span class="wralpha">b.</span> &nbsp; Tipis dan tidak perlu merata</p>
												</div>
												<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3  step4_answer fadeInDown animated quiz-answer" data-quizIndex="3" data-step="4">
													<img  src="assets/images/layout/global/step7/opt3.png">
													<p class="wrapasnwer2"><span class="wralpha">c.</span> &nbsp; Tebal tapi merata</p>
												</div>
												<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 step4_answer  fadeInDown animated quiz-answer" data-quizIndex="4" data-step="4">
													<img  src="assets/images/layout/global/step7/opt4.png">
													<p class="wrapasnwer2"><span class="wralpha">d.</span> &nbsp; Tidak ada cara khusus</p>
												</div>
												
												<div class="boxcheckout3 box_next">
													<div class="checkout3">NEXT <br/> <span>Klik untuk lanjut</span></div>
													<div class=" checkout-arrow"><i class="fa fa-angle-double-right" aria-hidden="true"></i></div>
												</div>	
												
											</div>
										</div>
										<div class="col-xs-12 col-sm-1 col-md-1 col-lg-1  ">	
										</div>
									</div>
									
									<div class="row">
										<div class="col-xs-12 col-sm-12 -col-md-12 col-lg-12">
											<div class="box_wrapstep4">
												<div class="row top_div">
													<div class="col-xs-12 col-sm-6 -col-md-6 col-lg-6">
														
														
													</div>
													<div class="col-xs-12 col-sm-6 -col-md-6 col-lg-6">
														
													</div>
												</div>	
												<div class="row bot_div">
													<div class="col-xs-12 col-sm-2 -col-md-2 col-lg-2">
													</div>
													<div class="col-xs-12 col-sm-10 -col-md-10 col-lg-10">
														<div class="wraptitlestep3">
															<div class="titlestep3 fadeInUp animated"></div>
														</div>
													</div>
												</div>
												
												
											</div>
											
										</div>
									</div>
									
									
								</div>
								
								
								
								
								<div class="quiz-step step6 bgstep6 bgotherstep">
									<div class="row">
										<div class="col-xs-12 col-sm-1 col-md-1 col-lg-1  ">	
										</div>
										
										<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10  ">
											<div class="row">
												<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
													<div class="question_step6">
														<p>5. Berapa kali Dermatix digunakan dalam sehari ?</p>
														
													</div>
												</div>
											</div>
										</div>
										
										<div class="col-xs-12 col-sm-1 col-md-1 col-lg-1  ">	
										</div>
										
										
									</div>
									<div class="row">
										<div class="col-xs-12 col-sm-1 col-md-1 col-lg-1  ">	
										</div>
										<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10  ">
											<div class="row">
												<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 step4_answer fadeInLeft animated quiz-answer" data-quizIndex="1" data-step="5">
													<img  src="assets/images/layout/global/step8/opt1.png">
													<p>a.&nbsp;  Cukup satu kali sehari</p>
												</div>
												<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3  step4_answer fadeInLeft animated quiz-answer" data-quizIndex="2" data-step="5">
													<img  src="assets/images/layout/global/step8/opt2.png">
													<p>b. &nbsp; Dua kali sehari</p>
												</div>
												<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3  step4_answer fadeInLeft animated quiz-answer" data-quizIndex="3" data-step="5">
													<img  src="assets/images/layout/global/step8/opt3.png">
													<p>c. &nbsp; Tiga kali sehari</p>
												</div>
												<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 step4_answer  fadeInLeft animated quiz-answer" data-quizIndex="4" data-step="5">
													<img  src="assets/images/layout/global/step8/opt4.png">
													<p>d. &nbsp; Boleh berkali kali</p>
												</div>
												
												<div class="boxcheckout3 box_next">
													<div class="checkout3">NEXT <br/> <span>Klik untuk lanjut</span></div>
													<div class=" checkout-arrow"><i class="fa fa-angle-double-right" aria-hidden="true"></i></div>
												</div>	
												
											</div>
										</div>
										<div class="col-xs-12 col-sm-1 col-md-1 col-lg-1  ">	
										</div>
									</div>
									
									<div class="row">
										<div class="col-xs-12 col-sm-12 -col-md-12 col-lg-12">
											<div class="box_wrapstep4">
												<div class="row top_div">
													<div class="col-xs-12 col-sm-6 -col-md-6 col-lg-6">
														
														
													</div>
													<div class="col-xs-12 col-sm-6 -col-md-6 col-lg-6">
														
													</div>
												</div>	
												<div class="row bot_div">
													<div class="col-xs-12 col-sm-2 -col-md-2 col-lg-2">
													</div>
													<div class="col-xs-12 col-sm-10 -col-md-10 col-lg-10">
														<div class="wraptitlestep3">
															<div class="titlestep3 fadeInUp animated"></div>
														</div>
													</div>
												</div>
												
												
											</div>
											
										</div>
									</div>
									
									
								</div>
								
								
								<div class="quiz-step step7 bgstep7 bgotherstep">
									<div class="row">
										<div class="col-xs-12 col-sm-1 col-md-1 col-lg-1  ">
	
										</div>
										
										<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10  ">
											
											<div class="row">
												<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bgkosmetik fadeInDown animated ">
													
												</div>
											</div>
											<div class="row">
												<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
													<div class="question_step7">
														<p>6. Berapa lama gel Dermatix kering dan <br/> boleh untuk digunakan bersama kosmetik ?</p>
														
													</div>
												</div>
											</div>
										</div>
										
										<div class="col-xs-12 col-sm-1 col-md-1 col-lg-1  ">	
										</div>
										
										
									</div>
									<div class="row">
										<div class="col-xs-12 col-sm-1 col-md-1 col-lg-1  ">	
										</div>
										<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10  ">
											<div class="row">
												<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 step4_answer fadeInLeft animated quiz-answer" data-quizIndex="1" data-step="6">
													<img  src="assets/images/layout/global/step9/opt1.png">
													<p>a.&nbsp;  Kurang dari 1 menit</p>
												</div>
												<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3  step4_answer fadeInLeft animated quiz-answer" data-quizIndex="2" data-step="6">
													<img  src="assets/images/layout/global/step9/opt2.png">
													<p>b. &nbsp; Bisa langsung kering</p>
												</div>
												<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3  step4_answer fadeInLeft animated quiz-answer" data-quizIndex="3" data-step="6">
													<img  src="assets/images/layout/global/step9/opt3.png">
													<p>c. &nbsp; Sekitar 2-3 menit</p>
												</div>
												<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 step4_answer  fadeInLeft animated quiz-answer" data-quizIndex="4" data-step="6">
													<img  src="assets/images/layout/global/step9/opt4.png">
													<p>d. &nbsp; Lebih dari 3 menit</p>
												</div>
												
												<div class="boxcheckout3 box_next">
													<div class="checkout3">NEXT <br/> <span>Klik untuk lanjut</span></div>
													<div class=" checkout-arrow"><i class="fa fa-angle-double-right" aria-hidden="true"></i></div>
												</div>	
											</div>
										</div>
										<div class="col-xs-12 col-sm-1 col-md-1 col-lg-1  ">	
										</div>
									</div>
									
									<div class="row">
										<div class="col-xs-12 col-sm-12 -col-md-12 col-lg-12">
											<div class="box_wrapstep4">
												<div class="row top_div">
													<div class="col-xs-12 col-sm-6 -col-md-6 col-lg-6">
														
														
													</div>
													<div class="col-xs-12 col-sm-6 -col-md-6 col-lg-6">
														
													</div>
												</div>	
												<div class="row bot_div">
													<div class="col-xs-12 col-sm-2 -col-md-2 col-lg-2">
													</div>
													<div class="col-xs-12 col-sm-10 -col-md-10 col-lg-10">
														<div class="wraptitlestep3">
															<div class="titlestep3 fadeInUp animated"></div>
														</div>
													</div>
												</div>
												
												
											</div>
											
										</div>
									</div>
									
									
								</div>
								
								
								
								
								
								
								
								<div class="quiz-step step8 bgstep8 bgotherstep">
									<div class="row">
										<div class="col-xs-12 col-sm-1 col-md-1 col-lg-1  ">	
										</div>
										
										<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10  ">
											<div class="row">
												<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
													<div class="question_step5">
														<p>7. Idealnya, berapa lama bekas luka akan<br/>
														memudar setelah menggunakan Dermatix?
														 </p>
														
													</div>
												</div>
											</div>
										</div>
										
										<div class="col-xs-12 col-sm-1 col-md-1 col-lg-1  ">	
										</div>
										
										
									</div>
									<div class="row">
										<div class="col-xs-12 col-sm-1 col-md-1 col-lg-1  ">	
										</div>
										<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10  ">
											<div class="row">
												<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 step4_answer fadeInUp animated quiz-answer" data-quizIndex="1" data-step="7">
													<img  src="assets/images/layout/global/step10/opt1.png">
													<p>a.&nbsp;  8 hari</p>
												</div>
												<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3  step4_answer fadeInUp animated quiz-answer" data-quizIndex="2" data-step="7">
													<img  src="assets/images/layout/global/step10/opt2.png">
													<p>b. &nbsp; 8 minggu</p>
												</div>
												<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3  step4_answer fadeInUp animated quiz-answer" data-quizIndex="3" data-step="7">
													<img  src="assets/images/layout/global/step10/opt3.png">
													<p>c. &nbsp; 1 bulan</p>
												</div>
												<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 step4_answer  fadeInUp animated quiz-answer" data-quizIndex="4" data-step="7">
													<img  src="assets/images/layout/global/step10/opt4.png">
													<p>d. &nbsp; 8 bulan</p>
												</div>
												
												<div class="boxcheckout3 box_next">
													<div class="checkout3">NEXT <br/> <span>Klik untuk lanjut</span></div>
													<div class=" checkout-arrow"><i class="fa fa-angle-double-right" aria-hidden="true"></i></div>
												</div>	
												
												
											</div>
										</div>
										<div class="col-xs-12 col-sm-1 col-md-1 col-lg-1  ">	
										</div>
									</div>
									
									<div class="row">
										<div class="col-xs-12 col-sm-12 -col-md-12 col-lg-12">
											<div class="box_wrapstep47">
												<div class="row top_div">
													<div class="col-xs-12 col-sm-6 -col-md-6 col-lg-6">
														
														
													</div>
													<div class="col-xs-12 col-sm-6 -col-md-6 col-lg-6">
														
													</div>
												</div>	
												<div class="row bot_div">
													<div class="col-xs-12 col-sm-2 -col-md-2 col-lg-2">
													</div>
													<div class="col-xs-12 col-sm-10 -col-md-10 col-lg-10">
														<div class="wraptitlestep3">
															<div class="titlestep3 fadeInUp animated"></div>
														</div>
													</div>
												</div>
												
												
											</div>
											
										</div>
									</div>
									
									
								</div>
								
								
								
								<div class="quiz-step step9 bgstep9 bgotherstep">
								
									
										
										<div class="row nomargin11">
											<div   class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bgwoman9 fadeInLeft animated">
												<div class="row">
													<div   class="col-xs-12 col-sm-2 col-md-2 col-lg-2 ">
														
													</div>
													<div   class="col-xs-12 col-sm-7 col-md-7 col-lg-7 ">
														<div class="question_step9">
															<p>8. Bekas luka jenis apa yang bisa diterapi oleh Dermatix?</p>
															<div class="row">
																<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 step9_answer fadeInDown animated quiz-answer" data-quizIndex="1" data-step="8">
																	<img  class="border " src="assets/images/layout/global/step11/opt1.png">
																</div>
																<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3  step9_answer fadeInDown animated quiz-answer" data-quizIndex="2" data-step="8">
																	<img class="border " src="assets/images/layout/global/step11/opt2.png">
																</div>
																<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3  step9_answer fadeInDown animated quiz-answer" data-quizIndex="3" data-step="8">
																	<img class="border " src="assets/images/layout/global/step11/opt3.png">
																</div>
																<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 step9_answer  fadeInDown animated quiz-answer" data-quizIndex="4" data-step="8">
																	<img class="border " src="assets/images/layout/global/step11/opt4.png">
																</div>

															</div>
															
															<div class="boxcheckout3 box_next">
																<div class="checkout3">NEXT <br/> <span>Klik untuk lanjut</span></div>
																<div class=" checkout-arrow"><i class="fa fa-angle-double-right" aria-hidden="true"></i></div>
															</div>	
															
														</div>
														
														
													</div>
													<div   class="col-xs-12 col-sm-3 col-md-3 col-lg-3 ">
														
													</div>
													
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-xs-12 col-sm-12 -col-md-12 col-lg-12">
												<div class="box_wrapstep11">
													<div class="row top_div">
														<div class="col-xs-12 col-sm-6 -col-md-6 col-lg-6">
															
															
														</div>
														<div class="col-xs-12 col-sm-6 -col-md-6 col-lg-6">
															
														</div>
													</div>	
													<div class="row bot_div">
														<div class="col-xs-12 col-sm-2 -col-md-2 col-lg-2">
														</div>
														<div class="col-xs-12 col-sm-10 -col-md-10 col-lg-10">
															<div class="wraptitlestep3 title_new2">
																<div class="titlestep3 fadeInUp animated"></div>
															</div>
														</div>
													</div>
													
													
												</div>
												
											</div>
										</div>
								</div>
							
								
								
								
								<div class="quiz-step step10 bgstep10 bgotherstep">
								
									
										<div class="row nomargin11">
										
											<div   class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bgwoman10 fadeInRight animated">
												<div class="row">
													<div   class="col-xs-12 col-sm-4 col-md-4 col-lg-4 ">
														
													</div>
													<div   class="col-xs-12 col-sm-4 col-md-4 col-lg-4 ">
														<div class="question_step10">
															<p>9. Maksimal, Berapa lama bekas luka dapat<br/> diterapi menggunakan Dermatix?</p>
															<div class="row">
																<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 step10_answer fadeInRight animated quiz-answer" data-quizIndex="1" data-step="9">
																	<p>&nbsp;&nbsp;a.&nbsp; &nbsp;3 bulan</p>
																</div>
																<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3  step10_answer fadeInRight animated quiz-answer" data-quizIndex="2" data-step="9">
																	<p>&nbsp;&nbsp;b.&nbsp;&nbsp;  5 bulan</p>
																</div>
																<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3  step10_answer fadeInRight animated quiz-answer" data-quizIndex="3" data-step="9">
																	<p>&nbsp;&nbsp;c.&nbsp;&nbsp;  1 tahun</p>
																</div>
																<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 step10_answer  fadeInRight animated quiz-answer" data-quizIndex="4" data-step="9">
																	<p>&nbsp;&nbsp;d.&nbsp;&nbsp;  2 tahun</p>
																</div>

															</div>
															<div class="boxcheckout3 box_next">
																<div class="checkout3 checkout6">NEXT <br/> <span>Klik untuk lanjut</span></div>
																<div class=" checkout-arrow"><i class="fa fa-angle-double-right" aria-hidden="true"></i></div>
															</div>	
															
															
														</div>
														
														
													</div>
													<div   class="col-xs-12 col-sm-4 col-md-4 col-lg-4 ">
														
													</div>
													
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-xs-12 col-sm-12 -col-md-12 col-lg-12">
												<div class="box_wrapstep11">
													<div class="row top_div">
														<div class="col-xs-12 col-sm-6 -col-md-6 col-lg-6">
															
															
														</div>
														<div class="col-xs-12 col-sm-6 -col-md-6 col-lg-6">
															
														</div>
													</div>	
													<div class="row bot_div">
														<div class="col-xs-12 col-sm-2 -col-md-2 col-lg-2">
														</div>
														<div class="col-xs-12 col-sm-10 -col-md-10 col-lg-10">
															<div class="wraptitlestep3 title_new">
																<div class="titlestep3 fadeInUp animated"></div>
															</div>
														</div>
													</div>
													
													
												</div>
												
											</div>
										</div>
								</div>
							
								
								
								<div class="quiz-step step11 bgstep11 bgotherstep11">
								
									
										
										<div class="row nomargin11">
											<div   class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bgwoman11 fadeInLeft animated">
												<div class="row">
													<div   class="col-xs-12 col-sm-4 col-md-4 col-lg-4 ">
														
													</div>
													<div   class="col-xs-12 col-sm-4 col-md-4 col-lg-4 ">
														<div class="question_step10">
															<p>10. Pada anak usia berapakah Dermatix mulai bisa digunakan?</p>
															<div class="row">
																<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 step10_answer fadeInLeft animated quiz-answer" data-quizIndex="1" data-step="10">
																	<p>&nbsp;&nbsp;a.&nbsp; &nbsp;&nbsp;&nbsp; Anak usia di atas 1 tahun</p>
																</div>
																<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3  step10_answer fadeInLeft animated quiz-answer" data-quizIndex="2" data-step="10">
																	<p>&nbsp;&nbsp;b.&nbsp;&nbsp;&nbsp;&nbsp;  Anak usia di atas 2 tahun</p>
																</div>
																<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3  step10_answer fadeInLeft animated quiz-answer" data-quizIndex="3" data-step="10">
																	<p>&nbsp;&nbsp;c.&nbsp;&nbsp;&nbsp;&nbsp;  Anak usia di atas 3 tahun</p>
																</div>
																<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 step10_answer  fadeInLeft animated quiz-answer" data-quizIndex="4" data-step="10">
																	<p>&nbsp;&nbsp;d.&nbsp;&nbsp;&nbsp;&nbsp;  Anak usia di atas 5 tahun</p>
																</div>

															</div>
															
															<div class="boxcheckout3 box_next">
																<div class="checkout3 checkout6">NEXT <br/> <span>Klik untuk lanjut</span></div>
																<div class=" checkout-arrow"><i class="fa fa-angle-double-right" aria-hidden="true"></i></div>
															</div>	
															
														</div>
														
														
													</div>
													<div   class="col-xs-12 col-sm-4 col-md-4 col-lg-4 ">
														
													</div>
													
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-xs-12 col-sm-12 -col-md-12 col-lg-12">
												<div class="box_wrapstep11">
													<div class="row top_div">
														<div class="col-xs-12 col-sm-6 -col-md-6 col-lg-6">
															
															
														</div>
														<div class="col-xs-12 col-sm-6 -col-md-6 col-lg-6">
															
														</div>
													</div>	
													<div class="row bot_div">
														<div class="col-xs-12 col-sm-2 -col-md-2 col-lg-2">
														</div>
														<div class="col-xs-12 col-sm-10 -col-md-10 col-lg-10">
															<div class="wraptitlestep3 title_new">
																<div class="titlestep3 fadeInUp animated"></div>
															</div>
														</div>
													</div>
													
													
												</div>
												
											</div>
										</div>
								</div>
							
								
								
								
								
								
								
								
								
								
								
								
				</div><!-- end quizzi-->
					
				

				<div class="bg_result" id="result_end">
					
					<div class="col-xs-12 col-sm-12 -col-md-12 col-lg-12 center logo_result" >
						<img src="assets/images/layout/global/result/logo.png"/>
					</div>
					
					<div class="row">
						<div class="col-xs-12 col-sm-12 -col-md-12 col-lg-12 " >
							<div class="row">
						
								<div class="col-xs-12 col-sm-12 -col-md-3 col-lg-3 " >
								
								</div>
								<div class="col-xs-12 col-sm-12 -col-md-6 col-lg-6 " >
									<div class="bg_persentase_result" id="results">
										<span class="number_percentage">70%</span>
										<div class="desc_result">
											<div class="wrap_teks">
												<span class="teks_info">Bekas lukamu baru bisa memudar sekitar 70% 
		Ini karena kamu kurang maksimal mengikuti
		anjuran pemakaian Dermatix.</span>
												<a href="desc_result_dermatix.php" rel="facebox" class="link_detail">Cek Lebih Lanjut</a>
												<br /><a href="/" class="link_detail">Retake quiz</a>
												
												<div class="share">
													 <!--<div id="sharefb">
														  <div id = "share_button"></div>
													 </div>
													 <div id="sharetweet">
														 <a href="https://twitter.com/share?url=/" class="twitter-share-button" data-url="http://www.siaranku.com/" data-text="Gabung Sekarang Juga Jadi Sobat Siaran! Ke @Siaranku Hanya Di Siaranku.com/Bakal Ngobrol & Seru Di Room #SIARANKU" >Tweet</a>
														
													</div>-->
												
													<div class="row">
														<div class="col-xs-4 col-sm-4 -col-md-4 col-lg-4 " >
														</div>
														
														<div class="col-xs-2 col-sm-2 -col-md-2 col-lg-2 " >
															 <div id="sharefb">
																  <div id = "share_button"></div>
															 </div>
															 
															
														</div>
														
														<div class="col-xs-2 col-sm-2 -col-md-2 col-lg-2 " >
															 <div id="sharetweet">
																 <a href="https://twitter.com/share?url=/" class="twitter-share-button" data-url="http://www.dermatix.co.id/" data-text="Ikuti dermatix quiz untuk mengetahui seberapa sensitif kulitmu#DERMATIX" >Tweet</a>
																
															 </div>
														</div>
														
														<div class="col-xs-4 col-sm-4 -col-md-4 col-lg-4 " >
														</div>
												
													</div>
												  
													
												  
												   
												</div>
											</div>
											
										</div>
										
									</div>
									
								</div>
								<div class="col-xs-12 col-sm-12 -col-md-3 col-lg-3 " >
								
								</div>
							
							</div>
							
						</div>
					</div>
					
				</div>
				
				
				
			</div>
			
		

		</div>
			
    </div><!-- /.container -->

	</div><!-- end id content -->
    

<?php


require_once("footer_dermatix.php");

?>
<script>

  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1488244427916721',
      xfbml      : true,
      version    : 'v2.6'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

   
   window.twttr = (function (d,s,id) {
			var t, js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return; js=d.createElement(s); js.id=id;
			js.src="//platform.twitter.com/widgets.js"; fjs.parentNode.insertBefore(js, fjs);
			return window.twttr || (t = { _e: [], ready: function(f){ t._e.push(f) } });
			}(document, "script", "twitter-wjs"));
		 


function fb_share() {

	FB.ui( {
		method: 'feed',
		name: 'Quiz Dermatix ',
		link: 'http://www.dermatix.co.id/',
		picture: '',
		caption: 'Ikuti dermatix quiz untuk mengetahui seberapa sensitif kulitmu',
		description: window.title_result,
		message: ''
	}, function( response ) {
			
		} 
	);
}
 
$(document).ready(function(){
	$('#share_button').on( 'click', fb_share );
}); 

</script>

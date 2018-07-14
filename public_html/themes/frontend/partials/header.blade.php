<header class="header header-two">
    <div class="header-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-md-2 col-lg-3 logo-box">
                    <div class="logo">
                        <a href="{{ URL::to('/') }}">
                            <img src="{{ assets_path('images/logo.png') }}" class="logo-img" alt="">
                        </a>
                    </div>
                </div><!-- .logo-box -->
                <div class="col-xs-6 col-md-10 col-lg-9 right-box">
                    <div class="right-box-wrapper">
                        <div class="header-icons">
                            <div class="search-header hidden-600">
                                <a href="#">
                                    <svg x="0" y="0" width="16px" height="16px" viewBox="0 0 16 16" enable-background="new 0 0 16 16" xml:space="preserve">
                                        <path d="M12.001,10l-0.5,0.5l-0.79-0.79c0.806-1.021,1.29-2.308,1.29-3.71c0-3.313-2.687-6-6-6C2.687,0,0,2.687,0,6
                                        s2.687,6,6,6c1.402,0,2.688-0.484,3.71-1.29l0.79,0.79l-0.5,0.5l4,4l2-2L12.001,10z M6,10c-2.206,0-4-1.794-4-4s1.794-4,4-4
                                        s4,1.794,4,4S8.206,10,6,10z"></path>
                                        <image src="img/png-icons/search-icon.png" alt="" width="16" height="16" style="vertical-align: top;">
				                    </svg>
                                </a>
                            </div><!-- .search-header -->
                        </div><!-- .header-icons -->

                        <div class="primary">
                            <div class="navbar navbar-default" role="navigation">
                                <button type="button" class="navbar-toggle btn-navbar collapsed" data-toggle="collapse" data-target=".primary .navbar-collapse">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>

                                <nav class="collapse collapsing navbar-collapse">
                                    <ul id="nav" class="nav navbar-nav navbar-center">
                                        <li>
                                            <a href="{{ URL::to('/') }}">Home</a>
                                        </li>
                                        <li class="parent">
                                            <a href="{{ URL::to('talk-about-scar') }}">Talk About Scar</a>
                                            <ul class="sub">
                                                <!-- <li><a href="{{ URL::to('scargame') }}">Scar Game</a></li>
                                                <li><a href="{{ URL::to('videocompetition') }}">Behind The Scar</a></li> -->
                                                <li><a href="{{ URL::to('scarpersonality') }}">Scar Personality Quiz</a></li>
                                                <li><a href="{{ URL::to('talk-about-scar') }}#articles">Articles</a></li>
                                                <li><a href="{{ URL::to('talk-about-scar') }}#stories">Stories Of Scar</a></li>
                                                <li><a href="{{ URL::to('talk-about-scar') }}#quickfact">Quick Fact</a></li>
                                            </ul>
                                        </li>
                                        <li class="parent">
                                            <a href="{{ URL::to('identify-dermatix') }}">Identify Dermatix</a>
                                            <ul class="sub">
                                                <li><a href="{{ URL::to('identify-dermatix') }}#article-about-derma">Apa itu Dermatix ?</a></li>
                                                <li><a href="{{ URL::to('identify-dermatix') }}#excellence">Keunggulan Dermatix<sup>&reg;</sup> Ultra</a></li>
                                                <li><a href="{{ URL::to('identify-dermatix') }}#scar">Bekas luka yang bisa diterapi</a></li>
                                                <li><a href="{{ URL::to('identify-dermatix') }}#application">Cara Pakai Dermatix<sup>&reg;</sup></a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="{{ URL::to('where-to-find') }}">Where To Find Dermatix</a>
                                        </li>
                                        <li>
                                            <a href="{{ URL::to('clinical-evidence') }}">Clinical Evidence</a>
                                        </li>
                                        <li class="parent">
                                            <a href="{{ URL::to('news-event') }}">News & Events</a>
                                            <ul class="sub">
                                                <li><a href="{{ URL::to('news-event') }}#news">News</a></li>
                                                <li><a href="{{ URL::to('news-event') }}#events">Events</a></li>
                                            </ul>
                                        </li>
                                        {{--<form action="{{ URL::to('search') }}" method="get" class="select2-search showU768 inputSearchMobile">--}}
                                            {{--<input type="text" class="select2-input" id="s2id_autogen2_search" placeholder="Search" name="q">--}}
                                        {{--</form>--}}
                                    </ul>
                                    {{--<a href="#" id="searchForm" class="icon-search">--}}
                                        {{--<i class="fa fa-search fa-lg"></i>--}}
                                    {{--</a>--}}
                                    {{--<form action="{{ URL::to('search') }}" method="get" class="select2-search inputSearch">--}}
                                        {{--<input type="text" class="select2-input" id="s2id_autogen2_search" placeholder="Search" name="q">--}}
                                        {{--<button type="submit"><i class="fa fa-search fa-lg"></i></button>--}}
                                    {{--</form>--}}
                                </nav>
                            </div>
                        </div><!-- .primary -->
                    </div>
                </div>
                <div class="search-active col-sm-9 col-md-9">
                    <a href="#" class="close"><span>close</span>×</a>
                    <form action="{{ URL::to('search') }}" method="get" name="search-form" class="search-form">
                        <input class="search-string form-control" type="search" placeholder="Search here" name="q">
                        <button class="search-submit">
                            <svg x="0" y="0" width="16px" height="16px" viewBox="0 0 16 16" enable-background="new 0 0 16 16" xml:space="preserve">
                                <path fill="#231F20" d="M12.001,10l-0.5,0.5l-0.79-0.79c0.806-1.021,1.29-2.308,1.29-3.71c0-3.313-2.687-6-6-6C2.687,0,0,2.687,0,6
                                s2.687,6,6,6c1.402,0,2.688-0.484,3.71-1.29l0.79,0.79l-0.5,0.5l4,4l2-2L12.001,10z M6,10c-2.206,0-4-1.794-4-4s1.794-4,4-4
                                s4,1.794,4,4S8.206,10,6,10z"></path>
                                <image src="img/png-icons/search-icon.png" alt="" width="16" height="16" style="vertical-align: top;">
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header> <!-- header -->
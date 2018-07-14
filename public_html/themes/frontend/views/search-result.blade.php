<header class="page-header">
    <div class="container">
        <h1 class="title">Search Results</h1>
    </div>
</header>

<div class="container">
    <div class="row">
        <div class="content search-result list col-sm-12 col-md-12">
            <form action="{{ URL::to('search') }}" method="get" class="search-form">
                <input class="search-string form-control" type="search" placeholder="Search here" name="q" value="{{ Request::get('q') }}">
                <button class="search-submit">
                    <svg x="0" y="0" width="16px" height="16px" viewBox="0 0 16 16" enable-background="new 0 0 16 16" xml:space="preserve">
			  <path fill="#231F20" d="M12.001,10l-0.5,0.5l-0.79-0.79c0.806-1.021,1.29-2.308,1.29-3.71c0-3.313-2.687-6-6-6C2.687,0,0,2.687,0,6
			  s2.687,6,6,6c1.402,0,2.688-0.484,3.71-1.29l0.79,0.79l-0.5,0.5l4,4l2-2L12.001,10z M6,10c-2.206,0-4-1.794-4-4s1.794-4,4-4
			  s4,1.794,4,4S8.206,10,6,10z"></path>
			</svg>
                </button>
            </form>
        </div>
    </div>
    <hr style="margin-top:0;">
    <div class="row">
        @if(count($results) > 0)
            @foreach($results as $result)
                <article class="post col-sm-6 col-md-6">
                    <div class="row">
                        <div class="col-sm-4 post-tmbn">
                            <img src="{{ $result['image'] }}" alt="" class="img-circle">
                        </div>
                        <div class="col-sm-8">
                            <h2 class="entry-title"><a href="{{ URL::to($result['url']) }}">{{ $result['title'] }}</a></h2>
                            <div class="entry-content">
                                <footer class="entry-meta">
                                    <span class="time">{{ Str::title($result['type']) }}</span>
                                </footer>
                                <div class="read-more">
                                    <a href="{{ URL::to($result['url']) }}">Baca Selengkapnya<img src="{{ assets_path('images/btn-readmore.png') }}" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach
        @else
            <h3 class="text-center">No Results Found</h3>
        @endif

    </div>
</div>
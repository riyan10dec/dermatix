<?php
Theme::breadcrumb()
        ->add('Home', URL::to('/'))
        ->add('Talk About Scar', URL::to('talk-about-scar'))
        ->add('Articles About Scar', URL::to('article-scar'));
?>
<section id="articles">
    <header class="page-header">
        <div class="container">
            <h1 class="title">Articles About Scar</h1>
        </div>
    </header>

    <div class="container">
        <div class="content blog row">
            <?php $i = 1; ?>
            @foreach($articles as $article)
                <article class="post col-sm-6">
                        <div class="col-sm-4 post-tmbn">
                            <img src="{{ $article->image->url('thumb') }}" alt="" class="img-circle imgAuto">
                        </div>
                        <div class="col-sm-8 col-xs-12">
                            <h2 class="entry-title"><a href="{{ URL::to('article/'.$article->slug) }}">{{ $article->title }}</a></h2>
                            <footer class="entry-meta">
                                <span class="time">{{ date('d.m.Y', strtotime($article->created_at)) }}</span>
                                <!-- <span class="separator">|</span>
                                <span class="meta">Posted in <a href="#">Scar</a>, <a href="#">Activity</a></span> -->
                            </footer>
                            <div class="entry-content">
                                {{ tagline($article->body, 80) }}
                                <div class="read-more">
                                    <a href="{{ URL::to('article/'.$article->slug) }}">Baca Selengkapnya<img src="{{ assets_path('images/btn-readmore.png') }}" alt=""></a>
                                </div>
                            </div>
                        </div>
                </article><!-- .post -->
                <!-- @if($i % 2 == 0)
                    </div>
                    <div class="content blog row">
                @endif -->
                <?php $i++; ?>
            @endforeach
        </div>
        <div class="pagination-box text-center">
            {{ $articles->links() }}
        </div><!-- .pagination-box -->
    </div>
</section>
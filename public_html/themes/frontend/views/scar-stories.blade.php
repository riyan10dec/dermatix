<?php
Theme::breadcrumb()
        ->add('Home', URL::to('/'))
        ->add('Talk About Scar', URL::to('talk-about-scar'))
        ->add('Scar Stories', URL::to('scar-stories'));
?>
<section id="stories" class="content col-sm-12 col-md-12 p-x-y_verySmall">
    <header class="page-header">
        <div class="container">
            <h1 class="title">Scar Stories</h1>
        </div>
    </header>

    <div class="container">
        <div class="mt-50 text-center row grid">
            <div class="col-sm-4 col-md-2 grid-sizer"></div>
            @foreach($stories as $story)
            <div class="col-sm-4 col-md-2 grid-item">
                <a href="{{ URL::to('story/'.$story->slug) }}" class="inner">
                    <img src="{{ $story->image->url('thumb') }}" alt="" class="" width="270" height="270">
                    <div class="meta">
                        <span class="title">{{ $story->title }}</span>
                        <p class="description">
                            {{ Str::limit(strip_tags($story->body), 120, '...') }}
                        </p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <div class="pagination-box text-center">
            {{ $stories->links() }}
        </div><!-- .pagination-box -->
    </div>
</section>
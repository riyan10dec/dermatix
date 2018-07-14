<?php
Theme::breadcrumb()
        ->add('Home', URL::to('/'))
        ->add('News & Update', URL::to('news-update'))
        ->add('Detail Upcoming Events', URL::to('upcoming-event'));
?>
<section id="detail-up-events">
    <header class="page-header">
        <div class="container">
            <h1 class="title">Detail Upcoming Events</h1>
        </div>
    </header>
    <div class="container">
        <div class="row">
            <div class="content blog blog-post col-sm-8 col-md-8">
                <article class="post">
                    <div class="entry-content">
                        <p class="text-justify">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                        <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sagittis, eros a suscipit sodales, tortor nibh rhoncus est, vel vestibulum velit metus id erat. Duis eu nibh nunc, non dapibus velit. Pellentesque hendrerit orci dolor. Ut et risus nisi. Mauris nisi quam, aliquam sed tristique in, euismod eu urna. Integer tincidunt condimentum odio, a consequat nibh tempus et. Nulla vulputate felis ut leo varius vehicula. </p>
                    </div>
                    <footer class="entry-meta">
                        <span class="autor-name">Mike Example</span>,
                        <span class="time">03.11.2012</span>
                        <span class="separator">|</span>
                        <span class="meta">Posted in <a href="#">Sports</a>, <a href="#">Movies</a></span>
                    </footer>
                </article><!-- .post -->

                <h3 class="title slim">Leave a Reply</h3>

                <div id="disqus_thread"></div>
                <script type="text/javascript">
                    /* * * CONFIGURATION VARIABLES * * */
                    var disqus_shortname = 'dermatix';

                    /* * * DON'T EDIT BELOW THIS LINE * * */
                    (function() {
                        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                    })();
                </script>
                <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
            </div>
            <div id="sidebar" class="sidebar col-sm-4 col-md-4">
                <aside class="widget menu">
                    <header class="page-header">
                        <h3 class="title">Latest News & Events</h3>
                    </header>
                    <nav class="mb30">
                        <ul>
                            <li><a href="#">AOCOG stands for Asian & Oceanic Congress of Obstetrics & Gynecology</a></li>
                            <li><a href="#">PIT IKABI 2013</a></li>
                            <li><a href="#">HOSPITAL ROADSHOW 2013</a></li>
                            <li><a href="#">ASIAN SCAR FORUM 2013</a></li>
                            <li><a href="#">HOSPITAL MEDIA WORKSHOP</a></li>
                        </ul>
                    </nav>
                    <header class="page-header">
                        <h3 class="title">Archieve</h3>
                    </header>
                    <nav>
                        <ul>
                            <li class="parent">
                                <a href="#"><span class="open-sub"></span>2013</a>
                                <ul class="sub">
                                    <li class="active"><a href="#">AOCOG stands for Asian & Oceanic Congress of Obstetrics & Gynecology</a></li>
                                    <li><a href="#">PIT IKABI 2013</a></li>
                                    <li><a href="#">HOSPITAL ROADSHOW 2013</a></li>
                                    <li><a href="#">ASIAN SCAR FORUM 2013</a></li>
                                    <li><a href="#">HOSPITAL MEDIA WORKSHOP</a></li>
                                    <li><a href="#">Press Conference</a></li>
                                </ul>
                            </li>
                            <li class="parent">
                                <a href="#"><span class="open-sub"></span>2012</a>
                                <ul class="sub">
                                    <li class="active"><a href="#">KOGI 2012</a></li>
                                    <li><a href="#">Media Workshop I</a></li>
                                    <li><a href="#">1st Jakarta Annual Surgical Symposia</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </aside>
            </div>
        </div>
    </div><!-- .container -->

</section>
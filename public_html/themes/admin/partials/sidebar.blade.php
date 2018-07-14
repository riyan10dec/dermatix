<aside id="sidebar-left" class="sidebar-left">

    <div class="sidebar-header">
        <div class="sidebar-title">
            Navigation
        </div>
        <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>

    <div class="nano">
        <div class="nano-content">
            <nav id="menu" class="nav-main" role="navigation">
                <ul class="nav nav-main">
                    <li>
                        <a href="{{ URL::to('admin') }}">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::route('admin.articles.index') }}">
                            <i class="fa fa-file-text-o" aria-hidden="true"></i>
                            <span>Articles</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::route('admin.stories.index') }}">
                            <i class="fa fa-book" aria-hidden="true"></i>
                            <span>Stories</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::route('admin.events.index') }}">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                            <span>Events</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::route('admin.locations.index') }}">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <span>Locations</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::route('admin.banners.index') }}">
                            <i class="fa fa-flag" aria-hidden="true"></i>
                            <span>Banner Management</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

    </div>

</aside>
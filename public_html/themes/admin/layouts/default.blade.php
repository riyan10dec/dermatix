<!DOCTYPE html>
<html class="fixed sidebar-left-xs">
    <head>
        <title>{{ $title }}</title>
        <meta charset="utf-8">
        <meta name="keywords" content="{{ Theme::get('keywords') }}">
        <meta name="description" content="{{ Theme::get('description') }}">
        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <!-- Web Fonts  -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

        {{ Theme::asset()->styles() }}
        {{ Rapyd::styles() }}
        {{ Theme::asset()->scripts() }}
    </head>
    <body>
        <section class="body">
            <!-- start: header -->
                {{ Theme::partial('header') }}
            <!-- end: header -->

            <div class="inner-wrapper">
                <!-- start: sidebar -->
                {{ Theme::partial('sidebar') }}
                <!-- end: sidebar -->

                <section role="main" class="content-body">
                    <header class="page-header">
                        <h2>{{ Theme::getTitle() }}</h2>

                        <div class="right-wrapper pull-right mr-lg">
                            {{ Theme::breadcrumb()->render() }}

                            {{--<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>--}}
                        </div>
                    </header>

                    <!-- start: page -->
                    {{ Theme::content() }}
                    <!-- end: page -->
                </section>
            </div>
        </section>

        {{ Theme::asset()->container('footer')->scripts() }}
        {{ Rapyd::scripts() }}
    </body>
</html>
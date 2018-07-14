<!DOCTYPE html>
<html>
<head>
    <title>{{ Theme::get('title') }}</title>
    <meta charset="utf-8">
    <meta name="keywords" content="dermatix">
    <meta name="description" content="Dermatix">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ assets_path('images/favicon.png') }}">
    <link rel="apple-touch-icon" href="assets/images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/images/apple-touch-icon-114x114.png">

    <!-- Web Fonts  -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    
    <!-- Vendor CSS -->
    {{ Theme::asset()->styles() }}

            <!-- Head Libs -->
    {{ Theme::asset()->scripts() }}

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-68478376-1', 'auto');
      ga('send', 'pageview');

    </script>
</head>
<body id="{{ Theme::get('ext-id') }}" class="fixed-header fixed-sidebar {{ Theme::get('ext-class') }}">
<div class="page-box">
    <div class="page-box-content">

        <!-- Preloader -->
        <!-- <div class="loader"></div> -->
        <!--/ End Preloader -->

        <!-- Header -->
        {{ Theme::partial('header') }}
                <!--/ End Header -->

        <!-- Main Content-->
        <!-- slider -->
        @if(Theme::getSlider())
        {{ Theme::partial('slider') }}
        @endif
                <!--/ end slider -->

        <!-- breadcrumbs -->
        @if(Request::url() != URL::to('/'))
        {{ Theme::breadcrumb()->render() }}
        @endif
        <!--/ end breadcrumbs -->

        <section id="main">
            {{ Theme::content() }}
        </section>
        <!--/ End Main Content -->

        <!-- Footer -->
        {{ Theme::partial('footer') }}
                <!--/ End Footer -->

    </div>
</div>

{{ Theme::asset()->container('footer')->scripts() }}

{{ Theme::get('ext-script') }}
{{--<script>--}}
{{--(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){--}}
{{--(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),--}}
{{--m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)--}}
{{--})(window,document,'script','//www.google-analytics.com/analytics.js','ga');--}}

{{--ga('create', 'UA-61868854-1', 'auto');--}}
{{--ga('send', 'pageview');--}}

{{--</script>--}}
</body>
</html>
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
    <section class="body-sign">
        <div class="center-sign">
            <a href="#" class="logo pull-left">
                <img src="{{ Theme::asset()->url('images/logo.png') }}" height="54" alt="Porto Admin" />
            </a>
            {{ Theme::content() }}
        </div>
    </section>

{{ Theme::asset()->container('footer')->scripts() }}
{{ Rapyd::scripts() }}
</body>
</html>
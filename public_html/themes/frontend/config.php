<?php

use App\Modules\Banners\Models\Banner;
use Teepluss\Theme\Facades\Theme;

return array(

    /*
    |--------------------------------------------------------------------------
    | Inherit from another theme
    |--------------------------------------------------------------------------
    |
    | Set up inherit from another if the file is not exists,
    | this is work with "layouts", "partials", "views" and "widgets"
    |
    | [Notice] assets cannot inherit.
    |
    */

    'inherit' => null, //default

    /*
    |--------------------------------------------------------------------------
    | Listener from events
    |--------------------------------------------------------------------------
    |
    | You can hook a theme when event fired on activities
    | this is cool feature to set up a title, meta, default styles and scripts.
    |
    | [Notice] these event can be override by package config.
    |
    */

    'events' => array(

        // Before event inherit from package config and the theme that call before,
        // you can use this event to set meta, breadcrumb template or anything
        // you want inheriting.
        'before' => function($theme)
        {
            $banners = Banner::all();
            Theme::share('banners', $banners);

            // Breadcrumb template.
             $theme->breadcrumb()->setTemplate('
                <div class="breadcrumb-box">
                    <div class="container">
                         <ul class="breadcrumb">
                         @foreach ($crumbs as $i => $crumb)
                             @if ($i != (count($crumbs) - 1))
                             <li><a href="{{ $crumb["url"] }}">{{ $crumb["label"] }}</a></li>
                             @else
                             <li class="active">{{ $crumb["label"] }}</li>
                             @endif
                         @endforeach
                         </ul>
                    </div>
                </div>
             ');
        },

        // Listen on event before render a theme,
        // this event should call to assign some assets,
        // breadcrumb template.
        'beforeRenderTheme' => function($theme)
        {
            //Vendor CSS
            $theme->asset()->usePath()->add('bootstrap', 'vendors/bootstrap/css/bootstrap.css');
            $theme->asset()->usePath()->add('font-awesome', 'vendors/font-awesome/css/font-awesome.min.css');
            $theme->asset()->usePath()->add('settings', 'vendors/progressive/css/settings.css');
            $theme->asset()->usePath()->add('fancybox-css', 'vendors/progressive/css/jquery.fancybox.css');
            $theme->asset()->usePath()->add('animate', 'vendors/progressive/css/animate.css');
            $theme->asset()->usePath()->add('magnific-popup-css', 'vendors/magnific-popup/magnific-popup.css');
            $theme->asset()->usePath()->add('owl-carousel-css', 'vendors/owl-carousel/owl.carousel.css');
            $theme->asset()->usePath()->add('owl-carousel-theme', 'vendors/owl-carousel/owl.theme.css');
            // $theme->asset()->usePath()->add('pace-theme', 'vendors/pace/themes/blue/pace-theme-loading-bar.css');
            $theme->asset()->usePath()->add('select2-css', 'vendors/select2/select2.css');
            $theme->asset()->usePath()->add('fileUpload', 'vendors/bootstrap-fileinput/css/fileinput.min.css');
            $theme->asset()->usePath()->add('rrssbcss', 'vendors/rrssb/css/rrssb.css');

            //Main Style
            // $theme->asset()->usePath()->add('preloader', 'stylesheets/preloader.css');
            $theme->asset()->usePath()->add('main-css', 'stylesheets/style.css');
            $theme->asset()->usePath()->add('custom', 'stylesheets/custom.css');
            $theme->asset()->usePath()->add('responsive', 'stylesheets/responsive.css');


            //Head Libs
            $theme->asset()->usePath()->add('jquery', 'vendors/jquery/jquery.js');
            $theme->asset()->usePath()->add('modernizr', 'vendors/modernizr/modernizr.js');

            // Vendor Js
            $theme->asset()->container('footer')->usePath()->add('bootstrap-js', 'vendors/bootstrap/js/bootstrap.js');
            $theme->asset()->container('footer')->usePath()->add('one-page-nav-js', 'vendors/progressive/js/nav-one-page/jquery.nav.js');
            $theme->asset()->container('footer')->usePath()->add('magnific-popup-js', 'vendors/magnific-popup/jquery.magnific-popup.js');
            $theme->asset()->container('footer')->usePath()->add('fancybox-js', 'vendors/progressive/js/jquery.fancybox.pack.js');
            // $theme->asset()->container('footer')->usePath()->add('pace-js', 'vendors/pace/pace.js');
            $theme->asset()->container('footer')->usePath()->add('owl-carousel-js', 'vendors/owl-carousel/owl.carousel.js');
            $theme->asset()->container('footer')->usePath()->add('imagesloaded', 'vendors/progressive/js/jquery.imagesloaded.min.js');
            $theme->asset()->container('footer')->usePath()->add('selectBox', 'vendors/progressive/js/jquery.selectBox.min.js');
            $theme->asset()->container('footer')->usePath()->add('appear', 'vendors/progressive/js/jquery.appear.js');
            $theme->asset()->container('footer')->usePath()->add('revolution-tools', 'vendors/progressive/js/revolution/jquery.themepunch.tools.min.js');
            $theme->asset()->container('footer')->usePath()->add('revolution-js', 'vendors/progressive/js/revolution/jquery.themepunch.revolution.min.js');
            $theme->asset()->container('footer')->usePath()->add('SmoothScroll', 'vendors/progressive/js/SmoothScroll.js');
            $theme->asset()->container('footer')->usePath()->add('holder-js', 'vendors/holder/holder.min.js');
            $theme->asset()->container('footer')->usePath()->add('select2-js', 'vendors/select2/select2.js');
            $theme->asset()->container('footer')->usePath()->add('main-js', 'vendors/progressive/js/main.js');
            $theme->asset()->container('footer')->usePath()->add('fileUpload', 'vendors/bootstrap-fileinput/js/plugins/canvas-to-blob.min.js');
            $theme->asset()->container('footer')->usePath()->add('fileUpload', 'vendors/bootstrap-fileinput/js/fileinput.min.js');
            $theme->asset()->container('footer')->add('jquery-validate', 'http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js');
            $theme->asset()->container('footer')->add('masonry', 'https://cdnjs.cloudflare.com/ajax/libs/masonry/3.3.2/masonry.pkgd.min.js');

            // Theme Base, Components and Settings
            $theme->asset()->container('footer')->usePath()->add('script', 'javascript/script.js');

            // Writing an in-line script.
            $theme->asset()->writeScript('inline-script', '
                var basePath = "'.$theme->asset()->url('').'"
                var baseURL = "'.URL::to('/').'"
            ');

        },

        // Listen on event before render a layout,
        // this should call to assign style, script for a layout.
        'beforeRenderLayout' => array(

            'default' => function($theme)
            {
                // $theme->asset()->usePath()->add('ipad', 'css/layouts/ipad.css');
            }

        )

    )

);
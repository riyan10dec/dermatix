<?php

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
            // You can remove this line anytime.
            $theme->setTitle('Copyright ©  2013 - Laravel.in.th');

            // Breadcrumb template.
            $theme->breadcrumb()->setTemplate('
                <ol class="breadcrumbs">
                    <li>
                        <a href="'.URL::to('admin').'">
                            <i class="fa fa-home"></i>
                        </a>
                    </li>
                    @foreach ($crumbs as $i => $crumb)
                        @if ($i != (count($crumbs) - 1))
                            <li><a href="{{ $crumb["url"] }}">{{ $crumb["label"] }}</a></li>
                        @else
                            <li><span>{{ $crumb["label"] }}</span></li>
                        @endif
                    @endforeach
                </ol>
            ');
        },

        // Listen on event before render a theme,
        // this event should call to assign some assets,
        // breadcrumb template.
        'beforeRenderTheme' => function($theme)
        {
            // Vendor CSS
            $theme->asset()->usePath()->add('bootstrap-css', 'vendor/bootstrap/css/bootstrap.css');
            $theme->asset()->usePath()->add('font-awesome', 'vendor/font-awesome/css/font-awesome.css');
            $theme->asset()->usePath()->add('magnific-popup-css', 'vendor/magnific-popup/magnific-popup.css');
            $theme->asset()->usePath()->add('bootstrap-datepicker-css', 'vendor/bootstrap-datepicker/css/datepicker3.css');
            $theme->asset()->usePath()->add('select2-css', 'vendor/select2/select2.css');
            $theme->asset()->usePath()->add('sweetalert-css', 'vendor/sweetalert/sweetalert.css');
            $theme->asset()->usePath()->add('redactor-css', 'vendor/redactor/css/redactor.css');
            $theme->asset()->usePath()->add('jsgrid-css-main', 'vendor/jsgrid/jsgrid.min.css');
            $theme->asset()->usePath()->add('jsgrid-css-theme', 'vendor/jsgrid/jsgrid-theme.css');

            // Theme CSS
            $theme->asset()->usePath()->add('theme-css', 'stylesheets/theme.css');

            // Skin CSS
            //$theme->asset()->usePath()->add('theme-css-skin', 'stylesheets/skins/default.css');

            // Theme Custom CSS
            $theme->asset()->usePath()->add('theme-css-custom', 'stylesheets/theme-custom.css');

            // Head Libs
            $theme->asset()->usePath()->add('modernizr', 'vendor/modernizr/modernizr.js');
            $theme->asset()->usePath()->add('jquery', 'vendor/jquery/jquery.js');
            $theme->asset()->usePath()->add('jsgrid-js', 'vendor/jsgrid/jsgrid.min.js');
            $theme->asset()->usePath()->add('jsgrid-custom-field', 'javascripts/grid-field.js');

            // ---------------------------------------------------

            // Vendor JS
            $theme->asset()->container('footer')->usePath()->add('jquery-browser-mobile', 'vendor/jquery-browser-mobile/jquery.browser.mobile.js');
            $theme->asset()->container('footer')->usePath()->add('bootstrap-js', 'vendor/bootstrap/js/bootstrap.js');
            $theme->asset()->container('footer')->usePath()->add('nanoscroller', 'vendor/nanoscroller/nanoscroller.js');
            $theme->asset()->container('footer')->usePath()->add('bootstrap-datepicker-js', 'vendor/bootstrap-datepicker/js/bootstrap-datepicker.js');
            $theme->asset()->container('footer')->usePath()->add('select2-js', 'vendor/select2/select2.js');
            $theme->asset()->container('footer')->usePath()->add('redactor-js-browser', 'vendor/redactor/jquery.browser.min.js');
            $theme->asset()->container('footer')->usePath()->add('redactor-js', 'vendor/redactor/redactor.min.js');
            $theme->asset()->container('footer')->usePath()->add('sweetalert-js', 'vendor/sweetalert/sweetalert.min.js');
            $theme->asset()->container('footer')->usePath()->add('magnific-popup-js', 'vendor/magnific-popup/magnific-popup.js');
            $theme->asset()->container('footer')->usePath()->add('jquery-placeholder', 'vendor/jquery-placeholder/jquery.placeholder.js');

            // Theme Base, Components and Settings
            $theme->asset()->container('footer')->usePath()->add('theme-js', 'javascripts/theme.js');

            // Theme Custom
            $theme->asset()->container('footer')->usePath()->add('theme-js-custom', 'javascripts/theme.custom.js');

            // Theme Initialization Files
            $theme->asset()->container('footer')->usePath()->add('theme-js-init', 'javascripts/theme.init.js');
            // Partial composer.
            // $theme->partialComposer('header', function($view)
            // {
            //     $view->with('auth', Auth::user());
            // });
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
<?php

use function Ramsey\Uuid\v1;

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    |
    */

    'title' => 'Home',
    'title_prefix' => 'My Admin | ',


    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon and change tile colors.
    |
    |
    */

    'use_ico' => false,
    'use_full' => true,
    'full_mask_icon' => "#5bbad5",
    'full_theme_color' => "#000",
    'full_tile_color' => "#da532c",

    /*
    |--------------------------------------------------------------------------
    | Google Fonts
    |--------------------------------------------------------------------------
    |
    | Here you can allow or not the use of external google fonts. Disabling the
    | google fonts may be useful if your admin panel internet access is
    | restricted somehow.
    |
    |
    */

    'google_fonts' => true,


    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    |
    */

    'dashboard_url' => 'dashboard',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => false,
    'password_email_url' => false,
    'profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    |
    */

    'usermenu_header' => false,
    'usermenu_header_class' => 'text-bg-primary',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    |
    */

    'data_bs_theme' => 'dark',
    'classes_sidebar' => 'bg-body-secondary shadow-lg',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    |
    */

    'logo' => '',
    'logo_img' => 'vendor/admlte/images/logo.png',
    'logo_img_class' => 'brand-image',
    'logo_img_xl' => 'vendor/admlte/images/logo.png',
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'AdmLTE Logo',


    /*
    |--------------------------------------------------------------------------
    | loading Animation ( Deprecated )
    |--------------------------------------------------------------------------
    |
    | Here you can change the loading animation configuration.
    |
    |
    */

    // 'loading' => [
    //     'enabled' => true,
    //     'img' => [
    //         'path' => 'vendor/admlte/images/logo.png',
    //         'alt' => 'hawkiq Preloader Image',
    //         'effect' => 'animation__shake',
    //         'width' => 60,
    //         'height' => 60,
    //     ],
    // ],

    /*
    |--------------------------------------------------------------------------
    | Permission System
    |--------------------------------------------------------------------------
    |
    | This Will used to filter Menu items based on Permission System you have.
    |
    |
    */
    'permission_system' => 'gate', // Options: 'gate' or 'laratrust'

    /*
    |--------------------------------------------------------------------------
    | Card View
    |--------------------------------------------------------------------------
    |
    | This Will use card wrapping whole contents.
    |
    |
    */
    'use_card' => [
        'enabled' => true,
        'is_outline' => true,
        'color' => 'card-success',
        'fill_color' => null, // can use 'text-bg-*'
    ],


    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    |
    */

    'sidebar' => [
        [
            'type' => 'header',
            'text' => 'main.navigation',
            'permission' => null,
        ],
        [
            'type' => 'link',
            'text' => 'main.dashboard',
            'route' => 'test1',
            'icon' => 'fas fa-home',
            'active' => 'dashboard.*',
            'permission' => null,
        ],
        [
            'type' => 'link',
            'text' => 'main.level1',
            'route' => null,
            'icon' => 'fas fa-circle-fill',
            'submenu' => [
                [
                    'text' => 'main.level2',
                    'route' => null,
                    'icon' => 'fas fa-circle',
                ],
                [
                    'text' => 'main.level2',
                    'route' => null,
                    'icon' => 'fas fa-circle',
                ],
            ],
            'permission' => null,
        ],
        [
            'type' => 'link',
            'text' => 'main.another_link',
            'route' => 'test2',
            'icon' => 'fas fa-link',
            'active' => 'dashboard.*',
            'permission' => null,
        ],
    ],

    'navbar' => [
        'items' => [
            [
                'text' => 'main.dashboard',
                'route' => 'dashboard',
                'class' => 'active',
                'target' => '_blank',
                'icon' => 'fas fa-home',
                'icon_color' => 'danger',
                'active' => 'dashboard.*',
                'label' => 'label',
                'label_color' => 'warning',
                'submenu' => [],
                'permission' => null,
            ],
        ],
        'full_screen_widget' => true,

    ],


    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    |
    */


    'plugins' => [
        'Pace' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    |
    */

    'livewire' => false,
];

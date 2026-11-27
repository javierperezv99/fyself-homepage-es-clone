<?php
/**
 * Theme setup and local assets for the unofficial FySelf Spanish homepage replica.
 */
function fyself_homepage_es_setup() {
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'responsive-embeds' );
}
add_action( 'after_setup_theme', 'fyself_homepage_es_setup' );

function fyself_homepage_es_enqueue_assets() {
    $styles = [
        'assets/fyself.com/wp-content/plugins/polylang/css/build/language-switcher.min.css__q__ver=3.9.2.css',
        'assets/fyself.com/wp-content/plugins/polylang/css/build/navigation-language-switcher.min.css__q__ver=3.9.2.css',
        'assets/fyself.com/wp-content/themes/hello-elementor/assets/css/reset.css__q__ver=3.5.1.css',
        'assets/fyself.com/wp-content/themes/hello-elementor/assets/css/theme.css__q__ver=3.5.1.css',
        'assets/fyself.com/wp-content/themes/hello-elementor/assets/css/header-footer.css__q__ver=3.5.1.css',
        'assets/fyself.com/wp-content/plugins/elementor/assets/css/frontend.min.css__q__ver=4.4.2.css',
        'assets/fyself.com/wp-content/uploads/elementor/css/post-1426.css__q__ver=1795754775.css',
        'assets/fyself.com/wp-content/plugins/essential-addons-for-elementor-lite/assets/front-end/css/view/general.min.css__q__ver=6.8.9.css',
        'assets/fyself.com/wp-content/uploads/essential-addons-elementor/eael-1517.css__q__ver=1793197327.css',
        'assets/fyself.com/wp-content/plugins/elementor/assets/css/widget-image.min.css__q__ver=4.4.2.css',
        'assets/fyself.com/wp-content/plugins/elementor/assets/lib/eicons/css/elementor-icons.min.css__q__ver=5.57.0.css',
        'assets/fyself.com/wp-content/plugins/elementor/assets/lib/animations/styles/e-animation-shrink.min.css__q__ver=4.4.2.css',
        'assets/fyself.com/wp-content/plugins/elementor/assets/lib/animations/styles/fadeIn.min.css__q__ver=4.4.2.css',
        'assets/fyself.com/wp-content/plugins/elementor/assets/css/widget-social-icons.min.css__q__ver=4.4.2.css',
        'assets/fyself.com/wp-content/plugins/elementor/assets/css/conditionals/apple-webkit.min.css__q__ver=4.4.2.css',
        'assets/fyself.com/wp-content/plugins/elementor/assets/css/widget-icon-list.min.css__q__ver=4.4.2.css',
        'assets/fyself.com/wp-content/plugins/elementor/assets/css/widget-divider.min.css__q__ver=4.4.2.css',
        'assets/fyself.com/wp-content/plugins/elementor/assets/css/widget-heading.min.css__q__ver=4.4.2.css',
        'assets/fyself.com/wp-content/plugins/elementor/assets/css/widget-spacer.min.css__q__ver=4.4.2.css',
        'assets/fyself.com/wp-content/plugins/elementor/assets/css/widget-video.min.css__q__ver=4.4.2.css',
        'assets/fyself.com/wp-content/plugins/elementor/assets/css/widget-image-box.min.css__q__ver=4.4.2.css',
        'assets/fyself.com/wp-content/plugins/elementor/assets/lib/animations/styles/fadeInUp.min.css__q__ver=4.4.2.css',
        'assets/fyself.com/wp-content/plugins/elementor-pro/assets/css/modules/motion-fx.min.css__q__ver=3.35.1.css',
        'assets/fyself.com/wp-content/uploads/elementor/css/post-1849.css__q__ver=1795755273.css',
        'assets/fyself.com/wp-content/uploads/elementor/css/base-desktop.css__q__ver=6b090b193bce6.css',
        'assets/fyself.com/wp-content/uploads/elementor/css/base-mobile.css__q__ver=6b090b193bce6.css',
        'assets/fyself.com/wp-content/uploads/elementor/css/post-1517.css__q__ver=1795754777.css',
        'assets/fyself.com/wp-content/uploads/elementor/css/post-1534.css__q__ver=1795754777.css',
        'assets/fyself.com/wp-content/uploads/elementor/google-fonts/css/roboto.css__q__ver=1742502621.css',
        'assets/fyself.com/wp-content/uploads/elementor/google-fonts/css/robotoslab.css__q__ver=1742502626.css',
        'assets/fyself.com/wp-content/uploads/elementor/google-fonts/css/inter.css__q__ver=1742676476.css',
        'assets/fonts.googleapis.com/css__q__family=Raleway:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic&display=swap.css',
        'assets/fyself.com/wp-content/uploads/elementor/google-fonts/css/mulish.css__q__ver=1742677126.css',
        'assets/fyself.com/wp-content/uploads/elementor/custom-icons/icomoon/style.css__q__ver=1.0.0.css',
        'assets/page-inline.css',
    ];
    foreach ( $styles as $index => $relative_path ) {
        $file = get_theme_file_path( '/' . $relative_path );
        if ( file_exists( $file ) ) {
            wp_enqueue_style( 'fyself-homepage-es-' . $index, get_theme_file_uri( '/' . $relative_path ), [], (string) filemtime( $file ) );
        }
    }
}
add_action( 'wp_enqueue_scripts', 'fyself_homepage_es_enqueue_assets', 20 );

<?php
/** Local static replica of the public FySelf Spanish site pages. */
function fyself_homepage_es_setup() {
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'responsive-embeds' );
}
add_action( 'after_setup_theme', 'fyself_homepage_es_setup' );

function fyself_theme_pages() {
    static $pages = null;
    if ( null === $pages ) {
        $pages = require get_theme_file_path( '/pages/manifest.php' );
    }
    return $pages;
}

function fyself_current_page_info() {
    $route = (string) get_query_var( 'fyself_mirror_page' );
    if ( 'home' === $route || ( '' === $route && is_front_page() ) ) {
        return [
            'title' => 'FySelf — Encuentra tu yo digital',
            'body_class' => 'home wp-singular page-template-default page page-id-1849 wp-custom-logo wp-embed-responsive wp-theme-hello-elementor hello-elementor-default elementor-default elementor-kit-1426 elementor-page elementor-page-1849',
            'styles' => [ 'assets/page-inline.css' ],
        ];
    }
    $pages = fyself_theme_pages();
    return isset( $pages[ $route ] ) ? $pages[ $route ] : null;
}

function fyself_register_mirror_routes() {
    add_rewrite_tag( '%fyself_mirror_page%', '([^&]+)' );
    add_rewrite_rule( '^es/?$', 'index.php?fyself_mirror_page=home', 'top' );
    foreach ( array_keys( fyself_theme_pages() ) as $slug ) {
        add_rewrite_rule( '^es/' . preg_quote( $slug, '#' ) . '/?$', 'index.php?fyself_mirror_page=' . $slug, 'top' );
    }
}
add_action( 'init', 'fyself_register_mirror_routes' );

function fyself_add_mirror_query_var( $vars ) {
    $vars[] = 'fyself_mirror_page';
    return $vars;
}
add_filter( 'query_vars', 'fyself_add_mirror_query_var' );

function fyself_select_mirror_template( $template ) {
    $route = (string) get_query_var( 'fyself_mirror_page' );
    if ( 'home' === $route ) {
        return get_theme_file_path( '/front-page.php' );
    }
    if ( isset( fyself_theme_pages()[ $route ] ) ) {
        return get_theme_file_path( '/mirror-page.php' );
    }
    return $template;
}
add_filter( 'template_include', 'fyself_select_mirror_template', 99 );
add_action( 'after_switch_theme', 'flush_rewrite_rules' );

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
    ];
    $page = fyself_current_page_info();
    if ( is_array( $page ) && ! empty( $page['styles'] ) ) {
        $styles = array_merge( $styles, $page['styles'] );
    }
    foreach ( array_unique( $styles ) as $index => $relative_path ) {
        $file = get_theme_file_path( '/' . $relative_path );
        if ( file_exists( $file ) ) {
            wp_enqueue_style( 'fyself-homepage-es-' . $index, get_theme_file_uri( '/' . $relative_path ), [], (string) filemtime( $file ) );
        }
    }
}
add_action( 'wp_enqueue_scripts', 'fyself_homepage_es_enqueue_assets', 20 );

function fyself_localize_internal_links( $html ) {
    if ( ! is_string( $html ) ) {
        return $html;
    }
    $pages = fyself_theme_pages();
    $pattern = '/\b(href|action)=(["\'])(https?:\/\/(?:www\.)?fyself\.com\/es\/[^"\']*)\2/i';
    $html = preg_replace_callback( $pattern, function( $match ) use ( $pages ) {
        $url = html_entity_decode( $match[3], ENT_QUOTES | ENT_HTML5, 'UTF-8' );
        $parts = wp_parse_url( $url );
        $path = isset( $parts['path'] ) ? $parts['path'] : '/es/';
        $slug = trim( preg_replace( '#^/es/?#', '', $path ), '/' );
        if ( '' === $slug ) {
            $local_url = home_url( '/' );
        } elseif ( isset( $pages[ $slug ] ) ) {
            $local_url = get_option( 'permalink_structure' )
                ? home_url( '/es/' . $slug . '/' )
                : add_query_arg( 'fyself_mirror_page', $slug, home_url( '/' ) );
        } else {
            return $match[0];
        }
        if ( ! empty( $parts['query'] ) ) {
            $local_url .= ( false === strpos( $local_url, '?' ) ? '?' : '&' ) . $parts['query'];
        }
        if ( ! empty( $parts['fragment'] ) ) {
            $local_url .= '#' . $parts['fragment'];
        }
        return $match[1] . '=' . $match[2] . esc_url( $local_url ) . $match[2];
    }, $html );
    $home_pattern = '/\b(href|action)=(["\'])https?:\/\/(?:www\.)?fyself\.com\/\2/i';
    return preg_replace_callback( $home_pattern, function( $match ) {
        return $match[1] . '=' . $match[2] . esc_url( home_url( '/' ) ) . $match[2];
    }, $html );
}

function fyself_start_local_link_rewrite() {
    if ( is_front_page() || get_query_var( 'fyself_mirror_page' ) ) {
        ob_start( 'fyself_localize_internal_links' );
    }
}
add_action( 'template_redirect', 'fyself_start_local_link_rewrite', 0 );

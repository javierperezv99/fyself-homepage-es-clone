<?php
/** Render one bundled internal FySelf page. */
$page = fyself_current_page_info();
get_header();
if ( is_array( $page ) && ! empty( $page['template'] ) ) {
    $content_file = get_theme_file_path( '/pages/' . $page['template'] );
    if ( file_exists( $content_file ) ) {
        include $content_file;
    }
}
get_footer();

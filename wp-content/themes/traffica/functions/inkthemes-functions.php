<?php
/**
 * Theme support functions
 */
function traffica_themesupport() {
    add_theme_support('post-thumbnails');
    add_image_size('post_thumbnail', 600, 250, true);
    add_theme_support('automatic-feed-links');
    add_theme_support( "title-tag" );
    //Load languages file
    load_theme_textdomain('traffica', get_template_directory() . '/languages');
    // This theme styles the visual editor with editor-style.css to match the theme style.
    add_editor_style();
    register_nav_menu('custom_menu', __('Main Menu', 'traffica'));
}
add_action('after_setup_theme', 'traffica_themesupport');
// Add CLASS attributes to the first <ul> occurence in wp_page_menu
function traffica_add_menuclass($ulclass) {
    return preg_replace('/<ul>/', '<ul class="ddsmoothmenu">', $ulclass, 1);
}
add_filter('wp_page_menu', 'traffica_add_menuclass');
/**
 * Nav menu
 */
function traffica_nav() {
    if (function_exists('wp_nav_menu'))
        wp_nav_menu(array('theme_location' => 'custom_menu', 'container_id' => 'menu', 'menu_class' => 'ddsmoothmenu', 'fallback_cb' => 'traffica_nav_fallback'));
    else
        traffica_nav_fallback();
}
/**
 * Nav menu fallback
 */
function traffica_nav_fallback() {
    ?>
    <div id="menu">
        <ul class="ddsmoothmenu">
    <?php
    wp_list_pages('title_li=&show_home=1&sort_column=menu_order');
    ?>
        </ul>
    </div>
    <?php
}
function traffica_nav_menu_items($items) {
    if (is_home()) {
        $homelink = '<li class="current_page_item">' . '<a href="' . esc_url(home_url('/')) . '">' . HOME_TEXT . '</a></li>';
    } else {
        $homelink = '<li>' . '<a href="' . esc_url(home_url('/')) . '">' . HOME_TEXT . '</a></li>';
    }
    $items = $homelink . $items;
    return $items;
}
add_filter('wp_list_pages', 'traffica_nav_menu_items');
/**
 * Breadcrumbs whichs shows navigations of pages
 * @global type $post
 * @global type $wp_query
 * @global type $author
 */
function traffica_breadcrumbs() {
    $delimiter = '&raquo;';
    $home = __( 'Home', 'traffica' ); // text for the 'Home' link
    $before = '<span class="current">'; // tag before the current crumb
    $after = '</span>'; // tag after the current crumb
    echo '<div id="crumbs">';
    global $post;
    $homeLink = esc_url( home_url() );
    echo '<a href="' . esc_url($homeLink) . '">' . $home . '</a> ' . $delimiter . ' ';
    if ( is_category() ) {
            global $wp_query;
            $cat_obj = $wp_query->get_queried_object();
            $thisCat = $cat_obj->term_id;
            $thisCat = get_category( $thisCat );
            $parentCat = get_category( $thisCat->parent );
            if ( $thisCat->parent != 0 )
                    echo(get_category_parents( $parentCat, TRUE, ' ' . $delimiter . ' ' ));
            echo $before . __( 'Archive by category', 'traffica') . ' "' . single_cat_title( '', false ) . '"' . $after;
    }
    elseif ( is_day() ) {
            echo '<a href="' . esc_url( get_year_link( get_the_time( 'Y' ) ) ) . '">' . get_the_time( 'Y' ) . '</a> ' . $delimiter . ' ';
            echo '<a href="' . esc_url( get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) ) . '">' . get_the_time( 'F' ) . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time( 'd' ) . $after;
    } elseif ( is_month() ) {
            echo '<a href="' . esc_url( get_year_link( get_the_time( 'Y' ) ) ) . '">' . get_the_time( 'Y' ) . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time( 'F' ) . $after;
    } elseif ( is_year() ) {
            echo $before . get_the_time( 'Y' ) . $after;
    } elseif ( is_single() && !is_attachment() ) {
            if ( get_post_type() != 'post' ) {
                    $post_type = get_post_type_object( get_post_type() );
                    $slug = $post_type->rewrite;
                    echo '<a href="' . esc_url($homeLink . '/' . $slug['slug']) . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
                    echo $before . get_the_title() . $after;
            } else {
                    $cat = get_the_category();
                    $cat = $cat[0];
                    echo get_category_parents( $cat, TRUE, ' ' . $delimiter . ' ' );
                    echo $before . get_the_title() . $after;
            }
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' ) {
            $post_type = get_post_type_object( get_post_type() );
            echo $before . $post_type->labels->singular_name . $after;
    } elseif ( is_attachment() ) {
            $parent = get_post( $post->post_parent );
            $cat = get_the_category( $parent->ID );
            $cat = $cat[0];
            echo get_category_parents( $cat, TRUE, ' ' . $delimiter . ' ' );
            echo '<a href="' . esc_url( get_permalink( $parent ) ) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
            echo $before . get_the_title() . $after;
    } elseif ( is_page() && !$post->post_parent ) {
            echo $before . get_the_title() . $after;
    } elseif ( is_page() && $post->post_parent ) {
            $parent_id = $post->post_parent;
            $breadcrumbs = array();
            while ( $parent_id ) {
                    $page = get_page( $parent_id );
                    $breadcrumbs[] = '<a href="' . esc_url( get_permalink( $page->ID ) ) . '">' . get_the_title( $page->ID ) . '</a>';
                    $parent_id = $page->post_parent;
            }
            $breadcrumbs = array_reverse( $breadcrumbs );
            foreach ( $breadcrumbs as $crumb )
                    echo $crumb . ' ' . $delimiter . ' ';
            echo $before . get_the_title() . $after;
    } elseif ( is_search() ) {
            echo $before . __( 'Search results for', 'traffica' ) . ' "' . get_search_query() . '"' . $after;
    } elseif ( is_tag() ) {
            echo $before . __( 'Posts tagged ', 'traffica' ) . '"' . single_tag_title( '', false ) . '"' . $after;
    } elseif ( is_author() ) {
            global $author;
            $userdata = get_userdata( $author );
            echo $before . __( 'Articles posted by ', 'traffica' ) . $userdata->display_name . $after;
    } elseif ( is_404() ) {
            echo $before . __( 'Error 404', 'traffica' ) . $after;
    }
    if ( get_query_var( 'paged' ) ) {
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() )
                    echo ' (';
            echo __( 'Page', 'traffica' ) . ' ' . get_query_var( 'paged' );
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() )
                    echo ')';
    }
    echo '</div>';
}
/**
 * Shows posts custom image thumbnails
 * @global type $post
 * @global type $posts
 */
function traffica_main_image() {
    global $post, $posts;
    //This is required to set to Null
    $id = '';
    $the_title = '';
    // Till Here
    $permalink = get_permalink($id);
    $homeLink = get_template_directory_uri();
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    if (isset($matches [1] [0])) {
        $first_img = $matches [1] [0];
    }
    if (empty($first_img)) { //Defines a default image  
    } else {
        print "<a href='".esc_url($permalink)."'><img src='$first_img' width='598px' height='246px' class='postimg wp-post-image' alt='$the_title' /></a>";
    }
}
//For Attachment Page
/**
 * Prints HTML with meta information for the current post (category, tags and permalink).
 *
 */
function traffica_posted_in() {
// Retrieves tag list of current post, separated by commas.
    $tag_list = get_the_tag_list('', ', ');
    if ($tag_list) {
        $posted_in = THIS_ENTRY_WAS_POSTED_IN . ' .' . AND_TAGGED . ' %2$s.' . BOOKMARK_THE . ' <a href="'.esc_url('%3$s').'" title="Permalink to %4$s" rel="bookmark">' . PERMALINK . '</a>.';
    } elseif (is_object_in_taxonomy(get_post_type(), 'category')) {
        $posted_in = THIS_ENTRY_WAS_POSTED_IN . ' %1$s. ' . BOOKMARK_THE . ' <a href="'.esc_url('%3$s').'" title="Permalink to %4$s" rel="bookmark">' . PERMALINK . '</a>.';
    } else {
        $posted_in = BOOKMARK_THE . '<a href="'.esc_url('%3$s').'" title="Permalink to %4$s" rel="bookmark">' . PERMALINK . '</a>.';
    }
// Prints the string, replacing the placeholders.
    printf(
            $posted_in, get_the_category_list(', '), $tag_list, get_permalink(), the_title_attribute('echo=0')
    );
}
?>
<?php
/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * Used to set the width of images and content. Should be equal to the width the theme
 * is designed for, generally via the style.css stylesheet.
 */
if (!isset($content_width))
    $content_width = 590;

/**
 * Register widgetized areas, including two sidebars and four widget-ready columns in the footer.
 *
 * To override twentyten_widgets_init() in a child theme, remove the action hook and add your own
 * function tied to the init hook.
 *
 * @uses register_sidebar
 */
function traffica_widgets_init() {
// Area 1, located at the top of the sidebar.
    register_sidebar(array(
        'name' => PRIMARY_WIDGET,
        'id' => 'primary-widget-area',
        'description' => THE_PRIMARY_WIDGET,
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
// Area 2, located below the Primary Widget Area in the sidebar. Empty by default.
    register_sidebar(array(
        'name' => SECONDRY_WIDGET,
        'id' => 'secondary-widget-area',
        'description' => THE_SECONDRY_WIDGET,
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    // Area 3, located in the footer. Empty by default.
    register_sidebar(array(
        'name' => FIRST_FOOTER_WIDGET,
        'id' => 'first-footer-widget-area',
        'description' => THE_FIRST_FOOTER_WIDGET,
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
    // Area 4, located in the footer. Empty by default.
    register_sidebar(array(
        'name' => SECONDRY_FOOTER_WIDGET,
        'id' => 'second-footer-widget-area',
        'description' => THE_SECONDRY_FOOTER_WIDGET,
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
    // Area 5, located in the footer. Empty by default.
    register_sidebar(array(
        'name' => THIRD_FOOTER_WIDGET,
        'id' => 'third-footer-widget-area',
        'description' => THE_THIRD_FOOTER_WIDGET,
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
    // Area 6, located in the footer. Empty by default.
    register_sidebar(array(
        'name' => FOURTH_FOOTER_WIDGET,
        'id' => 'fourth-footer-widget-area',
        'description' => THE_FOURTH_FOOTER_WIDGET,
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
}

/** Register sidebars by running traffica_widgets_init() on the widgets_init hook. */
add_action('widgets_init', 'traffica_widgets_init');

/**
 * Pagination
 *
 */
function traffica_pagination($pages = '', $range = 2) {
    $showitems = ($range * 2) + 1;
    global $paged;
    if (empty($paged))
        $paged = 1;
    if ($pages == '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if (!$pages) {
            $pages = 1;
        }
    }
    if (1 != $pages) {
        echo "<ul class='paging'>";
        if ($paged > 2 && $paged > $range + 1 && $showitems < $pages)
            echo "<li><a href='" . esc_url(get_pagenum_link(1)) . "'>&laquo;</a></li>";
        if ($paged > 1 && $showitems < $pages)
            echo "<li><a href='" . esc_url(get_pagenum_link($paged - 1)) . "'>&lsaquo;</a></li>";
        for ($i = 1; $i <= $pages; $i++) {
            if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems )) {
                echo ($paged == $i) ? "<li><a href='" . esc_url(get_pagenum_link($i)) . "' class='current' >" . $i . "</a></li>" : "<li><a href='" . esc_url(get_pagenum_link($i)) . "' class='inactive' >" . $i . "</a></li>";
            }
        }
        if ($paged < $pages && $showitems < $pages)
            echo "<li><a href='" . esc_url(get_pagenum_link($paged + 1)) . "'>&rsaquo;</a></li>";
        if ($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages)
            echo "<li><a href='" . esc_url(get_pagenum_link($pages)) . "'>&raquo;</a></li>";
        echo "</ul>\n";
    }
}

/* ----------------------------------------------------------------------------------- */
/* Custom CSS Styles */
/* ----------------------------------------------------------------------------------- */

function traffica_of_head_css() {
    $output = '';
    $custom_css = traffica_get_option('traffica_customcss');
    if ($custom_css <> '') {
        $output .= $custom_css . "\n";
    }
// Output styles
    if ($output <> '') {
        $output = "<!-- Custom Styling -->\n<style type=\"text/css\">\n" . $output . "</style>\n";
        echo $output;
    }
}

add_action('wp_head', 'traffica_of_head_css');

/**
 * Returns the category id by its name
 * @param type $cat_name
 * @return type
 */
function traffica_get_category_id($cat_name) {
    $term = get_term_by('name', $cat_name, 'category');
    return $term->term_id;
}

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 */
function traffica_wp_title($title, $sep) {
    global $page, $paged;

    if (is_feed())
        return $title;

    // Add the blog name
    $title .= get_bloginfo('name');

    // Add the blog description for the home/front page.
    $site_description = get_bloginfo('description', 'display');
    if ($site_description && ( is_home() || is_front_page() ))
        $title .= " $sep $site_description";

    // Add a page number if necessary:
    if ($paged >= 2 || $page >= 2)
        $title .= " $sep " . sprintf(__('Page %s', 'traffica'), max($paged, $page));

    return $title;
}

add_filter('wp_title', 'traffica_wp_title', 10, 2);

/**
 * Front Page function starts here. The Front page overides WP's show_on_front option. So when show_on_front option changes it sets the themes front_page to 0 therefore displaying the new option
 */
function traffica_front_page_override($new, $orig) {

    if ($orig !== $new) {
        traffica_update_option('traffica_front_page', 'false');
    }
    return $new;
}

//add_filter('pre_update_option_show_on_front', 'traffica_front_page_override', 10, 2);
?>
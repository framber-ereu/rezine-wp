<?php
// Meta tags SEO
function title(){
    $sitename = get_bloginfo("name");$maxlength = 60;$maxlength = $maxlength - strlen($sitename) - 3;
    // title of article or page
    if (is_page() || is_single()) { $title = get_the_title(); }
    // title of category
    if (is_category()) { $title = single_cat_title('', false); }
    // clean title
    $title = strip_tags($title);
    $title = trim($title);
    // limit title to max characters
    if (strlen($title) > $maxlength) {
        $subtext = substr($title, 0, $maxlength - 3);
        $endspace = strrpos($subtext, ' ');
        $title = substr($subtext, 0, $endspace) . '...';
    }
    // if internal page concatenate Sitename
    if (is_page() || is_single() || is_category()) { $title = $title . " | " . $sitename;} 
    else { $title = $sitename; }
    echo $title;
}

// m:description
function description(){
    $maxlength = 160;
    $description = get_bloginfo("description");
    // description of article or page
    if (is_page() || is_single()) { $description = get_the_excerpt();}
    // description of category
    if (is_category()) { $description = category_description(); }
    // clean description
    $description = strip_tags($description);
    $description = trim($description);
    // limit description to max characters
    if (strlen($description) > $maxlength) {
        $subtext = substr($description, 0, $maxlength - 3);
        $endspace = strrpos($subtext, ' ');
        $description = substr($subtext, 0, $endspace) . '...';
    }
    echo $description;
}

// post:description
function post_description(){
    $post_description = get_the_excerpt();
    $snippet = 80;
    if(strlen($post_description) > $snippet){
        $subtext = substr($post_description, 0, $snippet - 3);
        $endspace = strrpos($subtext, ' ');
        $post_description = substr($subtext, 0, $endspace) . '...';
    }
    echo $post_description;
}

// Og:type
function webtype(){if(is_home()){ echo 'website';} else{ echo 'article';}}

// linkSingle
function url_single(){if(is_home()){ echo esc_url( home_url( '/' ) );}  else{ echo the_permalink();}}

// @ImagenDestacadas 
add_theme_support( 'post-thumbnails' );

// @Support CustomLogo
add_theme_support( 'custom-logo' );

// @Registrar estilos
function wp_enqueue_styles() {
    wp_enqueue_style( 'style', get_stylesheet_uri() );
}

add_action( 'wp_enqueue_scripts', 'wp_enqueue_styles');

// Primera imagen del post
function firstImage() {
  global $post, $posts; $first_img = ''; 
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+?src=[\'"]([^\'"]+)[\'"].*?>/i', $post->post_content, $matches);
  $first_img = $matches[1][0];
  if(empty($first_img)) {
    $first_img = "/path/to/default.png";
  }
  return $first_img;
}

// Eliminar css / javascript
function rmr_remove_wp_block_library_css() {
   wp_dequeue_style( 'wp-block-library'); // Estilos de editor de bloques
   wp_dequeue_style( 'wp-block-library-theme'); // Tema para editor de bloques
   wp_dequeue_style( 'wc-blocks-style' ); // WooCommerce
   wp_dequeue_style( 'global-styles' ); // Estilos globales
   wp_dequeue_style( 'classic-theme-styles'); // Estillos del clasico editor
}
add_action( 'wp_enqueue_scripts', 'rmr_remove_wp_block_library_css', 100 );

// Limpiar etiquetas de wordpress
function remove_headlinks() {
    remove_action( 'wp_head', 'wp_generator' );
    remove_action( 'wp_head', 'rsd_link' );
    remove_action( 'wp_head', 'wlwmanifest_link' );
    remove_action( 'wp_head', 'start_post_rel_link' );
    remove_action( 'wp_head', 'index_rel_link' );
    remove_action( 'wp_head', 'wp_shortlink_wp_head' );
    remove_action( 'wp_head', 'adjacent_posts_rel_link' );
    remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
    remove_action( 'wp_head', 'parent_post_rel_link' );
    remove_filter( 'wp_robots', 'wp_robots_max_image_preview_large');
    remove_action( 'wp_head', 'feed_links', 2 );
    remove_action( 'wp_head', 'feed_links_extra', 3 );
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
}
add_action( 'init', 'remove_headlinks' );


?>
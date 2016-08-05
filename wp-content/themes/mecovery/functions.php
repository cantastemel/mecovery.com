<?php 
//include('widgets.php');

// Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 720, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('blog-size', 720, 300, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

// Add HTML5 theme support.
function wpdocs_after_setup_theme() {
    add_theme_support( 'html5', array( 'search-form' ) );
}

// Enqueue scripts and styles.
function scripts_and_styles() {
  if (!is_admin()) {
   
    // Deregister unwanted scripts
    wp_deregister_script('jquery');
    
    // Jquery and the rest of our script in thee footer
    wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js','','',true);
    wp_register_script('jqueryForm', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.32/jquery.form.js','','',true);
    wp_register_script('jqueryFormValidate', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/jquery.validate.min.js','','',true);
    wp_register_script('placeholderJS', 'https://cdnjs.cloudflare.com/ajax/libs/placeholders/4.0.1/placeholders.jquery.min.js','','',true);
    wp_register_script( 'scripts', get_stylesheet_directory_uri() . '/assets/js/main.min.js', array(), '1.0', true );
    wp_register_script( 'mapAPI', 'https://maps.google.com/maps/api/js?key=AIzaSyAlLLrNXhqfVn9lDT238FOA2kLeABzcz3k', array(), '1.0', true );

    wp_enqueue_script('jquery');

    if ( is_page_template( 'page-signup.php' ) ) {
        wp_enqueue_script('jqueryForm');
        wp_enqueue_script('jqueryFormValidate');
        wp_enqueue_script('placeholderJS');
    }

    wp_enqueue_script('scripts');

    if ( is_page_template( 'page-about.php' ) ) {
        wp_enqueue_script('mapAPI');
    }

    // Main Stylesheet
    wp_register_style( 'styles', get_stylesheet_directory_uri() . '/assets/css/main.css', array(), '1.0', 'all' );
    wp_enqueue_style('styles');

  }
}

// Register Footer Nav Widget
register_sidebar( array(
    'name' => 'Footer Nav',
    'id' => 'footer-nav-widget',
    'description' => 'Appears in the footer area',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
) );

// Show numeric blog posts navigation
function show_numeric_posts_nav() {

    if( is_singular() )
        return;

    global $wp_query;

    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;

    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );

    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;

    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }

    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }

    echo '<div class="blog-posts-navigation"><ul>' . "\n";


    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';

        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }

    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }

    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";

        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }

    

    /** Previous Post Link */
    if ( get_previous_posts_link() ){
        printf( '<li class="prev-page post-page-nav-btn">%s</li>' . "\n", get_previous_posts_link('PREVIOUS PAGE') );
    }
    /** Next Post Link */
    if ( get_next_posts_link() ){
        printf( '<li class="next-page post-page-nav-btn">%s</li>' . "\n", get_next_posts_link('NEXT PAGE') );
    }

    echo '</ul></div>' . "\n";

}



// Register Sidebar
function textdomain_register_sidebars() {

    /* Register the primary sidebar. */
    register_sidebar(
        array(
            'id' => 'blog-sidebar',
            'name' => __( 'Blog Sidebar', 'textdomain' ),
            'description' => __( 'Sidebar for the blog', 'textdomain' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>'
        )
    );

    /* Repeat register_sidebar() code for additional sidebars. */
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Adding Filters and Actions

add_theme_support( 'menus' );
add_filter('show_admin_bar', '__return_false');
add_theme_support( 'post-thumbnails' );
add_action( 'after_setup_theme', 'wpdocs_after_setup_theme' );
add_action('wp_enqueue_scripts', 'scripts_and_styles', 100);
add_action( 'widgets_init', 'textdomain_register_sidebars' );
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Enable shortcodes on widget area

// Removing Actions
// Remove Emojis
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );




/*
    Widgets
*/

class Popular_Posts_Widget extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
            'popular_posts', // Base ID
            'Popular Posts', // Name
            array( 'description' => 'Displays popular posts for a certain post type' ) // Args
        );

        add_action('the_post', array($this, 'observe_post_views'));
        
        $this->count_key = 'post_views_count';
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) { 

        echo $args['before_widget'];
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
        } 

        $posts_to_show = intval($instance['posts_to_show']);
        $query_args = array(
            'post_type' => 'post',
            'posts_per_page' => $posts_to_show,
            'order'     => 'DESC',
            'meta_key' => $this->count_key,
            'orderby'   => 'meta_value_num'
        );

        $query = new WP_Query( $query_args );  


        echo "<ul>";
        foreach($query->posts as $post) {

            $terms = wp_get_post_terms($post->ID , 'category' );
            $terms_list = '';
            $maxTerms = sizeof($terms);
            foreach( $terms as $index => $term ) {
                if( $index == $maxTerms-1 ){
                    $terms_list .= $term->name;
                }else{
                    $terms_list .= $term->name . ', ';
                }
            }

            echo '<li><a href="'.get_the_permalink( $post->ID).'"> '.$post->post_title . '</a><br>
            <span class="posted-date">Posted on ' . mysql2date('M j Y', $post->post_date) . '</span></li>';
        };
        echo "</ul>";
        echo $args['after_widget'];
            
    } 

    public function observe_post_views() {
        if(is_singular('post')) {   

            global $post; 

            $count = get_post_meta($post->ID, $this->count_key , true);

            if ($count=='') {
                $count = 0;
                delete_post_meta($post->ID, $this->count_key);
                add_post_meta($post->ID, $this->count_key, '0');
            } else{
                $count++;
                update_post_meta($post->ID, $this->count_key, $count);
            }
 
        }
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'New title', 'text_domain' );
        $posts_to_show = ! empty( $instance['posts_to_show'] ) ? $instance['posts_to_show'] : __( '5', 'text_domain' );
        ?>
        <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        <label for="<?php echo $this->get_field_id( 'posts_to_show' ); ?>"><?php _e( 'Posts to show:' ); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'posts_to_show' ); ?>" name="<?php echo $this->get_field_name( 'posts_to_show' ); ?>" type="number" value="<?php echo esc_attr( $posts_to_show ); ?>">
        </p>
        <?php 
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['posts_to_show'] = ( ! empty( $new_instance['posts_to_show'] ) ) ? strip_tags( $new_instance['posts_to_show'] ) : '';

        return $instance;
    }

}; 

add_action('widgets_init', function(){
    register_widget('Popular_Posts_Widget');
});

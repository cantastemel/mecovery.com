<?php 


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
            'post_type' => 'blog-post',
            'posts_per_page' => $posts_to_show,
            'order'     => 'DESC',
            'meta_key' => $this->count_key,
            'orderby'   => 'meta_value_num'
        );

        $query = new WP_Query( $query_args );  



        foreach($query->posts as $post) {

            $terms = wp_get_post_terms($post->ID , 'blog-categories' );
            $terms_list = '';
            $maxTerms = sizeof($terms);
            foreach( $terms as $index => $term ) {
                if( $index == $maxTerms-1 ){
                    $terms_list .= $term->name;
                }else{
                    $terms_list .= $term->name . ', ';
                }
            }

            echo '<p><a href="'.get_the_permalink( $post->ID).'"> '.$post->post_title . '</a><br><small>' . $terms_list . '</small></p>';
        };

        echo $args['after_widget'];
            
    } 

    public function observe_post_views() {
        if(is_singular('blog-post')) {   

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
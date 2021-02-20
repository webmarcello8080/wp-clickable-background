<?php
if ( !class_exists( 'WpClickableBackgroundFrontend' ) ) {

    class WpClickableBackgroundFrontend {
        
        public function __construct(){
            if( get_option('wp-clickable-background-active') ){
                add_action( 'wp_enqueue_scripts', array( $this, 'includeJs' ) );
            }
            if(get_option('wp-clickable-background-javascript')){
                add_action('wp_footer', array( $this, 'addStaticJs' ));
            }
        }

        public function includeJs(){
            wp_enqueue_script('wp-clickable-background-js', PLUGIN_WCB_URL . 'js/clickable.min.js', array(), false, true );
            wp_localize_script('wp-clickable-background-js', 'wp_clickable_bg_data',
            array( 
                'elementClass' => esc_attr(get_option('wp-clickable-background-class')),
                'link' => esc_url(get_option('wp-clickable-background-link')),
                'mode' => esc_attr(get_option('wp-clickable-background-new')),
            ));
        }

        public function addStaticJs(){
            ?>
                <script>
                    <?= stripslashes(get_option('wp-clickable-background-javascript')); ?>
                </script>
            <?php
        }
    }
}
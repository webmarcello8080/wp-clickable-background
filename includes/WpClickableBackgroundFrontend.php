<?php
if ( !class_exists( 'WpClickableBackgroundFrontend' ) ) {

    class WpClickableBackgroundFrontend {
        
        public function __construct(){
            if( get_option('wp-clickable-background-active') ){
                add_action( 'wp_enqueue_scripts', array( $this, 'includeJs' ) );
                add_action('wp_footer', array( $this, 'addLink' ));
                add_action('wp_footer', array( $this, 'addMode' ));
            }
            if(get_option('wp-clickable-background-javascript')){
                add_action('wp_footer', array( $this, 'addStaticJs' ));
            }
        }

        public function includeJs(){
            wp_enqueue_script('wp-clickable-background-js', PLUGIN_WCB_URL . 'js/clickable.js', array(), false, true );
        }

        public function addStaticJs(){
            ?>
                <script>
                    <?= stripslashes(get_option('wp-clickable-background-javascript')); ?>
                </script>
            <?php
        }

        public function addLink(){
            ?> 
                <input type="hidden" name="hidden-link" id="wp-clickable-background-link" value="<?= esc_url(get_option('wp-clickable-background-link')); ?>" />
            <?php
        }

        public function addMode(){
            ?>
                <input type="hidden" name="hidden-mode" id="wp-clickable-background-mode" value="<?= esc_attr(get_option('wp-clickable-background-new')); ?>" />
            <?php
        }
    }
}
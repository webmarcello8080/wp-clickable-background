<?php
if ( !class_exists( 'WpClickableBackgroundModel' ) ) {

    class WpClickableBackgroundModel {

        public function setData($args){

            $active = sanitize_text_field( $args['wp-clickable-background-active'] );
            $link = esc_url_raw( $args['wp-clickable-background-link'] );
            $new = sanitize_text_field( $args['wp-clickable-background-new'] );
            $javascript = sanitize_text_field( $args['wp-clickable-background-javascript'] );

            update_option( 'wp-clickable-background-active', $active );
            update_option( 'wp-clickable-background-link', $link );
            update_option( 'wp-clickable-background-new', $new );
            update_option( 'wp-clickable-background-javascript', $javascript );

        }

        public function setMessage($message){
            update_option( 'wp-clickable-background-form-message', $message);
        }

    }
}

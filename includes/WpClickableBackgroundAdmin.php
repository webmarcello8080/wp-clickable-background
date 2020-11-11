<?php
if ( !class_exists( 'WpClickableBackgroundAdmin' ) ) {

    class WpClickableBackgroundAdmin {

        private $model;

        public function __construct(){
            add_action( 'admin_menu', array( $this, 'adminMenu' ) );
            add_action( 'admin_post', array( $this, 'adminSave' ) );

            $this->model = new WpClickableBackgroundModel;
        }

        public function adminMenu() {
            add_options_page(
                'WP Clickable Background Settings',
                'WP Clickable Background',
                'manage_options',
                'wp-clickable-background-admin',
                array( $this, 'adminPage' ),
                91
            );
        }

        public function adminPage() {
            //show the form
            include_once( PLUGIN_WCB_PATH . 'views/admin-form.php' );
        }
        
        public function adminSave(){
            // save data
            $this->model->setData($_POST);

            $this->adminRedirect();
        }

        private function adminRedirect() {
            // redirect at the end of the process
            if(isset( $_POST['_wp_http_referer'] )){
                // redirect the user to the appropriate page
                $url = sanitize_text_field(
                    wp_unslash( $_POST['_wp_http_referer'] ) // Input var okay.
                );
                // Finally, redirect back to the admin page.
                wp_safe_redirect( urldecode( $url ) );
                exit;
            }
            else{
                wp_safe_redirect( urldecode( '/wp-admin' ) );
                exit;
            }
        }
    }
}

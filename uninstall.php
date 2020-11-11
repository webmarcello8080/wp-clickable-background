<?php

if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

delete_option( 'wp-clickable-background-active' );
delete_option( 'wp-clickable-background-link' );
delete_option( 'wp-clickable-background-new' );
delete_option( 'wp-clickable-background-javascript' );
delete_option( 'wp-clickable-background-form-message');
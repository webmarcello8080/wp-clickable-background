<?php
/**
 * Plugin Name:       WP Clickable Background
 * Plugin URI:        https://github.com/webmarcello8080/wp-clickable-background
 * Description:       Wordpress Plugin in order to make the background of your website clickable.
 * Version:           1.0.0
 * Requires at least: 4.5.13
 * Requires PHP:      5.6
 * Author:            Marcello Perri
 * Author URI:        http://webmarcello.co.uk
 */

 define('PLUGIN_WCB_BASENAME', plugin_basename(__FILE__) );

foreach ( glob( plugin_dir_path( __FILE__ ) .'includes/*.php') as $filename){
    include_once $filename;
}
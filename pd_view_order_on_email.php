<?php
/*
Plugin Name: PD view order on email
Description: This plugin extends WooCommerce by adding a “Click here to go to the order page” link to customer order. Save time managing orders for your online store with this plugin. It is easy to install and there are no settings, just activate and enjoy! 
Version: 1.0
Author: Pari
*/

if(!defined('PD_VIEW_ORDER_DIR')) 
  define('PD_VIEW_ORDER_DIR', plugin_dir_path( __FILE__ ));

register_activation_hook( PD_VIEW_ORDER_DIR.'pd_view_order_on_email.php', 'view_order_Plugin_activate' );

function view_order_Plugin_activate() {

  if(is_plugin_active('woocommerce/woocommerce.php')==false)
  {
    wp_die('Sorry, you must install and activate WooCommerce', 'Error');
  }
}

add_action( 'woocommerce_email_before_order_table', 'add_link_back_to_order', 10, 2 );
function add_link_back_to_order( $order, $is_admin ) {
  if ( ! $is_admin ) 
  {
    $link_order = $order-> get_view_order_url();
    $link = '<p>';
    $link .= '<a href="'. $link_order.'" >';
    $link .= 'Click here to go to the order page';
    $link .= '</a>';
    $link .= '</p>';

    echo $link;
  }
}


?>
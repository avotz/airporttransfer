<?php


add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
   // add_theme_support( 'wc-product-gallery-lightbox' );
}


remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );


/** woocommerce **/
add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args' );
  function jk_related_products_args( $args ) {
    $args['posts_per_page'] = 4; // 4 related products
    $args['columns'] = 4; // arranged in 2 columns
    return $args;
}

/*---Move Product Title*/
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
//add_action( 'woocommerce_before_single_product_summary', 'woocommerce_template_single_title', 30);

//remove short description from sigle page
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
//add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );


remove_action( 'woocommerce_after_single_product_summary','woocommerce_output_product_data_tabs', 10 );
add_action( 'woocommerce_before_single_product_summary','woocommerce_output_product_data_tabs', 30 );

add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );
function woo_remove_product_tabs( $tabs ) {

    //unset( $tabs['description'] );  
    unset( $tabs['reviews'] );          // Remove the reviews tab
    //unset( $tabs['additional_information'] );   // Remove the additional information tab

    return $tabs;

}

//modificar tab description con la informacion short-description
add_filter( 'woocommerce_product_tabs', 'woo_custom_description_tab', 98 );
function woo_custom_description_tab( $tabs ) {

  $tabs['description']['callback'] = 'woo_custom_description_tab_content';  // Custom description callback

  return $tabs;
}

function woo_custom_description_tab_content() {
  woocommerce_get_template( 'single-product/short-description.php' );
}
//agregar tab details con la informacio de description
add_filter( 'woocommerce_product_tabs', 'woo_details_tab' );
function woo_details_tab( $tabs ) {
  
  // Adds the new tab
  
  $tabs['details'] = array(
    'title'   => __( 'Details', 'woocommerce' ),
    'priority'  => 60,
    'callback'  => 'woo_details_tab_content'
  );

  return $tabs;

}
function woo_details_tab_content() {

  // The new tab content

  //echo '<h2>New Product Tab</h2>';
  //echo '<p>Here\'s your new product tab.</p>';
  woocommerce_get_template( 'single-product/tabs/description.php' );
  
}

//agregar tab rates con la informacio de includes
add_filter('woocommerce_product_tabs', 'woo_includes_tab');
function woo_includes_tab($tabs)
{
  
  // Adds the new tab
    if (is_product() && has_term('PACKAGES', 'product_cat')) {
        $tabs['includes'] = array(
            'title' => __('Includes', 'woocommerce'),
            'priority' => 50,
            'callback' => 'woo_includes_tab_content'
        );
    }


    return $tabs;

}
function woo_includes_tab_content()
{

  // The new tab content

  //  echo '<h2>Includes</h2>';
  //echo '<p>Here\'s your new product tab.</p>';
    echo rwmb_meta('rw_includes');

}

//agregar tab rates con la informacio de mapas
add_filter('woocommerce_product_tabs', 'woo_map_tour_tab');
function woo_map_tour_tab($tabs)
{
  
  // Adds the new tab
    if (is_product() && has_term('PACKAGES', 'product_cat')) {
        $tabs['map'] = array(
            'title' => __('Map Tour', 'woocommerce'),
            'priority' => 70,
            'callback' => 'woo_map_tour_tab_content'
        );
    }


    return $tabs;

}
function woo_map_tour_tab_content()
{

  // The new tab content

   // echo '<h2>Map Tour</h2>';
  //echo '<p>Here\'s your new product tab.</p>';
    echo rwmb_meta('rw_map_tour');

}

// Hook in
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_fields( $fields ) {
     unset($fields['billing']['billing_address_1']);
     unset($fields['billing']['billing_address_2']);
     unset($fields['billing']['billing_country']);
     unset($fields['billing']['billing_city']);
   unset($fields['billing']['billing_postcode']);
   unset($fields['billing']['billing_state']);
    unset($fields['billing']['billing_company']);

   $fields['order']['order_comments']['placeholder'] = 'e.g. child seats';
    $fields['order']['order_comments']['label'] = 'Important Notes';
     

     return $fields;
}
/**
 * Add the field to the checkout
 */
 add_action( 'woocommerce_after_order_notes', 'my_custom_checkout_field' );
 
 function my_custom_checkout_field( $checkout ) {
 
     echo '<div id="tour_pickup_location">';
 
     woocommerce_form_field( 'tour_pickup_location', array(
         'type'          => 'text',
         'class'         => array('my-field-class form-row-wide'),
         'label'         => __('Pickup Location'),
         'placeholder'   => __('Pickup'),
         'required'  => true,
         ), $checkout->get_value( 'tour_pickup_location' ));
 
     /*woocommerce_form_field( 'tour_date', array(
         'type'          => 'text',
         'class'         => array('my-field-class form-row-wide'),
         'label'         => __('Tour date'),
         'placeholder'   => __('dd/mm/yyyy'),
         'required'  => true,
         'input_class' => array('datepicker')
         ), $checkout->get_value( 'tour_date' ));*/
 
     echo '</div>';
 
 }
 /**
  * Process the checkout
  */
 add_action('woocommerce_checkout_process', 'my_custom_checkout_field_process');
 
 function my_custom_checkout_field_process() {
     // Check if set, if its not set add an error.
     if ( ! $_POST['tour_pickup_location'] )
         wc_add_notice( __( '<strong>Pick up location</strong> is a required field.' ), 'error' );
 
      /*if ( ! $_POST['tour_date'] )
         wc_add_notice( __( '<strong>Tour date</strong> is a required field.' ), 'error' );*/
 }
 
 /**
  * Update the order meta with field value
  */
 add_action( 'woocommerce_checkout_update_order_meta', 'my_custom_checkout_field_update_order_meta' );
 
 function my_custom_checkout_field_update_order_meta( $order_id ) {
     if ( ! empty( $_POST['tour_pickup_location'] ) ) {
         update_post_meta( $order_id, 'Pick up location', sanitize_text_field( $_POST['tour_pickup_location'] ) );
     }
     /* if ( ! empty( $_POST['tour_date'] ) ) {
         update_post_meta( $order_id, 'Tour date', sanitize_text_field( $_POST['tour_date'] ) );
     }*/
 }
 
 /**
  * Display field value on the order edit page
  */
 add_action( 'woocommerce_admin_order_data_after_billing_address', 'my_custom_checkout_field_display_admin_order_meta', 10, 1 );
 
 function my_custom_checkout_field_display_admin_order_meta($order){
     echo '<p><strong>'.__('Pick up location').':</strong> ' . get_post_meta( $order->id, 'Pick up location', true ) . '</p>';
     //*echo '<p><strong>'.__('Tour date').':</strong> ' . get_post_meta( $order->id, 'Tour date', true ) . '</p>';**/
 }
 



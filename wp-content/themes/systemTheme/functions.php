<?php
// ------------------------------------------------------
// Lalo:  04/04/2017
// ------------------------------------------------------
//  function ur_theme_start_session()
//   {
//    if (!session_id())
//     session_start();
//   }
//  add_action("init", "ur_theme_start_session", 1);
// ------------------------------------------------------

  /**
  * ADD a new option in woocommerce dashboard 
  */
    include('new-endpoint-woocommerce/datosClientes.php');
    include('new-endpoint-woocommerce/addNewUser.php');
    include('new-endpoint-woocommerce/fichaCliente.php');
    include('new-endpoint-woocommerce/datosComerciales.php');
    include('new-endpoint-woocommerce/crearNuevoComercial.php');
    include('new-endpoint-woocommerce/datosDistribuidores.php');
    include('new-endpoint-woocommerce/crearNuevoDistribuidor.php');
    include('new-endpoint-woocommerce/createNewOrder.php');
  /**
  * ADD a new User Fields 
  */
  //include('functions/addUserFields.php');
  include('functions/CRMfunctions.php');

  // ---------------------------------------------------------------------------
  // Used to generate the Client Code before we save. The code is generated
  // based on the type of "practice" (ODO=Odontologo) + the last entry + 1
  // The code needs to be formatted as "ODO"-0001"
  // ---------------------------------------------------------------------------
  add_action( 'gform_pre_submission_3', 'generateClientCode' );
  // ---------------------------------------------------------------------------
  function generateClientCode()
   {
    global $wpdb;

    $pad   = "%'.04d\n";

    if (isset($_POST))
     {
      $preFix             = strtoupper(substr($_POST['input_2'], 0, 3)); // Get ODO, VET, etc
      $sQuery             = "SELECT max(meta_value) FROM wp_usermeta WHERE left(meta_value,3)='" . $preFix . "' AND meta_key='codClienteAuto' ";
      $autLastCode        = $wpdb->get_col($sQuery);
      $_POST['input_44']  = $preFix . '-' . formatAutCode($autLastCode[0], $pad, 1);
     }
   }
  // ---------------------------------------------------------------------------


  // ---------------------------------------------------------------------------
  // function formatAutCode($clientCode)
  // $clientCode = The returned
  // This function formats a string number with zeros to the left
  // for up to 4 chars.
  // i.e. 0001, 0022, etc.
  // ---------------------------------------------------------------------------
  // ---------------------------------------
  // formatAutCode
  // ---------------------------------------
  function formatAutCode($strValue, $pad, $incrementBy)
   {
    $strLength = strlen($strValue);
    $strStart  = strpos($strValue, "-");

    $num = intval(right($strValue, $strLength - ($strStart + 1))) + $incrementBy;

    if ($pad != '')
      $formattedStr = sprintf($pad, $num);
    else
      $formattedStr = $num;

    return $formattedStr;
   }
  // ---------------------------------------------------------------------------



// ---------------------------------------------------------------------------
// The following is used to dynamically populate the Drop-Down fo the list
// of sales people for the user to assign one to the new client.
// ---------------------------------------------------------------------------
add_filter( 'gform_pre_render_3',              'populateSalesMenDD' );
add_filter( 'gform_pre_validation_3',          'populateSalesMenDD' );
add_filter( 'gform_pre_submission_filter_3',   'populateSalesMenDD' );
add_filter( 'gform_admin_pre_render_3',        'populateSalesMenDD' );

// ---------------------------------------------------------------------------
// function populateSalesMenDD($form)
// ---------------------------------------------------------------------------
function populateSalesMenDD($form)
 {
  foreach ( $form['fields'] as &$field )
   {
    if ( $field->type != 'select' || strpos( $field->cssClass, 'comercialDropdown' ) === false )
     {
      continue;
     }

    $usuarios = get_users('orderby=nicename&role=administrator');

    $choices = array();

    foreach ( $usuarios as $comercial)
     {
      $choices[] = array( 'text' => $comercial->display_name, 'value' => $comercial->id );
     }

    $field->placeholder = 'Seleccione Un Comercial';
    $field->choices = $choices;
   }
  return $form;
 }
// ---------------------------------------------------------------------------

// ----------------------------------------
// LEFT function
// args:
//       str      = String
//       length   = how many chars you want
// ----------------------------------------
function left($str, $length)
 {
  return substr($str, 0, $length);
 }

// ----------------------------------------
// RIGHT function
// args:
//       str      = String
//       length   = how many chars you want
// ----------------------------------------
function right($str, $length)
 {
  return substr($str, -$length);
 }

// ----------------------------------------
// generateBusHours
// arguments (2):
//    $startTime - example: 8
//    $endTime   - example: 12
// ----------------------------------------
function generateBusHours($startTime, $endTime)
 {
  $timeList   = array();
  $pad        = "%'.02d\n";

  if ($startTime > $endTime)
   {
    $timeList[0] = '';
    return $timeList;
   }
  
  for ($i = $startTime; $i < ($endTime + 1); $i++)
   {
    if ($i < 10)
     $timeList[] = formatAutCode($i, $pad, 0);
    else
     $timeList[] = $i;
   }

  return $timeList;
 }


// ----------------------------------------
// getMinutesForDD
// arguments (1):
//    $increment
//    The code will create a list of
//    minutes starting at zero (0) and
//    ending at the last in the increment
//    that falls below 60.
// ----------------------------------------
function getMinutesForDD($increment)
 {
  $timeList   = array();

   for ($i = 0; $i < 60; $i+=$increment)
    $timeList[] = $i;
  return $timeList;
 }
// ----------------------------------------

// ----------------------------------------------------------------------
// getAllUserMeta
//    Parameters:
//          $userID ->  The meta information will be returned for the
//                      selected user.
//                      An Array is returned.
// ----------------------------------------------------------------------
function getAllUserMeta($userID)
 {
  return get_user_meta($userID); 
 }
// ----------------------------------------------------------------------

// ----------------------------------------
// hide gravity forms Labels
// ----------------------------------------------------------------------      
add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );

// ----------------------------------------
//  UPLOAD User meta Data
// ---------------------------------------------------------------------
function override_user_id( $user_id, $entry, $form, $feed )
{
    $user_id = rgget( 'clienteID' );
    print_r('id: ' . $user_id);
    return $user_id;
}

add_action( 'wp_enqueue_scripts', 'ajax_test_enqueue_scripts' );
function ajax_test_enqueue_scripts() {
    wp_enqueue_script( 'ajax_test', get_theme_root_uri() . '/systemTheme/ajax-test.js', array('jquery'));
    wp_localize_script('ajax_test', 'wp_ajax_tests_vars', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' )
    ));
    wp_localize_script('ajax_test','wp_ajax_tests_vars',['ajaxurl'=>admin_url('admin-ajax.php')]);
}

// Hook para usuarios no logueados
add_action('wp_ajax_nopriv_create_custom_order_arroyo', 'create_custom_order_arroyo');
// Hook para usuarios logueados
add_action('wp_ajax_create_custom_order_arroyo', 'create_custom_order_arroyo');
// Función que procesa la llamada AJAX
function create_custom_order_arroyo(){

    global $woocommerce;

    $userId = isset( $_POST['userId'] ) ? $_POST['userId'] : false;
    if ($userId && !$woocommerce->cart->is_empty()) {

        $order = wc_create_order();
        $items = $woocommerce->cart->get_cart();

        foreach($items as $item => $values) {
            $order->add_product(
                $values['data'], $values['quantity'], array(
                    'variation' => $values['variation'],
                    'totals' => array(
                        'subtotal' => $values['line_subtotal'],
                        'subtotal_tax' => $values['line_subtotal_tax'],
                        'total' => $values['line_total'],
                        'tax' => $values['line_tax'],
                        'tax_data' => $values['line_tax_data'] // Since 2.2
                    )
                )
            );
        }

        $woocommerce->cart->empty_cart();
        $woocommerce->cart->empty_cart(true);

        $addresses = getBillingAndShippingAddress($userId);

        $order->set_customer_id($userId);
        $order->set_address( $addresses['billing'], 'billing' );
        $order->set_address( $addresses['shipping'], 'shipping' );
        $order->calculate_totals();
        wp_send_json( array('message' => __('Pedido realizado con éxito| :(', 'wpduf'), 'success' =>  __( true, 'wpduf')) );
    } else if ($woocommerce->cart->is_empty()){
        wp_send_json( array('message' => __('El carrito está vacío :(', 'wpduf'), 'success' =>  __( false, 'wpduf')) );
    } else if (!$userId) {
        wp_send_json( array('message' => __('Cliente no encontrado!', 'wpduf'), 'success' =>  __( false, 'wpduf') ) );
    } else {
        wp_send_json( array('message' => __('Error!', 'wpduf') , 'success' =>  __( false, 'wpduf')) );
    }

}

function getBillingAndShippingAddress($userId) {
    $userData = get_user_meta($userId);
    $userDataWP = get_userdata($userId);
    $email = $userDataWP->user_email;

    if ($userData['dirEnvioComoFact'][0] == 'si') {
        $billingAddress = array(
            'first_name' => $userData['nombreContacto'][0],
            'last_name'  => '',
            'company'    => $userData['shipping_company'][0] == '' ? $userData['nickname'][0] : $userData['shipping_company'][0],
            'email'      => $email,
            'phone'      => $userData['telFijo1'][0],
            'address_1'  => $userData['shipping_address_1'][0] . ' ' . $userData['numCalle'][0] . ' ' . $userData['numPiso'][0],
            'address_2'  => '',
            'city'       => $userData['shipping_city'][0],
            'state'      => $userData['shipping_state'][0],
            'postcode'   => $userData['shipping_postcode'][0],
            'country'    => 'ES'
        );
    } else {
        $billingAddress = array(
            'first_name' => $userData['nombreContacto'][0],
            'last_name'  => '',
            'company'    => $userData['shipping_company'][0] == '' ? $userData['nickname'][0] : $userData['shipping_company'][0],
            'email'      => $email,
            'phone'      => $userData['telFijo1'][0],
            'address_1'  => $userData['billing_address_1'][0] . ' ' . $userData['numCalle'][0] . ' ' . $userData['numPiso'][0],
            'address_2'  => '',
            'city'       => $userData['billing_city'][0],
            'state'      => $userData['billing_state'][0],
            'postcode'   => $userData['billing_postcode'][0],
            'country'    => 'ES'
        );
    }

    $shippingAddress = array(
        'first_name' => $userData['nombreContacto'][0],
        'last_name'  => '',
        'company'    => $userData['nickname'][0],
        'address_1'  => $userData['billing_address_1'][0] . ' ' . $userData['numCalle'][0] . ' ' . $userData['numPiso'][0],
        'address_2'  => '',
        'city'       => $userData['billing_city'][0],
        'state'      => $userData['billing_state'][0],
        'postcode'   => $userData['billing_postcode'][0],
        'country'    => 'ES'
    );

    return array(
        'shipping' => $shippingAddress,
        'billing' => $billingAddress);
}


?>
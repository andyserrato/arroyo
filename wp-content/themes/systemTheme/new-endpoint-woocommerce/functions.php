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

add_filter( 'gform_user_registration_update_user_id_9', 'override_user_id', 10, 4 );
add_filter( 'gform_user_registration_update_user_id_13', 'override_user_id', 10, 4 );
add_filter( 'gform_user_registration_update_user_id_12', 'override_user_id', 10, 4 );
add_filter( 'gform_user_registration_update_user_id_14', 'override_user_id', 10, 4 );
add_filter( 'gform_user_registration_update_user_id_15', 'override_user_id', 10, 4 );
add_filter( 'gform_user_registration_update_user_id_16', 'override_user_id', 10, 4 );
?>
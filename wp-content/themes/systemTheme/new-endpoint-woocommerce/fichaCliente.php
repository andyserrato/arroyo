<?php
ob_start();
class Ficha_Cliente 
 {
  // --------------------------------------------------------------------------
  // Ficha Cliente.
  //
  // @var string
  // --------------------------------------------------------------------------
  public static $endpoint = 'ficha-cliente';
  
  // --------------------------------------------------------------------------
  // Plugin actions.
  // --------------------------------------------------------------------------
  public function __construct() 
   {
    // Actions used to insert a new endpoint in the WordPress.
    add_action( 'init', array( $this, 'add_endpoints' ) );
    add_filter( 'query_vars', array( $this, 'add_query_vars' ), 0 );

    // Change the My Accout page title.
    add_filter( 'the_title', array( $this, 'endpoint_title' ) );

    // Insering your new tab/page into the My Account page.
    add_filter( 'woocommerce_account_menu_items', array( $this, 'new_menu_items' ) );
    add_action( 'woocommerce_account_' . self::$endpoint .  '_endpoint', array( $this, 'endpoint_content' ) );
   }

  // --------------------------------------------------------------------------
  // Register new endpoint to use inside My Account page.
  //
  // @see https://developer.wordpress.org/reference/functions/add_rewrite_endpoint/
  // --------------------------------------------------------------------------
  public function add_endpoints()
   {
    add_rewrite_endpoint( self::$endpoint, EP_ROOT | EP_PAGES );
   }

  // --------------------------------------------------------------------------
  // Add new query var.
  //
  // @param array $vars
  // @return array
  // --------------------------------------------------------------------------
  public function add_query_vars( $vars )
   {
    $vars[] = self::$endpoint;

    return $vars;
   }

  // --------------------------------------------------------------------------
  // Set endpoint title.
  //
  // @param string $title
  // @return string
  // --------------------------------------------------------------------------
  public function endpoint_title( $title )
   {
    global $wp_query;

    $is_endpoint = isset( $wp_query->query_vars[ self::$endpoint ] );

    if ( $is_endpoint && ! is_admin() && is_main_query() && in_the_loop() && is_account_page() )
     {
      // New page title.
      $title = __( 'Ficha Cliente', 'woocommerce' );

      remove_filter( 'the_title', array( $this, 'endpoint_title' ) );
     }

    return $title;
   }

  // --------------------------------------------------------------------------
  // Insert the new endpoint into the My Account menu.
  //
  // @param array $items
  // @return array
  // --------------------------------------------------------------------------
  public function new_menu_items( $items )
   {
    // Remove the logout menu item.
    $logout = $items['customer-logout'];
    unset( $items['customer-logout'] );

    // Insert your custom endpoint.
    //COMENTAR LINEA DE ABAJO CUANDO SE TERMINE DE PROGRAMAR LA PAGINA LA PAGINA
    $items[ self::$endpoint ] = __( 'Ficha Cliente', 'woocommerce' );

    // Insert back the logout item.
    $items['customer-logout'] = $logout;

    return $items;
   }

  // --------------------------------------------------------------------------
  // Endpoint HTML content.
  // 
  // AGREGAR EL CODIGO AQUÍ PARA QUE APAREZCA LA INFORMACION
  // 
  // --------------------------------------------------------------------------
function endpoint_content()
 {
  global $wpdb;

  $sQuery  = "SELECT user_id FROM wp_usermeta WHERE meta_key = 'codClienteAuto' AND meta_value = ";
  $sQuery .= "(SELECT session_value FROM dt_temp_session WHERE current_user_id = " . get_current_user_id();
  $sQuery .= " AND session_key = 'currUser')";

  $userID  = $wpdb->get_var( $sQuery );
  // ----------------------------------------------------------------
  if ($userID == null) {
    $userData  = getAllUserMeta(get_current_user_id());
   } else {
    $userData  = getAllUserMeta($userID);
   }
//   print_r($userData);
   $userDataWP = get_userdata($userID);
  $userEmail = $userDataWP->user_email;

// ============================================  
// Acciones del Formulario para cambio de datos
// ============================================

   require('ActionsContactForm.php'); 
?>
      <div id="lf-colum">
      <?php echo '</br>User ID = ' . $userID . '</br>'; ?>
          <form method="post" name="changeCustomerData" id="changeCustomerData">
            <table id="customerName">
              <tr>
                <!--<td colspan="2">-->
                <td>
                  <h4>
                     <?php 
                        echo $userData['nickname'][0];
    //                    print_r($userData);
                      ?>
                  </h4>
                </td>
                <td>
                    <input style="float: right; font-size: 12px;" type="submit" name="modDataCustomer" id="modDataCustomer" value="modificar datos cliente" />
                </td>
              </tr>
              <tr>
                <th>Cod. cliente:</th>
                <th>Cod. Cliente Papel:</th>
              </tr>
              <tr>
                <td>
                  <?php 
                     echo $userData['codClienteAuto'][0];
                   ?>
                </td>
                <td>
                  <?php 
                     echo $userData['codClientePapel'][0];
                   ?>
                </td>
              </tr>
              <tr>
                <th>¿Cliente Visitable?</th>
                <td>
                  <?php 
                     echo $userData['visitCustomer'][0];
                   ?>
                </td>
              </tr>
              <tr>
                <th>Ranking</th>
                <td>
                  <?php 
                     echo $userData['rankinCliente'][0];
                   ?>
                </td>
              </tr>
              <tr>
                <th>¿Concertar Cita?</th>
                <td>
                  <?php 
                     echo $userData['concertarCita'][0];
                   ?>
                </td>
              </tr>         
            </table>
            
            <table id="contactData">
              <tr>
                <td>
                   <h4>
                     DATOS DEL CONTACTO
                   </h4>
                </td>
                <td>
                    <input style="float: right; font-size: 12px;" type="submit" name="modDataContact" id="modDataContact" value="modificar datos contacto" />
                </td>
              </tr>
              <tr>
                <th>Persona Contacto:</th>
                <td>
                  <?php 
                     echo $userData['nombreContacto'][0];
                   ?>
                </td>
              </tr>
              <tr>
                <th>Especialidad:</th>
                <td>
                  <?php 
                     echo $userData['sectorCliente'][0];
                   ?>
                </td>
              </tr>
              <tr>
                <th>Teléfono:</th>
              </tr>
              <tr>
                <td>
                  <?php 
                     echo $userData['telFijo1'][0];
                   ?>
                </td>
                <td>
                  <?php 
                     echo $userData['telFijo2'][0];
                   ?>
                </td>
              </tr>
              <tr>
                <th>Móvil:</th>
                <td>
                  <?php 
                     echo $userData['telMovil'][0];
                   ?>
                </td>
              </tr>
              <tr>
                <th>Email:</th>
                <td>
                  <?php 
                     echo $userEmail;
                   ?>
                </td>
              </tr>
              <tr>
                <th colspan="2">Dirección</th>
              </tr>
              <tr>
                <td colspan="2">
                    <?php
                      echo $userData['billing_address_1'][0] . ' ' . $userData['numCalle'][0] . ' ' . $userData['numPiso'][0] . ' ' . $userData['billing_postcode'][0] . ' ' . $userData['billing_city'][0] . ' ' . $userData['billing_state'][0];
                    ?>
                </td>
              </tr>
              <tr>
                <th colspan="2">Observaciones</th>
              </tr>
              <tr>
                <td colspan="2">
                    <?php
                        echo $userData['observacionCliente'][0];
                    ?>
                </td>
              </tr>
            </table>
            
            <nav id="moreCustomerData">
    
            <ul>
              <li><input name="horario"     value="horario"     type="button" onclick="showSchedule()">   </input></li>
              <li><input name="datosEnvio"  value="datosEnvio"  type="button" onclick="datosEnvio()">     </input></li>
              <li><input name="datosFact"   value="datosFact"   type="button" onclick="datosFacturas()">  </input></li>
              <li><input name="comentarios" value="comentarios" type="button" onclick="comentarios()">    </input></li>
              <li><input name="histPedidos" value="histPedidos" type="button" onclick="histPedidos()">    </input></li>
            </ul>
    
    
    <!--
              <ul>
                <li>Horarios</li>
                <li>Datos de Envío</li>
                <li>Datos de Facturación</li>
                <li>Comentarios</li>
                <li>Historial de Pedidos</li>
              </ul>
    -->
    
            </nav>
            
             <div id="col-down">
               <?php
                 include('formularios/tablasHorarios.php');
    //             include('formularios/tablasHorariosBasic.php');
                 include('formularios/shippingInformation.php');
                 include('formularios/billingInformation.php');
                 include('formularios/visitCommentary.php');
                 include('formularios/ordersHistory.php');
               ?> 
                        
             </div>
           </form> 
      
      </div><!--end lf-colum-->
      
      <div id="rg-colum">
           <ul>
               <li>
<!--                   todo borrar esto -->
                   <a href="http://localhost:8888/escritorio/nuevo-pedido">Crear Pedido</a>
<!--                   --><?php //_e('Don\'t see a Search Form you want to use? <a href="'.admin_url( 'post-new.php?post_type=shop_order' ).'">Create a new Search Form</a>.'); ?>
               </li>
<!--               <li>
                   <a href="#">Modificar datos</a>
               </li>-->
               <li>
                   <a href="#">Añadir Comentario</a>
               </li>
               <li>
                   <a href="#">Añadir Sucursal</a>
               </li>
               <li>
                   <a href="#">Borrar Sucursal</a>
               </li>
               <li>
                   <a href="#">Cambiar Comercial</a>
               </li>
           </ul>
      </div><!--end rg-colum-->
      
      <?php 
  }

  // --------------------------------------------------------------------------
  // Plugin install action.
  // Flush rewrite rules to make our custom endpoint available.
  // --------------------------------------------------------------------------
  public static function install()
   {
    flush_rewrite_rules();
   }
 }


new Ficha_Cliente();

// Flush rewrite rules on plugin activation.
register_activation_hook( __FILE__, array( 'Ficha_Cliente', 'install' ) );
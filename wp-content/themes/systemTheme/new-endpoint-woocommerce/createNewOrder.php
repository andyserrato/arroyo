<?php
class Nuevo_Pedido
 {
  // ------------------------------------------------------------------
  // Nuevo Pedido.
  //
  // @var string
  // ------------------------------------------------------------------
  public static $endpoint = 'nuevo-pedido';
  
  // ------------------------------------------------------------------
  // Plugin actions.
  // ------------------------------------------------------------------
  public function __construct() 
   {
    // Actions used to insert a new endpoint in the WordPress.
    add_action( 'init', array( $this, 'add_endpoints' ) );
    add_filter( 'query_vars', array( $this, 'add_query_vars' ), 0 );

    // Change the My Accout page title.
    add_filter( 'the_title', array( $this, 'endpoint_title' ) );

    // Insering your new tab/page into the My Account page.
    add_filter( 'woocommerce_account_menu_items',                         array( $this, 'new_menu_items' ) );
    add_action( 'woocommerce_account_' . self::$endpoint .  '_endpoint',  array( $this, 'endpoint_content' ) );
   }

  // ------------------------------------------------------------------
  // Register new endpoint to use inside My Account page.
  //
  // @see https://developer.wordpress.org/reference/functions/add_rewrite_endpoint/
  // ------------------------------------------------------------------
  public function add_endpoints() 
   {
    add_rewrite_endpoint( self::$endpoint, EP_ROOT | EP_PAGES );
   }

  // ------------------------------------------------------------------
  // Add new query var.
  //
  // @param array $vars
  // @return array
  // ------------------------------------------------------------------
  public function add_query_vars( $vars ) 
   {
    $vars[] = self::$endpoint;

    return $vars;
   }

  // ------------------------------------------------------------------
  // Set endpoint title.
  //
  // @param string $title
  // @return string
  // ------------------------------------------------------------------
  public function endpoint_title( $title ) 
   {
    global $wp_query;

    $is_endpoint = isset( $wp_query->query_vars[ self::$endpoint ] );

    if ( $is_endpoint && ! is_admin() && is_main_query() && in_the_loop() && is_account_page() ) 
     {
      // New page title.
      $title = __( 'Nuevo Pedido', 'woocommerce' );

      remove_filter( 'the_title', array( $this, 'endpoint_title' ) );
     }

    return $title;
   }

  // ------------------------------------------------------------------
  // Insert the new endpoint into the My Account menu.
  //
  // @param array $items
  // @return array
  // ------------------------------------------------------------------
  public function new_menu_items( $items ) 
   {
    // Remove the logout menu item.
    $logout = $items['customer-logout'];
    unset( $items['customer-logout'] );

    // Insert your custom endpoint.
    $items[ self::$endpoint ] = __( 'Nuevo Pedido', 'woocommerce' );

    // Insert back the logout item.
    $items['customer-logout'] = $logout;

    return $items;
   }

  // ------------------------------------------------------------------
  // Endpoint HTML content.
  // 
  // AGREGAR EL CODIGO AQUI PARA QUE APAREZCA LA INFORMACION
  // 
  // ------------------------------------------------------------------
  public function endpoint_content() 
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
?>
     <div id="full-colum">
        <?php echo '</br>User ID = ' . $userID . '</br>'; ?>
        <h3>formulario para nuevos pedidos</h3>
        <?php echo do_shortcode('[wcas-search-form]');?>
        <?php echo do_shortcode('[woocommerce_cart]'); ?>
     </div><!--end full-colum-->
     
<?php 
   }
  // ------------------------------------------------------------------
  // Plugin install action.
  // Flush rewrite rules to make our custom endpoint available.
  // ------------------------------------------------------------------
  public static function install() 
   {
    flush_rewrite_rules();
   }
 }

new Nuevo_Pedido();

// Flush rewrite rules on plugin activation.
register_activation_hook( __FILE__, array( 'Nuevo_Pedido', 'install' ) );
<?php
class Datos_Clientes 
 {
  // ------------------------------------------------------------------
  // Datos del Cliente.
  //
  // @var string
  // ------------------------------------------------------------------
  public static $endpoint = 'datos-cliente';
  
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
      $title = __( 'Datos Clientes', 'woocommerce' );

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
    $items[ self::$endpoint ] = __( 'Clientes', 'woocommerce' );

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
?>

     <div id="full-colum">
         <ul class="options">
            <li>
               <a href="<?php echo get_site_url() . '/escritorio/nuevo-cliente'; ?>">Nuevo Cliente</a>
            </li>
         </ul>
         <!--<span class="genericon genericon-search"></span>-->
        <input type ="text" name="findClients" id="findClients" placeholder="Buscar Cliente" value ="" class ="regular-text" onchange="findUser(this.value)"/>
        <input name="advancedSearch" value="Advanced Search" type="button" onclick="showAdvanceSearchPg()">

<!--<input type="text" name="scheduleVisit" id="scheduleVisit"/>-->


<h3 id="scheduleVisit"></h3>

      <div>
          <table id="usersFound" name="usersFound"  style="width=100%">
          </table>
       </div>

     </div><!--end full-colum-->
     
    <!-- <div id="rg-colum">
        <ul>
           <li>
              <a href="<?php echo get_site_url() . '/index.php/escritorio/nuevo-cliente'; ?>">Nuevo Cliente</a>
           </li>
        </ul>
     </div>--><!--end rg-colum-->
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

new Datos_Clientes();

// Flush rewrite rules on plugin activation.
register_activation_hook( __FILE__, array( 'Datos_Clientes', 'install' ) );
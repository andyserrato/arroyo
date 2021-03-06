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
        add_action('init', array($this, 'add_endpoints'));
        add_filter('query_vars', array($this, 'add_query_vars'), 0);

        // Change the My Accout page title.
        add_filter('the_title', array($this, 'endpoint_title'));

        // Insering your new tab/page into the My Account page.
        add_filter('woocommerce_account_menu_items', array($this, 'new_menu_items'));
        add_action('woocommerce_account_' . self::$endpoint . '_endpoint', array($this, 'endpoint_content'));
    }

    // ------------------------------------------------------------------
    // Register new endpoint to use inside My Account page.
    //
    // @see https://developer.wordpress.org/reference/functions/add_rewrite_endpoint/
    // ------------------------------------------------------------------
    public function add_endpoints()
    {
        add_rewrite_endpoint(self::$endpoint, EP_ROOT | EP_PAGES);
    }

    // ------------------------------------------------------------------
    // Add new query var.
    //
    // @param array $vars
    // @return array
    // ------------------------------------------------------------------
    public function add_query_vars($vars)
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
    public function endpoint_title($title)
    {
        global $wp_query;

        $is_endpoint = isset($wp_query->query_vars[self::$endpoint]);

        if ($is_endpoint && !is_admin() && is_main_query() && in_the_loop() && is_account_page()) {
            // New page title.
            $title = __('Nuevo Pedido', 'woocommerce');

            remove_filter('the_title', array($this, 'endpoint_title'));
        }

        return $title;
    }

    // ------------------------------------------------------------------
    // Insert the new endpoint into the My Account menu.
    //
    // @param array $items
    // @return array
    // ------------------------------------------------------------------
    public function new_menu_items($items)
    {
        // Remove the logout menu item.
        $logout = $items['customer-logout'];
        unset($items['customer-logout']);

        // Insert your custom endpoint.
        $items[self::$endpoint] = __('Nuevo Pedido', 'woocommerce');

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
        $product = get_page_by_title('PRODUCTO', OBJECT, 'product');

        $sQuery = "SELECT user_id FROM wp_usermeta WHERE meta_key = 'codClienteAuto' AND meta_value = ";
        $sQuery .= "(SELECT session_value FROM dt_temp_session WHERE current_user_id = " . get_current_user_id();
        $sQuery .= " AND session_key = 'currUser')";

        $userID = $wpdb->get_var($sQuery);
        // ----------------------------------------------------------------
        if ($userID == null) {
            $userData = getAllUserMeta(get_current_user_id());
        } else {
            $userData = getAllUserMeta($userID);
        }
        echo '';
        ?>

        <div id="full-colum">
            <div id="arroyo-mensaje-carro" class="woocommerce-message" style="display: none"></div>
            <span id="resultadoCreateCustomOrder"></span>
            <?php echo '<input id="customerIdForCustomOrder" type="hidden" value="' . $userID . '"/>' ;?>
            <?php echo '<h3>Crear nuevo pedido para ' . $userData['nickname'][0] . '</h3>'; ?>
            <input type="text" name="findProducts" id="findProducts" placeholder="Buscar Productos" value=""
                   class="regular-text" onchange="findProducts(this.value)"/>
            <div>
                <table id="productsFound" name="productsFound" style="width=100%">
                </table>
            </div>
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
register_activation_hook(__FILE__, array('Nuevo_Pedido', 'install'));
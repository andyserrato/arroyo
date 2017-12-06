jQuery(document).ready( function(){

    if (location.pathname.includes('/escritorio/nuevo-pedido')) {
        jQuery('.checkout-button').removeAttr("href");
        jQuery('.checkout-button').attr("id", "generateOrderButton");
        jQuery('.checkout-button').text('Generar Orden');
        jQuery('.wc-backward').hide();
        const urlCarrito = window.location.protocol + "//" + window.location.host + "/wordpress/carrito";
        jQuery('.button.wc-forward[href=urlCarrito]').hide();
        jQuery('.coupon').hide();
        jQuery('.woocommerce-cart-form').attr("action", window.location.protocol + "//" + window.location.host + "/wordpress/escritorio/nuevo-pedido");
    }

    jQuery('#generateOrderButton').on('click', function(){

        //La llamada AJAX
        jQuery.ajax({
            beforeSend: function (qXHR, settings) {
                jQuery(this).prop("disabled",true);
                jQuery('#arroyo-mensaje-carro').hide();
                jQuery('#loading').fadeIn();
            },
            complete: function () {
                jQuery(this).prop("disabled",false);
                jQuery('#arroyo-mensaje-carro').show();
                jQuery('#loading').fadeOut();
            },
            type : "post",
            url :  window.location.protocol + "//" + window.location.host + "/wordpress/wp-admin/admin-ajax.php",
            data : {
                action: "create_custom_order_arroyo",
                message : "Button has been clicked!",
                userId : document.getElementById('customerIdForCustomOrder').value
            },
            success: function(response) {
                jQuery('#arroyo-mensaje-carro').text(response.message);
                jQuery('.woocommerce-cart-form').hide();
                jQuery('.cart-collaterals').hide();
            }
        })

    });
});

function callfunctiononHeaders2() {

    jQuery('.woocommerce-cart-form').show();
    jQuery('.cart-collaterals').show();

    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    }
    else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("resultadoCreateCustomOrder").innerHTML = this.responseText;
        }
    };

    var siteUrl = window.location.protocol + "//" + window.location.host + "/wordpress/";
    var userId = document.getElementById('customerIdForCustomOrder').value;
    var data = "action=create_custom_order&userId=" + userId;
    xmlhttp.open("POST", siteUrl + "wp-admin/admin-ajax.php", true);
    xmlhttp.send(data);
}
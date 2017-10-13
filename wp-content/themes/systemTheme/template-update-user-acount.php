<?php
ob_start();
/*
Template Name: Update User Account
*/

include("header2.php");
//get_header();

 global $wpdb;
?>

<div id="primary" class="contentArea">
		<main id="main" class="site-main" role="main">
<?php
    if(isset($_GET['clienteID']))
    {
     $userID = $_GET["clienteID"];
      
      echo '</br>User ID = ' . $userID . '</br>';
    }

?>		
<?php
    if(isset($_GET['dataCliente']))
     {
      $data = $_GET["dataCliente"];
      if ($data == 'general')                 // Datos General
        echo do_shortcode( '[gravityform id="9" title="false" description="false"]' );
      elseif ($data == 'contacto')           // Datos Contacto
        echo do_shortcode( '[gravityform id="13" title="false" description="false"]' );
      elseif ($data == 'horarioComercial')   // Horario Comercial
        echo do_shortcode( '[gravityform id="12" title="false" description="false"]' );
      elseif ($data == 'horarioVisita')      // Horario Visita
        echo do_shortcode( '[gravityform id="14" title="false" description="false"]' );
      elseif ($data == 'envio')              // Datos Envio
        echo do_shortcode( '[gravityform id="15" title="false" description="false"]' );
    //  elseif ($data == 'datos')              // Datos Facturacion
   //      echo do_shortcode( '[gravityform id="9" title="false" description="false"]' );
      elseif ($data == 'facturacion')        // Datos Bancarios
        echo do_shortcode( '[gravityform id="16" title="false" description="false"]' );
    //  elseif ($data == 'comentarios')        // Comentarios Visitas
   //      echo do_shortcode( '[gravityform id="9" title="false" description="false"]' );
     }
?>
			
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
include_once('footer2.php');
//get_footer();

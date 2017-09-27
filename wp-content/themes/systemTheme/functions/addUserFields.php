<?php
  // --------------------------------
  // functions.php
  // This has been done every time
  // you create a child Theme.
  // All custom function are stored
  // here.
  // --------------------------------
/*---------------------------------------------------*/
/* Agregar Grupo de opciones al perfil de usuario
/*---------------------------------------------------*/
add_action( 'show_user_profile', 'extended_user_profil_fields' );
add_action( 'edit_user_profile', 'extended_user_profil_fields' );


function extended_user_profil_fields( $user ) 
 { ?>

<h3><?php _e("Campos Adicionales", "blank"); ?></h3>
 
<table class="form-table">
   <tr>
      <th>
        <label for="direccion"><?php _e("Direccion"); ?></label>
      </th>
      <td>
          <input type ="text" 
                name  ="direccion" id="direccion" 
                value ="<?php echo esc_attr( get_the_author_meta( 'direccion', $user->ID ) ); ?>" 
                class ="regular-text" /><br />
          <span class="description"><?php _e("Inserta tu direccion."); ?></span>
          <?php echo 'Client ID = [' . $user->ID . ']</br>'; ?>
          <?php echo 'Direccion = [' . esc_attr( get_the_author_meta( 'direccion', $user->ID ) ) . ']</br>'; ?>
      </td>
   </tr>

   <tr>
      <th>
        <label for="sobreNombre"><?php _e("Sobre Nombre"); ?></label>
      </th>
      <td>
          <input type ="text" 
                name  ="sobreNombre" id="sobreNombre" 
                value ="<?php echo esc_attr( get_the_author_meta( 'sobreNombre', $user->ID ) ); ?>" 
                class ="regular-text" /><br />
          <span class="description"><?php _e("Inserta tu Sobrenombre."); ?></span>
          <?php echo 'Client ID   = [' . $user->ID . ']</br>'; ?>
          <?php echo 'Sobrenombre = [' . esc_attr( get_the_author_meta( 'sobreNombre', $user->ID ) ) . ']</br>'; ?>
      </td>
   </tr>

   <tr>
      <th>
        <label for="daIgual"><?php _e("Da Igual"); ?></label>
      </th>
      <td>
          <input type ="text" 
                name  ="daIgual" id="daIgual" 
                value ="<?php echo esc_attr( get_the_author_meta( 'daIgual', $user->ID ) ); ?>" 
                class ="regular-text" /><br />
          <span class="description"><?php _e("Inserta tu Da Igual."); ?></span>
          <?php echo 'Client ID = [' . $user->ID . ']</br>'; ?>
          <?php echo 'Da Igual  = [' . esc_attr( get_the_author_meta( 'daIgual', $user->ID ) ) . ']</br>'; ?>
      </td>
   </tr>

   <tr>
      <th>
        <label for="sectorCliente"><?php _e("Sector del Cliente"); ?></label>
      </th>
      <td>
          <select name="sectorCliente" id="sectorCliente" 
                value="<?php echo esc_attr( get_the_author_meta( 'sectorCliente', $user->ID ) ); ?>" 
                class="regular-text" >
<?php
                $selectedValue = esc_attr( get_the_author_meta( 'sectorCliente', $user->ID ) );
                   if ($selectedValue == "odontologo")
                    echo '<option value="odontologo" selected>Odontologo</option>';
                   else
                    echo '<option value="odontologo">Odontologo</option>';

                   if ($selectedValue == "protesico")
                    echo '<option value="protesico" selected>Protesico</option>';
                   else
                    echo '<option value="protesico">Protesico</option>';

                   if ($selectedValue == "veterinario")
                    echo '<option value="veterinario" selected>Veterinario</option>';
                   else
                    echo '<option value="veterinario">Veterinario</option>';

                   if ($selectedValue == "podologo")
                    echo '<option value="podologo" selected>Podologo</option>';
                   else
                    echo '<option value="podologo">Podologo</option>';
                   
                   if ($selectedValue == "podologo")
                    echo '<option value="cardiologo selected">Cardiologo</option>';
                   else
                    echo '<option value="cardiologo">Cardiologo</option>';
?>
          </select>
          <span class="description"><?php _e("A que sector pertenece el cliente?"); ?></span>
          <?php echo 'Client ID = [' . $user->ID . ']</br>'; ?>
          <?php echo 'Sector    = [' . esc_attr( get_the_author_meta( 'sectorCliente', $user->ID ) ) . ']</br>'; ?>
      </td>
   </tr>

</table>

<?php 
 }
 
add_action( 'personal_options_update', 'save_extended_user_profil_fields' );
add_action( 'edit_user_profile_update', 'save_extended_user_profil_fields' );

//Función que guarda los cambios 
function save_extended_user_profil_fields( $user_id ) 
 {
  if ( !current_user_can( 'edit_user', $user_id ) ) 
   { 
    echo 'Current user is not editable = [' . $user_id . ']</br>';
    return false;
   }

  update_user_meta( $user_id, 'direccion',     $_POST['direccion'] );
  update_user_meta( $user_id, 'daIgual',       $_POST['daIgual'] );
  update_user_meta( $user_id, 'sobreNombre',   $_POST['sobreNombre'] );
  update_user_meta( $user_id, 'sectorCliente', $_POST['sectorCliente'] );
  
 }

?>
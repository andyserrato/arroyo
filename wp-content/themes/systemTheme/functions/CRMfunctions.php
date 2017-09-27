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

function createSelectHour($selectedValue)
 {
  $selectStr  = '';
  $theTimes   = generateBusHours(8, 21);
  
  for ($i = 0; $i < count($theTimes); $i++)
   {
       if (intval($selectedValue) == intval($theTimes[$i]))
      $selectStr .= '<option value="' . $theTimes[$i] . '" selected>' . $theTimes[$i] . '</option>';
    else
      $selectStr .= '<option value="' . $theTimes[$i] . '">' . $theTimes[$i] . '</option>';
   }

  $selectStr  .=  '</select>';

  return $selectStr;
 }
 
function extended_user_profil_fields( $user ) 
 { ?>

<h3><?php _e("Campos Adicionales CRM", "blank"); ?></h3>

<table class="form-table">

<!--
  SELECCION SECTOR CLIENTE
-->
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
                   if ($selectedValue == "odontologia")
                    echo '<option value="odontologia" selected>Odontología</option>';
                   else
                    echo '<option value="odontologia">Odontología</option>';

                   if ($selectedValue == "protesico")
                    echo '<option value="protesico" selected>Protésico</option>';
                   else
                    echo '<option value="protesico">Protésico</option>';

                   if ($selectedValue == "veterinario")
                    echo '<option value="veterinario" selected>Veterinario</option>';
                   else
                    echo '<option value="veterinario">Veterinario</option>';

                   if ($selectedValue == "podologo")
                    echo '<option value="podologo" selected>Podólogo</option>';
                   else
                    echo '<option value="podologo">Podólogo</option>';
                   
                   if ($selectedValue == "esteticista")
                    echo '<option value="esteticista" selected>Esteticista</option>';
                   else
                    echo '<option value="esteticista">Esteticista</option>';
                    
                    if ($selectedValue == "distribuidor")
                     echo '<option value="distribuidor" selected>Distribuidor</option>';
                    else
                     echo '<option value="distribuidor">Distribuidor</option>';
                    
?>
          </select>
          <span class="description"><?php _e("A que sector pertenece el cliente?"); ?></span>
          <?php echo 'Client ID = [' . $user->ID . ']</br>'; ?>
          <?php echo 'Sector    = [' . esc_attr( get_the_author_meta( 'sectorCliente', $user->ID ) ) . ']</br>'; ?>
      </td>
   </tr>
  
  <!--
    CODIGO AUTOMATICO CLIENTE
  -->
  <tr>
     <th>
       <label for="codClienteAuto"><?php _e("Código Cliente Automatico"); ?></label>
     </th>
     <td>
         <input type ="text" 
               name  ="codClienteAuto" id="codClienteAuto" 
               value ="<?php echo esc_attr( get_the_author_meta( 'codClienteAuto', $user->ID ) ); ?>" 
               class ="regular-text" /><br />
         <span class="description"><?php _e("Código Cliente Automatico."); ?></span>
     </td>
  </tr>
  
  
   <!--
    CODIGO MANUAL CLIENTE
   -->
   <tr>
      <th>
        <label for="codClientePapel"><?php _e("Código Cliente Ficha Papel"); ?></label>
      </th>
      <td>
          <input type ="text" 
                name  ="codClientePapel" id="codClientePapel" 
                value ="<?php echo esc_attr( get_the_author_meta( 'codClientePapel', $user->ID ) ); ?>" 
                class ="regular-text" /><br />
          <span class="description"><?php _e("Inserta el Código Cliente, archivo en papel."); ?></span>
      </td>
   </tr>
   
   <!--
     CLIENTE VISITABLE
   -->   
   <tr>
         <th>
           <label for="visitCustomer"><?php _e("¿Este cliente se visita?"); ?></label>
         </th>
         <td>
             <select name="visitCustomer" id="visitCustomer" 
                   value="<?php echo esc_attr( get_the_author_meta( 'visitCustomer', $user->ID ) ); ?>" 
                   class="regular-text" >
   <?php
                   $selectedValue = esc_attr( get_the_author_meta( 'visitCustomer', $user->ID ) );
                      if ($selectedValue == "si")
                       echo '<option value="si" selected>Si</option>';
                      else
                       echo '<option value="si">Si</option>';
   
                      if ($selectedValue == "no")
                       echo '<option value="no" selected>No</option>';
                      else
                       echo '<option value="no">No</option>';
                    
   ?>
             </select>
             <span class="description"><?php _e("¿Este cliente se visita?"); ?></span>
             <?php echo 'Client ID = [' . $user->ID . ']</br>'; ?>
             <?php echo 'Sector    = [' . esc_attr( get_the_author_meta( 'visitCustomer', $user->ID ) ) . ']</br>'; ?>
         </td>
   </tr>
   
   
   <!--
    HORARIO COMERCIAL
   -->   
    <tr>
        <th>
            <label for="HClunes"><?php _e("Horario Comercial"); ?></label>
        </th>
        
        <td>
            <input type="checkbox" name="HClunes" id="HClunes" <?php if('on'==esc_attr(get_the_author_meta('HClunes',$user->ID ))) echo 'checked="checked"'; ?>/> Lunes<br />
             <?php echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HClunes', $user->ID ) ) . ']</br></br>'; ?>
             
             <input type="checkbox" name="HCmartes" id="HCmartes" <?php if('on'==esc_attr(get_the_author_meta('HCmartes',$user->ID ))) echo 'checked="checked"'; ?>/> Martes<br />
              <?php echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HCmartes', $user->ID ) ) . ']</br></br>'; ?>
              
              <input type="checkbox" name="HCmiercoles" id="HCmiercoles" <?php if('on'==esc_attr(get_the_author_meta('HCmiercoles',$user->ID ))) echo 'checked="checked"'; ?>/> Miércoles<br />
               <?php echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HClunes', $user->ID ) ) . ']</br></br>'; ?>
              
              <input type="checkbox" name="HCjueves" id="HCjueves" <?php if('on'==esc_attr(get_the_author_meta('HCjueves',$user->ID ))) echo 'checked="checked"'; ?>/> Jueves<br />
               <?php echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HCjueves', $user->ID ) ) . ']</br></br>'; ?>
              
              <input type="checkbox" name="HCviernes" id="HCviernes" <?php if('on'==esc_attr(get_the_author_meta('HCviernes',$user->ID ))) echo 'checked="checked"'; ?>/> Viernes<br />
               <?php echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HCvierves', $user->ID ) ) . ']</br></br>'; ?>
              
              <input type="checkbox" name="HCsabado" id="HCsabado" <?php if('on'==esc_attr(get_the_author_meta('HCsabado',$user->ID ))) echo 'checked="checked"'; ?>/> Sábado<br />
               <?php echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HCsabado', $user->ID ) ) . ']</br></br>'; ?>
             
        </td>
    </tr>
       
   <!--
   ////////////////// COMIENZO LUNES ////////////////////
   -->

          <!-- ................
            HORA MAÑANA DESDE
           ..................-->
           
          <tr> 
           <th>
             <label for="HClunesHoraAM"><?php _e("Mañana desde"); ?></label>
           </th>
               
               <!-- HORAS -->
           <td>
               
               <?php 
               
                   echo '<select name="HClunesHoraAMdesde" id="HClunesHoraAMdesde" class="regular-text">';
                   $selectedValue = esc_attr( get_the_author_meta( 'HClunesHoraAMdesde', $user->ID ) );
                   echo createSelectHour($selectedValue);
                   
                ?>
               <span class="description"><br /><?php _e("Hora Comercial Lunes"); ?></span>
                         <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                         <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HClunesHoraAMdesde', $user->ID ) ) . ']</br>'; ?>
          </td>
          
              <!-- MINUTOS -->
          <td>
               
               <?php 
                   $timeList = getMinutesForDD(5);
                   echo '<select name="HClunesMinAMdesde" id="HClunesMinAMdesde" class="regular-text">';
                   echo populateDropDown($timeList);
                   echo '</select>';                                      
                ?>
               <span class="description"><br /><?php _e("Minutos Comercial Lunes"); ?></span>
                         <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                         <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HClunesMinAMdesde', $user->ID ) ) . ']</br>'; ?>
          </td>
       </tr>
         <!-- ................
           HORA MAÑANA HASTA
          ..................-->
          
         <tr> 
          <th>
            <label for="HClunesHoraAM"><?php _e("Mañana hasta"); ?></label>
          </th>
              
              <!-- HORAS -->
          <td>
              
              <?php        
                  echo '<select name="HClunesHoraAMhasta" id="HClunesHoraAMhasta" class="regular-text">';
                  $selectedValue = esc_attr( get_the_author_meta( 'HClunesHoraAMhasta', $user->ID ) );
                  echo createSelectHour($selectedValue);                  
               ?>
              <span class="description"><br /><?php _e("Hora Comercial Lunes"); ?></span>
                        <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                        <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HClunesHoraAMhasta', $user->ID ) ) . ']</br>'; ?>
         </td>
         
             <!-- MINUTOS -->
         <td>
              
              <?php 
                  $timeList = getMinutesForDD(5);
                     echo '<select name="HClunesMinAMhasta" id="HClunesMinAMhasta" class="regular-text">';
                     echo populateDropDown($timeList);
                     echo '</select>';                   
               ?>
              <span class="description"><br /><?php _e("Minutos Comercial Lunes"); ?></span>
                        <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                        <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HClunesMinAMhasta', $user->ID ) ) . ']</br>'; ?>
         </td>
      </tr>
      
          <!-- ................
            HORA TARDE DESDE
           ..................-->
           
          <tr> 
           <th>
             <label for="HClunesHoraPM"><?php _e("Tarde desde"); ?></label>
           </th>
               
               <!-- HORAS -->
           <td>
               
               <?php 
                   echo '<select nPMe="HClunesHoraPMdesde" id="HClunesHoraPMdesde" class="regular-text">';
                   $selectedValue = esc_attr( get_the_author_meta( 'HClunesHoraPMdesde', $user->ID ) );
                   echo createSelectHour($selectedValue);
                ?>
               <span class="description"><br /><?php _e("Hora Comercial Lunes"); ?></span>
                         <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                         <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HClunesHoraPMdesde', $user->ID ) ) . ']</br>'; ?>
          </td>
          
              <!-- MINUTOS -->
          <td>
               
               <?php     
                  $timeList = getMinutesForDD(5);
                   echo '<select nPMe="HClunesMinPMdesde" id="HClunesMinPMdesde" class="regular-text">';
                   echo populateDropDown($timeList);
                   echo '</select>';       
               ?>
               <span class="description"><br /><?php _e("Minutos Comercial Lunes"); ?></span>
                         <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                         <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HClunesMinPMdesde', $user->ID ) ) . ']</br>'; ?>
          </td>
       </tr>
         <!-- ................
           HORA TARDE HASTA
          ..................-->
          
         <tr> 
          <th>
            <label for="HClunesHoraPM"><?php _e("Tarde hasta"); ?></label>
          </th>
              
              <!-- HORAS -->
          <td>
              
              <?php 
              
                  echo '<select nPMe="HClunesHoraPMhasta" id="HClunesHoraPMhasta" class="regular-text">';
                  $selectedValue = esc_attr( get_the_author_meta( 'HClunesHoraPMhasta', $user->ID ) );
                  echo createSelectHour($selectedValue);
//                    $theTimes = generateBusHours(8, 21);
//                    for ($i = 0; $i < count($theTimes); $i++)
//                     //echo '<option value="' . $i . '">' . $theTimes[$i] . '</option>';
//                     echo '<option value="' . $theTimes[$i] . '">' . $theTimes[$i] . '</option>';
//                  echo '</select>';
                  
               ?>
              <span class="description"><br /><?php _e("Hora Comercial Lunes"); ?></span>
                        <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                        <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HClunesHoraPMhasta', $user->ID ) ) . ']</br>'; ?>
         </td>
         
             <!-- MINUTOS -->
         <td>
              
              <?php 
                  $timeList = getMinutesForDD(5);
                     echo '<select nPMe="HClunesMinPMhasta" id="HClunesMinPMhasta" class="regular-text">';
                     echo populateDropDown($timeList);
                     echo '</select>';
               ?>
              <span class="description"><br /><?php _e("Minutos Comercial Lunes"); ?></span>
                        <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                        <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HClunesMinPMhasta', $user->ID ) ) . ']</br>'; ?>
         </td>
      </tr>
      
       <!--
       ////////////////// FIN LUNES ////////////////////
       -->
  <!--
   ////////////////// COMIENZO martes ////////////////////
   -->

          <!-- ................
            HORA MAÑANA DESDE
           ..................-->
           
          <tr> 
           <th>
             <label for="HCmartesHoraAM"><?php _e("Mañana desde"); ?></label>
           </th>
               
               <!-- HORAS -->
           <td>
               
               <?php 
               
                   echo '<select name="HCmartesHoraAMdesde" id="HCmartesHoraAMdesde" class="regular-text">';
                   $selectedValue = esc_attr( get_the_author_meta( 'HCmartesHoraAMdesde', $user->ID ) );
                   echo createSelectHour($selectedValue);
                   
//                     $theTimes = generateBusHours(8, 21);
//                     for ($i = 0; $i < count($theTimes); $i++)
//                      //echo '<option value="' . $i . '">' . $theTimes[$i] . '</option>';
//                      echo '<option value="' . $theTimes[$i] . '">' . $theTimes[$i] . '</option>';
//                   echo '</select>';
                   
                ?>
               <span class="description"><br /><?php _e("Hora Comercial martes"); ?></span>
                         <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                         <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HCmartesHoraAMdesde', $user->ID ) ) . ']</br>'; ?>
          </td>
          
              <!-- MINUTOS -->
          <td>
               
               <?php 
               
                   $timeList = getMinutesForDD(5);
                      echo '<select name="HCmartesMinAMdesde" id="HCmartesMinAMdesde" class="regular-text">';
                      echo populateDropDown($timeList);
                      echo '</select>';
                                      
                ?>
               <span class="description"><br /><?php _e("Minutos Comercial martes"); ?></span>
                         <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                         <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HCmartesMinAMdesde', $user->ID ) ) . ']</br>'; ?>
          </td>
       </tr>
         <!-- ................
           HORA MAÑANA HASTA
          ..................-->
          
         <tr> 
          <th>
            <label for="HCmartesHoraAM"><?php _e("Mañana hasta"); ?></label>
          </th>
              
              <!-- HORAS -->
          <td>
              
              <?php 
              
                  echo '<select name="HCmartesHoraAMhasta" id="HCmartesHoraAMhasta" class="regular-text">';
                  $selectedValue = esc_attr( get_the_author_meta( 'HCmartesHoraAMhasta', $user->ID ) );
                  echo createSelectHour($selectedValue);
                  
//                    $theTimes = generateBusHours(8, 21);
//                    for ($i = 0; $i < count($theTimes); $i++)
//                     //echo '<option value="' . $i . '">' . $theTimes[$i] . '</option>';
//                     echo '<option value="' . $theTimes[$i] . '">' . $theTimes[$i] . '</option>';
//                  echo '</select>';
                  
               ?>
              <span class="description"><br /><?php _e("Hora Comercial martes"); ?></span>
                        <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                        <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HCmartesHoraAMhasta', $user->ID ) ) . ']</br>'; ?>
         </td>
         
             <!-- MINUTOS -->
         <td>
              
              <?php 
              
                  $timeList = getMinutesForDD(5);
                     echo '<select name="HCmartesMinAMhasta" id="HCmartesMinAMhasta" class="regular-text">';
                     echo populateDropDown($timeList);
                     echo '</select>';
                                     
               ?>
              <span class="description"><br /><?php _e("Minutos Comercial martes"); ?></span>
                        <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                        <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HCmartesMinAMhasta', $user->ID ) ) . ']</br>'; ?>
         </td>
      </tr>
      
          <!-- ................
            HORA TARDE DESDE
           ..................-->
           
          <tr> 
           <th>
             <label for="HCmartesHoraPM"><?php _e("Tarde desde"); ?></label>
           </th>
               
               <!-- HORAS -->
           <td>
               
               <?php 
               
                   echo '<select nPMe="HCmartesHoraPMdesde" id="HCmartesHoraPMdesde" class="regular-text">';
                   $selectedValue = esc_attr( get_the_author_meta( 'HCmartesHoraPMdesde', $user->ID ) );
                   echo createSelectHour($selectedValue);
                   
//                     $theTimes = generateBusHours(8, 21);
//                     for ($i = 0; $i < count($theTimes); $i++)
//                      //echo '<option value="' . $i . '">' . $theTimes[$i] . '</option>';
//                      echo '<option value="' . $theTimes[$i] . '">' . $theTimes[$i] . '</option>';
//                   echo '</select>';
                   
                ?>
               <span class="description"><br /><?php _e("Hora Comercial martes"); ?></span>
                         <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                         <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HCmartesHoraPMdesde', $user->ID ) ) . ']</br>'; ?>
          </td>
          
              <!-- MINUTOS -->
          <td>
               
               <?php 
               
                   $timeList = getMinutesForDD(5);
                      echo '<select nPMe="HCmartesMinPMdesde" id="HCmartesMinPMdesde" class="regular-text">';
                      echo populateDropDown($timeList);
                      echo '</select>';
                                      
                ?>
               <span class="description"><br /><?php _e("Minutos Comercial martes"); ?></span>
                         <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                         <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HCmartesMinPMdesde', $user->ID ) ) . ']</br>'; ?>
          </td>
       </tr>
         <!-- ................
           HORA TARDE HASTA
          ..................-->
          
         <tr> 
          <th>
            <label for="HCmartesHoraPM"><?php _e("Tarde hasta"); ?></label>
          </th>
              
              <!-- HORAS -->
          <td>
              
              <?php 
              
                  echo '<select nPMe="HCmartesHoraPMhasta" id="HCmartesHoraPMhasta" class="regular-text">';
                  $selectedValue = esc_attr( get_the_author_meta( 'HCmartesHoraPMhasta', $user->ID ) );
                  echo createSelectHour($selectedValue);
                  
//                    $theTimes = generateBusHours(8, 21);
//                    for ($i = 0; $i < count($theTimes); $i++)
//                     //echo '<option value="' . $i . '">' . $theTimes[$i] . '</option>';
//                     echo '<option value="' . $theTimes[$i] . '">' . $theTimes[$i] . '</option>';
//                  echo '</select>';
                  
               ?>
              <span class="description"><br /><?php _e("Hora Comercial martes"); ?></span>
                        <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                        <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HCmartesHoraPMhasta', $user->ID ) ) . ']</br>'; ?>
         </td>
         
             <!-- MINUTOS -->
         <td>
              
              <?php 
              
                  $timeList = getMinutesForDD(5);
                     echo '<select nPMe="HCmartesMinPMhasta" id="HCmartesMinPMhasta" class="regular-text">';
                     echo populateDropDown($timeList);
                     echo '</select>';
                                     
               ?>
              <span class="description"><br /><?php _e("Minutos Comercial martes"); ?></span>
                        <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                        <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HCmartesMinPMhasta', $user->ID ) ) . ']</br>'; ?>
         </td>
      </tr>
      
       <!--
       ////////////////// FIN martes ////////////////////
       -->           
    
  <!--
   ////////////////// COMIENZO miercoles ////////////////////
   -->

          <!-- ................
            HORA MAÑANA DESDE
           ..................-->
           
          <tr> 
           <th>
             <label for="HCmiercolesHoraAM"><?php _e("Mañana desde"); ?></label>
           </th>
               
               <!-- HORAS -->
           <td>
               
               <?php 
               
                   echo '<select name="HCmiercolesHoraAMdesde" id="HCmiercolesHoraAMdesde" class="regular-text">';
                   $selectedValue = esc_attr( get_the_author_meta( 'HCmiercolesHoraAMdesde', $user->ID ) );
                   echo createSelectHour($selectedValue);
                   
//                     $theTimes = generateBusHours(8, 21);
//                     for ($i = 0; $i < count($theTimes); $i++)
//                      //echo '<option value="' . $i . '">' . $theTimes[$i] . '</option>';
//                      echo '<option value="' . $theTimes[$i] . '">' . $theTimes[$i] . '</option>';
//                   echo '</select>';
                   
                ?>
               <span class="description"><br /><?php _e("Hora Comercial miercoles"); ?></span>
                         <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                         <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HCmiercolesHoraAMdesde', $user->ID ) ) . ']</br>'; ?>
          </td>
          
              <!-- MINUTOS -->
          <td>
               
               <?php 
               
                   $timeList = getMinutesForDD(5);
                      echo '<select name="HCmiercolesMinAMdesde" id="HCmiercolesMinAMdesde" class="regular-text">';
                      echo populateDropDown($timeList);
                      echo '</select>';
                                      
                ?>
               <span class="description"><br /><?php _e("Minutos Comercial miercoles"); ?></span>
                         <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                         <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HCmiercolesMinAMdesde', $user->ID ) ) . ']</br>'; ?>
          </td>
       </tr>
         <!-- ................
           HORA MAÑANA HASTA
          ..................-->
          
         <tr> 
          <th>
            <label for="HCmiercolesHoraAM"><?php _e("Mañana hasta"); ?></label>
          </th>
              
              <!-- HORAS -->
          <td>
              
              <?php 
              
                  echo '<select name="HCmiercolesHoraAMhasta" id="HCmiercolesHoraAMhasta" class="regular-text">';
                  $selectedValue = esc_attr( get_the_author_meta( 'HCmiercolesHoraAMhasta', $user->ID ) );
                  echo createSelectHour($selectedValue);
                  
//                    $theTimes = generateBusHours(8, 21);
//                    for ($i = 0; $i < count($theTimes); $i++)
//                     //echo '<option value="' . $i . '">' . $theTimes[$i] . '</option>';
//                     echo '<option value="' . $theTimes[$i] . '">' . $theTimes[$i] . '</option>';
//                  echo '</select>';
                  
               ?>
              <span class="description"><br /><?php _e("Hora Comercial miercoles"); ?></span>
                        <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                        <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HCmiercolesHoraAMhasta', $user->ID ) ) . ']</br>'; ?>
         </td>
         
             <!-- MINUTOS -->
         <td>
              
              <?php 
              
                  $timeList = getMinutesForDD(5);
                     echo '<select name="HCmiercolesMinAMhasta" id="HCmiercolesMinAMhasta" class="regular-text">';
                     echo populateDropDown($timeList);
                     echo '</select>';
                                     
               ?>
              <span class="description"><br /><?php _e("Minutos Comercial miercoles"); ?></span>
                        <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                        <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HCmiercolesMinAMhasta', $user->ID ) ) . ']</br>'; ?>
         </td>
      </tr>
      
          <!-- ................
            HORA TARDE DESDE
           ..................-->
           
          <tr> 
           <th>
             <label for="HCmiercolesHoraPM"><?php _e("Tarde desde"); ?></label>
           </th>
               
               <!-- HORAS -->
           <td>
               
               <?php 
               
                   echo '<select nPMe="HCmiercolesHoraPMdesde" id="HCmiercolesHoraPMdesde" class="regular-text">';
                   $selectedValue = esc_attr( get_the_author_meta( 'HCmiercolesHoraPMdesde', $user->ID ) );
                   echo createSelectHour($selectedValue);
                   
//                     $theTimes = generateBusHours(8, 21);
//                     for ($i = 0; $i < count($theTimes); $i++)
//                      //echo '<option value="' . $i . '">' . $theTimes[$i] . '</option>';
//                      echo '<option value="' . $theTimes[$i] . '">' . $theTimes[$i] . '</option>';
//                   echo '</select>';
                   
                ?>
               <span class="description"><br /><?php _e("Hora Comercial miercoles"); ?></span>
                         <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                         <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HCmiercolesHoraPMdesde', $user->ID ) ) . ']</br>'; ?>
          </td>
          
              <!-- MINUTOS -->
          <td>
               
               <?php 
               
                   $timeList = getMinutesForDD(5);
                      echo '<select nPMe="HCmiercolesMinPMdesde" id="HCmiercolesMinPMdesde" class="regular-text">';
                      echo populateDropDown($timeList);
                      echo '</select>';
                                      
                ?>
               <span class="description"><br /><?php _e("Minutos Comercial miercoles"); ?></span>
                         <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                         <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HCmiercolesMinPMdesde', $user->ID ) ) . ']</br>'; ?>
          </td>
       </tr>
         <!-- ................
           HORA TARDE HASTA
          ..................-->
          
         <tr> 
          <th>
            <label for="HCmiercolesHoraPM"><?php _e("Tarde hasta"); ?></label>
          </th>
              
              <!-- HORAS -->
          <td>
              
              <?php 
              
                  echo '<select nPMe="HCmiercolesHoraPMhasta" id="HCmiercolesHoraPMhasta" class="regular-text">';
                  $selectedValue = esc_attr( get_the_author_meta( 'HCmiercolesHoraPMhasta', $user->ID ) );
                  echo createSelectHour($selectedValue);
                  
//                    $theTimes = generateBusHours(8, 21);
//                    for ($i = 0; $i < count($theTimes); $i++)
//                     //echo '<option value="' . $i . '">' . $theTimes[$i] . '</option>';
//                     echo '<option value="' . $theTimes[$i] . '">' . $theTimes[$i] . '</option>';
//                  echo '</select>';
                  
               ?>
              <span class="description"><br /><?php _e("Hora Comercial miercoles"); ?></span>
                        <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                        <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HCmiercolesHoraPMhasta', $user->ID ) ) . ']</br>'; ?>
         </td>
         
             <!-- MINUTOS -->
         <td>
              
              <?php 
              
                  $timeList = getMinutesForDD(5);
                     echo '<select nPMe="HCmiercolesMinPMhasta" id="HCmiercolesMinPMhasta" class="regular-text">';
                     echo populateDropDown($timeList);
                     echo '</select>';
                                     
               ?>
              <span class="description"><br /><?php _e("Minutos Comercial miercoles"); ?></span>
                        <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                        <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HCmiercolesMinPMhasta', $user->ID ) ) . ']</br>'; ?>
         </td>
      </tr>
      
       <!--
       ////////////////// FIN miercoles ////////////////////
       -->
       
  <!--
   ////////////////// COMIENZO jueves ////////////////////
   -->

          <!-- ................
            HORA MAÑANA DESDE
           ..................-->
           
          <tr> 
           <th>
             <label for="HCjuevesHoraAM"><?php _e("Mañana desde"); ?></label>
           </th>
               
               <!-- HORAS -->
           <td>
               
               <?php 
               
                   echo '<select name="HCjuevesHoraAMdesde" id="HCjuevesHoraAMdesde" class="regular-text">';
                   $selectedValue = esc_attr( get_the_author_meta( 'HCjuevesHoraAMdesde', $user->ID ) );
                   echo createSelectHour($selectedValue);
                   
//                     $theTimes = generateBusHours(8, 21);
//                     for ($i = 0; $i < count($theTimes); $i++)
//                      //echo '<option value="' . $i . '">' . $theTimes[$i] . '</option>';
//                      echo '<option value="' . $theTimes[$i] . '">' . $theTimes[$i] . '</option>';
//                   echo '</select>';
                   
                ?>
               <span class="description"><br /><?php _e("Hora Comercial jueves"); ?></span>
                         <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                         <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HCjuevesHoraAMdesde', $user->ID ) ) . ']</br>'; ?>
          </td>
          
              <!-- MINUTOS -->
          <td>
               
               <?php 
               
                   $timeList = getMinutesForDD(5);
                      echo '<select name="HCjuevesMinAMdesde" id="HCjuevesMinAMdesde" class="regular-text">';
                      echo populateDropDown($timeList);
                      echo '</select>';
                                      
                ?>
               <span class="description"><br /><?php _e("Minutos Comercial jueves"); ?></span>
                         <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                         <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HCjuevesMinAMdesde', $user->ID ) ) . ']</br>'; ?>
          </td>
       </tr>
         <!-- ................
           HORA MAÑANA HASTA
          ..................-->
          
         <tr> 
          <th>
            <label for="HCjuevesHoraAM"><?php _e("Mañana hasta"); ?></label>
          </th>
              
              <!-- HORAS -->
          <td>
              
              <?php 
              
                  echo '<select name="HCjuevesHoraAMhasta" id="HCjuevesHoraAMhasta" class="regular-text">';
                  $selectedValue = esc_attr( get_the_author_meta( 'HCjuevesHoraAMhasta', $user->ID ) );
                  echo createSelectHour($selectedValue);
                  
//                    $theTimes = generateBusHours(8, 21);
//                    for ($i = 0; $i < count($theTimes); $i++)
//                     //echo '<option value="' . $i . '">' . $theTimes[$i] . '</option>';
//                     echo '<option value="' . $theTimes[$i] . '">' . $theTimes[$i] . '</option>';
//                  echo '</select>';
                  
               ?>
              <span class="description"><br /><?php _e("Hora Comercial jueves"); ?></span>
                        <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                        <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HCjuevesHoraAMhasta', $user->ID ) ) . ']</br>'; ?>
         </td>
         
             <!-- MINUTOS -->
         <td>
              
              <?php 
              
                  $timeList = getMinutesForDD(5);
                     echo '<select name="HCjuevesMinAMhasta" id="HCjuevesMinAMhasta" class="regular-text">';
                     echo populateDropDown($timeList);
                     echo '</select>';
                                     
               ?>
              <span class="description"><br /><?php _e("Minutos Comercial jueves"); ?></span>
                        <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                        <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HCjuevesMinAMhasta', $user->ID ) ) . ']</br>'; ?>
         </td>
      </tr>
      
          <!-- ................
            HORA TARDE DESDE
           ..................-->
           
          <tr> 
           <th>
             <label for="HCjuevesHoraPM"><?php _e("Tarde desde"); ?></label>
           </th>
               
               <!-- HORAS -->
           <td>
               
               <?php 
               
                   echo '<select nPMe="HCjuevesHoraPMdesde" id="HCjuevesHoraPMdesde" class="regular-text">';
                   $selectedValue = esc_attr( get_the_author_meta( 'HCjuevesHoraPMdesde', $user->ID ) );
                   echo createSelectHour($selectedValue);
                   
//                     $theTimes = generateBusHours(8, 21);
//                     for ($i = 0; $i < count($theTimes); $i++)
//                      //echo '<option value="' . $i . '">' . $theTimes[$i] . '</option>';
//                      echo '<option value="' . $theTimes[$i] . '">' . $theTimes[$i] . '</option>';
//                   echo '</select>';
                   
                ?>
               <span class="description"><br /><?php _e("Hora Comercial jueves"); ?></span>
                         <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                         <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HCjuevesHoraPMdesde', $user->ID ) ) . ']</br>'; ?>
          </td>
          
              <!-- MINUTOS -->
          <td>
               
               <?php 
               
                   $timeList = getMinutesForDD(5);
                      echo '<select nPMe="HCjuevesMinPMdesde" id="HCjuevesMinPMdesde" class="regular-text">';
                      echo populateDropDown($timeList);
                      echo '</select>';
                                      
                ?>
               <span class="description"><br /><?php _e("Minutos Comercial jueves"); ?></span>
                         <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                         <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HCjuevesMinPMdesde', $user->ID ) ) . ']</br>'; ?>
          </td>
       </tr>
         <!-- ................
           HORA TARDE HASTA
          ..................-->
          
         <tr> 
          <th>
            <label for="HCjuevesHoraPM"><?php _e("Tarde hasta"); ?></label>
          </th>
              
              <!-- HORAS -->
          <td>
              
              <?php 
              
                  echo '<select nPMe="HCjuevesHoraPMhasta" id="HCjuevesHoraPMhasta" class="regular-text">';
                  $selectedValue = esc_attr( get_the_author_meta( 'HCjuevesHoraPMhasta', $user->ID ) );
                  echo createSelectHour($selectedValue);
                  
//                    $theTimes = generateBusHours(8, 21);
//                    for ($i = 0; $i < count($theTimes); $i++)
//                     //echo '<option value="' . $i . '">' . $theTimes[$i] . '</option>';
//                     echo '<option value="' . $theTimes[$i] . '">' . $theTimes[$i] . '</option>';
//                  echo '</select>';
                  
               ?>
              <span class="description"><br /><?php _e("Hora Comercial jueves"); ?></span>
                        <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                        <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HCjuevesHoraPMhasta', $user->ID ) ) . ']</br>'; ?>
         </td>
         
             <!-- MINUTOS -->
         <td>
              
              <?php 
              
                  $timeList = getMinutesForDD(5);
                     echo '<select nPMe="HCjuevesMinPMhasta" id="HCjuevesMinPMhasta" class="regular-text">';
                     echo populateDropDown($timeList);
                     echo '</select>';
                                     
               ?>
              <span class="description"><br /><?php _e("Minutos Comercial jueves"); ?></span>
                        <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                        <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HCjuevesMinPMhasta', $user->ID ) ) . ']</br>'; ?>
         </td>
      </tr>
      
       <!--
       ////////////////// FIN jueves ////////////////////
       -->
       
  <!--
   ////////////////// COMIENZO viernes ////////////////////
   -->

          <!-- ................
            HORA MAÑANA DESDE
           ..................-->
           
          <tr> 
           <th>
             <label for="HCviernesHoraAM"><?php _e("Mañana desde"); ?></label>
           </th>
               
               <!-- HORAS -->
           <td>
               
               <?php 
               
                   echo '<select name="HCviernesHoraAMdesde" id="HCviernesHoraAMdesde" class="regular-text">';
                   $selectedValue = esc_attr( get_the_author_meta( 'HCviernesHoraAMdesde', $user->ID ) );
                   echo createSelectHour($selectedValue);
                   
//                     $theTimes = generateBusHours(8, 21);
//                     for ($i = 0; $i < count($theTimes); $i++)
//                      //echo '<option value="' . $i . '">' . $theTimes[$i] . '</option>';
//                      echo '<option value="' . $theTimes[$i] . '">' . $theTimes[$i] . '</option>';
//                   echo '</select>';
                   
                ?>
               <span class="description"><br /><?php _e("Hora Comercial viernes"); ?></span>
                         <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                         <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HCviernesHoraAMdesde', $user->ID ) ) . ']</br>'; ?>
          </td>
          
              <!-- MINUTOS -->
          <td>
               
               <?php 
               
                   $timeList = getMinutesForDD(5);
                      echo '<select name="HCviernesMinAMdesde" id="HCviernesMinAMdesde" class="regular-text">';
                      echo populateDropDown($timeList);
                      echo '</select>';
                                      
                ?>
               <span class="description"><br /><?php _e("Minutos Comercial viernes"); ?></span>
                         <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                         <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HCviernesMinAMdesde', $user->ID ) ) . ']</br>'; ?>
          </td>
       </tr>
         <!-- ................
           HORA MAÑANA HASTA
          ..................-->
          
         <tr> 
          <th>
            <label for="HCviernesHoraAM"><?php _e("Mañana hasta"); ?></label>
          </th>
              
              <!-- HORAS -->
          <td>
              
              <?php 
              
                  echo '<select name="HCviernesHoraAMhasta" id="HCviernesHoraAMhasta" class="regular-text">';
                  $selectedValue = esc_attr( get_the_author_meta( 'HCviernesHoraAMhasta', $user->ID ) );
                  echo createSelectHour($selectedValue);
                  
//                    $theTimes = generateBusHours(8, 21);
//                    for ($i = 0; $i < count($theTimes); $i++)
//                     //echo '<option value="' . $i . '">' . $theTimes[$i] . '</option>';
//                     echo '<option value="' . $theTimes[$i] . '">' . $theTimes[$i] . '</option>';
//                  echo '</select>';
                  
               ?>
              <span class="description"><br /><?php _e("Hora Comercial viernes"); ?></span>
                        <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                        <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HCviernesHoraAMhasta', $user->ID ) ) . ']</br>'; ?>
         </td>
         
             <!-- MINUTOS -->
         <td>
              
              <?php 
              
                  $timeList = getMinutesForDD(5);
                     echo '<select name="HCviernesMinAMhasta" id="HCviernesMinAMhasta" class="regular-text">';
                     echo populateDropDown($timeList);
                     echo '</select>';
                                     
               ?>
              <span class="description"><br /><?php _e("Minutos Comercial viernes"); ?></span>
                        <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                        <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HCviernesMinAMhasta', $user->ID ) ) . ']</br>'; ?>
         </td>
      </tr>
      
          <!-- ................
            HORA TARDE DESDE
           ..................-->
           
          <tr> 
           <th>
             <label for="HCviernesHoraPM"><?php _e("Tarde desde"); ?></label>
           </th>
               
               <!-- HORAS -->
           <td>
               
               <?php 
               
                   echo '<select nPMe="HCviernesHoraPMdesde" id="HCviernesHoraPMdesde" class="regular-text">';
                   $selectedValue = esc_attr( get_the_author_meta( 'HCviernesHoraPMdesde', $user->ID ) );
                   echo createSelectHour($selectedValue);
                   
//                     $theTimes = generateBusHours(8, 21);
//                     for ($i = 0; $i < count($theTimes); $i++)
//                      //echo '<option value="' . $i . '">' . $theTimes[$i] . '</option>';
//                      echo '<option value="' . $theTimes[$i] . '">' . $theTimes[$i] . '</option>';
//                   echo '</select>';
                   
                ?>
               <span class="description"><br /><?php _e("Hora Comercial viernes"); ?></span>
                         <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                         <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HCviernesHoraPMdesde', $user->ID ) ) . ']</br>'; ?>
          </td>
          
              <!-- MINUTOS -->
          <td>
               
               <?php 
               
                   $timeList = getMinutesForDD(5);
                      echo '<select nPMe="HCviernesMinPMdesde" id="HCviernesMinPMdesde" class="regular-text">';
                      echo populateDropDown($timeList);
                      echo '</select>';
                                      
                ?>
               <span class="description"><br /><?php _e("Minutos Comercial viernes"); ?></span>
                         <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                         <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HCviernesMinPMdesde', $user->ID ) ) . ']</br>'; ?>
          </td>
       </tr>
         <!-- ................
           HORA TARDE HASTA
          ..................-->
          
         <tr> 
          <th>
            <label for="HCviernesHoraPM"><?php _e("Tarde hasta"); ?></label>
          </th>
              
              <!-- HORAS -->
          <td>
              
              <?php 
              
                  echo '<select nPMe="HCviernesHoraPMhasta" id="HCviernesHoraPMhasta" class="regular-text">';
                  $selectedValue = esc_attr( get_the_author_meta( 'HCviernesHoraPMhasta', $user->ID ) );
                  echo createSelectHour($selectedValue);
                  
//                    $theTimes = generateBusHours(8, 21);
//                    for ($i = 0; $i < count($theTimes); $i++)
//                     //echo '<option value="' . $i . '">' . $theTimes[$i] . '</option>';
//                     echo '<option value="' . $theTimes[$i] . '">' . $theTimes[$i] . '</option>';
//                  echo '</select>';
                  
               ?>
              <span class="description"><br /><?php _e("Hora Comercial viernes"); ?></span>
                        <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                        <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HCviernesHoraPMhasta', $user->ID ) ) . ']</br>'; ?>
         </td>
         
             <!-- MINUTOS -->
         <td>
              
              <?php 
              
                  $timeList = getMinutesForDD(5);
                     echo '<select nPMe="HCviernesMinPMhasta" id="HCviernesMinPMhasta" class="regular-text">';
                     echo populateDropDown($timeList);
                     echo '</select>';
                                     
               ?>
              <span class="description"><br /><?php _e("Minutos Comercial viernes"); ?></span>
                        <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                        <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HCviernesMinPMhasta', $user->ID ) ) . ']</br>'; ?>
         </td>
      </tr>
      
       <!--
       ////////////////// FIN viernes ////////////////////
       -->
       
  <!--
   ////////////////// COMIENZO sabado ////////////////////
   -->

          <!-- ................
            HORA MAÑANA DESDE
           ..................-->
           
          <tr> 
           <th>
             <label for="HCsabadoHoraAM"><?php _e("Mañana desde"); ?></label>
           </th>
               
               <!-- HORAS -->
           <td>
               
               <?php 
               
                   echo '<select name="HCsabadoHoraAMdesde" id="HCsabadoHoraAMdesde" class="regular-text">';
                   $selectedValue = esc_attr( get_the_author_meta( 'HCsabadoHoraAMdesde', $user->ID ) );
                   echo createSelectHour($selectedValue);
                   
//                     $theTimes = generateBusHours(8, 21);
//                     for ($i = 0; $i < count($theTimes); $i++)
//                      //echo '<option value="' . $i . '">' . $theTimes[$i] . '</option>';
//                      echo '<option value="' . $theTimes[$i] . '">' . $theTimes[$i] . '</option>';
//                   echo '</select>';
                   
                ?>
               <span class="description"><br /><?php _e("Hora Comercial sabado"); ?></span>
                         <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                         <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HCsabadoHoraAMdesde', $user->ID ) ) . ']</br>'; ?>
          </td>
          
              <!-- MINUTOS -->
          <td>
               
               <?php 
               
                   $timeList = getMinutesForDD(5);
                      echo '<select name="HCsabadoMinAMdesde" id="HCsabadoMinAMdesde" class="regular-text">';
                      echo populateDropDown($timeList);
                      echo '</select>';
                                      
                ?>
               <span class="description"><br /><?php _e("Minutos Comercial sabado"); ?></span>
                         <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                         <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HCsabadoMinAMdesde', $user->ID ) ) . ']</br>'; ?>
          </td>
       </tr>
         <!-- ................
           HORA MAÑANA HASTA
          ..................-->
          
         <tr> 
          <th>
            <label for="HCsabadoHoraAM"><?php _e("Mañana hasta"); ?></label>
          </th>
              
              <!-- HORAS -->
          <td>
              
              <?php 
              
                  echo '<select name="HCsabadoHoraAMhasta" id="HCsabadoHoraAMhasta" class="regular-text">';
                  $selectedValue = esc_attr( get_the_author_meta( 'HCsabadoHoraAMhasta', $user->ID ) );
                  echo createSelectHour($selectedValue);
                  
//                    $theTimes = generateBusHours(8, 21);
//                    for ($i = 0; $i < count($theTimes); $i++)
//                     //echo '<option value="' . $i . '">' . $theTimes[$i] . '</option>';
//                     echo '<option value="' . $theTimes[$i] . '">' . $theTimes[$i] . '</option>';
//                  echo '</select>';
                  
               ?>
              <span class="description"><br /><?php _e("Hora Comercial sabado"); ?></span>
                        <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                        <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HCsabadoHoraAMhasta', $user->ID ) ) . ']</br>'; ?>
         </td>
         
             <!-- MINUTOS -->
         <td>
              
              <?php 
              
                  $timeList = getMinutesForDD(5);
                     echo '<select name="HCsabadoMinAMhasta" id="HCsabadoMinAMhasta" class="regular-text">';
                     echo populateDropDown($timeList);
                     echo '</select>';
                                     
               ?>
              <span class="description"><br /><?php _e("Minutos Comercial sabado"); ?></span>
                        <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                        <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HCsabadoMinAMhasta', $user->ID ) ) . ']</br>'; ?>
         </td>
      </tr>
      
          <!-- ................
            HORA TARDE DESDE
           ..................-->
           
          <tr> 
           <th>
             <label for="HCsabadoHoraPM"><?php _e("Tarde desde"); ?></label>
           </th>
               
               <!-- HORAS -->
           <td>
               
               <?php 
               
                   echo '<select nPMe="HCsabadoHoraPMdesde" id="HCsabadoHoraPMdesde" class="regular-text">';
                   $selectedValue = esc_attr( get_the_author_meta( 'HCsabadoHoraPMdesde', $user->ID ) );
                   echo createSelectHour($selectedValue);
                   
//                     $theTimes = generateBusHours(8, 21);
//                     for ($i = 0; $i < count($theTimes); $i++)
//                      //echo '<option value="' . $i . '">' . $theTimes[$i] . '</option>';
//                      echo '<option value="' . $theTimes[$i] . '">' . $theTimes[$i] . '</option>';
//                   echo '</select>';
                   
                ?>
               <span class="description"><br /><?php _e("Hora Comercial sabado"); ?></span>
                         <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                         <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HCsabadoHoraPMdesde', $user->ID ) ) . ']</br>'; ?>
          </td>
          
              <!-- MINUTOS -->
          <td>
               
               <?php 
               
                   $timeList = getMinutesForDD(5);
                      echo '<select nPMe="HCsabadoMinPMdesde" id="HCsabadoMinPMdesde" class="regular-text">';
                      echo populateDropDown($timeList);
                      echo '</select>';
                                      
                ?>
               <span class="description"><br /><?php _e("Minutos Comercial sabado"); ?></span>
                         <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                         <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HCsabadoMinPMdesde', $user->ID ) ) . ']</br>'; ?>
          </td>
       </tr>
         <!-- ................
           HORA TARDE HASTA
          ..................-->
          
         <tr> 
          <th>
            <label for="HCsabadoHoraPM"><?php _e("Tarde hasta"); ?></label>
          </th>
              
              <!-- HORAS -->
          <td>
              
              <?php 
              
                  echo '<select nPMe="HCsabadoHoraPMhasta" id="HCsabadoHoraPMhasta" class="regular-text">';
                  $selectedValue = esc_attr( get_the_author_meta( 'HCsabadoHoraPMhasta', $user->ID ) );
                  echo createSelectHour($selectedValue);
                  
//                    $theTimes = generateBusHours(8, 21);
//                    for ($i = 0; $i < count($theTimes); $i++)
//                     //echo '<option value="' . $i . '">' . $theTimes[$i] . '</option>';
//                     echo '<option value="' . $theTimes[$i] . '">' . $theTimes[$i] . '</option>';
//                  echo '</select>';
                  
               ?>
              <span class="description"><br /><?php _e("Hora Comercial sabado"); ?></span>
                        <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                        <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HCsabadoHoraPMhasta', $user->ID ) ) . ']</br>'; ?>
         </td>
         
             <!-- MINUTOS -->
         <td>
              
              <?php 
              
                  $timeList = getMinutesForDD(5);
                     echo '<select nPMe="HCsabadoMinPMhasta" id="HCsabadoMinPMhasta" class="regular-text">';
                     echo populateDropDown($timeList);
                     echo '</select>';
                                     
               ?>
              <span class="description"><br /><?php _e("Minutos Comercial sabado"); ?></span>
                        <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                        <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HCsabadoMinPMhasta', $user->ID ) ) . ']</br>'; ?>
         </td>
      </tr>
      
       <!--
       ////////////////// FIN sabado ////////////////////
       -->
    <!--
      HORARIO DE VISITA
    -->   
     <tr>
         <th>
             <label for="HVlunes"><?php _e("Horario de Visita"); ?></label>
         </th>
         
         <td>
             <input type="checkbox" name="HVlunes" id="HVlunes" <?php if('on'==esc_attr(get_the_author_meta('HVlunes',$user->ID ))) echo 'checked="checked"'; ?>/> Lunes<br />
              <?php echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HVlunes', $user->ID ) ) . ']</br></br>'; ?>
              
              <input type="checkbox" name="HVmartes" id="HVmartes" <?php if('on'==esc_attr(get_the_author_meta('HVmartes',$user->ID ))) echo 'checked="checked"'; ?>/> Martes<br />
               <?php echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HVmartes', $user->ID ) ) . ']</br></br>'; ?>
               
               <input type="checkbox" name="HVmiercoles" id="HVmiercoles" <?php if('on'==esc_attr(get_the_author_meta('HVmiercoles',$user->ID ))) echo 'checked="checked"'; ?>/> Miércoles<br />
                <?php echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HVlunes', $user->ID ) ) . ']</br></br>'; ?>
               
               <input type="checkbox" name="HVjueves" id="HVjueves" <?php if('on'==esc_attr(get_the_author_meta('HVjueves',$user->ID ))) echo 'checked="checked"'; ?>/> Jueves<br />
                <?php echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HVjueves', $user->ID ) ) . ']</br></br>'; ?>
               
               <input type="checkbox" name="HVviernes" id="HVviernes" <?php if('on'==esc_attr(get_the_author_meta('HVviernes',$user->ID ))) echo 'checked="checked"'; ?>/> Viernes<br />
                <?php echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HVvierves', $user->ID ) ) . ']</br></br>'; ?>
               
               <input type="checkbox" name="HVsabado" id="HVsabado" <?php if('on'==esc_attr(get_the_author_meta('HVsabado',$user->ID ))) echo 'checked="checked"'; ?>/> Sábado<br />
                <?php echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HVsabado', $user->ID ) ) . ']</br></br>'; ?>
              
         </td>
     </tr>
     
   <!--
   ////////////////// COMIENZO LUNES ////////////////////
   -->

          <!-- ................
            HORA MAÑANA DESDE
           ..................-->
           
          <tr> 
           <th>
             <label for="HVlunesHoraAM"><?php _e("Mañana desde"); ?></label>
           </th>
               
               <!-- HORAS -->
           <td>
               
               <?php 
               
                   echo '<select name="HVlunesHoraAMdesde" id="HVlunesHoraAMdesde" class="regular-text">';
                   $selectedValue = esc_attr( get_the_author_meta( 'HVlunesHoraAMdesde', $user->ID ) );
                   echo createSelectHour($selectedValue);
                   
//                     $theTimes = generateBusHours(8, 21);
//                     for ($i = 0; $i < count($theTimes); $i++)
//                      //echo '<option value="' . $i . '">' . $theTimes[$i] . '</option>';
//                      echo '<option value="' . $theTimes[$i] . '">' . $theTimes[$i] . '</option>';
//                   echo '</select>';
                   
                ?>
               <span class="description"><br /><?php _e("Hora Visita Lunes"); ?></span>
                         <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                         <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HVlunesHoraAMdesde', $user->ID ) ) . ']</br>'; ?>
          </td>
          
              <!-- MINUTOS -->
          <td>
               
               <?php 
               
                   $timeList = getMinutesForDD(5);
                      echo '<select name="HVlunesMinAMdesde" id="HVlunesMinAMdesde" class="regular-text">';
                      echo populateDropDown($timeList);
                      echo '</select>';
                                      
                ?>
               <span class="description"><br /><?php _e("Minutos Visita Lunes"); ?></span>
                         <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                         <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HVlunesMinAMdesde', $user->ID ) ) . ']</br>'; ?>
          </td>
       </tr>
         <!-- ................
           HORA MAÑANA HASTA
          ..................-->
          
         <tr> 
          <th>
            <label for="HVlunesHoraAM"><?php _e("Mañana hasta"); ?></label>
          </th>
              
              <!-- HORAS -->
          <td>
              
              <?php 
              
                  echo '<select name="HVlunesHoraAMhasta" id="HVlunesHoraAMhasta" class="regular-text">';
                  $selectedValue = esc_attr( get_the_author_meta( 'HVlunesHoraAMhasta', $user->ID ) );
                  echo createSelectHour($selectedValue);
                  
//                    $theTimes = generateBusHours(8, 21);
//                    for ($i = 0; $i < count($theTimes); $i++)
//                     //echo '<option value="' . $i . '">' . $theTimes[$i] . '</option>';
//                     echo '<option value="' . $theTimes[$i] . '">' . $theTimes[$i] . '</option>';
//                  echo '</select>';
                  
               ?>
              <span class="description"><br /><?php _e("Hora Visita Lunes"); ?></span>
                        <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                        <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HVlunesHoraAMhasta', $user->ID ) ) . ']</br>'; ?>
         </td>
         
             <!-- MINUTOS -->
         <td>
              
              <?php 
              
                  $timeList = getMinutesForDD(5);
                     echo '<select name="HVlunesMinAMhasta" id="HVlunesMinAMhasta" class="regular-text">';
                     echo populateDropDown($timeList);
                     echo '</select>';
                                     
               ?>
              <span class="description"><br /><?php _e("Minutos Visita Lunes"); ?></span>
                        <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                        <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HVlunesMinAMhasta', $user->ID ) ) . ']</br>'; ?>
         </td>
      </tr>
      
          <!-- ................
            HORA TARDE DESDE
           ..................-->
           
          <tr> 
           <th>
             <label for="HVlunesHoraPM"><?php _e("Tarde desde"); ?></label>
           </th>
               
               <!-- HORAS -->
           <td>
               
               <?php 
               
                   echo '<select nPMe="HVlunesHoraPMdesde" id="HVlunesHoraPMdesde" class="regular-text">';
                   $selectedValue = esc_attr( get_the_author_meta( 'HVlunesHoraPMdesde', $user->ID ) );
                   echo createSelectHour($selectedValue);
                   
//                     $theTimes = generateBusHours(8, 21);
//                     for ($i = 0; $i < count($theTimes); $i++)
//                      //echo '<option value="' . $i . '">' . $theTimes[$i] . '</option>';
//                      echo '<option value="' . $theTimes[$i] . '">' . $theTimes[$i] . '</option>';
//                   echo '</select>';
                   
                ?>
               <span class="description"><br /><?php _e("Hora Visita Lunes"); ?></span>
                         <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                         <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HVlunesHoraPMdesde', $user->ID ) ) . ']</br>'; ?>
          </td>
          
              <!-- MINUTOS -->
          <td>
               
               <?php 
               
                   $timeList = getMinutesForDD(5);
                      echo '<select nPMe="HVlunesMinPMdesde" id="HVlunesMinPMdesde" class="regular-text">';
                      echo populateDropDown($timeList);
                      echo '</select>';
                                      
                ?>
               <span class="description"><br /><?php _e("Minutos Visita Lunes"); ?></span>
                         <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                         <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HVlunesMinPMdesde', $user->ID ) ) . ']</br>'; ?>
          </td>
       </tr>
         <!-- ................
           HORA TARDE HASTA
          ..................-->
          
         <tr> 
          <th>
            <label for="HVlunesHoraPM"><?php _e("Tarde hasta"); ?></label>
          </th>
              
              <!-- HORAS -->
          <td>
              
              <?php 
              
                  echo '<select nPMe="HVlunesHoraPMhasta" id="HVlunesHoraPMhasta" class="regular-text">';
                  $selectedValue = esc_attr( get_the_author_meta( 'HVlunesHoraPMhasta', $user->ID ) );
                  echo createSelectHour($selectedValue);
                  
//                    $theTimes = generateBusHours(8, 21);
//                    for ($i = 0; $i < count($theTimes); $i++)
//                     //echo '<option value="' . $i . '">' . $theTimes[$i] . '</option>';
//                     echo '<option value="' . $theTimes[$i] . '">' . $theTimes[$i] . '</option>';
//                  echo '</select>';
                  
               ?>
              <span class="description"><br /><?php _e("Hora Visita Lunes"); ?></span>
                        <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                        <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HVlunesHoraPMhasta', $user->ID ) ) . ']</br>'; ?>
         </td>
         
             <!-- MINUTOS -->
         <td>
              
              <?php 
              
                  $timeList = getMinutesForDD(5);
                     echo '<select nPMe="HVlunesMinPMhasta" id="HVlunesMinPMhasta" class="regular-text">';
                     echo populateDropDown($timeList);
                     echo '</select>';
                                     
               ?>
              <span class="description"><br /><?php _e("Minutos Visita Lunes"); ?></span>
                        <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                        <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HVlunesMinPMhasta', $user->ID ) ) . ']</br>'; ?>
         </td>
      </tr>
      
       <!--
       ////////////////// FIN LUNES ////////////////////
       -->
  <!--
   ////////////////// COMIENZO martes ////////////////////
   -->

          <!-- ................
            HORA MAÑANA DESDE
           ..................-->
           
          <tr> 
           <th>
             <label for="HVmartesHoraAM"><?php _e("Mañana desde"); ?></label>
           </th>
               
               <!-- HORAS -->
           <td>
               
               <?php 
               
                   echo '<select name="HVmartesHoraAMdesde" id="HVmartesHoraAMdesde" class="regular-text">';
                   $selectedValue = esc_attr( get_the_author_meta( 'HVmartesHoraAMdesde', $user->ID ) );
                   echo createSelectHour($selectedValue);
                   
//                     $theTimes = generateBusHours(8, 21);
//                     for ($i = 0; $i < count($theTimes); $i++)
//                      //echo '<option value="' . $i . '">' . $theTimes[$i] . '</option>';
//                      echo '<option value="' . $theTimes[$i] . '">' . $theTimes[$i] . '</option>';
//                   echo '</select>';
                   
                ?>
               <span class="description"><br /><?php _e("Hora Visita martes"); ?></span>
                         <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                         <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HVmartesHoraAMdesde', $user->ID ) ) . ']</br>'; ?>
          </td>
          
              <!-- MINUTOS -->
          <td>
               
               <?php 
               
                   $timeList = getMinutesForDD(5);
                      echo '<select name="HVmartesMinAMdesde" id="HVmartesMinAMdesde" class="regular-text">';
                      echo populateDropDown($timeList);
                      echo '</select>';
                                      
                ?>
               <span class="description"><br /><?php _e("Minutos Visita martes"); ?></span>
                         <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                         <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HVmartesMinAMdesde', $user->ID ) ) . ']</br>'; ?>
          </td>
       </tr>
         <!-- ................
           HORA MAÑANA HASTA
          ..................-->
          
         <tr> 
          <th>
            <label for="HVmartesHoraAM"><?php _e("Mañana hasta"); ?></label>
          </th>
              
              <!-- HORAS -->
          <td>
              
              <?php 
              
                  echo '<select name="HVmartesHoraAMhasta" id="HVmartesHoraAMhasta" class="regular-text">';
                  $selectedValue = esc_attr( get_the_author_meta( 'HVmartesHoraAMhasta', $user->ID ) );
                  echo createSelectHour($selectedValue);
                  
//                    $theTimes = generateBusHours(8, 21);
//                    for ($i = 0; $i < count($theTimes); $i++)
//                     //echo '<option value="' . $i . '">' . $theTimes[$i] . '</option>';
//                     echo '<option value="' . $theTimes[$i] . '">' . $theTimes[$i] . '</option>';
//                  echo '</select>';
                  
               ?>
              <span class="description"><br /><?php _e("Hora Visita martes"); ?></span>
                        <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                        <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HVmartesHoraAMhasta', $user->ID ) ) . ']</br>'; ?>
         </td>
         
             <!-- MINUTOS -->
         <td>
              
              <?php 
              
                  $timeList = getMinutesForDD(5);
                     echo '<select name="HVmartesMinAMhasta" id="HVmartesMinAMhasta" class="regular-text">';
                     echo populateDropDown($timeList);
                     echo '</select>';
                                     
               ?>
              <span class="description"><br /><?php _e("Minutos Visita martes"); ?></span>
                        <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                        <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HVmartesMinAMhasta', $user->ID ) ) . ']</br>'; ?>
         </td>
      </tr>
      
          <!-- ................
            HORA TARDE DESDE
           ..................-->
           
          <tr> 
           <th>
             <label for="HVmartesHoraPM"><?php _e("Tarde desde"); ?></label>
           </th>
               
               <!-- HORAS -->
           <td>
               
               <?php 
               
                   echo '<select nPMe="HVmartesHoraPMdesde" id="HVmartesHoraPMdesde" class="regular-text">';
                   $selectedValue = esc_attr( get_the_author_meta( 'HVmartesHoraPMdesde', $user->ID ) );
                   echo createSelectHour($selectedValue);
                   
//                     $theTimes = generateBusHours(8, 21);
//                     for ($i = 0; $i < count($theTimes); $i++)
//                      //echo '<option value="' . $i . '">' . $theTimes[$i] . '</option>';
//                      echo '<option value="' . $theTimes[$i] . '">' . $theTimes[$i] . '</option>';
//                   echo '</select>';
                   
                ?>
               <span class="description"><br /><?php _e("Hora Visita martes"); ?></span>
                         <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                         <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HVmartesHoraPMdesde', $user->ID ) ) . ']</br>'; ?>
          </td>
          
              <!-- MINUTOS -->
          <td>
               
               <?php 
               
                   $timeList = getMinutesForDD(5);
                      echo '<select nPMe="HVmartesMinPMdesde" id="HVmartesMinPMdesde" class="regular-text">';
                      echo populateDropDown($timeList);
                      echo '</select>';
                                      
                ?>
               <span class="description"><br /><?php _e("Minutos Visita martes"); ?></span>
                         <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                         <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HVmartesMinPMdesde', $user->ID ) ) . ']</br>'; ?>
          </td>
       </tr>
         <!-- ................
           HORA TARDE HASTA
          ..................-->
          
         <tr> 
          <th>
            <label for="HVmartesHoraPM"><?php _e("Tarde hasta"); ?></label>
          </th>
              
              <!-- HORAS -->
          <td>
              
              <?php 
              
                  echo '<select nPMe="HVmartesHoraPMhasta" id="HVmartesHoraPMhasta" class="regular-text">';
                  $selectedValue = esc_attr( get_the_author_meta( 'HVmartesHoraPMhasta', $user->ID ) );
                  echo createSelectHour($selectedValue);
                  
//                    $theTimes = generateBusHours(8, 21);
//                    for ($i = 0; $i < count($theTimes); $i++)
//                     //echo '<option value="' . $i . '">' . $theTimes[$i] . '</option>';
//                     echo '<option value="' . $theTimes[$i] . '">' . $theTimes[$i] . '</option>';
//                  echo '</select>';
                  
               ?>
              <span class="description"><br /><?php _e("Hora Visita martes"); ?></span>
                        <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                        <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HVmartesHoraPMhasta', $user->ID ) ) . ']</br>'; ?>
         </td>
         
             <!-- MINUTOS -->
         <td>
              
              <?php 
              
                  $timeList = getMinutesForDD(5);
                     echo '<select nPMe="HVmartesMinPMhasta" id="HVmartesMinPMhasta" class="regular-text">';
                     echo populateDropDown($timeList);
                     echo '</select>';
                                     
               ?>
              <span class="description"><br /><?php _e("Minutos Visita martes"); ?></span>
                        <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                        <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HVmartesMinPMhasta', $user->ID ) ) . ']</br>'; ?>
         </td>
      </tr>
      
       <!--
       ////////////////// FIN martes ////////////////////
       -->           
    
  <!--
   ////////////////// COMIENZO miercoles ////////////////////
   -->

          <!-- ................
            HORA MAÑANA DESDE
           ..................-->
           
          <tr> 
           <th>
             <label for="HVmiercolesHoraAM"><?php _e("Mañana desde"); ?></label>
           </th>
               
               <!-- HORAS -->
           <td>
               
               <?php 
               
                   echo '<select name="HVmiercolesHoraAMdesde" id="HVmiercolesHoraAMdesde" class="regular-text">';
                   $selectedValue = esc_attr( get_the_author_meta( 'HVmiercolesHoraAMdesde', $user->ID ) );
                   echo createSelectHour($selectedValue);
                   
//                     $theTimes = generateBusHours(8, 21);
//                     for ($i = 0; $i < count($theTimes); $i++)
//                      //echo '<option value="' . $i . '">' . $theTimes[$i] . '</option>';
//                      echo '<option value="' . $theTimes[$i] . '">' . $theTimes[$i] . '</option>';
//                   echo '</select>';
                   
                ?>
               <span class="description"><br /><?php _e("Hora Visita miercoles"); ?></span>
                         <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                         <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HVmiercolesHoraAMdesde', $user->ID ) ) . ']</br>'; ?>
          </td>
          
              <!-- MINUTOS -->
          <td>
               
               <?php 
               
                   $timeList = getMinutesForDD(5);
                      echo '<select name="HVmiercolesMinAMdesde" id="HVmiercolesMinAMdesde" class="regular-text">';
                      echo populateDropDown($timeList);
                      echo '</select>';
                                      
                ?>
               <span class="description"><br /><?php _e("Minutos Visita miercoles"); ?></span>
                         <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                         <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HVmiercolesMinAMdesde', $user->ID ) ) . ']</br>'; ?>
          </td>
       </tr>
         <!-- ................
           HORA MAÑANA HASTA
          ..................-->
          
         <tr> 
          <th>
            <label for="HVmiercolesHoraAM"><?php _e("Mañana hasta"); ?></label>
          </th>
              
              <!-- HORAS -->
          <td>
              
              <?php 
              
                  echo '<select name="HVmiercolesHoraAMhasta" id="HVmiercolesHoraAMhasta" class="regular-text">';
                  $selectedValue = esc_attr( get_the_author_meta( 'HVmiercolesHoraAMhasta', $user->ID ) );
                  echo createSelectHour($selectedValue);
                  
//                    $theTimes = generateBusHours(8, 21);
//                    for ($i = 0; $i < count($theTimes); $i++)
//                     //echo '<option value="' . $i . '">' . $theTimes[$i] . '</option>';
//                     echo '<option value="' . $theTimes[$i] . '">' . $theTimes[$i] . '</option>';
//                  echo '</select>';
                  
               ?>
              <span class="description"><br /><?php _e("Hora Visita miercoles"); ?></span>
                        <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                        <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HVmiercolesHoraAMhasta', $user->ID ) ) . ']</br>'; ?>
         </td>
         
             <!-- MINUTOS -->
         <td>
              
              <?php 
              
                  $timeList = getMinutesForDD(5);
                     echo '<select name="HVmiercolesMinAMhasta" id="HVmiercolesMinAMhasta" class="regular-text">';
                     echo populateDropDown($timeList);
                     echo '</select>';
                                     
               ?>
              <span class="description"><br /><?php _e("Minutos Visita miercoles"); ?></span>
                        <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                        <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HVmiercolesMinAMhasta', $user->ID ) ) . ']</br>'; ?>
         </td>
      </tr>
      
          <!-- ................
            HORA TARDE DESDE
           ..................-->
           
          <tr> 
           <th>
             <label for="HVmiercolesHoraPM"><?php _e("Tarde desde"); ?></label>
           </th>
               
               <!-- HORAS -->
           <td>
               
               <?php 
               
                   echo '<select nPMe="HVmiercolesHoraPMdesde" id="HVmiercolesHoraPMdesde" class="regular-text">';
                   $selectedValue = esc_attr( get_the_author_meta( 'HVmiercolesHoraPMdesde', $user->ID ) );
                   echo createSelectHour($selectedValue);
                   
//                     $theTimes = generateBusHours(8, 21);
//                     for ($i = 0; $i < count($theTimes); $i++)
//                      //echo '<option value="' . $i . '">' . $theTimes[$i] . '</option>';
//                      echo '<option value="' . $theTimes[$i] . '">' . $theTimes[$i] . '</option>';
//                   echo '</select>';
                   
                ?>
               <span class="description"><br /><?php _e("Hora Visita miercoles"); ?></span>
                         <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                         <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HVmiercolesHoraPMdesde', $user->ID ) ) . ']</br>'; ?>
          </td>
          
              <!-- MINUTOS -->
          <td>
               
               <?php 
               
                   $timeList = getMinutesForDD(5);
                      echo '<select nPMe="HVmiercolesMinPMdesde" id="HVmiercolesMinPMdesde" class="regular-text">';
                      echo populateDropDown($timeList);
                      echo '</select>';
                                      
                ?>
               <span class="description"><br /><?php _e("Minutos Visita miercoles"); ?></span>
                         <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                         <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HVmiercolesMinPMdesde', $user->ID ) ) . ']</br>'; ?>
          </td>
       </tr>
         <!-- ................
           HORA TARDE HASTA
          ..................-->
          
         <tr> 
          <th>
            <label for="HVmiercolesHoraPM"><?php _e("Tarde hasta"); ?></label>
          </th>
              
              <!-- HORAS -->
          <td>
              
              <?php 
              
                  echo '<select nPMe="HVmiercolesHoraPMhasta" id="HVmiercolesHoraPMhasta" class="regular-text">';
                  $selectedValue = esc_attr( get_the_author_meta( 'HVmiercolesHoraPMhasta', $user->ID ) );
                  echo createSelectHour($selectedValue);
                  
//                    $theTimes = generateBusHours(8, 21);
//                    for ($i = 0; $i < count($theTimes); $i++)
//                     //echo '<option value="' . $i . '">' . $theTimes[$i] . '</option>';
//                     echo '<option value="' . $theTimes[$i] . '">' . $theTimes[$i] . '</option>';
//                  echo '</select>';
                  
               ?>
              <span class="description"><br /><?php _e("Hora Visita miercoles"); ?></span>
                        <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                        <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HVmiercolesHoraPMhasta', $user->ID ) ) . ']</br>'; ?>
         </td>
         
             <!-- MINUTOS -->
         <td>
              
              <?php 
              
                  $timeList = getMinutesForDD(5);
                     echo '<select nPMe="HVmiercolesMinPMhasta" id="HVmiercolesMinPMhasta" class="regular-text">';
                     echo populateDropDown($timeList);
                     echo '</select>';
                                     
               ?>
              <span class="description"><br /><?php _e("Minutos Visita miercoles"); ?></span>
                        <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                        <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HVmiercolesMinPMhasta', $user->ID ) ) . ']</br>'; ?>
         </td>
      </tr>
      
       <!--
       ////////////////// FIN miercoles ////////////////////
       -->
       
  <!--
   ////////////////// COMIENZO jueves ////////////////////
   -->

          <!-- ................
            HORA MAÑANA DESDE
           ..................-->
           
          <tr> 
           <th>
             <label for="HVjuevesHoraAM"><?php _e("Mañana desde"); ?></label>
           </th>
               
               <!-- HORAS -->
           <td>
               
               <?php 
               
                   echo '<select name="HVjuevesHoraAMdesde" id="HVjuevesHoraAMdesde" class="regular-text">';
                   $selectedValue = esc_attr( get_the_author_meta( 'HVjuevesHoraAMdesde', $user->ID ) );
                   echo createSelectHour($selectedValue);
                   
//                     $theTimes = generateBusHours(8, 21);
//                     for ($i = 0; $i < count($theTimes); $i++)
//                      //echo '<option value="' . $i . '">' . $theTimes[$i] . '</option>';
//                      echo '<option value="' . $theTimes[$i] . '">' . $theTimes[$i] . '</option>';
//                   echo '</select>';
                   
                ?>
               <span class="description"><br /><?php _e("Hora Visita jueves"); ?></span>
                         <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                         <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HVjuevesHoraAMdesde', $user->ID ) ) . ']</br>'; ?>
          </td>
          
              <!-- MINUTOS -->
          <td>
               
               <?php 
               
                   $timeList = getMinutesForDD(5);
                      echo '<select name="HVjuevesMinAMdesde" id="HVjuevesMinAMdesde" class="regular-text">';
                      echo populateDropDown($timeList);
                      echo '</select>';
                                      
                ?>
               <span class="description"><br /><?php _e("Minutos Visita jueves"); ?></span>
                         <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                         <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HVjuevesMinAMdesde', $user->ID ) ) . ']</br>'; ?>
          </td>
       </tr>
         <!-- ................
           HORA MAÑANA HASTA
          ..................-->
          
         <tr> 
          <th>
            <label for="HVjuevesHoraAM"><?php _e("Mañana hasta"); ?></label>
          </th>
              
              <!-- HORAS -->
          <td>
              
              <?php 
              
                  echo '<select name="HVjuevesHoraAMhasta" id="HVjuevesHoraAMhasta" class="regular-text">';
                  $selectedValue = esc_attr( get_the_author_meta( 'HVjuevesHoraAMhasta', $user->ID ) );
                  echo createSelectHour($selectedValue);
                  
//                    $theTimes = generateBusHours(8, 21);
//                    for ($i = 0; $i < count($theTimes); $i++)
//                     //echo '<option value="' . $i . '">' . $theTimes[$i] . '</option>';
//                     echo '<option value="' . $theTimes[$i] . '">' . $theTimes[$i] . '</option>';
//                  echo '</select>';
                  
               ?>
              <span class="description"><br /><?php _e("Hora Visita jueves"); ?></span>
                        <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                        <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HVjuevesHoraAMhasta', $user->ID ) ) . ']</br>'; ?>
         </td>
         
             <!-- MINUTOS -->
         <td>
              
              <?php 
              
                  $timeList = getMinutesForDD(5);
                     echo '<select name="HVjuevesMinAMhasta" id="HVjuevesMinAMhasta" class="regular-text">';
                     echo populateDropDown($timeList);
                     echo '</select>';
                                     
               ?>
              <span class="description"><br /><?php _e("Minutos Visita jueves"); ?></span>
                        <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                        <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HVjuevesMinAMhasta', $user->ID ) ) . ']</br>'; ?>
         </td>
      </tr>
      
          <!-- ................
            HORA TARDE DESDE
           ..................-->
           
          <tr> 
           <th>
             <label for="HVjuevesHoraPM"><?php _e("Tarde desde"); ?></label>
           </th>
               
               <!-- HORAS -->
           <td>
               
               <?php 
               
                   echo '<select nPMe="HVjuevesHoraPMdesde" id="HVjuevesHoraPMdesde" class="regular-text">';
                   $selectedValue = esc_attr( get_the_author_meta( 'HVjuevesHoraPMdesde', $user->ID ) );
                   echo createSelectHour($selectedValue);
                   
//                     $theTimes = generateBusHours(8, 21);
//                     for ($i = 0; $i < count($theTimes); $i++)
//                      //echo '<option value="' . $i . '">' . $theTimes[$i] . '</option>';
//                      echo '<option value="' . $theTimes[$i] . '">' . $theTimes[$i] . '</option>';
//                   echo '</select>';
                   
                ?>
               <span class="description"><br /><?php _e("Hora Visita jueves"); ?></span>
                         <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                         <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HVjuevesHoraPMdesde', $user->ID ) ) . ']</br>'; ?>
          </td>
          
              <!-- MINUTOS -->
          <td>
               
               <?php 
               
                   $timeList = getMinutesForDD(5);
                      echo '<select nPMe="HVjuevesMinPMdesde" id="HVjuevesMinPMdesde" class="regular-text">';
                      echo populateDropDown($timeList);
                      echo '</select>';
                                      
                ?>
               <span class="description"><br /><?php _e("Minutos Visita jueves"); ?></span>
                         <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                         <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HVjuevesMinPMdesde', $user->ID ) ) . ']</br>'; ?>
          </td>
       </tr>
         <!-- ................
           HORA TARDE HASTA
          ..................-->
          
         <tr> 
          <th>
            <label for="HVjuevesHoraPM"><?php _e("Tarde hasta"); ?></label>
          </th>
              
              <!-- HORAS -->
          <td>
              
              <?php 
              
                  echo '<select nPMe="HVjuevesHoraPMhasta" id="HVjuevesHoraPMhasta" class="regular-text">';
                  $selectedValue = esc_attr( get_the_author_meta( 'HVjuevesHoraPMhasta', $user->ID ) );
                  echo createSelectHour($selectedValue);
                  
//                    $theTimes = generateBusHours(8, 21);
//                    for ($i = 0; $i < count($theTimes); $i++)
//                     //echo '<option value="' . $i . '">' . $theTimes[$i] . '</option>';
//                     echo '<option value="' . $theTimes[$i] . '">' . $theTimes[$i] . '</option>';
//                  echo '</select>';
                  
               ?>
              <span class="description"><br /><?php _e("Hora Visita jueves"); ?></span>
                        <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                        <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HVjuevesHoraPMhasta', $user->ID ) ) . ']</br>'; ?>
         </td>
         
             <!-- MINUTOS -->
         <td>
              
              <?php 
              
                  $timeList = getMinutesForDD(5);
                     echo '<select nPMe="HVjuevesMinPMhasta" id="HVjuevesMinPMhasta" class="regular-text">';
                     echo populateDropDown($timeList);
                     echo '</select>';
               ?>
              <span class="description"><br /><?php _e("Minutos Visita jueves"); ?></span>
                        <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                        <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HVjuevesMinPMhasta', $user->ID ) ) . ']</br>'; ?>
         </td>
      </tr>
      
       <!--
       ////////////////// FIN jueves ////////////////////
       -->
       
  <!--
   ////////////////// COMIENZO viernes ////////////////////
   -->

          <!-- ................
            HORA MAÑANA DESDE
           ..................-->
           
          <tr> 
           <th>
             <label for="HVviernesHoraAM"><?php _e("Mañana desde"); ?></label>
           </th>
               
               <!-- HORAS -->
           <td>
               
               <?php 
               
                   echo '<select name="HVviernesHoraAMdesde" id="HVviernesHoraAMdesde" class="regular-text">';
                   $selectedValue = esc_attr( get_the_author_meta( 'HVviernesHoraAMdesde', $user->ID ) );
                   echo createSelectHour($selectedValue);
                   
//                     $theTimes = generateBusHours(8, 21);
//                     for ($i = 0; $i < count($theTimes); $i++)
//                      //echo '<option value="' . $i . '">' . $theTimes[$i] . '</option>';
//                      echo '<option value="' . $theTimes[$i] . '">' . $theTimes[$i] . '</option>';
//                   echo '</select>';
                   
                ?>
               <span class="description"><br /><?php _e("Hora Visita viernes"); ?></span>
                         <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                         <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HVviernesHoraAMdesde', $user->ID ) ) . ']</br>'; ?>
          </td>
          
              <!-- MINUTOS -->
          <td>
               
               <?php 
               
                   $timeList = getMinutesForDD(5);
                      echo '<select name="HVviernesMinAMdesde" id="HVviernesMinAMdesde" class="regular-text">';
                      echo populateDropDown($timeList);
                      echo '</select>';
                                      
                ?>
               <span class="description"><br /><?php _e("Minutos Visita viernes"); ?></span>
                         <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                         <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HVviernesMinAMdesde', $user->ID ) ) . ']</br>'; ?>
          </td>
       </tr>
         <!-- ................
           HORA MAÑANA HASTA
          ..................-->
          
         <tr> 
          <th>
            <label for="HVviernesHoraAM"><?php _e("Mañana hasta"); ?></label>
          </th>
              
              <!-- HORAS -->
          <td>
              
              <?php 
              
                  echo '<select name="HVviernesHoraAMhasta" id="HVviernesHoraAMhasta" class="regular-text">';
                  $selectedValue = esc_attr( get_the_author_meta( 'HVviernesHoraAMhasta', $user->ID ) );
                  echo createSelectHour($selectedValue);
                  
//                    $theTimes = generateBusHours(8, 21);
//                    for ($i = 0; $i < count($theTimes); $i++)
//                     //echo '<option value="' . $i . '">' . $theTimes[$i] . '</option>';
//                     echo '<option value="' . $theTimes[$i] . '">' . $theTimes[$i] . '</option>';
//                  echo '</select>';
                  
               ?>
              <span class="description"><br /><?php _e("Hora Visita viernes"); ?></span>
                        <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                        <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HVviernesHoraAMhasta', $user->ID ) ) . ']</br>'; ?>
         </td>
         
             <!-- MINUTOS -->
         <td>
              
              <?php 
              
                  $timeList = getMinutesForDD(5);
                     echo '<select name="HVviernesMinAMhasta" id="HVviernesMinAMhasta" class="regular-text">';
                     echo populateDropDown($timeList);
                     echo '</select>';
                                     
               ?>
              <span class="description"><br /><?php _e("Minutos Visita viernes"); ?></span>
                        <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                        <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HVviernesMinAMhasta', $user->ID ) ) . ']</br>'; ?>
         </td>
      </tr>
      
          <!-- ................
            HORA TARDE DESDE
           ..................-->
           
          <tr> 
           <th>
             <label for="HVviernesHoraPM"><?php _e("Tarde desde"); ?></label>
           </th>
               
               <!-- HORAS -->
           <td>
               
               <?php 
               
                   echo '<select nPMe="HVviernesHoraPMdesde" id="HVviernesHoraPMdesde" class="regular-text">';
                   $selectedValue = esc_attr( get_the_author_meta( 'HVviernesHoraPMdesde', $user->ID ) );
                   echo createSelectHour($selectedValue);
                   
//                     $theTimes = generateBusHours(8, 21);
//                     for ($i = 0; $i < count($theTimes); $i++)
//                      //echo '<option value="' . $i . '">' . $theTimes[$i] . '</option>';
//                      echo '<option value="' . $theTimes[$i] . '">' . $theTimes[$i] . '</option>';
//                   echo '</select>';
                   
                ?>
               <span class="description"><br /><?php _e("Hora Visita viernes"); ?></span>
                         <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                         <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HVviernesHoraPMdesde', $user->ID ) ) . ']</br>'; ?>
          </td>
          
              <!-- MINUTOS -->
          <td>
               
               <?php 
               
                   $timeList = getMinutesForDD(5);
                      echo '<select nPMe="HVviernesMinPMdesde" id="HVviernesMinPMdesde" class="regular-text">';
                      echo populateDropDown($timeList);
                      echo '</select>';
                                      
                ?>
               <span class="description"><br /><?php _e("Minutos Visita viernes"); ?></span>
                         <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                         <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HVviernesMinPMdesde', $user->ID ) ) . ']</br>'; ?>
          </td>
       </tr>
         <!-- ................
           HORA TARDE HASTA
          ..................-->
          
         <tr> 
          <th>
            <label for="HVviernesHoraPM"><?php _e("Tarde hasta"); ?></label>
          </th>
              
              <!-- HORAS -->
          <td>
              
              <?php 
              
                  echo '<select nPMe="HVviernesHoraPMhasta" id="HVviernesHoraPMhasta" class="regular-text">';
                  $selectedValue = esc_attr( get_the_author_meta( 'HVviernesHoraPMhasta', $user->ID ) );
                  echo createSelectHour($selectedValue);
                  
//                    $theTimes = generateBusHours(8, 21);
//                    for ($i = 0; $i < count($theTimes); $i++)
//                     //echo '<option value="' . $i . '">' . $theTimes[$i] . '</option>';
//                     echo '<option value="' . $theTimes[$i] . '">' . $theTimes[$i] . '</option>';
//                  echo '</select>';
                  
               ?>
              <span class="description"><br /><?php _e("Hora Visita viernes"); ?></span>
                        <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                        <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HVviernesHoraPMhasta', $user->ID ) ) . ']</br>'; ?>
         </td>
         
             <!-- MINUTOS -->
         <td>
              
              <?php 
              
                  $timeList = getMinutesForDD(5);
                     echo '<select nPMe="HVviernesMinPMhasta" id="HVviernesMinPMhasta" class="regular-text">';
                     echo populateDropDown($timeList);
                     echo '</select>';
                                     
               ?>
              <span class="description"><br /><?php _e("Minutos Visita viernes"); ?></span>
                        <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                        <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HVviernesMinPMhasta', $user->ID ) ) . ']</br>'; ?>
         </td>
      </tr>
      
       <!--
       ////////////////// FIN viernes ////////////////////
       -->
       
  <!--
   ////////////////// COMIENZO sabado ////////////////////
   -->

          <!-- ................
            HORA MAÑANA DESDE
           ..................-->
           
          <tr> 
           <th>
             <label for="HVsabadoHoraAM"><?php _e("Mañana desde"); ?></label>
           </th>
               
               <!-- HORAS -->
           <td>
               
               <?php 
               
                   echo '<select name="HVsabadoHoraAMdesde" id="HVsabadoHoraAMdesde" class="regular-text">';
                   $selectedValue = esc_attr( get_the_author_meta( 'HVsabadoHoraAMdesde', $user->ID ) );
                   echo createSelectHour($selectedValue);
                   
//                     $theTimes = generateBusHours(8, 21);
//                     for ($i = 0; $i < count($theTimes); $i++)
//                      //echo '<option value="' . $i . '">' . $theTimes[$i] . '</option>';
//                      echo '<option value="' . $theTimes[$i] . '">' . $theTimes[$i] . '</option>';
//                   echo '</select>';
                   
                ?>
               <span class="description"><br /><?php _e("Hora Visita sabado"); ?></span>
                         <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                         <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HVsabadoHoraAMdesde', $user->ID ) ) . ']</br>'; ?>
          </td>
          
              <!-- MINUTOS -->
          <td>
               
               <?php 
               
                   $timeList = getMinutesForDD(5);
                      echo '<select name="HVsabadoMinAMdesde" id="HVsabadoMinAMdesde" class="regular-text">';
                      echo populateDropDown($timeList);
                      echo '</select>';
                                      
                ?>
               <span class="description"><br /><?php _e("Minutos Visita sabado"); ?></span>
                         <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                         <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HVsabadoMinAMdesde', $user->ID ) ) . ']</br>'; ?>
          </td>
       </tr>
         <!-- ................
           HORA MAÑANA HASTA
          ..................-->
          
         <tr> 
          <th>
            <label for="HVsabadoHoraAM"><?php _e("Mañana hasta"); ?></label>
          </th>
              
              <!-- HORAS -->
          <td>
              
              <?php 
              
                  echo '<select name="HVsabadoHoraAMhasta" id="HVsabadoHoraAMhasta" class="regular-text">';
                  $selectedValue = esc_attr( get_the_author_meta( 'HVsabadoHoraAMhasta', $user->ID ) );
                  echo createSelectHour($selectedValue);
                  
//                    $theTimes = generateBusHours(8, 21);
//                    for ($i = 0; $i < count($theTimes); $i++)
//                     //echo '<option value="' . $i . '">' . $theTimes[$i] . '</option>';
//                     echo '<option value="' . $theTimes[$i] . '">' . $theTimes[$i] . '</option>';
//                  echo '</select>';
                  
               ?>
              <span class="description"><br /><?php _e("Hora Visita sabado"); ?></span>
                        <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                        <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HVsabadoHoraAMhasta', $user->ID ) ) . ']</br>'; ?>
         </td>
         
             <!-- MINUTOS -->
         <td>
              
              <?php 
              
                  $timeList = getMinutesForDD(5);
                     echo '<select name="HVsabadoMinAMhasta" id="HVsabadoMinAMhasta" class="regular-text">';
                     echo populateDropDown($timeList);
                     echo '</select>';
                                     
               ?>
              <span class="description"><br /><?php _e("Minutos Visita sabado"); ?></span>
                        <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                        <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HVsabadoMinAMhasta', $user->ID ) ) . ']</br>'; ?>
         </td>
      </tr>
      
          <!-- ................
            HORA TARDE DESDE
           ..................-->
           
          <tr> 
           <th>
             <label for="HVsabadoHoraPM"><?php _e("Tarde desde"); ?></label>
           </th>
               
               <!-- HORAS -->
           <td>
               
               <?php 
               
                   echo '<select nPMe="HVsabadoHoraPMdesde" id="HVsabadoHoraPMdesde" class="regular-text">';
                   $selectedValue = esc_attr( get_the_author_meta( 'HVsabadoHoraPMdesde', $user->ID ) );
                   echo createSelectHour($selectedValue);
                   
//                     $theTimes = generateBusHours(8, 21);
//                     for ($i = 0; $i < count($theTimes); $i++)
//                      //echo '<option value="' . $i . '">' . $theTimes[$i] . '</option>';
//                      echo '<option value="' . $theTimes[$i] . '">' . $theTimes[$i] . '</option>';
//                   echo '</select>';
                   
                ?>
               <span class="description"><br /><?php _e("Hora Visita sabado"); ?></span>
                         <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                         <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HVsabadoHoraPMdesde', $user->ID ) ) . ']</br>'; ?>
          </td>
          
              <!-- MINUTOS -->
          <td>
               
               <?php 
               
                   $timeList = getMinutesForDD(5);
                      echo '<select nPMe="HVsabadoMinPMdesde" id="HVsabadoMinPMdesde" class="regular-text">';
                      echo populateDropDown($timeList);
                      echo '</select>';
                                      
                ?>
               <span class="description"><br /><?php _e("Minutos Visita sabado"); ?></span>
                         <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                         <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HVsabadoMinPMdesde', $user->ID ) ) . ']</br>'; ?>
          </td>
       </tr>
         <!-- ................
           HORA TARDE HASTA
          ..................-->
          
         <tr> 
          <th>
            <label for="HVsabadoHoraPM"><?php _e("Tarde hasta"); ?></label>
          </th>
              
              <!-- HORAS -->
          <td>
              
              <?php 
              
                  echo '<select nPMe="HVsabadoHoraPMhasta" id="HVsabadoHoraPMhasta" class="regular-text">';
                  $selectedValue = esc_attr( get_the_author_meta( 'HVsabadoHoraPMhasta', $user->ID ) );
                  echo createSelectHour($selectedValue);
                  
//                    $theTimes = generateBusHours(8, 21);
//                    for ($i = 0; $i < count($theTimes); $i++)
//                     //echo '<option value="' . $i . '">' . $theTimes[$i] . '</option>';
//                     echo '<option value="' . $theTimes[$i] . '">' . $theTimes[$i] . '</option>';
//                  echo '</select>';
                  
               ?>
              <span class="description"><br /><?php _e("Hora Visita sabado"); ?></span>
                        <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                        <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HVsabadoHoraPMhasta', $user->ID ) ) . ']</br>'; ?>
         </td>
         
             <!-- MINUTOS -->
         <td>
              
              <?php 
              
                  $timeList = getMinutesForDD(5);
                     echo '<select nPMe="HVsabadoMinPMhasta" id="HVsabadoMinPMhasta" class="regular-text">';
                     echo populateDropDown($timeList);
                     echo '</select>';
                                     
               ?>
              <span class="description"><br /><?php _e("Minutos Visita sabado"); ?></span>
                        <?php //echo 'Client ID = [' . $user->ID . ']</br>'; ?>
                        <?php //echo 'Sector    = [' . esc_attr( get_the_author_meta( 'HVsabadoMinPMhasta', $user->ID ) ) . ']</br>'; ?>
         </td>
      </tr>
      
       <!--
       ////////////////// FIN sabado ////////////////////
       --> 
            
  <!--
    RANKIN DEL CLIENTE
  -->   
  <tr>
        <th>
          <label for="rankinCliente"><?php _e("Sector del Cliente"); ?></label>
        </th>
        <td>
            <select name="rankinCliente" id="rankinCliente" 
                  value="<?php echo esc_attr( get_the_author_meta( 'rankinCliente', $user->ID ) ); ?>" 
                  class="regular-text" >
  <?php
                  $selectedValue = esc_attr( get_the_author_meta( 'rankinCliente', $user->ID ) );
                     if ($selectedValue == "alto")
                      echo '<option value="alto" selected>Alto</option>';
                     else
                      echo '<option value="alto">Alto</option>';
  
                     if ($selectedValue == "medio")
                      echo '<option value="medio" selected>Medio</option>';
                     else
                      echo '<option value="medio">Medio</option>';
  
                     if ($selectedValue == "bajo")
                      echo '<option value="bajo" selected>Bajo</option>';
                     else
                      echo '<option value="bajo">Bajo</option>';
  ?>
            </select>
            <span class="description"><?php _e("Rankin del Cliente"); ?></span>
            <?php echo 'Client ID = [' . $user->ID . ']</br>'; ?>
            <?php echo 'Sector    = [' . esc_attr( get_the_author_meta( 'rankinCliente', $user->ID ) ) . ']</br>'; ?>
        </td>
  </tr>
  
  <!--
    COMERCIAL QUE LO VISITA
  -->   
  
<!--

        EL CODIGO ESTA GENERADO EN EL FUNCTIONS.PHP UTILIZANDO UNA FUNCION DEL GRAVITY FORMS

--> 

<tr>
      <th>
        <label for="comercialAsignado"><?php _e("Comercial Asignado"); ?></label>
      </th>
      <td>
          <select name="comercialAsignado" id="comercialAsignado" 
                value="<?php echo esc_attr( get_the_author_meta( 'comercialAsignado', $user->ID ) ); ?>" 
                class="regular-text" >
          </select>

          <span class="description"><?php _e("Tratamiento del Contacto"); ?></span>
          <?php echo 'Client ID = [' . $user->ID . ']</br>'; ?>
          <?php echo 'Sector    = [' . esc_attr( get_the_author_meta( 'tratamientoContacto', $user->ID ) ) . ']</br>'; ?>
      </td>
</tr>

<!--
  NUMERO ASIGNADO PARA LA RUTA DEL COMERCIAL
-->
<tr>
   <th>
     <label for="numRuta"><?php _e("Numero Asignado para la ruta"); ?></label>
   </th>
   <td>
       <input type ="text" 
             name  ="numRuta" id="numRuta" 
             value ="<?php echo esc_attr( get_the_author_meta( 'numRuta', $user->ID ) ); ?>" 
             class ="regular-text" /><br />
       <span class="description"><?php _e("¿en que posición se va a visitar este cliente?."); ?></span>
   </td>
</tr>

<!--
  TRATAMIENTO DEL CONTACTO
-->   
<tr>
      <th>
        <label for="tratamientoContacto"><?php _e("Tratamiento del Contacto"); ?></label>
      </th>
      <td>
          <select name="tratamientoContacto" id="tratamientoContacto" 
                value="<?php echo esc_attr( get_the_author_meta( 'tratamientoContacto', $user->ID ) ); ?>" 
                class="regular-text" >
<?php
                $selectedValue = esc_attr( get_the_author_meta( 'tratamientoContacto', $user->ID ) );
                   if ($selectedValue == "sr_a")
                    echo '<option value="sr_a" selected>Sr/a</option>';
                   else
                    echo '<option value="sr_a">Sr/a</option>';

                   if ($selectedValue == "dr_a")
                    echo '<option value="dr_a" selected>Dr/a</option>';
                   else
                    echo '<option value="dr_a">Dr/a</option>';

                   if ($selectedValue == "compras")
                    echo '<option value="compras" selected>Compras</option>';
                   else
                    echo '<option value="compras">Compras</option>';
?>
          </select>
          <span class="description"><?php _e("Tratamiento del Contacto"); ?></span>
          <?php echo 'Client ID = [' . $user->ID . ']</br>'; ?>
          <?php echo 'Sector    = [' . esc_attr( get_the_author_meta( 'tratamientoContacto', $user->ID ) ) . ']</br>'; ?>
      </td>
</tr>

<!--
  NOMBRE DEL CONTACTO
-->
<tr>
   <th>
     <label for="nombreContacto"><?php _e("Nombre del Contacto"); ?></label>
   </th>
   <td>
       <input type ="text" 
             name  ="nombreContacto" id="nombreContacto" 
             value ="<?php echo esc_attr( get_the_author_meta( 'nombreContacto', $user->ID ) ); ?>" 
             class ="regular-text" /><br />
       <span class="description"><?php _e("Inserta el Nombre de la persona de contacto."); ?></span>
   </td>
</tr>

<!--
  ESPACIALIDAD DEL CONTACTO
-->   
<tr>
      <th>
        <label for="especialidadContacto"><?php _e("Especialidad del Contacto"); ?></label>
      </th>
      <td>
          <select name="especialidadContacto" id="especialidadContacto" 
                value="<?php echo esc_attr( get_the_author_meta( 'especialidadContacto', $user->ID ) ); ?>" 
                class="regular-text" >
<?php
                $selectedValue = esc_attr( get_the_author_meta( 'especialidadContacto', $user->ID ) );
                   if ($selectedValue == "odontologoGeneral")
                    echo '<option value="odontologoGeneral" selected>Odontólogo General</option>';
                   else
                    echo '<option value="odontologoGeneral">Odontólogo General</option>';

                   if ($selectedValue == "ortodoncista")
                    echo '<option value="ortodoncista" selected>Ortodoncista</option>';
                   else
                    echo '<option value="ortodoncista">Ortodoncista</option>';

                   if ($selectedValue == "endodoncista")
                    echo '<option value="endodoncista" selected>Endodoncista</option>';
                   else
                    echo '<option value="endodoncista">Endodoncista</option>';
                    
                    if ($selectedValue == "prostodoncista")
                     echo '<option value="prostodoncista" selected>Prostodoncista</option>';
                    else
                     echo '<option value="prostodoncista">Prostodoncista</option>';
                    
                    if ($selectedValue == "protesico")
                     echo '<option value="protesico" selected>Protésico</option>';
                    else
                     echo '<option value="protesico">Protésico</option>';
                     
                     if ($selectedValue == "podologo")
                      echo '<option value="podologo" selected>Podólogo</option>';
                     else
                      echo '<option value="podologo">Podólogo</option>';
                    
                    if ($selectedValue == "pedicura")
                     echo '<option value="pedicura" selected>Pedicura</option>';
                    else
                     echo '<option value="pedicura">Pedicura</option>';
                    
                    if ($selectedValue == "veterinario")
                     echo '<option value="veterinario" selected>Veterinario</option>';
                    else
                     echo '<option value="veterinario">Veterinario</option>';
                     
                     if ($selectedValue == "implantologo")
                      echo '<option value="implantologo" selected>Implantólogo</option>';
                     else
                      echo '<option value="implantologo">Implantólogo</option>';
                     
                     if ($selectedValue == "otro")
                      echo '<option value="otro" selected>Otro</option>';
                     else
                      echo '<option value="otro">Otro</option>';                  
?>
          </select>
          <span class="description"><?php _e("Especialidad del Contacto"); ?></span>
          <?php echo 'Client ID = [' . $user->ID . ']</br>'; ?>
          <?php echo 'Sector    = [' . esc_attr( get_the_author_meta( 'especialidadContacto', $user->ID ) ) . ']</br>'; ?>
      </td>
</tr>

<!--
  CONCERTAR CITA
-->   
<tr>
      <th>
        <label for="concertarCita"><?php _e("¿Necesario concertar cita?"); ?></label>
      </th>
      <td>
          <select name="concertarCita" id="concertarCita" 
                value="<?php echo esc_attr( get_the_author_meta( 'concertarCita', $user->ID ) ); ?>" 
                class="regular-text" >
<?php
                $selectedValue = esc_attr( get_the_author_meta( 'concertarCita', $user->ID ) );
                   if ($selectedValue == "si")
                    echo '<option value="si" selected>Si</option>';
                   else
                    echo '<option value="si">Si</option>';

                   if ($selectedValue == "no")
                    echo '<option value="no" selected>No</option>';
                   else
                    echo '<option value="no">No</option>';
                 
?>
          </select>
          <span class="description"><?php _e("¿Necesario concertar cita?"); ?></span>
          <?php echo 'Client ID = [' . $user->ID . ']</br>'; ?>
          <?php echo 'Sector    = [' . esc_attr( get_the_author_meta( 'concertarCita', $user->ID ) ) . ']</br>'; ?>
      </td>
</tr>

<!--
  HORARIO VISITA
-->   

<!--

                INSERTAR AQUI EL CODIGO DEL HORARIO DE VISITA

-->   

<!--
  TELEFONO FIJO 1
-->
<tr>
   <th>
     <label for="telFijo1"><?php _e("Teléfono Fijo Principal"); ?></label>
   </th>
   <td>
       <input type ="text" 
             name  ="telFijo1" id="telFijo1" 
             value ="<?php echo esc_attr( get_the_author_meta( 'telFijo1', $user->ID ) ); ?>" 
             class ="regular-text" /><br />
       <span class="description"><?php _e("Inserta el Teléfono principal."); ?></span>
   </td>
</tr>

<!--
  TELEFONO FIJO 2
-->
<tr>
   <th>
     <label for="telFijo2"><?php _e("Teléfono Fijo Secundario"); ?></label>
   </th>
   <td>
       <input type ="text" 
             name  ="telFijo2" id="telFijo2" 
             value ="<?php echo esc_attr( get_the_author_meta( 'telFijo2', $user->ID ) ); ?>" 
             class ="regular-text" /><br />
       <span class="description"><?php _e("Inserta el Teléfono secundario."); ?></span>
   </td>
</tr>

<!--
  TELEFONO MOVIL
-->
<tr>
   <th>
     <label for="telMovil"><?php _e("Teléfono Móvil"); ?></label>
   </th>
   <td>
       <input type ="text" 
             name  ="telMovil" id="telMovil" 
             value ="<?php echo esc_attr( get_the_author_meta( 'telMovil', $user->ID ) ); ?>" 
             class ="regular-text" /><br />
       <span class="description"><?php _e("Inserta el Teléfono móvil."); ?></span>
   </td>
</tr>

<!--
  EMAIL ADICIONAL
-->
<tr>
   <th>
     <label for="Email2"><?php _e("Segundo Email"); ?></label>
   </th>
   <td>
       <input type ="text" 
             name  ="Email2" id="Email2" 
             value ="<?php echo esc_attr( get_the_author_meta( 'Email2', $user->ID ) ); ?>" 
             class ="regular-text" /><br />
       <span class="description"><?php _e("Inserta otro Email."); ?></span>
   </td>
</tr>

<!--
  Nº Calle
-->
<tr>
   <th>
     <label for="numCalle"><?php _e("Nº"); ?></label>
   </th>
   <td>
       <input type ="text" 
             name  ="numCalle" id="numCalle" 
             value ="<?php echo esc_attr( get_the_author_meta( 'numCalle', $user->ID ) ); ?>" 
             class ="regular-text" /><br />
   </td>
</tr>

<!--
  Nº Piso
-->
<tr>
   <th>
     <label for="numPiso"><?php _e("Piso"); ?></label>
   </th>
   <td>
       <input type ="text" 
             name  ="numPiso" id="numPiso" 
             value ="<?php echo esc_attr( get_the_author_meta( 'numPiso', $user->ID ) ); ?>" 
             class ="regular-text" /><br />
   </td>
</tr>

<!--
  Nº Calle Envío
-->
<tr>
   <th>
     <label for="numCalleShipping"><?php _e("Nº"); ?></label>
   </th>
   <td>
       <input type ="text" 
             name  ="numCalleShipping" id="numCalleShipping" 
             value ="<?php echo esc_attr( get_the_author_meta( 'numCalleShipping', $user->ID ) ); ?>" 
             class ="regular-text" /><br />
   </td>
</tr>

<!--
  Nº Piso Envío
-->
<tr>
   <th>
     <label for="numPiso"><?php _e("Piso"); ?></label>
   </th>
   <td>
       <input type ="text" 
             name  ="numPiso" id="numPiso" 
             value ="<?php echo esc_attr( get_the_author_meta( 'numPiso', $user->ID ) ); ?>" 
             class ="regular-text" /><br />
   </td>
</tr>


<!--
  CIF COMPAÑIA
-->
<tr>
   <th>
     <label for="numCIF"><?php _e("CIF"); ?></label>
   </th>
   <td>
       <input type ="text" 
             name  ="numCIF" id="numCIF" 
             value ="<?php echo esc_attr( get_the_author_meta( 'numCIF', $user->ID ) ); ?>" 
             class ="regular-text" /><br />
       <span class="description"><?php _e("Inserta el CIF de la compañía."); ?></span>
   </td>
</tr>

<!--
  NUMERO DE CUENTA
-->
<tr>
   <th>
     <label for="bancoCliente"><?php _e("Número de Cuenta"); ?></label>
   </th>
       <td>
          <input type ="text" 
                name  ="bancoCliente" id="bancoCliente" 
                value ="<?php echo esc_attr( get_the_author_meta( 'bancoCliente', $user->ID ) ); ?>" 
                class ="regular-text" />
       </td>
</tr>
<tr>
    <th>
      <label for="agencia"><?php _e("Número de Agencia"); ?></label>
    </th>
       <td>
          <input type ="text" 
                name  ="agencia" id="agencia" 
                value ="<?php echo esc_attr( get_the_author_meta( 'agencia', $user->ID ) ); ?>" 
                class ="regular-text" />
       </td>
</tr>
<tr>
  <th>
    <label for="DC"><?php _e("Número DC"); ?></label>
  </th>
       <td>
           <input type ="text" 
                 name  ="DC" id="DC" 
                 value ="<?php echo esc_attr( get_the_author_meta( 'DC', $user->ID ) ); ?>" 
                 class ="regular-text" />
       </td>
</tr>
<tr>
  <th>
    <label for="cuentaCliente"><?php _e("Número Cuenta Cliente"); ?></label>
  </th>
    <td>
           <input type ="text" 
                 name  ="cuentaCliente" id="cuentaCliente" 
                 value ="<?php echo esc_attr( get_the_author_meta( 'cuentaCliente', $user->ID ) ); ?>" 
                 class ="regular-text" />
       </td>
 </tr>

<tr>
  <th>
    <label for="numeroIBAN"><?php _e("Número IBAN"); ?></label>
  </th>
    <td>
           <input type ="text" 
                 name  ="numeroIBAN" id="numeroIBAN" 
                 value ="<?php echo esc_attr( get_the_author_meta( 'numeroIBAN', $user->ID ) ); ?>" 
                 class ="regular-text" />
       </td>
 </tr>
 
 <!--
  OBSERVACIONES CLIENTE
 -->
 <tr>
    <th>
      <label for="observacionCliente"><?php _e("Observaciones"); ?></label>
    </th>
        <td>
            <textarea class="regular-text" name  ="observacionCliente" id="observacionCliente" type="text" rows="9" ><?php echo esc_attr( get_the_author_meta( 'observacionCliente', $user->ID ) ); ?></textarea> 
            
            <!--<input type ="text" 
                  name  ="observacionCliente" id="observacionCliente" 
                  value ="<?php echo esc_attr( get_the_author_meta( 'observacionCliente', $user->ID ) ); ?>" 
                  class ="regular-text" />-->
        </td>
 </tr>
 
 <!--
   PARENT ID
 -->
 <tr>
    <th>
      <label for="parent_id"><?php _e("PARENT ID"); ?></label>
    </th>
    <td>
        <input type ="text" 
              name  ="parent_id" id="parent_id" 
              value ="<?php echo esc_attr( get_the_author_meta( 'parent_id', $user->ID ) ); ?>" 
              class ="regular-text" /><br />
    </td>
 </tr>
 
   
</table>
<?php 
   }
   
  add_action( 'personal_options_update', 'save_extended_user_profil_fields' );
  add_action( 'edit_user_profile_update', 'save_extended_user_profil_fields' );
  
  include_once('saveExtendedUserProfile.php');


  // ----------------------------------------------------
  // This function is used to populate the drop-down
  // for the minutes and format the values to 2 digits.
  // ----------------------------------------------------
  function populateDropDown($timeList)
   {
    for ($i = 0; $i < count($timeList); $i++)
     {
      $tmValue   = sprintf("%02d", $timeList[$i]);
      $retValue .=  '<option value="' . $tmValue . '">' . $tmValue . '</option>';
     }
    return $retValue;
   }


?>
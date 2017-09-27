<?php 
//Función que guarda los cambios 
function save_extended_user_profil_fields( $user_id ) 
 {
  if ( !current_user_can( 'edit_user', $user_id ) ) 
   { 
    echo 'Current user is not editable = [' . $user_id . ']</br>';
    return false;
   }

  update_user_meta( $user_id, 'sectorCliente',            $_POST['sectorCliente'] );
  update_user_meta( $user_id, 'codClienteAuto',           $_POST['codClienteAuto'] );
  update_user_meta( $user_id, 'codClientePapel',          $_POST['codClientePapel'] );
  update_user_meta( $user_id, 'sobreNombre',              $_POST['sobreNombre'] );
  update_user_meta( $user_id, 'rankinCliente',            $_POST['rankinCliente'] );
  update_user_meta( $user_id, 'numRuta',                  $_POST['numRuta'] );
  update_user_meta( $user_id, 'tratamientoContacto',      $_POST['tratamientoContacto'] );
  update_user_meta( $user_id, 'comercialAsignado',        $_POST['comercialAsignado'] );
  update_user_meta( $user_id, 'nombreContacto',           $_POST['nombreContacto'] );
  update_user_meta( $user_id, 'especialidadContacto',     $_POST['especialidadContacto'] );
  update_user_meta( $user_id, 'concertarCita',            $_POST['concertarCita'] );
  update_user_meta( $user_id, 'telFijo1',                 $_POST['telFijo1'] );
  update_user_meta( $user_id, 'telFijo2',                 $_POST['telFijo2'] );
  update_user_meta( $user_id, 'telMovil',                 $_POST['telMovil'] );
  update_user_meta( $user_id, 'Email2',                   $_POST['Email2'] );
  update_user_meta( $user_id, 'numCIF',                   $_POST['numCIF'] );
  update_user_meta( $user_id, 'bancoCliente',             $_POST['bancoCliente'] );
  update_user_meta( $user_id, 'agencia',                  $_POST['agencia'] );
  update_user_meta( $user_id, 'DC',                       $_POST['DC'] );
  update_user_meta( $user_id, 'cuentaCliente',            $_POST['cuentaCliente'] );
  update_user_meta( $user_id, 'numeroIBAN',               $_POST['numeroIBAN'] );
  update_user_meta( $user_id, 'observacionCliente',       $_POST['observacionCliente'] );
  update_user_meta( $user_id, 'numCalle',                 $_POST['numCalle'] );
  update_user_meta( $user_id, 'numPiso',                  $_POST['numPiso'] );
  update_user_meta( $user_id, 'numCalleShipping',         $_POST['numCalleShipping'] );
  update_user_meta( $user_id, 'numPisoShipping',          $_POST['numPisoShipping'] );
  update_user_meta( $user_id, 'parent_id',                $_POST['parent_id'] );
  update_user_meta( $user_id, 'visitCustomer',            $_POST['visitCustomer'] );
  update_user_meta( $user_id, 'routeNumber',              $_POST['routeNumber'] );  
  update_user_meta( $user_id, 'routeOrder',               $_POST['routeOrder'] );
  
  /////////////////////////
  // Dias Horario Comercial
  /////////////////////////
  update_user_meta( $user_id, 'HClunes',                  $_POST['HClunes'] );
  update_user_meta( $user_id, 'HCmartes',                 $_POST['HCmartes'] );
  update_user_meta( $user_id, 'HCmiercoles',              $_POST['HCmiercoles'] );
  update_user_meta( $user_id, 'HCjueves',                 $_POST['HCjueves'] );
  update_user_meta( $user_id, 'HCviernes',                $_POST['HCviernes'] );
  update_user_meta( $user_id, 'HCsabado',                 $_POST['HCsabado'] );

  /////////////////////////
  // Horas Lunes Horario Comercial
  /////////////////////////
  update_user_meta( $user_id, 'HClunesHoraAMdesde',       $_POST['HClunesHoraAMdesde'] );
  update_user_meta( $user_id, 'HClunesMinAMdesde',        $_POST['HClunesMinAMdesde'] );
  update_user_meta( $user_id, 'HClunesHoraAMhasta',       $_POST['HClunesHoraAMhasta'] );
  update_user_meta( $user_id, 'HClunesMinAMhasta',        $_POST['HClunesMinAMhasta'] );
  /////////   TARDE   /////////////
  update_user_meta( $user_id, 'HClunesHoraPMdesde',       $_POST['HClunesHoraPMdesde'] );
  update_user_meta( $user_id, 'HClunesMinPMdesde',        $_POST['HClunesMinPMdesde'] );
  update_user_meta( $user_id, 'HClunesHoraPMhasta',       $_POST['HClunesHoraPMhasta'] );
  update_user_meta( $user_id, 'HClunesMinPMhasta',        $_POST['HClunesMinPMhasta'] );
  
  /////////////////////////
  // Horas martes Horario Comercial
  /////////////////////////
  update_user_meta( $user_id, 'HCmartesHoraAMdesde',      $_POST['HCmartesHoraAMdesde'] );
  update_user_meta( $user_id, 'HCmartesMinAMdesde',       $_POST['HCmartesMinAMdesde'] );
  update_user_meta( $user_id, 'HCmartesHoraAMhasta',      $_POST['HCmartesHoraAMhasta'] );
  update_user_meta( $user_id, 'HCmartesMinAMhasta',       $_POST['HCmartesMinAMhasta'] );
  /////////   TARDE   /////////////
  update_user_meta( $user_id, 'HCmartesHoraPMdesde',      $_POST['HCmartesHoraPMdesde'] );
  update_user_meta( $user_id, 'HCmartesMinPMdesde',       $_POST['HCmartesMinPMdesde'] );
  update_user_meta( $user_id, 'HCmartesHoraPMhasta',      $_POST['HCmartesHoraPMhasta'] );
  update_user_meta( $user_id, 'HCmartesMinPMhasta',       $_POST['HCmartesMinPMhasta'] );
  
  /////////////////////////
  // Horas miercoles Horario Comercial
  /////////////////////////
  update_user_meta( $user_id, 'HCmiercolesHoraAMdesde',   $_POST['HCmiercolesHoraAMdesde'] );
  update_user_meta( $user_id, 'HCmiercolesMinAMdesde',    $_POST['HCmiercolesMinAMdesde'] );
  update_user_meta( $user_id, 'HCmiercolesHoraAMhasta',   $_POST['HCmiercolesHoraAMhasta'] );
  update_user_meta( $user_id, 'HCmiercolesMinAMhasta',    $_POST['HCmiercolesMinAMhasta'] );
  /////////   TARDE   /////////////
  update_user_meta( $user_id, 'HCmiercolesHoraPMdesde',   $_POST['HCmiercolesHoraPMdesde'] );
  update_user_meta( $user_id, 'HCmiercolesMinPMdesde',    $_POST['HCmiercolesMinPMdesde'] );
  update_user_meta( $user_id, 'HCmiercolesHoraPMhasta',   $_POST['HCmiercolesHoraPMhasta'] );
  update_user_meta( $user_id, 'HCmiercolesMinPMhasta',    $_POST['HCmiercolesMinPMhasta'] );
  
  /////////////////////////
  // Horas jueves Horario Comercial
  /////////////////////////
  update_user_meta( $user_id, 'HCjuevesHoraAMdesde',      $_POST['HCjuevesHoraAMdesde'] );
  update_user_meta( $user_id, 'HCjuevesMinAMdesde',       $_POST['HCjuevesMinAMdesde'] );
  update_user_meta( $user_id, 'HCjuevesHoraAMhasta',      $_POST['HCjuevesHoraAMhasta'] );
  update_user_meta( $user_id, 'HCjuevesMinAMhasta',       $_POST['HCjuevesMinAMhasta'] );
  /////////   TARDE   /////////////
  update_user_meta( $user_id, 'HCjuevesHoraPMdesde',      $_POST['HCjuevesHoraPMdesde'] );
  update_user_meta( $user_id, 'HCjuevesMinPMdesde',       $_POST['HCjuevesMinPMdesde'] );
  update_user_meta( $user_id, 'HCjuevesHoraPMhasta',      $_POST['HCjuevesHoraPMhasta'] );
  update_user_meta( $user_id, 'HCjuevesMinPMhasta',       $_POST['HCjuevesMinPMhasta'] );
  
  /////////////////////////
  // Horas viernes Horario Comercial
  /////////////////////////
  update_user_meta( $user_id, 'HCviernesHoraAMdesde',     $_POST['HCviernesHoraAMdesde'] );
  update_user_meta( $user_id, 'HCviernesMinAMdesde',      $_POST['HCviernesMinAMdesde'] );
  update_user_meta( $user_id, 'HCviernesHoraAMhasta',     $_POST['HCviernesHoraAMhasta'] );
  update_user_meta( $user_id, 'HCviernesMinAMhasta',      $_POST['HCviernesMinAMhasta'] );
  /////////   TARDE   /////////////
  update_user_meta( $user_id, 'HCviernesHoraPMdesde',     $_POST['HCviernesHoraPMdesde'] );
  update_user_meta( $user_id, 'HCviernesMinPMdesde',      $_POST['HCviernesMinPMdesde'] );
  update_user_meta( $user_id, 'HCviernesHoraPMhasta',     $_POST['HCviernesHoraPMhasta'] );
  update_user_meta( $user_id, 'HCviernesMinPMhasta',      $_POST['HCviernesMinPMhasta'] );
  
  /////////////////////////
  // Horas sabado Horario Comercial
  /////////////////////////
  update_user_meta( $user_id, 'HCsabadoHoraAMdesde',      $_POST['HCsabadoHoraAMdesde'] );
  update_user_meta( $user_id, 'HCsabadoMinAMdesde',       $_POST['HCsabadoMinAMdesde'] );
  update_user_meta( $user_id, 'HCsabadoHoraAMhasta',      $_POST['HCsabadoHoraAMhasta'] );
  update_user_meta( $user_id, 'HCsabadoMinAMhasta',       $_POST['HCsabadoMinAMhasta'] );
  /////////   TARDE   /////////////
  update_user_meta( $user_id, 'HCsabadoHoraPMdesde',      $_POST['HCsabadoHoraPMdesde'] );
  update_user_meta( $user_id, 'HCsabadoMinPMdesde',       $_POST['HCsabadoMinPMdesde'] );
  update_user_meta( $user_id, 'HCsabadoHoraPMhasta',      $_POST['HCsabadoHoraPMhasta'] );
  update_user_meta( $user_id, 'HCsabadoMinPMhasta',       $_POST['HCsabadoMinPMhasta'] );

    
  /////////////////////////
  // Dias Horario Visita
  /////////////////////////
  update_user_meta( $user_id, 'HVlunes',                  $_POST['HVlunes'] );
  update_user_meta( $user_id, 'HVmartes',                 $_POST['HVmartes'] );
  update_user_meta( $user_id, 'HVmiercoles',              $_POST['HVmiercoles'] );
  update_user_meta( $user_id, 'HVjueves',                 $_POST['HVjueves'] );
  update_user_meta( $user_id, 'HVviernes',                $_POST['HVviernes'] );
  update_user_meta( $user_id, 'HVsabado',                 $_POST['HVsabado'] );
    
  /////////////////////////
  // Horas Lunes Horario Visita
  /////////////////////////
  update_user_meta( $user_id, 'HVlunesHoraAMdesde',       $_POST['HVlunesHoraAMdesde'] );
  update_user_meta( $user_id, 'HVlunesMinAMdesde',        $_POST['HVlunesMinAMdesde'] );
  update_user_meta( $user_id, 'HVlunesHoraAMhasta',       $_POST['HVlunesHoraAMhasta'] );
  update_user_meta( $user_id, 'HVlunesMinAMhasta',        $_POST['HVlunesMinAMhasta'] );
  /////////   TARDE   /////////////
  update_user_meta( $user_id, 'HVlunesHoraPMdesde',       $_POST['HVlunesHoraPMdesde'] );
  update_user_meta( $user_id, 'HVlunesMinPMdesde',        $_POST['HVlunesMinPMdesde'] );
  update_user_meta( $user_id, 'HVlunesHoraPMhasta',       $_POST['HVlunesHoraPMhasta'] );
  update_user_meta( $user_id, 'HVlunesMinPMhasta',        $_POST['HVlunesMinPMhasta'] );

  /////////////////////////
  // Horas martes Horario Visita
  /////////////////////////
  update_user_meta( $user_id, 'HVmartesHoraAMdesde',      $_POST['HVmartesHoraAMdesde'] );
  update_user_meta( $user_id, 'HVmartesMinAMdesde',       $_POST['HVmartesMinAMdesde'] );
  update_user_meta( $user_id, 'HVmartesHoraAMhasta',      $_POST['HVmartesHoraAMhasta'] );
  update_user_meta( $user_id, 'HVmartesMinAMhasta',       $_POST['HVmartesMinAMhasta'] );
  /////////   TARDE   /////////////
  update_user_meta( $user_id, 'HVmartesHoraPMdesde',      $_POST['HVmartesHoraPMdesde'] );
  update_user_meta( $user_id, 'HVmartesMinPMdesde',       $_POST['HVmartesMinPMdesde'] );
  update_user_meta( $user_id, 'HVmartesHoraPMhasta',      $_POST['HVmartesHoraPMhasta'] );
  update_user_meta( $user_id, 'HVmartesMinPMhasta',       $_POST['HVmartesMinPMhasta'] );
    
  /////////////////////////
  // Horas miercoles Horario Visita
  /////////////////////////
  update_user_meta( $user_id, 'HVmiercolesHoraAMdesde',   $_POST['HVmiercolesHoraAMdesde'] );
  update_user_meta( $user_id, 'HVmiercolesMinAMdesde',    $_POST['HVmiercolesMinAMdesde'] );
  update_user_meta( $user_id, 'HVmiercolesHoraAMhasta',   $_POST['HVmiercolesHoraAMhasta'] );
  update_user_meta( $user_id, 'HVmiercolesMinAMhasta',    $_POST['HVmiercolesMinAMhasta'] );
  /////////   TARDE   /////////////
  update_user_meta( $user_id, 'HVmiercolesHoraPMdesde',   $_POST['HVmiercolesHoraPMdesde'] );
  update_user_meta( $user_id, 'HVmiercolesMinPMdesde',    $_POST['HVmiercolesMinPMdesde'] );
  update_user_meta( $user_id, 'HVmiercolesHoraPMhasta',   $_POST['HVmiercolesHoraPMhasta'] );
  update_user_meta( $user_id, 'HVmiercolesMinPMhasta',    $_POST['HVmiercolesMinPMhasta'] );
    
  /////////////////////////
  // Horas jueves Horario Visita
  /////////////////////////
  update_user_meta( $user_id, 'HVjuevesHoraAMdesde',      $_POST['HVjuevesHoraAMdesde'] );
  update_user_meta( $user_id, 'HVjuevesMinAMdesde',       $_POST['HVjuevesMinAMdesde'] );
  update_user_meta( $user_id, 'HVjuevesHoraAMhasta',      $_POST['HVjuevesHoraAMhasta'] );
  update_user_meta( $user_id, 'HVjuevesMinAMhasta',       $_POST['HVjuevesMinAMhasta'] );
  /////////   TARDE   /////////////
  update_user_meta( $user_id, 'HVjuevesHoraPMdesde',      $_POST['HVjuevesHoraPMdesde'] );
  update_user_meta( $user_id, 'HVjuevesMinPMdesde',       $_POST['HVjuevesMinPMdesde'] );
  update_user_meta( $user_id, 'HVjuevesHoraPMhasta',      $_POST['HVjuevesHoraPMhasta'] );
  update_user_meta( $user_id, 'HVjuevesMinPMhasta',       $_POST['HVjuevesMinPMhasta'] );
    
  /////////////////////////
  // Horas viernes Horario Visita
  /////////////////////////
  update_user_meta( $user_id, 'HVviernesHoraAMdesde',     $_POST['HVviernesHoraAMdesde'] );
  update_user_meta( $user_id, 'HVviernesMinAMdesde',      $_POST['HVviernesMinAMdesde'] );
  update_user_meta( $user_id, 'HVviernesHoraAMhasta',     $_POST['HVviernesHoraAMhasta'] );
  update_user_meta( $user_id, 'HVviernesMinAMhasta',      $_POST['HVviernesMinAMhasta'] );
  /////////   TARDE   /////////////
  update_user_meta( $user_id, 'HVviernesHoraPMdesde',     $_POST['HVviernesHoraPMdesde'] );
  update_user_meta( $user_id, 'HVviernesMinPMdesde',      $_POST['HVviernesMinPMdesde'] );
  update_user_meta( $user_id, 'HVviernesHoraPMhasta',     $_POST['HVviernesHoraPMhasta'] );
  update_user_meta( $user_id, 'HVviernesMinPMhasta',      $_POST['HVviernesMinPMhasta'] );
    
  /////////////////////////
  // Horas sabado Horario Visita
  /////////////////////////
  update_user_meta( $user_id, 'HVsabadoHoraAMdesde',      $_POST['HVsabadoHoraAMdesde'] );
  update_user_meta( $user_id, 'HVsabadoMinAMdesde',       $_POST['HVsabadoMinAMdesde'] );
  update_user_meta( $user_id, 'HVsabadoHoraAMhasta',      $_POST['HVsabadoHoraAMhasta'] );
  update_user_meta( $user_id, 'HVsabadoMinAMhasta',       $_POST['HVsabadoMinAMhasta'] );
  /////////   TARDE   /////////////
  update_user_meta( $user_id, 'HVsabadoHoraPMdesde',      $_POST['HVsabadoHoraPMdesde'] );
  update_user_meta( $user_id, 'HVsabadoMinPMdesde',       $_POST['HVsabadoMinPMdesde'] );
  update_user_meta( $user_id, 'HVsabadoHoraPMhasta',      $_POST['HVsabadoHoraPMhasta'] );
  update_user_meta( $user_id, 'HVsabadoMinPMhasta',       $_POST['HVsabadoMinPMhasta'] );
  
 }
?>
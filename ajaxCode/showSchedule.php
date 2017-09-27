<?php
  // --------------------------------------------------------
  // showSchedule.php
  // 
  // ------------ ------------------ -----------------------------------------------------------------------
  // Updated By      Updated Date                                  Description
  // ------------ ------------------ -----------------------------------------------------------------------
  // Lalo         March 18, 2017     This is used by "fichaClient" when the user clicks on the "Horarios"
  //                                 button.
  // ------------ ------------------ -----------------------------------------------------------------------
  // 
  // -------------------------------------------------------------------------------------------------------
  //     global $wpdb;
  // -------------------------------------------------------------------------------------------------------
  //  Horario Comercial
  //  
  //    Dia          Mañanas       Tardes
  //  --------- -------------- -------------
  //  Lunes     09:00 / 14:00  06:00 / 19:00
  //  Martes    09:00 / 14:00    Cerrado
  //  Miercoles   Cerrado      06:00 / 19:00
  //  Viernes   09:00 / 14:00  06:00 / 19:00
  //  
  //  
  //  Horario Visita
  //  
  //    Dia          Mañanas       Tardes
  //  --------- -------------- -------------
  //  Lunes           NA             NA
  //  Martes    09:00 / 14:00     Cerrado
  //  Viernes   09:00 / 14:00  06:00 / 19:00
  //
  //  SELECT * FROM wp_usermeta WHERE user_id=1 AND meta_key LIKE '%HC%' AND meta_value IS NOT null ORDER BY umeta_id
  // -------------------------------------------------------------------------------------------------------
  $q = $_GET['q'];

  $dbConfig = parse_ini_file("dbConfigFile.ini");
  $con      = mysqli_connect($dbConfig['dbHost'], $dbConfig['dbUsrID'], $dbConfig['dbPsWrd'], $dbConfig['dbName']);
  if (!$con) 
   {
    die('Could not connect: ' . mysqli_error($con));
   }

  // --------------------------------------------------------------
  // This code is left here for future reference, I need to get the
  // global working to avoid opening a connection for every Ajax
  // call...Ineficient.
  // --------------------------------------------------------------
  //    $sQuery      = "SELECT * FROM ". $q ;
  //    $clientList  = $wpdb->get_results($sQuery, ARRAY_A);
  //    $subGenre    = $con->query($sQuery);
  // --------------------------------------------------------------

  $monday     = '';
  $tuesday    = '';
  $wednesday  = '';
  $thursday   = '';
  $friday     = '';
  $saturday   = '';

  $showCust   = false;

  if ($q == '')
    $sQuery     = "SELECT meta_key, meta_value FROM wp_usermeta WHERE user_id=" . $q . " AND meta_key LIKE '%HC%' AND meta_value IS NOT null ORDER BY umeta_id";

  $horario    = $con->query($sQuery);
  $num_rows   = mysqli_num_rows($horario);

  if ($num_rows > 0)
   {
    echo '<tr>';
    echo '<th class="dia">Codigo</th>';
    echo '<th class="mananas">Mañanas</th>';
    echo '<th class="tardes">Tardes</th>';
    echo '</tr>';

    while($clntSchedule = mysqli_fetch_array($horario))
     {
      echo '<tr>';

if ($pos = strpos($mystring, $findme))

      if (strpos($clntSchedule['meta_key'], '') == 'codClienteAuto')
       {
        $clientCode = $clntSchedule['meta_value'];
       }
      else if ($clientList['meta_key'] == 'first_name')
       {
        $clientName = $clientList['meta_value'];
       }
      else if ($clientList['meta_key'] == 'telFijo1')
       {
        $billPhone = $clientList['meta_value'];
       }
      else if ($clientList['meta_key'] == 'billing_city')
       {
        $billCity = $clientList['meta_value'];
       }
      else if ($clientList['meta_key'] == 'rankinCliente')
       {
        $clientRank = $clientList['meta_value'];
       }
      else if ($clientList['meta_key'] == 'wp_capabilities')
       {
        $pos = strpos($clientList['meta_value'], 'customer');
        if ($pos == true)
         $showCust = true;
       }

      if ($showCust == true)
       {
        echo '<td>' . $clientCode  . '</td>';
        echo '<td>' . $clientName  . '</td>';
        echo '<td>' . $billPhone   . '</td>';
        echo '</tr>';
        $showCust = false;
       }

      $clientCode = '';
      $clientName = '';
      $billPhone  = '';
      $billCity   = '';
      $clientRank = '';
     }
   }
  else
   {
    echo '<tr>';
    echo '<td>No Clients Found with a [' . $q . ']</td>';
    echo '</tr>';
   }

  mysqli_close($con);
?>


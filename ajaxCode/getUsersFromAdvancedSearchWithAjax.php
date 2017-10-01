<?php
// --------------------------------------------------------
// getUserWithAjax.php
//
// ------------ ------------------ -----------------------------------------------------------------------
// Updated By      Updated Date                                  Description
// ------------ ------------------ -----------------------------------------------------------------------
// Lalo         March 8, 2017      The intent is to eventually make one PHP file to handle all Ajax calls
//                                 but, for now, we will break them and use tem as such.
// ------------ ------------------ -----------------------------------------------------------------------
//
// -------------------------------------------------------------------------------------------------------
//     global $wpdb;
// -------------------------------------------------------------------------------------------------------
$q = $_GET['q'];

$currUsr = $_GET['currUser'];
$siteUrl = $_GET['siteUrl'] . '/';
$companyName = $_GET['companyName'];
$sectorCliente = $_GET['sectorCliente'];
$rankinCliente = $_GET['rankinCliente'];
$dayOfVisit = $_GET['dayOfVisit'];
$concertarCita = $_GET['concertarCita'];
$calleCliente = $_GET['calleCliente'];
$codPostal = $_GET['codPostal'];
$clienteCiudad = $_GET['clienteCiudad'];
$clientePoblacion = $_GET['clientePoblacion'];
$clienteVisitable = $_GET['clienteVisitable'];

$numeroDeRuta = $_GET['numeroDeRuta'];
$seHanVisitado = $_GET['seHanVisitado'];
$visitFrom = $_GET['visitFrom'];
$visitTo = $_GET['visitTo'];

$array = array($q, $currUsr, $siteUrl, $companyName, $sectorCliente, $rankinCliente, $dayOfVisit,
    $concertarCita, $calleCliente, $codPostal, $clienteCiudad, $clientePoblacion, $clienteVisitable,
    $seHanVisitado, $visitFrom, $visitTo, $numeroDeRuta);

$dbConfig = parse_ini_file("dbConfigFile.ini");
$con = mysqli_connect($dbConfig['dbHost'], $dbConfig['dbUsrID'], $dbConfig['dbPsWrd'], $dbConfig['dbName']);
if (!$con) {
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

$clientCode = '';
$clientName = '';
$billPhone = '';
$billCity = '';
$clientRank = '';
$showCust = false;

$clientList = '';
$userIdList = '';

$sQuery = "SELECT DISTINCT(user_id) FROM wp_usermeta WHERE ";
$addOr = false;
if ($companyName != '') {
    $sQuery .= " meta_value LIKE '%" . $companyName . "%'";
    $addOr = true;
}

if ($sectorCliente != '' && $sectorCliente != 'Sector del Cliente') {
    if ($addOr)
        $sQuery .= ' OR ';
    else
        $addOr = true;

    $sQuery .= " meta_value LIKE '%" . $sectorCliente . "%'";
}

if ($rankinCliente != '' && $rankinCliente != 'Ranking del Cliente') {
    if ($addOr)
        $sQuery .= ' OR ';
    else
        $addOr = true;

    $sQuery .= " meta_value LIKE '%" . $rankinCliente . "%'";
}

if ($dayOfVisit != '' && $dayOfVisit != 'Día de Visita') {
    if ($addOr)
        $sQuery .= ' OR ';
    else
        $addOr = true;

    if ($dayOfVisit == 'Lunes') {
        $sQuery .= " (meta_key = 'HVlunes' AND meta_value = 'on') ";
    } else if ($dayOfVisit == 'Martes') {
        $sQuery .= " (meta_key = 'HVmartes' AND meta_value = 'on') ";
    } else if ($dayOfVisit == 'Miercoles') {
        $sQuery .= " (meta_key = 'HVmiercoles' AND meta_value = 'on') ";
    } else if ($dayOfVisit == 'Jueves') {
        $sQuery .= " (meta_key = 'HVjueves' AND meta_value = 'on') ";
    } else if ($dayOfVisit == 'Viernes') {
        $sQuery .= " (meta_key = 'HVviernes' AND meta_value = 'on') ";
    } else if ($dayOfVisit == 'Sabado') {
        $sQuery .= " (meta_key = 'HVsabado' AND meta_value = 'on') ";
    }
}

if ($concertarCita != '' && $concertarCita != 'undefined') {
    if ($addOr)
        $sQuery .= ' OR ';
    else
        $addOr = true;

    $sQuery .= " (meta_key = 'concertarCita' AND meta_value LIKE '%" . $concertarCita . "%')";
}

if ($clienteVisitable != '' && $clienteVisitable != 'undefined') {
    if ($addOr)
        $sQuery .= ' OR ';
    else
        $addOr = true;

    $sQuery .= " (meta_key = 'visitCustomer' AND meta_value LIKE '%" . $clienteVisitable . "%')";
}

if ($calleCliente != '') {
    if ($addOr)
        $sQuery .= ' OR ';
    else
        $addOr = true;

    $sQuery .= " meta_value LIKE '%" . $calleCliente . "%'";
}

if ($codPostal != '') {
    if ($addOr)
        $sQuery .= ' OR ';
    else
        $addOr = true;

    $sQuery .= " meta_value LIKE '%" . $codPostal . "%'";
}

if ($clienteCiudad != '') {
    if ($addOr)
        $sQuery .= ' OR ';
    else
        $addOr = true;

    $sQuery .= " meta_value LIKE '%" . $clienteCiudad . "%'";
}

if ($clientePoblacion != '') {
    if ($addOr)
        $sQuery .= ' OR ';
    else
        $addOr = true;

    $sQuery .= " meta_value LIKE '%" . $clientePoblacion . "%'";
}

if ($numeroDeRuta != '') {
    if ($addOr)
        $sQuery .= ' OR ';
    else
        $addOr = true;

    $sQuery .= " meta_value LIKE '%" . $numeroDeRuta . "%'";
}

$sQuery .= " ORDER BY user_id ASC";
//print_r($sQuery);
//if ($q == '')
//    $sQuery = "SELECT user_id FROM wp_usermeta WHERE meta_key = 'nickname' ORDER BY user_id ASC";
//else
//    $sQuery = "SELECT user_id FROM wp_usermeta WHERE meta_key = 'nickname' AND meta_value LIKE '%" . $q . "%' ORDER BY user_id ASC";

$userIdList = $con->query($sQuery);
$num_rows = mysqli_num_rows($userIdList);

if ($num_rows > 0) {
    echo '<tr>';
    echo '<th class="codigo">Código</th>';
    echo '<th class="cliente">Cliente</th>';
    echo '<th class="telf">Teléfono</th>';
    echo '<th class="lugar">Lugar</th>';
    echo '<th class="rank">Ranking</th>';
    echo '</tr>';

    while ($row = mysqli_fetch_array($userIdList)) {
        $sQuery = "SELECT meta_key, meta_value FROM wp_usermeta WHERE user_id = " . $row['user_id'] . " AND meta_key IN ('codClienteAuto', 'first_name', 'telFijo1', 'billing_city', 'rankinCliente', 'wp_capabilities')";

        $clList = $con->query($sQuery);
        echo '<tr>';

        while ($clientList = mysqli_fetch_array($clList)) {
            if ($clientList['meta_key'] == 'codClienteAuto') {
//          $clientCode = '<a id="' . $clientList['meta_value'] . '" name="' . $clientList['meta_value'] . '" onclick="getClientId(this.id, ' . $currUsr . ');" href="http://systemtest.mumaweb.com/escritorio/ficha-cliente" >' . $clientList['meta_value'] . '</a>';
                $clientCode = '<a id="' . $clientList['meta_value'] . '" name="' . $clientList['meta_value'] . '" onclick="getClientId(this.id, ' . $currUsr . ');" href="' . $siteUrl . 'escritorio/ficha-cliente" >' . $clientList['meta_value'] . '</a>';
                //  $_SESSION[$clientList['meta_value']] = $row['user_id'];
                //  $clientCode = $clientList['meta_value'];
            } else if ($clientList['meta_key'] == 'first_name') {
                $clientName = $clientList['meta_value'];
            } else if ($clientList['meta_key'] == 'telFijo1') {
                $billPhone = $clientList['meta_value'];
            } else if ($clientList['meta_key'] == 'billing_city') {
                $billCity = $clientList['meta_value'];
            } else if ($clientList['meta_key'] == 'rankinCliente') {
                $clientRank = $clientList['meta_value'];
            } else if ($clientList['meta_key'] == 'wp_capabilities') {
                $pos = strpos($clientList['meta_value'], 'customer');
                if ($pos == true)
                    $showCust = true;
            }
        }

        if ($showCust == true) {
            echo '<td>' . $clientCode . '</td>';
            echo '<td>' . $clientName . '</td>';
            echo '<td>' . $billPhone . '</td>';
            echo '<td>' . $billCity . '</td>';
            echo '<td>' . $clientRank . '</td>';
            echo '</tr>';
            $showCust = false;
        }

        $clientCode = '';
        $clientName = '';
        $billPhone = '';
        $billCity = '';
        $clientRank = '';
    }
} else {
    echo '<tr>';
    echo '<td>No Clients Found with [' . $q . '] search string.</td>';
    echo '</tr>';
}

mysqli_close($con);

//var_dump($_SESSION);
//echo 'My Session ID = ' . session_id() . '</br>';
?>


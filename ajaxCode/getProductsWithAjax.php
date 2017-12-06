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

$productCode = '';
$productPrice = '';
$productTitle = '';
$productList = '';
$productIdList = '';

if ($q == '') {
    $sQuery = "SELECT DISTINCT(postmeta.post_id)
                FROM wp_posts posts, wp_postmeta postmeta 
                WHERE posts.post_type = 'product' 
                AND posts.post_status = 'publish'
                AND posts.id = postmeta.post_id";
} else {
    $sQuery = "SELECT DISTINCT(postmeta.post_id) 
                FROM wp_posts posts, wp_postmeta postmeta 
                WHERE posts.post_type = 'product' 
                AND posts.post_status = 'publish' 
                AND posts.id = postmeta.post_id 
                AND posts.post_title LIKE '%" . $q . "%'";
}
$productIdList = $con->query($sQuery);
$num_rows = mysqli_num_rows($productIdList);

if ($num_rows > 0) {
    echo '<tr>';
    echo '<th class="ID">ID</th>';
    echo '<th class="codigo">Código</th>';
    echo '<th class="cliente">Nombre</th>';
    echo '<th class="telf">Precio</th>';
    echo '<th class="lugar">Agregar</th>';
    echo '</tr>';

    while ($row = mysqli_fetch_array($productIdList)) {
        $sQuery = "SELECT postmeta.meta_key, postmeta.meta_value, posts.post_title
                FROM wp_posts posts, wp_postmeta postmeta
                WHERE posts.post_type = 'product'
                AND posts.post_status = 'publish'
                AND posts.id = postmeta.post_id
                AND postmeta.post_id = " . $row['post_id'] . "
                ORDER BY posts.post_title ASC";

        $clList = $con->query($sQuery);
        echo '<tr>';

        while ($productList = mysqli_fetch_array($clList))
          {
            $productTitle = $productList['post_title'];
            
            if ($productList['meta_key'] == '_sku')
             {
                $productCode = $productList['meta_value'];
             }
            else if ($productList['meta_key'] == '_regular_price')
             {
                $productPrice = $productList['meta_value'];
             }
          }
        echo '<td>' .  $row['post_id'] . '</td>';
        echo '<td>' . $productCode . '</td>';
        echo '<td>' . $productTitle . '</td>';
        echo '<td>' . $productPrice . '</td>';
        echo '<td><a class="button" href="' . $siteUrl . 'escritorio/nuevo-pedido?add-to-cart=' . $row['post_id'] . '">Agregar al Carrito</a></td>';
        echo '</tr>';

        $productCode = '';
        $productTitle = '';
        $productPrice = '';
    }
}


mysqli_close($con);

?>


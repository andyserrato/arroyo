<?php
  // -------------------------------------------------------------------
  // dbUtil.php
  // -------------------------------------------------------------------

  // -------------------------------------------------------------------
  // Open the DB
  // -------------------------------------------------------------------
  function openDb()
   {
    $dbConfig = parse_ini_file("dbConfigFile.ini");
    
    $con      = mysqli_connect($dbConfig['dbHost'], $dbConfig['dbUsrID'], $dbConfig['dbPsWrd'], $dbConfig['dbName']);
    if (!$con) 
     {
      die('Could not connect: ' . mysqli_error($con));
     }
    else
     return $con;
   }

  // -------------------------------------------------------------------
  // Close the DB
  // -------------------------------------------------------------------
  function closeDB($con)
   {
    mysqli_close($con);
   }

?>

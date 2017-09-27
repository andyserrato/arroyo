<?php
  // --------------------------------------------------------
  // returnUserID.php
  // 
  // ------------ ------------------ -----------------------------------------------------------------------
  // Updated By      Updated Date                                  Description
  // ------------ ------------------ -----------------------------------------------------------------------
  // Lalo         March 27, 2017     Simple...just get from the array that was populated earlier, when the
  //                                 search was done, the correct user_id and send it back.
  // ------------ ------------------ -----------------------------------------------------------------------
  // 
  // -------------------------------------------------------------------------------------------------------
  //     global $wpdb;
  // -------------------------------------------------------------------------------------------------------
  // current_user_id   int
  // session_key       varchar(20)
  // session_value     varchar(100)
  // entry_date_time   timestamp
  // -------------------------------------------------------------------------------------------------------
  include '../include/dbUtil.php';

  $q          = $_GET['q'];
  $currUserId = $_GET['currUser'];

//  echo 'q          = ' . $q . '</br>';
//  echo 'currUserId = ' . $currUserId . '</br>';

  $con    = openDb();
  if (!$con) 
   {
    die('Could not connect: ' . mysqli_error($con));
   }

  $sQuery = "SELECT * FROM dt_temp_session WHERE current_user_id = " . $currUserId . " AND session_key = 'currUser'";
  $sessionVal = $con->query($sQuery);
  $num_rows   = mysqli_num_rows($sessionVal);
//  echo '$num_rows = ' . $num_rows . '</br>';
  if ($num_rows > 0)
   {
    $sQuery = "UPDATE dt_temp_session SET session_value = '" . $q . "', entry_date_time = now() WHERE current_user_id = " . $currUserId . " AND session_key = 'currUser'";
   }
  else
   {
    $sQuery  = "INSERT INTO dt_temp_session (current_user_id, session_key, session_value, entry_date_time) ";
    $sQuery .= " VALUES (" . $currUserId . ", 'currUser', '" . $q . "', now())";
   }

  $retVal  = $con->query($sQuery);
  closeDB($con);

?>


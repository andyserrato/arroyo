<?php
//  if (session_status() == PHP_SESSION_NONE)
//     {
//      session_start();
//     }
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package storefront
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link href="http://localhost:8080/systemTestDesarrollo/genericons/genericons.css" rel="stylesheet">
<script>

 // -------------------------------------------------------------------------
 // This function is use to find the user in 'Buscar Cliente'
 // Lalo  March 16, 2017
 // Lalo April 10, 2017 - Addded 'currUserId' la cual la recojo del 'hidden'
 //                       input.
 // -------------------------------------------------------------------------
 function findUser(str)
  {
   var currUserId = document.getElementById('currUserId').value;
   var siteURL    = document.getElementById('siteUrl').value;
 
   if (window.XMLHttpRequest)
    {
     // code for IE7+, Firefox, Chrome, Opera, Safari
     xmlhttp = new XMLHttpRequest();
    }
   else
    {
     // code for IE6, IE5
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
   xmlhttp.onreadystatechange = function()
    {
     if (this.readyState == 4 && this.status == 200)
      {
       document.getElementById("usersFound").innerHTML = this.responseText;
      }
    };

   var newURL = window.location.protocol + "//" + window.location.host + "/wordpress/";
   xmlhttp.open("GET", newURL + "ajaxCode/getUserWithAjax.php?q=" + str + "&currUser=" + currUserId + "&siteUrl=" + siteURL, true);
   xmlhttp.send();
  }
 // -------------------------------------------------------------------------


// test for href to go to ficha
function getClientId(str, sCurrUsrID)
 {
  if (window.XMLHttpRequest)
   {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp = new XMLHttpRequest();
   }
  else
   {
    // code for IE6, IE5
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
   }
  xmlhttp.onreadystatechange = function()
   {
    if (this.readyState == 4 && this.status == 200)
     {
      document.getElementById("scheduleVisit").innerHTML = this.responseText;
     }
   };

  var newURL = window.location.protocol + "//" + window.location.host + "/wordpress/";
  xmlhttp.open("GET", newURL + "ajaxCode/returnUserID.php?q=" + str + "&currUser=" + sCurrUsrID, true);
  xmlhttp.send();  
 }

  
 // -------------------------------------------------------------------------
 // Show Advanced Search Page via Ajax
 // Lalo  March 16, 2017
 // -------------------------------------------------------------------------
  function showAdvanceSearchPg()
   {
    if (window.XMLHttpRequest)
     {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp = new XMLHttpRequest();
     }
    else
     {
      // code for IE6, IE5
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
     }
    xmlhttp.onreadystatechange = function()
     {
      if (this.readyState == 4 && this.status == 200)
       {
        document.getElementById("usersFound").innerHTML = this.responseText;
       }
     };
  
    var newURL = window.location.protocol + "//" + window.location.host + "/wordpress/";
    str        = "";
    xmlhttp.open("GET", newURL + "ajaxCode/showAdvanceSearchPage.php?q=" + str, true);
    xmlhttp.send();
   }
 // -------------------------------------------------------------------------

 // -------------------------------------------------------------------------
 // showSchedule - Used on "fichaCliente.php"
 // Lalo  March 18, 2017
 // visitCustomer = 'si' or 'no'
 // -------------------------------------------------------------------------
  function showSchedule()
   {
    if (window.XMLHttpRequest)
     {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp = new XMLHttpRequest();
     }
    else
     {
      // code for IE6, IE5
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
     }
    xmlhttp.onreadystatechange = function()
     {
      if (this.readyState == 4 && this.status == 200)
       {
        document.getElementById("usersFound").innerHTML = this.responseText;
       }
     };
  
    var newURL = window.location.protocol + "//" + window.location.host + "/wordpress/";
    str        = "";
    xmlhttp.open("GET", newURL + "ajaxCode/showSchedule.php?q=" + str, true);
    xmlhttp.send();
   }
 // -------------------------------------------------------------------------





















</script>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <input type="hidden" name="currUserId" id="currUserId" value="<?php echo get_current_user_id() ?>"/>
  <input type="hidden" name="siteUrl"    id="siteUrl"    value="<?php echo get_site_url() ?>"/>




<div id="page" class="hfeed site">
  <?php


  do_action( 'storefront_before_header' ); ?>

  <header id="masthead" class="site-header" role="banner" style="<?php storefront_header_styles(); ?>">
    <div class="col-full">      
      
      <div class="site-branding">
        <?php storefront_site_title_or_logo(); ?>
      </div>
      
    </div>
  </header><!-- #masthead -->
    
  <div id="content" class="site-content" tabindex="-1">
    <div class="col-full">
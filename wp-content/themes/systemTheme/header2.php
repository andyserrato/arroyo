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
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <link href="http://localhost:8080/systemTestDesarrollo/genericons/genericons.css" rel="stylesheet">
    <script>

        // -------------------------------------------------------------------------
        // This function is use to find the user in 'Buscar Cliente'
        // Lalo  March 16, 2017
        // Lalo April 10, 2017 - Addded 'currUserId' la cual la recojo del 'hidden'
        //                       input.
        // -------------------------------------------------------------------------
        function findUser(str) {
            var currUserId = document.getElementById('currUserId').value;
            var siteURL = document.getElementById('siteUrl').value;

            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            }
            else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("usersFound").innerHTML = this.responseText;
                }
            };

            var newURL = window.location.protocol + "//" + window.location.host + "/wordpress/";
            xmlhttp.open("GET", newURL + "ajaxCode/getUserWithAjax.php?q=" + str + "&currUser=" + currUserId + "&siteUrl=" + siteURL, true);
            xmlhttp.send();
        }

        // -------------------------------------------------------------------------

        // -------------------------------------------------------------------------
        // This function is use to find products in 'Nuevo Pedido'
        // Andy  November 13, 2017
        //
        // -------------------------------------------------------------------------
        function findProducts(str) {
            var currUserId = document.getElementById('currUserId').value;
            var siteURL = document.getElementById('siteUrl').value;

            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            }
            else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("productsFound").innerHTML = this.responseText;
                }
            };

            var newURL = window.location.protocol + "//" + window.location.host + "/wordpress/";
            xmlhttp.open("GET", newURL + "ajaxCode/getProductsWithAjax.php?q=" + str + "&currUser=" + currUserId + "&siteUrl=" + siteURL, true);
            xmlhttp.send();
        }

        // -------------------------------------------------------------------------


        // test for href to go to ficha
        function getClientId(str, sCurrUsrID) {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            }
            else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
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
        function showAdvanceSearchPg() {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            }
            else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("usersFound").innerHTML = this.responseText;
                }
            };

            var newURL = window.location.protocol + "//" + window.location.host + "/wordpress/";
            str = "";
            xmlhttp.open("GET", newURL + "ajaxCode/showAdvanceSearchPage.php?q=" + str, true);
            xmlhttp.send();
        }

        // -------------------------------------------------------------------------

        // -------------------------------------------------------------------------
        // showSchedule - Used on "fichaCliente.php"
        // Lalo  March 18, 2017
        // visitCustomer = 'si' or 'no'
        // -------------------------------------------------------------------------
        function showSchedule() {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            }
            else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("usersFound").innerHTML = this.responseText;
                }
            };

            var newURL = window.location.protocol + "//" + window.location.host + "/wordpress/";
            str = "";
            xmlhttp.open("GET", newURL + "ajaxCode/showSchedule.php?q=" + str, true);
            xmlhttp.send();
        }

        // -------------------------------------------------------------------------

        // -------------------------------------------------------------------------
        // This function is use to find the users in 'Buscar Cliente Avanzado'
        // Lalo  March 16, 2017
        // Lalo April 10, 2017 - Addded 'currUserId' la cual la recojo del 'hidden'
        //                       input.
        // -------------------------------------------------------------------------
        function findClientAdvancedSearch() {
            var currUserId = document.getElementById('currUserId').value;
            var siteURL = document.getElementById('siteUrl').value;
            var queryArray = obtenerQueryArray();
            var queryString = obtenerQueryString(queryArray);

            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            }
            else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("usersFound").innerHTML = this.responseText;
                }
            };

            var newURL = window.location.protocol + "//" + window.location.host + "/wordpress/";
            xmlhttp.open("GET", newURL + "ajaxCode/getUsersFromAdvancedSearchWithAjax.php?q=" + str + "&currUser=" + currUserId + "&siteUrl=" + siteURL + queryString, true);
            xmlhttp.send();
        }

        // -------------------------------------------------------------------------

        // -------------------------------------------------------------------------
        // This function is use to get all fields from the advanced search page and
        // push them into an array of objects
        // Andy September 29, 2017
        // -------------------------------------------------------------------------
        function obtenerQueryArray() {
            var queryArray = [];

            queryArray.push({
                queryName: 'companyName',
                queryValue: document.getElementById('arr-companyField').value
            });

            queryArray.push({
                queryName: 'sectorCliente',
                queryValue: document.getElementById('arr-sectorField').value
            });

            queryArray.push({
                queryName: 'rankinCliente',
                queryValue: document.getElementById('arr-rankingList').value
            });

            queryArray.push({
                queryName: 'dayOfVisit',
                queryValue: document.getElementById('arr-dayOfVisit').value
            });

            var appointment;
            if (document.getElementsByName("concertarCita")[0].checked) {
                appointment = document.getElementsByName("concertarCita")[0].value;
            } else if (document.getElementsByName("concertarCita")[1].checked) {
                appointment = document.getElementsByName("concertarCita")[1].value;
            }

            queryArray.push({
                queryName: 'concertarCita',
                queryValue: appointment
            });

            queryArray.push({
                queryName: 'calleCliente',
                queryValue: document.getElementById('arr-calleCliente').value
            });

            queryArray.push({
                queryName: 'codPostal',
                queryValue: document.getElementById('arr-codPostal').value
            });

            queryArray.push({
                queryName: 'clienteCiudad',
                queryValue: document.getElementById('arr-clienteCiudad').value
            });

            queryArray.push({
                queryName: 'clientePoblacion',
                queryValue: document.getElementById('arr-clientePoblacion').value
            });

            queryArray.push({
                queryName: 'numeroDeRuta',
                queryValue: document.getElementById('arr-numeroDeRuta').value
            });

            var clienteVisitable;
            if (document.getElementsByName("clienteVisitable")[0].checked) {
                clienteVisitable = document.getElementsByName("clienteVisitable")[0].value;
            } else if (document.getElementsByName("clienteVisitable")[1].checked) {
                clienteVisitable = document.getElementsByName("clienteVisitable")[1].value;
            }

            queryArray.push({
                queryName: 'clienteVisitable',
                queryValue: clienteVisitable
            });

            var seHanVisitado;
            if (document.getElementsByName("seHanVisitado")[0].checked) {
                seHanVisitado = document.getElementsByName("seHanVisitado")[0].value;
            } else if (document.getElementsByName("seHanVisitado")[1].checked) {
                seHanVisitado = document.getElementsByName("seHanVisitado")[1].value;
            }

            queryArray.push({
                queryName: 'seHanVisitado',
                queryValue: seHanVisitado
            });

            queryArray.push({
                queryName: 'visitFrom',
                queryValue: document.getElementById('arr-visitFrom').value
            });

            queryArray.push({
                queryName: 'visitTo',
                queryValue: document.getElementById('arr-visitTo').value
            });

            console.log(queryArray);

            return queryArray;
        }
        // -------------------------------------------------------------------------

        // -------------------------------------------------------------------------
        // This function is use to get all fields from the advanced search page and
        // push them into an array of objects
        // Andy September 29, 2017
        // -------------------------------------------------------------------------
        function obtenerQueryString(queryArray) {
            var queryString = '';
            for (var i = 0 ; i < queryArray.length ; i++) {
                console.log(queryArray[i]);
                console.log('&' + queryArray[i].queryName + '=' + queryArray[i].queryValue);
                queryString += '&' + queryArray[i].queryName + '=' + queryArray[i].queryValue;
            }
            console.log(queryString);
            return queryString;
        }
        // -------------------------------------------------------------------------




    </script>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<input type="hidden" name="currUserId" id="currUserId" value="<?php echo get_current_user_id() ?>"/>
<input type="hidden" name="siteUrl" id="siteUrl" value="<?php echo get_site_url() ?>"/>


<div id="page" class="hfeed site">
    <?php


    do_action('storefront_before_header'); ?>

    <header id="masthead" class="site-header" role="banner" style="<?php storefront_header_styles(); ?>">
        <div class="col-full">

            <div class="site-branding">
                <?php storefront_site_title_or_logo(); ?>
            </div>

        </div>
    </header><!-- #masthead -->

    <div id="content" class="site-content" tabindex="-1">
        <div class="col-full">
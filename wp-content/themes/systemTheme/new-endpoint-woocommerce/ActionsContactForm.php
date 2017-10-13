<?php
// ============================================  
// Acciones del Formulario para cambio de datos
// ============================================
$modData          = 'general';
$modDataCont      = 'contacto';
$modShippInf      = 'envio';
$modBusinessHours = 'horarioComercial';
$modVisitHours    = 'horarioVisita';
$modBillingInf    = 'facturacion';

if (isset($_POST['modDataCustomer']))
 {
  if ($_POST['modDataCustomer'] == 'modificar datos cliente')
   {
     header('Location: mod-datos-cliente?dataCliente='. $modData .'&clienteID=' . $userID .'');
//     header('Location: mod-datos-cliente?dataCliente='. $modData .'');
//    echo '<script language="javascript">alert("Datos de Usuario. ID: ' . $userID . ' ");</script>';
    }
 }
 
 if (isset($_POST['modDataContact']))
  {
   if ($_POST['modDataContact'] == 'modificar datos contacto')
    {
       header('Location: mod-datos-cliente?dataCliente='. $modDataCont .'&clienteID=' . $userID .'');
//     echo '<script language="javascript">alert("Datos de Contacto. ID: ' . $userID . ' ");</script>';
     }
  }

if (isset($_POST['modShippingInformation']))
 {
  if ($_POST['modShippingInformation'] == 'modificar datos envío')
   {
       header('Location: mod-datos-cliente?dataCliente='. $modShippInf .'&clienteID=' . $userID .'');
//    echo '<script language="javascript">alert("Datos de Envio. ID: ' . $userID . ' ");</script>';
    }
 }

if (isset($_POST['modBusinessHours']))
 {
  if ($_POST['modBusinessHours'] == 'modificar horario comercial')
   {
       header('Location: mod-datos-cliente?dataCliente='. $modBusinessHours .'&clienteID=' . $userID .'');
//    echo '<script language="javascript">alert("Datos Horario Comercial. ID: ' . $userID . ' ");</script>';
    }
 }

if (isset($_POST['modScheduleVisit']))
 {
  if ($_POST['modScheduleVisit'] == 'modificar horario visita')
   {
       header('Location: mod-datos-cliente?dataCliente='. $modVisitHours .'&clienteID=' . $userID .'');
//    echo '<script language="javascript">alert("Datos Horario Visita. ID: ' . $userID . ' ");</script>';
    }
 }

if (isset($_POST['modBillingInformation']))
 {
  if ($_POST['modBillingInformation'] == 'modificar datos facturación')
   {
       header('Location: mod-datos-cliente?dataCliente='. $modBillingInf .'&clienteID=' . $userID .'');
//    echo '<script language="javascript">alert("Datos de Facturacion. ID: ' . $userID . ' ");</script>';
    }
 }
?>
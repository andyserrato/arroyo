<?php

  // --------------------------------------------------------

  // showAdvanceSearchPage.php

  // 

  // ------------ ------------------ -----------------------------------------------------------------------

  // Updated By      Updated Date                                  Description

  // ------------ ------------------ -----------------------------------------------------------------------

  // Lalo         March 16, 2017     Show the "Advanced Search Page"

  //                                 

  // ------------ ------------------ -----------------------------------------------------------------------

  // 

  // -------------------------------------------------------------------------------------------------------

  //  global $wpdb;

  // -------------------------------------------------------------------------------------------------------

  //  $q = $_GET['q'];

?>
<form method="get" action="searchClientAdvanced.php" id="searchClient" name="searchClient">
    <table>
      <tr>
        <td colspan="3">
          <input type="text" name="companyField" placeholder="Nombre Cliente">
        </td>
      </tr>
      
      <tr>
        <td colspan="1">
          <select placeholder="Sector Cliente" name="sectorField">
            <option disabled selected>Sector del Cliente</option>
            <option>Todos</option>  
            <option>Odontólogo</option> 
            <option>Veterinario</option> 
            <option>Podólogo</option> 
          </select> 
        </td>
        
        <td colspan="1">
          <select name="rankingList"> 
            <option disabled selected>Ranking del Cliente</option> 
            <option>Todos</option> 
            <option>Maximo</option> 
            <option>Mediano</option> 
            <option>Bajo</option> 
          </select> 
        </td>
        
        <td colspan="1">
          <select name="dayOfVisit"> 
            <option disabled selected>Día de Visita</option>
            <option>Todos</option>  
            <option>Lunes</option> 
            <option>Martes</option> 
            <option>Miercoles</option> 
            <option>Jueves</option> 
            <option>Viernes</option> 
          </select> 
        </td>
           
      </tr>
      
      <tr>
        <td colspan="1"></td>
        <td colspan="1"></td>
         
        <td colspan="1">
          ¿Concertar Cita? <br />
          Si <input name="getAppointment" value="Yes" type="radio">  &nbsp;
          No <input name="getAppointment" value="No" type="radio">
        </td>
        
      </tr>
      
      
      <tr>
        <td colspan="2">
           <input type="text" placeholder="Calle" name="calleCliente">
       </td>
       <td colspan="1">
         <input type="text" placeholder="Cod. Postal" name="codPostal">
       </td>
      </tr>
      
      <tr>
        <td colspan="1">
           <input type="text" placeholder="Ciudad" name="clienteCiudad">
       </td>
       <td colspan="1">
         <input type="text" placeholder="Población" name="clientePostal">
       </td>
       <td colspan="1">
         <input type="text" placeholder="Núm. Ruta" name="numeroDeRuta">
       </td>
      </tr>
      
      <tr>
       <td colspan="1">
          ¿Clientes Visitables?: &nbsp; 
          Si <input name="clienteVisitable" value="true"  type="radio"> &nbsp;  
          No <input name="clienteVisitable" value="false" type="radio">
       </td>
       <td colspan="2">
         ¿Se han Visitado? &nbsp;
              Si <input name="seHanVisitado" value="true" type="radio"> &nbsp;
              No <input name="seHanVisitado" value="false" type="radio">
       </td>
      </tr>
      
      <tr>
       <td colspan="1"></td>
       <td colspan="1">
         <input type="text" placeholder="desde" name="visitFrom">
       </td>
       <td colspan="1">
         <input type="text" placeholder="hasta" name="visitTo"> 
       </td>
      </tr>
      
      
      <tr>
          <td colspan="1">
             <input name="submitSearch" value="submitSearch" type="button" onclick="findUser('den')">
          </td>
      </tr>
    </table>   
    

</form> 




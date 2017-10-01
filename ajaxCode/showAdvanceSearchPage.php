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
          <input type="text" id="arr-companyField" name="companyField" placeholder="Nombre Cliente">
        </td>
      </tr>
      
      <tr>
        <td colspan="1">
          <select placeholder="Sector Cliente" name="sectorField" id="arr-sectorField">
            <option disabled selected>Sector del Cliente</option>
            <option>Todos</option>  
            <option>Odontología</option>
            <option>Protésico</option>
            <option>Podólogo</option>
            <option>Esteticista</option>
            <option>Veterinario</option>
            <option>Distribuidor</option>
          </select> 
        </td>
        
        <td colspan="1">
          <select name="rankingList" id="arr-rankingList">
            <option disabled selected>Ranking del Cliente</option> 
            <option>Todos</option> 
            <option>Máxima</option>
            <option>Media</option>
            <option>Baja</option>
          </select> 
        </td>
        
        <td colspan="1">
          <select name="dayOfVisit" id="arr-dayOfVisit">
            <option disabled selected>Día de Visita</option>
            <option>Todos</option>  
            <option>Lunes</option> 
            <option>Martes</option> 
            <option>Miercoles</option> 
            <option>Jueves</option> 
            <option>Viernes</option>
            <option>Sabado</option>
          </select> 
        </td>
           
      </tr>
      
      <tr>
        <td colspan="1"></td>
        <td colspan="1"></td>
         
        <td colspan="1">
          ¿Concertar Cita? <br />
          Si <input name="concertarCita" value="si" type="radio">  &nbsp;
          No <input name="concertarCita" value="no" type="radio">
        </td>
        
      </tr>
      
      
      <tr>
        <td colspan="2">
           <input type="text" placeholder="Calle" name="calleCliente" id="arr-calleCliente">
       </td>
       <td colspan="1">
         <input type="text" placeholder="Cod. Postal" name="codPostal" id="arr-codPostal">
       </td>
      </tr>
      
      <tr>
        <td colspan="1">
           <input type="text" placeholder="Ciudad" name="clienteCiudad" id="arr-clienteCiudad">
       </td>
       <td colspan="1">
         <input type="text" placeholder="Población" name="clientePoblacion" id="arr-clientePoblacion">
       </td>
       <td colspan="1">
         <input type="text" placeholder="Núm. Ruta" name="numeroDeRuta" id="arr-numeroDeRuta">
       </td>
      </tr>
      
      <tr>
       <td colspan="1">
          ¿Clientes Visitables?: &nbsp; 
          Si <input name="clienteVisitable" value="si"  type="radio"> &nbsp;
          No <input name="clienteVisitable" value="no" type="radio">
       </td>
       <td colspan="2">
         ¿Se han Visitado? &nbsp;
          Si <input name="seHanVisitado" value="si" type="radio"> &nbsp;
          No <input name="seHanVisitado" value="no" type="radio">
       </td>
      </tr>
      
      <tr>
       <td colspan="1"></td>
       <td colspan="1">
         <input type="date" placeholder="desde" name="visitFrom" id="arr-visitFrom">
       </td>
       <td colspan="1">
         <input type="date" placeholder="hasta" name="visitTo" id="arr-visitTo">
       </td>
      </tr>
      
      
      <tr>
          <td colspan="1">
             <input name="submitSearch" value="submitSearch" type="button" onclick="findClientAdvancedSearch()">
          </td>
      </tr>
    </table>   
    

</form> 




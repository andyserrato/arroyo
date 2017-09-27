<table id="businessHours">
</table>
      
      <table id="scheduleVisit">

          <th>Horario Visita</th>
          <th>Mañanas</th>
          <th>Tardes</th>
        </tr>
       
<?php 
  // -----------------------------------------
  // tablasHorariosBasic.php
  // -----------------------------------------

     if ($userData['HVlunes'][0] == 'on')
       {
         echo
           "<tr>
             <td>Lunes</td>";
             echo"<td>".
              $userData['HVlunesHoraAMdesde'][0].": ".$userData['HVlunesMinAMdesde'][0]." / ".$userData['HVlunesHoraAMhasta'][0].": ".$userData['HVlunesMinAMhasta'][0];
             "</td>";
             echo"<td>".
              $userData['HVlunesHoraPMdesde'][0].": ".$userData['HVlunesMinPMdesde'][0]." / ".$userData['HVlunesHoraPMhasta'][0].": ".$userData['HVlunesMinPMhasta'][0];
             "</td>
           </tr>";
        }
        
        if ($userData['HVmartes'][0] == 'on')
          {
            echo
              "<tr>
                <td>Martes</td>";
                echo"<td>".
                 $userData['HVmartesHoraAMdesde'][0].": ".$userData['HVmartesMinAMdesde'][0]." / ".$userData['HVmartesHoraAMhasta'][0].": ".$userData['HVmartesMinAMhasta'][0];
                "</td>";
                echo"<td>".
                 $userData['HVmartesHoraPMdesde'][0].": ".$userData['HVmartesMinPMdesde'][0]." / ".$userData['HVmartesHoraPMhasta'][0].": ".$userData['HVmartesMinPMhasta'][0];
                "</td>
              </tr>";
           } 
         
         if ($userData['HVmiercoles'][0] == 'on')
           {
             echo
               "<tr>
                 <td>Miércoles</td>";
                 echo"<td>".
                  $userData['HVmiercolesHoraAMdesde'][0].": ".$userData['HVmiercolesMinAMdesde'][0]." / ".$userData['HVmiercolesHoraAMhasta'][0].": ".$userData['HVmiercolesMinAMhasta'][0];
                 "</td>";
                 echo"<td>".
                  $userData['HVmiercolesHoraPMdesde'][0].": ".$userData['HVmiercolesMinPMdesde'][0]." / ".$userData['HVmiercolesHoraPMhasta'][0].": ".$userData['HVmiercolesMinPMhasta'][0];
                 "</td>
               </tr>";
            }
            
            if ($userData['HVjueves'][0] == 'on')
              {
                echo
                  "<tr>
                    <td>Jueves</td>";
                    echo"<td>".
                     $userData['HVjuevesHoraAMdesde'][0].": ".$userData['HVjuevesMinAMdesde'][0]." / ".$userData['HVjuevesHoraAMhasta'][0].": ".$userData['HVjuevesMinAMhasta'][0];
                    "</td>";
                    echo"<td>".
                     $userData['HVjuevesHoraPMdesde'][0].": ".$userData['HVjuevesMinPMdesde'][0]." / ".$userData['HVjuevesHoraPMhasta'][0].": ".$userData['HVjuevesMinPMhasta'][0];
                    "</td>
                  </tr>";
               } 
            
               if ($userData['HVviernes'][0] == 'on')
                 {
                   echo
                     "<tr>
                       <td>Viernes</td>";
                       echo"<td>".
                        $userData['HVviernesHoraAMdesde'][0].": ".$userData['HVviernesMinAMdesde'][0]." / ".$userData['HVviernesHoraAMhasta'][0].": ".$userData['HVviernesMinAMhasta'][0];
                       "</td>";
                       echo"<td>".
                        $userData['HVviernesHoraPMdesde'][0].": ".$userData['HVviernesMinPMdesde'][0]." / ".$userData['HVviernesHoraPMhasta'][0].": ".$userData['HVviernesMinPMhasta'][0];
                       "</td>
                     </tr>";
                  } 
                  
                  if ($userData['HVsabado'][0] == 'on')
                    {
                      echo
                        "<tr>
                          <td>Sábado</td>";
                          echo"<td>".
                           $userData['HVsabadoHoraAMdesde'][0].": ".$userData['HVsabadoMinAMdesde'][0]." / ".$userData['HVsabadoHoraAMhasta'][0].": ".$userData['HVsabadoMinAMhasta'][0];
                          "</td>";
                          echo"<td>".
                           $userData['HVsabadoHoraPMdesde'][0].": ".$userData['HVsabadoMinPMdesde'][0]." / ".$userData['HVsabadoHoraPMhasta'][0].": ".$userData['HVsabadoMinPMhasta'][0];
                          "</td>
                        </tr>";
                     }   
           ?>            
          </table>

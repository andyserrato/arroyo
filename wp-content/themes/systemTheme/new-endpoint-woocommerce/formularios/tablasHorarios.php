 <table id="businessHours">
   <tr>
     <td colspan="3">
       <h4>
          HORARIOS
       </h4>
     </td>
   </tr>
   
   <tr>
     <th>Horario Comercial</th>
     <th>Mañanas</th>
     <th>Tardes</th>
   </tr>
   
<?php 
     if ($myUser['HClunes'][0] == 'on')
       {
        echo
        "<tr>
          <td>Lunes</td>";
          echo"<td>".
           $myUser['HClunesHoraAMdesde'][0].": ".$myUser['HClunesMinAMdesde'][0]." / ".$myUser['HClunesHoraAMhasta'][0].": ".$myUser['HClunesMinAMhasta'][0];
          "</td>";
          echo"<td>".
           $myUser['HClunesHoraPMdesde'][0].": ".$myUser['HClunesMinPMdesde'][0]." / ".$myUser['HClunesHoraPMhasta'][0].": ".$myUser['HClunesMinPMhasta'][0];
          "</td>
        </tr>";
       }
        
     if ($myUser['HCmartes'][0] == 'on')
       {
        echo
        "<tr>
          <td>Martes</td>";
          echo"<td>".
           $myUser['HCmartesHoraAMdesde'][0].": ".$myUser['HCmartesMinAMdesde'][0]." / ".$myUser['HCmartesHoraAMhasta'][0].": ".$myUser['HCmartesMinAMhasta'][0];
          "</td>";
          echo"<td>".
           $myUser['HCmartesHoraPMdesde'][0].": ".$myUser['HCmartesMinPMdesde'][0]." / ".$myUser['HCmartesHoraPMhasta'][0].": ".$myUser['HCmartesMinPMhasta'][0];
          "</td>
        </tr>";
       } 
      
      if ($myUser['HCmiercoles'][0] == 'on')
        {
         echo
         "<tr>
           <td>Miércoles</td>";
           echo"<td>".
            $myUser['HCmiercolesHoraAMdesde'][0].": ".$myUser['HCmiercolesMinAMdesde'][0]." / ".$myUser['HCmiercolesHoraAMhasta'][0].": ".$myUser['HCmiercolesMinAMhasta'][0];
           "</td>";
           echo"<td>".
            $myUser['HCmiercolesHoraPMdesde'][0].": ".$myUser['HCmiercolesMinPMdesde'][0]." / ".$myUser['HCmiercolesHoraPMhasta'][0].": ".$myUser['HCmiercolesMinPMhasta'][0];
           "</td>
         </tr>";
        }
         
      if ($myUser['HCjueves'][0] == 'on')
        {
         echo
         "<tr>
           <td>Jueves</td>";
           echo"<td>".
            $myUser['HCjuevesHoraAMdesde'][0].": ".$myUser['HCjuevesMinAMdesde'][0]." / ".$myUser['HCjuevesHoraAMhasta'][0].": ".$myUser['HCjuevesMinAMhasta'][0];
           "</td>";
           echo"<td>".
            $myUser['HCjuevesHoraPMdesde'][0].": ".$myUser['HCjuevesMinPMdesde'][0]." / ".$myUser['HCjuevesHoraPMhasta'][0].": ".$myUser['HCjuevesMinPMhasta'][0];
           "</td>
         </tr>";
        } 
      
      if ($myUser['HCviernes'][0] == 'on')
        {
         echo
         "<tr>
           <td>Viernes</td>";
           echo"<td>".
            $myUser['HCviernesHoraAMdesde'][0].": ".$myUser['HCviernesMinAMdesde'][0]." / ".$myUser['HCviernesHoraAMhasta'][0].": ".$myUser['HCviernesMinAMhasta'][0];
           "</td>";
           echo"<td>".
            $myUser['HCviernesHoraPMdesde'][0].": ".$myUser['HCviernesMinPMdesde'][0]." / ".$myUser['HCviernesHoraPMhasta'][0].": ".$myUser['HCviernesMinPMhasta'][0];
           "</td>
         </tr>";
        } 
         
      if ($myUser['HCsabado'][0] == 'on')
        {
         echo
         "<tr>
           <td>Sábado</td>";
           echo"<td>".
            $myUser['HCsabadoHoraAMdesde'][0].": ".$myUser['HCsabadoMinAMdesde'][0]." / ".$myUser['HCsabadoHoraAMhasta'][0].": ".$myUser['HCsabadoMinAMhasta'][0];
           "</td>";
           echo"<td>".
            $myUser['HCsabadoHoraPMdesde'][0].": ".$myUser['HCsabadoMinPMdesde'][0]." / ".$myUser['HCsabadoHoraPMhasta'][0].": ".$myUser['HCsabadoMinPMhasta'][0];
           "</td>
         </tr>";
        } 
               
?>            
      </table>
      
      <table id="scheduleVisit">

          <th>Horario Visita</th>
          <th>Mañanas</th>
          <th>Tardes</th>
        </tr>
       
<?php 
     if ($myUser['HVlunes'][0] == 'on')
       {
         echo
           "<tr>
             <td>Lunes</td>";
             echo"<td>".
              $myUser['HVlunesHoraAMdesde'][0].": ".$myUser['HVlunesMinAMdesde'][0]." / ".$myUser['HVlunesHoraAMhasta'][0].": ".$myUser['HVlunesMinAMhasta'][0];
             "</td>";
             echo"<td>".
              $myUser['HVlunesHoraPMdesde'][0].": ".$myUser['HVlunesMinPMdesde'][0]." / ".$myUser['HVlunesHoraPMhasta'][0].": ".$myUser['HVlunesMinPMhasta'][0];
             "</td>
           </tr>";
        }
        
        if ($myUser['HVmartes'][0] == 'on')
          {
            echo
              "<tr>
                <td>Martes</td>";
                echo"<td>".
                 $myUser['HVmartesHoraAMdesde'][0].": ".$myUser['HVmartesMinAMdesde'][0]." / ".$myUser['HVmartesHoraAMhasta'][0].": ".$myUser['HVmartesMinAMhasta'][0];
                "</td>";
                echo"<td>".
                 $myUser['HVmartesHoraPMdesde'][0].": ".$myUser['HVmartesMinPMdesde'][0]." / ".$myUser['HVmartesHoraPMhasta'][0].": ".$myUser['HVmartesMinPMhasta'][0];
                "</td>
              </tr>";
           } 
         
         if ($myUser['HVmiercoles'][0] == 'on')
           {
             echo
               "<tr>
                 <td>Miércoles</td>";
                 echo"<td>".
                  $myUser['HVmiercolesHoraAMdesde'][0].": ".$myUser['HVmiercolesMinAMdesde'][0]." / ".$myUser['HVmiercolesHoraAMhasta'][0].": ".$myUser['HVmiercolesMinAMhasta'][0];
                 "</td>";
                 echo"<td>".
                  $myUser['HVmiercolesHoraPMdesde'][0].": ".$myUser['HVmiercolesMinPMdesde'][0]." / ".$myUser['HVmiercolesHoraPMhasta'][0].": ".$myUser['HVmiercolesMinPMhasta'][0];
                 "</td>
               </tr>";
            }
            
            if ($myUser['HVjueves'][0] == 'on')
              {
                echo
                  "<tr>
                    <td>Jueves</td>";
                    echo"<td>".
                     $myUser['HVjuevesHoraAMdesde'][0].": ".$myUser['HVjuevesMinAMdesde'][0]." / ".$myUser['HVjuevesHoraAMhasta'][0].": ".$myUser['HVjuevesMinAMhasta'][0];
                    "</td>";
                    echo"<td>".
                     $myUser['HVjuevesHoraPMdesde'][0].": ".$myUser['HVjuevesMinPMdesde'][0]." / ".$myUser['HVjuevesHoraPMhasta'][0].": ".$myUser['HVjuevesMinPMhasta'][0];
                    "</td>
                  </tr>";
               } 
            
               if ($myUser['HVviernes'][0] == 'on')
                 {
                   echo
                     "<tr>
                       <td>Viernes</td>";
                       echo"<td>".
                        $myUser['HVviernesHoraAMdesde'][0].": ".$myUser['HVviernesMinAMdesde'][0]." / ".$myUser['HVviernesHoraAMhasta'][0].": ".$myUser['HVviernesMinAMhasta'][0];
                       "</td>";
                       echo"<td>".
                        $myUser['HVviernesHoraPMdesde'][0].": ".$myUser['HVviernesMinPMdesde'][0]." / ".$myUser['HVviernesHoraPMhasta'][0].": ".$myUser['HVviernesMinPMhasta'][0];
                       "</td>
                     </tr>";
                  } 
                  
                  if ($myUser['HVsabado'][0] == 'on')
                    {
                      echo
                        "<tr>
                          <td>Sábado</td>";
                          echo"<td>".
                           $myUser['HVsabadoHoraAMdesde'][0].": ".$myUser['HVsabadoMinAMdesde'][0]." / ".$myUser['HVsabadoHoraAMhasta'][0].": ".$myUser['HVsabadoMinAMhasta'][0];
                          "</td>";
                          echo"<td>".
                           $myUser['HVsabadoHoraPMdesde'][0].": ".$myUser['HVsabadoMinPMdesde'][0]." / ".$myUser['HVsabadoHoraPMhasta'][0].": ".$myUser['HVsabadoMinPMhasta'][0];
                          "</td>
                        </tr>";
                     }   
           ?>            
          </table>

<table id="shippingInformation">
    <tr>
        <td colspan="6">
            <h4>
                Datos de Envío
            </h4>
        </td>
    </tr>        
    <tr>
        <td colspan="2">Teléfono:</td>
        <td colspan="4">
            <?php
                echo $userData['telFijo1'][0];
            ?>
        </td>
    </tr>
    <tr>
        <td colspan="2">Calle:</td>
        <td colspan="4">
            <?php
                echo $userData['billing_address_1'][0];
            ?>
        </td>
    </tr>
    <tr>
        <td>Nº:</td>
        <td>
            <?php
                echo $userData['numCalle'][0];
            ?>
        </td>
        <td>Piso:</td>
        <td>
            <?php
                echo $userData['numPiso'][0];
            ?>
        </td>
        <td>Cod. Postal:</td>
        <td>
            <?php
                echo $userData['billing_postcode'][0];
            ?>
        </td>
    </tr>
    <tr>
        <td colspan="2">Población:</td>
        <td colspan="4">
            <?php
                echo $userData['billing_city'][0];
            ?>
        </td>
    </tr>
    <tr>
        <td colspan="2">Provincia:</td>
        <td colspan="4">
            <?php
                echo $userData['billing_state'][0];
            ?>
        </td>
    </tr>
    
    </table>
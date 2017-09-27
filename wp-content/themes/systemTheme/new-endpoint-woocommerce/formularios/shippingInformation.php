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
                echo $userData['shipping_address_1'][0];
            ?>
        </td>
    </tr>
    <tr>
        <td>Nº:</td>
        <td>
            <?php
                echo $userData['numCalleShipping'][0];
            ?>
        </td>
        <td>Piso:</td>
        <td>
            <?php
                echo $userData['numPisoShipping'][0];
            ?>
        </td>
        <td>Cod. Postal:</td>
        <td>
            <?php
                echo $userData['shipping_postcode'][0];
            ?>
        </td>
    </tr>
    <tr>
        <td colspan="2">Población:</td>
        <td colspan="4">
            <?php
                echo $userData['shipping_city'][0];
            ?>
        </td>
    </tr>
    <tr>
        <td colspan="2">Provincia:</td>
        <td colspan="4">
            <?php
                echo $userData['shipping_state'][0];
            ?>
        </td>
    </tr>
    
    </table>
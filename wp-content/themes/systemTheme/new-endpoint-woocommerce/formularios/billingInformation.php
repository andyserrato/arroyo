<table id="billingInformation">
    <tr>
        <td colspan="6">
            <h4>
                Datos de Facturación
            </h4>
        </td>
    </tr>
    <tr>
        <td colspan="2">Nombre/Razón Social:</td>
        <td colspan="4">
            <?php
                echo $userData['shipping_company'][0];
            ?>
        </td>
    </tr>
    <tr>
        <td colspan="2">CIF:</td>
        <td colspan="4">
            <?php
                echo $userData['numCIF'][0];
            ?>
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
                if ($userData['dirEnvioComoFact'][0] == 'si')
                    echo $userData['shipping_address_1'][0];
                else
                    echo $userData['billing_address_1'][0];
            ?>
        </td>
    </tr>
    <tr>
        <td>Nº:</td>
        <td>
            <?php
                if ($userData['dirEnvioComoFact'][0] == 'si')
                    echo $userData['numCalleShipping'][0];
                else
                    echo $userData['numCalle'][0];
            ?>
        </td>
        <td>Piso:</td>
        <td>
            <?php
            if ($userData['dirEnvioComoFact'][0] == 'si')
                echo $userData['numPisoShipping'][0];
            else
                echo $userData['numPiso'][0];
            ?>
        </td>
        <td>Cod. Postal:</td>
        <td>
            <?php
            if ($userData['dirEnvioComoFact'][0] == 'si')
                echo $userData['shipping_postcode'][0];
            else
                echo $userData['billing_postcode'][0];
            ?>
        </td>
    </tr>
    <tr>
        <td colspan="2">Población:</td>
        <td colspan="4">
            <?php
            if ($userData['dirEnvioComoFact'][0] == 'si')
                echo $userData['shipping_city'][0];
            else
                echo $userData['billing_city'][0];
            ?>
        </td>
    </tr>
    <tr>
        <td colspan="2">Provincia:</td>
        <td colspan="4">
            <?php
            if ($userData['dirEnvioComoFact'][0] == 'si')
                echo $userData['shipping_state'][0];
            else
                echo $userData['billing_state'][0];
            ?>
        </td>
    </tr>
    <tr>
        <td colspan="6">
            <h4>
                Datos Bancarios
            </h4>
        </td>
    </tr>
    <tr>
        <td colspan="2">Nº Cuenta Cliente:</td>
        <td colspan="4">
            <?php
                echo $userData['cuentaCliente'][0];
            ?>
        </td>
    </tr>
    <tr>
        <td colspan="2">IBAN:</td>
        <td colspan="4">
            <?php
                echo $userData['numeroIBAN'][0];
            ?>
        </td>
    </tr>        
    </table>
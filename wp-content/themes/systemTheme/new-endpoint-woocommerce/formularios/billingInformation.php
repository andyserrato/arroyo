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
        <td colspan="4">xxxx xxxx xxx</td>
    </tr>
    <tr>
        <td colspan="2">CIF:</td>
        <td colspan="4">
            <?php
                echo $userData['numCif'][0];
            ?></td>
    </tr>        
    <tr>
        <td colspan="2">Teléfono:</td>
        <td colspan="4">xxxx xxxx xxx</td>
    </tr>
    <tr>
        <td colspan="2">Calle:</td>
        <td colspan="4">xxxx xxxx xxx</td>
    </tr>
    <tr>
        <td>Nº:</td>
        <td>XXX</td>
        <td>Piso:</td>
        <td>XXX</td>
        <td>Cod. Postal:</td>
        <td>XXXXX</td>
    </tr>
    <tr>
        <td colspan="2">Población:</td>
        <td colspan="4">xxxx xxxx xxx</td>
    </tr>
    <tr>
        <td colspan="2">Provincia:</td>
        <td colspan="4">xxxx xxxx xxx</td>
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
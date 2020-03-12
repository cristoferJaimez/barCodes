<?php
 include('db.php');

 $store = $_SESSION['id']; 
 $localitation =  $_SESSION['stores'];
  
date_default_timezone_set('America/Bogota');
 
$fecha = date("d-m-Y H:i:s");
 

header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=$fecha.Modelo_Importacion_de_Productos_$localitation.xls"); 
header("Pragma: no-cache");
header("Expires: 0");

     

     $query = "SELECT * FROM inventario_excel where store = '$store' ORDER BY  cod_pro ASC ";
     $result = $conn->query($query);
       


?>
<table border="1">
    <tr>
        <th style='background:#CCC; color:#000'>Tipo de produto</th>
        <th style='background:#CCC; color:#000'>C&oacute;digo de grupo de Inventario</th>
        <th style='background:#CCC; color:#000'>C&oacute;digo de Producto</th>
        <th style='background:#CCC; color:#000'>Nombre del Producto</th>
        <th style='background:#CCC; color:#000'>Referencia de f&aacute;brica</th>
        <th style='background:#CCC; color:#000'>Unidad de medida impresi&oacute;n factura</th>
        <th style='background:#CCC; color:#000'>C&oacute;digo de barras</th>
        <th style='background:#CCC; color:#000'>Maneja control de Inventario</th>
        <th style='background:#CCC; color:#000'>Descripci&oacute;n larga</th>
        <th style='background:#CCC; color:#000'>C&oacute;digo impuesto cargo</th>
        <th style='background:#CCC; color:#000'>Es incluido</th>
        <th style='background:#CCC; color:#000'>Clasificaci&oacute;n Tributaria</th>
        <th style='background:#CCC; color:#000'>C&oacute;digo impuesto retenci&oacute;n</th>
        <th style='background:#CCC; color:#000'>Valor impoconsumo</th>
        <th style='background:#CCC; color:#000'>Lista de precio 1</th>
        <th style='background:#CCC; color:#000'>Lista de precio 2</th>
        <th style='background:#CCC; color:#000'>Lista de precio 3</th>
        <th style='background:#CCC; color:#000'>Lista de precio 4</th>
        <th style='background:#CCC; color:#000'>Lista de precio 5</th>
        <th style='background:#CCC; color:#000'>Lista de precio 6</th>
        <th style='background:#CCC; color:#000'>Lista de precio 7</th>
        <th style='background:#CCC; color:#000'>Lista de precio 8</th>
        <th style='background:#CCC; color:#000'>Lista de precio 9</th>
        <th style='background:#CCC; color:#000'>Lista de precio 10</th>
        <th style='background:#CCC; color:#000'>C&oacute;digo arancelario</th>
        <th style='background:#CCC; color:#000'>Marca</th>
        <th style='background:#CCC; color:#000'>Modelo</th>
        <th style='background:#CCC; color:#000'>Unidad de medida factura electr&oacute;nica</th>
    </tr>
    <?php
      while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        ?>
    <tr>
        <td></td>
        <td  style="mso-number-format:'000';"><?php echo utf8_decode($row['cod_inv']); ?></td>
        <td  style="mso-number-format:'00000000';"><?php echo utf8_decode($row['cod_inv'].$row['cod_pro']);?></td>
        <td><?php echo utf8_decode($row['nom_pro']); ?></td>
        <td></td>
        <td></td>
        <td  style="mso-number-format:'00000000';"><?php echo utf8_decode($row['cod_inv'].$row['cod_pro']);?></td>
        <td>SI</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td  style=""><?php echo utf8_decode($row['pro_price']);?></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <?php } ?>
</table>
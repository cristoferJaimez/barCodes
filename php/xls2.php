<?php
 include('db.php');

 $store = $_SESSION['id']; 
 $localitation =  $_SESSION['stores'];
  
date_default_timezone_set('America/Bogota');
 
$fecha = date("d-m-Y H:i:s");
 

header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=$fecha.Modelo_Importacion_Saldo_Iniciales_de_Inventario_$localitation.xls"); 
header("Pragma: no-cache");
header("Expires: 0");

     

     $query = "SELECT * FROM inventario_excel where store = '$store' ORDER BY   cod_inv,cod_pro ASC ";
     $result = $conn->query($query);
       


?>
<table border="1">
    <tr>
        <th style='background:#CCC; color:#000'>C&oacute;digo de Producto</th>
        <th style='background:#CCC; color:#000'>Nombre del Producto</th>
        <th style='background:#CCC; color:#000'>Referencia de F&acute;brica</th>
        <th style='background:#CCC; color:#000'>C&oacute;digo de Bodega</th>
        <th style='background:#CCC; color:#000'>C&oacute;digo centro/subcentro</th>
        <th style='background:#CCC; color:#000'>Cantidad</th>
        <th style='background:#CCC; color:#000'>Valor Total</th>
       </tr>
    <?php
      while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        ?>
    <tr>
        <td></td>
        <td  style="mso-number-format:'000';"><?php echo utf8_decode($row['cod_inv'].$row['cod_pro']);?></td>
        <td  style="mso-number-format:'00000000';"></td>
        <td></td>
        <td></td>
        <td></td>
        <td  style="mso-number-format:'00000000';"></td>
        
    </tr>
    <?php } ?>
</table>
<?php
  
date_default_timezone_set('America/Bogota');
 
$fecha = date("d-m-Y H:i:s");
 

header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=ReporteMundoModa_$fecha.xls"); 
header("Pragma: no-cache");
header("Expires: 0");

     include('db.php');

      $query = "SELECT * FROM inventario_excel ORDER BY  cod_pro ASC";
      $result = mysqli_query($conn, $query);
       


?>
<table border="1">
    <tr>
        <th style='background:#CCC; color:#000'>C&oacute;digo de grupo de Inventario</th>
        <th style='background:#CCC; color:#000'>C&oacute;digo de Producto</th>
        <th style='background:#CCC; color:#000'>Nombre del Producto</th>
    </tr>
    <?php
     while ($row = mysqli_fetch_assoc($result)) {
        ?>
    <tr>
        <td  style="mso-number-format:'000';"><?php echo utf8_decode($row['cod_inv']); ?></td>
        <td  style="mso-number-format:'0000000';"><?php echo utf8_decode($row['cod_inv'].$row['cod_pro']);?></td>
        <td><?php echo utf8_decode($row['nom_pro']); ?></td>
    </tr>
    <?php } ?>
</table>
<?php
   date_default_timezone_set('America/Bogota');
 
   $fecha = date("d-m-Y H:i:s");
    
   
   header('Content-type: application/vnd.ms-excel');
   header("Content-Disposition: attachment; filename=categoriasMundoModa_$fecha.xls"); 
   header("Pragma: no-cache");
   header("Expires: 0");
     include('db.php');

      $query = "SELECT * FROM category ORDER BY  code ASC";
      $result = mysqli_query($conn, $query);
       


?>
<table border="1">
    <tr>
        <th  style='background:#CCC; color:#000; '>C&oacute;digo</th>
        <th  style='background:#CCC; color:#000; '>Categoria</th>
    </tr>
    <?php
     while ($row = mysqli_fetch_assoc($result)) {
        ?>
    <tr>
        <td  style="mso-number-format:'000';"><?php echo utf8_decode($row['code']); ?></td>
        <td ><?php echo utf8_decode($row['category']);?></td>
    </tr>
    <?php } ?>
</table>
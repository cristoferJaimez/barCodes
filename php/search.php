<?php 
    include('db.php');

    

    //pagination
      $limit=5;
     
      $pag=(int)$_GET['pag'];
      if($pag<1){
          $pag=1;
      }
      
    
      $offset = ($pag-1)*$limit;
      
      $query = "SELECT id, cod_inv, cod_pro, nom_pro, pro_price, quantity FROM inventario_excel ORDER BY CONCAT( cod_inv,cod_pro) DESC LIMIT $offset, $limit";



    $tmp="";
    $tex = $_GET['text'];


    if($_GET['text'] != ""){
        $query = "SELECT id, cod_inv, cod_pro, nom_pro, pro_price, quantity FROM inventario_excel  
                  WHERE nom_pro  LIKE '%".$tex."%'";
    }

    $tmp = "
    <div class='card'>
     <div class='card-body'>
    <table   class='table table-sm  table-striped'>
            <tr>
            <th>Codigo Grupo de Inventario</th>
            <th>Codigo del Producto</th>
            <th>Descripci&oacute;n del Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th></th>
            </tr>";
            
            $result = mysqli_query($conn, $query);
                $rowsSql = "SELECT * FROM inventario_excel ";
                $res_rows = mysqli_query($conn, $rowsSql);
                    $rows = mysqli_num_rows($res_rows); 
                while ($row = mysqli_fetch_array($result)) {
                   
                    $tmp.= "<tr>
                            <td>".$row["cod_inv"]."</td>
                            <td>".$row["cod_inv"].$row["cod_pro"]."</td>
                            <td>".$row["nom_pro"]."</td>
                            <td>COP ".$row["pro_price"]."</td>
                            <td>".$row["quantity"]."</td>
                            <td>
                            <a href='php/barCode.php?cod_inv=".$row["cod_inv"]."&cod_pro=".$row['cod_pro']."&id=".$row['id']."'><i class='btn btn-primary fas fa-print'></i></a>
                            <a href='php/update.php?id=".$row["id"]."'><i class='btn btn-info far fa-edit'></i></a>
                            <a href='php/delete.php?id=".$row["id"]."'><i class='btn btn-danger far fa-trash-alt'></i></a>
                            </td>

                          </tr>
                         
                          ";
                }

           $tmp.="</table>
                    </div>
                    </div>
           ";
           
         
           $total_pag = ceil($rows/$limit);
           $link = array(); 
          
           for($i=1; $i<=$total_pag;$i++){
                 $link[]= "<a href=\"?pag=$i\"  class='btn btn-outline-secondary mt-2 '>$i</a>";
           }
           
         
           $tmp.= ' '.implode("",$link);
          


        
        echo $tmp;   


?>


                      
                           
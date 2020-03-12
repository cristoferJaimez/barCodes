<?php 
    include('db.php');
   $store = $_SESSION['id'];
    

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


      //tienda

        $res = $conn->prepare("SELECT  * FROM inventario_excel WHERE (store = ?) and ( CONCAT(cod_inv,cod_pro) like ? or nom_pro LIKE ? or pro_price like ?)");
        // $res->bindParam(':cod',"%$tex%", PDO::PARAM_INT);
        // $res->bindParam(':nom',"%$tex%", PDO::PARAM_STR);
        $res->execute(array("$store","%$tex%","%$tex%","%$tex%"));
      

        if (!$res->rowCount() == 0) 
{
  echo '<table class="table table-sm table-striped table-responsive">
  <tr>
  <th>Codigo del Producto</th>
  <th>Descripci&oacute;n del Producto</th>
  <th>Precio</th>
  <th>Cantidad</th>
  <th></th>
  </tr>';

    while ($results = $res->fetch()) 
    {
       echo "<tr class='bg-success text-white'>
  
     <td>".$results["cod_inv"].$results["cod_pro"]."</td>
     <td>".$results["nom_pro"]."</td>
     <td>COP ".$results["pro_price"]."</td>
     <td>".$results["quantity"]."</td>
     <td>
     <a href='barCode.php?cod_inv=".$results["cod_inv"]."&cod_pro=".$results['cod_pro']."&id=".$results['id']."'><i class='btn btn-primary fas fa-print'></i></a>
     <a href='update.php?id=".$results["id"]."'><i class='btn btn-info far fa-edit'></i></a>
     <button type='button'  class='product-delete btn btn-danger'><i class='far fa-trash-alt'></i></button
     </td>

   </tr>
  
   ";  

       
    } 
    echo "</table>";      
} 
else 
{
    echo '<div class= "p-3 mb-2 bg-danger text-white text-center "> Sin Resultados...</div>';
}

  }

    $tmp = "
    <div class='card'>
     <div class='card-body'>
    <table   class='table table-sm  table-striped '>
            <tr>
          
            <th>Codigo del Producto</th>
            <th>Descripci&oacute;n del Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th></th>
            </tr>";
            
            $query = "SELECT * FROM inventario_excel where store = '$store' ";
            $result = $conn->query($query);

                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                   
                    $tmp.= "<tr productid=".$row["id"].">
                            <td>".$row["cod_inv"].$row["cod_pro"]."</td>
                            <td>".$row["nom_pro"]."</td>
                            <td>COP ".$row["pro_price"]."</td>
                            <td>".$row["quantity"]."</td>
                            <td>
                            <a href='barCode.php?cod_inv=".$row["cod_inv"]."&cod_pro=".$row['cod_pro']."&id=".$row['id']."'><i class='btn btn-primary fas fa-print'></i></a>
                            <a href='update.php?id=".$row["id"]."'><i class='btn btn-info far fa-edit'></i></a>
                            <button type='button'  class='product-delete btn btn-danger'><i class='far fa-trash-alt'></i></button>
                            </td>

                          </tr>
                         
                          ";
                }

           $tmp.="</table>
                    </div>
                    </div>
           ";
           
         
           $total_pag = ceil($row/$limit);
           $link = array(); 
          
           for($i=1; $i<=$total_pag;$i++){
                 $link[]= "<a href=\"?pag=$i\"  class='btn btn-outline-secondary mt-2 '>$i</a>";
           }
           
         
           $tmp.= ' '.implode("",$link);
          


        
        echo $tmp;   


?>



                      
                           
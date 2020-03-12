<?php
include('../includes/headerTwo.php');
if(isset($_GET['id'])){
   
      $id = $_GET['id'];

        $query = "SELECT * FROM inventario_excel WHERE id=$id";
        $result = $conn->query($query);
          
          while($row = $result->fetch(PDO::FETCH_ASSOC)){
              $idT = $row['id'];
              $nom_pro = $row['nom_pro'];
              $cod_inv = $row['cod_inv'];
              $cod_pro =  $row['cod_pro'];
              $pro_price_cost =$row['price_cost'];
              $pro_price =$row['pro_price'];
              $quantity = $row ['quantity'];
          }

  
}else{
  
}


if(isset($_POST['update_product'])){

    $id = $_GET['id'];
    $nom_pro =  $_POST['nom_pro'];
    $pro_price =  $_POST['pro_price'];
    $pro_price_cost =  $_POST['price_cost'];
    $quantity = $_POST['quantity'];

      $consulta = "UPDATE inventario_excel  SET nom_pro =:nom_pro, price_cost = :price_cost, pro_price = :pro_price, quantity = :quantity WHERE id = :id";
        $pdoRes = $conn->prepare($consulta);
        
        $pdoExc = $pdoRes->execute(array(":nom_pro"=>$nom_pro,":price_cost"=>$pro_price_cost,":pro_price"=>$pro_price,":quantity"=>$quantity,":id"=>$id));

         
        if ($pdoExc) { ?>
        <div class="container p-4">
                <div class="alert alert-success" role="alert">
                Actualizacion realizada... <i class="far fa-smile-beam"></i>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
                 </button>
               </div>
               </div>      
        <?php }else{ ?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
              Problemas al intentar actualizaci&oacute;n...<i class="far fa-sad-cry"></i>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
                 </button>
               </div>
       
       <?php }

       
 

        
}else{

}

?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   
<div class="container p-4">
              <div class="card">
                <div class="card-body">
                  <form action="update.php?id=<?php echo $id; ?>" method="POST">
                  <label for="name_product">codigo</label>
                                    <input type="text" value="<?php echo $cod_inv; ?>" class="form-control" disabled>
                                    <label for="name_product">Codigo del Producto</label>
                                    <input type="text" value="<?php echo $cod_inv.$cod_pro; ?>" class="form-control" disabled>
                                    <label for="name_product">Descripci&oacute;n del Producto</label>
                                    <input type="text" name="nom_pro" class="form-control" value="<?php  echo $nom_pro; ?>" placeholder="Ingrese precio del producto" required>
                                    <label for="name_product">Precio Costo de Compra del Producto</label>
                                    <input type="text" name="price_cost" class="form-control" value="<?php echo $pro_price_cost; ?>" placeholder="Ingrese nombre del producto" required>
                
                                    <label for="name_product">Precio del Producto Venta</label>
                                    <input type="text" name="pro_price" class="form-control" value="<?php echo $pro_price; ?>" placeholder="Ingrese nombre del producto" required>
                                    <label for="name_product">Cantidad de Productos</label>
                                    <input type="text" name="quantity" class="form-control" value="<?php echo $quantity;  ?>" placeholder="Ingrese cantidad de productos" required>
                                </div> 
                              <button name="update_product" class="btn btn-primary">Actualizar <i class="fas fa-edit"></i></button>
                  </form>
                </div>
              </div>
</div>


<script src="https://kit.fontawesome.com/295af17a76.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 
 

<?php
include('db.php');
  if(isset($_GET['id'])){
       $id = $_GET['id'];

        $query ="SELECT * FROM inventario_excel WHERE id=$id";
        $result = mysqli_query($conn, $query);
         
     
      if(mysqli_num_rows($result)==1){
         $row = mysqli_fetch_array($result);
         $id = $row['id'];
         $code = $row['cod_inv'];
         $codeTwo = $row['cod_pro'];
         $description = $row['nom_pro'];
      }              
            

         
  }else{
}

   if(isset($_POST['update_product'])){
    $id = $_GET['id'];
    $newInfo = $_POST['new'];

      $query = "UPDATE  inventario_excel set nom_pro ='$newInfo' WHERE id = $id ";
      mysqli_query($conn, $query);
      $_SESSION['msm'] = "Actualizado  con exito...";
      $_SESSION['logo'] = "<i class='fas fa-smile-beam'></i>";
      $_SESSION['color'] = "info";
      header("location:../index.php");
   }else{}

?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   
<div class="container p-4">
              <div class="card">
                <div class="card-body">
                  <form action="update.php?id=<?php echo $id;?>" method="POST">
                  <label for="name_product">codigo</label>
                                    <input type="text" value="<?php echo $code; ?>" class="form-control" disabled>
                                    <label for="name_product">Codigo del Producto</label>
                                    <input type="text" value="<?php echo $code.$codeTwo; ?>" class="form-control" disabled>
                                    <label for="name_product">Descripci&oacute;n del Producto</label>
                                    <input type="text" name="new" class="form-control" value="<?php echo $description; ?>" placeholder="Ingrese nombre del producto" required>
                                </div> 
                              <button name="update_product" class="btn btn-primary">Actualizar <i class="fas fa-edit"></i></button>
                  </form>
                </div>
              </div>
</div>


<script src="https://kit.fontawesome.com/295af17a76.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
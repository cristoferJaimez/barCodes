<?php
include('db.php');
include('../includes/headerTwo.php');
if(isset($_GET['id'])){
   
      $id = $_GET['id'];

        $query = "SELECT * FROM category WHERE id=$id";
        $result = $conn->query($query);
          
          while($row = $result->fetch(PDO::FETCH_ASSOC)){
              $id = $row['id'];
              $code = $row['code'];
              $category = $row['category'];
              
          }

  
}else{
  
}


if(isset($_POST['update_category'])){

    $id = $_GET['id'];
    $category =  $_POST['category'];
   

      $consulta = "UPDATE category  SET category =:category WHERE id = :id";
        $pdoRes = $conn->prepare($consulta);
        
        $pdoExc = $pdoRes->execute(array(":category"=>$category,":id"=>$id));

         
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
                  <form action="update_category.php?id=<?php echo $id; ?>" method="POST">
                  <label for="code">codigo</label>
                                    <input type="text" value="<?php echo $code; ?>" class="form-control" disabled>
                                    <label for="category">Categoria</label>
                                    <input type="text" name="category" class="form-control" value="<?php  echo $category; ?>" placeholder="Ingrese precio del producto" required>
                                   
                                </div> 
                              <button name="update_category" class="btn btn-primary">Actualizar <i class="fas fa-edit"></i></button>
                  </form>
                </div>
              </div>
</div>


<script src="https://kit.fontawesome.com/295af17a76.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
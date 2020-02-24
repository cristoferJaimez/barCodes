<?php include("php/db.php") ?>
<?php include("includes/header.php") ?>



   

<div class="container p-4">
        <?php if(isset($_SESSION['msm'])){ ?>
            <div class="alert alert-<?php echo $_SESSION['color']; ?>" role="alert">
                <?php echo $_SESSION['msm'].$_SESSION['logo'];  ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
 </div>               
        
                <?php session_unset(); }?>

        <form action="php/save.php" method="POST">
        <div class="container p-4">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <label for="category">Categoria</label>
                                <select name="category" class="form-control">
                                         <option selected>Seleccione...</option>
                                         <?php 
                                    $query = "SELECT * FROM category ORDER BY  category ASC";
                                    $result = mysqli_query($conn, $query);
                                     
                                     while($row = mysqli_fetch_array($result)){

                                 ?>
                                     <option value="<?php echo $row['code'];?>"><?php echo $row['category'];?></option>
                                     <?php }?>
                                </select>
                            </div>
                        <div class="card-footer"><p>Seleccione prenda a inventariar</div>
                    </div>
           
                
                </div>   
                <div class="col-md-6">
                    <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                <label for="name_product">Descripci&oacute;n del Producto</label>
                                    <input type="text" name="name_product" class="form-control" placeholder="Ingrese nombre del producto" required>
                                </div> 
                                <input type="submit" class="btn btn-success" name="save_product" value="Guardar">
                            </div>
                            <div class="card-footer"><p>Descripcion del Producto
                                  
                            </p></div>
                    </div>    
             
           
            </div>
         
            <div class="col-md-12">
            <p><a href="php/xls.php" class=" btn btn-primary">  EXCEL <i class="fas fa-file-excel"></i></a> </p>
            
                <div class="card">
                
                     <div class="card-body">
                        <table class="table  table-striped table-sm">
                            <thead>
                                <th>Codigo Grupo de Inventario</th>
                                <th>Codigo del Producto</th>
                                <th>Nombre del Producto</th>
                                <th></th>
                            </thead>
                            <tbody>
                                 <tr>
                                 <?php 
                                    $query = "SELECT * FROM inventario_excel ORDER BY  cod_pro DESC";
                                    $result = mysqli_query($conn, $query);
                                     
                                     while($row = mysqli_fetch_array($result)){

                                 ?>
                                     
                                     <td><?php echo $row['cod_inv']; ?></td>
                                     <td><?php echo $row['cod_inv'].$row['cod_pro']; ?></td>
                                     <td><?php echo $row['nom_pro']; ?></td>
                                     <td>
                                            <a href="php/update.php?id=<?php echo $row['id']?>" class="btn btn-info" title="Editar" name="update"><i class="far fa-edit"></i></a>
                                            <a href="php/delete.php?id=<?php echo $row['id']?>" class="btn btn-danger" title="Borrar" name="delete"><i class="far fa-trash-alt"></i></a>
                                     </td>
                                 </tr>
                                <?php }?>
                            </tbody>
                        </table>
                     </div>
                </div>
              

            </div>
         
        </div>

        
           
        </div>

        <div class="container">
           
        </div>
     
        </form>

    

<!-- Modal -->
<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="categoryModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear Nueva Categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="php/save.php" method="POST" >
        <div class="form-group">
             <label for="name_product">Codigo</label>
                      <?php 
                          $query ="SELECT * FROM category ORDER BY  code ASC";
                          $result = mysqli_query($conn, $query);
                          while (  $row = mysqli_fetch_array($result)){
                            $code = $row['code']+1;
                           
                          }
                          switch ($code) {
                            case $code ==="" :
                              ?>
                               <input type="text" name="code" class="form-control d-none" value="<?php echo "001" ?>" placeholder="Nueva Categoria">
                               <b><?php echo "001" ?></b>
                              <?php 
                           break;
                            case $code <10:
                                 ?>
                                  <input type="text" name="code" class="form-control d-none" value="<?php echo "00".$code ?>" placeholder="Nueva Categoria">
                                  <b><?php echo "00".$code ?></b>
                                 <?php 
                              break;
                            case $code>10 and $code <100:
                                ?>
                                <input type="text" name="code" class="form-control d-none" value="<?php echo "0".$code?>" placeholder="Nueva Categoria">
                                <b><?php echo "0".$code ?></b>
                               <?php 
                             break;  
                            
                            default:
                            ?>
                            <input type="text" name="code" class="form-control d-none" value="<?php echo $code?>" placeholder="Nueva Categoria">
                            <b><?php echo $code ?></b>
                           <?php 
                              break;
                          }
                         
                      ?>
                   
        </div> 
        <div class="form-group">
             <label for="name_product">Nueva Categoria</label>
                    <input type="text" name="new" class="form-control" placeholder="Nueva Categoria" required>
        </div>                      
        
      </div>

      <div class="modal-footer">
       
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" name="new_category" class="btn btn-primary">Guardar</button>
      </div>
      </form>
    </div>
  </div>
</div>



<!-- Modal list category -->

<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
 
      
     <div class="modal-content">
     <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><p><a href="php/xls2.php" class=" btn btn-primary">  EXCEL <i class="fas fa-file-excel"></i></a></p></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="card">
                     <div class="card-body">
                        <table class="table  table-striped table-sm">
                            <thead>
                                <th>Codigo</th>
                                <th>Categoria</th>
                                <th></th>
                                <th></th>
                            </thead>
                            <tbody>
                                 <tr>
                                 <?php 
                                    $query = "SELECT * FROM category ORDER BY  code ASC";
                                    $result = mysqli_query($conn, $query);
                                     
                                     while($row = mysqli_fetch_array($result)){

                                 ?>
                                     <td><?php echo $row['code']; ?></td>
                                     <td><?php echo $row['category']; ?></td>
                                     <td></td>
                                     <td>
                                            <a href="php/edit_category.php?id=<?php echo $row['id']?>" class="btn btn-info" title="Editar"><i class="far fa-edit"></i></a>
                                            <a href="php/delete_category.php?id=<?php echo $row['id']?>" class="btn btn-danger" title="Borrar" name="delete_category"><i class="far fa-trash-alt"></i></a>
                                     </td>
                                 </tr>
                                <?php }?>
                            </tbody>
                        </table>
                     </div>
                </div>
              
      
    </div>
  </div>
</div>
<?php include("includes/footer.php") ?>
 
<?php include("php/db.php") ?>
<?php include("includes/header.php") ?>



   

<div class="container p-1">
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
                               
                                <label for="name_product">Precio</label>
                                    <input type="number" name="price_product" class="form-control" placeholder="Ingrese precio del producto" required>

                                    <label for="name_product">Cantidad</label>
                                    <input type="number" name="quantity_product" class="form-control" placeholder="cantidad de productos" required>
                                </div> 
                                
                                <input type="submit" class="btn btn-success btn-block" name="save_product" value="Guardar">
                            </div>
                            <div class="card-footer"><p>Descripcion del Producto</p></div>
                    </div>    
             
           
            </div>
         
            <div class="col-md-12">
              
   
              <br/>
              <form>
              <div class="row">
                <div class="col-md-2">
                <a href="php/xls.php" class=" btn btn-primary">  EXCEL <i class="fas fa-file-excel"></i></a>
                </div>
                <div class="col-md-4">
                <!-- <nav aria-label="Page navigation example">
                      <ul class="pagination">
                        <li class="page-item">
                          <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                          </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                          <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                          </a>
                        </li>
                      </ul>
                    </nav> -->
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" placeholder="Buscador" id="formulario">
                  </div>
              </div>
            </form>
            <br/>           
              
               
                                      
                <div class="card">
                
                     <div class="card-body">
                        <table class="table table-sm  table-striped ">
                            <thead>
                                <th>Codigo Grupo de Inventario</th>
                                <th>Codigo del Producto</th>
                                <th>Descripci&oacute;n del Producto</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th></th>
                            </thead>
                            <tbody class=" ">
                                 <tr>
                                 <?php 
                                    $query = "SELECT * FROM inventario_excel ORDER BY  cod_pro DESC";
                                    $result = mysqli_query($conn, $query);
                                     
                                     while($row = mysqli_fetch_array($result)){

                                 ?>
                                     
                                     <td><?php echo $row['cod_inv']; ?></td>
                                     <td><?php echo $row['cod_inv'].$row['cod_pro']; ?></td>
                                     <td><?php echo $row['nom_pro']; ?></td>
                                     <td>COP <?php echo $row['pro_price']; ?></td>
                                     <td><?php echo $row['quantity']; ?></td>
                                     <td>
                                     
                                            <a href="php/barCode.php?cod_inv=<?php echo $row['cod_inv'];?>&cod_pro=<?php echo $row['cod_pro']; ?>"  class="btn btn-primary" title="imprimir" name="print"><i class="fas fa-print"></i></a>
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
                          if($code === ""){
                            $valor = 001;
                            }else if($code < 10){
                              $valor =   "00".$code;
                           }else if($code >= 10){
                              $valor =   "0".$code;
                           }else if($code >= 100){
                              $valor =  $code;
                         }
                      ?>

                                 <input type="text" name="code" class="form-control d-none" value="<?php echo $valor;?>" placeholder="Nueva Categoria">
                                  <b><?php echo $valor;?></b>
                   
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



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<?php include("includes/footer.php") ?>
 
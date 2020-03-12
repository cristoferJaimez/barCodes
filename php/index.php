<?php include('db.php');

//  echo $_SESSION['id'];
?>

<?php require("../includes/header.php");

?> 

<input class ="invisible" type="number" id="pag"  value="<?php 
  if(!isset($_GET['pag'] )){
     
  }else{
    echo $_GET['pag']; 
  }

?>"  onkeyup=" search();"/>
<div class="container" id="info_save"></div>   
<div class="container" id="product_delete"></div>         
        

        <form id="newProduct">
        <div class="container p-4">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <label for="category">Categoria</label>
                                
                              <div id="options">Sin categorias</div>
                                        
                                
                            </div>
                        <div class="card-footer"><p>Seleccione prenda a inventariar</div>
                    </div>
           
                
                </div>   
                <div class="col-md-6">
                    <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                <label for="name_product">Descripci&oacute;n del Producto</label>
                                    <input type="text" name="name_product" id="name_product" class="form-control" placeholder="Ingrese nombre del producto" required>
                               
                                    <label for="name_product">Precio de Costo </label>
                                    <input type="number" name="price_product_cost" id="price_product_cost" class="form-control" placeholder="precio de costo del producto" required>


                                <label for="name_product">Precio de Venta</label>
                                    <input type="number" name="price_product" id="price_product" class="form-control" placeholder="precio del producto" required>

                                    <label for="name_product">Cantidad</label>
                                    <input type="number" name="quantity_product" id="quantity_product" class="form-control" placeholder="cantidad de productos" required>
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
                <div class="col-md-4">
                <a href="xls.php" class=" btn btn-primary">  <i class="fas fa-file-excel"></i> EXCEL Importaci&oacute;n</a>
                </div>
                <div class="col-md-4">
                <a href="xls2.php" class=" btn btn-primary"> <i class="fas fa-file-excel"></i>  EXCEL Saldo Inicial</a>
                </div>
                <div class="col-md-4">
                  <input type="text" class="form-control" placeholder="Buscador" id="formulario" onkeyup=" search();">
                  </div>
              </div>
            </form>
            <br/>           
              
               <div id="searching">
              
               </div>
                                   
             
          
        </div>
                          
        
           
        </div>

       
     
        </form>

    


<!-- modal seleccionar tienda -->
<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Categorias</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="container">
    <div id="info_category" class="mt-4"></div>
    <div id="category_delete" class="mt-4"></div>
    <div class="row">
  <div class="col-sm-4">
    <div class="card mt-4">
    <div class="card-header">Nueva Categoria</div>
      <div class="card-body">
      <form id="form_category">
  
          <div class="form-group">
            <label for="category">Nueva Categoria</label>
            <input type="text" class="form-control" id="newcategory" placeholder="Nueva Categoria" required>
          </div>
          
          <button type="submit" class="btn btn-success btn-block">Guardar</button>
      </form>
      </div>
    </div>
  </div>
  <div class="col-sm-8">
    <div class="card mt-4 mb-4">
      <div class="card-body">
      <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Cod_inv</th>
      <th scope="col">Categoria</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody id="categorys"></tbody>
  
  </table>
      </div>
    </div>
  </div>
</div>
    </div>
    <div class="modal-footer">
   
      </div>
    </div>
  </div>
</div>



<?php include("../includes/footer.php") ?>
 
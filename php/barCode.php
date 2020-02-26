
<?php include('db.php');
 include('../includes/headerTwo.php'); ?>


<script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.0/dist/JsBarcode.all.min.js"></script>


       


<div class="container p-4">

   <div class="card">
   <div class="card-header oculto-impresion">
   
   <i class="fas fa-barcode"></i><b>  <?php echo $_GET['cod_inv'].$_GET['cod_pro']; ?></b> 
   
               
               
                <button onclick="print()" class="btn btn-primary float-right " title="imprimir"> <i class="fas fa-print"></i></button>

  </div>
        <div class="crad-body ">
        <div class="container">
        <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-8">
            <table  class="p-4 d-flex align-content-start flex-wrap">
                <?php for($a = 0; $a < 5; $a++){ ?>
                
                <tr>
                    <td>
                        <table class="">
                            <tr>
                            <td class=""> <img src="../img/logo.jpg"  width="15px" height="15px"  class="rounded"/><small> Mundo Moda y Hogar </small></td>
                            </tr>
                            <tr>
                            <td><img id="codigo" data-value='<?php echo $_GET['cod_inv'].$_GET['cod_pro']; ?>'/></td>
                            </tr>
                            <tr>
                            <td class="text-center font-weight-light h6"><code> <?php echo date('m'. "    " .'y'); ?></code> </td></td>
                            </tr>
                        </table>
                    </td>

                    <td>
                        <table class="">
                            <tr>
                            <td class=""> <img src="../img/logo.jpg"  width="15px" height="15px"  class="rounded"/><small> Mundo Moda y Hogar </small></td>
                            </tr>
                            <tr>
                            <td><img id="codigo" data-value='<?php echo $_GET['cod_inv'].$_GET['cod_pro']; ?>'/></td>
                            </tr>
                            <tr>
                            <td class="text-center font-weight-light h6"><code> <?php echo date('m'. "    " .'y'); ?></code> </td></td>
                            </tr>
                        </table>
                    </td>

                    <td>
                        <table class="">
                            <tr>
                            <td class=""> <img src="../img/logo.jpg"  width="15px" height="15px"  class="rounded"/><small> Mundo Moda y Hogar </small></td>
                            </tr>
                            <tr>
                            <td><img class="rounded mx-auto d-block" id="codigo" data-value='<?php echo $_GET['cod_inv'].$_GET['cod_pro']; ?>'/></td>
                            </tr>
                            <tr>
                            <td class="text-center font-weight-light h6"><code> <?php echo date('m'. "    " .'y'); ?></code> </td></td>
                            </tr>
                          
                        </table>
                        
                    </td> 
                    
                </tr>
                <?php } ?>    
            </table>
            </div>
            <div class="col-md-1"></div>  
            </div>
         </div>   
        </div>
        <div class="card-footer oculto-impresion">
                
        </div>
   </div> 


</div>


        

<?php
         

         if(isset($_GET['cod_inv'])){

             $cod_inv = $_GET['cod_inv'];
             $cod_pro = $_GET['cod_pro'];

              
               $query = "SELECT * FROM  inventario_excel WHERE cod_inv=$cod_inv and cod_pro=$cod_pro";
               $result = mysqli_query($conn, $query);

               

               if(mysqli_num_rows($result)==1){
                 $row = mysqli_fetch_array($result);
                 $code = $row['cod_inv'];
                 $codeTwo = $row['cod_pro'];
                 $nom_producto = $row['nom_pro'];
                 
              } else{
                  
              }             
                

 

         }else{
             echo "no exite";
         }

      

        echo ""?><script>JsBarcode("#codigo")
        .options({
            format: "CODE128",// El formato
            width: 1.3, // La anchura de cada barra
            height: 35, // La altura del código
            displayValue: true, // ¿Mostrar el valor (como texto) del código de barras?
            text: "<?php echo $nom_producto; ?>", // Texto (no código) que acompaña al barcode
            fontOptions: "bold", // Opciones de la fuente del texto del barcode
            textAlign: "center", // En dónde poner el texto. center, left o right
            textPosition: "top", // Poner el texto arriba (top) o abajo (bottom)
            textMargin: 2, // Margen entre el texto y el código de barras
            fontSize: 8, // Tamaño de la fuente
            background: "#ffffff", // Color de fondo
            lineColor: "#000000", // Color de cada barra
            marginTop: 1, // Margen superior
            marginRight: 35, // Margen derecho
            marginBottom: 1, // Margen inferior
            marginLeft: 25, // Margen izquierdo
        })
        .init();</script> <?php 

       include('../includes/footer.php');

?>
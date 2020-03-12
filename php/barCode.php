<?php 
 include('../includes/headerTwo.php'); 
 
    $id_pro = $_GET['id'];

 $query = "SELECT * FROM inventario_excel WHERE id = $id_pro";
 $result = $conn->query($query);

    while($row = $result->fetch(PDO::FETCH_ASSOC)){

            $nom_producto =  $row['nom_pro'];
    }
 
 
 ?>


<script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.0/dist/JsBarcode.all.min.js"></script>


       


<div  class="cuadro container p-4">

   <div class="card">
   <div class="card-header oculto-impresion">
   
   <i class="fas fa-barcode"></i><b>  <?php echo $_GET['cod_inv'].$_GET['cod_pro']; ?> </b> 
   
               
               
                <button onclick="print()" class="btn btn-primary float-right " title="imprimir"> <i class="fas fa-print"></i></button>

  </div>
        <div class="crad-body">
        <div class="container-fluid">
        <div class="row">
        
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <table  class="p-4 d-flex ">
                <?php for($a = 0; $a < 5; $a++){ ?>
                
                <tr>
                    <td>
                        <table class="">
                            <tr>
                            <td  class="text-uppercase text-dark row justify-content-center  " style="font-size:11px;">  <small class="text"> <?php echo $nom_producto;?></small></td>
                            </tr>
                            <tr>
                            <td><img id="codigo" data-value='<?php echo $_GET['cod_inv'].$_GET['cod_pro']; ?>'/></td>
                            </tr>
                            <tr>
                            <td class=" text-dark text-dark row justify-content-center  "><code class=" text-dark  mb-4 "> <?php echo date('m'. "    " .'y'); ?></code> </td></td>
                            </tr>
                        </table>
                    </td>

                    <td>
                        <table class="">
                            <tr>
                            <td class="text-uppercase text-dark row justify-content-center " style="font-size:11px;">  <small class="text"> <?php echo $nom_producto;?> </small></td>
                            </tr>
                            <tr>
                            <td><img id="codigo" data-value='<?php echo $_GET['cod_inv'].$_GET['cod_pro']; ?>'/></td>
                            </tr>
                            <tr>
                            <td scope="col" class=" text-dark"><code class=" text-dark text-dark row justify-content-center   mb-4 "> <?php echo date('m'. "    " .'y'); ?></code> </td></td>
                            </tr>
                        </table>
                    </td>

                    <td>
                        <table class="">
                            <tr class="">
                            <td class="text-uppercase text-dark row justify-content-center "style="font-size:11px;" > <small class="text"> <?php echo $nom_producto;?> </small></td>
                            </tr>
                            <tr>
                            <td><img class="rounded mx-auto d-block" id="codigo" data-value='<?php echo $_GET['cod_inv'].$_GET['cod_pro']; ?>'/></td>
                            </tr>
                            <tr>
                            <td  ><code class=" text-dark row justify-content-center  mb-4 "><?php echo date('m'. "    " .'y'); ?></code> </td></td>
                            </tr>
                          
                        </table>
                        
                    </td> 
                    
                </tr>
                <?php } ?>    
            </table>
            </div>
            
            </div>
         </div>   
        </div>
        
   </div>
   <div class="col-md-2"> </div>


</div>


        

<?php
         

         if(isset($_GET['cod_inv'])){

             $cod_inv = $_GET['cod_inv'];
             $cod_pro = $_GET['cod_pro'];

              
               $query = "SELECT * FROM  inventario_excel WHERE cod_inv=$cod_inv and cod_pro=$cod_pro";
               $result = $conn->query($query);

               
                  while($row = $result->fetch(PDO::FETCH_ASSOC)){  
    
                 $code = $row['cod_inv'];
                 $codeTwo = $row['cod_pro'];
                 $nom_producto = $row['nom_pro'];

               }
                 
         }

 

       

      

        echo ""?><script>JsBarcode("#codigo")
        .options({
            format: "CODE128",// El formato
            width: 1.5, // La anchura de cada barra
            height: 40, // La altura del código
            displayValue: true, // ¿Mostrar el valor (como texto) del código de barras?
            text: "Mundo Moda y Hogar", // Texto (no código) que acompaña al barcode
            fontOptions: "bold", // Opciones de la fuente del texto del barcode
            textAlign: "center", // En dónde poner el texto. center, left o right
            textPosition: "top", // Poner el texto arriba (top) o abajo (bottom)
            textMargin: 1, // Margen entre el texto y el código de barras
            fontSize: 9, // Tamaño de la fuente
            background: "#ffffff", // Color de fondo
            lineColor: "#000000", // Color de cada barra
            marginTop: -1, // Margen superior
            marginRight: 13, // Margen derecho
            marginBottom: 1, // Margen inferior
            marginLeft: 13 , // Margen izquierdo
        })
        .init();</script> <?php 

       include('../includes/footer.php');

?>
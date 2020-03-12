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


<!-- Inicio impresion -->

<div class="cuadro orden">
    <table  class="tbl-principal">
        <?php for($a = 0; $a < 1; $a++){ 
            if(strlen($nom_producto) > 30){
                $nom_producto = substr($nom_producto, 0, 30);
                $nom_producto .= "...";
            }    
        ?>
        <tr>
            <td>
                <table class="tbl-etiqueta">
                    <tr>
                        <td><p><?php echo strtoupper($nom_producto);?></p></td>
                    </tr>
                    <tr>
                        <td><img id="codigo" data-value='<?php echo $_GET['cod_inv'].$_GET['cod_pro']; ?>'/></td>
                    </tr>
                    <tr>
                        <td scope="col"><code class=" text-dark row justify-content-center mb-4 "><?php echo date('m'. "    " .'y'); ?></code> </td></td>
                    </tr>
                </table>
            </td>
                    
            <td>
                <table class="tbl-etiqueta">
                    <tr>
                        <td><p><?php echo strtoupper($nom_producto);?></p></td>
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
                <table class="tbl-etiqueta">
                    <tr>
                        <td><p><?php echo strtoupper($nom_producto);?></p></td>
                    </tr>
                    <tr>
                        <td><img id="codigo" data-value='<?php echo $_GET['cod_inv'].$_GET['cod_pro']; ?>'/></td>
                    </tr>
                    <tr>
                        <td scope="col" class=" text-dark"><code class=" text-dark text-dark row justify-content-center   mb-4 "> <?php echo date('m'. "    " .'y'); ?></code> </td></td>
                    </tr>
                </table>
            </td>
            
        </tr>
        <?php } ?>    
    </table>
</div>

<!-- Fin impresion -->
        

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

 

       



      

        ?>
        <script>JsBarcode("#codigo").options({
            format: "CODE128",// El formato
            width: 2, // La anchura de cada barra
            height: 50, // La altura del código
            displayValue: false, // ¿Mostrar el valor (como texto) del código de barras?
            text: "", // Texto (no código) que acompaña al barcode
            fontOptions: "bold", // Opciones de la fuente del texto del barcode
            textAlign: "center", // En dónde poner el texto. center, left o right
            textPosition: "top", // Poner el texto arriba (top) o abajo (bottom)
            textMargin: 1, // Margen entre el texto y el código de barras
            fontSize: 12, // Tamaño de la fuente
            background: "#ffffff", // Color de fondo
            lineColor: "#000000", // Color de cada barra
            marginTop: -2, // Margen superior
            marginRight: 5, // Margen derecho
            marginBottom: 1, // Margen inferior
            marginLeft: 5 , // Margen izquierdo
        }).init();
        </script>
        <script src="../js/app.js" crossorigin="anonymous"></script> 
        <?php 

       include('../includes/footer.php');

?>

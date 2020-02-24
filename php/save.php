<?php 
        include('db.php');
       

                //new product

                if(isset($_POST['save_product'])){
                     $cod_inv = $_POST['category'];
                     $nom_pro = $_POST['name_product'];

                     $query = "SELECT * FROM  inventario_excel WHERE cod_inv='$cod_inv' ORDER BY  cod_pro ASC" ;
                     $result = mysqli_query($conn, $query);
             
                      while ($row = mysqli_fetch_assoc($result)) {
                             echo $cod_prod = $row['cod_pro']+1;
                      }
                       
                      
                         
                         if($cod_prod == ""){
                            $code = "0001";
                         }else if($cod_prod < 10){
                           $code = "000".$cod_prod;
                         }else if($cod_prod < 100){
                          $code = "00".$cod_prod;
                        }else if($cod_prod < 1000){
                          $code = "0".$cod_prod;
                        }else if($cod_prod < 10000){
                          $code = $cod_prod;
                        }
                           
                  
                      
                 

                        $query = "INSERT INTO inventario_excel(cod_inv,cod_pro,nom_pro) VALUES('$cod_inv','$code','$nom_pro')";
                        $result = mysqli_query($conn, $query);

                              if(!$result){
                                $_SESSION['msm'] = "Opss, no se pudo inventariar el producto...";
                                $_SESSION['logo'] = "<i class='fas fa-sad-cry'></i>";
                                $_SESSION['color'] = "danger";
                                header("location:../index.php");
                              }else{
                                  $_SESSION['msm'] = "Guardado con exito...";
                                  $_SESSION['logo'] = "<i class='fas fa-smile-beam'></i>";
                                  $_SESSION['table'] = "table-primary";
                                  $_SESSION['color'] = "success";
                                  header("location:../index.php"); 
                              }

               }


                //new category

                if(isset($_POST['new_category'])){
                     $code_category = $_POST['code'];
                     $name_category = $_POST['new'];


                       if(!isset($result)){

                      $query = "INSERT INTO category(code,category) VALUES('$code_category','$name_category')";
                      $result = mysqli_query($conn, $query);

                         if(!$result){
                            $_SESSION['msm'] = "Opss, no se pudo crear la nueva categoria...";
                            $_SESSION['logo'] = "<i class='fas fa-sad-cry'></i>";
                            $_SESSION['color'] = "danger";
                            header("location:../index.php");
                         }else{
                             $_SESSION['msm'] =  "Nueva Categoria creada con Exito...";
                             $_SESSION['logo'] = "<i class='fas fa-smile-beam'></i>";
                             $_SESSION['color'] = "success";
                             header("location:../index.php");
                         }
                        }else{

                        } 
                }
                
?>
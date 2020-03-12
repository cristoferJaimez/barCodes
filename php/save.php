<?php 
        include('db.php');
       
        $store = $_SESSION['id'];

                //new product

                if(isset($_POST['name_product'])){
                     $cod_inv = $_POST['category'];
                     $query = "SELECT * FROM  inventario_excel WHERE cod_inv='$cod_inv' and store ='$store' ORDER BY  cod_pro ASC" ;
                     $result = $conn->query($query);
             
                      while ($row = $result->fetch()) {
                              $cod_prod = $row['cod_pro']+1;
                      }
                       
                      switch ($store) {
                        case '1':
                          if($cod_prod == ""){
                            $codeA = "00001";
                         }else if($cod_prod < 10){
                           $codeA = "0000".$cod_prod;
                         }else if($cod_prod < 100){
                          $codeA = "000".$cod_prod;
                        }else if($cod_prod < 1000){
                          $codeA = "00".$cod_prod;
                        }else if($cod_prod < 10000){
                          $codeA = "0".$cod_prod;
                        }else{
                          $codeA = $cod_prod;
                        }
                          break;
                          case '2':
                            if($cod_prod == ""){
                              $codeA = "05000";
                           }else if($cod_prod < 10){
                             $codeA = "0500".$cod_prod;
                           }else if($cod_prod < 100){
                            $codeA = "050".$cod_prod;
                          }else if($cod_prod < 1000){
                            $codeA = "05".$cod_prod;
                          }else if($cod_prod < 10000){
                            $codeA = "0".$cod_prod;
                          }else{
                            $codeA = $cod_prod;
                          }
                           break;
                           case '3':
                            if($cod_prod == ""){
                              $codeA = "10000";
                           }else if($cod_prod < 10){
                             $codeA = "1000".$cod_prod;
                           }else if($cod_prod < 100){
                            $codeA = "100".$cod_prod;
                          }else if($cod_prod < 1000){
                            $codeA = "10".$cod_prod;
                          }else if($cod_prod < 10000){
                            $codeA = "1".$cod_prod;
                          }else{
                            $codeA = $cod_prod;
                          }
                           break;
                           case '4':
                            if($cod_prod == ""){
                              $codeA = "15000";
                           }else if($cod_prod < 10){
                             $codeA = "1500".$cod_prod;
                           }else if($cod_prod < 100){
                            $codeA = "150".$cod_prod;
                          }else if($cod_prod < 1000){
                            $codeA = "15".$cod_prod;
                          }else if($cod_prod < 10000){
                            $codeA = "1".$cod_prod;
                          }else{
                            $codeA = $cod_prod;
                          }
                           break;
                        
                        default:
                          echo "sin tienda";
                          break;
                      }
                         
                        //  if($cod_prod == ""){
                        //     $codeA = "00001";
                        //  }else if($cod_prod < 10){
                        //    $codeA = "0000".$cod_prod;
                        //  }else if($cod_prod < 100){
                        //   $codeA = "000".$cod_prod;
                        // }else if($cod_prod < 1000){
                        //   $codeA = "00".$cod_prod;
                        // }else if($cod_prod < 10000){
                        //   $codeA = "0".$cod_prod;
                        // }else{
                        //   $codeA = $cod_prod;
                        // }
                           
                  
                      
                 

                        $query = $conn->prepare("INSERT INTO inventario_excel(cod_inv,cod_pro,nom_pro,pro_price,quantity,store) VALUES(:cod_inv,:cod_pro,:nom_pro,:pro_price,:quantity,:store)");
                        echo $cod_inv = $_POST['category'];
                        echo $cod_pro = $codeA;
                        echo $nom_pro = $_POST['name_product'];
                        echo $pro_price =$_POST['price_product'];
                        echo $quantity = $_POST['quantity_product'];
                        if($query->execute(array(':cod_inv'=>$cod_inv,':cod_pro'=>$cod_pro,':nom_pro'=>$nom_pro,':pro_price'=>$pro_price,':quantity'=>$quantity,':store'=>$store)));

                        $_SESSION['msm'] = "Guardado con exito...";
                        $_SESSION['logo'] = "<i class='fas fa-smile-beam'></i>";
                        $_SESSION['table'] = "table-primary";
                        $_SESSION['color'] = "success";
                         header("location:index.php");
                             
                              }else{
                                  
                                   $_SESSION['msm'] = "Opss, no se pudo inventariar el producto...";
                                   $_SESSION['logo'] = "<i class='fas fa-sad-cry'></i>";
                                   $_SESSION['color'] = "danger";
                                    header("location:index.php");
                              }

               


                //new category

                if(isset($_POST['newCategory'])){
                   
                  $query2 ="SELECT * FROM category ORDER BY  code ASC";
                  $result2 = $conn->query($query2);
                  while (  $row2 = $result2->fetch(PDO::FETCH_ASSOC)){
                    
                    if(!$row2['code']){}else{
                    $code = $row2['code']+1;}
                  }
                  if(!$code){
                    
                    $valor = "001";
                    }else if($code < 10){
                      $valor =   "00".$code;
                   }else if($code >= 10){
                      $valor =   "0".$code;
                   }else if($code >= 100){
                      $valor =  $code;
                 }

                 
                       $code = $valor;
                       $category = $_POST['newCategory'];
                       $query = $conn->prepare("INSERT INTO category(code,category) VALUES(:code,:category)");
                    
                          
                         if(!$query->execute(array(':code'=>$valor, ':category'=>$category))) {
                          die('fail ajax');
                         }else{
                            echo "exelete trabajo";
                         }
                        
                }
                
?>
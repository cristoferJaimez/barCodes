<?php 
include('db.php');
   echo  $datos = $_POST['stores'];

   $query = "SELECT * FROM tiendas WHERE store_code = '$datos'";
   $result = $conn->query($query);

   while($row = $result->fetch(PDO::FETCH_ASSOC)){
       $_SESSION['stores'] = $row['store_name'];
       $_SESSION['id'] = $datos;
   }



    // $pors = explode(" ",$datos);

    // echo $_SESSION['stores']= $pors[1];
    // echo $_SESSION['id'] = $pors[0]; 
    header('location:index.php');
?> 
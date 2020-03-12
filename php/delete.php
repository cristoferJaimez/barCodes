<?php
   include('db.php');

   if(isset($_POST['id'])){
       $id =$_POST['id'];

         $result = $conn->exec("DELETE FROM inventario_excel WHERE id ='$id'");
         
           if(!$result){
            die('fallas al eliminar producto');
           }else{
            echo "eliminado";
           }   
   }
?>
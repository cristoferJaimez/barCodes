<?php 
include('db.php');
if(isset($_POST['id'])){
    $id =$_POST['id'];

      $result= $conn->exec("DELETE FROM category WHERE id ='$id'");
     
        if(!$result){
         die("problemas al eliminar");
        }else{
          echo "Delete ok...";
        }
    }
?>
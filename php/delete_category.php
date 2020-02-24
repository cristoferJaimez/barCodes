<?php 
include('db.php');
if(isset($_GET['id'])){
    $id =$_GET['id'];

      $query ="DELETE FROM category WHERE id ='$id'";
      $result = mysqli_query($conn, $query);
        if(!$result){
         $_SESSION['msm'] = "Opss, no se pudo Eliminar";
         $_SESSION['logo'] = "<i class='fas fa-sad-cry'></i>";
         $_SESSION['color'] = "danger";
         header("location:../index.php");
        }else{
         $_SESSION['msm'] = "Eliminado con exito...";
         $_SESSION['logo'] = "<i class='fas fa-smile-beam'></i>";
         $_SESSION['color'] = "success";
         header("location:../index.php");
        }
    }
?>
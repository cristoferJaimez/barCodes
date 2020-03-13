<?php include('db.php');?>
<!DOCTYPE html>
<html lang="es">
<head>
<title>Mundo Moda & Hogar</title>
    
    <link rel="icon" type="image/png" href="../img/logo.jpg" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title class="oculto-impresion">Mundo Moda y Hogar </title>
    <link rel="stylesheet" href="../css/app-print.css" media="print">

<!--
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>   
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
-->
    <script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="index.php">
          <img src="../img/logo.jpg" width="30" height="30" class="d-inline-block align-top" alt="">
           Mundo Moda y Hogar 
        </a>
        <ul class="btn-toolbar ">
            <!-- <li class="btn-group mr-2 mb-1 btn-group-sm"><button type="button" class="btn btn-dark" data-toggle="modal" data-target=".bd-example-modal-xl"><i class="fas fa-pen-square"></i></button></li> -->
             <li class="btn-group mr-2 btn-group-sm "><a href="index.php" class="btn btn-success"><?php echo  $_SESSION['stores'];  ?> <i class="fas fa-store-alt"></i></a></li>   
        </ul>
    </nav>
  
<?php 
session_start();

//************Cristofer*************
/*
$hosting ="localhost";
$user="root";
$pass="";
$db = "mundo_moda";
*/

//************Yorman*************
$hosting ="localhost";
$user="root";
$pass="root";
$db = "barcode_siigo";


//***********WEB*****************
// $hosting ="localhost";
// $usuario = "mundom_wp8";
// $pass = "Sj@Z9pg3.2";
// $db ="mundom_wp8";


try {
$conn = new PDO('mysql:host='.$hosting.';dbname='.$db, $user, $pass);

} catch (PDOException $e) {
print 'Error: '.$e->GetMessage();
 die();
}

// $usuario = "mundom_wp8";
// 	$pass = "Sj@Z9pg3.2";

// 	try {
// 	    $conn = new PDO('mysql:host=localhost;dbname=mundom_wp8', $usuario, $pass);
// 	} catch (PDOException $e) {
// 	    print "¡Error!: " . $e->getMessage() . "<br/>";
// 	    die();
// 	}


  ?>   
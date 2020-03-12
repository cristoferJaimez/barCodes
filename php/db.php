<?php 
session_start();

$hosting ="localhost";
$user="root";
$pass="";
$db = "mundo_moda";
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
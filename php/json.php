<?php

$arr_clientes = array();


//Creamos el JSON
$json_string = json_encode($arr_clientes);
$file = 'clientes.json';
file_put_contents($file, $json_string);

?>
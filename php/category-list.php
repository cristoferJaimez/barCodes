<?php 
   include('db.php');

    $query = "SELECT * FROM category";
    $result = $conn->query($query);    
   
    $json = array();
       while($row = $result->fetch(PDO::FETCH_ASSOC)){
        $json[] = array (
            'id' => $row['id'],
            'code' => $row['code'],
            'category'=> $row['category']
        );
       
   }
    $jsonstring = json_encode($json);
    echo $jsonstring;
?> 
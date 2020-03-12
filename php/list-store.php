<?php 
        include('db.php');

            
        $query = "SELECT * FROM tiendas ";
        $result = $conn->query($query);

        $json =  array();                           
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
                                    
        $json[] = array(
          'storeName'=> $row['store_name'],
           'storeCode'=>$row['store_code']
        );
     }
                                 
                     $jsonstring = json_encode($json);            
                     echo $jsonstring;
?>
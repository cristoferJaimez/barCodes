<?php 
        include('db.php');
        
        
        $query = "SELECT * FROM category ORDER BY  category ASC";
         $result = $conn->query($query);

         $json =  array();                           
         while($row = $result->fetch(PDO::FETCH_ASSOC)){
                                     
         $json[] = array(
           'code'=> $row['code'],
            'category'=>$row['category']
         );
      }
                                  
                      $jsonstring = json_encode($json);            
                      echo $jsonstring;

?>
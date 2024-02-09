<?php
   //connect to database
   $servername = "localhost";
   $username = "user1";
   $password = "password";
   $database = "Servicemgm";

   //Create Connection
   $connection = new mysqli($servername, $username, $password, $database);

   //Check connection stablished or not!
   if ($connection->connect_error) {
       die("Connection failed: " . $connection->connect_error);
   }

   if (isset($_GET["vehicleid"])) {
    #if not exist then
        $vehicleid = $_GET['vehicleid'];
        
        $sql = "DELETE FROM VehicleDetail WHERE VehicleID='$vehicleid';"; 
        $result = $connection->query($sql);

        // if (!$result) {
        //     die("Invalid query : " . $connection->error);
        //     break;
        // }

}     
   header("location: ./index.php");
   exit;


?>

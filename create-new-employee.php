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



    //$vehicleid = "";
    $make = "";
    $mode = "";
    $yearofmanu = "";
	$color = "";
    $registrationnum = "";
    $ownerid = "";
    $typeofservice = "";

    $errorMessage = "";
    $successMessage = "";
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        //echo "DDD";
        //$vehicleid = $_POST["vehicleid"];
        $make = $_POST["Make"];
        $mode = $_POST["Mode"];
        $yearofmanu = $_POST["YearofManu"];
		$color = $_POST["Color"];
        $registrationnum = $_POST["RegistrationNum"];
        $ownerid = $_POST["OwnerId"];
        $typeofservice = $_POST["TypeofService"];

		echo $vehicleid;
		echo $make;
		echo $mode;
		echo $yearofmanu;
		echo $color;
		echo $registrationnum;
		echo $ownerid;
		echo $typeofservice;
		

        do {
            # code...
            //if(empty($vehicleid) || empty($make) || empty($mode) || empty($yearofmanu) || empty($color) || empty($registrationnum) || empty($ownerid) || empty($typeofservice))
			//{
              //  $errorMessage = "All the fields are required";
                //break;
                //echo $errorMessage;
            //}
    
            //add new employee into database

            $sql = "INSERT INTO VehicleDetail (Make, Mode, YearofManu, Color, RegistrationNum, OwnerId, TypeofService) VALUES ('$make', '$mode', '$yearofmanu', '$color', '$registrationnum', '$ownerid', '$typeofservice')";
            $result = $connection->query($sql);

            if (!$result) {
                die("Invalid query : " . $connection->error);
                break;
            }
    
            $name = "";
            $email = "";
            $phone = "";
            $address = "";
    
            $successMessage = "";
    
            $successMessage = "Employee Added Successfully!";

            header("location: ./index.php");
            exit;


        } while (false);

        
    }else{
        //echo "ELse";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Vehicle Management | PHP CRUD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css
">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>



<style>

/* for showing validation msg red */
*{
	padding: 0px;
	margin:0px;
}
.navbar{
	margin: 0px;
}
.error {
	color: red;
	font-style: italic;
}

.mycolor{
	background: #748EC6;
}
.text-w{
	color:#748EC6;
}
.background-color-w{
	color:#F2F5FA;
}

.section-bg {
    background-color: #f2f5fa;
    padding: 0px;
    margin: 0px;
}

.card-shadow{
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.1);
    padding: 30px;

}

</style>



</head>
<body>



<!-- navbar start -->
<nav class="navbar navbar-expand-lg navbar-dark mycolor">
		<!--<a class="navbar-brand" href="index.php">Employee Management</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse"
			data-target="#navbarSupportedContent"
			aria-controls="navbarSupportedContent" aria-expanded="false"
			aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>-->

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
				<li class="nav-item active"><a class="nav-link" href="index.php">Home
						
				</a></li>
				<li class="nav-item active"><a class="nav-link" href="./create-new-employee.php">Vehicle
						Service</a></li>
				<!--<li class="nav-item dropdown"><a
					class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
					role="button" data-toggle="dropdown" aria-haspopup="true"
					aria-expanded="false"> Dropdown </a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="#">Action</a> <a
							class="dropdown-item" href="#">Another action</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="#">Something else here</a>
					</div></li>
					<li class="nav-item"><a class="nav-link disabled" href="#">Disabled</a>
				</li>-->
			</ul>
			
		</div>
	</nav>

<!-- navbar End -->



    <div class="container my-5">
        <h2 class="text-center mb-5">New Vehicle</h2>
        <!-- employee form -->
        
        
        <?php
            if(!empty($errorMessage)){
                echo "
                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <strong>$errorMessage</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
                ";
            }
        ?>
        <form method="post">
                
                <div class="row mb-3">
                    <label for="" class="col-sm-3 col-form-label">Make</label>
                    <div class="col-sm-6">
                        <input type="text"  class="form-control" name="Make" value="<?php echo $make; ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="" class="col-sm-3 col-form-label">Model</label>
                    <div class="col-sm-6">
                        <input type="text"  class="form-control" name="Mode" value="<?php echo $mode; ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="" class="col-sm-3 col-form-label">YearOfManufacture</label>
                    <div class="col-sm-6">
                        <input type="text"  class="form-control" name="YearofManu" value="<?php echo $yearofmanu; ?>">
                    </div>
                </div>
				
				<div class="row mb-3">
                    <label for="" class="col-sm-3 col-form-label">Color</label>
                    <div class="col-sm-6">
                        <input type="text"  class="form-control" name="Color" value="<?php echo $color; ?>">
                    </div>
                </div>
				
				<div class="row mb-3">
                    <label for="" class="col-sm-3 col-form-label">RegistrationNumber</label>
                    <div class="col-sm-6">
                        <input type="text"  class="form-control" name="RegistrationNum" value="<?php echo $registrationnum; ?>">
                    </div>
                </div>
				
				<div class="row mb-3">
                    <label for="" class="col-sm-3 col-form-label">OwnerId</label>
                    <div class="col-sm-6">
                        <input type="text"  class="form-control" name="OwnerId" value="<?php echo $ownerid; ?>">
                    </div>
                </div>
				
				<div class="row mb-3">
                    <label for="" class="col-sm-3 col-form-label">TypeOfService</label>
                    <div class="col-sm-6">
                        <input type="text"  class="form-control" name="TypeofService" value="<?php echo $typeofservice; ?>">
                    </div>
                </div>


                
                <?php
            if(!empty($successMessage)){
                echo "
                
                <div class='offset-sm-3 col-sm-6'>
                    <div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>$successMessage</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>
                </div>
                
                
                ";
            }
        ?>
                
                <div class="row mb-3">
                    
                    <div class="offset-sm-3 col-sm-3 d-grid">
                        <button type="submit" class="btn btn-outline-primary">Submit</button>
                    </div>
                    <div class="col-sm-3 d-grid">
                        <a href="./index.php" class="btn btn-outline-primary" role="button">Cancel</a>
                    </div>
                </div>


        </form>
    </div>



    
</body>
</html>
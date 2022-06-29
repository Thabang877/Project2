<?php

include "menu.inc";
function OpenConnection()
{
   $servername = "localhost";
	$username = "id19088584_root";
	$password = "Password@123";
	$dbname = "id19088584_tmas1";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	//echo "Connected successfully";
	return $conn;
}


//assigning the values entered in the textboxes to variables
 $eno = $_POST["empno"]; 
 $erank = $_POST["rank"]; 
 $eini = $_POST["init"]; 
 $esurname = $_POST["surname"]; 
 $email = $_POST["email"]; 
 $esec = $_POST["sections"]; 

InsertData($eno,$erank,$eini,$esurname,$email,$esec);

    function InsertData($eno,$erank,$eini,$esurname,$email,$esec)
    {
        try
        {
            $conn = OpenConnection();
			
			$sql = "INSERT INTO employee(Employee_No,Rank,Initials,Surname,Email,Sec_Id) 
			VALUES($eno,'$erank','$eini','$esurname','$email',$esec)";
	
           if ($conn->query($sql) === TRUE) {
				echo "New employee added successfully";
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}

        }
        catch(Exception $e)
        {
            echo("Error!");
        }
		$conn->close();
    }
    ?>

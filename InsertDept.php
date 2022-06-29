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
 $dname = $_POST["secname"]; 
 

InsertData($dname);

    function InsertData($dname)
    {
        try
        {
            $conn = OpenConnection();
			
			$sql = "INSERT INTO department (Section_Name) 
			VALUES('$dname')";
	
           if ($conn->query($sql) === TRUE) {
				echo "New Section added successfully";
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

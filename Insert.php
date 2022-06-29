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
 $tname = $_POST["tname"]; 
 $empno = $_POST["empno"];
 $alldate = $_POST["alldate"]; 
 $duedate = $_POST["duedate"];
 $priority = $_POST["priority"]; 
 $progress = $_POST["progress"]; 
 $link = $_POST["link"];
 $comment = $_POST["comment"]; 
 if ($progress>0 And $progress<100){
	$status = "In Progress";
 }else
	 if($progress==0){
		 $status = "New";
 }else
 {
	 $status = "Completed";
 }

InsertData($tname,$empno,$alldate,$duedate,$priority,$status,$progress,$link,$comment);

    function InsertData($tname,$empno,$alldate,$duedate,$priority,$status,$progress,$link,$comment)
    {
        try
        {
            $conn = OpenConnection();
			$sql = "INSERT INTO task (Task_Name, Employee_No, All_Date, Due_Date, Priority,Status,Progress,Link,Comment) 
			VALUES('$tname','$empno','$alldate','$duedate','$priority','$status',$progress,$link,'$comment')";
	
           if ($conn->query($sql) === TRUE) {
				echo "New record created successfully";
				
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

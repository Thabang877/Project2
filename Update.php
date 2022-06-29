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
$tId = $_POST["taskid"]; 
 $tname = $_POST["tname"]; 
 $empno = $_POST["empno"];
 $status = $_POST["status"]; 
 $duedate = $_POST["duedate"];
 $priority = $_POST["priority"]; 
 $progress = $_POST["progress"]; 
 $link = $_POST["link"];
 $comment = $_POST["comment"]; 
 if ($status=='Cancelled')
 {
 $status='Cancelled';
 }
 else
 {
 if ($progress>0 And $progress<100){
	$status = "In Progress";
 }else
	 if($progress==0){
		 $status = "New";
 }else
 {
	 $status = "Completed";
 }
 }
UpdateData($tId,$tname,$empno,$duedate,$priority,$status,$progress,$link,$comment);

    function UpdateData($tId,$tname,$empno,$duedate,$priority,$status,$progress,$link,$comment)
    {
        try
        {
            $conn = OpenConnection();
			$sql = "UPDATE task 
			SET Task_Name='$tname',Employee_No='$empno',Due_Date='$duedate',Priority='$priority',Status='$status',Progress=$progress,Link=$link,Comment='$comment'
			WHERE Task_Id=".$tId;
	
           if ($conn->query($sql) === TRUE) {
				echo "New record updated successfully";

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

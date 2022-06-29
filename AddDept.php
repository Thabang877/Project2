    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<?php include "menu.inc";?>
    </head>
        <body>
			<form action="InsertDept.php" method="post">
				<div class="container">
					<h2>Add Section</h2>
					
<?php				

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
LoadSec();

    function LoadSec()
    {
		$conn = OpenConnection();
        try
        {
			$sql = "SELECT Sec_Id, Section_Name FROM department";
			$result = $conn->query($sql);?>
			<div>
			 <label>Available Section in the system</label>
			 </div>
			 <div>
			
 <?php
			if ($result->num_rows > 0) 
			{
				// output data of each row
				while($row = $result->fetch_assoc()) 
				{
				
					echo $row["Sec_Id"]." ".$row["Section_Name"]."<br>";	
				}
			} 
			else 
			
					 echo "No sections to select";
			
		}
       
        catch(Exception $e)
        {
            echo("Error!");
        }
		$conn->close();
    }
	?>				
</div>
 <br>
                    <div class="form-group">
                        <label for="secname">Section Name:</label>
                        <input type="secname" class="form-control" id="secname" name="secname">
                    </div>
					
					
					<button type="submit" class="btn btn-default">Add Section</button>
                
				</div>
			</form>
        </body>
    </html>
	

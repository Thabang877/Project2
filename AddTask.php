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
			<form action="Insert.php" method="post">
				<div class="container">
					<h2>Allocate Task</h2>
					
                    <div class="form-group">
                        <label for="task name">Task Name:</label>
                        <input type="task name" class="form-control" id="tname" name="tname">
                    </div>
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
	
	return $conn;
}
					
	LoadEmp();

    function LoadEmp()
    {
		$conn = OpenConnection();
        try
        {
			$sql = "SELECT Employee_No, Rank, Initials, Surname FROM employee";
			$result = $conn->query($sql);

?>
			 <div class="form-group">
			  <label for="empno">Assign To:</label>
              <select name="empno" >
<?php
			if ($result->num_rows > 0) 
			{
				// output data of each row
				while($row = $result->fetch_assoc()) 
				{
?>
					<option value="<?php echo $row["Employee_No"]?>"><?php echo $row["Rank"]." ".$row["Initials"]." ".$row["Surname"]?></option>
<?php
				}
			} 
			else 
			{?>
					<option value=""<?php echo "No employees to select";?></option>
			<?php	
			}
			?>
			</select>
			<?php
        }
        catch(Exception $e)
        {
            echo("Error!");
        }
		$conn->close();
    }
					
	?>
                    </div>
                    <div class="form-group">
                        <label for="all date">Date:</label>
                        <input type="datetime-local" class="form-control" id="alldate" name="alldate">
                    </div>
					<div class="form-group">
                        <label for="due date">Due Date:</label>
                        <input type="datetime-local" class="form-control" id="duedate" name="duedate">
                    </div>
                    
                    
                    <div class="form-group">
                        <label for="priority">Priority:</label>
                        <select name="priority" id="priority">
                            <option value="High">High</option>
                            <option value="Medium">Medium</option>
                            <option value="Low">Low</option>
                            </select>
                      </div>
					
                      <div class="form-group">
                        <label for="progress">Progress Pecentage:</label>
                        <select name="progress" id="progress">
							<option value="0">0%</option>
                            <option value="10">10%</option>
                            <option value="20">20%</option>
                            <option value="30">30%</option>
							<option value="40">40%</option>
                            <option value="50">50%</option>
							<option value="60">60%</option>
                            <option value="70">70%</option>
                            <option value="80">80%</option>
							<option value="90">90%</option>
                            <option value="100">100%</option>
                        </select></div>
                    <div class="form-group">
					<div class="form-group">
                        <label for="link">Linked To:</label>
                        <select name="link" id="link">
							<option value="0">None</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
							<option value="4">4</option>
                            <option value="5">5</option>
							<option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
							<option value="9">9</option>
                            <option value="10">10</option>
                            </select></div>
                    <div class="form-group">
                        <label for="comment">Comment:</label>
                        <textarea id="comment" class="form-control" rows="2" cols="30" textarea name="comment"></textarea>
                    </div> 

                    <button type="submit" class="btn btn-default">Add Task</button>
                
				</div>
			</form>
        </body>
    </html>
	

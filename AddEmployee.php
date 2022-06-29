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
			<form action="InsertEmp.php" method="post">
				<div class="container">
					<h2>Add Employee</h2>
					
                    <div class="form-group">
                        <label for="empno">Employee Number:</label>
                        <input type="empno" class="form-control" id="empno" name="empno">
                    </div>
					
					
					 <div class="form-group">
                        <label for="rank">Rank:</label>
                        <select name="rank" id="rank">
							<option value="Genl">General</option>
                            <option value="Lt Gen">Lt Gen</option>
                            <option value="Maj Gen">Maj Gen</option>
                            <option value="Brig">Brig</option>
							<option value="Col">Col</option>
                            <option value="Lt Col">Lt Col</option>
							<option value="Capt">Capt</option>
                            <option value="WO">WO</option>
                            <option value="Sgt">Sgt</option>
							<option value="Cst">Cst</option>
							<option value="St-Cst">St-Cst</option>
                            <option value="SAC">SAC</option>
							<option value="Sec">Sec</option>
							<option value="AC">AC</option>
							<option value="PO">PO</option>
							<option value="SPAC">SPAC</option>
							<option value="PAC">PAC</option>
                        </select></div>
					<div class="form-group">
                        <label for="init">Initials:</label>
                        <input type="init" class="form-control" id="init" name="init">
                    </div>
					<div class="form-group">
                        <label for="surname">Surname:</label>
                        <input type="surname" class="form-control" id="surname" name="surname">
                    </div>
					<div class="form-group">
                        <label for="email">Email Address:</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
					
					<div class="form-group">
					<?php
	LoadSec();
	?>
	 </div>
	<?php
    function LoadSec()
    {
		$conn = OpenConnection();
        try
        {
			$sql = "SELECT Sec_Id, Section_Name FROM department";
			$result = $conn->query($sql);
			?>
			 <br> 
			  <label id ="sections" for="sections" >Section:</label>
              <select id= "sections" name="sections" >
		<?php
			if ($result->num_rows > 0) 
			{
				// output data of each row
				while($row = $result->fetch_assoc()) 
				{
					$secid=$row["Sec_Id"];
		?>
						<option value="<?php echo $row["Sec_Id"];?>"><?php echo $row["Section_Name"];?></option>
       
		<?php
					
				}
			} 
			else 
			{?>
					<option value=""<?php echo "No sections to select";?></option>
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
		?>			
         <button type="submit" class="btn btn-default">Add Employee</button>
                
				</div>
			</form>
        </body>
    </html>
	

<!DOCTYPE html>
<html>
    <head>
        <style>
            table {
                    border-collapse: collapse;
                    width: 100%;
                  }

               tr {
                    border-bottom: 1px solid #ddd;
                  }
			   td {
					 text-align: center;
					 
				  }
			   th {
				      text-align: center;
			      }
			   
        </style>
		<script>
			function showUser(str) 
			{
				$secid = str;
				if (str=="") 
				{
					document.getElementById("txtHint").innerHTML="";
					return;
				}
				
			var xmlhttp=new XMLHttpRequest();
			xmlhttp.onreadystatechange=function() 
			{
				if (this.readyState==4 && this.status==200) 
				{
					document.getElementById("txtHint").innerHTML=this.responseText;
				}
			}
			xmlhttp.open("GET","Display.php?q="+str,true);
			xmlhttp.send();
		}
	</script>
	<?php include "menu.inc";?>
    </head>
    <body>
	
        <h2>TASK MANAGEMENT APPLICATION SYSTEM</h2>
		
		<div id=""><b>STATISTICAL TASK LIST:</b></div>
	
<?php
	LoadSec();

    function LoadSec()
    {
		$conn = OpenConnection();
        try
        {
			$sql = "SELECT Sec_Id, Section_Name FROM department";
			$result = $conn->query($sql);
			?>
			 <br> 
			  <label id ="txtHint" for="sections" >Section:</label>
              <select id= "sections" name="sections" onchange="showUser(this.value)" >
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
					<option value=""<?php echo "No sections to select";?>></option>
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
		return $secid;
    }
	
	
	
?>

            </select>
			
        <table>
            <tr>
                <th>Number</th>
                <th>Employee</th>
                <th>Tasks Allocated</th>
                <th>Tasks Completed</th>
                <th>New tasks</th>
                <th>Tasks in Progress</th>
                <th>Tasks on Hold</th>  
				<th>Cancelled</th> 
            </tr>
			
<?php

		$sid=1;
		LoadEmployee($sid);
	
	function taskAll($conn,$empno)
	{
		$sql = "SELECT Task_Id FROM task WHERE Employee_No=".$empno;
		$result = $conn->query($sql);
		
		try
        {
			if ($result->num_rows > 0) 
			{
				$count=0;
				// output data of each row
				while($row = $result->fetch_assoc()) 
				{
					$count++;	
				}
			} 
			else 
			{
				$count=0;
			}
        }
        catch(Exception $e)
        {
            echo("Error!");
        }
		
		
		return $count;
	}
	function taskComp($conn,$empno)
	{
		$sql = "SELECT Task_Id FROM task WHERE Status='Completed' AND Employee_No=".$empno;
		$result = $conn->query($sql);
		try
        {
			if ($result->num_rows > 0) 
			{
				$count=0;
				// output data of each row
				while($row = $result->fetch_assoc()) 
				{
					$count++;	
				}
			} 
			else 
			{
				$count=0;
			}
        }
        catch(Exception $e)
        {
            echo("Error!");
        }
		
		
		return $count;
	}
	function inProgress($conn,$empno)
	{
		$sql = "SELECT Task_Id FROM task WHERE Status='In Progress' AND Employee_No=".$empno;
		$result = $conn->query($sql);
		try
        {
			if ($result->num_rows > 0) 
			{
				$count=0;
				// output data of each row
				while($row = $result->fetch_assoc()) 
				{
					$count++;	
				}
			} 
			else 
			{
				$count=0;
			}
        }
        catch(Exception $e)
        {
            echo("Error!");
        }
		
		
		return $count;
	}
	function onHold($conn,$empno)
	{
		$sql = "SELECT Task_Id FROM task WHERE Status='On Hold' AND Employee_No=".$empno;
		$result = $conn->query($sql);
		try
        {
			if ($result->num_rows > 0) 
			{
				$count=0;
				// output data of each row
				while($row = $result->fetch_assoc()) 
				{
					$count++;	
				}
			} 
			else 
			{
				$count=0;
			}
        }
        catch(Exception $e)
        {
            echo("Error!");
        }
		
		
		return $count;
	}
	function taskNew($conn,$empno)
	{
		$sql = "SELECT Task_Id FROM task WHERE Status='New' AND Employee_No=".$empno;
		$result = $conn->query($sql);
		try
        {
			if ($result->num_rows > 0) 
			{
				$count=0;
				// output data of each row
				while($row = $result->fetch_assoc()) 
				{
					$count++;	
				}
			} 
			else 
			{
				$count=0;
			}
        }
        catch(Exception $e)
        {
            echo("Error!");
        }
		return $count;
	}
		function Cancelled($conn,$empno)
	{
		$sql = "SELECT Task_Id FROM task WHERE Status='Cancelled' AND Employee_No=".$empno;
		$result = $conn->query($sql);
		try
        {
			if ($result->num_rows > 0) 
			{
				$count=0;
				// output data of each row
				while($row = $result->fetch_assoc()) 
				{
					$count++;	
				}
			} 
			else 
			{
				$count=0;
			}
        }
        catch(Exception $e)
        {
            echo("Error!");
        }
		
		
		return $count;
	}
	
	function LoadEmp($eno)
    {
		$conn = OpenConnection();
        try
        {
			$sql = "SELECT Rank, Initials, Surname FROM employee WHERE Employee_No=".$eno;
			
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0) 
			{
				// output data of each row
				while($row = $result->fetch_assoc()) 
				{
					
						$employee = $row["Rank"]." ".$row["Initials"]." ".$row["Surname"];
       
				}
			} 
			else 
			{
				$employee= "Unknown employee";
			}
        }
        catch(Exception $e)
        {
            echo("Error!");
        }
		$conn->close();
		return $employee;
    }
	
    function LoadEmployee($sid)
    {
		$conn = OpenConnection();
        try
        {
			$sql = "SELECT Employee_No, Rank, Initials, Surname FROM employee WHERE Sec_ID=".$sid;
			
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0) 
			{
				$count=1;
				// output data of each row
				while($row = $result->fetch_assoc()) 
				{
					
		?>
					<tr>
						<td><?php echo $count++?></td>
						<td><?php echo $row["Rank"]." ".$row["Initials"]." ".$row["Surname"]?></td>
						<td><?php echo taskAll($conn,$row["Employee_No"])?></td>
						<td><?php echo taskComp($conn,$row["Employee_No"])?></td>
						<td><?php echo taskNew($conn,$row["Employee_No"])?></td>
						<td><?php echo inProgress($conn,$row["Employee_No"])?></td>
						<td><?php echo OnHold($conn,$row["Employee_No"])?></td>
						<td><?php echo Cancelled($conn,$row["Employee_No"])?></td>
					</tr>
       
		<?php	
				}
			} 
			else 
			{
				echo "No sections to select";
			}
			?>
			</table>
			<?php
        }
        catch(Exception $e)
        {
            echo("Error!");
        }
		$conn->close();
    }
            
   ?>     </table>
          <br>
<div id=""><b>DETAILED TASK LIST:</b></div>		
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
 
 function checdate($ddate)
 {
	 $tdate= new DateTime();
	 $exp=new DateTime($ddate);
	 $diff= date_diff($tdate,$exp);
	 #echo $diff->format("%d days, %h hours and %i minuts");
	 if($diff->format("%R%a")>5)
	 {
		  echo "<p style='color:green'>Task due in over 5 days</p>";
	 }
	 if($diff->format("%R%a")==5)
	 {
		 echo "<p style='color:green'>due in 5 days</p>";
	 }
	 else if($diff->format("%R%a")==4)
	 {
		 echo "<p style='color:green'>Due in 4 days</p>";
	 } 
	 else if($diff->format("%R%a")==3)
	 {
		 echo "<p style='color:orange'>Due in 3 days</p>";
	 }
	  else if($diff->format("%R%a")==2)
	 {
		 echo "<p style='color:orange'>Due in 2 days</p>";
	 }
	  else if($diff->format("%R%a")==1)
	 {
		 echo "<p style='color:orange'>Due in 4 days</p>";
	 }else if($diff->format("%R%a")==0)
	 {
		 echo "<p style='color:red'>Due Today</p>";
	 }else if($diff->format("%R%a")<0)
	 {
		 echo "<p style='color:red'>Task Overdue</p>";
	 }
	 
		 
 }
DisplayData();

    function DisplayData()
    {
		$conn = OpenConnection();
        try
        {
			$sql = "SELECT Task_Id, Task_Name, Employee_No, All_Date, Due_Date, Priority,Status,Progress,Link,Comment FROM task";
			$result = $conn->query($sql);
			?>
			 <br>
        <table>
            <tr>
                <th>Task Nr</th>
                <th>Task Name</th>
                <th>Assigned to</th>
                <th>Date</th>
                <th>Due Date</th>
                <th>Priority</th>
                <th>Status</th>
                <th>Progress</th>
                <th>Linked to</th>
				<th>Comment</th>
                <th>Update</th>
            </tr>
            
		<?php
			

			if ($result->num_rows > 0) 
			{
				// output data of each row
				while($row = $result->fetch_assoc()) 
				{
					$empno=$row["Employee_No"];
		?>
		
		<tr>
						<td><?php echo $row["Task_Id"]?></td>
						<td><?php echo $row["Task_Name"]?></td>
						<td><?php echo LoadEmp($empno);?></td>
						<td><?php echo date('d/m/Y',strtotime($row["All_Date"]))?></td>
						<td><?php echo date('Y-m-d H:i',strtotime($row["Due_Date"]))?> <p><?php checdate($row["Due_Date"]);?></p></td>
						<td><?php echo $row["Priority"]?></td>
						<td><?php echo $row["Status"]?></td>
						<td><?php echo $row["Progress"]."%"?></td>
						<td><?php echo $row["Link"]?></td>
						<td><?php echo $row["Comment"]?></td>
						<td>
							<form name="edit" action="UpdateTask.php" method="GET">
								<input type="hidden" name="taskId" id="taskId" value="<?php echo $row["Task_Id"]?>">
								<input type="submit" name="edittask" value="edit">
							</form>
						</td>
					</tr>
		<?php	
				}
			} 
			else 
			{
			echo "0 results";
			}
			?>
			</table>
			  <br>
			
         <button type="button" class="btn btn-primary"><a href="AddTask.php">Add Another Task</a></button>
            </br>
		
			</body>
			</html>
			<?php
        }
        catch(Exception $e)
        {
            echo("Error!");
        }
		$conn->close();
    }
	
    ?>

 <?php

session_start();
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "ideastart";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if(!empty($_GET['id']))
{
	$id = $_GET['id'];
	$_SESSION['id'] = $id;
	$id_exists = true;
	

	$sql = "SELECT * FROM list Where id='$id'";
	$query = mysql_query("Select * from list Where id='$id'"); // SQL Query
	$count = mysql_num_rows($query);
	if($count > 0)
	{
		while($row = mysql_fetch_array($query))
		{
		Print "<tr>";
		Print '<td align="center">'. $row['id'] . "</td>";
		Print '<td align="center">'. $row['details'] . "</td>";
		Print '<td align="center">'. $row['date_posted']. " - ". $row['time_posted']."</td>";
		Print '<td align="center">'. $row['date_edited']. " - ". $row['time_edited']. "</td>";
		Print '<td align="center">'. $row['public']. "</td>";
		Print "</tr>";
		}
	}
	else
	{
		$id_exists = false;
	}
}
?>
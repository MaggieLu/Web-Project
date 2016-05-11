 <?php

session_start();
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "ideastart";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM ideainformation";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);

echo $count;

while ($row = mysql_fetch_row($result)){
	echo $row["title"];
}

mysqli_close($conn);
?>

 <?php

session_start();
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "ideastart";

$title = $_POST["title"];
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM ideainformation where title = $title";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);

echo $count;

while ($row = mysql_fetch_row($result)){
    echo $row["title"];
    echo $row["description"];
    echo $row["industry"];
    echo $row["tag"];
    echo $row["title"];
}

mysqli_close($conn);
?>

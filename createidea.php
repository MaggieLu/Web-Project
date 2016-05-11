<?php

session_start();
if($_SESSION['email']){

}
else{
header("location:idealogin.html");
}

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "ideastart";

$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
	}


$title = $_POST['title'];
$description = mysql_real_escape_string($_POST['description']);
$industry = mysql_real_escape_string($_POST['industry']);
$addtag = mysql_real_escape_string($_POST['addtag']);
$choosetag = mysql_real_escape_string($_POST['choosetag']);
$createdate = strftime("%b %d, %Y");


$sql = "INSERT INTO ideainformation (title, description, industry, tag, createdate) VALUES ('$title','$description','$industry','$choosetag', '$createdate')";
//$result = mysqli_query($conn, $userlist);

Print '<script>alert("The Idea Is Created!");</script>';
Print '<script>window.location.assign("ideapage.html");</script>';

/*
if (mysqli_query($conn, $sql)) {

	    echo "New record created successfully";

} 
else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

*/
mysqli_close($conn);
?>
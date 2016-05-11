 <?php

session_start();
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "ideastart";

$usern = $_POST["username"];
$email = $_POST["email"];
$pw = $_POST["password"];
$p = md5($pw);
$check = true;
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$userlist = "SELECT email FROM userinformation where email = '$email'";
$result = mysqli_query($conn, $userlist);
$rowNum = mysqli_num_rows($result);


if ($rowNum >= 1) {
	
	$check = false;
	Print '<script>alert("Email alreadly exit!");</script>';
	Print '<script>window.location.assign("ideasignup.html");</script>';
    
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false){
	if ($check == true){
	   $sql = "INSERT INTO userinformation (username, email, password) VALUES ('$usern', '$email','$p')";
	   $rt = mysqli_query($conn, $sql);
	   Print '<script>window.location.assign("idealogin.html");</script>';
	}
}

else{
	$check = false;
	Print '<script>alert("Invalid email!");</script>';
	Print '<script>window.location.assign("ideasignup.html");</script>';
}

mysqli_close($conn);
?>

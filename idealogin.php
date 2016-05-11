 <?php

session_start();
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "ideastart";

$usern = $_POST["username"];
$email = $_POST["email"];
$pw = $_POST["password"];


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM userinformation where email = '$email'";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);

$validemail = "";
$validpw = "";
$id = "";
$uname = "";


if ($count > 0) {

    while($row = mysqli_fetch_assoc($result)) {
    	$validemail = $row['email'];
    	$validpw = $row['password'];
    	$id = $row['id'];
    	$uname = $row['uname'];
    }

    if(($email == $validemail) && ($pw == $validpw)){
    	$_SESSION['id'] = $id;
		$_SESSION['email'] = $validemail;
		$_SESSION['username'] = $uname; 
		$_SESSION['password'] = $validpw;
		//header("location: userpage.html");
		Print '<script>window.location.assign("userpage.html");</script>'; 

	}

	else{
		Print '<script>alert("Incorrect Password!");</script>'; 
		Print '<script>window.location.assign("idealogin.html");</script>'; 
	}
    
}

else {
    Print '<script>alert("Invalid Email!");</script>'; 
	Print '<script>window.location.assign("idealogin.html");</script>';
}


mysqli_close($conn);

?> 

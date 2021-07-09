<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "airlines","3325");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$FirstName = mysqli_real_escape_string($link, $_REQUEST['FName']);
$LastName = mysqli_real_escape_string($link, $_REQUEST['LName']);
$Gender = mysqli_real_escape_string($link, $_REQUEST['gender']);
$UserName = mysqli_real_escape_string($link, $_REQUEST['UName']);
$Password = mysqli_real_escape_string($link, $_REQUEST['psw']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$address = mysqli_real_escape_string($link, $_REQUEST['Address']);
$PhNo = mysqli_real_escape_string($link, $_REQUEST['Ph']);

        $sql_u = "SELECT UName FROM passenger WHERE UName='$UserName'";
	$res=mysqli_query($link, $sql_u);
  	if(mysqli_num_rows($res )> 0){
		echo '<script>alert("Username already exist")</script>';
		 $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
                echo "<a href='$url'>back</a>";
	}
	$sql = "INSERT INTO passenger (FName, LName, gender, UName, psw, email, Address, Ph) VALUES ('$FirstName', 	'$LastName', '$Gender', '$UserName', '$Password', '$email', '$address', '$PhNo')";

	if(mysqli_query($link, $sql)){
		echo'<script>alert("Registered successfully")</script>';
		header('location: newPLogin.php'); 

	}
else{
	echo "Something went wrong.Try Again!!";
}



mysqli_close($link);
?>
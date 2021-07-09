<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "airlines","3325");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

                        $FlightNo = mysqli_real_escape_string($link,$_REQUEST['FLIGHT_NO']);


$sql = "DELETE FROM roundflights WHERE FLIGHT_NO=$FlightNo";
mysqli_query($link,$sql) or die('can not delete'.mysqli_error($link));

$sql2 = "DELETE FROM airplane WHERE FLIGHT_NO=$FlightNo";
mysqli_query($link,$sql2) or die('can not delete'.mysqli_error($link));

$sql3 = "DELETE FROM class WHERE FLIGHT_NO=$FlightNo AND CLASS_NAME='Economy'";
mysqli_query($link,$sql3) or die('can not delete'.mysqli_error($link));

$sql4 = "DELETE FROM class WHERE FLIGHT_NO=$FlightNo AND CLASS_NAME='Business'";
mysqli_query($link,$sql4) or die('can not delete'.mysqli_error($link));

echo'<script>alert("deleted successfully")</script>';
$url = htmlspecialchars($_SERVER['HTTP_REFERER']);
echo "<a href='$url'>Goback</a>";

mysqli_close($link);
?>
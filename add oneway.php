<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "airlines","3325");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

                        $FlightNo = mysqli_real_escape_string($link,$_REQUEST['FLIGHT_NO']);
			$AeroplaneName =mysqli_real_escape_string($link,$_REQUEST['FLIGHT_NAME']);
			$DepartureAirport = mysqli_real_escape_string($link,$_REQUEST['DEPART_AIRPORT']);
			$Departuretime = mysqli_real_escape_string($link,$_REQUEST['DEPART_TIME']);	
			$Departuredate=mysqli_real_escape_string($link,$_REQUEST['FROM_DATE']);
			$ArrivalAirport = mysqli_real_escape_string($link,$_REQUEST['TO_AIRPORT']);
			$EconomyCapacity = mysqli_real_escape_string($link,$_REQUEST['E_CAPACITY']);
			$Economyprice = mysqli_real_escape_string($link,$_REQUEST['eprice']);
			$BuisnessCapacity = mysqli_real_escape_string($link,$_REQUEST['B_CAPACITY']);
			$Buisnessprice= mysqli_real_escape_string($link,$_REQUEST['bprice']);
			$time = date("d-m-Y");

		 $sql_u = "SELECT FLIGHT_NO FROM oneway WHERE FLIGHT_NO=$FlightNo";
		 $res=mysqli_query($link, $sql_u);
  	         if(mysqli_num_rows($res )> 0){
	             echo '<script>alert("flight number already exist")</script>';
		 $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
                echo "<a href='$url'>back</a>";
	}
				
				
$sql = "INSERT INTO oneway VALUES(' $FlightNo',' $Departuredate' ,  '$DepartureAirport', '$ArrivalAirport','$Departuretime')";
		mysqli_query($link,$sql) or die('Flight Number Already Exists');
		$sql2 = "INSERT INTO airplane VALUES('$FlightNo','$AeroplaneName','$EconomyCapacity','$BuisnessCapacity')";
	mysqli_query($link,$sql2) or die('can not insert'.mysqli_error($link)); 

		$sql3 = "INSERT INTO class VALUES('$FlightNo','$EconomyCapacity' ,'Economy','$Economyprice')";
	mysqli_query($link,$sql3) or die('can not insert'.mysqli_error($link));
				
		$sql4 = "INSERT INTO class VALUES('$FlightNo','$BuisnessCapacity','Business','$Buisnessprice')";
		mysqli_query($link,$sql4) or die("can not insert".mysqli_error($link));


echo'<script>alert("entered successfully")</script>';
$url = htmlspecialchars($_SERVER['HTTP_REFERER']);
echo "<a href='$url'> Goback</a>";




mysqli_close($link);
?>

				
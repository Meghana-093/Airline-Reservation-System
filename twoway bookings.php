<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "airlines","3325");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


$UserName = mysqli_real_escape_string($link, $_REQUEST['UName']);
$FlightNO = mysqli_real_escape_string($link,$_REQUEST['FLIGHTNO']);
$ClassName = mysqli_real_escape_string($link,$_REQUEST['CLASS_NAME']);
$Flighttype = mysqli_real_escape_string($link,$_REQUEST['FLIGHT_TYPE']);

$sql_u = "SELECT UName FROM passenger WHERE UName='$UserName'";
	$res=mysqli_query($link, $sql_u);
  	if(mysqli_num_rows($res )== 0){
		echo '<script>alert("To Book flights you need to register")</script>';
		 $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
                echo "<a href='$url'>back</a>";
	}


if($ClassName =='Business'){
	$sql="SELECT P.UName ,FL.FLIGHT_NO, FL.FROM__DATE, FL.TO_DATE,FL.DEPART_AIRPORT, FL.TO_AIRPORT, FL.DEPART_TIME, C.CLASS_NAME, C.CAPACITY, C.PRICE,AR.FLIGHT_NAME,AR.B_CAPACITY FROM passenger P,airplane AR, roundflights FL,class C WHERE  P.UName='$UserName' AND C.CLASS_NAME= 'Business' AND C.FLIGHT_NO = '$FlightNO' AND  FL.FLIGHT_NO = '$FlightNO' AND AR.FLIGHT_NO='$FlightNO'";


$query=mysqli_query($link,$sql);

 if(mysqli_num_rows($query) ==1){
	$row = $query->fetch_assoc();
       $FlightNO = $row['FLIGHT_NO'];
        $FlightName=$row['FLIGHT_NAME'];       
        $Departuredate = $row['FROM__DATE'];
	$Arrivaldate= $row['TO_DATE'];
        $DepartureAirport = $row['DEPART_AIRPORT'];
        $ArrivalAirport = $row['TO_AIRPORT'];
         $Departuretime = $row['DEPART_TIME'];
        $Classname = $row['CLASS_NAME'];
        $price = $row['PRICE'];


       $sql2 = "INSERT INTO my_bookings VALUES('$FlightNO','$UserName','$DepartureAirport', '$ArrivalAirport','$Departuredate','$Arrivaldate','$Departuretime', '$Flighttype','$Classname','$price')";
                         mysqli_query($link,$sql2) or die('Couldn not book'.mysqli_error($link));
		echo '<script>alert("Booked succcesfully!!!!!")</script>';
		 $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
                echo "<a href='$url'>back</a>";

        
}

else{
echo'<script>alert("Enter correct flight no")</script>';
$url = htmlspecialchars($_SERVER['HTTP_REFERER']);
echo "<a href='$url'> Goback</a>";

}
}
elseif($ClassName == 'Economy '){
$sql="SELECT P.UName ,FL.FLIGHT_NO, FL.FROM__DATE,FL.TO_DATE, FL.DEPART_AIRPORT, FL.TO_AIRPORT, FL.DEPART_TIME, C.CLASS_NAME, C.CAPACITY, C.PRICE,AR.FLIGHT_NAME,AR.E_CAPACITY FROM passenger P,airplane AR, roundflights FL,class C WHERE  P.UName='$UserName' AND C.CLASS_NAME= 'Economy' AND C.FLIGHT_NO = '$FlightNO' AND  FL.FLIGHT_NO = '$FlightNo' AND AR.FLIGHT_NO='$FlightNo'";

$query=mysqli_query($link,$sql);

 if(mysqli_num_rows($query )== 1){
	$row = $query->fetch_assoc();
       $FlightNO = $row['FLIGHT_NO'];
        $FlightName=$row['FLIGHT_NAME'];       
        $Departuredate = $row['FROM_DATE'];
	 $Arrivaldate = $row['TO_DATE'];
        $DepartureAirport = $row['DEPART_AIRPORT'];
        $ArrivalAirport = $row['TO_AIRPORT'];
         $Departuretime = $row['DEPART_TIME'];
        $Classname = $row['CLASS_NAME'];
        $price = $row['PRICE'];


$sql2 = "INSERT INTO my_bookings VALUES('$FlightNO','$UserName','$DepartureAirport', '$ArrivalAirport','$Departuredate','$Arrivaldate','$Departuretime', '$Flighttype','$Classname','$price')";
mysqli_query($link,$sql2) or die('could not book'.mysqli_error($link));
            echo '<script>alert("Booked succcesfully!!!!!")</script>';
		 $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
                echo "<a href='$url'>back</a>";
}

else{
echo'<script>alert("Enter correct flight no")</script>';
$url = htmlspecialchars($_SERVER['HTTP_REFERER']);
echo "<a href='$url'> Goback</a>";

}
}




?>
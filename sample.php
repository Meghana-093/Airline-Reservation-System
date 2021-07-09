<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "airlines","3325");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$DepartureAirport = mysqli_real_escape_string($link,$_REQUEST['DEPART_AIRPORT']);
$Departuredate=mysqli_real_escape_string($link,$_REQUEST['FROM_DATE']);
$ArrivalAirport = mysqli_real_escape_string($link,$_REQUEST['TO_AIRPORT']);
$ClassName = mysqli_real_escape_string($link,$_REQUEST['name_class']);

if($ClassName == "Buisness class"){
   
$sql ="SELECT FL.FLIGHT_No, FL.FROM_DATE, FL.DEPART_AIRPORT, FL.TO_AIRPORT, FL.DEPART_TIME, C.CLASS_NAME, C.CAPACITY, C.PRICE,AR.FLIGHT_NAME,AR.B_CAPACITY FROM airplane AR, oneway FL,class C WHERE FL.DEPART_AIRPORT = '$DepartureAirport' AND FL.TO_AIRPORT = '$ArrivalAirport' AND FL.FROM_DATE = '$Departuredate' AND C.CLASS_NAME= 'Business' AND (C.FLIGHT_NO = FL.FLIGHT_NO) ;

$res=mysqli_query($link, $sql);
 
?>

<html>    
    <body>    
        <table width = "100%" border = "1" cellspacing = "1" cellpadding = "1">    
            <tr>    
		<td>Flight</td>
        <td>Airplane Name</td>
        <td>Takeoff Date</td>
        <td>Departure</td>
        <td>Departure Time</td>
        <td>Arrival</td>
        <td>Class</td>
        <td>Capacity</td>
        <td>Price</td>
        <td>Remain Seats</td>
        <td>Reserve</td>
	</tr>
</table>    
    </body>    
</html>

<?php    
    
while($row = mysql_fetch_object($res)){    
        
?>  
       echo "<tbody><tr>";
         
        $FlightNo = $row['FLIGHT_NO'];
        $Departuredate = $row['FROM_DATE'];
        $DepartureAirport = $row['DEPART_AIRPORT'];
        $Departuretime = $row['DEPART_TIME'];
        $ArrivalAirport = $row['TO_AIRPORT'];
        $Classname = $row['Class_Name'];
        $Capacity = $row['CAPACITY'];
        $price = $row['PRICE'];
        $bseats = $row['B_CAPACITY'];

        echo "<td>".$FlightNo."</td>";
        echo "<td>" . $Departuredate . "</td>";
        echo "<td>" . $DepartureAirport . "</td>";
        echo "<td>" .  $Departuretime . "</td>";
        echo "<td>" . $ArrivalAirport . "</td>";
        echo "<td>" . $Classname . "</td>";
        echo "<td>" .  $Capacity. "</td>";
        echo "<td>" . $price . "</td>";
        echo "<td>" . $bseats . "</td>";

echo "</tbody></table>";

}
else{
	echo "No flights found";
}










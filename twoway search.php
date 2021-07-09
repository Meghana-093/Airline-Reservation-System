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
$Arrivaldate=mysqli_real_escape_string($link,$_REQUEST['TO_DATE']);
$ArrivalAirport = mysqli_real_escape_string($link,$_REQUEST['TO_AIRPORT']);
$ClassName = mysqli_real_escape_string($link,$_REQUEST['CLASS_NAME']);

if($DepartureAirport==$ArrivalAirport){
	echo '<script>alert("Departure and Arrival airport cannot be the same")</script>';
$url = htmlspecialchars($_SERVER['HTTP_REFERER']);
echo "<a href='$url'> Goback</a>";
}

if($ClassName == 'Business'){
   
$sql_t =" SELECT FL.FLIGHT_NO, FL.FROM__DATE,FL.TO_DATE, FL.DEPART_AIRPORT, FL.TO_AIRPORT, FL.DEPART_TIME, C.CLASS_NAME,C.FLIGHT_NO, C.CAPACITY, C.PRICE,AR.FLIGHT_NAME,AR.B_CAPACITY FROM airplane AR, roundflights FL,class C WHERE FL.DEPART_AIRPORT = '$DepartureAirport' AND FL.TO_AIRPORT = '$ArrivalAirport' AND FL.FROM__DATE = '$Departuredate' AND FL.TO_DATE='$Arrivaldate' AND C.CLASS_NAME= 'Business' AND C.FLIGHT_NO = FL.FLIGHT_NO AND AR.FLIGHT_NO = FL.FLIGHT_NO ";

$result=mysqli_query($link,$sql_t);

if(mysqli_num_rows($result) == 0){
echo'<script>alert("flight doesnot exist.Choose some other dates")</script>';
$url = htmlspecialchars($_SERVER['HTTP_REFERER']);
echo "<a href='$url'> Goback</a>";

}
else{
$url = htmlspecialchars($_SERVER['HTTP_REFERER']);
echo "<a href='$url'> Goback</a>";
echo "<br>";
echo "<br>";
echo "Note the flight no to book the flight";
echo "<br>";
echo "<br>";
echo "<br>";
echo "Search Results";
?>
<!DOCTYPE html> 
<html lang="en"> 
  
<head> 
    <meta charset="UTF-8"> 
    <title>Passenger details</title> 

    <style> 
        table { 
            margin: 0 auto; 
            font-size: large; 
            border: 1px solid black; 
        } 
  
        h1 { 
            text-align: center; 
            color: #006600; 
            font-size: xx-large; 
            font-family: 'Gill Sans', 'Gill Sans MT',  
            ' Calibri', 'Trebuchet MS', 'sans-serif'; 
        } 
  
        td { 
            background-color: #E4F5D4; 
            border: 1px solid black; 
        } 
  
        th, 
        td { 
            font-weight: bold; 
            border: 1px solid black; 
            padding: 10px; 
            text-align: center; 
        } 
  
        td { 
            font-weight: lighter; 
        } 
    </style> 
</head> 
<body>
<section>
<table>

            <tr>
        <th>FlightNo</th>
        <th>Airplane Name</th>
        <th>Departure Date</th>
	<th>Arrival Date</th>
        <th>Departure</th>
        <th>Arrival</th>
        <th>Departure Time</th>
        <th>Class</th>
        <th>Capacity</th>
        <th>Price</th>
        <th> Seats</th>
        
         </tr>
<?php
    
while ($row = $result->fetch_assoc()){     
       echo "<tr>";
         
        $FlightNo = $row['FLIGHT_NO'];
        $FlightName=$row['FLIGHT_NAME'];       
        $Departuredate = $row['FROM__DATE'];
	$Arrivaldate= $row['TO_DATE'];
        $DepartureAirport = $row['DEPART_AIRPORT'];
        $ArrivalAirport = $row['TO_AIRPORT'];
         $Departuretime = $row['DEPART_TIME'];
        $Classname = $row['CLASS_NAME'];
        $Capacity = $row['CAPACITY'];
        $price = $row['PRICE'];
        $bseats = $row['B_CAPACITY'];

        echo "<td>".$FlightNo."</td>";
	echo "<td>".$FlightName."</td>";
        echo "<td>" . $Departuredate . "</td>";
	echo "<td>" . $Arrivaldate . "</td>";
        echo "<td>" . $DepartureAirport . "</td>";
        echo "<td>" . $ArrivalAirport . "</td>";
	echo "<td>" .  $Departuretime . "</td>";
        echo "<td>" . $Classname . "</td>";
        echo "<td>" .  $Capacity. "</td>";
        echo "<td>" . $price . "</td>";
        echo "<td>" . $bseats . "</td>";

echo "</tr>";

}
}
}
?>
</table>
</section>
</body>

<?php
if($ClassName=='Economy'){
$sql_t =" SELECT FL.FLIGHT_No, FL.FROM__DATE, FL.TO_DATE,FL.DEPART_AIRPORT, FL.TO_AIRPORT, FL.DEPART_TIME, C.CLASS_NAME,C.FLIGHT_NO, C.CAPACITY, C.PRICE,AR.FLIGHT_NAME,AR.E_CAPACITY FROM airplane AR, roundflights FL,class C WHERE FL.DEPART_AIRPORT = '$DepartureAirport' AND FL.TO_AIRPORT = '$ArrivalAirport' AND FL.FROM__DATE = '$Departuredate' AND FL.TO_DATE='$Arrivaldate' AND C.CLASS_NAME= 'Economy' AND (C.FLIGHT_NO = FL.FLIGHT_NO) AND AR.FLIGHT_NO = FL.FLIGHT_NO";

$result=mysqli_query($link,$sql_t);
 if(mysqli_num_rows($result) == 0){
echo'<script>alert("flight doesnot exist.Choose some other dates")</script>';
$url = htmlspecialchars($_SERVER['HTTP_REFERER']);
echo "<a href='$url'> Goback</a>";

}
else{
$url = htmlspecialchars($_SERVER['HTTP_REFERER']);
echo "<a href='$url'> Goback</a>";
echo "<br>";
echo "<br>";
echo "Note the flight no to book the flight";
echo "<br>";
echo "<br>";
echo "<br>";
echo "Search Results";
?>
<!DOCTYPE html> 
<html lang="en"> 
  
<head> 
    <meta charset="UTF-8"> 
    <title>Passenger details</title> 

    <style> 
        table { 
            margin: 0 auto; 
            font-size: large; 
            border: 1px solid black; 
        } 
  
        h1 { 
            text-align: center; 
            color: #006600; 
            font-size: xx-large; 
            font-family: 'Gill Sans', 'Gill Sans MT',  
            ' Calibri', 'Trebuchet MS', 'sans-serif'; 
        } 
  
        td { 
            background-color: #E4F5D4; 
            border: 1px solid black; 
        } 
  
        th, 
        td { 
            font-weight: bold; 
            border: 1px solid black; 
            padding: 10px; 
            text-align: center; 
        } 
  
        td { 
            font-weight: lighter; 
        } 
    </style> 
</head> 
<body>
<section>
<table>

            <tr>
        <th>FlightNo</th>
        <th>Airplane Name</th>
        <th>Departure Date</th>
	<th>Arrival Date</th>
        <th>Departure</th>
        <th>Arrival</th>
        <th>Departure Time</th>
        <th>Class</th>
        <th>Capacity</th>
        <th>Price</th>
        <th> Seats</th>
        
         </tr>
<?php
    
while ($row = $result->fetch_assoc()){     
       echo "<tr>";
         
        $FlightNo = $row['FLIGHT_NO'];
        $FlightName=$row['FLIGHT_NAME'];       
        $Departuredate = $row['FROM__DATE'];
	$Arrivaldate = $row['TO_DATE'];
        $DepartureAirport = $row['DEPART_AIRPORT'];
        $ArrivalAirport = $row['TO_AIRPORT'];
         $Departuretime = $row['DEPART_TIME'];
        $Classname = $row['CLASS_NAME'];
        $Capacity = $row['CAPACITY'];
        $price = $row['PRICE'];
        $eseats = $row['E_CAPACITY'];

        echo "<td>".$FlightNo."</td>";
	echo "<td>".$FlightName."</td>";
        echo "<td>" . $Departuredate . "</td>";
	echo "<td>" . $Arrivaldate . "</td>";
        echo "<td>" . $DepartureAirport . "</td>";
        echo "<td>" . $ArrivalAirport . "</td>";
	echo "<td>" .  $Departuretime . "</td>";
        echo "<td>" . $Classname . "</td>";
        echo "<td>" .  $Capacity. "</td>";
        echo "<td>" . $price . "</td>";
        echo "<td>" . $eseats . "</td>";

echo "</tr>";

}
}
}
?>
<?php


mysqli_close($link);
?>
</table>
</section>
</body>







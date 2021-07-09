<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "airlines","3325");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


$UserName = mysqli_real_escape_string($link, $_REQUEST['UName']);

$sql="SELECT UName,FLIGHT_NO,CLASS_NAME,FLIGHT_TYPE,PRICE,dateofbooking,STATUS FROM booking_status  WHERE UName='$UserName'";

$query = mysqli_query($link,$sql);
 if(mysqli_num_rows($query )== 0){
echo'<script>alert("You dont have any bookings")</script>';
$url = htmlspecialchars($_SERVER['HTTP_REFERER']);
echo "<a href='$url'> Goback</a>";

}
else{
$url = htmlspecialchars($_SERVER['HTTP_REFERER']);
echo "<a href='$url'> Goback</a>";
echo "<br>";

echo "<br>";
echo "Bookings";
echo "<br>";
echo "<br>";
echo "<br>";
?>
<!DOCTYPE html> 
<html lang="en"> 
  
<head> 
    <meta charset="UTF-8"> 
    <title>My bookings</title> 
    <!-- CSS FOR STYLING THE PAGE --> 
    <style> 
        table { 
            margin: 0 auto; 
            font-size: large; 
            border: 1px solid black; 
        } 
  
        h1 { 
            text-align:center; 
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
        <td>User Name</td>
        <td>Flight No</td>
        <td>Class Name</td>
        <td>Flight Type</td>
        <td>Price</td>
        <td>Date of Booking</td>
        <td>Status</td>
        
</tr>
 <?php   
while ($row = $query->fetch_assoc()){     
       echo "<tr>";
         
        $UserName = $row['UName'];
        $FlightNo=$row['FLIGHT_NO'];       
        $ClassName = $row['CLASS_NAME'];
        $FlightType = $row['FLIGHT_TYPE'];
        $Price = $row['PRICE'];
         $Dateofbooking = $row['dateofbooking'];
        $Status = $row['STATUS'];
      

        echo "<td>". $UserName."</td>";
	echo "<td>".$FlightNo."</td>";
        echo "<td>" . $ClassName . "</td>";
        echo "<td>" . $FlightType . "</td>";
        echo "<td>" . $Price  . "</td>";
	echo "<td>" .  $Dateofbooking. "</td>";
        echo "<td>" . $Status. "</td>";
      
echo "</tr>";


}
}
?>
</table>
</section>
</body>
</html>

<?php
mysqli_close($link);
?>







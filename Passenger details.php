
<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "airlines","3325");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect." . mysqli_connect_error());
}
$sql_u = "SELECT FName, LName, gender, UName, email, Address, Ph FROM PASSENGER";
$query = mysqli_query($link,$sql_u);
$url = htmlspecialchars($_SERVER['HTTP_REFERER']);
echo "<a href='$url'> Goback</a>";
?>

<!DOCTYPE html> 
<html lang="en"> 
  
<head> 
    <meta charset="UTF-8"> 
    <title>Passenger details</title> 
    <!-- CSS FOR STYLING THE PAGE --> 
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
        <th>First Name</th>
        <th>Last Name</th>
        <th>Gender</th>
        <th>User Name</th>
        <th>Email</th>
        <th>Address</th>
        <th>Phone No</th>
        
         </tr>
<?php
    
while ($row = $query->fetch_assoc())
{
    
       echo "<tr>";
        
        $FirstName = $row['FName'];
        $LastName=$row['LName'];       
        $Gender = $row['gender'];
        $UserName = $row['UName'];
        $Email = $row['email'];
         $Address = $row['Address'];
        $Phno = $row['Ph'];
      

        echo "<td>". $FirstName."</td>";
	echo "<td>".$LastName."</td>";
        echo "<td>" . $Gender . "</td>";
        echo "<td>" . $UserName . "</td>";
        echo "<td>" . $Email  . "</td>";
	echo "<td>" .  $Address . "</td>";
        echo "<td>" . $Phno . "</td>";
echo "</tr>";

}
?>
</table>
</section>
</body>
</html>

<?php
mysqli_close($link);
?>









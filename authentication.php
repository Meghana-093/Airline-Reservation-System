<?php
	session_start();      
    include('connection.php');  
    $username = $_POST['user'];  
    $password = $_POST['pass'];  
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password); 


      
        $sql = " SELECT UName,psw from `passenger` WHERE UName = '$username' and psw= '$password' ";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){ 
              echo '<script> alert(" Login Successfull")</script>';  
		header('location: PLogin page.php'); 

            
        }  
        else{ 
            echo '<script> alert(" Login failed. Invalid username or password.")</script>'; 
$url = htmlspecialchars($_SERVER['HTTP_REFERER']);
echo "<a href='$url'>Goback</a>"; 
        }     
?>  
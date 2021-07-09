<?php      
    include('connection.php');  
    $username = $_POST['user'];  
    $password = $_POST['pass'];  
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  


      
        $sql = " SELECT AUser_name,A_psw from `admin` WHERE AUser_name = '$username' and A_psw= '$password' ";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){
	echo '<script> alert(" Login successfull")</script>';   
		 
		header('location: AdminLoginPage.htm'); 

            echo "<h1><center> Login successful </center></h1>";  
        }  
        else{ 
            echo '<script> alert(" Login failed. Invalid username or password.")</script>'; 
        }     
?>  
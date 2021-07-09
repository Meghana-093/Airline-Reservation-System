
<html>
<head>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;

  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 20%;
  border-radius: 30%%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}


}
</style>
</head>
<body bgcolor="#1E90FF">
  

<h1>Admin Login Form</h1>

<form name="f1" action="Lauthentication.php" onsubmit = "return validation()" method="POST">
  <div class="imgcontainer">
    <img src="img_avatar2.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label ><b>Username</b></label>
    <input type="text" id="user" name="user" placeholder="Enter Username" >

    <label ><b>Password</b></label>
    <input type="password" id="pass" name="pass"placeholder="Enter Password" >
	<button>Login</button>
        
       
  </div>
</form>
<button onclick="goBack()">Go Back</button>

<script>
function goBack() {
  window.history.back();
}
</script> 
 <script>  
            function validation()  
            {  
                var id=document.f1.user.value;  
                var ps=document.f1.pass.value;  
                if(id.length=="" && ps.length=="") {  
                    alert("User Name and Password fields are empty");  
                    return false;  
                }  
                else  
                {  
                    if(id.length=="") {  
                        alert("User Name is empty");  
                        return false;  
                    }   
                    if (ps.length=="") {  
                    alert("Password field is empty");  
                    return false;  
                    }  
                }                             
            }  
        </script>  

</body>
</html>

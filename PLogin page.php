<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

.navbar {
  overflow: hidden;
  background-color: #333;
}

.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: red;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>
</head>
<body bgcolor="#1E90FF" >
<button onclick="goBack()">Go Back</button>

<script>
function goBack() {
  window.history.back();
}
</script>
<h1>Passenger</h1>
<div class="navbar">
  <a href="#home">Home</a>
  <div class="dropdown">
    <button class="dropbtn">Search flights 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="search oneflights.htm">Oneway flights</a>
      <a href="twoway search.htm">Twoway flights</a>
    </div>
  </div> 
<div class="dropdown">
    <button class="dropbtn">Book flight 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="oneway bookings.htm">Oneway flights</a>
      <a href="twoway bookings.htm">Twoway flights</a>
	
    </div>
  </div>
<a href="mybookings.htm">My Bookings</a> 
<a href="Alogout.php">Logout</a>
</div>
<h1>Welcome!!!!</h1>



</body>
</html>

<!DOCTYPE html>
<html>
<head>
<form action="index.html">
<input type="submit" 
style="width:200px;
height:30px;
background-color:#42f4ee;
font-size:10pt;" value="Home">
</form>
<tr>
</tr>
<title>Test Connection</title>

</head>

<body><center>
<?php
$servername = "localhost";
$username = "script";
$password = "password";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";


?>
</body>
</html>
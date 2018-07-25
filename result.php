<!DOCTYPE HTML>
<html>
<form action="upload.php">
<input type="submit"
 style="width:300px;
 height:30px;
 background-color:#A9A9A9;
 font-size:10pt;" 
 value="Upload new PDF">
</form>

	<head><center>
		<title>ALL Material Saftey Data Sheets</title>
	</head>
	<body>
		
	


<br />
<br />

</p>
<tr>
</tr>
<tr>
</tr>
<tr>
</tr>
<tr>
</tr>
<tr>
</tr>
<tr>
</tr>
<p>

<table style="width:30%"><center>
<p>
<tr>
	<form action="" method="post">

<table style="width:50%">
<p>
</p>
<tr>
</tr>
<tr>
</tr>
<tr>
</tr>
<tr>
</tr>
<tr>
</tr>
<tr>
</tr>
<p>
<tr>
<table style="width:50%"><center>
<p>
<tr>
  
<input type="submit" 
name="submit"  
style="width:300px;
height:40px;
background-color:#A9A9A9;
font-size:10pt;"id="submit" 
class="button" 
value="Search"/>
</form>
<br />
<br />
<br />
<br />
<p><table cellpadding='20'><tr>
<td><h2 id="CHeadings" style="color: #8942f4;" style="background-color: #A9A9A9;"
>Description</h2></td>
<td><h2 id="CHeadings" style="color: #8942f4;" style="background-color: #A9A9A9;"
>Location<h2></td>

</tr></p>
<?php


if(array_key_exists('submit', $_POST)) {
    $dbhost = "localhost";
    $dbuser = "script";
    $dbpass = "password";
    $dbname = "msdstest";


    if( $_POST ) {$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    }
    if (!$conn) {die("Connection failed: " . mysqli_connect_error());
    }

    try {

        
            $sql = "SELECT * FROM datasheets";
            $result = mysqli_query($conn, $sql);
        
        
        echo "Searching for all entries";
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>{$row['Description']}</td>";
                echo "<td><a href='{$row["Location"]}' type='application/pdf' target='_blank'>{$row["Location"]}</a></td>
                </tr>\n";
            }
        }
        else {
               echo '<h2><font color="red">
			   Sorry no results found</font></h2>';
        }

		
        mysqli_close($conn);


    }
    catch(PDOException $e) 
       {
             echo 'ERROR: ' . $e->getMessage();
    }



}


?>
</table>
</body>
</html>
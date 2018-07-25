<!DOCTYPE html>
<html>
<head>
<title>Image Upload</title>
</head>
<body>
<h1><center>Upload File</h1>

  <br>
  <br>
  <br>

<center>
<div id="content">

  <form method="POST" action="" enctype="multipart/form-data">
  	<input type="hidden" name="size" value="1000000">
  	<div>
  	  <input type="file" name="image">
  	</div>
	  <br>
  <br>
  	<div>
      <textarea 
      	id="text" 
      	cols="40" 
      	rows="4" 
      	name="image_text" 
      	placeholder="PDF Details / Description: "></textarea>
  	</div>
	  <br>

  	<div>
  		<button type="submit" name="upload">Upload</button>
  	</div>
  </form>

  <br>
  <br>
  <?php
  flush();
 
    $dbhost = "localhost";
    $dbuser = "script";
    $dbpass = "password";
    $dbname = "msdstest";



  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
	  // Get image name
  	$image = $_FILES['image']['name'];
	  $target = "MSDSpdf/".basename($image);
	  
	  if( $_POST ) {$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	$check=mysqli_query($conn,"select * from datasheets where location='$target'");
    $checkrows=mysqli_num_rows($check);

   if($checkrows>0) {
      echo die("File already exists");
    
   } else {  
    
    if (!$conn) {die("Connection failed: " . mysqli_connect_error());
    }
	  
	
    try {
  	
  	// Get text
  	$image_text = mysqli_real_escape_string($conn, $_POST['image_text']);

  	// image file directory
  	

  	$sql = "INSERT INTO datasheets (Location, Description) VALUES ('$target', '$image_text')";
  	// execute query
  	if ($conn->query($sql) === TRUE) {
		move_uploaded_file($_FILES["image"]["tmp_name"],
	 $target);
  		echo "Image uploaded successfully";
  	}else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
		
  	
	
 
  mysqli_close($conn);
  }
	  
  catch(PDOException $e) 
       {
             echo 'ERROR: ' . $e->getMessage();
    }
		}
			}
				}
?>
  <br>
  <br>
  <br>
    <br>
  <br>
  <form action="msdsSearch.php">
<input type="submit" 
style="width:200px;
height:30px;
background-color:#42f4ee;
font-size:10pt;" value="Search Entries">
</form>
  <br>
  <br>
<form action="remove.php">
<input type="submit" 
style="width:200px;
height:30px;
background-color:#B22222;
font-size:10pt;" value="Go To remove records">
</form>
</div>
</body>
</html>
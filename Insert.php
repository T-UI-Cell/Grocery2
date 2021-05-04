<html>
<body>
<?php
 
// Create connection
$conn = new mysqli('localhost','root','');
 
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "DB Connected successfully";
//echo '<br>';
 
// this will select the Database sample_db
mysqli_select_db($conn,"items_database");
 
// Check if an item with the same name is already in the database
 $result = $conn->query("SELECT iname FROM domain");
 $found = 0;
 while ($row = mysqli_fetch_array($result)){
 	if ($row['iname'] == $_POST['iname']){
 		$found = 1;
 	}
 }
 //if not, insert the new item into both the domain and product table
 if ($found == 0){
	$insertsql = "INSERT INTO domain (iname) VALUES ('$_POST[iname]')";
	if ($conn->query($insertsql) === TRUE) {
	} else {
    	echo "Error: " . $insertsql . "<br>" . $conn->error;
	}
	//since the id is autoincremented, we have to query the domain table to find out what
	//id it gave to the new item in order to insert it into the product table
 	$idresult = $conn->query("SELECT id FROM domain WHERE iname = '$_POST[iname]'");
 	$idnum = mysqli_fetch_array($idresult);
 
	$sql="INSERT INTO products (id,cost,company,department,quantity) VALUES ('$idnum[0]','$_POST[cost]','$_POST[company]','$_POST[department]','$_POST[quantity]')";
 
	if ($conn->query($sql) === TRUE) {
    	$message = "New record created successfully";
        echo "<script type='text/javascript'>alert('$message');</script>";
	} else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}
 }
 else{
 	$message = "An item with this name already exists in the database";
        echo "<script type='text/javascript'>alert('$message');</script>";
 }
 echo '<br><br><a href="Interface.php" class="btn btn-light">Home</a>';
 
mysqli_close($conn);
?>
</body>
</html>
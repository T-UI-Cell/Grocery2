<html>
<body>
<?php
 
// Create connection
$conn = new mysqli('localhost','root','');
 
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "DB Connected successfully";
 
// this will select the Database sample_db
mysqli_select_db($conn,"items_database");
 
// create INSERT query
 
 
$sql="INSERT INTO products (iname,cost,company,department,quantity) VALUES ('$_POST[iname]','$_POST[cost]','$_POST[company]','$_POST[department]','$_POST[quantity]')";
 
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully    ";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
 
mysqli_close($conn);
?>
</body>
</html>
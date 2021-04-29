<html>
<body>
<?php
 
//Create connection
$conn = new mysqli('localhost','root','');
 
//Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 
//Selects the database
mysqli_select_db($conn,"items_database");
 
//Insert statement for new order
$sql="INSERT INTO orders (buyer,vendor,item,quantity) VALUES ('$_POST[buyer]','$_POST[vendor]','$_POST[item]','$_POST[quantity]')";


if ($conn->query($sql) === TRUE) {
	$message = "Order placed successfully";
	echo "<script type='text/javascript'>alert('$message');</script>";
	echo '<META HTTP-EQUIV="refresh" CONTENT="1;URL=Order.php">';
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}


 
mysqli_close($conn);
?>
</body>
</html>
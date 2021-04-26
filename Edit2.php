<?php 
session_start();

error_reporting (E_ALL ^ E_NOTICE);

// Create connection
$conn = new mysqli('localhost','root','');
 
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
 
// this will select the Database 
mysqli_select_db($conn,"items_database");

?>

<!DOCTYPE html>
<html>
<title> Delete </title>
<header>
<style type="text/css">
h2{
	text-align: center;
}
h1{
	text-align: center;
}
.navbar{
	text-align: center;
}
body{
	max-width: 550px;
	background: #FAFAFA;
	padding: 30px;
	margin: 50px auto;
	box-shadow: 1px 1px 25px rgba(0, 0, 0, 0.35);
	border-radius: 10px;
	border: 6px solid #305A72;
	text-align: center;
}
p{
	text-align: center;
}
input {
	margin-bottom: 10px;
}
input[type="delete"]{
	margin: 0 auto;
	display: block;
	
}
input[type="text"]{
	text-align: center;
}
#myFunction(){
	margin: 0 auto;
	display: block;
}

input.right{
	float: right;
	border: none;
  color: black;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  border-color: black;
  font-size: 16px;
  margin: 0px 2px;
  cursor: pointer;
  background-color: red;
}
</style>
</header>
<body>

<h1>Edit Grocery Item</h1>
<div class="navbar">
  <a class="active" href="Interface.php"><i class="fa fa-fw fa-home"></i> Home</a>
  <a href="Items.php"><i class="fa fa-fw fa-search"></i>Items</a>
  <a href="Delete2.php"><i class="fa fa-fw fa-envelope"></i>Delete</a>
</div>
<h2>Enter ID to Edit Item</h2>
<form method="post" action="">

  <label for="id">Id:</label><br>
  <input type="text" id="id" name="id"><br>

  <label for="iname">Item Name:</label><br>
	<input type="text" id="iname" name="iname"><br>
  
	<label for="cost">Item Cost:</label><br>
	<input type="text" id="cost" name="cost"><br>
  
	<label for="company">Distributor:</label><br>
	<input type="text" id="company" name="company"><br>
  
	<label for="department">Department:</label><br>
	<input type="text" id="department" name="department"><br>
  
	<label for="quantity">Quantity:</label><br>
	<input type="text" id="quantity" name="quantity"><br>
  
  <input type="submit" value="Edit" name="btnEdit">
<?php
//var for id here
$varId=$_POST['id'];
$varName=$_POST['iname'];
$varCost=$_POST['cost'];
$varDis=$_POST['company'];
$varDep=$_POST['department'];
$varQty=$_POST['quantity'];
 
 if (isset($_POST['btnEdit'])) {
   $sql = "UPDATE products SET iname='$varName', cost='$varCost', company='$varDis', department='$varDep', quantity='$varQty' WHERE id='$varId'";

if ($conn->query($sql) === TRUE) {
  $message = "Record Edited successfully";
    echo "<script type='text/javascript'>alert('$message');</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
 }

 
mysqli_close($conn);
?>
 


</body>
</html>
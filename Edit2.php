<?php 
session_start();

error_reporting (E_ALL ^ E_NOTICE);

if (isset($_GET['index'])) {
        $index = $_GET['index'];
    }
    else{
      $index = -1;
    }
$idArray = $_SESSION["idArray"];

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
<?php
if ($index != -1)
{
	$sql = "SELECT id, iname, cost, company, department, quantity FROM products natural join domain WHERE id = '".$idArray[$index]."'";
    $res_data = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($res_data);
	$id = $row["id"];
    $iname = $row["iname"];
    $cost = $row["cost"];
    $company = $row["company"];
    $department = $row["department"];
    $quantity = $row["quantity"];
}
?>

<form method="post" action="">

  <label for="id">Id:</label><br>
  <input type="text" id="id" name="id"
  	<?php if($index != -1){echo 'value="'.$id.'"';} ?>>
  <br>

  <label for="iname">Item Name:</label><br>
	<input type="text" id="iname" name="iname" 
		<?php if($index != -1){echo 'value="'.$iname.'"';} 
		 	  if ($index == -1) {echo 'disabled';}?>>
	<br>
  
	<label for="cost">Item Cost:</label><br>
	<input type="text" id="cost" name="cost"
		<?php if($index != -1){echo 'value="'.$cost.'"';} 
		 	  if ($index == -1) {echo 'disabled';} ?>>
	<br>
  
	<label for="company">Distributor:</label><br>
	<input type="text" id="company" name="company"
		<?php if($index != -1){echo 'value="'.$company.'"';} 
		 	  if ($index == -1) {echo 'disabled';} ?>>
	<br>
  
	<label for="department">Department:</label><br>
	<input type="text" id="department" name="department"
		<?php if($index != -1){echo 'value="'.$department.'"';} 
		 	  if ($index == -1) {echo 'disabled';} ?>>
	<br>
  
	<label for="quantity">Quantity:</label><br>
	<input type="text" id="quantity" name="quantity"
		<?php if($index != -1){echo 'value="'.$quantity.'"';} 
		 	  if ($index == -1) {echo 'disabled';} ?>>
	<br>
	<input type="submit" value="Search" name="btnSearch">

  	<?php if ($index != -1){ echo '<input type="submit" value="Edit" name="btnEdit">';} ?>
<?php
//var for id here
$varId=$_POST['id'];
$varName=$_POST['iname'];
$varCost=$_POST['cost'];
$varDis=$_POST['company'];
$varDep=$_POST['department'];
$varQty=$_POST['quantity'];
 
if (isset($_POST['btnSearch'])) {

  $idArray[0] = $varId;
  $_SESSION["idArray"] = $idArray;
  header("Location: Edit2.php?index=0");
}

 if (isset($_POST['btnEdit'])) {
   $sql = "UPDATE products SET cost='$varCost', company='$varDis', department='$varDep', quantity='$varQty' WHERE id='$varId'";

if ($conn->query($sql) === TRUE) {
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$sql = "UPDATE domain SET iname='$varName' WHERE id='$varId'";

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
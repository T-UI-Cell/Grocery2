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

<h1>Delete Grocery Item</h1>
<div class="navbar">
  <a class="active" href="Interface.php"><i class="fa fa-fw fa-home"></i> Home</a>
  <a href="Items.php"><i class="fa fa-fw fa-search"></i>Items</a>
  <a href="edit.php"><i class="fa fa-fw fa-envelope"></i> Edit</a>
</div>
<h2>Enter ID to delete Item</h2>

<form action="" method= "post" >
  <input type="text" <?php if($index == -1){ echo 'placeholder="Delete"';}else{echo 'value="'.$idArray[$index].'"';} ?> id="id" name="id">
  <input type="submit" value="Delete" name="btnDelete">
</form>
  
<?php



//var for id here
$varid=$_POST['id'];
 
 if (isset($_POST['btnDelete'])) {
   
// create INSERT query
$sql="DELETE FROM domain WHERE id='$varid'";

if ($conn->query($sql) === TRUE) {
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$sql="DELETE FROM products WHERE id='$varid'";

if ($conn->query($sql) === TRUE) {
  $message = "Record deleted successfully";
    echo "<script type='text/javascript'>alert('$message');</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
 }

 
mysqli_close($conn);
?>
 


</body>
</html>
	
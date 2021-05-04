<?php 
session_start();

error_reporting (E_ALL ^ E_NOTICE);

//Get the item id from the previous page, if you came from another page.
//Otherwise set index to -1
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
<head>
    <title> Delete </title>
</head>
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
  <a class="active" href="Interface.php"><i class="fa fa-fw fa-home"></i> Insert</a>
  <a href="Items.php"><i class="fa fa-fw fa-search"></i>Items</a>
  <a href="Edit.php"><i class="fa fa-fw fa-envelope"></i> Edit</a>
</div>
<h3>Enter ID to delete Item</h3>
<?php

//if coming from another page, get the name of the item you are looking to delete
//from the table using the idArray.
$sql="SELECT iname FROM domain WHERE id='$idArray[$index]'";

$data = mysqli_query($conn,$sql);
$name = mysqli_fetch_array($data)[0];
?>
<form action="" method= "post" >
  <!--If coming with an id put the id and name into the text boxes
      otherwise just give a placeholder value-->
  <input type="text" <?php if($index == -1){ echo 'placeholder="Enter ID"';}else{echo 'value="'.$idArray[$index].'"';} ?> id="id" name="id">
  <input type="text" <?php echo 'value="'.$name.'"'; ?> id="name" name="name">
  <input type="submit" value="Search" name="btnSearch">
  <!--Only display the delete button if there is something to delete-->
  <?php if($index != -1){echo '<input type="submit" value="Delete" name="btnDelete">';} ?>
</form>
  
<?php



//Store the id of the item you want to interact with
$varid=$_POST['id'];

 //Delete ID
 if (isset($_POST['btnDelete'])) {
   
    // create DELETE query
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

//Reload page with the info for the Id entered
if (isset($_POST['btnSearch'])){
  $idArray[0] = $varid;
  $_SESSION["idArray"] = $idArray;
  header("Location: Delete.php?index=0");

}
 
mysqli_close($conn);
?>
 


</body>
</html>
	
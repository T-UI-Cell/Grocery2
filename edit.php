<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="edit.css">
</head>

<body>
	<h2>Edit product</h2>
	
	<section>
		<ul>
			<li><a href="Interface.php">Home</a></li>
			<li><a href="Delete.php">Delete</a></li>
			<li><a href="Items.php">Item list</a></li>
		</ul>
	</section>
	

<form method="post" action="edit.php">
	<h3>Search for a product to edit:</h2>
	<input type="text" id="itemname" name="itemname"><br>
	<label for="itemcost">Item Cost:</label><br>
	<input type="text" id="itemcost" name="costinput" value="" readonly=""><br>
	<label for="distributor">Distributor:</label><br>
	<input type="text" id="distributor" name="dinput" value="" readonly=""><br>
	<label for="department">Department:</label><br>
	<input type="text" id="department" name="depinput" value="" readonly=""><br>
	<label for="quantity">Quantity:</label><br>
	<input type="text" id="quantity" name="qty" value="" readonly=""><br>
	
	<input type="submit" value="Submit">
		
	<?php

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "items_database";



		$conn = new mysqli('localhost','root','');
		mysqli_select_db($conn,"items_database");

		if (isset($_POST['itemname'])) {
			try {
    			$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    			$stmt = $conn->prepare("SELECT * FROM `products` WHERE `iname` LIKE 'itemname'");
    			$stmt->execute();
    			$results = $stmt->fetchAll();
    		}
    		catch(PDOException $e) {
    		echo "Error: " . $e->getMessage();
			}

    	}


	 ?>
	
</body>
</html>
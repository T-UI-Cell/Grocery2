<html>
<head>
<style type="text/css">
h1{
	text-align: center;
}
body{
	max-width: 450px;
	background: #FAFAFA;
	padding: 30px;
	margin: 50px auto;
	box-shadow: 1px 1px 25px rgba(0, 0, 0, 0.35);
	border-radius: 10px;
	border: 6px solid #305A72;
}
input {
	margin-bottom: 10px;
}
input[type="submit"]{
	margin: 0 auto;
	display: block;
}

.navbar{
	text-align: center;
}

</style>
</head>
<body>

<h1>Inventory System</h1>
<div class="navbar">
  <a href="Home.html"><i class="fa fa-fw fa-search"></i>Home</a>
  <a href="Items.php"><i class="fa fa-fw fa-search"></i>Items</a>
  <a href="Edit.php"><i class="fa fa-fw fa-envelope"></i> Edit</a>
  <a href="Delete.php"><i class="fa fa-fw fa-envelope"></i>Delete</a>
  
</div>
<form action="Insert.php" method= "post"  >
<center>
<br>
	<label for="iname">Item name:</label><br>
	<input type="text" id="iname" name="iname" value=""><br>
	<label for="cost">Cost:</label><br>
	<input type="text" id="cost" name="cost" value=""><br>
	<label for="company">Distributor:</label><br>
	<input type="text" id="company" name="company" value=""><br>
	<label for="department">Department:</label><br>
	<select name="department" id="department">
		<option value="Meat">Meat</option>
		<option value="Cereal">Cereal</option>
		<option value="Cheese">Cheese</option>
		<option value="Produce">Produce</option>
		<option value="Drinks">Drinks</option>
		<option value="Grocery">Grocery</option>
	</select><br>
	<label for="quantity">Quantity of Item:</label><br>
	<input type="text" id="quantity" name="quantity" value=""><br><br>
	<input type="submit" value="Submit">
</center>
	
</body>
</html>
	
	
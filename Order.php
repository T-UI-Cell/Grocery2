<html>
<head>
<style type="text/css">
h2{
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
#quantity{
	width: 50px;
}


</style>
</head>
<body>

<h2>Vendor Order</h2>

<form action="Orders.php" method= "post"  >
	<label for="buyer">Ordered By:</label><br>
	<input type="text" id="buyer" name="buyer" value=""><br>
	<label for="vname">Vendor:</label><br>
	<input type="text" id="vendor" name="vendor" value=""><br>
	<label for="item">Item:</label><br>
	<input type="text" id="item" name="item" value=""><br>
	<label for="quantity">Quantity of Item:</label><br>
	<input type="text" id="quantity" name="quantity" value=""><br><br>
	<input type="submit" value="Submit">
  <button type="button" onclick="document.location='Interface.php'">Home</button>
	
</body>
</html>
	
	
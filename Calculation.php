<!DOCTYPE html>
<html>
<title> Calculate Cost </title>
<header>
<link rel="stylesheet" href="css/Delete.css">
</header>
<body>

<h1>Calculate</h1>
<div class="navbar">
  <a class="active" href="Interface.html"><i class="fa fa-fw fa-home"></i> Home</a>
  <a href="#"><i class="fa fa-fw fa-search"></i> Search</a>
  <a href="#"><i class="fa fa-fw fa-envelope"></i> Edit</a>
  <a href="Delete.html"><i class="fa fa-fw fa-user"></i> Delete</a>
</div>



<form name="myform" action="textentry2.php" method="POST">
<h2> <u> Enter Item Cost</u></h2>
<input type="text" name="itemCost" onkeyup="calc()">
<h2> <u> Enter Item Qty</u></h2>
<input type="text" name="itemQty" onkeyup="calc()">
<h2> <u> Item Total</u></h2>
<input type="text" name="text3"    >
</form>
<script>
function calc()
  {
    var elm = document.forms["myform"];

    if (elm["itemCost"].value != "" && elm["itemQty"].value != "")
      {elm["text3"].value = (elm["itemCost"].value) * parseInt(elm["itemQty"].value);}
  }
</script>


</body>
</html>	

</body>
</html>
	
	
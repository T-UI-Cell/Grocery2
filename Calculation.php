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


<h1> Find Total Product Cost</h1>
<form name="myform1" action="textentry2.php" method="POST">
<h2> <u> Enter Product Cost</u></h2>
<input type="text" name="itemCost" onkeyup="calc()">
<h2> <u> Enter Product Qty</u></h2>
<input type="text" name="itemQty" onkeyup="calc()">
<h2> <u>  Total Product Cost </u></h2>
<input type="text" name="totalProd"    >
</form>
<script>
function calc()
  {
    var elm = document.forms["myform1"];

    if (elm["itemCost"].value != "" && elm["itemQty"].value != "")
      {elm["totalProd"].value = (elm["itemCost"].value) * parseInt(elm["itemQty"].value);}
  }
</script>


<h1> Find Indivual Cost</h1>
<form name="myform2" action="textentry2.php" method="POST">
<h2> <u> Enter Product Total </u></h2>
<input type="text" name="productTotal" onkeyup="calc()">
<h2> <u> Enter Product Qty</u></h2>
<input type="text" name="prodQty" onkeyup="calc()">
<h2> <u>  Indivual Product Cost</u></h2>
<input type="text" name="inCost"    >
</form>
<script>
function calc()
  {
    var elm = document.forms["myform2"];

    if (elm["productTotal"].value != "" && elm["prodQty"].value != "")
      {elm["inCost"].value = (elm["productTotal"].value) / parseInt(elm["prodQty"].value);}
  }
</script>


</body>
</html>	

</body>
</html>
	
	
<!DOCTYPE html>
<html>
<title> Delete </title>
<header>
<link rel="stylesheet" href="css/Delete.css">
</header>
<body>

<h1>Delete Grocery Item</h1>
<div class="navbar">
  <a class="active" href="Interface.html"><i class="fa fa-fw fa-home"></i> Home</a>
  <a href="#"><i class="fa fa-fw fa-search"></i> Search</a>
  <a href="#"><i class="fa fa-fw fa-envelope"></i> Edit</a>
  <a href="Delete.html"><i class="fa fa-fw fa-user"></i> Delete</a>
</div>
<h2> <u> Search for item to Delete...</u></h2>
<p> Search by Item Name</p>
  <input type="text" placeholder="Search..">
  
 
<p> Inventory.. </p>


<p> <br>
<br>* DataBase Insertion*</p>
<?php
echo "<table style='border: solid 1px black;'>";
 echo "<tr><th>Item Name</th><th>Cost</th><th>Company</th><th>Department</th><th>Quantity</th></tr>";

class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }
 
    function current() {
        return "<td style='width: 150px; border: 1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() {
        echo "<tr>";
    }

    function endChildren() {
        echo "</tr>" . "\n";
    }
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "items_database";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT iname, cost, company, department, quantity FROM products Limit 5, 10  ");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>

<br>
<br>
<!--this is where the data base will pull up with the attached string matching!-->
<button onclick="myFunction()" value="Click to Delete" </button>
<script> function myFunction() { confirm ("Click to Confirm Item deletes");
}
</script>	

</body>
</html>
	
	
<?php
session_start();
?>
<html>
<head>
    <title>Items</title>
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
    /*th{
        width:200px;
    }*/
</style>
</head>
<body>
<?php
    $idArray = array(0,0,0,0,0,0,0,0,0,0);
    if (isset($_GET['pageno'])) {
        $pageno = $_GET['pageno'];
    } else {
        $pageno = 1;
    }
    $no_of_records_per_page = 10;
    $offset = ($pageno-1) * $no_of_records_per_page;

    $conn=mysqli_connect("localhost","root","","items_database");
    // Check connection
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        die();
    }

    $total_pages_sql = "SELECT COUNT(*) FROM products";
    $result = mysqli_query($conn,$total_pages_sql);
    $total_rows = mysqli_fetch_array($result)[0];
    $total_pages = ceil($total_rows / $no_of_records_per_page);

    $sql = "SELECT id, iname, cost, company, department, quantity FROM products natural join domain LIMIT $offset, $no_of_records_per_page";
    $res_data = mysqli_query($conn,$sql);
    echo '<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Item Name</th>
      <th scope="col">Cost</th>
      <th scope="col">Company</th>
      <th scope="col">Department</th>
      <th scope="col">Quantity</<th>
    </tr>
  </thead>
  <tbody>';
    $index = 0;
    while($row = mysqli_fetch_array($res_data)){
        $idArray[$index] = $row["id"];
       echo '<tr><th scope="row">'.$row["id"].'</th><td>'.$row["iname"].'</td><td>'.$row["cost"].'</td><td>'.$row["company"].'</td><td>'.$row["department"].'</td><td>'.$row["quantity"].'</td><td><a href = "Delete2.php?index='.$index.'">Delete</a></td></tr>';
        $index++;
  }
  echo "</tbody></table>";
  
  $_SESSION["idArray"] = $idArray;
    mysqli_close($conn);
?>

    <ul class="pagination">
        <li><a href="?pageno=1">First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
        </li>
        <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
    </ul>
  </br>
    <a href="Interface.php" class="btn btn-light">Home</a>
</body>
</html>

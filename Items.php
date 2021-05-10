<?php
//The session keeps an array to keep track of what Item is being looked at
session_start();
?>
<html>
<head>
    <title>Items List</title>
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

    //Initialize the array to keep track of the Item in focus
    $idArray = array();

    //Look to see if you came from another page of the Items list and if not set the page number to 1
    if (isset($_GET['pageno'])) {
        $pageno = $_GET['pageno'];
    } else {
        $pageno = 1;
    }


    if (isset($_POST['perpage'])) {
        $no_of_records_per_page = $_POST['perpage'];
    }
    else {
      $no_of_records_per_page = 10;
    }
    $_SESSION['num_per_page'] = $no_of_records_per_page;

    //Set the number of records displayed and set up the offset to pull the correct number of things from the database
    //     TO FIX
    //     we want to be able to change how many records per page on the fly
    //$no_of_records_per_page = 10;
    $offset = ($pageno-1) * $no_of_records_per_page;

    //open the connection to the database
    $conn=mysqli_connect("localhost","root","","items_database");
    // Check connection
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        die();
    }

    //find how many pages of items we have in the database
    $total_pages_sql = "SELECT COUNT(*) FROM products";
    $result = mysqli_query($conn,$total_pages_sql);
    $total_rows = mysqli_fetch_array($result)[0];
    $total_pages = ceil($total_rows / $no_of_records_per_page);

    //get the records for as many lines as we chose to display
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

    //build the rows of the Item display
    $index = 0; 
    //for each row that was retrieved from the database
    while($row = mysqli_fetch_array($res_data)){
        //add the Item id to the array
        array_push($idArray,$row["id"]);
        //write the row
        echo '<tr><th scope="row">'.$row["id"].'</th><td>'.$row["iname"].'</td><td>'.$row["cost"].'</td><td>'.$row["company"].'</td><td>'.$row["department"].'</td><td>'.$row["quantity"].'</td><td><a href = "Edit.php?index='.$index.'">Edit</a></td><td><a href = "Delete.php?index='.$index.'">Delete</a></td></tr>';
        //increment the index to keep track of what Item is attached to each link
        $index++;
  }
  echo "</tbody></table>";
  
  //store the array in the session
  $_SESSION["idArray"] = $idArray;
    mysqli_close($conn);
?>
<br />
<form method = "post">
  <label for="perpage">Number of rows per page:</label><br>
    <select name="perpage" id="perpage" onchange="this.form.submit();">
      <option value="">Choose</option>
      <option value="5">5</option>
      <option value="10">10</option>
      <option value="15">15</option>
      <option value="20">20</option>
    </select>
</form><br>
<!--I got this pagination code online-->
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
    <a href="Home.html" class="btn btn-light">Home</a>
    <a href="Interface.php" class="btn btn-light">Insert</a>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Campsite Visitors</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <h1 class="text-center">Campsite Visitors</h1>
    <?php echo $result ?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Date</th>
      <th scope="col">Name</th>
      <th scope="col">Personality</th>
      <th scope="col">Species</th>
      <th scope="col">Invited To Island?</th>
    </tr>
  </thead>
  <tbody>
  <?php
//  Create and check connection to the server
$db_host="localhost";
$db_user="root";
$db_password="root";

$con=mysqli_connect($db_host, $db_user, $db_password) or die(mysqli_connect_error());

// Select the database we want to query
mysqli_select_db($con,'acnh') or die(mysqli_connect_error($con));

// Query the database
$sql="SELECT * FROM visitor";

$result=mysqli_query($con, $sql) or die("Error:".mysqli_error());

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["date"]."</td><td>".$row["name"]."</td><td>".$row["personality"]."</td><td>".$row["species"]."</td><td>".$row["invited"]."</td><tr>";
  }
} else {
  echo "0 results";
}

$con->close();
?>
  </tbody>
</table>
<p class="text-center"><a href="add.html">Add New Visitor</a></p>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
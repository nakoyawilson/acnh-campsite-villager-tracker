<?php
	if(isset($_POST['submit']))
	{
		// Capture the values and store in PHP variables
		$date=$_POST['date'];
		$name=$_POST['name'];
		$personality=$_POST['personality'];
		$species=$_POST['species'];
		$invited=$_POST['invited'];

		//  Create and check connection to the server
		$db_host="localhost";
		$db_user="root";
		$db_password="root";

		$con=mysqli_connect($db_host, $db_user, $db_password) or die(mysqli_connect_error());

		// Select the database we want to query
		mysqli_select_db($con,'acnh') or die(mysqli_connect_error($con));
		
		// Query the database
		$sql="SELECT * FROM visitor WHERE date='$date'";

		$result=mysqli_query($con, $sql) or die("Error:".mysqli_error());

		$rowcount=mysqli_num_rows($result);

		if($rowcount>=1) {
			echo "<script>
							alert('Information for date already exists')
							window.location=\"add.html\"
						</script>";
		}
		else
		{
			// Insert data into the visitor table
			$sql="INSERT INTO visitor
			VALUES('$date','$name','$personality','$species', '$invited')";

			if(mysqli_query($con,$sql))
			{
				mysqli_close($con);
			}
			else
			{
				echo "Error inserting data in the visitor table";
			}
		}
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Campsite Visitor Tracker</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-6 offset-3">
        <h1 class="text-center  ">Campsite Visitor Tracker</h1>
          <div class="mb-3">
            <label for="date" class="form-label">Date:</label>
            <?php echo $date ?>
          </div>
          <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <?php echo $name ?>
          </div>
          <div class="mb-3">
            <label for="personality" class="form-label">Personality Type:</label>
            <?php echo $personality ?>
          </div>
          <div class="mb-3">
            <label for="species" class="form-label">Species:</label>
            <?php echo $species ?>
          </div>
          <div class="mb-3">
            <label for="invited" class="form-label">Invited to Island?</label>
            <?php echo $invited ?>
          </div>
      </div>
    </div>
    <p><a href="index.php">Back to Index</a></p>
    <p><a href="add.html">Add New Visitor</a></p>
    </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
</body>

</html>
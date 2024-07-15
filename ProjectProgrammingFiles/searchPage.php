<?php
@$db = new mysqli('localhost', 'warnerx3_binary', 'bionicle731', 'warnerx3_DnDFinal');
if (mysqli_connect_errno()) {
     echo 'Error: Could not connect to database.  Please try again later.';
     exit;
  }
?>

<html>
<head>
  <title>Dragons and Databases Catalog Results</title>
</head>
<body>
<h1>Dragonss and Databases Catalog Results</h1>
<?php
  // create short variable names
  $searchtype=$_POST['searchtype'];
  $searchterm=trim($_POST['searchterm']);

  if (!$searchtype || !$searchterm) {
     echo 'You have not entered search details.  Please go back and try again.';
     exit;
  }

  if (!get_magic_quotes_gpc()){
    $searchtype = addslashes($searchtype);
    $searchterm = addslashes($searchterm);
  }



  $query = "select * from courses where ".$searchtype." like '%".$searchterm."%'";
  $result = $db->query($query);

  $num_results = $result->num_rows;

  echo "<p>Number of Courses found: ".$num_results."</p>";

  for ($i=0; $i <$num_results; $i++) {
     $row = $result->fetch_assoc();
     echo "<p><strong>".($i+1).". Course: ";
     echo htmlspecialchars(stripslashes($row['topic']));
     echo "</strong><br />Description: ";
     echo stripslashes($row['description']);
     echo "<br />Course ID: ";
     echo stripslashes($row['courseID']);
     echo "<br />Seats: ";
     echo stripslashes($row['numberStudents']);
     echo "</p>";
  }

  $result->free();
  $db->close();

?>
</body>
</html>

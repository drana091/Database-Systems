<html>
<head>
  <title>Dragons and Databases Add A Course</title>
</head>
<body>
<h1>Dungeons And Databases Add A Course Result</h1>
<?php
  // create short variable names
  $courseID=$_POST['courseID'];
  $topic=$_POST['topic'];
  $description=$_POST['description'];
  $modality=$_POST['modality'];
  $numberStudents=$_POST['numberStudents'];
  $credits=$_POST['credits'];
  
  if (!$courseID || !$topic || !$description || !$modality) {
     echo "You have not entered all the required details.<br />"
          ."Please go back and try again.";
     exit;
  }

  if (!get_magic_quotes_gpc()) {
    $courseID = addslashes($courseID);
    $topic = addslashes($topic);
    $description = addslashes($description);
    $modality = addslashes($modality);
    $numberStudents = doubleval($numberStudents);
    $credits = doubleval($credits);
  }

  @$db = new mysqli('localhost', 'warnerx3_binary', 'bionicle731', 'warnerx3_DnDFinal');

  if (mysqli_connect_errno()) {
     echo "Error: Could not connect to database.  Please try again later.";
     exit;
  }

  $query = "insert into courses values
            ('".$courseID."', '".$topic."', '".$description."', '".$modality."', '".$numberStudents."', '".$credits."')";
  $result = $db->query($query);

  if ($result) {
      echo  $db->affected_rows." Course inserted into database.";
  } else {
  	  echo "An error has occurred.  The item was not added.";
  }

  $db->close();
?>
</body>
</html>

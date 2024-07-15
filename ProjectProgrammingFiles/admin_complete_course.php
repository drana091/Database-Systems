<?php 
session_start();
$db = new mysqli('localhost', 'warnerx3_binary', 'bionicle731','warnerx3_DnDFinal');

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $courseid = $_POST['courseID'];
    
    $query = 
    "insert into completedcourses 
    select * from studentincourse
    where studentincourse.courseid = '$courseid'";
    mysqli_query($db, $query);
    
    $query = "delete from studentincourse where studentincourse.courseid='$courseid'";
    mysqli_query($db, $query);

    

    
    // header("Location: dashboard.php");
    // die;
}

?>


<html>
    <body>
        <a href='admin_dash.php'>Back to Admin Dashboard</a>
        
        <h1>Current Active Courses</h1>
        <?php 
        $query = "select DISTINCT c.courseID, topic from courses c 
        join studentincourse s on c.courseID = s.courseid";
        
        $result = $db->query($query);
        
        $num_results = $result->num_rows;
        
        for($i = 0; $i < $num_results; $i++){
            $row = $result->fetch_assoc();
            echo "<p><strong>".($i+1).". Course Name: ";
            echo htmlspecialchars(stripslashes($row['topic']));
            echo '<form method="POST" action="admin_complete_course.php"><input type="hidden" name="courseID" value="'.$row['courseID'].'"><input type="submit" value="Complete Course" name="submit"></form>';
        }
        ?>
    </body>
</html>
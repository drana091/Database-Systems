<?php 
session_start();

$db = new mysqli('localhost', 'warnerx3_binary', 'bionicle731','warnerx3_DnDFinal');

    // check login
    if(isset($_SESSION['user_id'])) {
        $id = $_SESSION['user_id'];
        $query = "select * from user where user_id = '$id' limit 1";

        $result = mysqli_query($db, $query);

        if($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
        }
    }
    
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $courseid = $_POST['courseID'];
        $user_id = $_SESSION['user_id'];
        // echo $courseid;
        // echo $user_id;
        
        $query = "delete from studentincourse where courseid = '$courseid' and user_id = '$user_id'";
        mysqli_query($db, $query);
        
        header("Location: dashboard.php");
        die;
    }
    
?>

<html>
    <body>
        <a href='logout.php'>Logout</a>
        <h1>Hello <?php echo $user_data['user_name']; ?></h1>
        
        <a href='register.php'>Register for Courses</a><br>
        <a href='searchCourses.html'>View Course Catalog</a><br>
        <a href='user_completed.php'>Display Courses That Have Been Completed</a><br>
        <a href='profile.php'>Profile</a><br>
        <h2>Registered Classes</h2>
        <?php 
            $id = $user_data['user_id'];
            

            $query = "select * 
            from courses c 
            join studentincourse s on c.courseID = s.courseid
            join user u on u.user_id = s.user_id
            where u.user_id = $id";
            
            $result = $db->query($query);

            $num_results = $result->num_rows;
            
            for ($i=0; $i <$num_results; $i++) {
                $row = $result->fetch_assoc();
                echo "<p><strong>".($i+1).". Course Name: ";
                echo htmlspecialchars(stripslashes($row['topic']));
                echo "</strong><br />Course Description: ";
                echo stripslashes($row['description']);
                echo "<br />Course ID: ";
                echo stripslashes($row['courseID']);
                echo "<br />Seats: ";
                echo stripslashes($row['numberStudents']);
                echo "</p>";
                echo '<form method="POST" action="dashboard.php"><input type="hidden" name="courseID" value="'.$row['courseID'].'"><input type="submit" value="remove" name="submit"></form>';
                
            }
            
            $result->free();
            $db->close();
        ?>
    </body>
</html>
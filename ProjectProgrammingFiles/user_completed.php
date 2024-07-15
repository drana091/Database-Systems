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


?>

<html>
    <body>
        <a href='dashboard.php'>Back to Dashboard</a>
        <h1>Your Completed Courses</h1>
        
        
        
        <?php 
            $id = $user_data['user_id'];
            $creditcumulative = 0;
        
            // $query = "select DISTINCT c.courseID, topic from courses c join completedcourses s on c.courseID = s.courseid";
            $query = "select * from courses c join completedcourses cc on cc.courseid = c.courseID join user u on u.user_id = cc.user_id where u.user_id = $id";
            
            $result = $db->query($query);
            
            $num_results = $result->num_rows;
            
            for($i=0; $i <$num_results; $i++) {
                $row = $result->fetch_assoc();
                $creditcumulative = $creditcumulative + $row['credits'];
                echo "<p><strong>".($i+1).". Course Name: ";
                echo htmlspecialchars(stripslashes($row['topic']));
                echo "</strong><br />Course Description: ";
                echo stripslashes($row['description']);
                echo "<br />Course ID: ";
                echo stripslashes($row['courseID']);
                echo "<br />Seats: ";
                echo stripslashes($row['numberStudents']);
                echo "<br />Credits: ";
                echo stripslashes($row['credits']);
                echo "</p>";
            }
            echo "<p>Total Credits: ";
            echo $creditcumulative;
            echo "</p>"
        ?>
    </body>
</html>
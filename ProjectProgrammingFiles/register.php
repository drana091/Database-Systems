<?php 
session_start();

            
$db = new mysqli('localhost', 'warnerx3_binary', 'bionicle731','warnerx3_DnDFinal');
// echo $_SESSION['user_id'];

    // check login
    if(isset($_SESSION['user_id'])) {
        $id = $_SESSION['user_id'];
        $query = "select * from user where user_id = '$id' limit 1";

        $result = mysqli_query($db, $query);

        if($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            // return $user_data;
        }
    }

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $courseid = $_POST['courseID'];
        $user_id = $_SESSION['user_id'];
        // echo "courseid: ".$courseid;
        // echo "userid:".$user_id;
        
        $query = "insert into studentincourse (courseid, user_id) values ('$courseid', '$user_id')";
        mysqli_query($db, $query);
        
        header("Location: dashboard.php");
        die;
    }

?>

<html>
    <body>
        <h2>Courses</h2>
        <br>
        
        <?php 
            
            
            $query = "select * from courses ";
            
            $result = $db->query($query);
            
            $num_results = $result->num_rows;
            

            for ($i=0; $i <$num_results; $i++) 
            {
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
                echo '<form method="POST" action="register.php"><input type="hidden" name="courseID" value="'.$row['courseID'].'"><input type="submit" value="register" name="submit"></form>';
                
            }
            $result->free();
            $db->close();
        ?>

    </body>
</html>


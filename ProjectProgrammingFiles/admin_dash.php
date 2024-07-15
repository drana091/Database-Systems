<?php 
session_start();

$db = new mysqli('localhost', 'warnerx3_binary', 'bionicle731','warnerx3_DnDFinal');

    // check login
    if(isset($_SESSION['userID'])) {
        $id = $_SESSION['userID'];
        $query = "select * from admin_user where userID = '$id' limit 1";

        $result = mysqli_query($db, $query);

        if($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
        }
    }
      
?>

<html>
    <body>
        <a href='admin_logout.php'>Logout</a>
        <h1>Hello <?php echo $user_data['admin_user_name']; ?></h1>
        <a href='newCourse.html'>Add A New Course</a><br>
        <a href='admin_complete_course.php'>Complete Active Course</a>
    </body>
</html>
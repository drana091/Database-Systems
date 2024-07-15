<?php 
session_start();

$db = new mysqli('localhost', 'warnerx3_binary', 'bionicle731','warnerx3_DnDFinal');


if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $admin_user_name = $_POST['admin_user_name'];
    $admin_password = $_POST['admin_password'];

    if(!empty($admin_user_name) && !is_numeric($admin_user_name) && !empty($admin_password))
    {
        $query = "select * from admin_user where admin_user_name = '$admin_user_name' limit 1";

        $result = mysqli_query($db, $query);

        if($result && mysqli_num_rows($result) > 0)
        {
            $user_data = mysqli_fetch_assoc($result);
            
            if($user_data['admin_password'] === $admin_password)
            {
                $_SESSION['userID'] = $user_data['userID'];
                header("Location: admin_dash.php");
                die;
            }
        }
        echo "You must enter the correct username or password";
    } else
    {
        echo "You must enter a valid username and password";
    }
}
?>

<html>
    <body>
        <br>
        <h1> Admin Login </h1>
        <form method="post">
            <label for="admin_username">Username:</label>
            <input type="text" id="admin_username" name="admin_user_name" required><br><br>
            <label for="password">Password:</label>
            <input type="password" id="admin_password" name="admin_password" required><br><br>
            <button type="submit"> Login </div>
        </form>
    </div>
    </body>
</html>
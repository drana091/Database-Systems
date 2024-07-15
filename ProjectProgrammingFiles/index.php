<?php 
session_start();

$db = new mysqli('localhost', 'warnerx3_binary', 'bionicle731','warnerx3_DnDFinal');

// include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if(!empty($user_name) && !is_numeric($user_name) && !empty($password))
    {
        $query = "select * from user where user_name = '$user_name' limit 1";

        $result = mysqli_query($db, $query);

        if($result && mysqli_num_rows($result) > 0)
        {
            $user_data = mysqli_fetch_assoc($result);
            
            if($user_data['password'] === $password)
            {
                $_SESSION['user_id'] = $user_data['user_id'];
                header("Location: dashboard.php");
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
        <a href="admin_login.php">Admin Login</a>
        <br>
        <a href='signup.php'>User Signup</a>
        <h1> Login </h1>
        <form method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="user_name" required><br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>
            <button type="submit"> Login </div>
        </form>
    </div>
    </body>
</html>
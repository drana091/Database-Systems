<?php 
$db = new mysqli('localhost', 'warnerx3_binary', 'bionicle731','warnerx3_DnDFinal');

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $Name = $_POST['Name'];
    $Address = $_POST['Address'];
    $Topics = $_POST['Topics'];
    $Descrip = $_POST['Descrip'];
    $Demog = $_POST['Demog'];
   
    
    if(!empty($user_name) & !is_numeric($user_name) & !empty($password)){
        $user_id = "";
    
        $len = rand(9, 10);
        for ($i=0; $i < $len; $i++) { 
            $user_id .= rand(0,9);
        }

        $query = "insert into user (user_id, user_name, password, Name, Address, Topics, Descrip, Demog) values ('$user_id','$user_name', '$password', '$Name', '$Address', '$Topics', '$Descrip', '$Demog')";
        mysqli_query($db, $query);
        
        header("location: index.php");
        die;
    }
}


?>

<html>
    <body>
        <h1>Signup</h1>
        <br>
        <a href='index.php'>Back to Login</a>
        <br><br>
        <form method='post' action='signup.php'>
            <label for="Name"> Name:</label>
            <input type="text" id="Name" name="Name" required><br><br>
            
            <label for="Address"> Address:</label>
            <input type="text"id="Address" name="Address" required><br><br>
            
            <label for="Topics"> Interested Topics:</label>
            <input type="text"id="Topics" name="Topics" required><br><br>
            
            <label for="Descrip"> How are you looking to apply what you learned?:</label>
            <input type="text" id="Descrip" name="Descrip" required><br><br>
            
             <label for="Demog"> Tell us a little about yourself:</label>
            <input type="text" id="Demog" name="Demog" required><br><br>
            
            <label for="username">Username:</label>
            <input type="text" id="username" name="user_name" required><br><br>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>
        
            <button type="submit">Signup</button>
        </form>
    </body>
</html>
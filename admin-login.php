<?php
include_once(__DIR__."/includes/connection.php");

if(isset($_POST['login'])){
    // Fetch
    $username = $_POST['Username'];
    $password = $_POST['Password'];
    $query = "SELECT `password`,`id`,`username` from `users` WHERE `username`='$username'";
    $res = $conn->query($query);
    $user = $res->fetch_assoc();
    if($user){
        if($password === $user["password"]){
            print("Correct Password");
            session_start();
            $_SESSION["uid"] = $user["id"];
            $_SESSION["username"] = $user["username"];
            header("Location:dash.php");
        }else{
            print("incorrect password");
        }
    }else{
        print("user not found");
    }
    
}










?>

<form method="post">
    <div>Username</div>
    <input type="Text" name="Username">
    <div>Password</div>
    <input type="Password" name="Password">
    <button name="login">Go</button>
</form>
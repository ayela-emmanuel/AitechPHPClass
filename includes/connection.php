<?php
// connection
// username -- sql
// password -- sql
// db -- created
// host -- localhost // server ip
$conn = new mysqli("127.0.0.1" ,"root","","loginsystem");
if(!$conn){
    die("Error".mysqli_error($conn));
}

?>
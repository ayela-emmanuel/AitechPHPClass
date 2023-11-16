<?php

include (__DIR__."/../includes/router.php");



new Router("POST",function($input){
    if(isset($input["user"])){
        // connect to db
        include_once (__DIR__."/../includes/connection.php");
        $user = $input["user"];
        $new = $input["new"];
        $res = $conn->query("UPDATE `users` SET `username`='$new' WHERE `username` = '$user'");
        if($res){
            Router::out(true,"User Edited".$input["user"]);
        }
    }
    Router::out(false,"No or invalid user at ->".$input["user"]);
});


?>
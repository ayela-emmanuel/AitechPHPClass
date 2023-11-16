<?php
include (__DIR__."/../includes/router.php");



new Router("POST",function($input){
    if(isset($input["user"])){
        // connect to db
        include_once (__DIR__."/../includes/connection.php");
        $user = $input["user"];
        $user = $conn->escape_string($user);
        $res = $conn->query("DELETE from `users` WHERE `username` = '$user'");
        if($res){
            Router::out(true,"User Deleted at ->".$input["user"]);
        }
    }
    Router::out(false,"No or invalid user at ->".$input["user"]);
});



?>
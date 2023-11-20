<?php
include (__DIR__."/../includes/router.php");



new Router("POST",function($input){
    if(isset($input["user"])){
        // connect to db
        include_once (__DIR__."/../includes/connection.php");
        $user = $input["user"];
        $user = $conn->escape_string($user);
        $stmt = $conn->prepare("DELETE from `users` WHERE `username` = ?");
        $stmt->bind_param("s", $user);
        $stmt->execute();
        $res = $stmt->get_result();
        if($res){
            Router::out(true,"User Deleted at ->".$input["user"]);
        }
    }
    Router::out(false,"No or invalid user at ->".$input["user"]);
},true);



?>
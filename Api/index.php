<?php
include (__DIR__."/../includes/router.php");



new Router("GET",function($input){
    
    Router::out(true,"Hello My First API");
});







?>
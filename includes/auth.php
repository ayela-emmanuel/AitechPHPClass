<?php

if(!isset($_SESSION["uid"],$_SESSION["username"])){
    header("Location:logout.php");
}
?>
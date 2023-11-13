<?php
$data = file_get_contents("php://input");
$data = json_decode($data, true);
echo "Username is ".$data["name"];



?>
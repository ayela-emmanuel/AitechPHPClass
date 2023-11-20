<?php

class Router{
    
    private $input = [];

    public function __construct($Method, $func, $auth = false){
        //Req Method == $Method
        if($Method !== $_SERVER["REQUEST_METHOD"]){
            $this->out(false, "Wrong Method");
        }


        if($Method === "POST"){
            // php://input
            try{
                $this->input = json_decode(file_get_contents("php://input"), true);
            }catch(Exception $e){
                $this->out(false, "Error Fetching Input");
            }
        }else if($Method === "GET"){            
            $this->input = $_GET;
        }
        if($auth){
            if(!isset($_SESSION["uid"],$_SESSION["username"])){
                $this->out(false,"User Not Logged In");
            }
        }
        $func($this->input);
    }


    public static function out(bool $status, string $message,$data = null){
        $output = [
            "status"=> $status,
            "message"=> $message,
            "data"=>$data
        ];
        header("Content-Type: application/json");
        $output = json_encode($output);
        echo $output;
        exit;
    }
}








?>
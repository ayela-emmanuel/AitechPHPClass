<?php 
function getName($n) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
 
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
 
    return $randomString;
}
 
$fileTypes = [
    "jpg","jepg","png"
];


if(isset($_FILES["ProfileImage"])){
    $image = $_FILES["ProfileImage"];
    $i_name = $image["name"];
    $i_format = explode(".",$i_name);
    $i_format = $i_format[count($i_format)-1];
    if(in_array($i_format, $fileTypes)){
        if($image["error"] == 0){
            move_uploaded_file($image["tmp_name"],"./files/".getName(20).$image["name"]);
        }else{
            print "Error";
        }
    }else{
        print "Invalid File";
    }
    
}

?>
<H1>File Upload</H1>
<form method="post" enctype="multipart/form-data" name="fup">
    <input  type="file" name="ProfileImage" ><br>
    <button type="button" onclick="upload()">Go</button>
</form>
<div class="a">
    <div id="progress">

    </div>
</div>

<style>
    .a{
        height: 20px;
        background-color: black;
    }
    .a>div{
        height: inherit;
        background-color: aqua;
        width: 2%;
        transition: all .1s;
    }
</style>
<script>

function upload (){
    var form = document.forms["fup"];
    var progress =document.getElementById("progress");
    var fData = new FormData(form)

    var req = new XMLHttpRequest();
    req.onload=()=>{
        console.log(req.responseText)
    }
    req.upload.onprogress = (event)=>{
        var progress_ = (event.loaded/ event.total) *100
        progress.style.width = progress_+"%";
        console.log(progress_)
    }
    req.open("POST","/menuweb/File%20Upload_JS/");
    req.send(fData);
}




</script>
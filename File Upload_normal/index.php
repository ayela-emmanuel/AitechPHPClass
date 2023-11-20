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
<form method="post" enctype="multipart/form-data">
    <input accept="Image/*" type="file" name="ProfileImage" ><br>
    <button>Go</button>
</form>
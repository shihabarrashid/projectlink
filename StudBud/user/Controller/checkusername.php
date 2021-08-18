<?php

require_once "config.php";

$q = $_REQUEST["q"];

$icon = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
  
    $username = trim($_POST["username"]);
        
    $sql = "SELECT id FROM users WHERE name = '$q'";
    

    $result = mysqli_query($link,$sql);
    $count = mysqli_num_rows($result);

    if($count == 1){
        // $error_msg = "This username is already taken. *";
        $icon = "fas fa-times-circle";
    }else{
        // $icon = "fas fa-check-circle";
        
    }
  
}

// Output "no suggestion" if no hint was found or output correct values
echo $icon;

mysqli_close($link);
?>
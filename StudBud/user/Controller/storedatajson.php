<?php

$username = $_REQUEST["un"];
$email = $_REQUEST["em"];
$gender = $_REQUEST["gn"];

consoleLog('Hello, greppers!');

if(file_exists('../Scripts/tempData.json')){
    $curren_data = file_get_contents('../Scripts/tempData.json');
    $array_data = json_decode($curren_data, true);

    $extra = array(
        'username'	=>	$username,
        'email'		=>	$email,
        'gender'	=>	$gender
    );

    $array_data[] = $extra;
    $final_data = json_encode($array_data);
    if(file_put_contents('../Scripts/tempData.json', $final_data)){
        echo "relative";
    }
}else{
    echo "none";
} 
?>
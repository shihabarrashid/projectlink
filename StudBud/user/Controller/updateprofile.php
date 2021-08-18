<?php 

$password = $_REQUEST["p"];

console.log("Hi");
consoleLog('Hello, greppers!');

$password_err = $username = $email = $gender = "";

    $password = $password;
    $tempusername = htmlspecialchars($_SESSION["username"]);

    $sql = "SELECT id FROM users WHERE name = '$tempusername' and password = '$password'";
    

    $result = mysqli_query($link,$sql);
    $count = mysqli_num_rows($result);
    console.log("Hi");
    if($count == 1){
        
            
            $curren_data = file_get_contents('../Scripts/tempData.json');
			$array_data = json_decode($curren_data, true);

                $len =  count($array_data);

                $username = $array_data[$len - 1]["username"];
                $email = $array_data[$len - 1]["email"];
                $gender = $array_data[$len - 1]["gender"];
            
            $sql = "UPDATE users SET name = '$username', email='$email', gender ='$gender' WHERE name = '$tempusername' and password = '$password'";
    
            if(mysqli_query($link,$sql)){

                $_SESSION["username"] = $username;                            
                $_SESSION["email"] = $email;
                $_SESSION["gender"] = $gender;

                header("location: ../View/home.php");
            }
        
    }else{
        echo "Invalid Password";
    }





mysqli_close($link);
?>
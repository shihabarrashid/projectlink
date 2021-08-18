<?php

session_start();
 

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: home.php");
    exit;
}



require_once "../Controller/config.php";
 

$username = $password = $confirm_password = $email = $gender = "";
$error_msg ="";
 

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    
    if(empty(trim($_POST["username"]))){
        $error_msg = "Please enter a username. *";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $error_msg = "Username can only contain letters, numbers, and underscores. *";
    } else{
		$username = trim($_POST["username"]);
        
        $sql = "SELECT id FROM users WHERE name = '$username'";
        

		$result = mysqli_query($link,$sql);
		$count = mysqli_num_rows($result);

		if($count == 1){
			$error_msg = "This username is already taken. *";
		}else{
			$username = trim($_POST["username"]);
		}
    }

	if(empty($_POST["email"])) {
    	$error_msg = "Email is required *";
  	} 
  	else 
  	{
	    $email = trim($_POST["email"]);
	    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	    $error_msg = "Email format is not corrent *";
    }
  	}

	if(!isset($_POST["gender"]))
	{
		$error_msg="Select your gender *";
	}else{
		$gender = trim($_POST["gender"]);
	}
    
    if(empty(trim($_POST["password"]))){
        $error_msg = "Please enter a password. *";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $error_msg = "Password must have atleast 6 characters. *";
    } else{
        $password = trim($_POST["password"]);
    }
    
    if(empty(trim($_POST["confirm_password"]))){
        $error_msg = "Please confirm password. *";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $error_msg = "Password did not match. *";
        }
    }
    
    if(empty($error_msg)){
        
        $sql = "INSERT INTO users (name, password, gender, email) VALUES ('$username', '$password', '$gender', '$email')";

		if(mysqli_query($link,$sql)){
			header("location: login.php");
		}else{
			    echo "Oops! Something went wrong. Please try again later.";
			}
    }
    
    mysqli_close($link);
}
?>




<!DOCTYPE html>
<html lang="en">
<html>
<head>
    <title>Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <link rel="stylesheet" href="../Styles/registration.css">
</head>

<body> 
    <div class="container">
        <div class="myCard">
            <div class="row">
                <div class="col-md-6">
                    <div class="myLeftCtn"> 
                        <form class="myForm text-center" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
                            <header>REGISTRATION</header>
							
                            <div class="form-group">
                                <i class="fas fa-user"></i>
                                <input class="myInput" type="text" name="username" placeholder="UserName" value="<?php echo $username;?>" onkeyup="checkUserName(this.value)" required> 
                                <i class="" id="validatorun"></i>
                            </div>

							<div class="form-group">
                                <i class="fas fa-envelope"></i>
                                <input class="myInput" placeholder="Email" type="text" name="email" value="<?php echo $email;?>" id="email" onkeyup="checkemail(this.value)" required> 
                                <i class="" id="validatoremail"></i>
                            </div>

                            <div class="form-group">
                                <i class="fas fa-lock"></i>
                                <input class="myInput" type="password" name="password" placeholder="Password" value="<?php echo $password;?>" required> 
                            </div>

							<div class="form-group">
                                <i class="fas fa-shield-alt"></i>
                                <input class="myInput" type="password" name="confirm_password" placeholder="Confirm Password" value="<?php echo $confirm_password;?>" required> 
                            </div>

							<div class="form-group">
								<!-- <label for="gender"> <small> Gender :</small></label><br> -->
								<input class="checkmark"  type="radio" name="gender"<?php if(isset($gender) && $gender=="female") echo "checked";?> value="female" require>&ensp; Female &ensp;

								<input class="checkmark" type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male" require>&ensp; Male	
							</div>

                            
							<label>
								<span class="text-danger"><small><?php echo $error_msg;?></small></span>
							</label>

                            <div><input type="submit" class="butt" value="REGISTER"></div>
							
							<div><input type="button" class="butt_reg" value="LOG IN" id="butt_reg"/></div>
							
                            
                        </form>
                    </div>
                </div> 
                <div class="col-md-6">
                    <div class="myRightCtn">
                            <div class="box"><header>Welcome!</header>
                            
                            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                                sed do eiusmod tempor incididunt ut labore et dolore magna 
                                aliqua. Ut enim ad minim veniam.</p> -->
                                <!-- <input type="button" class="butt_out" value="Learn More"/> -->
                            </div>
                                
                    </div>
                </div>
            </div>
        </div>
</div>
      
<script>
	document.getElementById("butt_reg").onclick = function(){goToRegisterPage()};

	function goToRegisterPage(){
		window.location.href = "login.php";
	}

    function checkUserName(str) {
        if (str.length == 0) { 
            document.getElementById("validatorun").className = "";
            return;
        }
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            x = document.getElementById("validatorun");
            x.className = this.responseText;
            x.style.left = "0";
            x.style.color = "#ff0000";
        }
        xhttp.open("GET", "../Controller/checkusername.php?q="+str);
        xhttp.send();   
    }

    function checkemail(str) {
        if (str.length == 0) { 
            document.getElementById("validatoremail").className = "";
            return;
        }else{

            x = document.getElementById("validatoremail");
            e = document.getElementById("email");
            var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

            if (!str.match(validRegex)) {

            e.focus();
            x.className = "fas fa-exclamation-circle";
            x.style.left = "0";
            x.style.color = "#E9E51B";
            } 
        }
           
    }

    
</script>
 
</body>
</html>
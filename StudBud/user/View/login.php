<?php
session_start();
 
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: home.php");
    exit;
}
 
require_once "../Controller/config.php";
 
$username = $password = "";
$login_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if(empty(trim($_POST["username"]))){
        $login_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    if(empty(trim($_POST["password"]))){
        $login_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    if(empty($login_err) ){
        $sql = "SELECT id, name, password, email, gender FROM users WHERE name = '$username' and password = '$password'";

		$result = mysqli_query($link,$sql);
		$row=mysqli_fetch_row($result);
		$count = mysqli_num_rows($result);

		if($count == 1){
			session_start();
                            
			$_SESSION["loggedin"] = true;
			$_SESSION["id"] = $row[0];
			$_SESSION["username"] = $username;                            
			$_SESSION["email"] = $row[3];
			$_SESSION["gender"] = $row[4];
			
			header("location: home.php");
			exit;
		}else{
			$login_err = "Invalid username or password.";
		}
    }
    
    mysqli_close($link);
}
?>



<!DOCTYPE html>
<html lang="en">
<html>
<head>
    <title>Login Form Design</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <link rel="stylesheet" href="../Styles/login.css">
</head>

<body> 
    <div class="container">
        <div class="myCard">
            <div class="row">
                <div class="col-md-6">
                    <div class="myLeftCtn"> 
                        <form class="myForm text-center" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
                            <header>LOG IN</header>
							
                            <div class="form-group">
                                <i class="fas fa-user"></i>
                                <input class="myInput" type="text" name="username" value="<?php echo $username;?>" required> 
                            </div>

                            <div class="form-group">
                                <i class="fas fa-lock"></i>
                                <input class="myInput" type="password" name="password" value="<?php echo $password;?>" required> 
                            </div>

                            <div class="form-group">
                                <label>
									<span class="text-danger"><small><?php echo $login_err;?></small></span>
									<a href="forgotpass.php" class="ForgetPwd" value="Login"> <small> Forgot Password?</small></a>                        			
                                </label>
                            </div>

                            <div><input type="submit" class="butt" value="LOG IN"></div>

							
							<div><input type="button" class="butt_reg" value="REGISTER" id="butt_reg"/></div>
							
                            
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
		window.location.href = "registration.php";
	}
</script>
 
</body>
</html>


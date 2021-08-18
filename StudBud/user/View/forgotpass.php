<?php

session_start();
 

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: home.php");
    exit;
}



require_once "../Controller/config.php";
 

$username = $password = $confirm_password = "";
$error_msg ="";
$isExist = $password_checked =$pass_needed = false;


 

if($_SERVER["REQUEST_METHOD"] == "POST"){

	if(isset($_SESSION["fusername"]) && trim($_POST["password"]) == "hi"){
		
		session_unset();
        session_destroy();
	}
 
	
    if(!isset($_SESSION["fusername"])){
		
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
				$username = trim($_POST["username"]);
				$isExist = true;
				
				echo "<script> window.onload = function() {
					nameExist();
				}; </script>";
				$_SESSION["fusername"] = $username;
			}else{
				$error_msg = "No User Found!";
			}
		}
	}else{
		$pass_needed = true;
		
	}
    
	if($pass_needed == true){
		
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
			if($password != $confirm_password){
				$error_msg = "Password did not match. *";
			}else{
				
				$password_checked = true;
				
			}
		}
		
		if(empty($error_msg) && $password_checked){
			
			$username = htmlspecialchars($_SESSION["fusername"]);
			
			$sql = "UPDATE users SET password='$password' WHERE name = '$username'";

			if(mysqli_query($link,$sql)){
				header("location: ../logout.php");
			}else{
					echo "Oops! Something went wrong. Please try again later.";
				}
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
    <link rel="stylesheet" href="../Styles/forgotpass.css">
</head>

<body> 
    <div class="container">
        <div class="myCard">
                    <div class="myLeftCtn"> 
                        <form class="myForm text-center" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
                            <header>Forgot Password?</header>
							
                            <div class="form-group" id="uname">
                                <i class="fas fa-user"></i>
                                <input class="myInput" id="unameinput" type="text" name="username"  placeholder="UserName" required> 
                            </div>

                            <div class="form-group" id="pass">
                                <i class="fas fa-lock"></i>
                                <input class="myInput" id="passinput" type="password" name="password" value="hi"  placeholder="Password" required> 
                            </div>

							<div class="form-group" id="cpass">
                                <i class="fas fa-shield-alt"></i>
                                <input class="myInput" id="cpassinput" type="password" name="confirm_password" value="chi"  placeholder="Confirm Password" required> 
                            </div>

                            
							<div class="form-group">
							<span class="text-danger" id="errortext"><small><?php echo $error_msg;?></small></span>
							</div>

                            <div><input type="submit" class="butt" value="NEXT" id="formsubmit"></div>
							
							<div><input type="button" class="butt_reg" value="LOG IN" id="butt_reg"/></div>
							
                            
                        </form>
                    </div>
                
        </div>
</div>
      
<script>
	document.getElementById("butt_reg").onclick = function(){goToRegisterPage()};
	// document.getElementById("formsubmit").onclick = function(){nameExist()};

	

	function nameExist(){
		var isExist = '<?=$isExist?>';
		console.log("here we are");
		if(isExist){
			console.log("here = are");
			document.getElementById("formsubmit").value = "SUBMIT";

			var x = document.getElementById("pass");
			var z = document.getElementById("cpass");
			var y = document.getElementById("uname");
			var u = document.getElementById("errortext");
			var pass = document.getElementById("passinput");
			var cpass = document.getElementById("cpassinput");
			var unamei = document.getElementById("unameinput");

			pass.value = "<?php echo $password;?>";
			cpass.value = "<?php echo $confirm_password;?>";
			pass.name = "password";
			cpass.name = "confirm_password";
			unamei.value = "<?php echo htmlspecialchars($_SESSION["fusername"]); ?>"
			// unamei.disabled = true;

			y.style.display = "none";
			x.style.display = "block";
			z.style.display = "block";
			u.style.display = "inline";


			console.log(" are");
		}
	}

	function goToRegisterPage(){
		window.location.href = "login.php";
	}
</script>
 
</body>
</html>
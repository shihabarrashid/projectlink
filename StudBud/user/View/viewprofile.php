<?php

session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}


?>


<!DOCTYPE html>
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
                            <header>Your Profile</header>
							
                            <div class="form-group" id="uname">
                                <i class="fas fa-user"></i>
                                <input class="myInput" id="unameinput" type="text" name="username" value="<?php echo htmlspecialchars($_SESSION["username"]); ?>"  placeholder="UserName" required disabled> 
                            </div>

                            <div class="form-group">
                                <i class="fas fa-envelope"></i>
                                <input class="myInput" placeholder="Email" type="text" name="email" value="<?php echo htmlspecialchars($_SESSION["email"]); ?>" id="email" onkeyup="checkemail(this.value)" required disabled> 
                                <i class="" id="validatoremail"></i>
                            </div>

                            <!-- <div class="form-group">
                                <i class="fas fa-lock"></i>
                                <input class="myInput" type="password" name="password" placeholder="Password" value="<?php echo $password;?>" required> 
                            </div>

							<div class="form-group">
                                <i class="fas fa-shield-alt"></i>
                                <input class="myInput" type="password" name="confirm_password" placeholder="Confirm Password" value="<?php echo $confirm_password;?>" required> 
                            </div> -->

							<div class="form-group">
								<!-- <label for="gender"> <small> Gender :</small></label><br> -->
								<input class="checkmark"  type="radio" name="gender"<?php if(isset( $_SESSION["gender"]) &&  htmlspecialchars($_SESSION["gender"])==="female") echo "checked";?> value="female" require disabled>&ensp; Female &ensp;

								<input class="checkmark" type="radio" name="gender" <?php if (isset( $_SESSION["gender"]) &&  htmlspecialchars($_SESSION["gender"])==="male") echo "checked";?> value="male" require disabled>&ensp; Male	
							</div>


                            
							<div class="form-group">
							<!-- <span class="text-danger" id="errortext"><small><?php echo $error_msg;?></small></span> -->
							</div>

                            <div><input type="button" class="butt" value="EDIT" id="butt_edit"></div>
							
							<div><input type="button" class="butt_reg" value="HOME" id="butt_reg"/></div>
							
                            
                        </form>
                    </div>
                
        </div>
</div>
      
<script>
	document.getElementById("butt_reg").onclick = function(){goToRegisterPage()};
	

	document.getElementById("butt_edit").onclick = function(){goToEditPage()};

	function goToRegisterPage(){
		window.location.href = "home.php";
	}

	function goToEditPage(){
		window.location.href = "editprofile.php";
	}
</script>
 
</body>
</html>
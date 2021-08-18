<?php

session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

require_once "../Controller/config.php";
 
$username =  htmlspecialchars($_SESSION["username"]);
$email =  htmlspecialchars($_SESSION["email"]);;
$gender =  htmlspecialchars($_SESSION["gender"]);;
$password = "";
$username_err = $password_err = $email_err = $gender_err ="";

 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } elseif(trim($_POST["username"]) !=  htmlspecialchars($_SESSION["username"])){
		$username = trim($_POST["username"]);
        $sql = "SELECT id FROM users WHERE name = '$username'";
        

		$result = mysqli_query($link,$sql);
		$count = mysqli_num_rows($result);

		if($count == 1){
			$username_err = "This username is already taken.";
		}else{
			$username = trim($_POST["username"]);
		}
    }

	if(empty($_POST["email"])) {
    	$email_err = "Email is required";
  	} 
  	else 
  	{
	    $email = trim($_POST["email"]);
	    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	    $email_err = "Invalid email format. ";
    }
  	}

	if(!isset($_POST["gender"]))
	{
		$gender_err="At least one of them must be selected";
	}else{
		$gender = trim($_POST["gender"]);
	}
    
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
        $tempusername = htmlspecialchars($_SESSION["username"]);

        $sql = "SELECT id FROM users WHERE name = '$tempusername' and password = '$password'";
        

		$result = mysqli_query($link,$sql);
		$count = mysqli_num_rows($result);

		if($count == 1){
            if(empty($username_err) && empty($password_err) && empty($gender_err)&& empty($email_err)){
        
                
                $sql = "UPDATE users SET name = '$username', email='$email', gender ='$gender' WHERE name = '$tempusername' and password = '$password'";
        
                if(mysqli_query($link,$sql)){

                    $_SESSION["username"] = $username;                            
                    $_SESSION["email"] = $email;
                    $_SESSION["gender"] = $gender;

                    header("location: viewprofile.php");
                }else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
            }
		}else{
			$password_err = "Invalid Password";
		}
    }
    
    
    
    
    mysqli_close($link);
}


?>


<!DOCTYPE html>
<html>

<head>
    <title>Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <link rel="stylesheet" href="../Styles/editprofile.css">
</head>

<body> 
    <div class="container">
        <div class="myCard">
                    <div class="myLeftCtn"> 
                        <form class="myForm text-center" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
                            <header>Edit Profile</header>
							
                            <div class="form-group" id="namediv">
                                <i class="fas fa-user"></i>
                                <input class="myInput" type="text" name="username" placeholder="UserName" id="un" value="<?php echo htmlspecialchars($_SESSION["username"]);?>" onkeyup="checkUserName(this.value)" required> 
                                <i class="" id="validatorun"></i>
                            </div>

                            <div class="form-group" id="emaildiv">
                                <i class="fas fa-envelope"></i>
                                <input class="myInput" placeholder="Email" type="text" name="email" value="<?php echo htmlspecialchars($_SESSION["email"]); ?>" id="email" onkeyup="checkemail(this.value)" required > 
                                <i class="" id="validatoremail"></i>
                            </div>

                            <div class="form-group" id="passdiv">
                                <i class="fas fa-lock"></i>
                                <input class="myInput" type="password" id="password" name="password" placeholder="Password"  required> 
                            </div>

							<!-- <div class="form-group">
                                <i class="fas fa-shield-alt"></i>
                                <input class="myInput" type="password" name="confirm_password" placeholder="Confirm Password" value="<?php echo $confirm_password;?>" required> 
                            </div> -->

							<div class="form-group" id="genderdiv">
								<!-- <label for="gender"> <small> Gender :</small></label><br> -->
								<input class="checkmark"  type="radio" id="gn" name="gender"<?php if(isset( $_SESSION["gender"]) &&  htmlspecialchars($_SESSION["gender"])==="female") echo "checked";?> value="female" require >&ensp; Female &ensp;

								<input class="checkmark" type="radio" id="gn" name="gender" <?php if (isset( $_SESSION["gender"]) &&  htmlspecialchars($_SESSION["gender"])==="male") echo "checked";?> value="male" require >&ensp; Male	
							</div>


                            
							<div class="form-group">
							<span class="text-danger" id="errortext"><small></small></span>
							</div>
                            
                            <div><input type="button" class="butt" value="NEXT" id="butt_edit"></div>
							
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
       if(document.getElementById("butt_edit").value !== "SUBMIT"){ 

            un = document.getElementById("un").value;
            em = document.getElementById("email").value;
            gn = document.getElementById("gn").value;

            if(document.getElementById("validatorun").className === "" && document.getElementById("validatoremail").className === ""){
                const xhttp = new XMLHttpRequest();
                xhttp.onload = function() {
                    x = document.getElementById("passdiv");
                    y = document.getElementById("emaildiv");
                    z = document.getElementById("namediv");
                    v = document.getElementById("genderdiv");
                    b = document.getElementById("butt_edit");

                    console.log(this.responseText);
                    
                    if(this.responseText !== "none")
                    {
                        x.style.display = "block";
                        y.style.display = "none";
                        z.style.display = "none";
                        v.style.display = "none";
                        b.value = "SUBMIT";
                    }
                    
                }
                xhttp.open("GET", "../Controller/storedatajson.php?un="+un+"&em="+em+"&gn="+gn);
                xhttp.send(); 
            }
        }else{
            x = document.getElementById("password").value;
            console.log("Hi");
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                y = document.getElementById("errortext");

                y.innerhtml = this.responseText;
                
            }
            console.log(x);
            xhttp.open("GET", "../Controller/updateprofile.php?p="+x);
            xhttp.send(); 
        }

        
	}


	function checkUserName(str) {
        if (str.length == 0 || str === "<?php echo htmlspecialchars($_SESSION["username"]); ?>") { 
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
            x.className = "fas fa-exclamation-circle";
            x.style.left = "0";
            x.style.color = "#E9E51B";
            } else{
                x.className = "";
            }
        }
           
    }
</script>
 
</body>
</html>
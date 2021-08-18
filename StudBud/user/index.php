<?php
	if(session_status() >= 0){
        session_start();
        if(isset($_SESSION["loggedin"])){
            header("refresh: 1; url = View/home.php");
        }
    }
?>


<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <link rel="stylesheet" href="Styles/welcome.css">
</head>

<body> 
    <div class="container">
        <div class="myCard">
                    <div class="myLeftCtn"> 
                        <form class="myForm text-center" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
                            <header>WELCOME</header>

                            <!-- <div><input type="submit" class="butt" value="NEXT" id="formsubmit"></div> -->
							
							<div><input type="button" class="butt" value="LOG IN" id="butt_log"/></div>
							
							<div><input type="button" class="butt_reg" value="REGISTRATION" id="butt_reg"/></div>

                    </div>
                
        </div>
</div>
      
<script>
	document.getElementById("butt_reg").onclick = function(){goToRegisterPage()};
	document.getElementById("butt_log").onclick = function(){gotoLogin()};

	function gotoLogin(){
		window.location.href = "View/login.php";
	}

	function goToRegisterPage(){
		window.location.href = "View/registration.php";
	}
</script>
 
</body>
</html>
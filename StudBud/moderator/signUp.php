<!DOCTYPE html>

<html>
 <head>
   <meta charset="UTF-8">
   <meta name="description" content="Study">
   <title>StudBud|Homework Buddy</title>
   <style type = "text/css">
     #section1
     {
       font-family: Courier New;
       font-size: 120%;
     }
   </style>
 </head>

 <body style="background-color:#f3f2f2">
   <header>
     <?php
      include 'header.php';
     ?>
   </header>

   <main>
   <div class="register-col">
            <section class="register">
                <h1>User Registration</h1>
                <form name="myform" action="user_reg_process.php" method="post" onsubmit="return validateform()">
                    <p>Name</p>
                    <input type="text" name="name" id="name" onblur="checkUName()" onkeyup="checkNameKeyUp()" placeholder="Enter User Name">
                    <small class="text-danger" id="nameErr"></small>

                    <p>Email</p>
                    <input type="text" class="form-control" name = "email" id="email" onblur="checkEmail()" placeholder="Enter User Email">
                    <small class="text-danger" id="emailErr"></small>

                    <p>Username</p>
                    <input type="text" name="uname" id="uname" onblur="checkUName()" placeholder="Enter User Username">
                    <small class="text-danger" id="uNameErr"></small>

                    <p>Password</p>
                    <input type="password" name="pass" id="pass" onblur="checkPass()" placeholder="Enter User Password">
                    <small class="text-danger" id="passErr"></small>

                    <p>Institution</p>
                    <input type="text" name="ins" id="ins" onblur="checkIns()" placeholder="Enter User Institution">
                    <small class="text-danger" id="insErr"></small>

                    <!-- <p>Date of Birth</p>
                    <input type="date" class="form-control" name="dob" id="dob" onblur="checkPass()" placeholder="Enter Moderator DOB">
                    <small class="text-danger" id="dobErr"></small> -->

                    <br> <br> 
                    <input class="reg-buuton" type="submit" name="register" value="Register">
                    <!-- <button type="submit" class="reg-buuton">Sign In</button>
                    <p>Already Have An Account? Sign Up.</p> -->
                </form>
            </section>
        </div>

   </main>

   <footer>
     <?php
      include 'footer.php';
     ?>
   </footer>
   <script src="reg_validation.js"></script>

 </body>

</html>

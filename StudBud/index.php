<?php
if(session_status()>=0){
    if(isset($_SESSION["uname"])){
        if($_SESSION["uanme"]=="Admin"){
            echo "Redirecting";
            header("refresh: 0.5; url = admin_dashboard.php");
        }
        else{
            echo "Redirecting";
            header("refresh: 0.5; url = signIn.php");
        }
        
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StudBud</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="index_style.css">
</head>
<body>
    <header>
        <section>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                  <a class="navbar-brand" href="#">
                      <img src="images/logo.png" alt="logo">
                  </a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
    
                  <div class="collapse navbar-collapse nav-gap nav justify-content-end" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                      </li>
    
                      <li class="nav-item">
                        <a class="nav-link" href="about.php">About Us</a>
                      </li>
    
                      <li class="nav-item">
                        <a class="nav-link" href="service.php">Our Services</a>
                      </li>
    
                      <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact Us</a>
                      </li>
    
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Sign In
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                          <li><a class="dropdown-item" href="signIn.php">Admin</a></li>
                          <li><a class="dropdown-item" href="#">Moderator</a></li>
                          <li><a class="dropdown-item" href="#">Instructor</a></li>
                          <li><a class="dropdown-item" href="user/index.php">User</a></li>
                        </ul>
                      </li>
                    </ul>
                  </div>
                </div>
            </nav>
        </section>
    </header>



    <main>
        <div class="header-img">
            <div class="info">
                <h1>The Buudy You Need</h1>
                <h3>Everything is figureoutable</h3>
                <p>A Smarter Way to Student</p>
                <a class="reg-buuton" href="signIn.php">Register Today</a>
            </div>
        </div>

        <div class="gap"></div>

        <div>
            <section class="features">
                <h1>Our Instructors</h1>
                <p id="paragraph">Learn from real-world experts who love to teach. StudBud instructors bring their experience to the online classroom.</p>

                <div class="row">
                    <div class="col-md-4 img-col">
                        <img src="images/ins2.jpg" alt="ins">
                        <p id="featues-para">Paul Kates (Business Management)</p>
                    </div>
                    <div class="col-md-4 img-col">
                        <img src="images/ins1.jpg" alt="ins">
                        <p id="featues-para">Sarajean Rossitto (NGO Management)</p>
                    </div>
                    <div class="col-md-4 img-col">
                        <img src="images/ins3.jpg" alt="ins">
                        <p id="featues-para">Santosh Lawoo (Programming)</p>
                    </div>
                </div>
            </section>

           
        </div>

        <div class="gap"></div>

        <div>
            <section class="features">
                <h1>Explore Our Features</h1>
                <p>All the features you need to shape your student life
                </p>

                <div class="row">
                    <div class="col-md-4 img-col">
                        <img src="images/features1.jpg" alt="features">
                        <p id="featues-para">Save Time</p>
                    </div>
                    <div class="col-md-4 img-col">
                        <img src="images/features3.jpg" alt="features">
                        <p id="featues-para">Self Development</p>
                    </div>
                    <div class="col-md-4 img-col">
                        <img src="images/features4.jpg" alt="features">
                        <p id="featues-para">Instant Solution</p>
                    </div>
                </div>
            </section>
        </div>

        <div class="gap"></div>

        <div>
            <section class="review">
                <h1>Reviews</h1>
                <p>Excellent customer service is the number one job in any company! It is the personality of the company and the reason customers come back. Without customers there is no company!
                </p>

                <div class="row">
                    <div class="col-md-6 review-col">
                        <h3>Shihab Rashid</h3>
                        <p>Even if a person don't know how to implement simple maths formulas in Excel then they have designed a very perfect course structure for the basic Excel and when the person gain knowledge and build his basics, they have advance excel course which contains all the tips and tricks as well. The teaching assistance is very dedicated and ready to support 24x7.</p>
                    </div>
                    <div class="col-md-6 review-col">
                        <h3>Monir Uddin</h3>
                        <p>I used their tutoring service and it worked out pretty well for me. I needed some math help and the tutor explained me everything and I was able to complete the task myself. They fix all my issues! You ppl have to learn and understand Its only certain things customer service reps can do. They fix all my problems to the best they can, and I am okay with that. </p>
                    </div>
                </div>


            </section>
        </div>
    </main>

    <footer class="text-light">
    <div class=" content">
        <div class="row">
            <div class="col-md-6">
            <p class="para">Why Us? <br>
            StudBud is Bangladesh’s leading educational platform for superior online courses, professional training and corporate eLearning services that help you develop useful skills and accomplish more in life. Our online courses and career-track programs are designed in collaboration with the best of industry experts and organizations in Bangladesh.
            </p>
            </div>

            <div class="col-md-2">
            <ul>
            <li><h5>Company</h5></li>
            <li><a href="index.php">Home</a></li>
            <li><a href="contact.php">Contact us</a></li>
            <li><a href="about.php">About us</a></li>
            <li><a href="signIn.php">Get Started</a></li>
            </ul>
            </div>

            <div class="col-md-2">
            <ul>
            <li><h5>Customer Service</h5></li>
            <li><a href="#">Customer Service</a></li>
            <li><a href="#">Give Us Feedback</a></li>
            <li><a href="#">Help with Homework</a></li>
            <li><a href="#">Policy</a></li>
            </ul>
            </div>

            <div class="col-md-2">
            <ul>
            <li><h5>Connect With Us</h5></li>
            <li><a href="#">Facebook</a></li>
            <li><a href="#">Twitter</a></li>
            <li><a href="#">LinkedIn</a></li>
            <li><a href="#">Youtube</a></li>
            </ul>
            </div>
        </div>
        
    </div>
    <p class="text-center pt-4 m-0">Copyright &copy; 2021 StudBud. All Rights Reserved</p>

    </footer>


    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    
</body>
</html>
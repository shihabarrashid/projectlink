<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StudBud|About Us</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="about.css">
</head>
<body>
    <header>
    <section>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                  <a class="navbar-brand" href="index.php">
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
                          <li><a class="dropdown-item" href="#">User</a></li>
                        </ul>
                      </li>
                    </ul>
                  </div>
                </div>
            </nav>
        </section>
    
    </header>

    <main>
        <div class="container about-us">
            <div class="row">
                <div class="col-md-6">
                   <div class="about-col">
                       <h1>Our Story</h1>
                       <p>Shihab Rashid and Moni uddin, two engineering students of AIUB, founded StudBud as an online course marketplace in mid 2021, as an experimentation of providing paid online courses through internet. It is transforming everyday towards its vision of creating a complete ecosystem for engaging, practical and employable learning opportunity. It might take some more years of intensive trial and error to clarify our emphasis on life transformation through acquisition of cutting-edge skills. </p>
                       <a class="about-reg-buuton" href="signin.html">Register Today</a>
                   </div>
                </div>

                <div class="col-md-6">
                    <div class="about-col img-col">
                        <img src="images/team.jpg" alt="about">
                    </div>
                 </div> 
            </div>
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
        
    </div>
    <p class="text-center pt-4 m-0">Copyright &copy; 2021 StudBud. All Rights Reserved</p>

    </footer>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>
</html>
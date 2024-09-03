<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="log in pag/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;900&family=Open+Sans:wght@300;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="log in pag/main.css">
    <title>Log-in</title>
</head>

<body>
    <!-- Navbar & Hero Start -->
    <div class="container-fluid nav-bar sticky-top px-4 py-2 py-lg-0">
        <nav class="navbar navbar-expand-lg navbar-light">
            <img src="img/JPAMS LOGO.png" height="80px" alt="Logo" loading="lazy" />
            <a href="index.php" class="navbar-brand p-2">
                <h1 class="display-8 text-dark">
                    <i></i>
                </h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-auto py-0">
                    <a href="index.php" class="nav-item nav-link active">Home</a>
                    <a href="about.php" class="nav-item nav-link">About</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu m-5">
                            <a href="feature.php" class="dropdown-item">Our Feature</a>
                            <a href="gallery.php" class="dropdown-item">Our Gallery</a>
                            <a href="package.php" class="dropdown-item">Packages</a>
                            <a href="team.php" class="dropdown-item">Our Team</a>
                            <a href="testimonial.php" class="dropdown-item">Testimonial</a>
                        </div>
                    </div>
                    <a href="contact.php" class="nav-item nav-link">Contact</a>
                </div>
                <div class="team-icon d-none d-xl-flex justify-content-center me-3">
                    <a class="btn btn-square btn-light rounded-circle mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                </div>
                <a href="signin.php" class="btn btn-primary rounded-pill py-2 px-4 flex-shrink-0">Log-in</a>
            </div>
        </nav>
    </div>
    <!-- Navbar & Hero End -->

    <div class="container">
        <section id="formHolder">
            <div class="row">
                <!-- Brand Box -->
                <div class="col-sm-6 brand">
                    <a href="#" class="logo">MR <span>.</span></a>
                    <div class="heading">
                        <h2>JPAMS</h2>
                        <p>Welcome!!</p>
                    </div>
                    <div class="success-msg">
                        <p>Great! You are one of our members now</p>
                        <a href="#" class="profile">Your Profile</a>
                    </div>
                </div>
                <!-- Form Box -->
                <div class="col-sm-6 form">
                    <!-- Login Form -->
                    <div class="login form-peice switched">
                        <form class="login-form" action="signin.php" method="post">
                            <div class="form-group">
                                <label for="loginemail">Email Address</label>
                                <input type="email" name="loginemail" id="loginemail" required>
                            </div>
                            <div class="form-group">
                                <label for="loginPassword">Password</label>
                                <input type="password" name="loginPassword" id="loginPassword" required>
                            </div>
                            <div class="CTA">
                                <input type="submit" name="login" value="Login">
                                <div class="forgot-btn"></div>
                                <a href="#" class="switch">I'm New</a>
                            </div>
                        </form>
                    </div><!-- End Login Form -->
                    <!-- Signup Form -->
                    <div class="signup form-peice">

                        <form class="signup-form" action="register.php" method="post">
                            <div class="form-group">
                                <label for="name">Full Name</label>
                                <input type="text" name="username" name="fullname" class="name">
                                <span class="error"></span>
                            </div>
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" name="emailAddress" name="email" id="email" class="email">
                                <span class="error"></span>
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone Number - <small>Optional</small></label>
                                <input type="text" name="phone" id="phone">
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="pass">
                                <span class="error"></span>
                            </div>

                            <div class="form-group">
                                <label for="passwordCon">Confirm Password</label>
                                <input type="password" name="passwordCon" id="passwordCon" class="passConfirm">
                                <span class="error"></span>
                            </div>

                            <div class="CTA">
                                <input type="submit" name="register" value="Register" name="submit">

                                <a href="#" class="switch">I have an account</a>
                            </div>
                        </form>
                    </div><!-- End Signup Form -->
                </div>
            </div>
        </section>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="log in pag/main.js"></script>
    <script src="js/main.js"></script>

    <!-- Additional JS Libraries -->
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
</body>

</html>
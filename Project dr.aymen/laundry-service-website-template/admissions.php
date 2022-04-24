<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Registrations</title> </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;800&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid bg-primary py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-lg-left mb-2 mb-lg-0">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-white px-3">Helwan University</a>
                    </div>
                </div>
                <div class="col-md-6 text-center text-lg-right">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-white px-3" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-white px-3" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-white px-3" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-white px-3" href="">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a class="text-white pl-3" href="">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar Start -->
    <div class="container-fluid position-relative nav-bar p-0">
        <div class="container-lg position-relative p-0 px-lg-3" style="z-index: 9;">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0 pl-3 pl-lg-5">
                <a href="" class="navbar-brand">
                    <h1 class="m-0 text-secondary"><span class="text-primary">Addmition </span>Menu</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                    <div class="navbar-nav ml-auto py-0">
                        <a href="index.html" class="nav-item nav-link">Update</a>
                        <a href="about.html" class="nav-item nav-link">Delete</a>
                        <a href="service.html" class="nav-item nav-link">Search</a>
                        <a href="admissions.php" class="nav-item nav-link">Registrations</a>
                        <a href="login.php" class="nav-item nav-link active">log out</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->
    <br>

    <!-- Contact Start -->
    <div class="container-fluid py-5">
        <div class="container" style="max-width: 900px;">
            <div class="row">
                <div class="col-12">
                    <div class="contact-form">
                        <div id="success"></div>
                        <form action="registration.php" method="POST" class="login-email">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="control-group">
                                        <input type="Username" placeholder="Name" name="username" required class="form-control" required="required" data-validation-required-message="Please enter your name" />
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="control-group">
                                        <input  class="form-control" type="em" placeholder="Email" name="email" required="required" data-validation-required-message="Please enter your email" />
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="control-group">
                                        <input  class="form-control" type="phone_number" placeholder="phone_number" name="phone_number" required="required"/>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="control-group">
                                        <input  type="date" placeholder="date of birth" name="date_of_birth"  required="required" />
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <br>
                                 <select name="faculity" class="col-md-6" style="opacity: 0.5; border-radius: 25px;"required>
		                    	<option value="1">engineering</option>
    	                    	<option value="2">computer science</option>
    	                    	<option value="3">biotecnology</option>
		                    	<option value="4">dentist</option>
		                    	<option value="5">masscom</option>
		                    	<option value="6">bussiness</option>
                                 <option value="7">pharmacy</option>
                                 <option value="8">art&design</option>
                                 <option value="9">languages</option>
  	                    		</select>
                                <br>
		                    	<br>
                               <select name="userid_type" class="col-md-6" style="opacity: 0.5; border-radius: 25px;"required>
	                    		<option value="1">doctor</option>
                        		<option value="2">student</option>
                        		<option value="3">Secretary</option>
	                    		<option value="4">admin</option>
  	                    		</select>
			                      <br>
		                    	<br>
		                    	<div class="col-md-6">
                                <br>
                                </div>
                                <br>
                            </div>
                            <br>
                            <div align="right">
                                <button class="btn btn-primary py-3 px-5" name="submit" class="btn"  >ADD</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
<?php
    if(!isset($_SESSION['user_id'])){
        session_start();
    }
    if(!isset($_SESSION['user_id'])){
        header('Location: ./singin.html');
        exit();
    }
    else{
        $user_id = $_SESSION['user_id'];
    }

    require('./connection.php');
    $query = "select * from users where id = :user_id;";
    $statement = $database->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->execute();
    $user_record = $statement->fetch();
    $statement->closeCursor();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>lifebelow water | My Account</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/slick/slick.css" rel="stylesheet">
        <link href="lib/slick/slick-theme.css" rel="stylesheet">

        <!--  Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>
            <!--header navbar-->
    
       <div style="background-image: url(image/alex-rose-sxAkZvheBFs-unsplash.jpg);">
        <div id="nav" class="sticky-nav">
    
         <nav class="navbar navbar-expand-lg  ">
           <div class="container">
           <a class="navbar-brand" href="#">logo</a>
           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
             <span></span>
             <span></span>
           </button>
         
           <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-auto"  >
               <li class="nav-item active">
                 <a class="nav-link active" aria-current="page" href="index.html">Home </a>
               </li>
               <li class="nav-item">
                 <a class="nav-link" href="about us.html">about us</a>
               </li>
               <li class="nav-item">
                 <a class="nav-link" href="Sevice.html">sevice</a>
               </li>
               <li class="nav-item">
                <a class="nav-link" href="myAccount.php">My Acount</a>
              </li>
               <li class="nav-item">
                 <a class="nav-link" href="contact.html">contact us</a>
               </li>
            </ul>  
            </div>
           </div>
         </nav>
        </div>
        
        
        
        <!-- My Account Start -->
        <div class="my-account">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="dashboard-nav" data-toggle="pill" href="#dashboard-tab" role="tab"><i class="fa fa-tachometer-alt"></i>Dashboard</a>
                            <a class="nav-link" id="account-nav" data-toggle="pill" href="#account-tab" role="tab"><i class="fa fa-user"></i>Account Details</a>
                            <a class="nav-link" href="user_log_out.php"><i class="fa fa-sign-out-alt"></i>Logout</a>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="dashboard-tab" role="tabpanel" aria-labelledby="dashboard-nav">
                                <h4>Dashboard</h4>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum quam ac mi viverra dictum. In efficitur ipsum diam, at dignissim lorem tempor in. Vivamus tempor hendrerit finibus. Nulla tristique viverra nisl, sit amet bibendum ante suscipit non. Praesent in faucibus tellus, sed gravida lacus. Vivamus eu diam eros. Aliquam et sapien eget arcu rhoncus scelerisque.
                                </p> 
                            </div>
                            
                            <div class="tab-pane fade" id="account-tab" role="tabpanel" aria-labelledby="account-nav">
                                <h4>Account Details</h4>
                                <form action="update_acc_details.php" method="POST">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" placeholder="Username" value="<?php echo $user_record['username']?>" name="username">
                                        </div>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" placeholder="Email" value="<?php echo $user_record['email']?>" name="email">
                                        </div>
                                        <div class="col-md-6">
                                            <input class="form-control" type="date" placeholder="Birthday" value="<?php echo $user_record['birthday']?>" name="birthday">
                                        </div>
                                        <div class="col-md-12">
                                            <input type="submit" class="btn" value="Update Account">
                                            <br><br>
                                        </div>
                                    </div>
                                </form>
                                <h4>Password change</h4>
                                <form action="update_pass_change.php" method="POST">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control" type="password" placeholder="Current Password" name="uPassOld">
                                        </div>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" placeholder="New Password" name="uPassword">
                                        </div>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" placeholder="Confirm Password" name="uPassRepeat">
                                        </div>
                                        <div class="col-md-12">
                                            <input type="submit" class="btn" value="Save Changes">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- My Account End -->

          <!-- Review Start -->
        <div class="review">
            <div class="container-fluid">
                <div class="row align-items-center review-slider normal-slider">
                    <div class="col-md-6">
                        <div class="review-slider-item">
                            <div class="review-img">
                                <img src="image/max-gotts-6-wZzd2hCOs-unsplash.jpg" alt="Image">
                            </div>
                            <div class="review-text">
                                <h2>Seve One Baby Turtle</h2>
                                <h3>Donet 1$</h3>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vitae nunc eget leo finibus luctus et vitae lorem
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="review-slider-item">
                            <div class="review-img">
                                <img src="image/hiroko-yoshii-9y7y26C-l4Y-unsplash.jpg" alt="Image">
                            </div>
                            <div class="review-text">
                                <h2>Seve One Baby Turtle</h2>
                                <h3>Donet 1$</h3>
                                
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vitae nunc eget leo finibus luctus et vitae lorem
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="review-slider-item">
                            <div class="review-img">
                                <img src="image/wexor-tmg-L-2p8fapOA8-unsplash.jpg" alt="Image">
                            </div>
                            <div class="review-text">
                                <h2>Seve One Baby Turtle</h2>
                                <h3>Donet 1$</h3>
                                
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vitae nunc eget leo finibus luctus et vitae lorem
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Review End -->        
        
         <!-- Footer Start -->
         <div class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="footer-widget">
                            <h2>Get in Touch</h2>
                            <div class="contact-info">
                                <p><i class="fa fa-map-marker"></i>NSBM Green University, Sri Lanka</p>
                                <p><i class="fa fa-envelope"></i>dnldissanayake1999@gmail.com</p>
                                <p><i class="fa fa-phone"></i>+94 764496776</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-6">
                        <div class="footer-widget">
                            <h2>Follow Us</h2>
                            <div class="contact-info">
                                <div class="social">
                                    <a href=""><i class="fab fa-twitter"></i></a>
                                    <a href=""><i class="fab fa-facebook-f"></i></a>
                                    <a href=""><i class="fab fa-linkedin-in"></i></a>
                                    <a href=""><i class="fab fa-instagram"></i></a>
                                    <a href=""><i class="fab fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="footer-widget">
                            <h2>Team Info</h2>
                            <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Terms & Condition</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                
               
            </div>
        </div>
        <!-- Footer End -->
        
        <!-- Footer Bottom Start -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 copyright">
                        <p>Copyright &copy; <a href="#">dnldissanayake</a>. All Rights Reserved</p>
                    </div>

                    <div class="col-md-6 template-by">
                        <p>Template By <a href="#">Dema</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Bottom End -->       
        
        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/slick/slick.min.js"></script>
        
        <!--  Javascript -->
        <script src="js/main.js"></script>
    </body>
</html>

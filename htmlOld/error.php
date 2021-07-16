<?php
    $error_message = filter_input(INPUT_GET,'errorMsg');    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>life below water/signup  0101</title>
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
       <div  style="background-image: url(image/alex-rose-sxAkZvheBFs-unsplash.jpg);">
            <div id="nav" class="sticky-nav">
        
             <nav class="navbar navbar-expand-lg  ">
               <div class="container">
               <a class="navbar-brand" href="#">logo</a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
                 <span></span>
                 <span></span>
               </button>
                 <form class="form-inline my-2 my-lg-0">
                   <button class="btn  my-2 my-sm-0 form-control mr-sm-2" type="submit">  <a  href="login.html">sing up</a></button>
                   <button class="btn  my-2 my-sm-0 form-control mr-sm-2" type="submit"> <a  href="singin.html">sing in</a></button>
                 </form>
                </div>
            </div>
             </nav>
            </div>
            <div style="color: red; background-image: url(image/alex-rose-sxAkZvheBFs-unsplash.jpg); height: 700px; ">
                <center><h1><br><br><br><br><br><?php echo $error_message?></h1></center>

            </div>
            </body>
            </html>

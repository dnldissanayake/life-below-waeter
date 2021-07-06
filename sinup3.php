<?php
session_start();
    include("connection.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $birthday = $_POST['birthday'];
        $email = $_POST['email'];

        if(!empty($username) && !empty($password) && !empty($birthday) && !empty($email)  )
        {
            //save to database
            $user_id=random_num(20);
            $query = "insert into users(user_id,username,email,birthday,password) values ('$user_id','$username','$email','$birthday','$password')";
        
            mysqli_query($con, $query);
            header("Location: index.html");
            die;
    
         }  else 
        {
           
            header("Location: error.html");
            die;

          
        }
    }
   ?> 

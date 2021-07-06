<?php

session_start();

    include("connection.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        

       if(!empty($username) && !empty($password) )
          {
            //read from database
           
            $query = "select * from users where username= '$username' ;";
        
            $result= mysqli_query($con, $query);

            if($result)
            {
                    if($result && mysqli_num_rows($result) > 0)
                {
                    $user_data = mysqli_fetch_assoc($result);
        
                    if($user_data['password']=== $password)
                    {
                        $_SESSION['user_id'] =$user_data['user_id'];
                      
                        header("Location: index.html");
                        die;
                    }

                }
            }
           
            header("Location: wrong.html");
            die;
                   
        } else
       
        {
            
            header("Location: wrong.html");
            die;
           
        }
    }
   ?> 

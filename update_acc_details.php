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
   
    $username = filter_input(INPUT_POST, 'username');
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $birthday = filter_input(INPUT_POST, 'birthday');
    
    $errorMsg = "";
    $isValid = TRUE;

    if (empty($username)){
        $errorMsg .= "Please enter your name.<br>";
        $isValid = FALSE;
    }
    if(empty($birthday)){
        $errorMsg .= "Please enter your date of birth.<br>";
        $isValid = FALSE;
    }
    if($email === FALSE) {
        $errorMsg .= "Please enter a valid e-mail address.<br>";
        $isValid = FALSE;
    }
    if($isValid === FALSE){
        header("Location: ./error.php?errorMsg=$errorMsg");
        exit();
    }
    else{
        require('./connection.php');

        $query = 'update users set username = :name, email = :mail, birthday = :birth where id = :u_id;';
        $statement = $database->prepare($query);
        $statement->bindValue(':name',$username);
        $statement->bindValue(':mail',$email);
        $statement->bindValue(':birth',$birthday);
        $statement->bindValue(':u_id',$user_id);

        try{
            $statement->execute();
        }catch(PDOException $except_uname){
            $errorMsg .= "The username you entered already exists. Your changes were not saved.<br>";
            header("Location: ./error.php?errorMsg=$errorMsg");
            exit();
        }
        $statement->closeCursor();

        header('Location: ./myAccount.php');
    }
?>
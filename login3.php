<?php
    $uName = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');

    $errorMsg = "";
    $isValid = TRUE;

    if(empty($uName)) {
        $errorMsg .= "Please enter your user name.<br>";
        $isValid = FALSE;
    }
    if (empty($password)){
        $errorMsg .= "Please enter your password.<br>";
        $isValid = FALSE;
    }

    if($isValid === FALSE){
        header("Location: ./error.php?errorMsg=$errorMsg");
        exit();
    }
    else{
        require('./connection.php');
        $query = 'select id from users where username=:uname and password=:pass';
        $statement = $database->prepare($query);
        $statement->bindValue(':uname',$uName);
        $statement->bindValue(':pass',$password);
        $statement->execute();
        $user_id_result = $statement->fetch();
        $statement->closeCursor();

        if($user_id_result === FALSE){
            $errorMsg = "The account was not found. Please try a different username or password.<br>";
            header("Location: ./error.php?errorMsg=$errorMsg");
            exit();
        }
        
        session_start();
        $_SESSION['user_id'] = $user_id_result['id'];

        header('Location: ./myAccount.php');
    }
?>

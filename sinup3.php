<?php
    
    $username = filter_input(INPUT_POST, 'username');
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $birthday = filter_input(INPUT_POST, 'birthday');
    $password = filter_input(INPUT_POST, 'password');
    
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
    if (empty($password)){
        $errorMsg .= "Please enter a password.<br>";
        $isValid = FALSE;
    }

    if($isValid === FALSE){
        header("Location: ./error.php?errorMsg=$errorMsg");
        exit();
    }

    else{
        require('./connection.php');

        $query = 'insert into users (username, email, birthday, password) values (:name, :mail, :birth, :pass);';
        $statement = $database->prepare($query);
        $statement->bindValue(':name',$username);
        $statement->bindValue(':mail',$email);
        $statement->bindValue(':birth',$birthday);
        $statement->bindValue(':pass',$password);

        try{
            $statement->execute();
        }catch(PDOException $except_uname){
            $errorMsg .= "The username you entered already exists. Try another one.<br>";
            header("Location: ./error.php?errorMsg=$errorMsg");
            exit();
        }
        $statement->closeCursor();

        header('Location: ./singin.html');
    }
?>

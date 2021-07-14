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

    $uPassOld = filter_input(INPUT_POST, 'uPassOld');
    $uPassNew = filter_input(INPUT_POST, 'uPassword');
    $uPassRep = filter_input(INPUT_POST, 'uPassRepeat');

    $errorMsg = "";
    $isValid = TRUE;

    if (empty($uPassOld)){
        $errorMsg .= "Please enter your current password.<br>";
        $isValid = FALSE;
    }
    if (empty($uPassNew)){
        $errorMsg .= "Please enter a new password.<br>";
        $isValid = FALSE;
    }
    if (empty($uPassRep)){
        $errorMsg .= "Please re-enter your new password.<br>";
        $isValid = FALSE;
    }
    if ($uPassRep !== $uPassNew) {
        $errorMsg .= "The new passwords do not match. Please re-enter the correct new password.<br>";
        $isValid = FALSE;
    }

    if($isValid === True){

        require('./connection.php');

        $query_pass = 'select password from users where id = :u_id;';
        $statement_pass = $database->prepare($query_pass);
        $statement_pass->bindValue(':u_id', $user_id);
        $statement_pass->execute();
        $pass_result = $statement_pass->fetch();
        $statement_pass->closeCursor();

        if($uPassOld !== $pass_result['password']){
            $errorMsg .= "The password you entered does not match your current password. Please enter the correct password.<br>";
            $isValid = FALSE;
        }
    }

    if($isValid === FALSE){
        header("Location: ./error.php?errorMsg=$errorMsg");
        exit();
    }

    else{
        require('./connection.php');

        $query = 'update users set password = :pass where id = :u_id;';
        $statement = $database->prepare($query);
        $statement->bindValue(':pass', $uPassNew);
        $statement->bindValue(':u_id', $user_id);
        $statement->execute();
        $statement->closeCursor();

        header("Location: ./myAccount.php");
    }
    ?>
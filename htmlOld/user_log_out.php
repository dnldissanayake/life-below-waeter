<?php
    if(!isset($_SESSION['user_id'])){
        session_start();
    }
    if(!isset($_SESSION['user_id'])){
        header('Location: ./singin.html');
        exit();
    }

    else{
        $_SESSION = array();  
        session_destroy(); 
 
        $session_name = session_name();
        $session_parameters = session_get_cookie_params();  
        $session_expire = strtotime('-1 year'); 
        $session_path = $session_parameters['path'];
        $session_domain = $session_parameters['domain'];
        $session_secure = $session_parameters['secure'];
        $session_httponly = $session_parameters['httponly'];
        setcookie($session_name, '', $session_expire, $session_path, $session_domain, $session_secure, $session_httponly);
    }

    header('Location: ./index.html');
    exit();
?>

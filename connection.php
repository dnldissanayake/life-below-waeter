<?php
    try{
        $database = new PDO('mysql:host=localhost;dbname=lbwter_db','root','');
    }catch (PDOException $except) {
        $errorMsg = $except->getMessage(); 
        header("Location: ./error.php?errorMsg=$errorMsg");
    }
?>

<?php
    $link = 'mysql:host=mdb-test.c6vunyturrl6.us-west-1.rds.amazonaws.com;dbname=bsale_test';
    $usuario = "bsale_test";
    $pass = "bsale_test";

    try {
        $pdo = new PDO($link, $usuario, $pass);
        //echo "<script>alert('Conectado...')</script>";
    } catch (PDOException $e) {
        echo "<script>alert('Error...')</script>";
    }
?>
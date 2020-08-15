<?php

    $link = 'mdb-test.c6vunyturrl6.us-west-1.rds.amazonaws.com';
    $username = "bsale_test";
    $password = "bsale_test";
    $bd = "bsale_test";
    
    try {
      
      $conexion = mysqli_connect($link,$username,$password,$bd);

    } catch (PDOException $e) {
      print "¡Error!: ". $e->getMessage()."<br/>";
      die();
    }
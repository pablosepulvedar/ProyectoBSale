<?php

    $link = 'mysql:host=mdb-test.c6vunyturrl6.us-west-1.rds.amazonaws.com;dbname=bsale_test';
    $username = "bsale_test";
    $password = "bsale_test";
    
    try {
      
        $mbd = new PDO($link, $username, $password);
        print "Conectado";

    } catch (PDOException $e) {
      print "¡Error!: ". $e->getMessage()."<br/>";
      die();
    }
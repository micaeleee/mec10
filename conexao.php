<?php
    $pdo = new PDO("mysql:host=localhost:3306;dbname=sgtcc_a", "root", "123456");

    $pdo->exec("SET NAMES utf8");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<?php
header( 'content-type: text/html; charset=utf-8' );
/****** Database Details *********/
$db_name = 'db591235862';
$hostname = 'db591235862.db.1and1.com';
$username = 'dbo591235862';
$password = '02101994Si_';

// Connexion to the database
try {
    $conn = new PDO("mysql:host=$hostname;default-character-set=utf8; dbname=$db_name", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}


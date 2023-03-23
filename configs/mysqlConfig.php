<?php

$user = "root";
$pass = "";
$db_name = "testweb";
$host  = "localhost";

try {
    $dbh = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>
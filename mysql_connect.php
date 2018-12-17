<?php
$user = 'root';
$password= '322333';
$db = 'users';
$host = 'localhost';

$dns = 'mysql:host='.$host.';dbname='.$db;
$pdo = new PDO($dns, $user, $password);

?>
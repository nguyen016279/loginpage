<?php
session_start();
require_once 'db.php';
require_once 'util.php';

$username = rtrim($_POST['username']);
$password = rtrim($_POST['password']);



$sql = "select * from users where (username = '$username' and password = '$password')";
$stmt = $db->prepare($sql);
$stmt->execute();
$user = $stmt->fetch();


if ($user){
    $_SESSION[AUTH] = $user;
    var_dump($_SESSION[AUTH]);
    header('Location: index.php');
}else{
    header('Location: login.php');
}






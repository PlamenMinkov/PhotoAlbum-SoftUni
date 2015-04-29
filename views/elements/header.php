<?php
    session_start();
    //include 'includes/functions.php';
    include_once 'libs/Database.php';
    
    $db = Database::getInstance();
    $db->setParameters('localhost', 'root', '', 'photo_album');
    $connection = $db->getConnection();
    mysqli_query($connection, 'SET NAMES utf8');
    mb_internal_encoding('UTF-8');
    if (!$connection) {
        echo 'Сриване на системата!!!';
        exit();
    }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title><?= $pageTitle ?></title>
</head>
<body>
<div id="container">
    Top Menu



<?php

    include_once "../../libs/Database.php";
    include_once '../../config/dataForDB.php';

if (!$GLOBALS['connection']) {
    echo 'Сриване на системата!!!';
    exit();
}

$ins = "SELECT * FROM `albums` WHERE `id`={$_GET["id"]}";

$res = $q = mysqli_query($GLOBALS['connection'], $ins);

while($row=$res->fetch_assoc()){
    $rank = $row['rank'];
    
    if($rank < 10) {
        $rank++;
    }
    
    $ins = "UPDATE `albums` SET `rank`={$rank} WHERE `id`={$_GET["id"]}";
    echo $ins;
    $q = mysqli_query($GLOBALS['connection'], $ins);
}

header('Location: http://localhost'.$_GET['uri']);


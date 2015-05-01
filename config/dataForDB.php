<?php
define( 'DB_HOST', 'localhost' );
define( 'DB_USERNAME', 'root' );
define( 'DB_PASSWORD', '' );
define( 'DB_DATABASE', 'photo_album' );

$db = \Lib\Database::getInstance();
$db->setParameters(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$connection = $db->getConnection();
mysqli_query($connection, 'SET NAMES utf8');
mb_internal_encoding('UTF-8');
if (!$connection) {
    echo 'Сриване на системата!!!';
    exit();
}

$GLOBALS['connection'] = $connection;

$GLOBALS['root_dir'] = str_replace("\\","/",DX_ROOT_DIR);

        

<table>
	<tr>
		<th>ID</th>
		<th>Name</th>
		<th>Year</th>
                <th>Rank</th>
	</tr>
<?php foreach( $albums as $album ) : ?>
	<tr>
            <td><?php echo $album['id']; ?></td>
            <td><?php echo $album['album_name']; ?></td>
            <td><?php echo $album['year']; ?></td>
            <td><?php echo $album['rank']; ?></td>
	</tr>
<?php endforeach; ?>
</table>
<form method="post" enctype="multipart/form-data">
    <table width="350" border="0" cellpadding="1" cellspacing="1" class="box">
        <tr> 
            <td width="246">
                <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
                <input name="userfile" type="file" id="userfile"> 
            </td>
            <td width="80"><input name="upload" type="submit" class="box" id="upload" value=" Upload "></td>
        </tr>
    </table>
</form>

<?php
    if(isset($_POST['upload']) && $_FILES['userfile']['size'] > 0)
    {
        $fileName = $_FILES['userfile']['name'];
        $tmpName  = $_FILES['userfile']['tmp_name'];
        $fileSize = $_FILES['userfile']['size'];
        $fileType = $_FILES['userfile']['type'];

        $fp      = fopen($tmpName, 'r');
        $content = fread($fp, filesize($tmpName));
        $content = addslashes($content);
        fclose($fp);

        if(!get_magic_quotes_gpc())
        {
            $fileName = addslashes($fileName);
        }
        //include 'library/config.php';
        //include 'library/opendb.php';
        
        $db = \Lib\Database::getInstance();
        $db->setParameters('localhost', 'root', '', 'photo_album');
        $connection = $db->getConnection();
        mysqli_query($connection, 'SET NAMES utf8');
        mb_internal_encoding('UTF-8');
        if (!$connection) {
            echo 'Сриване на системата!!!';
            exit();
        }

        $query = "INSERT INTO `pictures` (`picture_name`, `image`, `file_type`, `file_size`, `album_id`, `user_id` ) ".
        "VALUES ('$fileName', '$content', '$fileType', '$fileSize', 3, 1)";

        
        $q = mysqli_query($connection, $query) or die('Error, query failed'); 
        
        //include 'library/closedb.php';

        echo "<br>File $fileName uploaded<br>";
        
        
        
        $queryOne = "SELECT from `pictures`";

        $result = mysqli_query($connection, "SELECT * FROM `pictures`") or die('Error, query download failed');
        var_dump($result);
        while ($row = mysql_fetch_array($result)) {
            echo '<img heigh="300" width="300" src="data:image;base64,'.$row[2].'"';
        }
        //list($name, $type, $size, $img_content) =  mysql_fetch_array($result);
//        
        var_dump($img_content);
//        header("Content-length: $size");
//        header("Content-type: $type");
//        header("Content-Disposition: attachment; filename=$name");
//        echo $content;
    }
?>

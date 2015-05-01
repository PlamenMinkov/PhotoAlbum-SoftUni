<table>
	<tr>
		<th>Picture Name</th>
		<th>File Type</th>
		<th>File Size</th>
                <th>Album Id</th>
                <th>User Id</th>
	</tr>
<?php foreach( $images as $image ) : ?>
	<tr>
            <td><?php echo $image['picture_name']; ?></td>
            <td><?php echo $image['file_type']; ?></td>
            <td><?php echo $image['file_size']; ?></td>
            <td><?php echo $image['album_id']; ?></td>
            <td><?php echo $image['user_id']; ?></td>
	</tr>
<?php endforeach; ?>
</table>
<form action="" method="post" enctype="multipart/form-data">
    Select album type:
    <select name="type">
    <?php
        $result = mysqli_query($GLOBALS['connection'], "SELECT * FROM `albums`");
        
        while ($row = mysqli_fetch_array($result)) {
            echo '<option value="'.$row[0].'/'.$row[1].'">' . $row[1] .
                        '</option>';
        }
    ?>
    </select><br/>
    <input type="file" name="fileToUpload" id="fileToUpload"><br/>
    <span>Name: </span><input type="text" name="img_name" id="fileToUpload"><br/>
    <input type="submit" value="Upload Image" name="submit">
</form>

<?php

    if(isset($_POST['submit']) && count($_FILES) > 0)
    {
        $target_dir = "uploads/";
        
        $image = $_FILES['fileToUpload'];
        $file_type = $image['type'];
        $file_size = $image['size'];
        $file_path = $image['tmp_name'];
        echo 'dededede';
        
        $picName = $_POST['img_name'] . '.' . str_replace('image/', '', $file_type);
        
        if (!($file_type == "image/jpeg" || $file_type == "image/png" || $file_type == "image/gif")) {
            throw new Exception('Invalid extension for avatar');
        }
        if (!($file_size < 1048576)) {
            throw new Exception('File is too big.');
        }
        
        $album_type = explode("/", $_POST['type']);
        var_dump($album_type);
        $album_type = $album_type[1];
        
        if (!file_exists('uploads' . DIRECTORY_SEPARATOR . $album_type)) {
            mkdir('uploads' . DIRECTORY_SEPARATOR . $album_type, 0777);
        }
        
        $uploaded = move_uploaded_file($_FILES['fileToUpload']['tmp_name'], 'uploads' . DIRECTORY_SEPARATOR . $album_type . DIRECTORY_SEPARATOR . $picName);
        
        var_dump($uploaded);
        
        if ($uploaded == false) {
            throw new Exception('File upload failed');
        }
    }
?>

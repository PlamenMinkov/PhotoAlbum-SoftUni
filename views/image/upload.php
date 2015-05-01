<form action="" method="post" enctype="multipart/form-data">
    Select album:
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
    <span>Name: </span><input type="text" name="img_name"><br/>
    <input type="submit" value="Upload Image" name="submit">
</form>


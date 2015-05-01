<form action="" method="post" enctype="multipart/form-data">
    Select album type:
    <select name="type">
    <?php
        $result = mysqli_query($GLOBALS['connection'], "SELECT * FROM `album_types`");
        
        while ($row = mysqli_fetch_array($result)) {
            echo '<option value="'.$row[0].'/'.$row[1].'">' . $row[1] .
                        '</option>';
        }
    ?>
    </select><br/>
    <span>Name: </span><input type="text" name="album_name"><br/>
    <input type="submit" value="Create Album" name="submit">
</form>


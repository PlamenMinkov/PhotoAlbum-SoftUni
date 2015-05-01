<table>
	<tr>
		<th>ID</th>
		<th>Name</th>
	</tr>
<?php foreach( $album_types as $album_type ) : ?>
	<tr>
            <td><?php echo $album_type['id']; ?></td>
            <td><?php echo $album_type['type_name']; ?></td>
	</tr>
<?php endforeach; ?>
</table>
<form action="" method="post">
    Create new album type:<br/>
    <span>Name: </span><input type="text" name="type_name"><br/>
    <input type="submit" value="Create" name="submit">
</form>

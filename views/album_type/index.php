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

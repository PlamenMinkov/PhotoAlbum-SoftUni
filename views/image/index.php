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

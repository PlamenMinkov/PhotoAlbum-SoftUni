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


<table>
	<tr>
		<th>ID</th>
		<th>Username</th>
		<th>e-mail</th>
	</tr>
<?php foreach( $users as $user ) : ?>
	<tr>
            <td><?php echo $user['user_id']; ?></td>
            <td><?php echo $user['username']; ?></td>
            <td><?php echo $user['email']; ?></td>
	</tr>
<?php endforeach; ?>
</table>

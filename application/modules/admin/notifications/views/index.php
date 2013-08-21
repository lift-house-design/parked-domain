<h1>Notifications</h1>
<table id="notifications">
	<thead>
		<tr>
			<td>Name</td>
			<td>E-mail</td>
			<td>SMS</td>
			<td></td>
		</tr>
	</thead>
	<tbody>
	<?php foreach($entries as $notification): ?>
		<tr>
			<td><?php echo $notification['name'] ?></td>
			<td><?php echo $notification['email_enabled'] ? 'Yes' : 'No' ?></td>
			<td><?php echo $notification['sms_enabled'] ? 'Yes' : 'No' ?></td>
			<td class="center controls">
				<?php echo anchor('administration/notifications/configure/'.$notification['id'],'Configure',array('class'=>'button')) ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>
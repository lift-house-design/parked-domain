<h1>Configure Notification</h1>
<?php echo form_open('administration/notifications/configure/'.$entry['id'],array(
	'class'=>'aligned',
),array(
	'id'=>$entry['id'],
)) ?>
<?php if($entry['description']): ?>
	<p><?php echo $entry['description'] ?></p>
<?php endif; ?>
<?php if(!empty($entry['vars'])): ?>
<h3>Variables</h3>
<p>The following variables can be used in messages. Enter the variable's key surrounded by braces, like <em>{variable_key}</em>, and that variable will be replaced with the specified content.</p>
<dl>
<?php foreach($entry['vars'] as $var_key=>$var_description): ?>
	<dt>{<?php echo $var_key ?>}</dt>
	<dd> - <?php echo $var_description ?></dd>
<?php endforeach; ?>
</dl>
<?php endif; ?>
<h3>E-mail Settings</h3>
<div class="checkbox field">
	<?php echo form_checkbox(array(
		'name'=>'email_enabled',
		'id'=>'email_enabled',
		'checked'=>$entry['email_enabled']
	)) ?>
	<?php echo form_label('Enable an e-mail message for this notification','email_enabled') ?>
</div>
<div class="field<?php echo $entry['email_enabled'] ? '' : ' hidden' ?>">
	<?php echo form_label('E-mail Subject','email_subject') ?>
	<?php echo form_input(array(
		'name'=>'email_subject',
		'id'=>'email_subject',
		'value'=>$entry['email_subject'],
	)) ?>
</div>
<div class="field<?php echo $entry['email_enabled'] ? '' : ' hidden' ?>">
	<?php echo form_label('E-mail Message','email_message') ?>
	<?php echo form_textarea(array(
		'name'=>'email_message',
		'id'=>'email_message',
		'value'=>$entry['email_message'],
		'class'=>'x-large',
	)) ?>
</div>
<h3>SMS Settings</h3>
<div class="checkbox field">
	<?php echo form_checkbox(array(
		'name'=>'sms_enabled',
		'id'=>'sms_enabled',
		'checked'=>$entry['sms_enabled']
	)) ?>
	<?php echo form_label('Enable an SMS text message for this notification','sms_enabled') ?>
</div>
<div class="field<?php echo $entry['sms_enabled'] ? '' : ' hidden' ?>">
	<?php echo form_label('Text Message','sms_message') ?>
	<?php echo form_textarea(array(
		'name'=>'sms_message',
		'id'=>'sms_message',
		'value'=>$entry['sms_message'],
		'class'=>'x-large',
	)) ?>
</div>
<div class="buttons">
	<input type="submit" value="Save Notification" />
	<?php echo anchor('administration/notifications','Cancel',array('class'=>'button')) ?>
</div>
</form>
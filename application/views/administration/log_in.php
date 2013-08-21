<h1>Log In</h1>
<p>Log in with your e-mail address and password below.</p>
<?php echo form_open('administration/log_in',array('class'=>'aligned')) ?>
	<div class="field">
		<?php echo form_label('E-mail','email') ?>
		<?php echo form_input(array(
			'name'=>'email',
			'id'=>'email',
			'value'=>set_value('email'),
		)) ?>
	</div>
	<div class="field">
		<?php echo form_label('Password','password') ?>
		<?php echo form_password(array(
			'name'=>'password',
			'id'=>'password',
		)) ?>
	</div>
	<div class="buttons">
		<input type="submit" value="Log In" />
	</div>
</form>
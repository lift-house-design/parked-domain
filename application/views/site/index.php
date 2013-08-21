<h3>Contact Us</h3>
<p>Interested in purchasing this domain? Send us a message below.</p>
<?php echo form_open('',array('class'=>'aligned','id'=>'contact-form')) ?>
<?php echo form_field('E-mail','email','text',array(
	'required'=>TRUE,
)) ?>
<?php echo form_field('Message','message','textarea',array(
	'required'=>TRUE,
)) ?>
<?php echo form_field('CAPTCHA','captcha','captcha',array(
	'required'=>TRUE,
	'slug'=>'site/captcha',
)) ?>
<div class="buttons">
	<?php echo form_submit('send','Send Message') ?>
</div>
<?php echo form_close() ?>
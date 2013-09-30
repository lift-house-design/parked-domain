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
<div style="height:0px;overflow:hidden">
	<a href="http://lifthousedesign.com/">Austin Web Design</a> company, Lift House Design, offers 
	<a href="http://lifthousedesign.com/site/web_development">Web Development</a>,
	<a href="http://lifthousedesign.com/site/website_design">Website Design</a>,
	<a href="http://lifthousedesign.com/site/search_engine_optimization">Search Engine Optimization</a>,
	<a href="http://lifthousedesign.com/site/graphic_design">Graphic Design</a>,
	<a href="http://lifthousedesign.com/site/photography">Photography</a>,
	<a href="http://lifthousedesign.com/site/videography">Videography</a>, and Voice Acting services
</div>
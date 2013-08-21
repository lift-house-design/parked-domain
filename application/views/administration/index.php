<p>What would you like to change?</p>
<?php foreach($nav as $uri=>$title): ?>
	<?php echo anchor('administration/'.$uri,$title,array('class'=>'navigation-button')) ?>
<?php endforeach; ?>
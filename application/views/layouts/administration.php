<?php echo doctype('html5') ?>
<head>
	<title><?php echo $title ?></title>
	<?php echo meta(array(
		array('name'=>'Content-type','content'=>'text/html; charset=utf-8','type'=>'equiv'),
		array('name'=>'X-UA-Compatible','content'=>'IE=edge,chrome=1','type'=>'equiv'),
		array('name'=>'viewport','content'=>'width=device-width'),
		array('name'=>'title','content'=>$meta['title']),
		array('name'=>'description','content'=>$meta['description']),
		array('name'=>'copyright','content'=>$meta['copyright']),
		array('name'=>'author','content'=>'Nick Niebaum (nickniebaum@gmail.com)'),
	)) ?>
	<?php echo css($css) ?>
</head>
<body>
	<header>
		<?php echo anchor('administration','Administration',array('id'=>'logo')) ?>
		<nav>
			<?php if($logged_in): ?>
				<?php foreach($nav as $uri=>$title): ?>
					<?php echo anchor('administration/'.$uri,$title,$uri==$this->uri->rsegment(3) ? 'class="selected"' : '') ?>
				<?php endforeach; ?>
			<?php endif; ?>
		</nav>
		<?php if($logged_in): ?>
			<div id="account">
				Welcome back, <strong><?php echo trim($user['first_name'].' '.$user['last_name']) ?></strong> | <?php echo anchor('administration/log_out','Log Out') ?>
			</div>
		<?php endif; ?>
	</header>
	<div id="content" class="wrapper">
		<?php if(!empty($notifications)): ?>
			<div class="notifications">
				<ul>
					<li><?php echo implode('</li><li>',$notifications) ?></li>
				</ul>
			</div>
		<?php endif; ?>
		<?php if(!empty($errors)): ?>
			<div class="errors">
				<ul><?php echo $errors ?></ul>
			</div>
		<?php endif; ?>
		<?php echo $yield ?>
	</div>
	<?php echo js($js) ?>
	<?php if($ga_code!==false): ?>
	<script>
		var _gaq=[['_setAccount','<?php echo $ga_code ?>'],['_trackPageview']];
		(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
		g.src='//www.google-analytics.com/ga.js';
		s.parentNode.insertBefore(g,s)}(document,'script'));
	</script>
	<?php endif; ?>
</body>
</html>
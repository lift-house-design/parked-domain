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
<div class="wrapper">
	<header>
		<?php echo $site_name ?>
	</header>
	<div id="contents">
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
	<? if(!empty($yield_well_content)){ ?>
		<div class="well">
			<?php echo $yield_well_content ?>
		</div>
	<? } ?>
	<?php echo $yield ?>
	</div>
</div>
<?php echo js($js) ?>
<?php if($ga_code!==false): ?>
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  		ga('create', '<?=$ga_code?>', '<?=$domain?>');
  		ga('send', 'pageview');
	</script>
<?php endif; ?>
</body>
</html>
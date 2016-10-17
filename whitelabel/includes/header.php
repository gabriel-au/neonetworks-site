<div class="container_12 header">
	<div class="grid_12">
		<a href="index.php"><img src="<?=$logo?>" alt="<?=$company?>" /></a>
	</div>
</div>
<div class="container_12">
	<div class="grid_12">
		<span class="cnr-l"></span>
		<div class="nav">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="domain-names.php">Domain Names</a></li>
				<?php if (($cloud_hosting == 'yes') || ($cpanel_hosting == 'yes') || ($email_hosting == 'yes')) { ?><li><a href="web-hosting.php">Web Hosting</a></li><?php } ?>
				<li><a href="contact-us.php">Contact Us</a></li>
				<li><a href="support.php" class="support">Support</a></li>
				<li><a href="https://<?=$hostname?>.partnerconsole.net/" class="login">LOGIN</a></li>
			</ul>
		</div>
		<span class="cnr-r"></span>
	</div>
</div>

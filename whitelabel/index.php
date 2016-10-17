<?php require_once "config.php"; ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Domain Names &amp; Web Hosting | <?=$company?></title>
		<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
		<?php require_once "includes/admin-head.php"; ?>
	</head>
	<body>
		<?php require_once "includes/header.php"; ?>
		<div class="container_12">
			<div class="<?=($cloud_hosting == 'yes') || ($cpanel_hosting == 'yes') ? 'grid_8' : 'grid_12'?>">
				<div class="section">
					<h1>Domain Names &amp; Web Hosting</h1>
					<p>Getting online can be daunting, and at <?=$company?>, we have everything you need to get started. No frills, just reliable web hosting, simple domain registration and excellent service.</p>
					<p><?=$company?> is backed by Australia's largest domain registrar, utilising world-class hosting infrastructure. Rest assured that your personal or business website is safe and secure with us.</p>
				</div>
			</div>
			<?php if (($cloud_hosting == 'yes') || ($cpanel_hosting == 'yes')) { ?>
			<div class="grid_4">
				<div class="aside">
					<h3>Web Hosting</h3>
					<p>World class web hosting - security and reliability at a great price.</p>
					<a href="web-hosting.php" class="button">More info</a>
				</div>
			</div>
			<?php } ?>
		</div>
		<?php require_once "includes/search.php"; ?>
		<div class="container_12">
			<div class="<?=$domain_privacy == 'yes' ? 'grid_8' : 'grid_12'?>">
				<div class="section">
					<h2>The best services for your business</h2>
					<p>We offer a full range of web services, from domain registration to web hosting, and everything in between.</p>
					<p>Secure your domain with Domain Privacy and stay in control of it with Domain Manager.</p>
					<p>Choose the right level of hosting for your business, from our full range of Cloud and cPanel Hosting products. Just need a professional email address? Look no further than our Email Hosting product. <?php if ($cloud_hosting == 'yes' && $cpanel_hosting == 'yes' && $email_hosting == 'yes') { ?><a href="web-hosting.php">Learn more about our web hosting products</a>.<?php } ?></p>
				</div>
			</div>
			<?php if ($domain_privacy == 'yes') { ?>
			<div class="grid_4">
				<div class="aside privacy">
					<h3>Domain Privacy</h3>
					<p>Keep your .COM and .NET domain contact details private.</p>
					<a href="https://<?=$hostname?>.partnerconsole.net/execute2/store/domain-search?start=&productCodes=WHOIS-PRIV" class="button">Add to cart</a>
				</div>
			</div>
			<?php } ?>
		</div>
		<?php require_once "includes/footer.php"; ?>
	</body>
</html>

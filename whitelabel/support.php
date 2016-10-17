<?php require_once "config.php"; ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Support | <?=$company?></title>
		<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
		<?php require_once "includes/admin-head.php"; ?>
	</head>
	<body>
		<?php require_once "includes/header.php"; ?>
		<div class="container_12">
			<div class="<?=$support_email != '' ? 'grid_8' : 'grid_12'?>">
				<div class="section">
					<h1>Support</h1>
					<p>We pride ourselves on our knowledge and support. For the most frequently asked support questions, please check the resources below. If you cannot find what you are looking for here, please contact us and we will assist you.</p>
				</div>
				<div class="faq">
				    <h3>Control Panel Administration</h3>
				    <p>Our custom-made control panel is designed with you in mind. But if you are having any difficulty with logging in, or using the customer area, then read on.</p>
				    <ul class="arrows">
                        <li><a href="support-admin.php#1">How do I retrieve my login information?</a></li>
                        <li><a href="support-admin.php#2">How do I register a domain?</a></li>
                        <li><a href="support-admin.php#3">How do I transfer a domain?</a></li>
                        <li><a href="support-admin.php#4">How do I renew a domain?</a></li>
                        <li><a href="support-admin.php#5">How do I purchase hosting and other services?</a></li>
                        <li><a href="support-admin.php#6">How do I administer hosting and other services?</a></li>
                        <li><a href="support-admin.php#7">How do I renew hosting and other services?</a></li>
                        <li><a href="support-admin.php#8">How do I access my invoices online?</a></li>
                        <li><a href="support-admin.php#9">How do I cancel my service?</a></li>
                        <li><a href="support-admin.php#10">How do I upgrade/downgrade my hosting?</a></li>
				    </ul>
				</div>
				<div class="faq">
				    <h3>Cloud Hosting</h3>
				    <p>Just bought Cloud web hosting? Use this resources to help set up your email, upload your website with FTP, and install databases.</p>
				    <ul class="arrows">
                        <li><a href="support-cloud-hosting.php#1">Accessing your control panel</a></li>
                        <li><a href="support-cloud-hosting.php#2">Email setup and management</a></li>
                        <li><a href="support-cloud-hosting.php#3">FTP and configuration options</a></li>
                        <li><a href="support-cloud-hosting.php#4">Creating a website</a></li>
                        <li><a href="support-cloud-hosting.php#5">Database setup and management</a></li>
				    </ul>
				</div>
				<div class="faq">
				    <h3>cPanel Hosting</h3>
				    <p>Never used cPanel before? Don't worry, we've covered the basics here. cPanel also has a complete user guide, available from within your cPanel interface.</p>
				    <ul class="arrows">
                        <li><a href="support-cpanel-hosting.php#1">Accessing your control panel</a></li>
                        <li><a href="support-cpanel-hosting.php#2">Email setup and management</a></li>
                        <li><a href="support-cpanel-hosting.php#3">Updating DNS zones (A, CNAME Records)</a></li>
                        <li><a href="support-cpanel-hosting.php#4">Updating DNS zones (MX Records)</a></li>
                        <li><a href="support-cpanel-hosting.php#5">FTP and configuration options</a></li>
                        <li><a href="support-cpanel-hosting.php#6">Database setup and management</a></li>
				    </ul>
				</div>
				<div class="faq">
				    <h3>Domain Names</h3>
				    <p>Registering a domain name with us couldn't be simpler. But what happens after you own it? Do you need to delegate it to different nameservers? Don't know what zone records are? This resource is for you.</p>
				    <ul class="arrows">
                        <li><a href="support-domains.php#1">What are the rules of domain registration?</a></li>
                        <li><a href="support-domains.php#2">How do I delegate my domain, or update nameservers/DNS?</a></li>
                        <li><a href="support-domains.php#3">What is Domain Manager?</a></li>
                        <li><a href="support-domains.php#4">How do I manage my A, CNAME, and MX zone records?</a></li>
				    </ul>
				</div>
			</div>
			<?php if ($support_email != '') require_once "includes/form.php"; ?>
		</div>
		<?php require_once "includes/footer.php"; ?>
	</body>
</html>

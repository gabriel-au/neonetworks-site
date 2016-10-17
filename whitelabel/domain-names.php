<?php require_once "config.php"; ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Domain Name Registration | <?=$company?></title>
		<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
		<?php require_once "includes/admin-head.php"; ?>
	</head>
	<body>
		<?php require_once "includes/header.php"; ?>
		<div class="container_12">
			<div class="grid_8">
				<div class="section">
					<h1>Domain Name Registration</h1>
					<p>The first step to setting up an online business is securing the right domain name for your business. You need to choose a domain with a good keyword, so people can find and remember you, and choose the best domain extension for your business. Once you know what domain your business needs, it's quick and easy to register it with the right domain provider.</p>
					<p>With <?=$company?> your domain registration is complete with great value prices and superior service and support.</p>
				</div>
			</div>
			<div class="grid_4">
				<div class="link-box">
					<h3><a href="https://<?=$hostname?>.partnerconsole.net/rego/transfer.jsp">Transfer Domains</a></h3>
					<p>Keep all your domains together in the one account.</p>
					<a href="https://<?=$hostname?>.partnerconsole.net/rego/transfer.jsp" class="arrow">Transfer now</a>
				</div>
				<div class="link-box">
					<h3><a href="https://<?=$hostname?>.partnerconsole.net">Renew Domains</a></h3>
					<p>Don't let your domain name fall into somebody else's hands.</p>
					<a href="https://<?=$hostname?>.partnerconsole.net" class="arrow">Renew now</a>
				</div>
			</div>
		</div>
		<?php require_once "includes/search.php"; ?>
		<div class="container_12">
			<div class="grid_8">
				<div class="price-grid">
					<h2>Domain Pricing</h2>
					<?php 
					$i = 0; 
					foreach ($domains as $key => $value) 
					{
            $value = sprintf("%.2f", $value);
            $dollarValue =  number_format(substr($value, 0, strpos($value, ".")), 0, "","");
            $centValue =  str_pad(substr($value, strpos($value, ".")+1), 2, "0", STR_PAD_LEFT);

            echo '<div><span><sup>$</sup>' . $dollarValue . '<sup>.' . $centValue . '</sup></span>/yr<br/>' . $key;
            if (strpos($key, 'au')) echo ' *';
            echo '</div>';
            if (++$i > 5) break; 
					} 
					?>
				</div>
				<div class="section">
    			<h3>All Available Domain Extensions</h3>
          <div class="all-prices">
  					<div><strong>Extension</strong></div>
  					<div><strong>Price /yr</strong></div>
  					<div><strong>Extension</strong></div>
  					<div><strong>Price /yr</strong></div>
  					<div><strong>Extension</strong></div>
  					<div><strong>Price /yr</strong></div>
  					<?php 
  					$i = 0; 
  					foreach ($domains as $key => $value) 
  					{ 
              echo '<div>' . $key;
              if (strpos($key, 'au')) echo ' *';
              echo '</div>';
              echo '<div>$' . number_format($value, 2, ".", "") . '</div>';
  					} 
  					?>
          	<p class="conditions">View the <a href="https://www.icann.org/resources/pages/benefits-2013-09-16-en">Registrants' Benefits and Responsibilities</a>. * Minimum 2 years registration for .au domains.</p>
          </div>
        </div>
			</div>
			<div class="grid_4">
  			<?php if ($domain_manager == 'yes') { ?>
				<div class="aside">
					<h3>Domain Manager</h3>
					<p>Manage domain redirection, zones, MX records, A records and sub-domains.</p>
					<ul>
						<li>URL redirection</li>
						<li>Zone management</li>
						<li>Alias email account</li>
					</ul>
					<a href="https://<?=$hostname?>.partnerconsole.net/execute2/store/domain-search?start=&productCodes=DIT-DM" class="button">Add to cart</a>
				</div>
        <?php } ?>
        <?php if ($domain_privacy == 'yes') { ?>
				<div class="aside privacy">
					<h3>Domain Privacy</h3>
					<p>Keep your .COM and .NET domain contact details private.</p>
					<a href="https://<?=$hostname?>.partnerconsole.net/execute2/store/domain-search?start=&productCodes=WHOIS-PRIV" class="button">Add to cart</a>
				</div>
        <?php } ?>
			</div>
		</div>
		<?php require_once "includes/footer.php"; ?>
	</body>
</html>

<?php require_once "config.php"; ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Contact Us | <?=$company?></title>
		<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
		<?php require_once "includes/admin-head.php"; ?>
	</head>
	<body>
		<?php require_once "includes/header.php"; ?>
		<div class="container_12">
			<div class="<?=$support_email != '' ? 'grid_8' : 'grid_12'?>">
				<div class="section">
					<h1>Contact Us</h1>
				</div>
				<div class="contact">
				    <?php if (($support_phone == '') && ($support_email == '') && ($address1 == '') && ($address2 == '')) { ?>
				    We do not currently offer any support.
				    <?php } else { ?>
				    <div class="phonemail">
				        <?php if ($support_email != '') { ?>
                        <span>Support Email:</span>
                        <p><?=$support_email?></p>
				        <?php }
				        if ($support_phone != '') { ?>
                        <span>Support Phone:</span>
                        <p><?=$support_phone?></p>
				        <?php }
				        if ($fax != '') { ?>
                        <span>Fax:</span>
                        <p><?=$fax?></p>
                        <?php } ?>
				    </div>
				    <div class="address">
				        <?php if (($address1 != '') || ($address2 != '')) { ?>
                        <span>Postal Address:</span>
                        <p><?=$address1 != '' ? $address1 . '<br/>' : '',
                        $address2 != '' ? $address2 . '<br/>' : '',
                        $city != '' ? $city . ', ' : '', $state != '' ? $state . ', ' : '', 
                        $postcode != '' ? $postcode : ''?></p>
				        <?php } ?>
				    </div>
				    <?php } ?>
				</div>
				<div class="section">
					<h2>About Us</h2>
					<p><?=$company?> is a reseller of one of Australia's largest domain registrar. This means we have access to their world class web hosting infrastructure, and our customers get the best of both worlds - the personal touch of a small company, and the security and reliability of a large one.</p>
				</div>
			</div>
			<?php if ($support_email != '') require_once "includes/form.php"; ?>
        </div>
		<?php require_once "includes/footer.php"; ?>
	</body>
</html>

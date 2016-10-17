<?php require_once "config.php";
for($i=1;$i<4;$i++) {
    $cp = "cpanel$i"."_price";
    $ch = "cloud$i"."_price";
    $$cp = sprintf("%.2f", $$cp);
    $$ch = sprintf("%.2f", $$ch);
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Cloud &amp; cPanel Web Hosting | <?=$company?></title>
		<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
		<?php require_once "includes/admin-head.php"; ?>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
    	$(".tabContents").hide();
    	$(".tabContents:first").show();
    	$("#tabContainer ul li a").click(function(){
         var activeTab = $(this).attr("href"); //save the clicked links target
         $("#tabContainer ul li").removeClass("active"); // remove pre-highlighted tabs
         $(this).parent().addClass("active"); //set this link to highlight
         $(".tabContents").hide(); // again hide pre-showing div
         $(activeTab).fadeIn(); //match the target div &amp; show it
    		 return false;
    	});
    });
    </script>
	</head>
	<body>
		<?php require_once "includes/header.php"; ?>
		<div class="container_12">
			<div class="grid_12">
				<div class="section">
          <h1>Web Hosting</h1>
          <p>Whether you need a full-featured top-of-the-line hosting product, a simple hosting platform for your new website, or just a professional email address, we have the product for you. Check out our full range of hosting products below. All plans are hosted on world-class technology, with the security and reliability of Australia's largest hosting infrastructure.</p>
				</div>
			</div>
		</div>
		<div class="container_12">
			<div class="grid_12">
        <div id="tabContainer">
          <ul>
            <?php if ($cloud_hosting == 'yes') { ?>
            <li class="active"><a href="#tab1">Cloud Web Hosting</a></li>
            <?php } if ($cpanel_hosting == 'yes') { ?>
            <li<?php if ($cloud_hosting == 'no') { ?> class="active"<?php } ?>><a href="#tab2">cPanel Web Hosting</a></li>
            <?php } if ($email_hosting == 'yes') { ?>
            <li<?php if ($cloud_hosting == 'no' && $cpanel_hosting == 'no') { ?> class="active"<?php } ?>><a href="#tab3">Email Hosting</a></li>
            <?php } ?>
          </ul>
        </div>
        <div id="tabDetails">
          <?php if ($cloud_hosting == 'yes') { ?>
          <div id="tab1" class="tabContents">
            <h2>Cloud Web Hosting</h2>
            <p>With our Cloud products, your website will be hosted on our clustered, load-balanced servers in the Cloud. Your website service will be more reliable, robust and scalable, which means it will be up more of the time.</p>
            <ul class="arrows">
                <li>Choice of Windows or Linux OS, with IIS or Litespeed webserver</li>
                <li>Install apps easily - WordPress, Magento, Joomla &amp; Drupal</li>
                <li>Many popular scripting languages - PHP5, Perl/CGI, Python &amp; ASP</li>
                <li>Email features - Webmail, Anti-spam, Anti-virus &amp; Catchall Email Address</li>
                <li>Easy management - The Console, Manage DNS/Zones, Web Stats &amp; SSL</li>
            </ul>
            <table>
              <tr>
                <th class="empty"></th>
                <th>
                  <h2><?=$cloud1_name?></h2>
                  <div class="price"><span><sup>$</sup><?=substr($cloud1_price, 0, strpos($cloud1_price, "."));?><sup><?=strstr($cloud1_price, '.')?></sup></span>/mo</div>
                  <a href="https://<?=$hostname?>.partnerconsole.net/execute2/store/domain-search?start=&productCodes=CLOUD-STAND" class="button">Add to cart</a>
                </th>
                <th>
                  <h2><?=$cloud2_name?></h2>
                  <div class="price"><span><sup>$</sup><?=substr($cloud2_price, 0, strpos($cloud2_price, "."))?><sup><?=strstr($cloud2_price, '.')?></sup></span>/mo</div>
                  <a href="https://<?=$hostname?>.partnerconsole.net/execute2/store/domain-search?start=&productCodes=CLOUD-BUSIN" class="button">Add to cart</a>
                </th>
                <th>
                  <h2><?=$cloud3_name?></h2>
                  <div class="price"><span><sup>$</sup><?=substr($cloud3_price, 0, strpos($cloud3_price, "."))?><sup><?=strstr($cloud3_price, '.')?></sup></span>/mo</div>
                  <a href="https://<?=$hostname?>.partnerconsole.net/execute2/store/domain-search?start=&productCodes=CLOUD-PREM" class="button">Add to cart</a>
                </th>
              </tr>
              <tr>
                <td class="item">Disk space</td>
                <td class="data">10 GB</td>
                <td class="data">50 GB</td>
                <td class="data">100 GB</td>
              </tr>
              <tr>
                <td class="item">Monthly data limit</td>
                <td class="data">20 GB</td>
                <td class="data">100 GB</td>
                <td class="data">Unlimited</td>
              </tr>
              <tr>
                <td class="item">Email accounts</td>
                <td class="data">20</td>
                <td class="data">50</td>
                <td class="data">500</td>
              </tr>
              <tr>
                <td class="item">Mailbox size</td>
                <td class="data">1 GB</td>
                <td class="data">1 GB</td>
                <td class="data">1 GB</td>
              </tr>
              <tr>
                <td class="item">Number of databases</td>
                <td class="data">2</td>
                <td class="data">10</td>
                <td class="data">Unlimited</td>
              </tr>
              <tr>
                <td class="item">Database storage</td>
                <td class="data">1 GB</td>
                <td class="data">2 GB</td>
                <td class="data">5 GB</td>
              </tr>
            </table>
          </div>
          <?php } if ($cpanel_hosting == 'yes') { ?>
          <div id="tab2" class="tabContents">
            <h2>cPanel Web Hosting</h2>
            <p>cPanel is an industry standard, off-the-shelf product used all over the web. The easy-to-use online interface is accessible from wherever you are, allowing you to easily install applications, manage domains and check website statistics.</p>
            <ul class="arrows">
              <li>Linux operating system with Apache webserver</li>
              <li>Install apps easily - WordPress, Magento, Joomla &amp; Drupal</li>
              <li>Many popular scripting languages - PHP5, Perl/CGI &amp; Python</li>
              <li>Email features - Webmail, Anti-spam, Anti-virus &amp; Catchall Email Address</li>
              <li>Easy management - The Console, Manage DNS/Zones, Web Stats &amp; SSL</li>
            </ul>
            <table class="hosting" id="pods">
              <tr>
                <th class="empty"></th>
                <th>
                  <h2><?=$cpanel1_name?></h2>
                  <div class="price"><span><sup>$</sup><?=substr($cpanel1_price, 0, strpos($cpanel1_price, "."))?><sup><?=strstr($cpanel1_price, '.')?></sup></span>/mo</div>
                  <a href="https://<?=$hostname?>.partnerconsole.net/execute2/store/domain-search?start=&productCodes=CPANEL-PERSO" class="button">Add to cart</a>
                </th>
                <th>
                  <h2><?=$cpanel2_name?></h2>
                  <div class="price"><span><sup>$</sup><?=substr($cpanel2_price, 0, strpos($cpanel2_price, "."))?><sup><?=strstr($cpanel2_price, '.')?></sup></span>/mo</div>
                  <a href="https://<?=$hostname?>.partnerconsole.net/execute2/store/domain-search?start=&productCodes=CPANEL-BUSIN" class="button">Add to cart</a>
                </th>
                <th>
                  <h2><?=$cpanel3_name?></h2>
                  <div class="price"><span><sup>$</sup><?=substr($cpanel3_price, 0, strpos($cpanel3_price, "."))?><sup><?=strstr($cpanel3_price, '.')?></sup></span>/mo</div>
                  <a href="https://<?=$hostname?>.partnerconsole.net/execute2/store/domain-search?start=&productCodes=CPANEL-ENTER" class="button">Add to cart</a>
                </th>
              </tr>
              <tr>
                <td class="item">Disk space</td>
                <td class="data">10 GB</td>
                <td class="data">50 GB</td>
                <td class="data">100 GB</td>
              </tr>
              <tr>
                <td class="item">Monthly data limit</td>
                <td class="data">20 GB</td>
                <td class="data">100 GB</td>
                <td class="data">Unlimited</td>
              </tr>
              <tr>
                <td class="item">Email accounts</td>
                <td class="data">20</td>
                <td class="data">50</td>
                <td class="data">500</td>
              </tr>
              <tr>
                <td class="item">Mailbox size</td>
                <td class="data">Included in 10 GB</td>
                <td class="data">Included in 50 GB</td>
                <td class="data">Included in 100 GB</td>
              </tr>
              <tr>
                <td class="item">Number of databases</td>
                <td class="data">2</td>
                <td class="data">10</td>
                <td class="data">Unlimited</td>
              </tr>
              <tr>
                <td class="item">Database storage</td>
                <td class="data">Included in 10 GB</td>
                <td class="data">Included in 50 GB</td>
                <td class="data">Included in 100 GB</td>
              </tr>
              <tr>
                <td class="item">Subdomains</td>
                <td class="data">5</td>
                <td class="data">10</td>
                <td class="data">Unlimited</td>
              </tr>
              <tr>
                <td class="item">Add-on domains</td>
                <td class="data">2</td>
                <td class="data">10</td>
                <td class="data">20</td>
              </tr>
              <tr>
                <td class="item">Alias domains</td>
                <td class="data">Unlimited</td>
                <td class="data">Unlimited</td>
                <td class="data">Unlimited</td>
              </tr>
            </table>
          </div>
          <?php } if ($email_hosting == 'yes') { ?>
          <div id="tab3" class="tabContents">
            <h2>Email Hosting</h2>
            <p>We offer a complete range of email solutions from a simple mailbox to complete solutions. With clustered email technology, enhanced security, and online file storage options, we have the right email hosting product for you.</p>
            <ul class="arrows">
              <li>Secure webmail interface</li>
              <li>Up to 30 email addresses</li>
              <li>Anti-spam and anti-virus</li>
              <li>2 GB per mailbox storage</li>
              <li>1 GB online file storage</li>
            </ul>
            <table class="hosting" id="pods">
              <tr>
                <th class="empty"></th>
                <th>
                  <h2><?=$mail1_name?></h2>
                  <div class="price"><span><sup>$</sup><?=substr($mail1_price, 0, strpos($mail1_price, "."))?><sup><?=strstr($mail1_price, '.')?></sup></span>/mo</div>
                  <a href="https://<?=$hostname?>.partnerconsole.net/execute2/store/domain-search?start=&productCodes=OX-MAILBOX1" class="button">Add to cart</a>
                </th>
                <th>
                  <h2><?=$mail2_name?></h2>
                  <div class="price"><span><sup>$</sup><?=substr($mail2_price, 0, strpos($mail2_price, "."))?><sup><?=strstr($mail2_price, '.')?></sup></span>/mo</div>
                  <a href="https://<?=$hostname?>.partnerconsole.net/execute2/store/domain-search?start=&productCodes=OX-MAILBOX5" class="button">Add to cart</a>
                </th>
                <th>
                  <h2><?=$mail3_name?></h2>
                  <div class="price"><span><sup>$</sup><?=substr($mail3_price, 0, strpos($mail3_price, "."))?><sup><?=strstr($mail3_price, '.')?></sup></span>/mo</div>
                  <a href="https://<?=$hostname?>.partnerconsole.net/execute2/store/domain-search?start=&productCodes=OX-ADVANCED" class="button">Add to cart</a>
                </th>
              </tr>
              <tr>
                <td class="item">Email accounts</td>
                <td class="data">1</td>
                <td class="data">50</td>
                <td class="data">30</td>
              </tr>
              <tr>
                <td class="item">Individual mailbox size</td>
                <td class="data">500 MB</td>
                <td class="data">1 GB</td>
                <td class="data">2 GB</td>
              </tr>
              <tr>
                <td class="item">Collaboration tools (shared calendar, contacts, tasks, documents)</td>
                <td class="data">&mdash;</td>
                <td class="data">&mdash;</td>
                <td class="data">Yes</td>
              </tr>
              <tr>
                <td class="item">Online file storage</td>
                <td class="data">&mdash;</td>
                <td class="data">&mdash;</td>
                <td class="data">1 GB</td>
              </tr>
              <tr>
                <td class="item">Document view &amp; online editing</td>
                <td class="data">&mdash;</td>
                <td class="data">&mdash;</td>
                <td class="data">Yes</td>
              </tr>                          
              <tr>
                <td class="item">Email archiving</td>
                <td class="data">&mdash;</td>
                <td class="data">&mdash;</td>
                <td class="data">Yes</td>
              </tr>
              <tr>
                <td class="item">Email forwarding</td>
                <td class="data">&mdash;</td>
                <td class="data">Unlimited</td>
                <td class="data">Unlimited</td>
              </tr>
              <tr>
                <td class="item">Redirection (cloaked or uncloaked)</td>
                <td class="data">&mdash;</td>
                <td class="data">&mdash;</td>
                <td class="data">Yes</td>
              </tr>
              <tr>
                <td class="item">Zone edits</td>
                <td class="data">Up to 10 zone edits</td>
                <td class="data">Unlimited</td>
                <td class="data">Unlimited</td>
              </tr>
            </table>
          </div>
          <?php } ?>
        </div>
			</div>
		</div>
		<?php require_once "includes/footer.php"; ?>
	</body>
</html>

<?php require_once "config.php"; ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Control Panel Administration Support | <?=$company?></title>
		<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
		<?php require_once "includes/admin-head.php"; ?>
	</head>
	<body>
		<a name="top"></a>
		<?php require_once "includes/header.php"; ?>
		<div class="container_12">
			<div class="<?=$support_email != '' ? 'grid_8' : 'grid_12'?>">
				<div class="section">
				    <a href="support.php" class="back">Back</a>
					<h1>Support</h1>
					<p>We pride ourselves on our knowledge and support. For the most frequently asked support questions, please check the resources below. If you cannot find what you are looking for here, please contact us and we will assist you.</p>
				</div>
				<div class="faq">
				    <h3>Control Panel Administration</h3>
				    <p>Our custom-made control panel is designed with you in mind. But if you are having any difficulty with logging in, or using the customer area, then read on.</p>
				    <ul class="arrows">
              <li><a href="#1">How do I retrieve my login information?</a></li>
              <li><a href="#2">How do I register a domain?</a></li>
              <li><a href="#3">How do I transfer a domain?</a></li>
              <li><a href="#4">How do I renew a domain?</a></li>
              <li><a href="#5">How do I purchase hosting and other services?</a></li>
              <li><a href="#6">How do I administer hosting and other services?</a></li>
              <li><a href="#7">How do I renew hosting and other services?</a></li>
              <li><a href="#8">How do I access my invoices online?</a></li>
              <li><a href="#9">How do I cancel my service?</a></li>
              <li><a href="#10">How do I upgrade/downgrade my hosting?</a></li>
				    </ul>
				</div>
				<div class="section">
				    <ol class="faq-list">
				        <li><strong><a name="1"></a>How do I retrieve my login information?</strong>
                    <p>A new password for your account can be reset via our login area.</p> 
                    <ol class="tight">
                        <li>Access our login area.</li>
                        <li>Click <strong>Forgot password</strong>.</li>
                        <li>Enter your <strong>Account reference</strong><strong></strong> or a <strong>Domain name</strong>.</li>
                        <li>Click <strong>Submit</strong>. A password reset link will be sent to the email address linked to your account.</li> 
                    </ol>
                    <a href="#top" class="top">Back to top</a>
				        </li>
                <li><strong><a name="2"></a>How do I register a domain?</strong>
                    <p>Registering domain names are easy, you can complete a registration of a domain name from our website or within your account.</p>
                    <ol class="tight">
                        <li><strong>Log into your account</strong> using your username and password.</li> 
                        <li>Select the <strong>Order tab</strong>.</li>
                        <li>Enter the domain you wish to register in the search box under <strong>Search for a new domain name</strong>.</li>
                        <li>The <strong>Domain Search</strong> will display the availability status as well as registration requirements. Select the domain names you wish to register and click <strong>Add Selected Domain to Cart</strong>.</li>
                        <li><strong>Use Existing</strong> registrant contact details or select <strong>Create New Registrant Contact</strong> and enter the new contact details to be added against the domain name registration.</li>
                        <li>If required, enter your <strong>Eligibility Details</strong>. Check the .AU domain rules of registration for more details.</li> 
                        <li>Click <strong>Continue</strong>.</li>
                        <li>Agree to the terms and conditions and enter your credit card information.</li> 
                        <li>Click <strong>Place Order</strong>.</li> 
                    </ol>
                    <a href="#top" class="top">Back to top</a>
                </li>
                <li><strong><a name="3"></a>How do I transfer a domain?</strong>
                    <p>You can transfer a domain name from our website or within your account.</p> 
                    <ol class="tight">
                        <li><strong>Log into your account</strong> using your username and password.</li> 
                        <li>Select the <strong>Order</strong> tab.</li>
                        <li>Click <strong>Transfer Domain</strong>.</li> 
                        <li>Enter the domain name and select its extension within the drop down.</li> 
                        <li>Enter the domain password, your current registrar can provide the domain name password.</li> 
                        <li>Click <strong>Transfer</strong>.</li> 
                        <li>Enter the <strong>Registrant Contact</strong> and <strong>Billing</strong> information.</li> 
                        <li>Agree to the terms and conditions.</li> 
                        <li>Click <strong>Place Order</strong>.</li> 
                    </ol>
                    <a href="#top" class="top">Back to top</a>
                </li>
                <li><strong><a name="4"></a>How do I renew a domain?</strong>
                    <p>You will receive a reminder email from us when your domain name is coming up for renewal, which includes a direct link to renew the domain name, otherwise you can renew the domain name via your account with us.</p> 
                    <ol class="tight">
                        <li><strong>Log into your account</strong> using your username and password.</li>
                        <li>The home screen of your account will display the heading You have domains due for renewal. Select the domain to be renewed from the <strong>Domain</strong> drop-down list.</li>
                        <li>Click <strong>Renew/Allow Lapse</strong>.</li>
                        <li>Follow the instructions and enter your payment details in the required fields.</li> 
                        <li>Accept our terms and conditions.</li> 
                        <li>Click <strong>Renew</strong>.</li>
                    </ol>
                    <a href="#top" class="top">Back to top</a>
                </li>
                <li><strong><a name="5"></a>How do I purchase hosting and other services?</strong>
                    <ol class="tight">
                        <li><strong>Log into your account</strong> using your username and password.</li> 
                        <li>Select the <strong>Order</strong> tab.</li>
                        <li>Click <strong>Product &amp; Service Order Form</strong>.</li>
                        <li>On the left hand side, select the domain name from the drop down menu that reads <strong>Upgrade/downgrade</strong> and click <strong>Go</strong></li> 
                        <li>On the next page, click <strong>Add Hosting</strong>.</li>
                        <li>Select a hosting plan or service.</li> 
                        <li>Click <strong>Continue</strong>.</li>
                        <li>Enter payment details and agree to the terms and conditions.</li> 
                        <li>Click <strong>Place Order</strong>.</li> 
                    </ol>
                    <a href="#top" class="top">Back to top</a>
                </li>
                <li><strong><a name="6"></a>How do I administer hosting and other services?</strong>
                    <ol class="tight">
                        <li><strong>Log into your account</strong> using your username and password.</li> 
                        <li>Select the <strong>Overview</strong> tab.</li>
                        <li>Click <strong>Manage</strong> next to the domain you want to administer.</li>
                        <li>Click <strong>Web Hosting</strong> or <strong>cPanel</strong>.</li> 
                    </ol>
                    <a href="#top" class="top">Back to top</a>
                </li>
                <li><strong><a name="7"></a>How do I renew hosting and other services?</strong>
                    <ol class="tight">
                        <li><strong>Log into your account</strong> using your username and password.</li> 
                        <li>Select the <strong>Order</strong> tab.</li>
                        <li>Click <strong>Subscription Service Renewal</strong>.</li> 
                        <li>Select the check box next to the service you wish to renew.</li> 
                        <li>Enter your payment information.</li>
                        <li>Click <strong>Place Order</strong>.</li>
                    </ol>
                    <a href="#top" class="top">Back to top</a>
                </li>
                <li><strong><a name="8"></a>How do I access my invoices online?</strong>
                    <ol class="tight">
                        <li><strong>Log into your account</strong> using your username and password.</li>
                        <li>Select the <strong>Billing</strong> tab.</li> 
                        <li>Click <strong>Invoices Online</strong>.</li> 
                    </ol>
                    <a href="#top" class="top">Back to top</a>
                </li>
                <li><strong><a name="9"></a>How do I cancel my service?</strong>
                    <ol class="tight">
                        <li><strong>Log into your account</strong> using your username and password.</li>
                        <li>Select the <strong>Account</strong> tab.</li> 
                        <li>Click <strong>Cancel services</strong>.</li> 
                        <li>Select the domain name you wish to cancel from the drop down.</li> 
                        <li>Select whether you wish to cancel the service immediately or let the service expire on the the renewal date.</li> 
                        <li>Complete the remainder of the required fields.</li> 
                        <li>Agree to the cancellation terms.</li> 
                        <li>Click <strong>Submit</strong>.</li> 
                    </ol>
                    <a href="#top" class="top">Back to top</a>
                </li>
                <li><strong><a name="10"></a>How do I upgrade/downgrade my hosting?</strong>
                    <ol class="tight">
                        <li><strong>Log into your account</strong> using your username and password.</li> 
                        <li>Select the <strong>Order</strong> tab.</li> 
                        <li>Search for or select the domain from the drop down, click <strong>Administer</strong>.</li>
                        <li>On the left hand side, select the domain name from the drop down menu that reads <strong>Upgrade/downgrade</strong> and click <strong>Go</strong></li> 
                    </ol>
                    <a href="#top" class="top">Back to top</a>
                </li>
				    </ol>
				</div>
			</div>
			<?php if ($support_email != '') require_once "includes/form.php"; ?>
		</div>
		<?php require_once "includes/footer.php"; ?>
	</body>
</html>

<?php require_once "config.php"; ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Domain Names Support | <?=$company?></title>
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
				    <h3>Domain Names</h3>
				    <p>Registering a domain name with us couldn't be simpler. But what happens after you own it? Do you need to delegate it to different nameservers? Don't know what zone records are? This resource is for you.</p>
				    <ul class="arrows">
                        <li><a href="#1">What are the rules of domain registration?</a></li>
                        <li><a href="#2">How do I delegate my domain, or update nameservers/DNS?</a></li>
                        <li><a href="#3">What is Domain Manager?</a></li>
                        <li><a href="#4">How do I manage my A, CNAME, and MX zone records?</a></li>
				    </ul>
				</div>
				<div class="section">
				    <ol class="faq-list">
				        <li><strong><a name="1"></a>What are the rules of domain registration?</strong>
				            <ol class="none">
				                <li><em>.AU domains</em>
				                    <ol>
				                        <li><span>What is a .AU domain?</span>
                                            <p>.AU is the country code top-level domain (ccTLD) for Australia. To be eligible to for a .AU domain name you must fall in one of the following categories:</p>
                                            <ul class="tight">
                                                <li>A registered company in Australia</li>
                                                <li>Trading under a registered business name in any Australian State or Territory</li>
                                                <li>An Australian partnership or sole trader</li>
                                                <li>A foreign company licensed to trade in Australia</li>
                                                <li>n owner of an Australian Registered Trade Mark</li>
                                                <li>An applicant for an Australian Registered Trade Mark</li>
                                                <li>An association incorporated in any Australian State or Territory</li>
                                                <li>An Australian commercial statutory body</li>
                                            </ul>
				                        </li>
				                        <li><span>What are the registration terms for a .AU domain?</span>
                                            <p>.AU domain names can only be registered for a minimum/maximum of 2 years.</p>
				                        </li>
				                    </ol>
				                </li>
				                <li><em>.NZ domains</em>
				                    <ol>
				                        <li><span>What is a .NZ domain?</span>
                                            <p>.NZ is the country code top-level domain (ccTLD) for New Zealand. .CO.NZ is used for commercial enterprises, and .ORG.NZ is used for non-commercial organisations.</p>
				                        </li>
				                        <li><span>What are the registration terms for a .NZ domain?</span>
                                            <p>.NZ domain names can only be registered for a minimum of 1 year and a maximum of 10 years.</p>
				                        </li>
				                    </ol>
				                </li>
				                <li>.<em>UK domains</em>
				                    <ol>
				                        <li><span>What is a .CO.UK or .ORG.UK domain?</span>
                                            <p>.UK is the country code top-level domain (ccTLD) for Great Britain &amp; the United Kingdom. .CO.UK is used for commercial enterprises, and .ORG.UK is used for non-commercial organisations.</p>
				                        </li>
                                        <li><span>What are the registration terms for .UK domains?</span>
                                            <p>.UK domain names can only be registered for a minimum/maximum of 2 years.</p>
				                        </li>
				                    </ol>
				                </li>
				                <li><em>.COM/.NET/.ORG./.BIZ/.INFO domains</em>
				                    <ol>
                                        <li><span>What is a .COM or .NET domain?</span>
                                            <p>.COM and .NET were created in 1984 as one of the Internet's original top-level domains (TLDs), along with .GOV, .EDU, .ORG and .COM is unrestricted but was intended for commercial registrants. Similarly, .NET is also unrestricted but intended for network providers.</p>
                                        </li>
                                        <li><span>What are the registration terms for .COM or .NET domains?</span>
                                            <p>Registrants are required to register a .COM or .NET domain for a minimum one year registration period and a maximum 10 year registration period.</p>
                                        </li>
                                        <li><span>What is a .ORG domain?</span>
                                            <p>The .ORG domain is home of noncommercial organisations on the Internet. .ORG was created in 1984 as one of the Internet's original top-level domains (TLDs), along with .COM, .NET, .GOV, .EDU, and .MIL. Traditionally the top-level domains of the Internet serve different user groups. The .ORG domain was designated as an "open, unrestricted" domain, one in which anyone could register.</p> 
                                        </li>
                                        <li><span>What are the registration terms for a .ORG domain?</span>
                                            <p>Registrants are required to register a .ORG domain for a minimum one year registration period and a maximum 10 year registration period.</p>
                                        </li>
                                        <li><span>What is a .BIZ domain?</span>
                                            <p>.BIZ represents "business" domains. The .BIZ domain is restricted business or commercial use, defined as one of the following:</p>
                                            <ul class="tight">
                                                <li>To exchange goods, services, or property of any kind;</li>
                                                <li>In the ordinary course of trade or business; or</li>
                                                <li>To facilitate (i) the exchange of goods, services, information, or property of any kind; or, (ii) the ordinary course of trade or business</li>
                                            </ul>
                                        </li>
                                        <li><span>What are the registration terms for a .BIZ domain?</span>
                                            <p>Registrants are required to register a .BIZ domain for a minimum one year registration period and a maximum 10 year registration period.</p>
                                        </li>
                                        <li><span>What is a .INFO Domain?</span>
                                            <p>.INFO is the Internet's first unrestricted top-level domain since .COM. There are no restrictions on who may register .INFO names. .INFO was created for general use around the world.</p>
                                        </li>
                                        <li><span>What are the registration terms for a .INFO domain?</span>
                                            <p>Registrants are required to register a .INFO domain for a minimum one year registration period and a maximum 10 year registration period.</p>
                                        </li>
				                    </ol>
				                </li>
				            </ol>
                            <a href="#top" class="top">Back to top</a>
				        </li>
				        <li><strong><a name="2"></a>How do I delegate my domain, or update nameservers/DNS?</strong>
                            <p>For your domain name and hosting to work, your domain name must be delegated to a name server. A name server contains zone records, which are used to detail the IP address (or the location) of your web or email hosting server.</p> 
                            <p>To change (delegate) the nameservers:</p>
                            <ol class="tight">
                                <li><strong>Log into your account</strong> using your username and password.</li> 
                                <li>Locate the <strong>Administer/Upgrade Domain</strong> along the left hand side of the page.</li> 
                                <li>Search for or select the domain from the drop down, click <strong>Administer</strong>.</li>
                                <li>Click <strong>Domain Name</strong>.</li> 
                                <li>Locate the <strong>Domain Delegation</strong> section.</li> 
                                <li>To add a name server, type the hostname of the name server into the <strong>Hostname</strong> field.</li>
                                <li>To delete a name server, click <strong>Delete name server</strong> corresponding to the name server to be deleted.<br/>
                                Notes: Domain names require at least two name server records to function correctly. Some domain name servers may use three or more. DNS changes may take up to 4 hours for the delegation to begin working. This is due to propagation across the internet and is normal.</li>
                            </ol>
                            <a href="#top" class="top">Back to top</a>
				        </li>
                        <li><strong><a name="3"></a>What is Domain Manager?</strong>
                            <p>Domain Manager is a hosting service which adds redirection and DNS zone management to your domain registration.</p>
                            <p>With redirection you can redirect your domain name to any other web address, which allows you to have a more professional image if you update your domain name at a later date or use a domain name for a particular marketing campaign.</p> 
                            <p>If you need advanced zone management, where you host web or mail on another server you will have access to add and modify MX, A, CNAME records.</p> 
                            <p>How do I add Domain Manager to a domain name?</p>
                            <ol class="tight">
                                <li><strong>Log into your account</strong> using your username and password.</li> 
                                <li>Locate the <strong>Administer/Upgrade Domain</strong> along the left hand side of the page.</li>
                                <li>Search for or select the domain from the drop down, click <strong>Administer</strong>.</li>
                                <li>Click <strong>Upgrade or Downgrade Hosting Package</strong>.</li>
                                <li>Click <strong>Add Hosting</strong>.</li>
                                <li>Click the Select button for the <strong>Domain Manager</strong> service.</li>
                                <li>Click <strong>Continue</strong>.</li>
                                <li>Enter your billing information, agree to the terms and conditions.</li> 
                                <li>Click <strong>Place Order</strong>.<br/>
                                Note: The domain manager service can take up to 30 minutes to process.</li>
                            </ol>
                            <a href="#top" class="top">Back to top</a>
                        </li>
                        <li><strong><a name="4"></a>How do I manage my A, CNAME, and MX zone records?</strong>
                            <p>If you have purchased a Domain Manager you will now be able to create and change A, CNAME, and MX records for your domain.</p>
                            <p><strong>A</strong> (for 'address') records are DNS records that point a domain to a static IP address.</p>
                            <p><strong>CNAME</strong> (for 'Canonical Name') are used to map a hostname to another hostname. These can be used in creating subdomains, or directing non-www traffic to the www version of your site.</p>
                            <p><strong>MX</strong> (for 'Mail eXchange') records define the mail exchange server and establish the priority of processing. This is the server responsible for accepting email of behalf of your domain.</p>
                            <ol>
                                <li><span>How do I manage my A or CNAME zone records?</span>
                                    <ol class="tight">
                                        <li><strong>Log into your account</strong> using your username and password.</li> 
                                        <li>Locate the <strong>Administer/Upgrade Domain</strong> along the left hand side of the page.</li> 
                                        <li>Search for or select the domain from the drop down, click <strong>Administer</strong>.</li>
                                        <li>Click <strong>Zone Manager</strong>.</li> 
                                        <li>Click to <strong>Edit</strong> or <strong>Delete</strong> existing domain records</li>
                                        <li>To create a new A record;
                                            <ol>
                                                <li>Click <strong>A</strong> at the top of the page.</li>
                                                <li>Add the following details;
                                                    <ul>
                                                        <li><strong>Name</strong>: Name used in the A-record. We use two A-records when pointed to hosting - the domain name and the www prefix. Leave the name field blank where the domain name is pointed to an IP address</li>
                                                        <li><strong>TTL</strong>: Time to Live - it is best to leave the default setting unless you know what you are doing</li>
                                                        <li><strong>Host</strong>: The IP address of the A-record</li>
                                                    </ul>
                                                </li>
                                                <li>Click <strong>Add Record</strong>.</li>
                                            </ol>
                                        </li>
                                        <li>To create a new CNAME record;
                                            <ol>
                                                <li>Click <strong>CNAME</strong> at the top of the page.</li>
                                                <li>Add the following details;
                                                    <ul>
                                                        <li><strong>Name</strong>: Type in the subdomain you wish to create a CNAME record for, eg. blog, mail, or www rather than the full host name such as blog.mydomainname.com.au or www.mydomainname.com.au</li>
                                                        <li><strong>TTL</strong>: Time to Live - it is best to leave the default setting unless you know what you are doing</li>
                                                        <li><strong>Host</strong>: The name of the host to point the subdomain to, such as ghs.google.com</li>
                                                    </ul>
                                                </li>
                                                <li>Click <strong>Add Record</strong>.</li>
                                            </ol>
                                        </li> 
                                    </ol>
                                </li>
                                <li><span>How do I manage my MX zone records?</span>
                                    <ol class="tight">
                                        <li><strong>Log into your account</strong> using your username and password.</li> 
                                        <li>Locate the <strong>Administer/Upgrade Domain</strong> along the left hand side of the page.</li> 
                                        <li>Search for or select the domain from the drop down, click <strong>Administer</strong>.</li>
                                        <li>Click <strong>Zone Manager</strong>.</li> 
                                        <li><strong>Create an A record</strong> following the steps in the section above, defining the MX IP address (eg. mail)</li>
                                        <li>Click <strong>MX</strong> at the top of the page.</li>
                                        <li>Add the following details;
                                            <ul>
                                                <li><strong>Name</strong>: Leave this blank/empty (unless you want email addresses like email@subdomain.domain.tld)</li>
                                                <li><strong>TTL</strong>: Time to Live - it is best to leave the default setting unless you know what you are doing</li>
                                                <li><strong>Host</strong>: The hostname created in step 6 e.g. mail.domain.tld</li>
                                                <li><strong>Preference</strong>: 10 (Priority)</li>
                                                <li><strong>Is host fully qualified?</strong>: Selected</li>
                                            </ul>
                                        </li>
                                        <li>Click Add Record.</li>
                                    </ol>
                                </li>
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

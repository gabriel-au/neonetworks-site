<?php require_once "config.php"; ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Cloud Hosting Support | <?=$company?></title>
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
				    <h3>Cloud Hosting</h3>
				    <p>Just bought Cloud web hosting? Use this resources to help set up your email, upload your website with FTP, and install databases.</p>
				    <ul class="arrows">
                        <li><a href="#1">Accessing your control panel</a></li>
                        <li><a href="#2">Email setup and management</a></li>
                        <li><a href="#3">FTP and configuration options</a></li>
                        <li><a href="#4">Creating a website</a></li>
                        <li><a href="#5">Database setup and management</a></li>
				    </ul>
				</div>
				<div class="section">
				    <ol class="faq-list">
                        <li><strong><a name="1"></a>Accessing your control panel</strong>
                            <ol class="tight">
                                <li><strong>Log into your account</strong> using your username and password.</li> 
                                <li>Locate the Administer/Upgrade Domain along the left hand side of the page.</li> 
                                <li>Search for or select the domain from the drop down, click Administer.</li>
                            </ol>
                            <a href="#top" class="top">Back to top</a>
                        </li>
                        <li><strong><a name="2"></a>Email setup and management</strong>
                            <ol class="none">
                                <li><span>To create an email account:</span>
                                    <ol class="tight">
                                        <li>Locate <strong>Email</strong>.</li> 
                                        <li>Click <strong>Create a new pop account</strong>.</li> 
                                        <li>Type the email alias in the <strong>Username</strong> field.</li> 
                                        <li>Type the email password in the <strong>Password</strong> field.</li> 
                                        <li>Check the box to enable <strong>Antivirus</strong> and <strong>AntiSpam</strong>.</li> 
                                        <li>Click <strong>Create</strong>.</li> 
                                    </ol>
                                </li>
                                <li><span>To create an email alias:</span>
                                    <ol class="tight">
                                        <li>Locate <strong>Email</strong>.</li> 
                                        <li>Click <strong>Create a new alias account</strong>.</li> 
                                        <li>Type the email alias in the <strong>Alias</strong> name field.</li> 
                                        <li>Type the email address where the alias will forward emails to in the <strong>Target address</strong> field.</li> 
                                        <li>Check the box to enable <strong>Antivirus</strong> and <strong>AntiSpam</strong>.</li> 
                                        <li>Click <strong>Create</strong>.</li> 
                                    </ol>
                                </li>
                            </ol>
                            <a href="#top" class="top">Back to top</a>
                        </li>
                        <li><strong><a name="3"></a>FTP and configuration options</strong>
                            <ol class="none">
                                <li><span>Viewing FTP details:</span>
                                    <ol class="tight">
                                        <li>Locate <strong>Web Hosting</strong>.</li> 
                                        <li>Click <strong>Click here to modify your FTP details</strong>.</li>
                                        <li>Click <strong>View Password</strong>.</li>
                                    </ol>
                                </li>
                                <li><span>Change FTP Password:</span>
                                    <ol class="tight">
                                        <li>Locate <strong>Web Hosting</strong>.</li>
                                        <li>Click <strong>Click here to modify your FTP details</strong>.</li>
                                        <li>Click <strong>Modify user details</strong>.</li>
                                        <li>Enter a password in the <strong>New Password</strong> field.</li>
                                        <li>Retype the password in the <strong>Confirm Password</strong> field.</li>
                                        <li>Click <strong>Modify user</strong>.</li> 
                                    </ol>
                                </li>
                            </ol>
                            <a href="#top" class="top">Back to top</a>
                        </li>
                        <li><strong><a name="4"></a>Creating a website</strong>
                            <ol class="none">
                                <li><span>What applications are available for 1-click installation?</span>
                                    <p>We currently have WordPress, Joomla, Drupal and CubeCart available through <strong>Web packages</strong>.</p></li>
                                <li><span>How to upload your website</span>
                                    <p>Before people can see your website, you will need to upload your website files.</p>
                                    <ol class="tight">
                                        <li><strong>Download FileZilla</strong> (Recommended) or an equivalent FTP program.</li>
                                        <li><strong>Launch FileZilla</strong> from your computer.</li>
                                        <li>Complete the following fields, and then click <strong>Quickconnect</strong>:
                                            <ul>
                                                <li>Host: Your FTP hostname, commonly ftp.domainname.tld</li>
                                                <li>Username: Your FTP username</li> 
                                                <li>Password: Your FTP password</li> 
                                                <li>Port: 21</li>
                                            </ul>
                                        </li>
                                        <li>Once connected, FileZilla will display the contents of your hosting account, you can drag your website from your computer to FileZilla to begin the upload of your website.</li> 
                                    </ol>
                                </li>
                                <li><span>Find the Host, Username and Password for your FTP account:</span>
                                    <ol class="tight">
                                        <li>Locate <strong>Web Hosting</strong>.</li> 
                                        <li>Click <strong>Click here to modify your FTP details</strong>.</li>
                                        <li>Click <strong>View Password</strong>.</li>
                                    </ol>
                                </li>
                            </ol>
                            <a href="#top" class="top">Back to top</a>
                        </li>
                        <li><strong><a name="5"></a>Database setup &amp; management</strong>
                            <ol class="none">
                                <li><span>To create a database:</span>
                                    <ol class="tight">
                                        <li>Locate <strong>Database</strong>.</li>
                                        <li>Enter a database name in the <strong>DbName</strong> field.</li> 
                                        <li>Select the database type from the <strong>DbType</strong> drop down.</li> 
                                        <li>Click <strong>Create</strong>.</li> 
                                    </ol>
                                </li>
                                <li><span>Change database password:</span>
                                    <ol class="tight">
                                        <li>Locate <strong>Database</strong>.</li>
                                        <li>Click <strong>Change password</strong>.</li> 
                                    </ol>
                                </li>
                                <li><span>Viewing a sample database connection string:</span>
                                    <ol class="tight">
                                        <li>Locate <strong>Database</strong>.</li>
                                        <li>Click <strong>View sample DSN's</strong>.</li>
                                    </ol>
                                </li>
                                <li><span>Accessing phpMyAdmin (MySQL databases)</span>
                                    <ol class="tight">
                                        <li>Locate <strong>Database</strong>.</li>
                                        <li>Click the database name</li>			 
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

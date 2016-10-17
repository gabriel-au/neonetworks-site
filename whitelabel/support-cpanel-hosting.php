<?php require_once "config.php"; ?>
<!DOCTYPE html>
<html>
	<head>
		<title>cPanel Hosting Support | <?=$company?></title>
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
				    <h3>cPanel Hosting</h3>
				    <p>Never used cPanel before? Don't worry, we've covered the basics here. cPanel also has a complete user guide, available from within your cPanel interface.</p>
				    <ul class="arrows">
                        <li><a href="#1">Accessing your control panel</a></li>
                        <li><a href="#2">Email setup and management</a></li>
                        <li><a href="#3">Updating DNS zones (A, CNAME Records)</a></li>
                        <li><a href="#4">Updating DNS zones (MX Records)</a></li>
                        <li><a href="#5">FTP and configuration options</a></li>
                        <li><a href="#6">Database setup and management</a></li>
				    </ul>
				</div>
				<div class="section">
				    <ol class="faq-list">
                        <li><strong><a name="1"></a>Accessing your control panel</strong>
                            <ol class="tight">
                                <li><strong>Log into your account</strong> using your username and password.</li> 
                                <li>Locate the <strong>Administer/Upgrade Domain</strong> along the left hand side of the page.</li> 
                                <li>Search for or select the domain from the drop down, click <strong>Administer</strong>.</li>
                                <li>Click <strong>cPanel</strong>.</li>
                                <li>Click <strong>Manage Account</strong>.</li>
                            </ol>
                            <a href="#top" class="top">Back to top</a>
                        </li>
                        <li><strong><a name="2"></a>Email setup and management</strong>
                            <ol class="tight">
                                <li>Locate <strong>Email Accounts</strong>.</li>
                                <li>Type the email address to be created in the <strong>Email</strong> field.</li>
                                <li>If you manage more than one domain, make sure to select the appropriate domain from the drop-down menu.</li>
                                <li>Type the password in the <strong>Password</strong> field.</li>
                                <li>Retype the password in the <strong>Password</strong> (again) field.</li>
                                <li>Type the quota in the <strong>Mailbox Quota</strong> field. The quota defines how much hard drive space the account will be allowed to use.</li>
                                <li>Click <strong>Create Account</strong>.</li>
                            </ol>
                            <p>Existing addresses are displayed in a table. Using this table, it is possible to:</p>
                            <ul class="tight">
                                <li>See how much disk space the account uses.</li>
                                <li>Change a password.</li>
                                <li>Change a quota limit.</li>
                                <li>Delete an email address.</li>
                                <li>Access an account through webmail.</li>
                                <li>Configure a mail client.</li>
                            </ul>
                            <a href="#top" class="top">Back to top</a>
                        </li>
                        <li><strong><a name="3"></a>Updating DNS zones (A, CNAME Records)</strong>
                            <ol class="tight">
                                <li>Locate <strong>Simple DNS Editor</strong></li>
                                <li>To add an A record:
                                    <ol>
                                        <li>Select a domain from the drop-down menu.</li>
                                        <li>Type in the <strong>Name</strong> and <strong>Address</strong> of the A record.</li>
                                        <li>Click <strong>Add A Record</strong>.</li>
                                    </ol>
                                </li>
                                <li>To add a CNAME record:
                                    <ol>
                                        <li>Select a domain from the drop-down menu.</li>
                                        <li>Type in the <strong>Name</strong> and <strong>CNAME</strong> of the CNAME record.</li>
                                        <li>Click <strong>Add CNAME Record</strong>.</li>
                                    </ol>
                                </li>
                                <li>To delete an A or CNAME record:
                                    <ol>
                                        <li>Click <strong>Delete</strong> next to the record you wish to remove.</li>
                                        <li>Click <strong>Delete</strong> to confirm that the record should be deleted.</li>
                                    </ol>
                                </li>
                            </ol>
                            <a href="#top" class="top">Back to top</a>
                        </li>
                        <li><strong><a name="4"></a>Updating DNS zones (MX Records)</strong>
                            <ol class="tight">
                                <li>Locate MX Entry</li>
                                <li>To add an MX record:
                                    <ol>
                                        <li>Under <strong>Add New Record</strong>, set the new MX entry.</li>
                                        <li>In the <strong>Destination</strong> text box, type the hostname of the new mail exchanger.</li>
                                        <li>Click <strong>Add New Record</strong>.</li> 
                                    </ol>
                                </li>
                                <li>To delete an MX entry:
                                    <ol>
                                        <li>Click <strong>Delete</strong> next to the appropriate MX entry, in the MX Records list.</li>
                                        <li>Confirm that the entry should be deleted by clicking <strong>Delete</strong> again.</li>
                                    </ol>
                                </li>
                                <li>To edit an MX entry:
                                    <ol>
                                        <li>Click <strong>Edit</strong> next to the appropriate MX entry, in the MX Records list.</li>
                                        <li>Change the <strong>Priority</strong> or <strong>Destination</strong> as needed.</li>
                                        <li>Confirm that the entry should be changed by clicking <strong>Edit</strong> again.</li>
                                    </ol>
                                </li>
                            </ol>
                            <a href="#top" class="top">Back to top</a>
                        </li>
                        <li><strong><a name="5"></a>FTP and configuration options</strong>
                            <ol class="tight">
                                <li>Locate FTP Accounts</li>
                                <li>To add an FTP account:
                                    <ol>
                                        <li>Enter a username.</li>
                                        <li>In the <strong>Password</strong> box, type the account password.</li>
                                        <li>Retype the password in the <strong>Password</strong> (Again) box.</li>
                                        <li>Specify the FTP account's home directory.</li>
                                        <li>Set the disk space quota. The <strong>Quota</strong> field determines how much disk space will be allocated to the FTP account.</li>
                                        <li>Click <strong>Create FTP Account</strong>.</li>
                                    </ol>
                                </li>
                                <li>To connect via FTP, see the <a href="http://docs.cpanel.net/twiki/bin/view/11_30/WHMDocs/FtpConfig">cPanel FTP Configuration</a> document.</li>
                                <li>To upload your website:
                                    <ol>
                                        <li><strong>Download FileZilla</strong> (Recommended) or an equivalent FTP program.</li>
                                        <li><strong>Launch FileZilla</strong> from your computer.</li>
                                        <li>Complete the following fields, and then click <strong>Quickconnect</strong>:
                                            <ol>
                                                <li><strong>Host</strong>: Your FTP hostname, commonly ftp.domainname.tld</li>
                                                <li><strong>Username</strong>: Your FTP username</li> 
                                                <li><strong>Password</strong>: Your FTP password</li> 
                                                <li><strong>Port</strong>: 21</li>
                                            </ol>
                                        </li>
                                        <li>Once connected, FileZilla will display the contents of your hosting account, you can drag your website from your computer to FileZilla to begin the upload of your website.</li> 
                                    </ol>
                                </li>
                            </ol>
                            <a href="#top" class="top">Back to top</a>
                        </li>
                        <li><strong><a name="6"></a>Database setup and management</strong>
                            <ol class="tight">
                                <li>Locate <strong>MySQL Databases</strong>.</li> 
                                <li>To create a database:
                                    <ol>
                                        <li>In the <strong>New Database</strong> field, type a name for the database.</li>
                                        <li>Click <strong>Create Database</strong>.</li>
                                        <li>Click <strong>Go Back</strong>.</li>
                                    </ol>
                                </li>
                                <li>To create a database user:
                                    <ol>
                                        <li>Under <strong>Add New User</strong>, enter a username.</li>
                                        <li>Enter a password in the <strong>Password</strong> field.</li>
                                        <li>Retype the password in the <strong>Password</strong> (Again) field.</li>
                                        <li>Click <strong>Create User</strong>.</li>
                                    </ol>
                                </li>
                                <li>To define a user's privileges:
                                    <ol>
                                        <li>Under <strong>Add User to Database</strong>, select a user from the <strong>User</strong> drop-down menu.</li>
                                        <li>From the <strong>Database</strong> drop-down menu, select the database to which you wish to allow the user access.</li>
                                        <li>Click <strong>Add</strong>.</li>
                                        <li>From the <strong>MySQL Account Maintenance</strong> screen, select the privileges you wish to grant the user, or select <strong>ALL PRIVILEGES</strong>.</li>
                                        <li>Click <strong>Make Changes</strong>.</li>
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

<div class="container_12">
	<div class="grid_12">
		<div class="search">
		<?php if(strpos($_SERVER['REQUEST_URI'], '/domain-names.php')===false) { ?><a href="domain-names.php">View domain pricing</a><?php } ?>
		<h2>SEARCH FOR A DOMAIN</h2>
		<form action="https://<?=$hostname?>.partnerconsole.net/execute2/store/domain-search" method="post">
			<input type="hidden" name="start" value="">
			<div class="inner">
				<span>www.</span>
				<input name="domain" type="text" id="domain">
				<select name="tlds">
					<option value=".com.au">.com.au</option>
					<option value=".net.au">.net.au</option>
					<option value=".org.au">.org.au</option>
					<option value=".com">.com</option>
					<option value=".net">.net</option>
					<option value=".org">.org</option>
					<option value=".biz">.biz</option>
					<option value=".info">.info</option>
					<option value=".tv">.tv</option>
					<option value=".mobi">.mobi</option>
					<option value=".id.au">.id.au</option>
					<option value=".asn.au">.asn.au</option>
					<option value=".au.com">.au.com</option>
					<option value=".co.nz">.co.nz</option>
					<option value=".net.nz">.net.nz</option>
					<option value=".org.nz">.org.nz</option>
					<option value=".geek.nz">.geek.nz</option>
					<option value=".gen.nz">.gen.nz</option>
					<option value=".co.uk">.co.uk</option>
					<option value=".org.uk">.org.uk</option>
					<option value=".eu">.eu</option>
					<option value=".us">.us</option>
					<option value=".asia">.asia</option>
				</select>
			</div>
			<input type="submit" value="Search" class="button">
		</form>
		</div>
	</div>
</div>

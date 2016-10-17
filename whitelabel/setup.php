<?php
ini_set("error_reporting", "0");
//You need the old config file in the same directory
require_once('config.php');
$config = array_diff(get_defined_vars(), array(array()));
$wroteConfig = false;
function writeVariable($fileHandle, $variableName, $variableValue) {
    $variableValue = str_replace('"', '\"', $variableValue);
    return fwrite($fileHandle, "$".$variableName." = '".$variableValue."';\r\n");
}
function url_get_contents ($Url) {
    if (!function_exists('curl_init')){
        die('CURL is not installed!');
    }
    
    //If your hosting provider is behind a proxy, uncomment the two below lines of code and add your proxy details.
    //$proxy='ip:port';
    //curl_setopt($ch, CURLOPT_PROXY, $proxy);
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $Url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}
function fetchWhitelabelPricing($hostname) {
   // $data = file_get_contents("http://$hostname.partnerconsole.net/execute/pd_pricing");
    $data = url_get_contents("https://$hostname.partnerconsole.net/execute/pd_pricing");
    if($data === false) { return false; }
    $data = str_replace("\n", null, $data);
    //Split for each TLD
    $data = explode('<div id="tld', $data);
    $pricing = array();
    foreach($data as $d) {
        if(!preg_match('/<font size="\+1">([^<]+)<\/font>/', $d, $tld)) {
            continue;
        }
        $tld = $tld[1];
        //Split between renewal and rego
        $d = explode('<td colspan="3">Renewal</td>', $d);
        //rego
        if(!preg_match_all("/<td>(?P<period>\d{1,2}) yea(rs|r)<\/td><td>(?P<currency>\w{3})<\/td><td align=\"right\">(?P<price>\d+\.\d+)<\/td>/" ,$d[0], $rego)) {
            continue;
        }
        //TODO add extra stuff, for now we just want the yearly price for the whitelabel website.
        //For now we're just determining the yearly price
        array_push($pricing, array('price' => number_format($rego['price'][0] / $rego['period'][0], 2, '.', ''), 'tld' => $tld ));

    }
    return $pricing;
}if(isset($_GET['hostname'])) {
    $wl = fetchWhitelabelPricing($_GET['hostname']);
    if(sizeof($wl) == 0 || $wl === false) {
        echo json_encode(array("error" => true, "response" => "Unable to fetch pricing for: http://{$_GET['hostname']}.partnerconsole.net/"));
    }
    else {
        echo json_encode(array("error" => false, "response" => json_encode($wl)));
    }
    die();
}
if(isset($_POST['hostname'])) {
    $fh = fopen("config.php", "w");
    fwrite($fh, "<?php session_start();\r\n");


    //writing the TLD Pricing
    fwrite($fh, "\$domains = array(");
    foreach($_POST['tlds'] as $t => $p) {
        fwrite($fh, "'$t' => '$p', \r\n");
    }
    fwrite($fh, ");\r\n");

    //General Settings
    writeVariable($fh, "company", $_POST['company']);
    writeVariable($fh, "logo", $_POST['logo']);
    writeVariable($fh, "support_phone", $_POST['phone'][0]==="on"?$_POST['phone']['number']:'');
    writeVariable($fh, "support_email", $_POST['email'][0]==="on"?$_POST['email']['address']:'');
    writeVariable($fh, "fax", $_POST['fax'][0]==="on"?$_POST['fax']['number']:'');
    writeVariable($fh, "address1", $_POST['addr'][0]==="on"?$_POST['addr']['address1']:'');
    writeVariable($fh, "address2", $_POST['addr'][0]==="on"?$_POST['addr']['address2']:'');
    writeVariable($fh, "city", $_POST['addr'][0]==="on"?$_POST['addr']['city']:'');
    writeVariable($fh, "state", $_POST['addr'][0]==="on"?$_POST['addr']['state']:'');
    writeVariable($fh, "postcode", $_POST['addr'][0]==="on"?$_POST['addr']['postcode']:'');
    writeVariable($fh, "hostname", $_POST['hostname']);
    writeVariable($fh, "accref", $_POST['accref']);
    writeVariable($fh, "cpanel_hosting", $_POST['cpanel'][0]==="on"?'yes':'no');
    writeVariable($fh, "cloud_hosting", $_POST['cloud'][0]==="on"?'yes':'no');
    writeVariable($fh, "email_hosting", $_POST['mail'][0]==="on"?'yes':'no');
    for($i=1;$i<4; $i++) {
        writeVariable($fh, "cpanel".$i."_price", $_POST['cpanel'][$i]['price']);
        writeVariable($fh, "cpanel".$i."_name", $_POST['cpanel'][$i]['name']);
        writeVariable($fh, "cloud".$i."_price", $_POST['cloud'][$i]['price']);
        writeVariable($fh, "cloud".$i."_name", $_POST['cloud'][$i]['name']);
        writeVariable($fh, "mail".$i."_price", $_POST['mail'][$i]['price']);
        writeVariable($fh, "mail".$i."_name", $_POST['mail'][$i]['name']);
    }
    writeVariable($fh, "domain_manager", $_POST['domain_manager']==="on"?'yes':'no');
    writeVariable($fh, "domain_privacy", $_POST['domain_privacy']==="on"?'yes':'no');
    writeVariable($fh, "analytics_account", $_POST['google'][0]==="on"?$_POST['google']['account']:'');
    writeVariable($fh, "theme", $_POST['theme']);
    fwrite($fh, "?>\r\n");
    fclose($fh);
    $wroteConfig = true;
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
  <head>
    <title>Whitelabel Website Setup</title>
	<script src="http://code.jquery.com/jquery-latest.js"></script>
      <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" />
      <script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
      <script>
        var step = 1;
        //The code
        function runSetup() {
            switch(step) {
                case 1:
                    //disable multiple submissions
                    $(".next").hide();
                    part1();
                    $(".next").show();
                    $(".back").show();
                    break;
                case 2:
                    part2();
                    break;
                case 3:
                    part3();
                    break;
            }
        }

        function back() {
            switch(step) {
                case 2:
                    $("#part1").show();
                    $("#part2").hide();
                    $(".back").hide();
                    break;
                case 3:
                    $("#part2").show();
                    $("#part3").hide();
                    break;
            }
            step-=1;
        }

        function part1() {
            var hostname = $("#hostname").val();

            $.ajax({
                url: "?hostname="+hostname,
                dataType: "json"
            }).done(function( json ) {
                  $("#p1error").html('');
                  if(json.error) {
                      $("#p1error").html(json.response);
                  }
                  else {
                       $("#part2").show();
                       $("#part1").hide();
                      json.response = jQuery.parseJSON(json.response);
                      //$("#tlds").html('');

                      for (var i= 0; i<json.response.length; i++) {
                            var id = json.response[i].tld.replace(/\./g,"_");


                           if($("#"+id).length == 1) { //PHP has already put the field in place
                               //Update the pricing from the Whitelabel
                               $("#"+id).removeClass("notfound");
                               $("#"+id).html('<span><b>'+json.response[i].tld+'</b></span>$<input maxlength="6" name="tlds['+json.response[i].tld+']" value="'+json.response[i].price+'" />');
                           }
                           else { //TLD doesn't exist append it on the end of tlds
                                $("#tlds").append('<li class="ui-state-default" id="'+id+'"><span><i><b>'+json.response[i].tld+'</b></i></span>$<input maxlength="6" name="tlds['+json.response[i].tld+']" value="'+json.response[i].price+'" />');
                           }
                      }

                      $( "li.notfound" ).each(function( index ) {
                          var tld = $(this).text().replace("$", ""); //TLD Text
                          $('#disabled').show();
                          $('#disabled span').append(tld + ', ');
                          $(this).remove();
                      });




                      step++;
                  }
              });
        }

        function part2() {
            $("#part2").hide();
            $("#part3").show();
            $('.preview').attr('href', 'http://tppwhitelabel.au.com/?theme='+$('.theme').val());
            step++;
        }

        function part3() {
          //Form Submission
            $("#config").submit();

        }

        $(function() {
            $( "#tlds" ).sortable();
            $( "#tlds" ).disableSelection();
        });

        function toggleDiv(what) {
            var visible = $(what).next('div').is(":visible");
            if(visible) {
                $(what).next('div').hide();
            } else {
                $(what).next('div').show();
            }
        }
                
        function preview(what) {
            $('.preview').attr('target', '_blank');
            $('.preview').attr('href', 'http://tppwhitelabel.au.com/?theme='+$(what).val());
        }

	</script>
<style>
html, body, div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, img, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, b, u, i, center, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td, article, aside, canvas, details, embed, figure, figcaption, footer, header, hgroup, menu, nav, output, ruby, section, summary, time, mark, audio, video {
    margin: 0;
    padding: 0;
    border: 0;
    font-size: 100%;
    font: inherit;
    vertical-align: baseline;
}
body {
    font-family: Helvetica, Arial, sans-serif;
    color: #333;
    background: #fafafa;
    font-size: 15px;
    line-height: 19px;
    font-weight: 300;
}
body, html {
    height: 100%;
}
ol, ul {
    list-style: none;
}
a {
    color: #009cff;
    text-decoration: none;
}
p {
    margin-bottom: 1em;
}
input, select {
    font-size: 15px;
    margin: 0;
}
input {
    padding: 6px 10px;
}
form, .step {
    overflow: hidden;
}
h1 {
    font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
    font-weight: 200;
    font-size: 32px;
    line-height: 36px;
    margin-bottom: 20px;
}
h2 {
    font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
    font-size: 20px;
    font-weight: 600;
    line-height: 23px;
    margin-bottom: 10px;
}
.header {
    background: #006eb3;
    background: -moz-linear-gradient(top, #006eb3 0%, #005e99 100%);
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #006eb3), color-stop(100%, #005e99));
    background: -webkit-linear-gradient(top, #006eb3 0%, #005e99 100%);
    background: -o-linear-gradient(top, #006eb3 0%, #005e99 100%);
    background: -ms-linear-gradient(top, #006eb3 0%, #005e99 100%);
    background: linear-gradient(to bottom, #006eb3 0%, #005e99 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#006eb3',endColorstr='#005e99',GradientType=0);
}
.header .container {
    height: 130px;
}
.header .logo {
    position: absolute;
    bottom: 17px;
}
.header ul {
    float: right;
    margin-top: 7px;
}
.header li {
    float: left;
    padding: 10px;
    font-size: 15px;
}
.header li:last-child {
    padding-right: 0;
}
.header li a {
    color: #b2e2ff;
}
.header li a:hover, .header li a:focus {
    color: #fffbcc;
    text-decoration: none;
}
.header .login {
    color: #005E9F;
    background: #b2e2ff url(http://www.tppwholesale.com.au/images/icons/login-key.png) 16px 8px no-repeat;
    padding: 10px 16px 11px 42px;
    border-radius: 30px 4px 4px 30px;
    -moz-border-radius: 30px 4px 4px 30px;
    font-weight: 400;
}
.header .login:hover, .header .login:focus {
    color: #005E9F;
    background-color: #fffbcc;
}
.footer {
    position: relative;
    margin-top: -100px;
    height: 60px;
    clear: both;
    padding-top: 40px;
    z-index: 99;
}
.footer-legal {
    background: #333;
    height: 60px;
}
.footer-legal ul {
    padding-top: 20px;
}
.footer-legal li {
    float: left;
    margin-right: 20px;
}
.footer li {
    font-size: 13px;
    line-height: 16px;
    margin-bottom: 10px;
}
.footer-legal a {
    color: #b3b3b3;
    font-size: 12px;
    line-height: 16px;
}
.footer-legal p {
    color: #b3b3b3;
    font-size: 13px;
    line-height: 16px;
    float: right;
}
.wrap {
    min-height: 100%;
}
.main {
    padding-bottom: 60px;
}
.container {
    margin-left: auto;
    margin-right: auto;
    width: 950px;
    position: relative;
    clear: both;
}
.inner {
    background: #fff;
    padding: 30px;
    margin: 40px 0;
    overflow: hidden;
}
#part1 input {
    margin: 0 5px;
}
#tlds {
    overflow: hidden;
    width: 570px;
}
#tlds li {
    float: left;
    width: 180px;
    background: #fff;
    border-width: 0 0 1px 0;
    border-color: #ccc;
    padding: 6px 0;
    margin-right: 10px;
    cursor: move;
}
#tlds li i {
    color: #1F9943;
    margin-left: 5px;
    font-weight: bold;
}

#tlds input {
    width: 55px;
    font-size: 15px;
    margin-left: 5px;
}
#tlds span {
    width: 85px;
    float: left;
    line-height: 38px;
}
#tlds .ui-sortable-helper {
    background: #fafafa;
    border-width: 1px;
    padding: 6px 3px 2px 5px;
}

#part3 legend {
    font-weight: 600;
    padding: 1em 0;
}
#part3 label {
    float: left;
    width: 230px;
    clear: left;
    line-height: 38px;
}
#part3 div label {
    width: 190px;
}
#part3 input, #part3 select {
    float: left;
}
#part3 input[type=text] {
    width: 300px;
}
#part3 input[type=checkbox] {
    height: 38px;
}
#part3 select, #disabled {
    margin-top: 10px;
}
.step div {
    overflow: hidden;
    float: left;
    clear: both;
    padding: 20px;
    background: #fafafa;
    margin: 0 20px 10px;
}
.preview {
    float: left;
    margin-left: 20px;
    font-size: 13px;
    line-height: 38px;
}
.next, .back {
    border-radius: 4px 30px 30px 4px;
    -moz-border-radius: 4px 30px 30px 4px;
    padding: 10px 52px 10px 16px;
    color: #fff;
    font-size: 17px;
    font-weight: 400;
    float: left;
    border: 0;
    cursor: pointer;
    background: #21a649 url(http://www.tppwholesale.com.au/images/icons/arrow-thick.png) 100% 50% no-repeat;
    margin: 30px 10px 0 0;
}
.next:hover { background-color: #1f9943; }
.back {
    border-radius: 4px;
    background: #33b1ff;
    padding-right: 16px;
}
.back:hover {background-color: #009cff;}
</style>
</head>
<body>

<div class="wrap">
<div class="main">

<div class="header">
    <div class="container">
        <a href="http://www.tppwholesale.com.au/" title="TPP Wholesale" class="logo"><img src="http://www.tppwholesale.com.au/images/tppwholesale.png" alt="TPP Wholesale" width="448" height="55"></a>
        <ul>
            <li><a href="http://www.tppwholesale.com.au/blog/">Blog</a></li>
            <li><a href="http://www.tppwholesale.com.au/forum/">Forum</a></li>
            <li><a href="http://www.tppwholesale.com.au/contact.php">Contact Us</a></li>
            <li><a href="http://www.tppwholesale.com.au/support/">Support Centre</a></li>
            <li><a href="https://www.tppwholesale.com.au/login.php" class="login">Login</a></li>
        </ul>
    </div>
</div>
        
<div class="container">

    <div class="inner">

        <form method='post' id='config'>
        
            <h1>Whitelabel Website Setup</h1>

            <?php if($wroteConfig) { echo "<div class='step'><h2>Saved Config</h2> <p>Please test your site and remove the setup.php file.</p> </div>"; } ?>
        
            <div id='part1' class='step' style='display:<?=$wroteConfig?'none':'show'?>'>
                <h2>Part 1</h2>
                <p>Account reference: <input type='text' id='accref' name='accref' value='<?=$config['accref']?>'/></p>
                <p>Hostname: http://<input type='text' id='hostname' name='hostname' value='<?=$config['hostname']?>'/>.partnerconsole.net/</p>
                <p id='p1error'></p>
            </div>
            
            <div id='part2' class='step' style='display:none'>
                <h2>Part 2</h2>
                <p>Change the domain prices, and <strong>drag and drop</strong> the TLDs to change the display order.</p>
                <p>The first two rows are displayed prominently on your site.</p>
                <ul id="tlds">
                    <?php
                        foreach($domains as $t => $p) {
                            $id = str_replace(".", "_", $t);
                            echo "<li class='ui-state-default notfound' id='$id'><span><b>$t</b></span>$<input maxlength='6' name='tlds[$t]' value='$p' /></li>";
                        }
                    ?>
                </ul>

                <p id='disabled' style='display:none'>The following TLD's were disabled as they have not been enabled on your whitelabel: <span></span></p>
            </div>
            
            <div id='part3' class='step' style='display:none;'>
                <h2>Part 3</h2>
                <p>Set your product and pricing preferences.</p>
                <fieldset>
                    <legend>Company Information</legend>
                    <label for='company'>Company name</label>
                    <input type='text' id='company' name='company' value='<?=$config['company']?>' />
                    <label for='logo'>Logo path</label>
                    <input type='text' name='logo' id='logo' value='<?=$config['logo']?>' />
                    <label for='check_phone'>Provide phone support</label>
                    <input type='checkbox' name='phone[]' id='check_phone' onclick='toggleDiv(this)' <?=$config['support_phone']!==''?'checked="true"':''?> />
                    <div style='display: <?=$config['support_phone']!==''?'show':'none';?>'>
                        <label for='support_phone'>Phone number</label>
                        <input type='text' name='phone[number]' id='support_phone' value='<?=$config['support_phone']?>' />
                    </div>
                    <label for='check_email'>Provide email support</label>
                    <input type='checkbox' name='email[]' id='check_email' onclick='toggleDiv(this)'  <?=$config['support_email']!==''?'checked="true"':''?> />
                    <div style='display: <?=$config['support_email']!==''?'show':'none';?>'>
                        <label for='support_email'>Email Address</label>
                        <input type='text' name='email[address]' id='support_email' value='<?=$config['support_email']?>' />
                    </div>
                    <label for='check_fax'>Include fax number</label>
                    <input type='checkbox' name='fax[]' id='check_fax' onclick='toggleDiv(this)' <?=$config['fax']!==''?'checked="true"':''?>/>
                    <div style='display: <?=$config['fax']!==''?'show':'none';?>'>
                        <label for='fax'>Fax number</label>
                        <input type='text' name='fax[number]' id='fax' value='<?=$config['fax']?>' />
                    </div>
                    <label for='check_addr'>Include postal address</label>
                    <input type='checkbox' name='addr[]' id='check_addr' onclick='toggleDiv(this)' <?=$config['address1']!==''||$config['address2']!==''||$config['city']!==''||$config['state']!==''||$config['postcode']!==''?'checked="true"':'';?>/>
                    <div style='display: <?=$config['address1']!==''||$config['address2']!==''||$config['city']!==''||$config['state']!==''||$config['postcode']!==''?'show':'none';?>'>
                        <label>Address 1</label>
                        <input type='text' name='addr[address1]' id='address1' value='<?=$config['address1']?>' />
                        <label>Address 2</label>
                        <input type='text' name='addr[address2]' id='address2' value='<?=$config['address2']?>' />
                        <label>City</label>
                        <input type='text' name='addr[city]' id='city' value='<?=$config['city']?>' />
                        <label>State</label>
                        <input type='text' name='addr[state]' id='state' value='<?=$config['state']?>' />
                        <label>Postcode</label>
                        <input type='text' name='addr[postcode]' id='postcode' value='<?=$config['postcode']?>' />
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Pricing</legend>
                    <label>Add Cloud Hosting</label>
                    <input type='checkbox' onclick='toggleDiv(this)' name='cloud[]' <?=$config['cloud_hosting']==='yes'?'checked="true"':'';?> />
                    <div style='display: <?=$config['cloud_hosting']==='yes'?'show':'none';?>;'>
                        <label for='cloud1_name'>Cloud 1 product name</label>
                        <input type='text' name='cloud[1][name]' id='cloud1_name' value='<?=$config['cloud1_name']?>' />
                        <label for='cloud1_price'>Cloud 1 price</label>
                        <input type='text' name='cloud[1][price]' id='cloud1_price' value='<?=$config['cloud1_price']?>' />
                        <label for='cloud2_name'>Cloud 2 product name</label>
                        <input type='text' name='cloud[2][name]' id='cloud2_name' value='<?=$config['cloud2_name']?>' />
                        <label for='cloud2_price'>Cloud 2 price</label>
                        <input type='text' name='cloud[2][price]' id='cloud2_price' value='<?=$config['cloud2_price']?>' />
                        <label for='cloud3_name'>Cloud 3 product name</label>
                        <input type='text' name='cloud[3][name]' id='cloud3_name' value='<?=$config['cloud3_name']?>' />
                        <label for='cloud3_price'>Cloud 3 price</label>
                        <input type='text' name='cloud[3][price]' id='cloud3_price' value='<?=$config['cloud3_price']?>' />
                    </div>
                    <label>Add cPanel Hosting</label>
                    <input type='checkbox' onclick='toggleDiv(this)' name='cpanel[]' <?=$config['cpanel_hosting']==='yes'?'checked="true"':'';?> />
                    <div style='display: <?=$config['cpanel_hosting']==='yes'?'show':'none';?>;'>
                        <label for='cpanel1_name'>cPanel 1 product name</label>
                        <input type='text' name='cpanel[1][name]' id='cpanel1_name' value='<?=$config['cpanel1_name']?>' />
                        <label for='cpanel1_price'>cPanel 1 price</label>
                        <input type='text' name='cpanel[1][price]' id='cpanel1_price' value='<?=$config['cpanel1_price']?>' />
                        <label for='cpanel2_name'>cPanel 2 product name</label>
                        <input type='text' name='cpanel[2][name]' id='cpanel2_name' value='<?=$config['cpanel2_name']?>' />
                        <label for='cpanel2_price'>cPanel 2 price</label>
                        <input type='text' name='cpanel[2][price]' id='cpanel2_price' value='<?=$config['cpanel2_price']?>' />
                        <label for='cpanel3_name'>cPanel 3 product name</label>
                        <input type='text' name='cpanel[3][name]' id='cpanel3_name' value='<?=$config['cpanel3_name']?>' />
                        <label for='cpanel3_price'>cPanel 3 price</label>
                        <input type='text' name='cpanel[3][price]' id='cpanel3_price' value='<?=$config['cpanel3_price']?>' />
                    </div>
                    <label>Add Email Hosting</label>
                    <input type='checkbox' onclick='toggleDiv(this)' name='mail[]' <?=$config['email_hosting']==='yes'?'checked="true"':'';?> />
                    <div style='display: <?=$config['email_hosting']==='yes'?'show':'none';?>;'>
                        <label for='mail1_name'>Email 1 product name</label>
                        <input type='text' name='mail[1][name]' id='mail1_name' value='<?=$config['mail1_name']?>' />
                        <label for='mail1_price'>Email 1 price</label>
                        <input type='text' name='mail[1][price]' id='mail1_price' value='<?=$config['mail1_price']?>' />
                        <label for='mail2_name'>Email 2 product name</label>
                        <input type='text' name='mail[2][name]' id='mail2_name' value='<?=$config['mail2_name']?>' />
                        <label for='mail2_price'>Email 2 price</label>
                        <input type='text' name='mail[2][price]' id='mail2_price' value='<?=$config['mail2_price']?>' />
                        <label for='mail3_name'>Email 3 product name</label>
                        <input type='text' name='mail[3][name]' id='mail3_name' value='<?=$config['mail3_name']?>' />
                        <label for='mail3_price'>Email 3 price</label>
                        <input type='text' name='mail[3][price]' id='mail3_price' value='<?=$config['mail3_price']?>' />
                    </div>
                    <label for='domain_manager'>Add Domain Manager</label>
                    <input type='checkbox' name='domain_manager' id='domain_manager' <?=$config['domain_manager']==='yes'?'checked="true"':''?> />
                    <label for='domain_privacy'>Add Domain Privacy</label>
                    <input type='checkbox' name='domain_privacy' id='domain_privacy' <?=$config['domain_privacy']==='yes'?'checked="true"':''?> />
                </fieldset>
                <fieldset>
                    <legend>Miscellaneous</legend>
                    <label for='check_google'>Add Google Analytics code</label>
                    <input type='checkbox' name='google[]' id='check_google' onclick='toggleDiv(this)' <?=$config['analytics_account']!==''?'checked="true"':''?> />
                    <div style='display: <?=$config['analytics_account']!==''?'show':'none'?>;'>
                        <label for='analytics_account'>Analytics account</label>
                        <input type='text' name='google[account]' id='analytics_account' value='<?=$config['analytics_account']?>' />
                    </div>
                    <label for='theme'>Theme colour setting</label>
                    <select name='theme' id='theme' class='theme' onchange='preview(this)'>
                        <option value='styles' <?=$config['theme']=="styles"?"selected=true":''?>>Default</option>
                        <option value='red' <?=$config['theme']=="red"?"selected=true":''?>>Red</option>
                        <option value='blue' <?=$config['theme']=="blue"?"selected=true":''?>>Blue</option>
                        <option value='green'<?=$config['theme']=="green"?"selected=true":''?>>Green</option>
                        <option value='natural'<?=$config['theme']=="natural"?"selected=true":''?>>Natural</option>
                        <option value='teal'<?=$config['theme']=="teal"?"selected=true":''?>>Teal</option>
                        <option value='custom'<?=$config['theme']=="custom"?"selected=true":''?>>Custom</option>
                    </select>
                    <a href="http://tppwhitelabel.au.com/?theme=default" target="_blank" class="preview">Preview Theme</a>
                </fieldset>
            </div>
        </form>

        <input type='submit' value='Back' class="back" onclick='back()' style='display: none;' />
        <input type='submit' value='Next' onclick='runSetup()' class="next" style='display:<?=$wroteConfig?'none':'show'?>' />
        
    </div>
    
</div>

</div>
</div>

<div class="footer">
    <div class="footer-legal">
        <div class="container">
            <ul>
                <li><a href="http://www.tppwholesale.com.au/contact.php">Contact Us</a></li>
                <li><a href="http://www.tppwholesale.com.au/legals/">Terms &amp; Conditions</a></li>
                <li><a href="http://www.tppwholesale.com.au/privacy-policy.php">Privacy Policy</a></li>
                <li><a href="http://www.tppwholesale.com.au/disclaimer.php">Disclaimer</a></li>
				<li><a href="http://www.tppwholesale.com.au/sitemap.php">Sitemap</a></li>
            </ul>
            <p><a href="http://www.tppwholesale.com.au/copyright.php">Copyright</a> &copy; 2013 TPP Wholesale Pty Ltd, ABN 54 109 565 095. All rights reserved</p>
        </div>
    </div>
</div>

</body>
</html>

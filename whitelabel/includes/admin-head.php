<?php
//This code should determine what included it
$trace = debug_backtrace();
$support = false;
if (isset($trace[0])) {
    $file = dirname($trace[0]['file']);
    $file = explode("\\", $file);
    $file = $file[sizeof($file)-1];
    //If this file was included from the "support" directory, then set the support boolean to true
    $support = $file==="support"?true:false;
}
?>
<link rel="stylesheet" href="<?=$support?"../css/styles.css":"css/styles.css"?>" type="text/css" />
<link rel="stylesheet" href="<?=$support?"../css/$theme.css":"css/$theme.css"?>" type="text/css" />
<?php if ((isset($analytics_account)) && ($analytics_account != '') ) { ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', '<?=$analytics_account?>', 'auto');
  ga('send', 'pageview');
</script>
<?php } ?>

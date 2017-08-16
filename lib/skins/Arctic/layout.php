<?php
/**
 * 
 * STOP!!!!!!!!
 * 
 * Are you editing the crystal skin directly?
 * DON'T
 * 
 * Copy and rename the crystal folder. Otherwise it'll get 
 * overwritten in an update.
 * 
 * Also, READ THE DOCS
 * 
 *   http://www.phpvms.net/docs/skinning
 * 
 */
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=7">
<title><?php echo $page_title; ?></title>
<link rel="stylesheet" media="all" type="text/css" href="<?php echo SITE_URL?>/lib/skins/Arctic/dist/css/bootstrap.css" />
<link rel="stylesheet" media="all" type="text/css" href="<?php echo SITE_URL?>/lib/skins/Arctic/styles.css" />
<script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo fileurl('lib/skins/Arctic/dist/js/bootstrap.js');?>"></script>
<style>

</style>
<?php 
/* This is required, so phpVMS can output the necessary libraries it needs */
echo $page_htmlhead; 
?>

<?php /*Any custom Javascript should be placed below this line, after the above call */ ?>



</head>
<body>
<?php
/* This should be the first thing you place after a <body> tag
	This is also required by phpVMS */
echo $page_htmlreq;
?>
<?php
			
			Template::Show('core_navigation.tpl');
			?>
<div id="carousel-example-generic" class="carousel slide">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
<li data-target="#carousel-example-generic" data-slide-to="2"></li>
<li data-target="#carousel-example-generic" data-slide-to="3"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">


    <div class="item active">
      <img src="<?php echo SITE_URL; ?>/lib/skins/Arctic/images/slideshow.png">
      
    </div>
     <div class="item">
      <img src="<?php echo SITE_URL; ?>/lib/skins/Arctic/images/slideshow.png" alt="">
      
    </div>
  <div class="item">
      <img src="<?php echo SITE_URL; ?>/lib/skins/Arctic/images/slideshow.png" alt="">
      
    </div>
  <div class="item">
      <img src="<?php echo SITE_URL; ?>/lib/skins/Arctic/images/slideshow.png" alt="">
      
    </div>
 
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
    <span class="icon-prev"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
    <span class="icon-next"></span>
  </a>
</div>
<div id="body">

	
	
			
		
	<div class="alert alert-info">

 <?php
if(!Auth::LoggedIn())
{
	echo "<i style='font-size:14px;'>You are not logged in. <a href='".url('/login')."'>Click here to login</a></i>";
	}else{
?>
	<i style='font-size:14px;' >Welcome back, <?php echo Auth::$userinfo->firstname; ?>!</i>
	<div style="float:right;"><a class="btn btn-default btn-xs" style="text-decoration:none;" href="<?php echo url('/profile'); ?>" >Pilot Panel</a> <a style="text-decoration:none;" class="btn btn-default btn-xs" href="<?php echo url('/logout'); ?>">Log Out</a></div>
<?php
}
?>

</div>
	<div id="bodytext">
	
	<?php
	/*	This will insert all of the "meat" of the page in there - the template
		which is generated, depending on which page you're on. To change these
		templates, check out the docs on the site. They're under the /core/templates
		folder, and to change them, copy them into the folder of your skin (the
		folder this file is in right now.
	 */
	 
	echo $page_content;
	
	?>
	
	</div>
	</div>
	<div id="footer">
	<p>copyright &copy; 2007 - <?php echo date('Y') ?> - <?php echo SITE_NAME; ?><br />
	<!-- Please retain this!! It's part of the phpVMS license. You must display a
			"powered by phpVMS" somewhere on your page. Thanks! -->
	<a href="http://www.phpvms.net" target="_blank">Powered by phpVMS</a> | Designed by <a href="http://www.zumeweb.com" target="_blank">Zumeweb.com</a></p>
	</div>	

</body>
</html>
<?php
	global $SHOW_NAVBAR;
	global $SCROLL_LOCKED;
	$bodyClassAddons = "";
	$bodyClassAddons .= $SHOW_NAVBAR ? 'hasNavbar ' : 'hasNoNavbar ';
	$bodyClassAddons .= $SCROLL_LOCKED ? 'scrollLocked ' : '';
  $bodyClassAddons .= 'section-' . get_bfamfaphd_section_slug() . ' ';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title><?php bloginfo('title'); ?></title>
		<?php wp_head() ?>
		<?php get_template_part('imports') ?>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
	<body <?php body_class($bodyClassAddons); ?>>
		<?php 
			if($SHOW_NAVBAR){
				get_template_part('navbar'); 
			}
		?>
		<div class="container">

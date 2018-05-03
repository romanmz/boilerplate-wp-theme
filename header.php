<!DOCTYPE html>
<html class="no-js" <?php language_attributes() ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ) ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ) ?>">
	
	<!-- Favicons -->
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo THEME_URL ?>/assets/favicons/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo THEME_URL ?>/assets/favicons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo THEME_URL ?>/assets/favicons/favicon-16x16.png">
	<link rel="manifest" href="<?php echo THEME_URL ?>/assets/favicons/site.webmanifest">
	<link rel="mask-icon" href="<?php echo THEME_URL ?>/assets/favicons/safari-pinned-tab.svg" color="#ffc40d">
	<link rel="shortcut icon" href="<?php echo THEME_URL ?>/assets/favicons/favicon.ico">
	<meta name="msapplication-TileColor" content="#ffc40d">
	<meta name="msapplication-config" content="<?php echo THEME_URL ?>/assets/favicons/browserconfig.xml">
	<meta name="theme-color" content="#ffffff">
	
	<!-- Detect old browsers -->
	<!--[if IE]><script> document.documentElement.className += ' outdated-browser'; </script><![endif]-->
	<script>
		if(navigator.appVersion.indexOf('MSIE 10') !== -1) {
			document.documentElement.className += ' outdated-browser';
		} else if(navigator.userAgent.indexOf('Trident') !== -1 && navigator.userAgent.indexOf('rv:11') !== -1) {
			document.documentElement.className += ' ie11';
		}
	</script>
	
	<!-- Load styles and scripts -->
	<?php wp_head() ?>
</head>
<body <?php body_class() ?>>

<!-- Skip to content button -->
<a id="skip-to-content" href="#content" class="screen-reader-text focusable button">Skip to content</a>

<!-- Browser support alerts -->
<noscript><div id="javascript-disabled-alert" class="message message--alert no-margin">This site requires JavaScript. <a href="http://enable-javascript.com/" target="_blank">Click here for instructions on enabling it in your browser</a>.</div></noscript>
<div id="outdated-browser-alert" class="message message--alert no-margin" style="display:none">You are using an <strong>outdated browser</strong>. Please <a href="http://browsehappy.com/" target="_blank">upgrade your browser</a> to improve your experience.</div>

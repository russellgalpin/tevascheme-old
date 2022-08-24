<!doctype html>
<html lang="en">
<head>
	<!-- meta tags -->
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
	<title><?php echo $title_for_layout; ?></title>
	<?php
	if (isset($meta_description)) {
		echo $this->Html->meta('description', $meta_description);
	}    
	if (isset($meta_keywords)) {
		echo $this->Html->meta('keywords', $meta_keywords);
	}
	?>

	<!-- favicon -->
	<link type="image/x-icon" href="/favicon.ico" rel="shortcut icon" />
	<link type="image/x-icon" href="/favicon.ico" rel="icon" />

	<!-- css -->
	<?php
	echo $this->Html->css('style.css');        
	?>

	<!-- jQuery -->
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<?php
	echo $this->Html->script('global.min.js');
	echo $this->Html->script('home.min.js');

	// Google Analytics
	echo $this->element('google_analytics');
	?>			
</head>
<body class="homepage">
	<section class="dialog-container">
		<div class="dialog">
			<div class="main-dialog">
				<img src="/img/roundalls-1.svg" alt="Roundalls" class="roundalls">
				<h1>Teva</h1>
					<h3 class="set-left">A simple choice for generics</h3>
					<p>To access this section of the Teva UK Limited website you need to be a member of the Healthcare Profession. The Teva Schemes have been designed for Pharmacists and Dispensing Doctors' Surgeries who want to buy generics from Teva UK Limited.</p>
					<p>To ensure you receive information that is relevant to you please click on the appropriate button below.</p>
					<div class="main-links">
						<button id="not-a-hcp">I am not a Healthcare Professional</button>
						<button id="hcp-ps">I am a Healthcare Professional from a Pharmacy</button>
						<button id="hcp-dd">I am a Healthcare Professional from a Dispensing Doctors' Surgery</button>
					</div>
			</div>
			<div class="slide-dialog nhcp-text" style="display:none">
				<p>Teva UK Limited is one of the biggest pharmaceutical companies in the UK and millions of patients throughout the UK benefit from our medicines. The backbone of our UK business is generic pharmaceuticals and we also have a range of branded products, used in primary and secondary care.</p>
				<p>The Teva Scheme website is intended for Healthcare Professionals, such as Pharmacists and Dispensing Doctors, that purchase our range of generic pharmaceuticals.</p>
				<p>If you are not a Healthcare Professional or are from a Healthcare Profession not from a Pharmacy or a Dispensing Doctors' Surgery, then you can find information about Teva on our main Teva UK website.</p>
				<p>Click below to enter the main Teva UK Website:</p>
				<a href="http://www.tevauk.com/" target="_blank"><button class="btn-primary">Teva UK</button></a>
			</div>
		</div>
	</section>
	<div class="overlay"></div>
	<div class="main-container">
    	<?php echo $this->fetch('content'); ?>
	</div>
</body>
</html>
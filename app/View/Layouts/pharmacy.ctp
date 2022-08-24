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
        echo $this->Html->script('map.min.js');

        // Google Analytics
        echo $this->element('google_analytics');
	?>

</head>
<body class="sections">

    <?php echo $this->fetch('content'); ?>

</body>
</html>
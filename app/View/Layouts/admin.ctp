<?php echo $this->Html->docType('html5');?>

<html lang="en">
<head>
<?php echo $this->Html->charset(); ?>

    <title>NuBlue CMS - <?php echo $title_for_layout; ?></title>
    <?php
        echo $this->Html->css('reset');
        echo $this->Html->css('admin');
    ?>   
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <?php echo $this->Html->script('ckeditor/ckeditor'); ?>
	
	<?php echo $this->Html->css('jquery-ui-1.10.4.custom.min.css'); ?>
	<?php echo $this->Html->script('jquery-ui-1.10.4.custom.min.js'); ?>	
    
    <meta name="robots" content="noindex,nofollow" />
</head>

<body>
<div id="container">
    
    <div id="header">
       <?php
       // If user is logged in show a logout link
       if ($this->Session->read('User')) {
       ?>
            <p class="logged">
                <?php echo $this->Html->link('View Website', '/', array('target' => '_blank')); ?> | 
                <?php echo $this->Html->link('Log Out', '/admin/logout');?>
            </p>
       <?php
       }
       ?>
    </div>
    
    <div id="content">
        <?php
        // If user is logged in show CMS navigation menu        
        if ($this->Session->read('User')) {
            echo $this->element('admin/menu');
        }
        ?>

        <?php echo $this->Session->flash(); ?>
        <?php echo $this->fetch('content'); ?>
    </div>
    
    <div id="footer">
        <p><a href="http://www.nublue.co.uk/digital-agency/" class="nopadding" target="_blank">CakePHP Development &amp; Hosting</a> by NuBlue</p>
    </div>
    
</div>	
</body>
</html>

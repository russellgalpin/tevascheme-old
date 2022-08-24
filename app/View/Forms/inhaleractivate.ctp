<?php
// Meta
$this->set('title_for_layout', $h1);
?>
<div class="main-content span12 center relative">
<?php
// Header markup
    echo $this->element('pharmacy/header');
    echo '<main class="container forms support">';
?>
<h1><?php echo $h1; ?></h1>
<br />
<p><?php echo $msg; ?></p>
<!-- image -->
<div class="cms-image-holder"></div>
<?php
    echo '</main>';
    // Footer markup
    echo $this->element('pharmacy/footer');
    ?>
<?php
// Meta data
$this->set('title_for_layout', 'Thank you');
?>
<div class="main-content span12 center relative">
    <?php
// Header markup
    echo $this->element('pharmacy/header');
    echo '<main class="container forms support price-list">';
    ?>   
    <!-- title and leading paragraph -->
    <div class="form-top">
    <h1 class="form-title margin-bottom">Thank you</h1>
    <p class="span10 bold-italic green">Your information has been sent to us. We will be in touch shortly.</p>
	<p class="span10 bold-italic green">Please look out for your new digital pricelist email at the beginning of each month.</p>
	</div>
    <!-- image -->
    <div class="cms-image-holder"></div>
    <?php
    echo '</main>';
    // Footer markup
    echo $this->element('pharmacy/footer');
    ?>
</div>
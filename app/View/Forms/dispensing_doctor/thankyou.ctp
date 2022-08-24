<?php
// Meta data
$this->set('title_for_layout', 'Thank you');
?>

<?php
// Header markup
echo $this->element('dispensing_doctor/header');
echo '<main class="container forms contact">';
?>   
    <!-- title and leading paragraph -->
    <div class="form-top">
        <h1 class="form-title">Thank you</h1>
        <p>Your information has been sent to us. We will be in touch shortly.</p>
	</div>

<?php
echo '</main>';
// Footer markup
echo $this->element('/dispensing_doctor/footer');
?>